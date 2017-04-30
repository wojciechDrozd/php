//SKRYPT PANEL PRACOWNIKA


function showAllStudents(){
	 $.get("ajax/showAllStudents.php",{},function (data,status){
		$(".records_content").html(data); 
	 });
}

function showAllClasses(){
	 $.get("ajax/showAllClasses.php",{},function (data,status){
		$(".records_content").html(data); 
	 });
}


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

function showList(){
	
	var class_name = $("#filter_class_name").val();
	
	$.post("ajax/showList.php",{
		class_name: class_name
	},
	function (data, status){
		$(".records_content").html(data);
	}
	);
}

function showListForDate(counter){
	
	var my_id = "my_date"+counter;
	var class_name = $("#filter_class_name").val();
	var class_date = document.getElementById(my_id).innerHTML;
	
	$.post("ajax/showList2.php",{
		class_date: class_date,
		class_name: class_name
	},
	function (data, status){
		$(".records_content").html(data);
	});
	
}

function saveList() {

	var class_name = $("#filter_class_name").val();
	var boxes = document.getElementsByClassName("classlistcheckbox");
	var boxesString = '';
	for (var i = 0; i < boxes.length; i++) {

		if (document.getElementById(boxes[i].id).checked) {
			boxesString += boxes[i].id + ":true"+"|";

		}else{
			boxesString += boxes[i].id + ":false"+"|";
		}
	}
	$.post("ajax/saveList.php", {
		class_name: class_name,
		boxesString : boxesString
	}, function(data, status) {
		$(".records_content").html(data);
	});
}
	

$(document).ready(function(){
	showAllClasses();
});






















