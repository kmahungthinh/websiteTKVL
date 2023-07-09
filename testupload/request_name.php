<html>
    <body>
        <?php
        if (isset($_REQUEST['name'])) {
            $name = $_REQUEST['name'];
            echo "Xin chào, $name!";
        } else {
            echo "Xin chào!";
        }
        ?>
    </body>
</html>
