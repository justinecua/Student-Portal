let DashboardTab = document.getElementById('DashboardTab');
let AnnouncementTab = document.getElementById('AnnouncementTab');
let ClassmatesTab = document.getElementById('ClassmatesTab');
let GradesTab = document.getElementById('GradesTab');
let ScheduleTab = document.getElementById('ScheduleTab');

let DashboardArea = document.getElementById('DashboardArea');
let AnnouncementArea = document.getElementById('AnnouncementArea');
let ClassmatesArea = document.getElementById('ClassmatesArea');
let GradesArea = document.getElementById('GradesArea');
let ScheduleArea = document.getElementById('ScheduleArea');

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
let AddGradeSave = document.getElementById('AddGradeSave');
let AddGradeCancel = document.getElementById('AddGradeCancel');


changeToDashboard();

function changeToDashboard() {
    DashboardArea.style.display = "flex";
    DashboardTab.classList.add('activeNav');
    DashboardTab.style.color = "white";
    dashboardImage.src = "images/layout-dashboardw.png";

    GradesArea.style.display = "none";
    GradesTab.classList.remove('activeNav');
    GradesTab.style.color = "#909090";
    GradesImage.src = "images/graduation-hat.png";


}

/*
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

}
*/
function changeToGrades() {
    DashboardArea.style.display = "none";
    DashboardTab.classList.remove('activeNav');
    DashboardTab.style.color = "#909090";
    dashboardImage.src = "images/layout-dashboard.png";

    GradesArea.style.display = "flex";
    GradesTab.classList.add('activeNav');
    GradesTab.style.color = "white";
    GradesImage.src = "images/graduation-hatw.png";


}

/*
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

}

*/
let AddStudentGrade = document.getElementById('AddStudentGrade');
let StudListDiv = document.getElementById('StudListDiv');
let BarNoteDetails = document.getElementById('BarNoteDetails');

BarNoteDetails.style.display = "flex";
ProgressNote.innerHTML = 'Please select Subject and School Year';

AddGradeCancel.addEventListener('click', function () {

    let GradeInput = document.querySelectorAll('.GradeInput');
    let GradeCheckbox = document.querySelectorAll('.GradeCheckbox');
    let AddGradeSave = document.getElementById('AddGradeSave');
    let StudentGrade = document.querySelectorAll('.StudentGrade');

    StudentGrade.forEach(function (StudentGradeTd) {
        let hiddenContent = StudentGradeTd.querySelector('.HiddenContent');
        if (hiddenContent) {
            hiddenContent.style.display = "flex";
        }
    });

    GradeInput.forEach(function (GInput) {
        GInput.style.display = "none";
    })

    GradeCheckbox.forEach(function (GCheckbox) {
        GCheckbox.style.display = "none";
    })

    AddGradeSave.style.display = "none";
    AddGradeCancel.style.display = "none";
})

/*

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
    let Notifications = document.querySelector('.Notifications');

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'TeachersFetchNotif.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;

            var notifArray = response.split(';'); // Notifications split in ;

            notifArray.forEach(function (notifItem) {
                var NotifSplit = notifItem.split('-');

                if (NotifSplit.length === 2) {
                    var existingNotification = findExistingNotification(NotifSplit[0]);

                    if (existingNotification) {
                        existingNotification.innerHTML = NotifSplit[1];

                        let NotifCircle = document.querySelectorAll('.NotifCircle');
                        NotifCircle.forEach(function (NotifsmallCircle) {
                            NotifsmallCircle.style.display = "flex";
                        });

                    } else {

                        var newNotification = document.createElement('div');
                        newNotification.className = 'NotifCont';
                        newNotification.id = 'Notif_' + NotifSplit[0]; // unique identifier

                        newNotification.innerHTML = NotifSplit[1];
                        Notifications.appendChild(newNotification);

                        let NotifCircle = document.querySelectorAll('.NotifCircle');
                        NotifCircle.forEach(function (NotifsmallCircle) {
                            NotifsmallCircle.style.display = "flex";
                        });

                    }
                }
            });
        }
    }
    xhr.send();
}

function findExistingNotification(identifier) {
    return document.getElementById('Notif_' + identifier);
}
/*
function CountNotif() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'TeacherCountNotif.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;

            if (response == 0) {
                notificationCount.style.display = "none";

                let NotifCircle = document.querySelectorAll('.NotifCircle');
                NotifCircle.forEach(function (NotifsmallCircle) {
                    NotifsmallCircle.style.display = "none";
                });

            }
            else {
                notificationCount.innerHTML = response;
            }

        }
    }
    xhr.send();
}
*/
MarkNotifAsRead.addEventListener('click', function () {
    UpdateReadNotif();
    CountNotif();

    let NotifCircle = document.querySelectorAll('.NotifCircle');
    NotifCircle.forEach(function (NotifsmallCircle) {
        NotifsmallCircle.style.display = "none";
    });
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
        xhr.open('POST', 'TeacherUpdateNotif.php', true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        var data = 'NotifIDs=' + encodeURIComponent(NotifIdList.join(',')) + '&timestamps=' + encodeURIComponent(timestampList.join(','));
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = xhr.responseText;

                if (response == 0) {
                    notificationCount.style.display = "none";

                    let NotifCircle = document.querySelectorAll('.NotifCircle');
                    NotifCircle.forEach(function (NotifsmallCircle) {
                        NotifsmallCircle.style.display = "none";
                    });

                }
                else {
                    console.log(response);

                }
                FetchNotif();
            }
        }
        xhr.send(data);
    })
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


function FetchSubjDropDown() {
    let SelectSubjects = document.getElementById('SelectSubjects');

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'TeachersSubjDropDown.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            SelectSubjects.innerHTML = response;

        }
    }
    xhr.send();
}

function FetchSYDropDown() {
    let SelectSchoolYear = document.getElementById('SelectSchoolYear');

    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'TeachersSYDropDown.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            SelectSchoolYear.innerHTML = response;
        }
    }
    xhr.send();
}


function FetchStudenTsBySec() {
    let SelectSubjects = document.getElementById('SelectSubjects');
    let SelectSchoolYear = document.getElementById('SelectSchoolYear');
    let StudListDiv = document.getElementById('StudListDiv');


    SelectSubjects.addEventListener('change', function () {
        fetchData();
    });

    SelectSchoolYear.addEventListener('change', function () {
        fetchData();
    });

    AddGradeCancel.addEventListener('click', function () {
        fetchData();
    })
    function fetchData() {
        SubjId = SelectSubjects.value;
        SchoolYear = SelectSchoolYear.value;

        if (SubjId === '' || SchoolYear === '') {

        }
        else {
            AddStudentGrade.addEventListener('click', function () {
                let GradeInput = document.querySelectorAll('.GradeInput');
                let GradeCheckbox = document.querySelectorAll('.GradeCheckbox');
                let AddGradeSave = document.getElementById('AddGradeSave');
                let AddGradeCancel = document.getElementById('AddGradeCancel');
                let StudentGrade = document.querySelectorAll('.StudentGrade');

                StudentGrade.forEach(function (StudentGradeTd) {
                    let hiddenContent = StudentGradeTd.querySelector('.HiddenContent');
                    if (hiddenContent) {
                        hiddenContent.style.display = "none";
                    }
                });

                GradeInput.forEach(function (GInput) {
                    GInput.style.display = "flex";
                })

                GradeCheckbox.forEach(function (GCheckbox) {
                    GCheckbox.style.display = "flex";
                })

                AddGradeSave.style.display = "flex";
                AddGradeCancel.style.display = "flex";
            })
        }

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'TeacherFetchStudBySubj.php', true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = xhr.responseText;

                StudListDiv.innerHTML = response;
                BarNoteDetails.style.display = "none";
                ProgressNote.innerHTML = '';

                ResetAccounts();
                AddGradeSave.style.display = "none";
                AddGradeCancel.style.display = "none";
            }
        }
        xhr.send("SubjId=" + SubjId + "&SchoolYear=" + SchoolYear);
    }
}

let accounts = [];
let currentAccount = {};
let SubjId;
let SchoolYear;
let gradePeriodID;
let gradeInput;

function PushToObject(key, value) {
    currentAccount[key] = value;
}

function GetAccID(event) {
    if (event.target.classList.contains('GradeInput')) {
        gradePeriodID = event.target.getAttribute('GradePeriodID');
        gradeInput = event.target.value;

        if (!currentAccount['GradePeriodID']) {
            // Kung wala nag exist c gradingPeriodID, mo create sya ug new object
            currentAccount['GradePeriodID'] = {};
        }

        // Update the GradePeriodID object
        currentAccount['GradePeriodID'][gradePeriodID] = {
            GradeInput: gradeInput
        };
    }

    if (event.target.classList.contains('GradeCheckbox')) {
        let AccStudID = event.target.getAttribute('AccStudID');
        PushToObject('AccID', AccStudID);
        PushToObject('SubjID', SubjId);
        PushToObject('SchoolYearID', SchoolYear);

        if (event.target.checked) {
            accounts.push(currentAccount);
            // Create a new empty account object
            currentAccount = {};

            console.log("Accounts:", accounts);
        }
    }
}

function AddStudGrades() {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'TeacherAddGrades.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    var jsonData = JSON.stringify(accounts);
    xhr.send("data=" + jsonData);
    fadeIn();

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                var response = xhr.responseText;
                fadeBox.innerHTML = response;

                setTimeout(fadeOut2, 3000);
                console.log("Accounts:", accounts);

                FetchStudenTsBySec();
            }
        }
    };
}


document.addEventListener('input', GetAccID);

function ResetAccounts() {
    accounts = [];
}


// Call all Functions
//FetchNotif();
//setInterval(FetchNotif, 60000);
//CountNotif();
FetchSubjDropDown();
FetchSYDropDown();
FetchStudenTsBySec();






