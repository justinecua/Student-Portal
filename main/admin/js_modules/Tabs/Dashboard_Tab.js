let HomeTab = document.getElementById('HomeTab');
let SubjectsTab = document.getElementById('SubjectsTab');
let SchoolFeesTab = document.getElementById('SchoolFeesTab');
let PaymentsTab = document.getElementById('PaymentsTab');
let AccountsTab = document.getElementById('AccountsTab');
let EnrollmentTab = document.getElementById('EnrollmentTab');
let SchoolYearTab = document.getElementById('SchoolYearTab');
let GradeLevelTab = document.getElementById('GradeLevelTab');
let TeachersTab = document.getElementById('TeachersTab');
let EventsTab = document.getElementById('EventsTab');

let HomeArea = document.getElementById('HomeArea');
let SubjectArea = document.getElementById('SubjectArea');
let SchoolFeesArea = document.getElementById('SchoolFeesArea');
let PaymentsArea = document.getElementById('PaymentsArea');
let AccountsArea = document.getElementById('AccountsArea');
let EnrollmentArea = document.getElementById('EnrollmentArea');
let SchoolYearArea = document.getElementById('SchoolYearArea');
let GradeLevelArea = document.getElementById('GradeLevelArea');
let TeachersArea = document.getElementById('TeachersArea');
let EventsArea = document.getElementById('EventsArea');

export function Dashboard_Tab() {
    EventsArea.style.display = "none";
    EventsTab.classList.remove('activeNav');
    EventsTab.style.color = "white";

    HomeArea.style.display = "flex";
    HomeTab.classList.add('activeNav');
    HomeTab.style.color = "#f9ed35";

    SubjectsTab.style.color = "white";
    SubjectArea.style.display = "none";
    SubjectsTab.classList.remove('activeNav');

    SchoolFeesTab.style.color = "white";
    SchoolFeesArea.style.display = "none";
    SchoolFeesTab.classList.remove('activeNav');

    PaymentsArea.style.display = "none";
    PaymentsTab.classList.remove('activeNav');
    PaymentsTab.style.color = "white";

    AccountsArea.style.display = "none";
    AccountsTab.classList.remove('activeNav');
    AccountsTab.style.color = "white";

    EnrollmentArea.style.display = "none";
    EnrollmentTab.classList.remove('activeNav');
    EnrollmentTab.style.color = "white";

    SchoolYearArea.style.display = "none";
    SchoolYearTab.classList.remove('activeNav');
    SchoolYearTab.style.color = "white";

    GradeLevelArea.style.display = "none";
    GradeLevelTab.classList.remove('activeNav');
    GradeLevelTab.style.color = "white";

    TeachersArea.style.display = "none";
    TeachersTab.classList.remove('activeNav');
    TeachersTab.style.color = "white";

    StrandsArea.style.display = "none";
    StrandTab.classList.remove('activeNav');
    StrandTab.style.color = "white";

    SectionArea.style.display = "none";
    SectionTab.classList.remove('activeNav');
    SectionTab.style.color = "white";
}