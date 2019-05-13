window.onload = function() {

}();


$(document).ready(function() {
    var s = document.createElement("script");
    s.type = "text/javascript";
    s.src = "https://static.landbot.io/landbot-widget/landbot-widget-1.0.0.js";
    // Use any selector
    $("head").append(s);


    var myLandbotLivechat = new LandbotLivechat({
        index: 'https://landbot.io/u/H-174286-HU8FGLJPTP6G6PRK/index.html',
    });

    // Show a proactive message after 10 seconds
    setTimeout(() => {
        myLandbotLivechat.sendProactive("Need some help?");
    }, 10000);
})
