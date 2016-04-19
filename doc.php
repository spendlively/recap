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
    'js-events' => 'docs/js/events',
    'jsdocument' => 'docs/js/jsdocument',
    'jsoop' => 'docs/js/jsoop',
    'jses6' => 'docs/js/jses6',
    'jasmine' => 'docs/js/jasmine',
    'php' => 'docs/php/php',
    'phpunit' => 'docs/php/phpunit',
    'patterns' => 'docs/architecture/patterns',
    'arduino' => 'docs/arduino/arduino',
    'architecture' => 'docs/books/fauler/corporate/architecture',
    'algorithms' => 'docs/books/algorithms/algorithms',
    'cleancode' => 'docs/books/cleancode/cleancode',
    'extreme' => 'docs/books/extreme/extreme',
    'perfect' => 'docs/books/perfect/perfect',
    'idealprog' => 'docs/books/idealprog/idealprog',
    'hl' => 'docs/books/hl/hl',
    'artofprogramming' => 'docs/books/artofprogramming/artofprogramming',
    'nosql' => 'docs/books/nosql/nosql',
    'designpatterns' => 'docs/books/designpatterns/designpatterns',
    'pragmatic' => 'docs/books/pragmatic/pragmatic',
    'refactoring' => 'docs/books/refactoring/refactoring',
    'structure' => 'docs/books/structure/structure',
    'ddd' => 'docs/books/ddd/ddd',
    'extjs' => 'docs/extjs/extjs5',
    'htmlcss' => 'docs/htmlcss/htmlcss',
    'd3' => 'docs/js/d3',
    'android' => 'docs/java/android/android',
    'java' => 'docs/java/java/java',
    'libgdx' => 'docs/java/android/libgdx',
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
    <link rel="stylesheet" href="css/print.css" type="text/css" media="print" />
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
<div class="docwrapper">
    <div class="recap doc">
        <h1><?= $path; ?></h1>
        <?php
            if(!empty($content)){
                foreach($content as $c) {

                    $c = str_replace('>', '&gt;', $c);
                    $c = str_replace('<', '&lt;', $c);

                    if($c === ""){
                        $c = "<br />";
                    }
                    elseif(preg_match('@^//[^\\n]+@ui', $c, $matches)){
                        if(!empty($matches[0])){
                            $c = '<strong>' . $matches[0] . '</strong>';
                        }
                    }
        ?>
        <p><pre><?= $c; ?></pre></p>
            <?php } ?>
        <?php } ?>

        <div id="iread"><input id="ireadbtn" type="button" value="Прочитал!"></div>
    </div>
</div>
</body>
</html>
