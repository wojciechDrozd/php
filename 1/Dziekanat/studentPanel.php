<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Panel Studenta</title>
 
 <!-- Jquery JS  -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 
<!-- Bootstrap JS  -->
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Bootstrap CSS   -->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>

<!-- Custom JS   -->
<script type="text/javascript" src="js/studentPanel.js"></script>

<!-- W3Data JS -->
<script src="https://www.w3schools.com/lib/w3data.js"></script>
</head>
<body>
 
 <!--  Pasek nawigacji -->
<div w3-include-html="studentMenuBar.php"></div> 
<script>w3IncludeHTML()</script>
<!-- /Pasek nawigacji  -->

<!-- tabela podsumowanie studenta -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br/>
             <div class="student_summary">
            </div>
        </div>
    </div>
</div>
<!-- /tabela podsumowanie studenta -->

 

</body>
</html>