<!DOCTYPE html>
<html>
<head>
	<title>Resume Upload Form</title>
</head>
<body>
	<h1>Resume Upload Form</h1>
	<form action="analyse.php" method="POST" enctype="multipart/form-data">
		<label for="resume">Upload your resume:</label><br>
		<input type="file" id="resume" name="resume"><br>
		<input type="submit" value="Submit">
	</form>
</body>
</html>
