<html lang="en">
     <head>
        <?php require_once(__DIR__ . '/index.php') ?> 
    </head>
    <?php
    if (isset($_POST['upload'])) {
        $errors = array();
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_parts = explode('.', $_FILES['image']['name']);
        $file_ext = strtolower(end($file_parts));
        $expensions = array("jpeg", "jpg", "png");
        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "Chỉ hỗ trợ upload file JPEG hoặc PNG.";
        }
        if ($file_size > 2097152) {
            $errors[] = 'Kích thước file không được lớn hơn 2MB';
        }
        $image = $_FILES['image']['name'];
        $target = "public/img/profile/" . basename($image);
        $d = $db->delete("DELETE FROM images");
        $q = $db->query("INSERT INTO images (id,image) VALUES (1,'$image')");
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo '<script language="javascript">alert("Đã upload thành công!");</script>';
        } else {
            echo '<script language="javascript">alert("Đã upload thất bại!");</script>';
        }
        $imageone = $db->fetchOne("SELECT * FROM images");
    }
    if (isset($_REQUEST["action"]) && isset($_REQUEST["n_hovaten"]) && isset($_REQUEST["n_gioitinh"]) && isset($_REQUEST["n_ngaysinh"]) && isset($_REQUEST["n_diachi"]) && isset($_REQUEST["n_email"]) && isset($_REQUEST["n_sodienthoai"]) && isset($_REQUEST["n_hocvan"]) && isset($_REQUEST["n_tencongviec"]) && isset($_REQUEST["n_chitietungtuyen"]) && isset($_REQUEST["n_motakinhnghiem"])) {

        $hovaten = $_REQUEST["n_hovaten"];
        $gioitinh = $_REQUEST["n_gioitinh"];
        $ngaysinh = $_REQUEST["n_ngaysinh"];
        $diachi = $_REQUEST["n_diachi"];
        $email = $_REQUEST["n_email"];
        $sodienthoai = $_REQUEST["n_sodienthoai"];
        $hocvan = $_REQUEST["n_hocvan"];
        $tencongviec = $_REQUEST["n_tencongviec"];
        $chitietungtuyen = $_REQUEST["n_chitietungtuyen"];
        $motakinhnghiem = $_REQUEST["n_motakinhnghiem"];
        $taikhoan = $_REQUEST["taikhoan"];
        echo "<script type='text/javascript'>alert('Lưu thành công');</script>";
        $sql = "UPDATE hoso SET hovaten = '" . $hovaten .
                "', gioitinh='" . $gioitinh .
                "',ngaysinh='" . $ngaysinh .
                "',diachi='" . $diachi .
                "',email='" . $email .
                "',sodienthoai='" . $sodienthoai .
                "',hocvan='" . $hocvan .
                "',tencongviec='" . $tencongviec .
                "',chitietungtuyen='" . $chitietungtuyen .
                "',motakinhnghiem='" . $motakinhnghiem . "' WHERE taikhoan = '" . $taikhoan . "'";
        $db->query($sql);
    }
    ?>

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">

            <div class="col-md-3 border-right">
                <form method="POST" action="" enctype="multipart/form-data"> 
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" width="150px" 
                        <?php
                        $imageone = $db->fetchOne("SELECT * FROM images");
                        echo "<img src='public/img/profile/" . $imageone['image'] . "' >";
                        ?>

                             <input type="file" name="image">                          
                        <button type="submit" name="upload">Cập nhật</button>  
                        <span class="font-weight-bold">
                    </div>
                </form>
            </div>

            <div class="col-md-4 border-right">
                <form action="<?php echo($_SERVER["SCRIPT_NAME"]); ?>" method="GET">
                    <?php
                    $hoso = $db->fetchOne("SELECT * FROM hoso");
                    ?>
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h2 >Thiết lập hồ sơ</h2>
                        </div>
                        <h5>Giới thiệu bản thân</h5>
                        <div class="row mt-2">
                            <input type="hidden" name="taikhoan" value="<?php echo($_SESSION["user"]); ?>">
                            <div class="col-md-6"><label class="labels">Họ và tên</label><input type="text" class="form-control" placeholder="Họ và tên" value="<?php echo($hoso["hovaten"]); ?>" name="n_hovaten"></div>

                            <div>
                                <div class="col-md-12"><label class="labels">Giới tính</label></div>
                                <?php if ($hoso["gioitinh"] == 'nam') : ?>
                                    <input type="radio" name="n_gioitinh" value="nam" checked="checked">Nam
                                    <input type="radio" name="n_gioitinh" value="nu"">Nữ
                                <?php else : ?>
                                    <input type="radio" name="n_gioitinh" value="nam"">Nam
                                    <input type="radio" name="n_gioitinh" value="nu" checked="checked">Nữ
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12"><label for="birthday">Ngày sinh</label>
                                <input type="date" id="birthday" name="n_ngaysinh" value="<?php echo($hoso["ngaysinh"]); ?>"></div>
                        </div>    
                        <div class="row mt-2">
                            <div class="col-md-12"><label class="labels">Địa chỉ</label><input type="text" class="form-control" placeholder="Địa chỉ" value="<?php echo($hoso["diachi"]); ?>" name="n_diachi"></div>
                            <div class="col-md-12"><label class="labels">Email</label><input type="text" class="form-control" placeholder="Email" value="<?php echo($hoso["email"]); ?>" name="n_email"></div>
                            <div class="col-md-6"><label class="labels">Số điện thoại</label><input type="text" class="form-control" placeholder="Số điện thoại" value="<?php echo($hoso["sodienthoai"]); ?>" name="n_sodienthoai"></div>
                            <div class="col-md-7"><label class="labels">Học vấn</label><input type="text" class="form-control" placeholder="Học vấn" value="<?php echo($hoso["hocvan"]); ?>" name="n_hocvan"></div>
                        </div> 
                        <h5>Công việc ứng tuyển</h5>
                        <div class="row mt-3">
                            <div class="col-md-6"><label class="labels">Tên công việc</label><input type="text" class="form-control" placeholder="Tên công việc" value="<?php echo($hoso["tencongviec"]); ?>" name="n_tencongviec"></div>

                            <div class="col-md-12"><label class="labels">Chi tiết ứng tuyển</label>
                                <textarea id="i_motachitiet" name="n_chitietungtuyen" rows="4" cols="40"></textarea>

                                <script>
                                    // Define the function to set the default value
                                    function setDefaultValue() {
                                        var textarea = document.getElementById('i_motachitiet');
                                        textarea.value = '<?php echo($hoso["chitietungtuyen"]); ?>';
                                    }

                                    // Call the function to set the default value
                                    setDefaultValue();
                                </script>
                            </div>

                        </div>

                    </div>

            </div>
            <div class="col-md-5">
                <div class="p-3 py-5">
                    <h5>Kinh nghiệm làm việc</h5>
                    <div class="col-md-12"><label class="labels">Mô tả kinh nghiệm</label>
                        <input type="text" class="form-control" placeholder="Mô tả kinh nghiệm" value="<?php echo($hoso["motakinhnghiem"]); ?>" name="n_motakinhnghiem"></div> <br>
                    <div class="mt-3 text-left">
                        <button class="btn btn-primary profile-button" type="submit" name="action" value="save">Lưu hồ sơ</button>
                        <button class="btn btn-primary profile-button" type="button">Xuất pdf</button>
                    </div>
                </div>
                </form>
            </div>

        </div>
    </div>
    <style>
        /*body {
            background: rgb(99, 39, 120)
        }*/
        .container {
        border: 2px solid #682773;
        padding: 10px;
        margin-left: 150px;
    }
        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            background: rgb(99, 39, 120);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #682773
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none
        }

        .back:hover {
            color: #682773;
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }
    </style>