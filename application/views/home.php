<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<h2>CSV File Upload...</h2>
	<form method="post" action="<?php echo base_url().'Home/csvupload' ?>" enctype="multipart/form-data">
		<div class="form-group">
			<label>File : </label>
			<input type="file" name="file" id="file" class="form-control">
		</div>
		<input type="submit" name="submit" value="Upload" class="btn btn-info">
	</form>
	<br><br>
	<form method="post" action="<?php echo base_url().'Home/export' ?>">
		<input type="submit" value="Export">
	</form>
</div>
</body>
</html>