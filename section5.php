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
		<form name="form1" method="post" action="section6.php?bal=<?php echo $_GET['bal']; ?>">
			<?php 
				include ("write_post_vals.php");
				// balance 1
				echo '<input type="hidden" name="balance1" value="' . str_replace('"',"'", $_GET['bal']) . '" />';		
			?>
			<table class="main_table" align="center">
				<tr> 
					<td>    
						<div align="center">
							<img src="du.jpg" width="100" height="100" alt="logo"></div>
							
						<p>
							Please rate how you feel <strong>right now</strong>.</p>
						
						<table class="img_input_table" align="center">
							<tr class="odd_row">
								<th>
									Unpleasant</th>
								<td>
									<input type="radio" value="-7" name="s5item1" /></td>
								<td>
									<input type="radio" value="-6" name="s5item1" /></td>
								<td>
									<input type="radio" value="-5" name="s5item1" /></td>
								<td>
									<input type="radio" value="-4" name="s5item1" /></td>
								<td>
									<input type="radio" value="-3" name="s5item1" /></td>
								<td>
									<input type="radio" value="-2" name="s5item1" /></td>
								<td>
									<input type="radio" value="-1" name="s5item1" /></td>
								<th>
									<input type="radio" value="0" name="s5item1" /><br/>Neither</th>
								<td>
									<input type="radio" value="1" name="s5item1" /></td>
								<td>
									<input type="radio" value="2" name="s5item1" /></td>
								<td>
									<input type="radio" value="3" name="s5item1" /></td>
								<td>
									<input type="radio" value="4" name="s5item1" /></td>
								<td>
									<input type="radio" value="5" name="s5item1" /></td>
								<td>
									<input type="radio" value="6" name="s5item1" /></td>
								<td>
									<input type="radio" value="7" name="s5item1" /></td>
								<th>
									Pleasant</th></tr></table>
						<br />
						<br />
						<table class="img_input_table" align="center">
							<tr class="odd_row">
								<th>
									Down/Depressed</th>
								<td>
									<input type="radio" value="-7" name="s5item2" /></td>
								<td>
									<input type="radio" value="-6" name="s5item2" /></td>
								<td>
									<input type="radio" value="-5" name="s5item2" /></td>
								<td>
									<input type="radio" value="-4" name="s5item2" /></td>
								<td>
									<input type="radio" value="-3" name="s5item2" /></td>
								<td>
									<input type="radio" value="-2" name="s5item2" /></td>
								<td>
									<input type="radio" value="-1" name="s5item2" /></td>
								<th>
									<input type="radio" value="0" name="s5item2" /><br/>Neither</th>
								<td>
									<input type="radio" value="1" name="s5item2" /></td>
								<td>
									<input type="radio" value="2" name="s5item2" /></td>
								<td>
									<input type="radio" value="3" name="s5item2" /></td>
								<td>
									<input type="radio" value="4" name="s5item2" /></td>
								<td>
									<input type="radio" value="5" name="s5item2" /></td>
								<td>
									<input type="radio" value="6" name="s5item2" /></td>
								<td>
									<input type="radio" value="7" name="s5item2" /></td>
								<th>
									Excited</th></tr></table>
						<br />
						<br />
									
						<table class="img_input_table" align="center">
							<tr class="odd_row">
								<th>
									Relaxed</th>
								<td>
									<input type="radio" value="-7" name="s5item3" /></td>
								<td>
									<input type="radio" value="-6" name="s5item3" /></td>
								<td>
									<input type="radio" value="-5" name="s5item3" /></td>
								<td>
									<input type="radio" value="-4" name="s5item3" /></td>
								<td>
									<input type="radio" value="-3" name="s5item3" /></td>
								<td>
									<input type="radio" value="-2" name="s5item3" /></td>
								<td>
									<input type="radio" value="-1" name="s5item3" /></td>
								<th>
									<input type="radio" value="0" name="s5item3" /><br/>Neither</th>
								<td>
									<input type="radio" value="1" name="s5item3" /></td>
								<td>
									<input type="radio" value="2" name="s5item3" /></td>
								<td>
									<input type="radio" value="3" name="s5item3" /></td>
								<td>
									<input type="radio" value="4" name="s5item3" /></td>
								<td>
									<input type="radio" value="5" name="s5item3" /></td>
								<td>
									<input type="radio" value="6" name="s5item3" /></td>
								<td>
									<input type="radio" value="7" name="s5item3" /></td>
								<th>
									Tense</th></tr></table>
						<br />
						<br />
									
						<table class="img_input_table" align="center">
							<tr class="odd_row">
								<th>
									Sleepy</th>
								<td>
									<input type="radio" value="-7" name="s5item4" /></td>
								<td>
									<input type="radio" value="-6" name="s5item4" /></td>
								<td>
									<input type="radio" value="-5" name="s5item4" /></td>
								<td>
									<input type="radio" value="-4" name="s5item4" /></td>
								<td>
									<input type="radio" value="-3" name="s5item4" /></td>
								<td>
									<input type="radio" value="-2" name="s5item4" /></td>
								<td>
									<input type="radio" value="-1" name="s5item4" /></td>
								<th>
									<input type="radio" value="0" name="s5item4" /><br/>Neither</th>
								<td>
									<input type="radio" value="1" name="s5item4" /></td>
								<td>
									<input type="radio" value="2" name="s5item4" /></td>
								<td>
									<input type="radio" value="3" name="s5item4" /></td>
								<td>
									<input type="radio" value="4" name="s5item4" /></td>
								<td>
									<input type="radio" value="5" name="s5item4" /></td>
								<td>
									<input type="radio" value="6" name="s5item4" /></td>
								<td>
									<input type="radio" value="7" name="s5item4" /></td>
								<th>
									Energised</th></tr></table>
									
						<p class="begin">
							<input type="submit" name="Submit" value="Continue" /></p></td></tr></table></form>
	</body>
</html>

