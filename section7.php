<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title>Survey</title>
		<meta http-equiv="Content-Type" content="text/html; utf-8">
		<link href="SurveyStyle.css" rel="stylesheet" type="text/css" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
		<script type="text/javascript" src="RandomAction.js"></script>
		<script type="text/javascript" src="TimerFunctions.js"></script>
		<script type="text/javascript">
			window.history.forward(); 
			function noBack(){ window.history.forward(); }
		</script>
	</head>

	<body bgcolor="#000066" text="#000000" link="#990000" vlink="#990000" alink="#990000" leftmargin="0" topmargin="0" bottommargin="0" onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">
		<form name="form1" method="post" action="section8.php?bal=<?php echo $_GET[bal]; ?>">
			<?php include ("write_post_vals.php"); ?>
			<table align="center" class="main_table">
				<tr> 
					<td>
						<div align="center">
							<img src="du.jpg" width="100" height="100" alt="logo"></div>
							
						<p>
							We would like you to play another 20 bets.</p>
						<p>
							Before doing so, you need to complete a short task called the "Squares Task".</font></p>
						<p>
							<u>Please read the following instructions.</u></font></p>
						<p>
							A pair of squares with a "O" and an "X" will be displayed. Your task is to press the square with the "X" in it.  When you have done this a new pair of squares will appear.  Please select the "X" again.  
						    Repeat this until the &quot;Continue&quot; button appears;  press the &quot;Continue&quot; button to go to the slot machine and begin gambling. </p>
						<p>
							Please practice checking the '<b>X</b>' in each row.</p>
          
						<table class="timer_table" align="center">
							<tr class="odd_row">
								<td>
									O</td>
								<th>
									X</th></tr>
							<tr class="even_row hidden">
								<th>
									X</th>
								<td>
									O</td></tr></table>
              
						<p class="hidden">
							Thank you.</p>
						<p class="hidden">
							Please press continue when you are ready to begin the task.</p>
						<p class="hidden">
							<input id="submit" type="submit" name="Submit" value="Continue" /></p></td></tr></table></form>
	</body>
</html>
