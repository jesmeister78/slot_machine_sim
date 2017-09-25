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

		<table class="main_table" align="center">
			<tr> 
				<td>
					<div align="center">
						<img src="du.jpg" width="100" height="100" alt="logo"></div>
					<p>
						Please rate how you feel <strong>right now:</strong>.</p>
					<table class="img_input_table" align="center">
						<tr class="heading_row">
							<th colspan="15">
									<img src="s5header2.jpg" alt="s5h2" /></th></tr>
						<tr class="odd_row">
							<td>
								<input type="radio" value="-7" name="s21item1" /></td>
							<td>
								<input type="radio" value="-6" name="s21item1" /></td>
							<td>
								<input type="radio" value="-5" name="s21item1" /></td>
							<td>
								<input type="radio" value="-4" name="s21item1" /></td>
							<td>
								<input type="radio" value="-3" name="s21item1" /></td>
							<td>
								<input type="radio" value="-2" name="s21item1" /></td>
							<td>
								<input type="radio" value="-1" name="s21item1" /></td>
							<td>
								<input type="radio" value="0" name="s21item1" /></td>
							<td>
								<input type="radio" value="1" name="s21item1" /></td>
							<td>
								<input type="radio" value="2" name="s21item1" /></td>
							<td>
								<input type="radio" value="3" name="s21item1" /></td>
							<td>
								<input type="radio" value="4" name="s21item1" /></td>
							<td>
								<input type="radio" value="5" name="s21item1" /></td>
							<td>
								<input type="radio" value="6" name="s21item1" /></td>
							<td>
								<input type="radio" value="7" name="s21item1" /></td></tr></table>
					<br />			
					<br />	
					<p>
						You now have the same option again - either to continue gambling, or to finish the study now. 
						Again, if you choose to continue, you need to complete the Squares Task again.</p>
					<p>
						If you <b>DO want to continue</b> gambling, please press the &quot;Continue&quot; button.</p>
					<p>
						If you <b>DO NOT want to continue</b> gambling, please press the &quot;I have finished&quot; button.</p>
							
					<form name="form1" method="post" action="section22.php?bal=<?php echo $_GET['bal']; ?>"> 
						<?php 
							include ("write_post_vals.php");
							// balance 5
							echo '<input type="hidden" name="balance5" value="' . str_replace('"',"'", $_GET['bal']) . '" />';	
						?>
						<p class="begin">
							<input type="submit" name="Submit" value="Continue"></p></form>
					<p class="begin">OR</p>      
						  
					<form name="form2" method="post" action="section27.php"> 
						<?php
							foreach($_POST as $name => $value) {
								if($name != 'Submit')
									echo '<input type="hidden" name="' . $name . '" value="' . str_replace('"',"'", $value) . '" />';
							}	
							
							// balance 5
							echo '<input type="hidden" name="balance5" value="' . str_replace('"',"'", $_GET[bal]) . '" />';				
						?>
						<p class="begin">
							<input type="submit" name="Submit" value="I have finished"></p></form></td></tr></table>
	</body>
</html>
