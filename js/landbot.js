$(document).ready(function() {
  $.ajax({
    url: 'https://static.landbot.io/landbot-widget/landbot-widget-1.0.0.js',
    dataType: "script",
    success: function() {
      var myLandbotLivechat = new LandbotLivechat({
        index: 'https://landbot.io/u/H-174286-HU8FGLJPTP6G6PRK/index.html',
      });

      var urlCustomAvatar = "https://storage.googleapis.com/media.helloumi.com/channels/IRSRASHJB13UYVU6DCOWZBJCJUUTRRD7.jpg";

      var holderUrl = `url(${urlCustomAvatar})`
      myLandbotLivechat.on('landbot-load', () => {
        window.document.getElementsByClassName("LandbotProactive__frame__content")[0].contentDocument.body.childNodes[0].childNodes[0].childNodes[3].childNodes[1].childNodes[0].childNodes[0].childNodes[0].style.backgroundImage = holderUrl

        var frameBody = window.document.getElementsByClassName("LandbotProactive__frame__content")[0].contentDocument.body;
        frameBody.querySelector(".hu-message-author").innerHTML = "ownCloud.online"
      });

      myLandbotLivechat.on('landbot-msg-receive', (data) => {
        localStorage.setItem('proactiveShown', 'true');
      });

      var proactiveShown = localStorage.getItem('proactiveShown');
      if (proactiveShown != 'true'){
        setTimeout(() => {
          myLandbotLivechat.sendProactive("Hello there!");
        }, 5000);
      }
    }
  });
})
