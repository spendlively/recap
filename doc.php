<?php
header('Content-Type: text/html; charset=utf-8');
ob_start();
$path = !empty($_GET['path']) ? $_GET['path'] : null;
$docs = array(
    'linux' => 'docs/linux/linux',
    'mysql' => 'docs/mysql/mysql',
    'git' => 'docs/git/git',
    'hg' => 'docs/hg/hg',
    'js' => 'docs/js/js',
);
$content = array();

if($path && isset($docs[$path])){
    $content = file_get_contents($docs[$path]);
    $content = preg_split('@\\n@', $content);
}
ob_end_clean();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Конспекты</title>
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="css/doc.css" type="text/css" />
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/doc.js"></script>
    <script src="js/app.js"></script>
</head>
<body>
<div id="stl_left">
    <div id="stl_bg">
        <div id="stl_text">Наверх</div>
    </div>
</div>
<div class="doc">
    <h1><?= $path; ?></h1>
    <?php if(!empty($content)){ ?>
        <?php
                foreach($content as $c) {
                    $c = str_replace(" ", "&nbsp;", $c);
                    if(preg_match('@^//[^\\n]+@ui', $c, $matches)){
                        if(!empty($matches[0])){
                            $c = '<br /><strong>' . $matches[0] . '</strong>';
                        }
                    }
        ?>
            <p><?= $c; ?></p>
        <?php } ?>
    <?php } ?>
</div>
</body>
</html>
