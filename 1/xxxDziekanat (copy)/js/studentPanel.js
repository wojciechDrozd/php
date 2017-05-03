//SKRYPT STUDENTS PANEL


//wczytanie tabeli studenci
function readStudentSummary() {
    $.get("ajax/studentSummary.php", {}, function (data, status) {
        $(".student_summary").html(data);
    });
}


$(document).ready(function () {
    //załaduj tabelę studenci przy starcie strony
	readStudentSummary();
});