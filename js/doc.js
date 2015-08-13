$(document).ready(function(){
    $('input#ireadbtn').click(function(){
        $.post("nextItem.php");
    });
});