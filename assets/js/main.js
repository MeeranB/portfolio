// Fix sidebar styling on smaller viewport widths.
// Sidebar menu has hover options and is shorter
// Fix issue with project cards appearing over sidebar

const menuBtn = $(".menu-btn");
const sideBar = $(".sidebar");
const main = $("main");

//Initialise sidebar animation
sideBar.sidebar({
    side: "left",
    close: false
});

window.onload = () => {
    //Display menu button if jquery is available
    if ($ === jQuery) {
        if (!window.matchMedia("(min-width: 768px)").matches) {
            $(sideBar).trigger("sidebar:close", [{ speed: 0 }]);
            menuBtn.css("display", "flex");
            main.css("margin-left", 0);
        } else if (!window.matchMedia("(min-width: 992px)").matches) {
            main.css("margin-left", "200px");
        } else if (!window.matchMedia("(min-width: 992px)").matches) {
            main.css("margin-left", "250px");
        }
    }
};

let windowSize = $(window).width();

function checkWidth() {
    windowSize = $(window).width();
    return windowSize;
}

$(window).on("resize", () => {
    checkWidth();
    if (windowSize > 992) {
        menuBtn.hide();
        $(sideBar).trigger("sidebar:open", [{ speed: 0 }]);
        sideBar.off("sidebar:opened", closeSideBarOnMainClick);
        main.css("margin-left", "250px");
    } else if (windowSize > 767) {
        menuBtn.hide();
        $(sideBar).trigger("sidebar:open", [{ speed: 0 }]);
        sideBar.off("sidebar:opened", closeSideBarOnMainClick);
        main.css("margin-left", "200px");
    } else if (windowSize <= 767) {
        menuBtn.css("display", "flex");
        sideBar.trigger("sidebar:close", [{ speed: 0 }]);
        main.css("margin-left", 0);
    }
});

$(menuBtn).on("click", () => {
    menuBtn.hide();
    sideBar.trigger("sidebar:open");
});

sideBar.on("sidebar:closed", () => {
    menuBtn.css("display", "flex");
});

sideBar.on("sidebar:opened", closeSideBarOnMainClick);

function closeSideBarOnMainClick() {
    $("main:not(nav)").on("click", () => {
        if (windowSize <= 767) {
            $(sideBar).trigger("sidebar:close");
        }
    });
}

const heroSubtitle = $(".hero-text--subtitle");

const typewriter = new Typewriter(heroSubtitle[0], {
    loop: true,
    delay: 75
});

typewriter.pauseFor(1000).typeString("I am a web developer").pauseFor(1500).deleteChars(13).typeString("web designer").pauseFor(1500).deleteChars(18).changeDelay(60).typeString(" could be an invaluable asset to <strong> your </strong> business!").pauseFor(2500).start();

console.log("test3");

$("#contact-form").validate({
    submitHandler: function (form) {
        $(".success-prompt").text("Message submitted successfully");
    },
    invalidHandler: function (form) {
        $(".success-prompt").text("");
    }
});