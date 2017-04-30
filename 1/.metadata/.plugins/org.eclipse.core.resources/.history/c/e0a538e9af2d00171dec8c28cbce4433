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

function saveList(){
	
	var boxes = document.getElementsByClassName("classlist");
	
	var box = boxes.length;
	$.post("ajax/saveList.php",{
		
		box: box
	},function (data, status){
		$(".records_content").html(data);
	});
}
	

$(document).ready(function(){
	showAllClasses();
});