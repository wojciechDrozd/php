<!-- Tabela przedmioty-->

<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
<title>Przedmioty</title>

<!-- Jquery JS   -->
<script type="text/javascript"
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Bootstrap JS   -->
<script type="text/javascript"
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Custom JS   -->
<script type="text/javascript" src="js/classes.js"></script>

<!-- Bootstrap CSS    -->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

<!-- custom css -->
<link rel="stylesheet" type="text/css" href="css/style.css">

<!--  fontello css -->
<link rel="stylesheet" type="text/css" href="fontello-eebb1043/css/fontello.css"/>

<!-- Google Material Icons -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<!-- W3Data JS -->
<script src="https://www.w3schools.com/lib/w3data.js"></script>


</head>
<body>

	<!-- nawigacja admina -->
	<div w3-include-html="adminMenuBar.php"></div>
	<script>w3IncludeHTML()</script>
	<!-- /nawigacja admina -->


	<!-- Tabela przedmioty -->
	<div class="container">


		<div class="row" id="myrow">
			<div class="col-md-12">
				<div class="button-group">
					<button type="button" class="btn btn-success"
						onclick="showAllClasses()">Wszystkie przedmioty</button>
					<button class="btn btn-success" data-toggle="modal"
						data-target="#add_class_modal">Dodaj przedmiot do bazy</button>
					<button class="btn btn-success" data-toggle="modal" data-target="#add_class_date_modal">Dodaj zajęcia</button>
					<button class="btn btn-success" data-toggle="modal" data-target="#add_student_to_class_modal">Zapisz studenta na przedmiot</button>
				</div>
			</div>
		</div>
		<div class="row" id="myrow">
			<div class="col-md-5">
				<select class="form-control" id="filter_class_name"> <?php include 'ajax/selectClass.php';?> </select>
			</div>
		</div>
		<div class="row" id="myrow">
			<div class="col-md-12">
				<div class="button-group">
				
					<button type="button" class="btn btn-info"
						onclick="showStudentsInClass()">Pokaż zapisanych studentów</button>
					<button type="button" class="btn btn-info"
						onclick="showClassSchedule()">Pokaż plan zajęć</button>
					<button type="button" class="btn btn-info" onclick="showClassLog()">Pokaż dziennik zajęć</button>
				</div>
			</div>
		</div>

	<div class="row" id="myrow">
			<div class="col-md-12">
				<br />
				<div class="records_content"></div>
			</div>
		</div>
	</div>

	<!-- /Tabela przedmioty  -->


	<!-- Bootstrap Modals -->
	<!-- Modal - Dodawanie przedmiotu -->
	<div class="modal fade" id="add_class_modal" tabindex="-1"
		role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Dodaj przedmiot</h4>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<label for="class_name">Nazwa przedmiotu</label> 
						<input type="text" id="class_name" placeholder="Nazwa przedmiotu" class="form-control" />
					</div>

					<div class="form-group">
						<label for="select_teacher">Prowadzący</label> <select
							class="form-control" id="teacher_full_name"><?php include 'ajax/selectTeacher.php';?></select>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
					<button type="button" class="btn btn-primary" onclick="addClass()">Zapisz</button>
				</div>
			</div>
		</div>
	</div>
	<!-- // Modal dodawanie przedmiotu-->

	<!-- Modal edycja przedmiotu -->
	<div class="modal fade" id="update_class_modal" tabindex="-1"
		role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Edytuj</h4>
				</div>
				<div class="modal-body">


					<div class="form-group">
						<label for="update_class_name">Nazwa przedmiotu</label> <input
							type="text" id="update_class_name" placeholder="Nazwa przedmiotu"
							class="form-control" />

					</div>
					<div class="form-group">
						<label for="update_teacher_full_name">Prowadzący</label> <select
							class="form-control" id="update_teacher_full_name">
                    <?php include 'ajax/selectTeacher.php';?>
                    </select>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
					<button type="button" class="btn btn-primary"
						onclick="updateClassDetails()">Zapisz</button>
					<input type="hidden" id="hidden_class_id">
				</div>
			</div>
		</div>
	</div>
	<!-- // Modal edycja przedmiotu-->

	<!-- Modal - Dodawanie studenta do przedmiotu -->
	<div class="modal fade" id="add_student_to_class_modal" tabindex="-1"
		role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Zapisz studenta na
						przedmiot</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="select_class">Przedmiot</label> 
						<select class="form-control" id="class_name2"><?php include 'ajax/selectClass.php';?></select>
					</div>

					<div class="form-group">
						<label for="select_student">Student</label> <select
							class="form-control" id="student_full_name2"><?php include 'ajax/selectStudent.php';?></select>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
					<button type="button" class="btn btn-primary"
						onclick="addStudentToClass()">Zapisz</button>
				</div>
			</div>
		</div>
	</div>
	<!-- // Modal dodawanie przedmiotu-->
	
		<!-- Modal - Dodawanie terminu zajęć -->
	<div class="modal fade" id="add_class_date_modal" tabindex="-1"
		role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Dodaj zajęcia</h4>
				</div>
				<div class="modal-body">

					<div class="form-group">
						<label for="class_name">Przedmiot</label> 
						<select class="form-control" id="class_name3"><?php include 'ajax/selectClass.php';?></select>
					</div>

					<div class="form-group">
						<label for="select_teacher">Rodzaj zajęć</label> <select
							class="form-control" id="class_type"><?php include 'ajax/selectClassType.php';?></select>
					</div>
					
					<div class="form-group">
						<label for="select_teacher">Termin</label> 
						<input type="text" id="date" placeholder="dd/mm/yyyy" class="form-control" />
			
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
					<button type="button" class="btn btn-primary" onclick="addClassDate()">Zapisz</button>
				</div>
			</div>
		</div>
	</div>
	<!-- // Modal dodawanie terminu zajęć-->
	
	<!-- Modal edycja terminu zajęć -->
	<div class="modal fade" id="update_class_date_modal" tabindex="-1"
		role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Edytuj szczegóły zajęć</h4>
				</div>
				<div class="modal-body">


						<div class="form-group">
						<label for="update_class_name3">Przedmiot</label> 
						<select class="form-control" id="update_class_name3"><?php include 'ajax/selectClass.php';?></select>
					</div>

					<div class="form-group">
						<label for="update_class_type">Rodzaj zajęć</label> 
						<select class="form-control" id="update_class_type"><?php include 'ajax/selectClassType.php';?></select>
					</div>
					
					<div class="form-group">
						<label for="update_date">Termin</label> 
						<input type="text" id="update_date" placeholder="dd/mm/yyyy" class="form-control" />
			
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
					<button type="button" class="btn btn-primary"
						onclick="updateClassDate()">Zapisz</button>
					<input type="hidden" id="hidden_class_date_id">
				</div>
			</div>
		</div>
	</div>
	<!-- // Modal edycja terminu zajęć-->



</body>
</html>




















