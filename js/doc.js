$(document).ready(function(){
    $('input#iread').click(function(){
        $.post("nextItem.php");
    });
});