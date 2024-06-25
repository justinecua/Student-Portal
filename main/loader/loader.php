<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Christian Horizon School Inc</title>
    <link rel="icon" type="image/x-icon" href="../../images/CHS Logo1.png">
    <link rel="stylesheet" href="loader.css">

</head>

<body>
    <div id="loaderContainer" class="fade-out">
        <div class="loaderSecCont">
            <div id="loader"></div>
            <div id="loader2"></div>
        </div>
    </div>

    <script>
        const loaderContainer = document.getElementById('loaderContainer');

        window.addEventListener('load', () => {
            setTimeout(() => {
                fadeOut(loaderContainer);
            }, 200);
        });

        function fadeOut(element) {
            let opacity = 1;
            const timer = setInterval(() => {
                if (opacity <= 0.1) {
                    clearInterval(timer);
                    element.style.display = 'none';
                }
                element.style.opacity = opacity;
                opacity -= opacity * 0.1;
            }, 50);
        }
    </script>
</body>

</html>