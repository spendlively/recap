<?php header("Content-Type: text/html; charset=utf8"); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Темы и технологии для изучения</title>
    <style>
        .wrapper div{
            margin: 0 auto;
            width: 1200px;
            border-left: solid 1px #CCCCCC;
            border-right: solid 1px #CCCCCC;
            font-size: 18px;
        }
        h1{
            text-align: center;
        }
    </style>
</head>
<body>

<?php
    $jsonData = file_get_contents("pull.json");
    $data = json_decode($jsonData);
?>

<div class="wrapper">
    <div>
        <?php if(!empty($data->{'Topics'})) { ?>
        <h1>Темы</h1>
        <ul>
            <?php foreach($data->{'Topics'} as $topicName => $topics) { ?>
            <li><?= $topicName ?>:</li>
                <?php if(!empty($topics)) { ?>
                    <ol>
                        <?php foreach($topics as $topic) { ?>
                        <li><?= $topic ?></li>
                        <?php } ?>
                    </ol>
                <?php } ?>
            <?php } ?>
        </ul>
        <?php } ?>

        <?php if(!empty($data->{'Technologies'})) { ?>
            <h1>Технологии</h1>
            <ul>
                <?php foreach($data->{'Technologies'} as $tech) { ?>
<!--                    <li>--><?//= $topicName ?><!--:</li>-->
<!--                    --><?php //if(!empty($topics)) { ?>
<!--                        <ol>-->
<!--                            --><?php //foreach($topics as $topic) { ?>
                                <li><?= $tech ?></li>
<!--                            --><?php //} ?>
<!--                        </ol>-->
<!--                    --><?php //} ?>
                <?php } ?>
            </ul>
        <?php } ?>
    </div>
</div>
</body>
</html>