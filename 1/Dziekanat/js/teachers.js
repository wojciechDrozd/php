//SKRYPT PRACOWNICY

//dodawanie pracownika
function addTeacher() {
	
   //pobranie wartości z formularza 
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var faculty = $("#faculty").val();
    var email = $("#email").val();
    var pesel = $("#pesel").val();
    
    //przesłanie danych pracownika do zapisu
    $.post("ajax/addTeacher.php", {
    	first_name: first_name,
        last_name: last_name,
        faculty: faculty,
        email: email,
        pesel: pesel
    }, function (data, status) {
    	
        //zamknięcie formularza
        $("#add_teacher_modal").modal("hide");
 
        //przełaowanie tabeli pracownicy
        readTeachersRecords();
 
        //czyszczenie pól w formularzu
        $("#first_name").val("");
        $("#last_name").val("");
        $("#mafaculty").val("");
        $("#email").val("");
        $("#pesel").val("");
    });
}
 
//wczytanie tabeli pracownicy
function readTeachersRecords() {
    $.get("ajax/readTeachersRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}
 

//usuwanie pracownika
function deleteTeacher(teacher_id) {
   
	var conf = confirm("Czy na pewno chcesz usunąć pracownika?");
    if (conf == true) {
        $.post("ajax/deleteTeacher.php", {
        	teacher_id: teacher_id
        	},
            function (data, status) {
                
            	//przeładuj tabelę pracowników
                readTeachersRecords();
            }
        );
    }
}

//pobranie danych pracownika do edycji
function getTeacherDetails(teacher_id) {
    
	//id pracownika dodane do ukrytego pola
	$("#hidden_teacher_id").val(teacher_id);
	
    $.post("ajax/readTeacherDetails.php", {
            teacher_id: teacher_id
    },
        function (data, status) {
        	
            var teacher = JSON.parse(data);
            
          //dodanie dotychczasowych wartości do pól formularza
            $("#update_first_name").val(teacher.imie);
            $("#update_last_name").val(teacher.nazwisko);
            $("#update_faculty").val(teacher.katedra);
            $("#update_email").val(teacher.email);
            $("#update_pesel").val(teacher.pesel);
         
        }
    );
   
  //pokazanie formularza
    $("#update_teacher_modal").modal("show");
}

//edycja danych pracownika
function updateTeacherDetails() {
	
    // pobranie id pracownika z ukrytego pola
	var teacher_id = $("#hidden_teacher_id").val();
	
	//pobranie zedytowanych wartości 
	var first_name =  $("#update_first_name").val();
    var last_name =  $("#update_last_name").val();
    var faculty =  $("#update_faculty").val();
    var email = $("#update_email").val();
    var pesel = $("#update_pesel").val();
 
    //przesłanie zedytowanych danych 
    $.post("ajax/updateTeacherDetails.php", {
    	 
    	  teacher_id: teacher_id,
    	  first_name: first_name,
          last_name: last_name,
          faculty: faculty,
          email: email,
          pesel: pesel
          
        },
        function (data, status) {
            
        	//schowanie formularza
            $("#update_teacher_modal").modal("hide");
            
            //przeładowanie tabeli pracownicy
            readTeachersRecords();
        }
    );
}

 
$(document).ready(function () {
    //załaduj tabelę pracownicy przy starcie strony
    readTeachersRecords(); 
});