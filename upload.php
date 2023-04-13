<!DOCTYPE html>
<html>
<head>
	<title>Analysis Results</title>
</head>
<body>
<?php
// Check if a file was uploaded
if ($_FILES["file"]["error"] == UPLOAD_ERR_OK) {
	// Get the uploaded file name and path
	$filename = $_FILES["file"]["name"];
	$tmp_name = $_FILES["file"]["tmp_name"]; 

	// Check if the file has a valid extension
	if (pathinfo($filename, PATHINFO_EXTENSION) == 'csv') {
		// Call the Python script to perform analysis
		$command = escapeshellcmd('linkedin_analysis.py ' . $tmp_name);
		$output = shell_exec($command);

		// Parse the output from the Python script
		list($score, $recommendations, $num_skills, $num_connections) = explode(',', $output);

		// Generate the HTML page with the analysis results
		echo '<h1>Analysis Results</h1>';
		echo '<p>Score: ' . $score . '</p>';
		echo '<p>Recommendations: ' . $recommendations . '</p>';
		echo '<p>Number of skills: ' . $num_skills . '</p>';
		echo '<p>Number of connections: ' . $num_connections . '</p>';
	} else {
		echo '<p>Invalid file type. Please upload a CSV file.</p>';
	}
} else {
	echo '<p>No file selected. Please select a CSV file to upload.</p>';
}
?>
</body>
</html>
