document.addEventListener("DOMContentLoaded", function (event) {
    var reloadButton = document.getElementById("reloadButton");
    if (reloadButton != null) {
        reloadButton.onclick = function () {
            var captchaImage = document.getElementById("captchaImage");
            captchaImage.setAttribute("src", captchaImage.getAttribute("src").split("?")[0] + "?" + Math.random());
        }
    };
});
