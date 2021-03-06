//SKRYPT PANEL PRACOWNIKA


//pokaż wszystkich studentów zalogowanego pracownika
function showAllStudents(){
	 $.get("ajax/showAllStudents.php",{},function (data,status){
		$(".records_content").html(data); 
	 });
}

//pokaż wszystkie przedmioty przypisane do zalogowanego pracownika
function showAllClasses(){
	 $.get("ajax/showAllClasses.php",{},function (data,status){
		$(".records_content").html(data); 
	 });
}


//pokaż studentów zapisanych na wybrany przedmiot
function showStudentsInClass(){
	
	var class_name = $("#filter_class_name").val();
	
	$.post("ajax/readStudentsInClassRecords.php",{
		
		class_name: class_name
	}, function (data,status){
		$(".records_content").html(data);
	}
	
	);
}

function showClassScheduleForTeacher(){
	
	var class_name = $("#filter_class_name").val();
	
	$.post("ajax/showClassScheduleForTeacher.php",{
		class_name: class_name
	},
	function (data,status){
		$(".records_content").html(data);
	}
	);
	
}

//dziennik zajęć
function showClassLog(){
	
	var class_name = $("#filter_class_name").val();
	
	$.post("ajax/showClassLog.php",{
		class_name: class_name
	},
	function (data, status){
		$(".records_content").html(data);
	}
	);
}

//dla wybranego terminu zajęć
function showListForDate(counter){
	
	var class_name = $("#filter_class_name").val();
	var my_id = "my_date"+counter;
	var class_date = document.getElementById(my_id).innerHTML;
	var my_class_type_id = "my_class_type"+counter;
	var class_type = document.getElementById(my_class_type_id).innerHTML;
	
	
	$.post("ajax/showList2.php",{
		class_date: class_date,
		class_name: class_name,
		class_type: class_type
	},
	function (data, status){
		$(".records_content").html(data);
	});
	
}

//zapisz po sprawdzeniu obecności 
function saveList() {

	var class_name = $("#filter_class_name").val();
	var class_date = document.getElementById("my_class_date").innerHTML;
	var boxes = document.getElementsByClassName("classlistcheckbox");
	var boxesString = '';
	for (var i = 0; i < boxes.length; i++) {

		if (document.getElementById(boxes[i].id).checked) {
			boxesString += "|"+boxes[i].id + ":1";

		}else{
			boxesString += "|"+boxes[i].id + ":0";
		}
	}
	$.post("ajax/saveList.php", {
		class_name: class_name,
		class_date: class_date,
		boxesString : boxesString,
	}, function(data, status) {
		showClassLog();
	});
}
	

$(document).ready(function(){
	showAllClasses();
});






















