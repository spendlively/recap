$(document).ready(function(){

    //Обработчик клика кнопки перехода на главную
    $('#stl_bg').click(function() {
        var location = document.location.href,
            href = document.location.href.split('/'),
            goBackHref = location.replace(href[href.length - 1], '');

        document.location = goBackHref;
    });

    //Сокрытие/открытие кнопки перехода на главную
    var buttonIsHidden = true;
    $(document).mousemove(function(event) {
        if(event.pageX < 100 && buttonIsHidden === true){
            $('#stl_left').show(500);
            buttonIsHidden = false;
        }
    });
    $( "#stl_left" ).mouseout(function() {
            $('#stl_left').hide(500);
            buttonIsHidden = true;
        });
});
