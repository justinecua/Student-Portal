let CPMBottom = document.getElementById('CPMBottom');
let CPMBottomCont = document.querySelector('.CPMBottom-Cont');

export function FetchCoverPhotos(){
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../../../../main/db/xhr/admin/AdminFetchCPhotos.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                var response = xhr.responseText;
                if(response.includes('NoPhotos')) {
                    CPMBottom.style.justifyContent = "center";
                    CPMBottomCont.style.display = "flex";
                    
                } else {
                    CPMBottomCont.style.display = "none";
                    CPMBottom.innerHTML = response;
                }
                initLazyLoading();
            }
        }
    };
    
    xhr.send();
}

function initLazyLoading() {
    let lazyimages = document.querySelectorAll(".CPhotos_Preview img.lazy");

    if ("IntersectionObserver" in window) {
        let observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    let lazyimage = entry.target;
                    lazyimage.src = lazyimage.dataset.src;
                    lazyimage.classList.remove("lazy");
                    observer.unobserve(lazyimage);
                }
            })
        });

        lazyimages.forEach((lazyimage) => {
            observer.observe(lazyimage);
        })
    }
}