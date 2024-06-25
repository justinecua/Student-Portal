//------------------------------G1 to G10 Enrollment--------------------------------------

let getCurrentDate = () => {
    let currentDate = document.getElementById('KEnrollmentDate');
    let thisSchoolYear = document.getElementById('KSchoolYear');
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = today.getMonth();
    var yyyy = today.getFullYear();
    var nextSY = today.getFullYear() + 1;
    var SchoolYear = yyyy + '-' + nextSY;

    var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var formattedDate = monthNames[mm] + ' ' + dd + ', ' + yyyy;

    currentDate.value = formattedDate;
}



//---------------Get Input from Student Pic------------------
//student Pic

let uploadforStudPic = () => {
    let studPic = document.getElementById('KstudPic');
    let getInputForStudPic = document.getElementById('inputKstudPic');
    let StudFileName = document.getElementById('FileNameofStudPic');
    let StudFileNameCont = document.getElementById('FileNameofStudPicContainer');
    let StudPicviewImage = document.getElementById('StudPicviewImage');
    let StudPiccloseOverlay = document.getElementById('closeModalViewImageStudPic');
    let StudPicimageContainer = document.getElementById('imageToDisplayStudPic');
    let overlayShowImage = document.getElementById('overlayStudPic');

    studPic.addEventListener('click', function () {
        getInputForStudPic.click();
    })
    getInputForStudPic.addEventListener('change', showFileNameStudPic);

    function showFileNameStudPic() {
        var fileName = getInputForStudPic.files[0].name;
        StudFileNameCont.style.display = "flex";
        StudFileName.textContent = fileName;
    }

    StudPicviewImage.addEventListener('click', function () {
        let selectedFileStudPic = getInputForStudPic.files[0];

        if (selectedFileStudPic) {
            StudFileNameCont.style.display = "flex";
            StudPicviewImage.style.display = "block";

            let fileURL = URL.createObjectURL(selectedFileStudPic); //URL for the selected file
            StudPicimageContainer.src = fileURL;
            overlayShowImage.style.display = "flex";
            overlayShowImage.style.position = "fixed";

        } else {
            alert('No file selected');
        }
    });

    //close popupimage StudPic
    StudPiccloseOverlay.addEventListener('click', function () {
        overlayShowImage.style.display = "none";
        overlayShowImage.style.position = "absolute";
    })
}

//Form138
let uploadforForm138 = () => {
    let KstudForm138 = document.getElementById('KstudForm138');
    let getKstudForm138 = document.getElementById('inputKstudForm138');
    let FileNameofForm138Container = document.getElementById('FileNameofForm138Container');
    let FileNameofForm138 = document.getElementById('FileNameofForm138');
    let Form138viewImage = document.getElementById('Form138viewImage');
    let imageToDisplayForm138 = document.getElementById('imageToDisplayForm138');
    let overlayForm138 = document.getElementById('overlayForm138');
    let closeModalViewImageForm138 = document.getElementById('closeModalViewImageForm138');

    KstudForm138.addEventListener('click', function () {
        getKstudForm138.click();
    })
    getKstudForm138.addEventListener('change', showFileNameForm138);

    function showFileNameForm138() {
        var fileNameForm138 = getKstudForm138.files[0].name;
        FileNameofForm138Container.style.display = "flex";
        FileNameofForm138.textContent = fileNameForm138;
    }

    Form138viewImage.addEventListener('click', function () {
        let selectedFileForm138 = getKstudForm138.files[0];

        if (selectedFileForm138) {
            FileNameofForm138Container.style.display = "flex";
            Form138viewImage.style.display = "block";

            let fileUrlForm138 = URL.createObjectURL(selectedFileForm138);
            imageToDisplayForm138.src = fileUrlForm138;
            overlayForm138.style.display = "flex";
            overlayForm138.style.position = "fixed";

        } else {
            alert('No file selected');
        }
    })
    //close popupimage StudPic
    closeModalViewImageForm138.addEventListener('click', function () {
        overlayForm138.style.display = "none";
        overlayForm138.style.position = "absolute";
    })
}

//PSA
let uploadforPSA = () => {
    let KstudPSA = document.getElementById('KstudPSA');
    let getInputKstudPSA = document.getElementById('inputKstudPSA');
    let FileNameofPSAContainer = document.getElementById('FileNameofPSAContainer');
    let FileNameofPSA = document.getElementById('FileNameofPSA');
    let PSAviewImage = document.getElementById('PSAviewImage');
    let imageToDisplayPSA = document.getElementById('imageToDisplayPSA');
    let overlayPSA = document.getElementById('overlayPSA');
    let closeModalViewImagePSA = document.getElementById('closeModalViewImagePSA');

    KstudPSA.addEventListener('click', function () {
        getInputKstudPSA.click();
    })
    getInputKstudPSA.addEventListener('change', showFileNamePSA);

    function showFileNamePSA() {
        var fileNamePSA = getInputKstudPSA.files[0].name;
        FileNameofPSAContainer.style.display = "flex";
        FileNameofPSA.textContent = fileNamePSA;
    }

    PSAviewImage.addEventListener('click', function () {
        let selectedFilePSA = getInputKstudPSA.files[0];

        if (selectedFilePSA) {
            FileNameofPSAContainer.style.display = "flex";
            PSAviewImage.style.display = "block";

            let fileNamePSA = URL.createObjectURL(selectedFilePSA);
            imageToDisplayPSA.src = fileNamePSA;
            overlayPSA.style.display = "flex";
            overlayPSA.style.position = "fixed";
        }
        else {
            alert("No Image Selected");
        }
    })
    closeModalViewImagePSA.addEventListener('click', function () {
        overlayPSA.style.display = "none";
        overlayPSA.style.position = "absolute";
    })
}

//Certificate of Good Moral Character
let uploadforGoodMoral = () => {
    let KstudGoodMoral = document.getElementById('KstudGoodMoral');
    let getinputKGoodMoral = document.getElementById('inputKGoodMoral');
    let FileNameofGoodMoralContainer = document.getElementById('FileNameofGoodMoralContainer');
    let FileNameofGoodMoral = document.getElementById('FileNameofGoodMoral');
    let GoodMoralviewImage = document.getElementById('GoodMoralviewImage');
    let imageToDisplayGoodMoral = document.getElementById('imageToDisplayGoodMoral');
    let overlayGoodMoral = document.getElementById('overlayGoodMoral');
    let closeModalViewImageGoodMoral = document.getElementById('closeModalViewImageGoodMoral');

    KstudGoodMoral.addEventListener('click', function () {
        getinputKGoodMoral.click();
    })
    getinputKGoodMoral.addEventListener('change', showFileNameGoodMoral);

    function showFileNameGoodMoral() {
        var fileNameGoodMoral = getinputKGoodMoral.files[0].name;
        FileNameofGoodMoralContainer.style.display = "flex";
        FileNameofGoodMoral.textContent = fileNameGoodMoral;
    }

    GoodMoralviewImage.addEventListener('click', function () {
        let selectedFileGoodMoral = getinputKGoodMoral.files[0];

        if (selectedFileGoodMoral) {
            FileNameofGoodMoralContainer.style.display = "flex";
            GoodMoralviewImage.style.display = "block";

            let fileNameGoodMoral = URL.createObjectURL(selectedFileGoodMoral);
            imageToDisplayGoodMoral.src = fileNameGoodMoral;
            overlayGoodMoral.style.display = "flex";
            overlayGoodMoral.style.position = "fixed";

        } else {
            alert('No image Selected');
        }
    })

    closeModalViewImageGoodMoral.addEventListener('click', function () {
        overlayGoodMoral.style.display = "none";
        overlayGoodMoral.style.position = "absolute";
    })

}

function validateForm() {
    var requiredFields = ["KEnrollmentDate", "KSchoolYear", "KStatus", "KLrn", "KIncomingLevel", "KFirstName", "KMiddleName",
        "KLastName", "KGender", "KBirthPlace", "KBirthDay", "KReligion", "KContactNumber", "KHomeAddress", "KLastSchool", "KEmailAddress",
        "KPassword", "KFathersName", "KFathersOcupation", "KMothersName", "KMothersOcupation", "KEmergPerson", "KEmergNumber"];

    for (var i = 0; i < requiredFields.length; i++) {
        var field = document.getElementById(requiredFields[i]);
        if (field.value.trim() === "") {
            field.classList.add("custom-focus");
            field.scrollIntoView({ behavior: 'smooth', block: 'center' });
            return false;
        }
    }
    return true;
}

//------------------------------SHS Enrollment--------------------------------------

let SHSgetCurrentDate = () => {
    let SHSEnrollmentDate = document.getElementById('SHSEnrollmentDate');
    let SHSSchoolYear= document.getElementById('SHSSchoolYear');
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = today.getMonth();
    var yyyy = today.getFullYear();
    var nextSY = today.getFullYear() + 1;
    var SchoolYear = yyyy + '-' + nextSY;

    var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var formattedDate = monthNames[mm] + ' ' + dd + ', ' + yyyy;

    SHSEnrollmentDate.value = formattedDate;
   
}



//---------------Get Input from Student Pic------------------
// SHS Student Pic

let SHSuploadforStudPic = () => {
    let SHSstudPic = document.getElementById('SHSstudPic');
    let inputSHSstudPic = document.getElementById('inputSHSstudPic');
    let SHSFileNameofStudPic = document.getElementById('SHSFileNameofStudPic');
    let SHSFileNameofStudPicContainer = document.getElementById('SHSFileNameofStudPicContainer');
    let SHSStudPicviewImage = document.getElementById('SHSStudPicviewImage');
    let SHScloseModalViewImageStudPic = document.getElementById('SHScloseModalViewImageStudPic');
    let SHSimageToDisplayStudPic = document.getElementById('SHSimageToDisplayStudPic');
    let SHSoverlayStudPic= document.getElementById('SHSoverlayStudPic');

    SHSstudPic.addEventListener('click', function () {
        inputSHSstudPic.click();
    })
    inputSHSstudPic.addEventListener('change', showFileNameStudPic);

    function showFileNameStudPic() {
        var SHSfileName = inputSHSstudPic.files[0].name;
        SHSFileNameofStudPicContainer.style.display = "flex";
        SHSFileNameofStudPic.textContent = SHSfileName;
    }

    SHSStudPicviewImage.addEventListener('click', function () {
        let SHSselectedFileStudPic = inputSHSstudPic.files[0];

        if (SHSselectedFileStudPic) {
            SHSFileNameofStudPicContainer.style.display = "flex";
            SHSStudPicviewImage.style.display = "block";

            let SHSfileURL = URL.createObjectURL(SHSselectedFileStudPic); //URL for the selected file
            SHSimageToDisplayStudPic.src = SHSfileURL;
            SHSoverlayStudPic.style.display = "flex";
            SHSoverlayStudPic.style.position = "fixed";

        } else {
            alert('No file selected');
        }
    });

    //close popupimage StudPic
    SHScloseModalViewImageStudPic.addEventListener('click', function () {
        SHSoverlayStudPic.style.display = "none";
        SHSoverlayStudPic.style.position = "absolute";
    })
}

//SHS Form138
let SHSuploadforForm138 = () => {
    let SHSstudForm138 = document.getElementById('SHSstudForm138');
    let inputSHSstudForm138 = document.getElementById('inputSHSstudForm138');
    let SHSFileNameofForm138Container = document.getElementById('SHSFileNameofForm138Container');
    let SHSFileNameofForm138 = document.getElementById('SHSFileNameofForm138');
    let SHSForm138viewImage = document.getElementById('SHSForm138viewImage');
    let SHSimageToDisplayForm138 = document.getElementById('SHSimageToDisplayForm138');
    let SHSoverlayForm138 = document.getElementById('SHSoverlayForm138');
    let SHScloseModalViewImageForm138= document.getElementById('SHScloseModalViewImageForm138');

    SHSstudForm138.addEventListener('click', function () {
        inputSHSstudForm138.click();
    })
    inputSHSstudForm138.addEventListener('change', showFileNameForm138);

    function showFileNameForm138() {
        var SHSfileNameForm138 = inputSHSstudForm138.files[0].name;
        SHSFileNameofForm138Container.style.display = "flex";
        SHSFileNameofForm138.textContent = SHSfileNameForm138;
    }

    SHSForm138viewImage.addEventListener('click', function () {
        let SHSselectedFileForm138 = inputSHSstudForm138.files[0];

        if (SHSselectedFileForm138) {
            SHSFileNameofForm138Container.style.display = "flex";
            SHSForm138viewImage.style.display = "block";

            let fileUrlForm138 = URL.createObjectURL(SHSselectedFileForm138);
            SHSimageToDisplayForm138.src = fileUrlForm138;
            SHSoverlayForm138.style.display = "flex";
            SHSoverlayForm138.style.position = "fixed";

        } else {
            alert('No file selected');
        }
    })
    //close popupimage StudPic
    SHScloseModalViewImageForm138.addEventListener('click', function () {
        SHSoverlayForm138.style.display = "none";
        SHSoverlayForm138.style.position = "absolute";
    })
}

//SHS PSA
let SHSuploadforPSA = () => {
    let SHSstudPSA = document.getElementById('SHSstudPSA');
    let inputSHSstudPSA = document.getElementById('inputSHSstudPSA');
    let SHSFileNameofPSAContainer = document.getElementById('SHSFileNameofPSAContainer');
    let SHSFileNameofPSA = document.getElementById('SHSFileNameofPSA');
    let SHSPSAviewImage = document.getElementById('SHSPSAviewImage');
    let SHSimageToDisplayPSA = document.getElementById('SHSimageToDisplayPSA');
    let SHSoverlayPSA = document.getElementById('SHSoverlayPSA');
    let SHScloseModalViewImagePSA = document.getElementById('SHScloseModalViewImagePSA');

    SHSstudPSA.addEventListener('click', function () {
        inputSHSstudPSA.click();
    })
    inputSHSstudPSA.addEventListener('change', showFileNamePSA);

    function showFileNamePSA() {
        var SHSfileNamePSA = inputSHSstudPSA.files[0].name;
        SHSFileNameofPSAContainer.style.display = "flex";
        SHSFileNameofPSA.textContent = SHSfileNamePSA;
    }

    SHSPSAviewImage.addEventListener('click', function () {
        let SHSelectedFilePSA = inputSHSstudPSA.files[0];

        if (SHSelectedFilePSA) {
            SHSFileNameofPSAContainer.style.display = "flex";
            SHSPSAviewImage.style.display = "block";

            let fileNamePSA = URL.createObjectURL(SHSelectedFilePSA);
            SHSimageToDisplayPSA.src = fileNamePSA;
            SHSoverlayPSA.style.display = "flex";
            SHSoverlayPSA.style.position = "fixed";
        }
        else {
            alert("No Image Selected");
        }
    })
    SHScloseModalViewImagePSA.addEventListener('click', function () {
        SHSoverlayPSA.style.display = "none";
        SHSoverlayPSA.style.position = "absolute";
    })
}

// SHS Certificate of Good Moral Character
let SHSuploadforGoodMoral = () => {
    let SHSstudGoodMoral = document.getElementById('SHSstudGoodMoral');
    let inputSHSGoodMoral = document.getElementById('inputSHSGoodMoral');
    let SHSFileNameofGoodMoralContainer = document.getElementById('SHSFileNameofGoodMoralContainer');
    let SHSFileNameofGoodMoral = document.getElementById('SHSFileNameofGoodMoral');
    let SHSGoodMoralviewImage = document.getElementById('SHSGoodMoralviewImage');
    let SHSimageToDisplayGoodMoral = document.getElementById('SHSimageToDisplayGoodMoral');
    let SHSoverlayGoodMoral = document.getElementById('SHSoverlayGoodMoral');
    let SHScloseModalViewImageGoodMoral = document.getElementById('SHScloseModalViewImageGoodMoral');

    SHSstudGoodMoral.addEventListener('click', function () {
        inputSHSGoodMoral.click();
    })
    inputSHSGoodMoral.addEventListener('change', showFileNameGoodMoral);

    function showFileNameGoodMoral() {
        var SHSfileNameGoodMoral = inputSHSGoodMoral.files[0].name;
        SHSFileNameofGoodMoralContainer.style.display = "flex";
        SHSFileNameofGoodMoral.textContent = SHSfileNameGoodMoral;
    }

    SHSGoodMoralviewImage.addEventListener('click', function () {
        let SHSselectedFileGoodMoral = inputSHSGoodMoral.files[0];

        if (SHSselectedFileGoodMoral) {
            SHSFileNameofGoodMoralContainer.style.display = "flex";
            SHSGoodMoralviewImage.style.display = "block";

            let fileNameGoodMoral = URL.createObjectURL(SHSselectedFileGoodMoral);
            SHSimageToDisplayGoodMoral.src = fileNameGoodMoral;
            SHSoverlayGoodMoral.style.display = "flex";
            SHSoverlayGoodMoral.style.position = "fixed";

        } else {
            alert('No image Selected');
        }
    })

    SHScloseModalViewImageGoodMoral.addEventListener('click', function () {
        SHSoverlayGoodMoral.style.display = "none";
        SHSoverlayGoodMoral.style.position = "absolute";
    })

}

//SHS Certificate of Completion
let SHSuploadforCertCompl = () => {
    let SHSstudCertCompl = document.getElementById('SHSstudCertCompl');
    let inputSHSCertCompl = document.getElementById('inputSHSCertCompl');
    let SHSFileNameofCertComplContainer = document.getElementById('SHSFileNameofCertComplContainer');
    let SHSFileNameofCertCompl = document.getElementById('SHSFileNameofCertCompl');
    let SHSCertComplviewImage = document.getElementById('SHSCertComplviewImage');
    let SHSimageToDisplayCertCompl = document.getElementById('SHSimageToDisplayCertCompl');
    let SHSoverlayCertCompl = document.getElementById('SHSoverlayCertCompl');
    let SHScloseModalViewImageCertCompl = document.getElementById('SHScloseModalViewImageCertCompl');

    SHSstudCertCompl.addEventListener('click', function () {
        inputSHSCertCompl.click();
    })
    inputSHSCertCompl.addEventListener('change', showFileNameGoodMoral);

    function showFileNameGoodMoral() {
        var SHSfileNameCertCompl = inputSHSCertCompl.files[0].name;
        SHSFileNameofCertComplContainer.style.display = "flex";
        SHSFileNameofCertCompl.textContent = SHSfileNameCertCompl;
    }

    SHSCertComplviewImage.addEventListener('click', function () {
        let SHSselectedFileCertCompl = inputSHSCertCompl.files[0];

        if (SHSselectedFileCertCompl) {
            SHSFileNameofCertComplContainer.style.display = "flex";
            SHSCertComplviewImage.style.display = "block";

            let fileNameCertCompl = URL.createObjectURL(SHSselectedFileCertCompl);
            SHSimageToDisplayCertCompl.src = fileNameCertCompl;
            SHSoverlayCertCompl.style.display = "flex";
            SHSoverlayCertCompl.style.position = "fixed";

        } else {
            alert('No image Selected');
        }
    })

    SHScloseModalViewImageCertCompl.addEventListener('click', function () {
        SHSoverlayCertCompl.style.display = "none";
        SHSoverlayCertCompl.style.position = "absolute";
    })

}
function SHSvalidateForm() {
    var SHSrequiredFields = ["SHSEnrollmentDate", "SHSSchoolYear", "SHSStatus", "SHSLrn", "SHSIncomingLevel", "SHSFirstName", "SHSMiddleName",
        "SHSLastName", "SHSGender", "SHSBirthPlace", "SHSBirthDay", "SHSReligion", "SHSContactNumber", "SHSHomeAddress", "SHSLastSchool", "SHSEmailAddress",
        "SHSPassword", "SHSFathersName", "SHSFathersOcupation", "SHSMothersName", "SHSMothersOcupation", "SHSEmergPerson", "SHSEmergNumber"];

    for (var i = 0; i < SHSrequiredFields.length; i++) {
        var SHSfield = document.getElementById(SHSrequiredFields[i]);
        if (SHSfield.value.trim() === "") {
            SHSfield.classList.add("custom-focus");
            SHSfield.scrollIntoView({ behavior: 'smooth', block: 'center' });
            return false;
        }
        else{
            SHSfield.classList.remove("custom-focus");
        }
    }
    return true;
}

//------------------------------TESDA Enrollment--------------------------------------

let TgetCurrentDate = () => {
    let TEnrollmentDate = document.getElementById('TEnrollmentDate');
    let TSchoolYear= document.getElementById('TSchoolYear');
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = today.getMonth();
    var yyyy = today.getFullYear();
    var nextSY = today.getFullYear() + 1;
    var SchoolYear = yyyy + '-' + nextSY;

    var monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var formattedDate = monthNames[mm] + ' ' + dd + ', ' + yyyy;

    TEnrollmentDate.value = formattedDate;
}



//---------------Get Input from Student Pic------------------
// T Student Pic

let TuploadforIdPic = () => {
    let TIdPic = document.getElementById('TIdPic');
    let inputTIdPic = document.getElementById('inputTIdPic');
    let TFileNameofIdPic = document.getElementById('TFileNameofIdPic');
    let TFileNameofIdPicContainer = document.getElementById('TFileNameofIdPicContainer');
    let TIdPicviewImage = document.getElementById('TIdPicviewImage');
    let TcloseModalViewImageIdPic = document.getElementById('TcloseModalViewImageIdPic');
    let TimageToDisplayIdPic = document.getElementById('TimageToDisplayIdPic');
    let ToverlayIdPic= document.getElementById('ToverlayIdPic');

    TIdPic.addEventListener('click', function () {
        inputTIdPic.click();
    })
    inputTIdPic.addEventListener('change', showFileNameIdPic);

    function showFileNameIdPic() {
        var TfileName = inputTIdPic.files[0].name;
        TFileNameofIdPicContainer.style.display = "flex";
        TFileNameofIdPic.textContent = TfileName;
    }

    TIdPicviewImage.addEventListener('click', function () {
        let TselectedFileIdPic = inputTIdPic.files[0];

        if (TselectedFileIdPic) {
            TFileNameofIdPicContainer.style.display = "flex";
            TIdPicviewImage.style.display = "block";

            let TfileURL = URL.createObjectURL(TselectedFileIdPic); //URL for the selected file
            TimageToDisplayIdPic.src = TfileURL;
            ToverlayIdPic.style.display = "flex";
            ToverlayIdPic.style.position = "fixed";

        } else {
            alert('No file selected');
        }
    });

    //close popupimage IdPic
    TcloseModalViewImageIdPic.addEventListener('click', function () {
        ToverlayIdPic.style.display = "none";
        ToverlayIdPic.style.position = "absolute";
    })
}

//T Form138
let TuploadforTransRec = () => {
    let TstudTransRec = document.getElementById('TstudTransRec');
    let inputTstudTransRec = document.getElementById('inputTstudTransRec');
    let TFileNameofTransRecContainer = document.getElementById('TFileNameofTransRecContainer');
    let TFileNameofTransRec = document.getElementById('TFileNameofTransRec');
    let TTransRecviewImage = document.getElementById('TTransRecviewImage');
    let TimageToDisplayTransRec = document.getElementById('TimageToDisplayTransRec');
    let ToverlayTransRec = document.getElementById('ToverlayTransRec');
    let TcloseModalViewImageTransRec= document.getElementById('TcloseModalViewImageTransRec');

    TstudTransRec.addEventListener('click', function () {
        inputTstudTransRec.click();
    })
    inputTstudTransRec.addEventListener('change', showFileNameTransRec);

    function showFileNameTransRec() {
        var TfileNameTransRec = inputTstudTransRec.files[0].name;
        TFileNameofTransRecContainer.style.display = "flex";
        TFileNameofTransRec.textContent = TfileNameTransRec;
    }

    TTransRecviewImage.addEventListener('click', function () {
        let TselectedFileTransRec = inputTstudTransRec.files[0];

        if (TselectedFileTransRec) {
            TFileNameofTransRecContainer.style.display = "flex";
            TTransRecviewImage.style.display = "block";

            let fileUrlTransRec = URL.createObjectURL(TselectedFileTransRec);
            TimageToDisplayTransRec.src = fileUrlTransRec;
            ToverlayTransRec.style.display = "flex";
            ToverlayTransRec.style.position = "fixed";

        } else {
            alert('No file selected');
        }
    })
    //close popupimage StudPic
    TcloseModalViewImageTransRec.addEventListener('click', function () {
        ToverlayTransRec.style.display = "none";
        ToverlayTransRec.style.position = "absolute";
    })
}

//T PSA
let TuploadforPSA = () => {
    let TstudPSA = document.getElementById('TstudPSA');
    let inputTstudPSA = document.getElementById('inputTstudPSA');
    let TFileNameofPSAContainer = document.getElementById('TFileNameofPSAContainer');
    let TFileNameofPSA = document.getElementById('TFileNameofPSA');
    let TPSAviewImage = document.getElementById('TPSAviewImage');
    let TimageToDisplayPSA = document.getElementById('TimageToDisplayPSA');
    let ToverlayPSA = document.getElementById('ToverlayPSA');
    let TcloseModalViewImagePSA = document.getElementById('TcloseModalViewImagePSA');

    TstudPSA.addEventListener('click', function () {
        inputTstudPSA.click();
    })
    inputTstudPSA.addEventListener('change', showFileNamePSA);

    function showFileNamePSA() {
        var TfileNamePSA = inputTstudPSA.files[0].name;
        TFileNameofPSAContainer.style.display = "flex";
        TFileNameofPSA.textContent = TfileNamePSA;
    }

    TPSAviewImage.addEventListener('click', function () {
        let TelectedFilePSA = inputTstudPSA.files[0];

        if (TelectedFilePSA) {
            TFileNameofPSAContainer.style.display = "flex";
            TPSAviewImage.style.display = "block";

            let fileNamePSA = URL.createObjectURL(TelectedFilePSA);
            TimageToDisplayPSA.src = fileNamePSA;
            ToverlayPSA.style.display = "flex";
            ToverlayPSA.style.position = "fixed";
        }
        else {
            alert("No Image Selected");
        }
    })
    TcloseModalViewImagePSA.addEventListener('click', function () {
        ToverlayPSA.style.display = "none";
        ToverlayPSA.style.position = "absolute";
    })
}

// T Certificate of Good Moral Character
let TuploadforGoodMoral = () => {
    let TstudGoodMoral = document.getElementById('TstudGoodMoral');
    let inputTGoodMoral = document.getElementById('inputTGoodMoral');
    let TFileNameofGoodMoralContainer = document.getElementById('TFileNameofGoodMoralContainer');
    let TFileNameofGoodMoral = document.getElementById('TFileNameofGoodMoral');
    let TGoodMoralviewImage = document.getElementById('TGoodMoralviewImage');
    let TimageToDisplayGoodMoral = document.getElementById('TimageToDisplayGoodMoral');
    let ToverlayGoodMoral = document.getElementById('ToverlayGoodMoral');
    let TcloseModalViewImageGoodMoral = document.getElementById('TcloseModalViewImageGoodMoral');

    TstudGoodMoral.addEventListener('click', function () {
        inputTGoodMoral.click();
    })
    inputTGoodMoral.addEventListener('change', showFileNameGoodMoral);

    function showFileNameGoodMoral() {
        var TfileNameGoodMoral = inputTGoodMoral.files[0].name;
        TFileNameofGoodMoralContainer.style.display = "flex";
        TFileNameofGoodMoral.textContent = TfileNameGoodMoral;
    }

    TGoodMoralviewImage.addEventListener('click', function () {
        let TselectedFileGoodMoral = inputTGoodMoral.files[0];

        if (TselectedFileGoodMoral) {
            TFileNameofGoodMoralContainer.style.display = "flex";
            TGoodMoralviewImage.style.display = "block";

            let fileNameGoodMoral = URL.createObjectURL(TselectedFileGoodMoral);
            TimageToDisplayGoodMoral.src = fileNameGoodMoral;
            ToverlayGoodMoral.style.display = "flex";
            ToverlayGoodMoral.style.position = "fixed";

        } else {
            alert('No image Selected');
        }
    })

    TcloseModalViewImageGoodMoral.addEventListener('click', function () {
        ToverlayGoodMoral.style.display = "none";
        ToverlayGoodMoral.style.position = "absolute";
    })

}


function TvalidateForm() {
    var TrequiredFields = ["TEnrollmentDate", "TSchoolYear", "TStatus", "TSemester", "TEducAttain", "TFirstName", "TMiddleName",
        "TLastName", "TGender", "TBirthPlace", "TBirthDay", "TReligion", "TContactNumber", "THomeAddress", "TLastSchool", 
        "TCivilStat", "TEmploymentStat", "TEmailAddress",
        "TPassword", "TFathersName", "TFathersOcupation", "TMothersName", "TMothersOcupation", "TEmergPerson", "TEmergNumber"];

    for (var i = 0; i < TrequiredFields.length; i++) {
        var Tfield = document.getElementById(TrequiredFields[i]);
        if (Tfield.value.trim() === "") {
            Tfield.classList.add("custom-focus");
            Tfield.scrollIntoView({ behavior: 'smooth', block: 'center' });
            return false;
        }
        else{
            Tfield.classList.remove("custom-focus");
        }
    }
    return true;
}



//call all function
getCurrentDate();
uploadforStudPic();
uploadforForm138();
uploadforPSA();
uploadforGoodMoral();

SHSgetCurrentDate();
SHSuploadforStudPic();
SHSuploadforForm138();
SHSuploadforPSA();
SHSuploadforGoodMoral();
SHSuploadforCertCompl();

TgetCurrentDate();
TuploadforIdPic();
TuploadforTransRec();
TuploadforPSA();
TuploadforGoodMoral();
