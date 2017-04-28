//SKRYPT PANEL PRACOWNIKA


function showMyAllStudents(){
	 $.get("ajax/readStudentsInTeacherClassRecords.php",{},function (data,status){
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