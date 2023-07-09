<!doctype html>
<html lang="en">
    <head>
        <?php require_once(__DIR__ . '/index.php') ?> 
    </head>
    <?php
    $nganhnghe = $db->fetchAll("SELECT * FROM nganhnghe");
    ?>
    <body>
        <div class="hero__search__form">
            <form action="" method="GET">
                <div class="hero__search__categories">
                    Tìm kiếm công việc
                    <span class="arrow_carrot-down"></span>
                </div>
                <input type="text" name="n_nganhnghe" placeholder="Tìm Tên Công Việc">
                Chọn loại ngành nghề
                <select name="s_nganhnghe">
                    <?php foreach ($nganhnghe as $item) : ?>
                        <option value="<?php echo $item['manganhnghe'] ?>"><?php echo $item['tennganhnghe'] ?></option>
                    <?php endforeach ?>
                </select>
                <button type="submit" name="form" value="submit">Tìm kiếm</button>
            </form>

            <?php
            if (isset($_GET["n_nganhnghe"]) && isset($_GET["s_nganhnghe"])) {
                $s_nganhnghe = $_GET['s_nganhnghe'];
                $n_nganhnghe = $_GET['n_nganhnghe'];
                $query = "SELECT DISTINCT congviec.tencongviec AS cv, congty.tencongty AS cty FROM congty
              INNER JOIN congty_nganhnghe ON congty.macongty = congty_nganhnghe.macongty
              INNER JOIN nganhnghe ON congty_nganhnghe.manganhnghe = nganhnghe.manganhnghe
              INNER JOIN congviec ON nganhnghe.manganhnghe = congviec.manganhnghe
              WHERE (congviec.tencongviec LIKE '%$n_nganhnghe%' and nganhnghe.manganhnghe = $s_nganhnghe)";
                $rs = $db->fetchAll($query);
                $total_rows = $db->countData($query);
            }
            ?>
            <?php if (!empty($total_rows)) : ?>
                <h2>Các công việc phù hợp</h2>
                <h4>Số lượng là: <?php echo $total_rows ?></h4>
            <?php endif; ?>
            <div class="row">
                <?php if (!empty($rs)) : ?>
                    <?php foreach ($rs as $item) : ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="<?php echo "./public/img/ah.jpg" ?>">
                                </div>
                                <div class="product__item__text">
                                    <h6><a href=""><?php echo $item['cty'] . " </br> " . $item['cv']; ?></a></h6>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>


        </div>

    </div>
</body>

<!-- <body class="img js-fullheight" style="background-image: url(./public/img/bg.jpg);"></body> -->
</html>

