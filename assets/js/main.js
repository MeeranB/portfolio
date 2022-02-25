// Fix sidebar styling on smaller viewport widths.
// Sidebar menu has hover options and is shorter
// Fix issue with project cards appearing over sidebar

const menuBtn = $(".menu-btn");
const sideBar = $(".sidebar");
const main = $("main");

function postData() {
    const formString = $("#contact-form").serialize();
    const formUrlSearchParams = new URLSearchParams(formString);
    const submittedData = {};
    for (const [key, value] of formUrlSearchParams) {
        submittedData[key] = value;
    }
    axios
        .post("contact-submit.php", submittedData)
        .then(response => {
            if (!response.data.validForm) {
                throw new Error("form was not valid");
            }
            if (response.data.submitted) {
                $(".success-prompt").show().delay(2000).fadeOut("fast");
            }
        })
        .catch(error => {
            console.log(error);
        });
}

//Initialise sidebar animation
sideBar.sidebar({
    side: "left",
    close: false,
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

$(() => {
    $(".success-prompt").hide();
});

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

$("#contact__link").on("click", () => {
    checkWidth();
    if (windowSize <= 767) {
        menuBtn.css("display", "flex");
        sideBar.trigger("sidebar:close", [{ speed: 0 }]);
        main.css("margin-left", 0);
    }
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
    delay: 75,
});

typewriter
    .pauseFor(1000)
    .typeString("I am a web developer")
    .pauseFor(1500)
    .deleteChars(13)
    .typeString("web designer")
    .pauseFor(1500)
    .deleteChars(18)
    .changeDelay(60)
    .typeString(
        " could be an invaluable asset to <strong> your </strong> business!"
    )
    .pauseFor(2500)
    .start();

$("#contact-form").validate({
    rules: {
        name: "required",
        email: {
            required: true,
            validEmail: true,
        },
        telNumber: {
            required: true,
            validPhone: true,
        },
        subject: "required",
        message: "required",
    },
    submitHandler: () => {
        postData();
        $("#contact-form").trigger("reset");
    },
});

jQuery.extend(jQuery.validator.messages, {
    required: "This field is required",
    email: "Email must be valid",
});

jQuery.validator.addMethod(
    "validPhone",
    function (value, element) {
        // prettier-ignore
        const phoneRegex = /^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$/i;
        return this.optional(element) || phoneRegex.test(value);
    },
    ""
);

jQuery.validator.addMethod(
    "validEmail",
    function (value, element) {
        // prettier-ignore
        const emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        return this.optional(element) || emailRegex.test(value);
    },
    "Email must be valid"
);
