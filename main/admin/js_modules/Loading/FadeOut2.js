export function FadeOut2() {
    var fadeBox = document.getElementById('fadeBox');
    fadeBox.style.opacity = '0';
    setTimeout(function () {
        fadeBox.style.display = 'none';
    }, 500);
}