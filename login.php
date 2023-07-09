<!DOCTYPE html>
<html lang="vi">
    <head>
        <?php require_once(__DIR__ . '/layout/header.php') ?>
        <link rel="stylesheet" href="./public/site/css/Login.css">
    </head>
    <?php
    if (isset($_SESSION['user'])) {
        header("location:./index.php");
    } else {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["username"]) || empty($_POST['password'])) {
                echo "<script>alert('KO dc de trong')</script>";
            } else {
                $userName = $_POST["username"];
                $password = $_POST["password"];

                $sql = "select * from nguoidung where taikhoan = '$userName' and matkhau = '$password' ";

                $rs = $db->fetchOne($sql);
                if ($rs > 0) {
                    echo "Đăng Nhập Thành Công";
                    $_SESSION['user'] = $rs['taikhoan'];
                    $taikhoan=$_SESSION['user'];
                   
                    //header("location:./index.php?taikhoan=$taikhoan");
                    header("location:./index.php");
                } else {
                    echo "Đăng Nhập Thất Bại";
                }
            }
        }
    }
    ?>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Đăng nhập</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Bạn đã có tài khoản?</h3>
                        <form action="" class="signin-form" method="POST">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
                                <span toggle="#password-field"  class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Nhớ mật khẩu
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="#" style="color: #fff">Forgot Password</a>
                                </div>
                            </div>
                        </form>
                    
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>
</html>


<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>