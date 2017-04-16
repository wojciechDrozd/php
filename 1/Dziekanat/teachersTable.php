<!-- Tabela pracownicy -->

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Pracownicy</title>
 
 <!-- Jquery JS   -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
<!-- Bootstrap JS   -->
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
<!-- Teachers  JS   -->
<script type="text/javascript" src="js/teachers.js"></script>

 <!-- Bootstrap CSS    -->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>

<!-- Google Material Icons -->
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<!--  W3Data JS -->
<script src="https://www.w3schools.com/lib/w3data.js"></script>
    
</head>
<body>

<!-- Admin Menu Section -->
<div w3-include-html="adminMenuBar.php"></div> 
<script>w3IncludeHTML()</script>
<!-- /Admin Menu Section -->
 
<!-- Content Section -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="pull-left">
                <br/><button class="btn btn-success" data-toggle="modal" data-target="#add_teacher_modal">Dodaj pracownika</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <br/>
             <div class="records_content">
            
            </div>
        </div>
    </div>
</div>
<!-- /Content Section -->
 
 
<!-- Bootstrap Modals -->
<!-- Modal - Add New Record/User -->
<div class="modal fade" id="add_teacher_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Dodaj pracownika</h4>
            </div>
            <div class="modal-body">
                
                <div class="form-group">
                    <label for="first_name">Imię</label>
                    <input type="text" id="first_name" placeholder="Imię" class="form-control"/>
                </div>
 
                <div class="form-group">
                    <label for="last_name">Nazwisko</label>
                    <input type="text" id="last_name" placeholder="Nazwisko" class="form-control"/>
                </div>
                
                 <div class="form-group">
                    <label for="faculty">Katedra</label>
                    <select class="form-control" id="faculty"><?php include 'ajax/selectFaculty.php'?></select>
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" placeholder="Email" class="form-control"/>
                </div>
                
                 <div class="form-group">
                    <label for="last_name">Pesel</label>
                    <input type="text" id="pesel" placeholder="Pesel" class="form-control"/>
                </div>
 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
                <button type="button" class="btn btn-primary" onclick="addTeacher()">Zapisz</button>
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->
 
<!-- Modal - Update Teacher details -->
<div class="modal fade" id="update_teacher_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edytuj</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="update_first_name">Imię</label>
                    <input type="text" id="update_first_name" placeholder="Imię" class="form-control"/>
                </div>
 
                <div class="form-group">
                    <label for="update_last_name">Nazwisko</label>
                    <input type="text" id="update_last_name" placeholder="Nazwisko" class="form-control"/>
                </div>
                
                 <div class="form-group">
                    <label for="update_faculty">Katedra</label>
                    <select class="form-control" id="update_faculty"><?php include 'ajax/selectFaculty.php'?></select>
                </div>
 
                <div class="form-group">
                    <label for="update_email">Email</label>
                    <input type="text" id="update_email" placeholder="Email" class="form-control"/>
                </div>
                
                 <div class="form-group">
                    <label for="update_pesel">Pesel</label>
                    <input type="text" id="update_pesel" placeholder="Pesel" class="form-control"/>
                </div>
 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
                <button type="button" class="btn btn-primary" onclick="updateTeacherDetails()" >Zapisz</button>
                <input type="hidden" id="hidden_teacher_id">
            </div>
        </div>
    </div>
</div>
<!-- // Modal -->
 

</body>
</html>