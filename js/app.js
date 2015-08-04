$(document).ready(function(){

    //Обработчик клика кнопки перехода на главную
    $('#stl_bg').click(function() {
        var location = document.location.href,
            href = document.location.href.split('/'),
            goBackHref = location.replace(href[href.length - 1], '');

        document.location = goBackHref;
    });

    //Флажок состояния кнопки перехода на главную
    var buttonIsHidden = true;

    //Анимация появления кнопки перехода на главную
    $(document).mousemove(function(event) {
        if(event.pageX < 100 && buttonIsHidden === true){
            $('#stl_left').show(500);
            buttonIsHidden = false;
        }
    });

    //Анимация исчезания кнопки перехода на главную
    $("#stl_left").mouseout(function(q) {
        $('#stl_left').hide(500);
        buttonIsHidden = true;
    });
});
