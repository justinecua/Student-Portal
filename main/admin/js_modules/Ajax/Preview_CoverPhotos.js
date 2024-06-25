import { FadeIn } from "../Loading/FadeIn.js";
import { FadeOut2 } from "../Loading/FadeOut2.js";
import { FetchCoverPhotos } from "./FetchCoverPhotos.js";

let Photos = [];
let ContentBox = document.getElementById('ContentBox');
let CPoverlay = document.getElementById('CPoverlay');
let CPMAddPhotos = document.getElementById('CPMAddPhotos');
let CPMPreviewCont = document.getElementById('CPMPreviewCont');
let CPMAddPhotosInput = document.getElementById('CPMAddPhotosInput');
let PreviewText = document.getElementById('PreviewText');
let CP_LoadingBar = document.getElementById('CP_LoadingBar');

export function Preview_CoverPhotos() {

    CPMAddPhotos.addEventListener('click', function () {
        CPMAddPhotosInput.click();
    })

    CPMAddPhotosInput.addEventListener('input', showPic);

    function showPic() {
        if (CPMAddPhotosInput.files.length === 0) {
            return;
        }

        CPMAddPhotos.style.height = "35%";
        CPMPreviewCont.style.display = "flex";
        PreviewText.style.display = "flex";
    
        for (let i = 0; i < CPMAddPhotosInput.files.length; i++) {
            let selectedFileStudPic = CPMAddPhotosInput.files[i];
            let fileName = selectedFileStudPic.name;
    
            if (!Photos.some(photo => photo.name === fileName)) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    let img = new Image();
                    img.onload = function() {
                        let canvas = document.createElement('canvas');
                        let ctx = canvas.getContext('2d');
                        let maxSize = 800; 
    
                        let width = img.width;
                        let height = img.height;
                        if (width > height) {
                            if (width > maxSize) {
                                height *= maxSize / width;
                                width = maxSize;
                            }
                        } else {
                            if (height > maxSize) {
                                width *= maxSize / height;
                                height = maxSize;
                            }
                        }
    
                        canvas.width = width;
                        canvas.height = height;
                        ctx.drawImage(img, 0, 0, width, height);
    
                        let fileURL = canvas.toDataURL('image/jpeg'); 
                        let photoObject = {
                            name: fileName,
                            url: fileURL,
                            origurl: img.src,
                        };
    
                        Photos.unshift(photoObject);
    
                        let ImageContainer = document.createElement('div');
                        ImageContainer.className = "ImageContainer";
    
                        let CoverImage = document.createElement('img');
                        let DelImage = document.createElement('div');
                        let DelImageCont = document.createElement('div');
    
                        DelImage.innerHTML = "&times";
                        DelImageCont.className = "DelImageCont";
                        DelImage.className = "DelImage";
                        DelImage.addEventListener('click', function() {
                            let index = Photos.findIndex(photo => photo.name === fileName);
                            Photos.splice(index, 1);
                            ImageContainer.remove();
    
                            if (Photos.length > 0) {
                                PreviewText.innerHTML = "Preview " + "(" + Photos.length + ")";
                            } else {
                                PreviewText.innerHTML = "Preview";
                            }
                        });
                        CoverImage.className = "CPPhotos";
                        CoverImage.src = fileURL;
    
                        DelImageCont.appendChild(DelImage);
                        ImageContainer.appendChild(DelImageCont);
                        ImageContainer.appendChild(CoverImage);
                        CPMPreviewCont.insertBefore(ImageContainer, CPMPreviewCont.firstChild);
                        PreviewText.innerHTML = "Preview " + "(" + Photos.length + ")";
                    };
                    img.src = event.target.result;
                };
                reader.readAsDataURL(selectedFileStudPic);
            }
        }
        console.log(Photos);
    }
}


export function Upload_CoverPhotos() {
    let CPMAddPhotosDiv = document.getElementById('CPMAddPhotosDiv');

    var formData = new FormData();
    for (var i = 0; i < Photos.length; i++) {
        let fileURL = Photos[i].url;
        let fileName = Photos[i].name;
        let origurl = Photos[i].origurl;

        let photoObject = {
            fileName: fileName,
            fileURL: fileURL,
            origurl: origurl,
        };
        let photoJSON = JSON.stringify(photoObject);
    
        formData.append('photos[]', photoJSON);
    }

    var xhr = new XMLHttpRequest();
    xhr.open('POST', '../../../../main/db/xhr/admin/AdminAddCPhotos.php', true);

    xhr.onloadstart = function() {

        CPMAddPhotosDiv.style.display = "none";
        CP_LoadingBar.style.display = "flex";
    };

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                var response = xhr.responseText;
                CPoverlay.style.display = "none";
                ContentBox.innerHTML = response;
                FetchCoverPhotos();
            
                FadeIn();
                setTimeout(FadeOut2, 3000);

                CPMPreviewCont.innerHTML = '';
                Photos = [];
                CPMAddPhotosDiv.style.display = "flex";
                CP_LoadingBar.style.display = "none";
                PreviewText.innerHTML = "Preview ";
            } else {
                console.error('Error:', xhr.status, xhr.statusText);
            }
        }
    };
    
    xhr.send(formData);
    console.log(formData);
}


SaveCoverPhoto.addEventListener('click', function(){
    Upload_CoverPhotos();
})

