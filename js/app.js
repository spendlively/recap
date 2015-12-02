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

    //Анимация переходя по ссылке
    $("a.block-icon").click(function(e) {
        var link = this;
        e.preventDefault();
        $(this).addClass('animated flip').css('position', 'relative').css('z-index', '999');
        setTimeout(function(){
            window.location = link.href;
        }, 1000);
    });

});
