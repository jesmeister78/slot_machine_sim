<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
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
		<form name="form1" method="post" action="section13.php?bal=<?php echo $_GET[bal]; ?>">
			<?php include ("write_post_vals.php"); ?>
			<table align="center" class="main_table">
				<tr> 
					<td>
						<div align="center">
							<img src="du.jpg" width="100" height="100" alt="logo"></div>
							
						<p>
							We would like you to play another 10 bets.</p>
						<p>
							In order to continue playing, you need to complete a shorter version of the Squares Task again.</p>
						<p>
							Press &quot;Continue&quot; when you are ready to begin the task.</p>
						<p class="begin">
							<input type="submit" name="Submit" value="Continue"></p></td></tr></table></form>
	</body>
</html>
