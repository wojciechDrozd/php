//dodawanie studenta
function addRecord() {
	
   //pobranie wartości z formularza
	var student_id = $("#student_id").val();
    var first_name = $("#first_name").val();
    var last_name = $("#last_name").val();
    var major = $("#major").val();
    var year = $("#year").val();
    var email = $("#email").val();
    var pesel = $("#pesel").val();
    
    //zapisanie studenta
    $.post("ajax/addRecord.php", {
        student_id: student_id,
    	first_name: first_name,
        last_name: last_name,
        major: major,
        year: year,
        email: email,
        pesel: pesel
    }, function (data, status) {
    	
        //zamknięcie popup
        $("#add_new_record_modal").modal("hide");
 
        //przeładuj tabelę
        readRecords();
 
        //wyczyść popup
        $("#student_id").val("");
        $("#first_name").val("");
        $("#last_name").val("");
        $("#major").val("");
        $("#year").val("");
        $("#email").val("");
        $("#pesel").val("");
    });
}
 
//wczytanie tabeli
function readRecords() {
    $.get("ajax/readRecords.php", {}, function (data, status) {
        $(".records_content").html(data);
    });
}
 

//usuwanie studenta
function DeleteUser(pesel) {
    var conf = confirm("Are you sure, do you really want to delete User?");
    if (conf == true) {
        $.post("ajax/deleteUser.php", {
                pesel: pesel
            },
            function (data, status) {
                //przeładuj tabelę
                readRecords();
            }
        );
    }
}
 
function GetUserDetails(id) {
    // Add User ID to the hidden field for furture usage
    $("#hidden_user_id").val(id);
    $.post("ajax/readUserDetails.php", {
            id: id
        },
        function (data, status) {
            // PARSE json data
        	
            var user = JSON.parse(data);
            // Assing existing values to the modal popup fields
            $("#update_student_id").val(user.first_name);
            $("#update_first_name").val(user.first_name);
            $("#update_last_name").val(user.last_name);
            $("#update_major").val(user.major);
            $("#update_year").val(user.year);
            $("#update_email").val(user.email);
            $("#update_pesel").val(user.pesel);
        }
    );
    //otwórz popup
    $("#update_user_modal").modal("show");
}

//edytuj dane studenta
function UpdateUserDetails() {
	
    // get values
	var student_id = $("#update_student_id").val();
    var first_name = $("#update_first_name").val();
    var last_name = $("#update_last_name").val();
    var major = $("#update_major").val();
    var year = $("#update_year").val();
    var email = $("#update_email").val();
    var pesel = $("#update_pesel").val();
 
    // get hidden field value
    var id = $("#hidden_user_id").val();
 
    // Update the details by requesting to the server using ajax
    $.post("ajax/updateUserDetails.php", {
           
    		id:id,
    		student_id: student_id,
            first_name: first_name,
            last_name: last_name,
            major: major,
            year: year,
            email: email,
            pesel: pesel
        },
        function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
            readRecords();
        }
    );
}
 
$(document).ready(function () {
    //załaduj tabelę przy starcie strony
    readRecords(); 
});