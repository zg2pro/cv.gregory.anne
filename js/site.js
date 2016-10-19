$(document).ready(function () {
    $('#fullpage').fullpage({
        verticalCentered: false,
        anchors: ["page0", "page1", "page2", "page3", "page4", "page5", "page6", "page7", "page8"],
        menu: 'ul.full-page-menu',
        scrollingSpeed: 600,
        css3: true
    });
    var width = $(window).width();
    var minWidth = 1366;
    if (width < minWidth) {
        if (language === 'fr') {
            alert("Ce site requiert une largeur d'écran >= " + minWidth
                    + "\nLa votre est actuellement de : " + width + "px."
                    + "\nVous allez être redirigé vers l'ancienne version du site.");
        } else {
            alert("This website requires a screen width >= " + minWidth
                    + "\nYours is currently: " + width + "px."
                    + "\nYou are going to be redirected to the old version");
        }
        window.location.href = "version-1";
    }

    var updateSlidesMenu = function () {
        var url = window.location.href;
        var idx = url.indexOf("#page1/")
        $("#section1 div.rb-switcher ul").find("li").removeClass("selected");
        if (idx !== -1) {
            var hash = parseInt(url.substring(idx + 7, idx + 8)) + 1;
            $("#section1 div.rb-switcher ul").find("li:nth-child(" + hash + ")").addClass("selected");
        } else {
            $("#section1 div.rb-switcher ul").find("li:nth-child(1)").addClass("selected");
        }
    };
    updateSlidesMenu();

    var delayedUpdateSlidesMenu = function () {
        setTimeout(function () {
            updateSlidesMenu();
        }, 600);
    };

    $("#section1 div.fp-controlArrow").click(delayedUpdateSlidesMenu);
    $("#section1 div.rb-switcher ul").on("click", "li", function () {
        $.fn.fullpage.moveTo(2, $(this).index());
        delayedUpdateSlidesMenu();
    });
    $("div.full-page-menu-wrapper").on("click", "li[data-menuanchor='page1']", function () {
        $($("#section1 div.rb-switcher ul").find("li")[0]).click();
    });
    $(document).keydown(function (e) {
        switch (e.which) {
            case 37: // left
            case 39: // right
                delayedUpdateSlidesMenu();
                break;
            case 38: // up
                break;
            case 40: // down
                break;
            default:
                return; // exit this handler for other keys
        }
        e.preventDefault(); // prevent the default action (scroll / move caret)
    });

});