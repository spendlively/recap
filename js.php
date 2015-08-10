<?php
    header('Content-Type: text/html; charset=utf-8');
    $content = include 'content.php';
?>
<!DOCTYPE html>
<html>
<head>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/app.js"></script>
    <title>Конспекты</title>
</head>
<body>
    <div id="stl_left">
        <div id="stl_bg">
            <div id="stl_text">Наверх</div>
        </div>
    </div>
    <div id="wrapper">
        <?php foreach($content['javascript']['items'] as $block) { ?>
            <a href="<?= $block['href'] ?>" title="<?= $block['title'] ?>">
                <div class="div-logo" style="<?= $block['style'] ?>">
                    <img src="<?= $block['img'] ?>" />
                </div>
            </a>
        <?php } ?>
    </div>
</body>
</html>
