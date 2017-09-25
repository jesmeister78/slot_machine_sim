<?php
	echo "hello";
	$filename = $_SERVER['DOCUMENT_ROOT']."/data/data.txt";
	$filesize = file_size( $filename ) or die ("could not get file size");
	echo "filename: " . $filename;
	$new_line = "";
	$lines = array();
	
	//if file is blank then add headings line to our array
	if ( 0 == file_size( $filename ) ){
		$new_line .= "Number\tDate\tTime\t";
		foreach($_POST as $name => $value) {
			if($name != 'Submit')
				$new_line .= $name . "\t";
		}
		$new_line .= '\n';
		
		array_push($lines, $new_line);
	}else{
		// create array of file lines in memory
		$lines = file($filename, FILE_IGNORE_NEW_LINES);
	}
	
	// make our new data line
	$getdate = date( "l dS F Y", time() ); 
	$gettime = date( "h:i:s A", time() ); 
	
	// count how many lines there are already (this is also the new line number as we exclude the headings line)
	$num_lines = count($lines);
	
	//write out line number, date and time
	$new_line = $num_lines . "\t" . $getdate . "\t" . $gettime;
	
	//write out data (balances are now included in the $_POST values)
	foreach($_POST as $name => $value) {
		if($name != 'Submit')
			$new_line .=  "\t" . $value;
	}	
	$new_line .= "\n";
	
	// add our new line to the bottom of the line array
	array_push($lines, $new_line);
	
	// write the array back out to the file with a lock
	file_put_contents($filename, implode("\n", $lines), LOCK_EX);
		
?>
<html>
	<head>
		<title>Survey</title>
		<meta http-equiv="Content-Type" content="text/html; utf-8">
		<link href="SurveyStyle.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript">
			window.history.forward(); 
			function noBack(){ window.history.forward(); }
		</script>
	</head>

	<body onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">
	
		<table class="main_table" align="center">
			<tr> 
				<td>
					<div align="center">
						<img src="du.jpg" width="100" height="100"></div>
					<p class="begin">
						Thank you very much for your participation!</p></td></tr></table>
	</body>
</html>




