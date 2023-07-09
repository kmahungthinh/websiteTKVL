<?php
include 'connect.php';
if (isset($_POST['upload'])) {
$errors= array();
$file_name = $_FILES['image']['name'];
$file_size = $_FILES['image']['size'];
$file_tmp = $_FILES['image']['tmp_name'];
$file_type = $_FILES['image']['type'];
$file_parts =explode('.',$_FILES['image']['name']);
$file_ext=strtolower(end($file_parts));
$expensions= array("jpeg","jpg","png");
if(in_array($file_ext,$expensions)=== false){
$errors[]="Chỉ hỗ trợ upload file JPEG hoặc PNG.";
}
if($file_size > 2097152) {
$errors[]='Kích thước file không được lớn hơn 2MB';
}
$image = $_FILES['image']['name'];
$target = "photo/".basename($image);
$sql1 = "DELETE FROM images;";
mysqli_query($conn, $sql1);
$sql2 = "INSERT INTO images (image) VALUES ('$image')";
mysqli_query($conn, $sql2);
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
echo '<script language="javascript">alert("Đã upload thành công!");</script>';
}else{
echo '<script language="javascript">alert("Đã upload thất bại!");</script>';
}
}
$result = mysqli_query($conn, "SELECT * FROM images");
?>
<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div id="content">
   
<?php
$count=0;
while ($row = mysqli_fetch_array($result)) {
echo "<div id='img_div'>";
echo "<img src='photo/".$row['image']."' >";
echo "</div>";
$count++;
if($count==1) break;
}
?>
</div>
</body>
</html>