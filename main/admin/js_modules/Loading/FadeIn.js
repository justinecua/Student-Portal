export function FadeIn() {
    var fadeBox = document.getElementById('fadeBox');
    fadeBox.style.display = 'flex';
    setTimeout(function () {
        fadeBox.style.opacity = '1';
    }, 10);
}



