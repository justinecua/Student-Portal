import { FetchCoverPhotos } from "./js_modules/Ajax/FetchCoverPhotos.js";
import { Preview_ECPhotos } from "./js_modules/Ajax/Preview_EventPhotos.js";
import { CreateTags } from "./js_modules/Ajax/AddTags.js";
/*------------------------------------------------- Variables ------------------------------------------------- */

let CancelCoverPhoto = document.getElementById('CancelCoverPhoto');
let AddCPBtn = document.getElementById('AddCPBtn');
let EventsOverlay = document.getElementById('EventsOverlay');
let UploadEventsBtn = document.getElementById('UploadEventsBtn');
let CancelPost = document.getElementById('CancelPost');

let DashboardTab = document.getElementById('HomeTab');
let SubjectsTab = document.getElementById('SubjectsTab');
let SchoolFeesTab = document.getElementById('SchoolFeesTab');
let PaymentsTab = document.getElementById('PaymentsTab');
let AccountsTab = document.getElementById('AccountsTab');
let EnrollmentTab = document.getElementById('EnrollmentTab');
let SchoolYearTab = document.getElementById('SchoolYearTab');
let GradeLevelTab = document.getElementById('GradeLevelTab');
let TeachersTab = document.getElementById('TeachersTab');
let EventsTab = document.getElementById('EventsTab');

let DashboardArea = document.getElementById('HomeArea');
let SubjectArea = document.getElementById('SubjectArea');
let SchoolFeesArea = document.getElementById('SchoolFeesArea');
let PaymentsArea = document.getElementById('PaymentsArea');
let AccountsArea = document.getElementById('AccountsArea');
let EnrollmentArea = document.getElementById('EnrollmentArea');
let SchoolYearArea = document.getElementById('SchoolYearArea');
let GradeLevelArea = document.getElementById('GradeLevelArea');
let TeachersArea = document.getElementById('TeachersArea');
let EventsArea = document.getElementById('EventsArea');

/*------------------------------------------------- Listeners ------------------------------------------------- */

//CoverPhotos
AddCPBtn.addEventListener('click', function(){
    CPoverlay.style.display = "flex";
})

CancelCoverPhoto.addEventListener('click', function(){
    CPoverlay.style.display = "none";
})

//Events
UploadEventsBtn.addEventListener('click', function(){
    EventsOverlay.style.display = "flex";
    let EvMainCont = document.querySelector(".EvMainCont");
    EvMainCont.scrollTop = 0;
})

CancelPost.addEventListener('click', function(){
    EventsOverlay.style.display = "none";
})


const { Preview_CoverPhotos } = await import ("./js_modules/Ajax/Preview_CoverPhotos.js");
Preview_CoverPhotos();
Preview_ECPhotos();
CreateTags();



/*------------------------------------------------------ Tabs --------------------------------------------------------------*/
let hasCalled = false;
let tabs = [HomeTab, SubjectsTab, SchoolFeesTab, PaymentsTab, AccountsTab, EnrollmentTab, SchoolYearTab, GradeLevelTab, TeachersTab, EventsTab];
let areas = [HomeArea, SubjectArea, SchoolFeesArea, PaymentsArea, AccountsArea, EnrollmentArea, SchoolYearArea, GradeLevelArea, TeachersArea, EventsArea];

EventsTab.addEventListener('click', async () =>{
    const { switchTab } = await import ("./js_modules/Tabs/switch_Tabs.js");
    switchTab(EventsTab, EventsArea, tabs, areas);

    if(!hasCalled){
        FetchCoverPhotos();
        hasCalled = true;
    }
    
})

DashboardTab.addEventListener('click', async() =>{
    const { switchTab } = await import  ("./js_modules/Tabs/switch_Tabs.js");
    switchTab(DashboardTab, DashboardArea, tabs, areas);
})

AccountsTab.addEventListener('click', async() => {
    const { switchTab } = await import  ("./js_modules/Tabs/switch_Tabs.js");
    switchTab(AccountsTab, AccountsArea, tabs, areas);

    const { FetchEnrolledStudent } = await import ("./js_modules/Ajax/FetchEnrolledStudents.js");
    FetchEnrolledStudent();
})

EnrollmentTab.addEventListener('click', async() => {
    const { switchTab } = await import  ("./js_modules/Tabs/switch_Tabs.js");
    switchTab(EnrollmentTab, EnrollmentArea, tabs, areas);
})