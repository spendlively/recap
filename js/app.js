$(document).ready(function(){


    function getWindowSize(){
        var e = document.documentElement,
            g = document.getElementsByTagName('body')[0],
            x = window.innerWidth || e.clientWidth || g.clientWidth,
            y = window.innerHeight|| e.clientHeight|| g.clientHeight;

        return [x, y];
    }

    $( window ).resize(function() {
//        var size = getWindowSize();
//        alert(size[1]);
//        console.log(size);
    });

    $('#stl_bg').click(function() {
        var location = document.location.href,
            href = document.location.href.split('/'),
            goBackHref = location.replace(href[href.length - 1], '');

        document.location = goBackHref;
    });
});
