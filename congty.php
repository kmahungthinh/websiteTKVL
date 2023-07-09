<!doctype html>
<html lang="en">
    <head>
    <?php require_once(__DIR__ . '/index.php') ?>
    </head>
    <body>
    <div class="col-lg-9">
        <div class="hero__search">
            <div class="hero__search__form">
                <form action="" method="POST">
                    <div class="hero__search__categories">
                        Tìm kiếm công ty
                        <span class="arrow_carrot-down"></span>
                    </div>
                    <input type="text" name="name" placeholder="Tìm Tên Công ty">
                    <button type="submit" class="site-btn">Tìm kiếm</button>
                </form>
            </div>

        </div>

    </div>
    <?php
    if (isset($_POST) && isset($_POST['name'])) {
        $name = $_POST['name'];
        $total_rows = $db->countData("SELECT * FROM congty WHERE tencongty like '%$name%'");
        $sql_danhsach = "SELECT * FROM congty WHERE tencongty like '%$name%'";
        $danhsachcongty = $db->fetchAll($sql_danhsach);
    }
    ?>
    <?php if (!empty($total_rows)) : ?>
    <h2>Các công ty phù hợp</h2>
    <h4>Số lượng là: <?php echo $total_rows ?></h4>
    <?php endif; ?>
    <div class="row">
         <?php if (!empty($danhsachcongty)) : ?>
        <?php foreach ($danhsachcongty as $item) : ?>
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" data-setbg="<?php echo "./public/img/ah.jpg" ?>">
                    </div>
                    <div class="product__item__text">
                        <h6><a href=""><?php echo $item['tencongty'] ?></a></h6>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
        <?php endif; ?>
    </div>
</body>
</html>