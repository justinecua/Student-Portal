import { LazyLoading } from "./js_modules/lazy_loading.js"; 

/*------------------------------------------------- Variables ------------------------------------------------- */
let HomeTab = document.getElementById('HomeTab');
let LoginTab = document.getElementById('UserLogin');
let HomePage = document.getElementById('HomePagebackground');
let LoginPage = document.getElementById('Loginbackground');

let tabs = [HomeTab, LoginTab];
let areas = [HomePage, LoginPage];
/*------------------------------------------------- Listeners ------------------------------------------------- */

HomeTab.addEventListener('click', async() =>{
    const { switchTab } = await import ("./js_modules/switch_tabs.js");
    switchTab(HomeTab, HomePage, tabs, areas);
})

LoginTab.addEventListener('click', async() =>{
    const { switchTab } = await import ("./js_modules/switch_tabs.js");
    switchTab(LoginTab, LoginPage, tabs, areas);
})

//------------------------------Login-----------------------------------------------------------------------------------
//validation
let LogSchoolID = document.getElementById('LogSchoolID');
let LogPass = document.getElementById('LogPass');
let Notif = document.getElementById('LoginNotif');
let LoginButton = document.getElementById('LoginButton');


function validateAndSubmit(event) {
    event.preventDefault();

    let UserSchoolID = LogSchoolID.value.trim(); 
    let UserPassword = LogPass.value.trim();

    if (UserSchoolID === "" && UserPassword === "") {
        Notif.innerHTML = "(Input School ID and Password)";
        Notif.style.color = "#201e1f";

        setTimeout(function () {
            Notif.innerHTML = "";
        }, 4000);
    }
    else if (UserSchoolID=== "") {
        Notif.innerHTML = "(Input School ID)";
        Notif.style.color = "#201e1f";

        setTimeout(function () {
            Notif.innerHTML = "";
        }, 4000);
    }
    else if (UserPassword === "") {
        Notif.innerHTML = "(Input Password)";
        Notif.style.color = "#201e1f";

        setTimeout(function () {
            Notif.innerHTML = "";
        }, 4000);
    }
    else {
        checkLogin(UserSchoolID, UserPassword);
    }
}


function checkLogin(schoolID, password) {
    var xhr = new XMLHttpRequest(); 
    xhr.open('POST', '../db/xhr/home/login.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded'); 

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            handleResponse(xhr.responseText);
        }
    };
    var data = "SchoolID=" + schoolID + "&LogPass=" + password;
    xhr.send(data);
}

function handleResponse(responseText) {

    if (responseText === "Success Admin") {
        window.location.href = "../admin/AdminHomepage.php";
    }
    else if(responseText === "Good Day Finance"){
        window.location.href = "FinanceHomepage.php";
    }
    else if(responseText === "Welcome Teacher"){
        window.location.href = "TeacherDashboard.php";
    }
    else if(responseText === "Welcome"){
        window.location.href = "StudentDashboard.php";
    }
    else if(responseText === "Welcome2"){
        window.location.href = "StudentDashboard2.php";
    }
    else if (responseText === "Account not found") {
        Notif.innerHTML = "(Account does not exist)";
        Notif.style.color = "#201e1f";
    }
    else if (responseText === "Invalid Password") {
        Notif.innerHTML = "(Invalid Password)";
        Notif.style.color = "#201e1f";
    }
}

LoginButton.addEventListener('click', function(event){
    validateAndSubmit(event);
})

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

initLazyLoading();
/*---------------------------Call Functions -------------------------------*/

LazyLoading(".CoverPhotos img.lazy");