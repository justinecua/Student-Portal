let DashboardTab = document.getElementById('DashboardTab');
let AnnouncementTab = document.getElementById('AnnouncementTab');
let ClassmatesTab = document.getElementById('ClassmatesTab');
let GradesTab = document.getElementById('GradesTab');
let ScheduleTab = document.getElementById('ScheduleTab');
let PaymentsTab = document.getElementById('PaymentsTab');

let DashboardArea = document.getElementById('DashboardArea');
let AnnouncementArea = document.getElementById('ProfileArea');
let ClassmatesArea = document.getElementById('ClassmatesArea');
let GradesArea = document.getElementById('GradesArea');
let ScheduleArea = document.getElementById('ScheduleArea');
let PaymentsArea = document.getElementById('PaymentsArea');

let dashboardImage = document.getElementById('dashboardImage');
let AnnouncementImage = document.getElementById('AnnouncementImage');
let ClassmatesImage = document.getElementById('ClassmatesImage');
let GradesImage = document.getElementById('GradesImage');
let ScheduleImage = document.getElementById('ScheduleImage');
let PaymentImage = document.getElementById('PaymentImage');
let notificationCount = document.getElementById('notification-count');
let MarkNotifAsRead = document.getElementById('MarkNotifAsRead');
let CloseReceipt = document.getElementById('CloseReceipt');
let overlayReceipt = document.getElementById('overlayReceipt');
let CloseReceipt2 = document.getElementById('CloseReceipt2');
let overlayReceipt2 = document.getElementById('overlayReceipt2');
let pleaseWaitCont = document.getElementById('pleaseWaitCont');
let loaderContainer = document.getElementById('loaderContainer');
let fadeBox = document.getElementById('fadeBox');
let overlayAssess = document.getElementById('overlayAssess');
let AsessClose = document.getElementById('AsessClose');
let toggleGroupChat = document.getElementById('toggleGroupChat');
let GCHRightDiv2 = document.getElementById('GCHRightDiv2');

changeToClassmates();

function changeToDashboard() {
    DashboardArea.style.display = "flex";
    DashboardTab.classList.add('activeNav');
    DashboardTab.style.color = "white";
    dashboardImage.src = "images/layout-dashboardw.png";

    AnnouncementArea.style.display = "none";
    AnnouncementTab.classList.remove('activeNav');
    AnnouncementTab.style.color = "#909090";
    AnnouncementImage.src = "images/advertising-megaphone.png";

    ClassmatesArea.style.display = "none";
    ClassmatesTab.classList.remove('activeNav');
    ClassmatesTab.style.color = "#909090";
    ClassmatesImage.src = "images/user-friends-4.png";

    GradesArea.style.display = "none";
    GradesTab.classList.remove('activeNav');
    GradesTab.style.color = "#909090";
    GradesImage.src = "images/graduation-hat.png";

    ScheduleArea.style.display = "none";
    ScheduleTab.classList.remove('activeNav');
    ScheduleTab.style.color = "#909090";
    ScheduleImage.src = "images/calendar-school.png"

    PaymentsArea.style.display = "none";
    PaymentsTab.classList.remove('activeNav');
    PaymentsTab.style.color = "#909090";
    PaymentImage.src = "images/currency-sign-peso-badge.png";

}

function changeToAnnouncements() {
    DashboardArea.style.display = "none";
    DashboardTab.classList.remove('activeNav');
    DashboardTab.style.color = "#909090";
    dashboardImage.src = "images/layout-dashboard.png";

    AnnouncementArea.style.display = "flex";
    AnnouncementTab.classList.add('activeNav');
    AnnouncementTab.style.color = "white";
    AnnouncementImage.src = "images/advertising-megaphonew.png";

    ClassmatesArea.style.display = "none";
    ClassmatesTab.classList.remove('activeNav');
    ClassmatesTab.style.color = "#909090";
    ClassmatesImage.src = "images/user-friends-4.png";

    GradesArea.style.display = "none";
    GradesTab.classList.remove('activeNav');
    GradesTab.style.color = "#909090";
    GradesImage.src = "images/graduation-hat.png";

    ScheduleArea.style.display = "none";
    ScheduleTab.classList.remove('activeNav');
    ScheduleTab.style.color = "#909090";
    ScheduleImage.src = "images/calendar-school.png"

    PaymentsArea.style.display = "none";
    PaymentsTab.classList.remove('activeNav');
    PaymentsTab.style.color = "#909090";
    PaymentImage.src = "images/currency-sign-peso-badge.png";
}

function changeToClassmates() {
    DashboardArea.style.display = "none";
    DashboardTab.classList.remove('activeNav');
    DashboardTab.style.color = "#909090";
    dashboardImage.src = "images/layout-dashboard.png";

    AnnouncementArea.style.display = "none";
    AnnouncementTab.classList.remove('activeNav');
    AnnouncementTab.style.color = "#909090";
    AnnouncementImage.src = "images/advertising-megaphone.png";

    ClassmatesArea.style.display = "flex";
    ClassmatesTab.classList.add('activeNav');
    ClassmatesTab.style.color = "white";
    ClassmatesImage.src = "images/user-friends-4w.png";

    GradesArea.style.display = "none";
    GradesTab.classList.remove('activeNav');
    GradesTab.style.color = "#909090";
    GradesImage.src = "images/graduation-hat.png";

    ScheduleArea.style.display = "none";
    ScheduleTab.classList.remove('activeNav');
    ScheduleTab.style.color = "#909090";
    ScheduleImage.src = "images/calendar-school.png"

    PaymentsArea.style.display = "none";
    PaymentsTab.classList.remove('activeNav');
    PaymentsTab.style.color = "#909090";
    PaymentImage.src = "images/currency-sign-peso-badge.png";
}

function changeToGrades() {
    DashboardArea.style.display = "none";
    DashboardTab.classList.remove('activeNav');
    DashboardTab.style.color = "#909090";
    dashboardImage.src = "images/layout-dashboard.png";

    AnnouncementArea.style.display = "none";
    AnnouncementTab.classList.remove('activeNav');
    AnnouncementTab.style.color = "#909090";
    AnnouncementImage.src = "images/advertising-megaphone.png";

    ClassmatesArea.style.display = "none";
    ClassmatesTab.classList.remove('activeNav');
    ClassmatesTab.style.color = "#909090";
    ClassmatesImage.src = "images/user-friends-4.png";

    GradesArea.style.display = "flex";
    GradesTab.classList.add('activeNav');
    GradesTab.style.color = "white";
    GradesImage.src = "images/graduation-hatw.png";

    ScheduleArea.style.display = "none";
    ScheduleTab.classList.remove('activeNav');
    ScheduleTab.style.color = "#909090";
    ScheduleImage.src = "images/calendar-school.png"

    PaymentsArea.style.display = "none";
    PaymentsTab.classList.remove('activeNav');
    PaymentsTab.style.color = "#909090";
    PaymentImage.src = "images/currency-sign-peso-badge.png";
}

function changeToSchedule() {
    DashboardArea.style.display = "none";
    DashboardTab.classList.remove('activeNav');
    DashboardTab.style.color = "#909090";
    dashboardImage.src = "images/layout-dashboard.png";

    AnnouncementArea.style.display = "none";
    AnnouncementTab.classList.remove('activeNav');
    AnnouncementTab.style.color = "#909090";
    AnnouncementImage.src = "images/advertising-megaphone.png";

    ClassmatesArea.style.display = "none";
    ClassmatesTab.classList.remove('activeNav');
    ClassmatesTab.style.color = "#909090";
    ClassmatesImage.src = "images/user-friends-4.png";

    GradesArea.style.display = "none";
    GradesTab.classList.remove('activeNav');
    GradesTab.style.color = "#909090";
    GradesImage.src = "images/graduation-hat.png";

    ScheduleArea.style.display = "flex";
    ScheduleTab.classList.add('activeNav');
    ScheduleTab.style.color = "white";
    ScheduleImage.src = "images/calendar-schoolw.png"

    PaymentsArea.style.display = "none";
    PaymentsTab.classList.remove('activeNav');
    PaymentsTab.style.color = "#909090";
    PaymentImage.src = "images/currency-sign-peso-badge.png";
}

function changeToPayments() {
    DashboardArea.style.display = "none";
    DashboardTab.classList.remove('activeNav');
    DashboardTab.style.color = "#909090";
    dashboardImage.src = "images/layout-dashboard.png";

    AnnouncementArea.style.display = "none";
    AnnouncementTab.classList.remove('activeNav');
    AnnouncementTab.style.color = "#909090";
    AnnouncementImage.src = "images/advertising-megaphone.png";

    ClassmatesArea.style.display = "none";
    ClassmatesTab.classList.remove('activeNav');
    ClassmatesTab.style.color = "#909090";
    ClassmatesImage.src = "images/user-friends-4.png";

    GradesArea.style.display = "none";
    GradesTab.classList.remove('activeNav');
    GradesTab.style.color = "#909090";
    GradesImage.src = "images/graduation-hat.png";

    ScheduleArea.style.display = "none";
    ScheduleTab.classList.remove('activeNav');
    ScheduleTab.style.color = "#909090";
    ScheduleImage.src = "images/calendar-school.png"

    PaymentsArea.style.display = "flex";
    PaymentsTab.classList.add('activeNav');
    PaymentsTab.style.color = "white";
    PaymentImage.src = "images/currency-sign-peso-badgew.png";
}

GCHRightDiv2.addEventListener('click', function () {
    let GroupChatBox = document.getElementById('GroupChatBox');

    GroupChatBox.style.display = "none";
})
CloseReceipt.addEventListener('click', function () {
    overlayReceipt.style.display = "none";
})
CloseReceipt2.addEventListener('click', function () {
    overlayReceipt2.style.display = "none";
})

toggleGroupChat.addEventListener('click', function () {
    let GroupChatBox = document.getElementById('GroupChatBox');

    GroupChatBox.style.display = "flex";
})

function Notif(button, event) {
    var NotifOverlay = document.querySelector('.NotifOverlay');
    var buttonRect = button.getBoundingClientRect();

    NotifOverlay.style.top = buttonRect.top + 'px';
    NotifOverlay.style.bottom = buttonRect.bottom + 'px';
    NotifOverlay.classList.toggle('visible');
    event.stopPropagation();

    var clickOutsideListener = function (e) {
        var target = e.target;

        // Check if the clicked element is not part of the NotifOverlay
        if (!NotifOverlay.contains(target)) {
            NotifOverlay.classList.remove('visible');
            document.removeEventListener('click', clickOutsideListener);
        }
    };

    document.addEventListener('click', clickOutsideListener);
}


function FetchNotif() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'StudentFetchNotif.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            CheckIfEnrolled();

            var Notifications = document.querySelector('.Notifications');
            Notifications.innerHTML = '';

            Notifications.innerHTML = response;
        }
    }
    xhr.send();
}


function CountNotif() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'StudentCountNotif.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;

            if (response == 0) {
                notificationCount.style.display = "none";
            }
            else {
                notificationCount.innerHTML = response;
            }

        }
    }
    xhr.send();
}

MarkNotifAsRead.addEventListener('click', function () {
    UpdateReadNotif();
    CountNotif();
})


function UpdateReadNotif() {
    let NotifLeftSide = document.querySelectorAll('.NotifLeftSide');
    let NotifIdList = [];
    let timestampList = [];

    NotifLeftSide.forEach(function (NotifDivId) {
        let NotifID = NotifDivId.getAttribute('NotifID');
        let timestamp = NotifDivId.getAttribute('timestamp');
        NotifIdList.push(NotifID);
        timestampList.push(timestamp);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'StudentUpdateNotif.php', true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        var data = 'NotifIDs=' + encodeURIComponent(NotifIdList.join(',')) + '&timestamps=' + encodeURIComponent(timestampList.join(','));
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = xhr.responseText;

                if (response == 0) {
                    notificationCount.style.display = "none";
                }

                FetchNotif();
            }
        }
        xhr.send(data);
    })
}

function CheckIfEnrolled() {
    let CheckStudentID = document.getElementById('CheckStudentID').value;
    let PaymentHeader = document.getElementById('PaymentHeader');

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'StudentCheckIfEnrolled.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    var data = "CheckStudentID=" + CheckStudentID;

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            PaymentHeader.innerHTML = response;
        }
    }
    xhr.send(data);
}

let PCPaymentDate = document.getElementById('PCPaymentDate');

var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = today.getMonth();
var yyyy = today.getFullYear();
var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
var formattedDate = monthNames[mm] + ' ' + dd + ', ' + yyyy;

PCPaymentDate.value = formattedDate;

function CheckStatForPayments() {
    let CheckEnrollStat = document.getElementById('CheckEnrollStat');

    if (CheckEnrollStat.value == "Enrolled") {
        AddPaymentIfEnrolled();
    }
    else if (CheckEnrollStat.value == "Pending") {
        AddPayment();
    }
}

function AddPayment() {
    let SubmitPayment = document.getElementById('SubmitPayment');
    let PCPaymentDate = document.getElementById('PCPaymentDate');

    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = today.getMonth();
    var yyyy = today.getFullYear();

    var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var formattedDate = monthNames[mm] + ' ' + dd + ', ' + yyyy;

    PCPaymentDate.value = formattedDate;

    SubmitPayment.addEventListener('click', function () {

        let PCSendersName = document.getElementById('PCSendersName').value;
        let PCReceiversName = document.getElementById('PCReceiversName').value;
        let PCPaymentAmount = document.getElementById('PCPaymentAmount').value;

        let PCPScreenshot = document.getElementById('PCPScreenshot');
        let PCRefNum = document.getElementById('PCRefNum').value;
        let PCPaymentMethod = document.getElementById('PCPaymentMethod').value;
        let CheckStudentID = document.getElementById('CheckStudentID').value;

        var ValidatedFields = ["PCSendersName", "PCReceiversName", "PCPaymentAmount", "PCPaymentDate", "PCPScreenshot", "PCRefNum"];

        for (var i = 0; i < ValidatedFields.length; i++) {
            let fields = document.getElementById(ValidatedFields[i]);

            if (fields.value.trim() === "") {
                fields.classList.add("custom-focus");
                return;
            }
            else {
                fields.classList.remove("custom-focus");
            }
        }

        var formData = new FormData();
        formData.append("PCPaymentMethod", PCPaymentMethod);
        formData.append("PCSendersName", PCSendersName);
        formData.append("PCReceiversName", PCReceiversName);
        formData.append("PCPaymentAmount", PCPaymentAmount);
        formData.append("PCPaymentDate", PCPaymentDate.value);
        formData.append("PCPScreenshot", PCPScreenshot.files[0]);
        formData.append("PCRefNum", PCRefNum);
        formData.append("CheckStudentID", CheckStudentID);


        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'StudentAddPayment.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                pleaseWaitCont.style.display = 'flex';
                var response = xhr.responseText;

                fadeIn();
                fadeBox.innerHTML = response;
                setTimeout(fadeOut2, 3000);

                setTimeout(() => {
                    fadeOut(pleaseWaitCont);
                }, 200);

                CheckIfEnrolled();
                GenerateReceipt();
            }
        };
        xhr.send(formData);
    });
}

function AddPaymentIfEnrolled() {
    let SubmitPayment = document.getElementById('SubmitPayment');

    SubmitPayment.addEventListener('click', function () {


        let PCSendersName = document.getElementById('PCSendersName').value;
        let PCReceiversName = document.getElementById('PCReceiversName').value;
        let PCPaymentAmount = document.getElementById('PCPaymentAmount').value;

        let PCPScreenshot = document.getElementById('PCPScreenshot');
        let PCRefNum = document.getElementById('PCRefNum').value;
        let PCPaymentMethod = document.getElementById('PCPaymentMethod').value;
        let CheckStudentID = document.getElementById('CheckStudentID').value;

        var ValidatedFields = ["PCSendersName", "PCReceiversName", "PCPaymentAmount", "PCPaymentDate", "PCPScreenshot", "PCRefNum"];

        for (var i = 0; i < ValidatedFields.length; i++) {
            let fields = document.getElementById(ValidatedFields[i]);

            if (fields.value.trim() === "") {
                fields.classList.add("custom-focus");
                return;
            }
            else {
                fields.classList.remove("custom-focus");
            }
        }



        var formData = new FormData();
        formData.append("PCPaymentMethod", PCPaymentMethod);
        formData.append("PCSendersName", PCSendersName);
        formData.append("PCReceiversName", PCReceiversName);
        formData.append("PCPaymentAmount", PCPaymentAmount);
        formData.append("PCPaymentDate", PCPaymentDate.value);
        formData.append("PCPScreenshot", PCPScreenshot.files[0]);
        formData.append("PCRefNum", PCRefNum);
        formData.append("CheckStudentID", CheckStudentID);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'StudentAddPaymentForEnrolled.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                pleaseWaitCont.style.display = 'flex';
                fadeIn();
                var response = xhr.responseText;
                fadeBox.innerHTML = response;
                setTimeout(fadeOut2, 3000);

                setTimeout(() => {
                    fadeOut(pleaseWaitCont);
                }, 200);

                GenerateReceiptForEnrolled();
            }
        };
        xhr.send(formData);
    });
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


function GenerateReceipt() {
    let overlayReceipt = document.getElementById('overlayReceipt');
    let CheckStudentID = document.getElementById('CheckStudentID').value;
    let ReceiptDetails = document.getElementById('ReceiptDetails');

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'StudentGenReceipt.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    var data = "CheckStudentID=" + CheckStudentID;

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            overlayReceipt.style.display = "flex";
            ReceiptDetails.innerHTML = response;
        }
    }
    xhr.send(data);
}

function GenerateReceiptForEnrolled() {
    let overlayReceipt2 = document.getElementById('overlayReceipt2');
    let CheckStudentID = document.getElementById('CheckStudentID').value;
    let ReceiptDetails2 = document.getElementById('ReceiptDetails2');

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'StudentGenReceiptForEnrolled.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    var data = "CheckStudentID=" + CheckStudentID;

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            overlayReceipt2.style.display = "flex";
            ReceiptDetails2.innerHTML = response;
        }
    }
    xhr.send(data);
}

let SelectSubjects = document.getElementById('SelectSubjects');

function DropDownSY() {
    let SelectSubjects = document.getElementById('SelectSubjects');

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'StudentSYDropDown.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            SelectSubjects.innerHTML = response;

        }
    }
    xhr.send();
}

function ShowSubjGrades() {
    let CheckStudentID = document.getElementById('CheckStudentID').value;
    let SelectSubjects = document.getElementById('SelectSubjects');
    let GAContentBottomMain = document.getElementById('GAContentBottomMain');
    let SubjSYID = SelectSubjects.value;

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'StudentShowGrades.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    var data = "CheckStudentID=" + CheckStudentID + "&SubjSYID=" + SubjSYID;

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            GAContentBottomMain.innerHTML = response;

        }
    }
    xhr.send(data);
}

SelectSubjects.addEventListener('change', function () {
    ShowSubjGrades();
});


function ShowAssessment() {
    overlayAssess.style.display = "flex";
}

function CloseAssessment() {
    overlayAssess.style.display = "none";
}

function EditUserProf() {
    let EditProfSave = document.getElementById('EditProfSave');
    let UserStudentID = document.getElementById('UserStudentID');
    let DBUserStudentID = UserStudentID.value;

    EditProfSave.style.display = "flex";
}

function CloseUserProf() {
    let EditProfSave = document.getElementById('EditProfSave');

    EditProfSave.style.display = "none";
}

let ProfileSave = document.getElementById('ProfileSave');
function UpdateUserProf() {

    ProfileSave.addEventListener('click', function () {
        let UserStudentID = document.getElementById('UserStudentID').value;
        let PFFName = document.getElementById('PFFName').value;
        let PFMName = document.getElementById('PFMName').value;
        let PFLName = document.getElementById('PFLName').value;
        let PFGender = document.getElementById('PFGender').value;
        let PFBplace = document.getElementById('PFBplace').value;
        let PFReligion = document.getElementById('PFReligion').value;
        let PFHomeAd = document.getElementById('PFHomeAd').value;
        let PFLastSchool = document.getElementById('PFLastSchool').value;
        let PFContNum = document.getElementById('PFContNum').value;
        let PFEmail = document.getElementById('PFEmail').value;
        let PFFathersName = document.getElementById('PFFathersName').value;
        let PFFathOccu = document.getElementById('PFFathOccu').value;
        let PFMothersName = document.getElementById('PFMothersName').value;
        let PFMothOccu = document.getElementById('PFMothOccu').value;
        let PFEmergPers = document.getElementById('PFEmergPers').value;
        let PFEmergCont = document.getElementById('PFEmergCont').value;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'StudentUpdateProfile.php', true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = xhr.responseText;
                var response = xhr.responseText;

                fadeIn();
                fadeBox.innerHTML = response;
                setTimeout(fadeOut2, 3000);

                setTimeout(() => {
                    fadeOut(pleaseWaitCont);
                }, 200);

            }
        }
        xhr.send("UserStudentID=" + UserStudentID + "&PFFName=" + PFFName + "&PFMName=" + PFMName + "&PFLName=" + PFLName +
            "&PFGender=" + PFGender + "&PFBplace=" + PFBplace + "&PFReligion=" + PFReligion + "&PFHomeAd=" + PFHomeAd +
            "&PFLastSchool=" + PFLastSchool + "&PFContNum=" + PFContNum + "&PFEmail=" + PFEmail + "&PFFathersName=" + PFFathersName +
            "&PFFathOccu=" + PFFathOccu + "&PFMothersName=" + PFMothersName + "&PFMothOccu=" + PFMothOccu + "&PFEmergPers=" + PFEmergPers + "&PFEmergCont="
            + PFEmergCont
        );
    })

}

var conn;

function SendMessageToGC() {
    conn = new WebSocket('ws://localhost:8080');
    conn.onopen = function (e) {
        console.log("Connection established!");
    };

    conn.onmessage = function (e) {
        var receivedMessageElement = document.querySelectorAll('.GCMainContentDiv');

        receivedMessageElement.forEach(function (element) {
            var data = JSON.parse(e.data);
            console.log(data); 

            if(data.from == 'You'){
                element.innerHTML += 
                '<div class="MessageOuterDiv">' +
                 '<div class="MessageTime">' + data.Time + '</div>' +
                    '<div class="MessageHeader">' +
                        '<span id="ChatStudName">' + '</span>' +
                            '<div class="GCMainContentDiv2">' +
                            '<span>' + data.msg + '</span>' +
                            '</div>' +
                    '</div>' +
                   
                '</div>';
            }
            else{
                element.innerHTML += 
                '<div class="MessageOuterDiv2">' +
                    '<div class="UserChatProfile"><img src= '+ data.StudentProf + '>  </div>' +

                    '<div class="MessageHeader">' +
                        '<span id="ChatStudName">' + data.FirstName + '</span>' +
                            '<div class="GCMainContentDiv3">' +
                            '<span>' + data.msg + '</span>' +
                            '</div>' +
                    '</div>' +
                    '<div class="MessageTime2">' + data.Time + '</div>'
                '</div>';
                
            }
           
        });
    };

    let MessageContext = document.getElementById('MessageContext');
    let SendMessage = document.getElementById('SendMessage');
    let GroupChatID = document.getElementById('GroupChatID');
    let UserAccountID = document.getElementById('UserAccountID');
    let MessageConfirmation = document.getElementById('MessageConfirmation');

    function sendMessage() {
        let Message = MessageContext.value;
        let GCID = GroupChatID.value;
        let AccountID = UserAccountID.value;

        if (!MessageContext || !MessageContext.value.trim()) { //if input is empty it wont send
            return;
        }

        var data = {
            AccId: AccountID,
            msg: Message
        };

        conn.send(JSON.stringify(data));
        MessageContext.value = '';
    }

    SendMessage.addEventListener('click', sendMessage);

    MessageContext.addEventListener('keydown', function (e) {
        if (e.key === 'Enter') {
            sendMessage();
        }
    });
}

SendMessageToGC();


/*
function InsertMessage(){
    let MessageContext = document.getElementById('MessageContext');
    let SendMessage = document.getElementById('SendMessage');
    let GroupChatID = document.getElementById('GroupChatID');
    let UserAccountID = document.getElementById('UserAccountID');
    let MessageConfirmation = document.getElementById('MessageConfirmation');

    function sendMessage() {
        let Message = MessageContext.value;
        let GCID = GroupChatID.value;
        let AccountID = UserAccountID.value;

        if (!MessageContext || !MessageContext.value.trim()) { //if input is empty it wont send
            return;
        }

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'StudentInsertMessage.php', true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        var data = "Message=" + Message + "&StudentID=" + AccountID + "&GCID=" + GCID;

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = xhr.responseText;
                //MessageConfirmation.innerHTML = response;
                MessageContext.value = '';
                FetchGCMessages();
            }
        }
        xhr.send(data);
    }

    SendMessage.addEventListener('click', sendMessage);

    MessageContext.addEventListener('keydown', function (e) {
        if (e.key === 'Enter') {
            sendMessage();
        }
    });

}

function FetchGCMessages() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'StudentFetchGCMessages.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;

            let GCMainContentDiv = document.querySelector('.GCMainContentDiv');
            GCMainContentDiv.innerHTML = response;
        }
    }
    xhr.send();
}



function scrollToBottom() {
    var contentBox = document.getElementById('GCContentBox');
    contentBox.scrollTop = contentBox.scrollHeight;
}

InsertMessage();
FetchGCMessages();
*/



FetchNotif();
setInterval(FetchNotif, 60000);
CountNotif();
CheckStatForPayments();
ShowSubjGrades();
DropDownSY();
UpdateUserProf();



