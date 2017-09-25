<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title>Survey</title>
		<meta http-equiv="Content-Type" content="text/html; utf-8" />
		<link href="SurveyStyle.css" rel="stylesheet" type="text/css" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
		<script type="text/javascript" src="RandomAction.js"></script>
		<script type="text/javascript" src="TimerFunctions.js"></script>
		<script type="text/javascript">
			window.history.forward(); 
			function noBack(){ window.history.forward(); }
		</script>
	</head>

	<body onLoad="noBack(); fnRndAction(2, gup('bal'));" onpageshow="if (event.persisted) noBack();" onUnload="">
		<form name="form1" method="post" action="">
			<?php include ("write_post_vals.php"); ?>
			<table class="main_table" align="center">
				<tr> 
					<td>
						<div align="center">
							<img src="du.jpg" width="100" height="100" alt="logo"></div>
						<p class="begin">
							<input type="button" value="Begin Task!" onClick="doTimer('tasktime1'); show('task1');">
							<input type="hidden" name="tasktime1" id="tasktime1" value=""></p>
						<div class="task_div" id="task1" style="display:none">        
							<table class="timer_table" align="center">
								<tr class="odd_row">
									<th>X</th>
									<td>O</td></tr>
								<tr class="even_row hidden" >
									<td>O</td>
									<th>X</th></tr>
								<tr class="odd_row hidden">
									<td>O</td>
									<th>X</th></tr>
								<tr class="even_row hidden">
									<th>X</th>
									<td>O</td></tr>
								<tr class="odd_row hidden">
									<th>X</th>
									<td>O</td></tr>
								<tr class="even_row hidden">
									<td>O</td>
									<th>X</th></tr>
								<tr class="odd_row hidden">
									<td>O</td>
									<th>X</th></tr>
								<tr class="even_row hidden">
									<th>X</th>
									<td>O</td></tr>
								<tr class="odd_row hidden">
									<td>O</td>
									<th>X</th></tr>
								<tr class="even_row hidden">
									<td>O</td>
									<th>X</th></tr>
								<tr class="odd_row hidden">
									<th>X</th>
									<td>O</td></tr>
								<tr class="even_row hidden">
									<th>X</th>
									<td>O</td></tr>
								<tr class="odd_row hidden">
									<th>X</th>
									<td>O</td></tr>
								<tr class="even_row hidden">
									<td>O</td>
									<th>X</th></tr>
								<tr class="odd_row hidden">
									<td>O</td>
									<th>X</th></tr>
								<tr class="even_row hidden">
									<td>O</td>
									<th>X</th></tr>
								<tr class="odd_row hidden">
									<td>O</td>
									<th>X</th></tr>
								<tr class="even_row hidden">
									<td>O</td>
									<th>X</th></tr>
								<tr class="odd_row hidden">
									<th>X</th>
									<td>O</td></tr>
								<tr class="even_row hidden">
									<td>O</td>
									<th>X</th></tr></table>
							<p class="hidden">
								<input type="submit" value="Continue" onClick="stopCount()"></strong></p></div></td></tr></table></td></tr></table></form>
	</body>
</html>
