export function FetchEnrolledStudent() {
    let EnrolledStudContent = document.getElementById('EnrolledStudContent');

    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../../../../main/db/xhr/admin/AdminFetchEnrolledStudents.php', true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;

            if(response.length == 0){
                EnrolledStudContent.style.display = "flex";
            }
            else{
                EnrolledStudContent.innerHTML = response;
            }
        }
    }
    xhr.send();
}
