<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Panel Pracownika</title>
 
 <!-- Jquery JS  -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
<!-- Bootstrap JS  -->
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<!-- Bootstrap CSS   -->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>

<!-- custom css -->
<link rel="stylesheet" type="text/css" href="css/style.css"/>

<!-- Custom JS   -->
<script type="text/javascript" src="js/teacherPanel.js"></script>

<!-- Google Material Icons -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<!--  fontello css -->
<link rel="stylesheet" type="text/css" href="fontello-eebb1043/css/fontello.css"/>

<!-- W3Data JS -->
<script src="https://www.w3schools.com/lib/w3data.js"></script>
</head>
<body>
 
 
 <!--  Pasek nawigacji pracownika -->
<div w3-include-html="teacherMenuBar.php"></div> 
<script>w3IncludeHTML()</script>
 <!--  /Pasek nawigacji pracownika -->
 
 <!-- Tabela przedmioty -->
	<div class="container">
		<div class="row" id="myrow">
		<div class="col-md-12">
				<div class="button-group">
					<button type="button" class="btn btn-success" onclick="showAllClasses()">Wszystkie moje przedmioty</button>
					<button type="button" class="btn btn-success" onclick="showAllStudents()">Wszyscy moi studenci</button>
				</div>
		</div>
		</div>
		<div class="row" id="myrow">
			<div class="col-md-6">
				<div class="button-group">
					<select class="form-control" id="filter_class_name"> <?php include 'ajax/selectOneTeacherClass.php';?> </select>
				</div>
			</div>
			</div>
			<div class="row">
			<div class="col-md-6">
				<div class="button-group">
  					<button type="button" class="btn btn-info" onclick="showStudentsInClass()">Pokaż zapisanych studentów</button>
  					<button type="button" class="btn btn-info" onclick="showClassScheduleForTeacher()">Plan zajęć</button>
  					<button type="button" class="btn btn-info" onclick="showClassLog()">Dziennik zajęć</button>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
				<br />
				<div class="records_content"></div>
			</div>
		</div>
	</div>	
	<!-- /Tabela przedmioty  -->
</body>
</html>