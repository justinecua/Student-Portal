
const G1toG10PE = document.getElementById('G1toG10PE');
const SHSPE = document.getElementById('SHSPE');
const TPE = document.getElementById('TPE');
const G1TOG10PEContents = document.getElementById('G1TOG10PEContents');
const SHSPEContents = document.getElementById('SHSPEContents');
const TPEContents = document.getElementById('TPEContents');
let EnrollmentArea = document.getElementById('EnrollmentArea');
let EnrollmentTab = document.getElementById('EnrollmentTab');
let PaymentArea = document.getElementById('PaymentArea');
let PaymentTab = document.getElementById('PaymentTab');
let ECoverlay = document.getElementById('ECoverlay');
let ECCloseAddSubj = document.getElementById('ECCloseAddSubj');
let loaderContainer = document.getElementById('loaderContainer');
let pleaseWaitCont = document.getElementById('pleaseWaitCont');
let Paymoverlay = document.getElementById('Paymoverlay');
let DashboardTab = document.getElementById('DashboardTab');
let DashboardArea = document.getElementById('DashboardArea');

changeTabToEnrollment();
document.addEventListener('click', function (event) {
    if (event.target.classList.contains('ConfirmEnroll')) {
        ECoverlay.style.display = "flex";
    }
    else if (event.target.classList.contains('ECCloseAddSubj')) {
        ECoverlay.style.display = "none";
    }
    else if (event.target.classList.contains('CancelStudEnroll')) {
        ECoverlay.style.display = "none";
    }
});

document.addEventListener('click', function (event) {
    if (event.target.classList.contains('ConfirmPayment')) {
        Paymoverlay.style.display = "flex";
    }
    else if (event.target.classList.contains('PaymCloseAddSubj')) {
        Paymoverlay.style.display = "none";
    }
    else if (event.target.classList.contains('CancelPayment')) {
        Paymoverlay.style.display = "none";
    }
});

//Navbar
/*
function changeTabToDashboard() {
    PaymentArea.style.display = "none";
    PaymentTab.classList.remove('activeNav');
    PaymentTab.style.color = "white";

    EnrollmentTab.style.color = "white";
    EnrollmentArea.style.display = "none";
    EnrollmentTab.classList.remove('activeNav');

    DashboardTab.style.color = "#201e1f";
    DashboardArea.style.display = "flex";
    DashboardTab.classList.add('activeNav');
}
*/
function changeTabToEnrollment() {
    EnrollmentArea.style.display = "flex";
    EnrollmentTab.classList.add('activeNav');
    EnrollmentTab.style.color = "#201e1f";

    PaymentTab.style.color = "white";
    PaymentArea.style.display = "none";
    PaymentTab.classList.remove('activeNav');

}
function changeTabToPayments() {
    PaymentArea.style.display = "flex";
    PaymentTab.classList.add('activeNav');
    PaymentTab.style.color = "#201e1f";

    EnrollmentTab.style.color = "white";
    EnrollmentArea.style.display = "none";
    EnrollmentTab.classList.remove('activeNav');

    
}

function FetchEnrollments() {
    let ShowEnrollmentsContent = document.getElementById('ShowEnrollmentsContent');

    var xhr28 = new XMLHttpRequest();
    xhr28.open('GET', 'FinanceFetchEnrollments.php', true);
    xhr28.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr28.onreadystatechange = function () {
        if (xhr28.readyState == 4 && xhr28.status == 200) {
            var response28 = xhr28.responseText;
            ShowEnrollmentsContent.innerHTML = response28;
        }
    }
    xhr28.send();
}

function FetchPaymentTranscactions() {
    let ShowPaymentContent = document.getElementById('ShowPaymentContent');

    var xhr28 = new XMLHttpRequest();
    xhr28.open('GET', 'FinanceFetchPayments.php', true);
    xhr28.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr28.onreadystatechange = function () {
        if (xhr28.readyState == 4 && xhr28.status == 200) {
            var response28 = xhr28.responseText;
            ShowPaymentContent.innerHTML = response28;
        }
    }
    xhr28.send();
}

function FetchStudents() {
    const searchResults = document.getElementById("search-results");

    var xhr28 = new XMLHttpRequest();
    xhr28.open('GET', 'FinanceFetchStudents.php', true);
    xhr28.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr28.onreadystatechange = function () {
        if (xhr28.readyState == 4 && xhr28.status == 200) {
            var response28 = xhr28.responseText;
            searchResults.innerHTML = response28;
            viewSearchResult(); 
        }
    }
    xhr28.send();
}

/*
const searchInput = document.getElementById("SearchStudPay");
const searchResults = document.getElementById("search-results");
let PaymentContent = document.getElementById('PaymentContent');
let PaymentInfo = document.getElementById('PaymentInfo');
let selectedStudentID = null; // Variable to store the selected Student ID

searchInput.addEventListener("input", function () {
    const query = searchInput.value;
    if (query.length >= 2) {
        performSearch(query);
    } else {
        FetchStudents();
        searchResults.innerHTML = "";
    }

    function performSearch(query) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "SearchID.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                searchResults.innerHTML = xhr.responseText;
                PaymentInfo.style.display = "flex";
                viewSearchResult(); // calling the function to view the clicked user
            } else {
                PaymentInfo.style.display = "none";
            }
        };
        xhr.send("query=" + query);
    }

    PaymentArea.addEventListener('click', function () {
        PaymentInfo.style.display = "none";
    })
});

function viewSearchResult() {
    const Results = document.querySelectorAll('.Results');

    Results.forEach(function (ResultsDiv) {
        ResultsDiv.addEventListener('click', function () {
            selectedStudentID = ResultsDiv.getAttribute('FinStudent_ID');
            fetchStudentInfo(selectedStudentID);
        });
    });
}

function fetchStudentInfo(studentID) {
    let FStudent_ID = document.getElementById('FStudent_ID');
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'viewResultInfo.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            PaymentInfo.innerHTML = response;
            FStudent_ID.value = studentID;
        }
    };

    xhr.send("FinStudent_ID=" + studentID);
}

function AddPaymentF2F(){
    let FStudent_ID = document.getElementById('FStudent_ID');
    let DBStudID = FStudent_ID.value;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'FinanceAddPaymentf2f.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            PaymentInfo.innerHTML = response;
            
        }
    };

    xhr.send("DBStudID=" + DBStudID);
}

AddPaymentF2F();

*/
function EnrollmentMoreInfo() {
    let ENoverlay = document.getElementById('ENoverlay');
    let ENUserIdDiv = document.getElementById('ENUserIdDiv');
    let ENcloseoverlayContainer = document.getElementById('ENcloseoverlayContainer');

    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('MoreInfoStudentBtn')) {
            let UserId = event.target.getAttribute('dbG1UserId');

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "ViewStudentInfoEnroll.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = xhr.responseText;
                    ENUserIdDiv.innerHTML = response;
                    ENoverlay.style.display = "flex";
                }
            };
            xhr.send("userId=" + UserId);
        }
    });

    ENcloseoverlayContainer.addEventListener('click', function () {
        ENoverlay.style.display = "none";
    });
}

function ViewProofPayment() {
    let PMoverlay = document.getElementById('PMoverlay');
    let PMUserIdDiv = document.getElementById('PMUserIdDiv');
    let PMcloseoverlayContainer = document.getElementById('PMcloseoverlayContainer');

    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('PaymentInfoStud')) {
            let UserId = event.target.getAttribute('PaymUserId');
            let PaymentID = event.target.getAttribute('PaymentID');

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "FinanceViewProofPayment.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var response = xhr.responseText;
                    PMUserIdDiv.innerHTML = response;
                    PMoverlay.style.display = "flex";
                }
            };
            xhr.send("userId=" + UserId + "&paymentId=" + PaymentID);
        }
    });

    PMcloseoverlayContainer.addEventListener('click', function () {
        PMoverlay.style.display = "none";
    });
}

function MoreActStudEnroll(button, event) {
    var actionsBox = document.querySelector('.actionsBox2');
    var buttonRect = button.getBoundingClientRect();

    actionsBox.style.top = buttonRect.top + 'px';
    actionsBox.style.left = buttonRect.right + 'px';
    actionsBox.classList.toggle('visible2');
    event.stopPropagation();

    let studentID = button.getAttribute('dbG1UserId');
    document.getElementById('ConfirmStudEnroll').studentID = studentID;
}

function MoreActStudEnroll2(button, event) {
    var actionsBox2 = document.querySelector('.actionsBox3');
    var buttonRect2 = button.getBoundingClientRect();

    actionsBox2.style.top = buttonRect2.top + 'px';
    actionsBox2.style.left = buttonRect2.right + 'px';
    actionsBox2.classList.toggle('visible3');
    event.stopPropagation();

    let PaymentID = button.getAttribute('PaymentID');
    document.getElementById('ConfirmPayment').PaymentID = PaymentID;
}


document.getElementById('ConfirmStudEnroll').addEventListener('click', function () {
    let studentID = document.getElementById('ConfirmStudEnroll').studentID;

    pleaseWaitCont.style.display = 'flex';
    StudEnroll(studentID);
});

document.getElementById('ConfirmPayment').addEventListener('click', function () {
    let PaymentID = document.getElementById('ConfirmPayment').PaymentID;

    pleaseWaitCont.style.display = 'flex';
    ConfirmPaymentStud(PaymentID);
});

function StudEnroll(StudentID) {
    var fadeBox = document.getElementById('fadeBox');

    var xhr29 = new XMLHttpRequest();
    xhr29.open("POST", "FinanceUpdateEnroll.php", true);
    xhr29.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr29.onreadystatechange = function () {
        if (xhr29.readyState === 4) {
            if (xhr29.status === 200) {
                fadeIn();

                var response29 = xhr29.responseText;
                fadeBox.innerHTML = response29;
                setTimeout(fadeOut2, 3000);

                setTimeout(() => {
                    fadeOut(pleaseWaitCont);
                }, 200);

                ECoverlay.style.display = "none";
                FetchEnrollments();
            }
        }
    };
    xhr29.send("StudentID=" + StudentID);
}

function ConfirmPaymentStud(PaymentID) {
    var fadeBox = document.getElementById('fadeBox');

    var xhr29 = new XMLHttpRequest();
    xhr29.open("POST", "FinanceConfirmPaymentStud.php", true);
    xhr29.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr29.onreadystatechange = function () {
        if (xhr29.readyState === 4) {
            if (xhr29.status === 200) {
                fadeIn();

                var response29 = xhr29.responseText;
                fadeBox.innerHTML = response29;
                setTimeout(fadeOut2, 3000);

                setTimeout(() => {
                    fadeOut(pleaseWaitCont);
                }, 200);

                Paymoverlay.style.display = "none";
                FetchPaymentTranscactions();
                FetchEnrollments();
            }
        }
    };
    xhr29.send("PaymentID=" + PaymentID);
}

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


function fadeIn() {
    var fadeBox = document.getElementById('fadeBox');
    fadeBox.style.display = 'flex';
    setTimeout(function () {
        fadeBox.style.opacity = '1';
    }, 10);
}


function fadeOut2() {
    var fadeBox = document.getElementById('fadeBox');
    fadeBox.style.opacity = '0';
    setTimeout(function () {
        fadeBox.style.display = 'none';
    }, 500);
}


document.addEventListener('click', function () {
    var actionsBox2 = document.querySelector('.actionsBox2');
    actionsBox2.classList.remove('visible2');
});

document.addEventListener('click', function () {
    var actionsBox3 = document.querySelector('.actionsBox3');
    actionsBox3.classList.remove('visible3');
});



//Call all functions

FetchEnrollments();
EnrollmentMoreInfo();
FetchPaymentTranscactions();
ViewProofPayment();
FetchStudents();