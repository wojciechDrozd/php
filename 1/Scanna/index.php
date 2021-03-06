<! DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Scanna</title>

<!-- Jquery JS  -->
<script type="text/javascript"
	src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Bootstrap JS  -->
<script type="text/javascript"
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- Bootstrap CSS   -->
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

<!-- custom css -->
<link rel="stylesheet" type="text/css" href="css/style.css" media="all">

<!-- Custom JS   -->
<script type="text/javascript" src="js/scanna.js"></script>

<!-- google fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik+Mono+One" >

</head>
<body>
	<div class="container">
		<div class="jumbotron vertical-center">
			<p class="text-center" id="jumbotext">majestic scanna</p>
		</div>
	</div>
	
	<div class="container">
		
	<form method="post">

			<div class="form-group">
				<label for="url">URL</label> 
				<input class="form-control" type="text" id="url" onkeyup="urlHandler()" />
			</div>
			
			<div class="form-gropu">
				<label for="text-blob">Text blob</label>
				<textarea class="form-control" rows="5" id="text_blob" onkeyup="textBlobHandler()"></textarea>
			</div>
			<div class="form-group">
				<label for="name_prefix">Name prefix</label> 
				<input type="text" class="form-control" id="name_prefix">
			</div>
			<div class="form-group">
				<label for="name_suffix">Name suffix</label> 
				<input type="text" class="form-control" id="name_suffix">
			</div>
			<div class="form-group">
				<label for="url_prefix">URL prefix</label> 
				<input type="text" class="form-control" id="url_prefix">
			</div>
			
			<div class="form-group">
				<label for="regex">Regex</label>
				<textarea class="form-control" rows="5" id="regex" ></textarea>
			</div>
			
			<div class="form-group">
				<div class="row">
					<div class="col-sm-4">
						<label for="name_capture_group">Name</label> 
						<input type="text" class="form-control" id="name_capture_group">
					</div>
					<div class="col-sm-4">
						<label for="extra_capture_group">Extra</label> 
						<input type="text" class="form-control" id="extra_capture_group">
					</div>
					<div class="col-sm-4">
						<label for="website_capture_group">Website</label> 
						<input type="text" class="form-control" id="website_capture_group">
					</div>
				</div>
			</div>
		
			<div class="form-group">
				<button type="button" class="btn btn-info" id="mybut" onclick="scanWebsite()" >Scan the shit out of it!</button>
			</div>
			
		</form>

	</div>

<!-- fetched products -->
<div class="container" id="9">
    <div class="row">
        <div class="col-md-12">
            <br/>
             <div class="results">
            </div>
        </div>
    </div>
</div>





</body>
</html>