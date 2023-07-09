
<div>
    <div class="col-lg-6" style="margin-top:40px">
        <nav class="header__menu">
            <ul class="nav">
                <li><a href="congviec.php">Việc làm</a></li>
                
                <?php if (isset($_SESSION['user'])) : ?>
                    <li><a href="xulydangnhaphoso.php">Hồ sơ</a></li>
                <?php else : ?>
                    <li><a href="#">Hồ sơ</a></li>
                <?php endif; ?>
                <li><a href="congty.php">Công ty</a></li>

                <li>
                    <?php if (isset($_SESSION['user'])) : ?>

                        <div class="header__top__right__auth">
                            <a href="http://localhost/websiteTKVL/dangxuat.php"><i class="fa fa-user"></i><?php echo $_SESSION['user'] ?></a> </a>
                        </div>

                    <?php endif ?>
                </li>

                <li>
                    <?php if (!isset($_SESSION['user'])) : ?>

                        <div class="header__top__right__auth">
                            <a href="./login.php"><i class="fa fa-user"></i>Đăng nhập</a> </a>
                        </div>

                    <?php endif ?>
                </li>

                <li>
                   <?php if (!isset($_SESSION['user'])) : ?>

                       <!--<a href="./register.php">Đăng Ký</a>->>


                    <?php endif ?>
                </li>
            </ul>
        </nav>
    </div>

</div>
