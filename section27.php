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
		<form name="form1" method="post" action="frmThanks.aspx">
			<?php 
				include ("write_post_vals.php");
				// balance 7
				echo '<input type="hidden" name="balance7" value="' . str_replace('"',"'", $_GET[bal]) . '" />';
			?>
			<table class="main_table" align="center">
				<tr> 
					<td>	
						<div align="center">
							<img src="du.jpg" width="100" height="100"></div>
						<p>
							Please rate how you feel <strong>right now:</strong>.</p>
						
						<table class="img_input_table" align="center">
							<tr class="heading_row">
								<th colspan="15">
									<img src="s5header2.jpg" alt="s5h2" /></th></tr>
							<tr class="odd_row">
								<td>
									<input type="radio" value="-7" name="s24item1" /></td>
								<td>
									<input type="radio" value="-6" name="s24item1" /></td>
								<td>
									<input type="radio" value="-5" name="s24item1" /></td>
								<td>
									<input type="radio" value="-4" name="s24item1" /></td>
								<td>
									<input type="radio" value="-3" name="s24item1" /></td>
								<td>
									<input type="radio" value="-2" name="s24item1" /></td>
								<td>
									<input type="radio" value="-1" name="s24item1" /></td>
								<td>
									<input type="radio" value="0" name="s24item1" /></td>
								<td>
									<input type="radio" value="1" name="s24item1" /></td>
								<td>
									<input type="radio" value="2" name="s24item1" /></td>
								<td>
									<input type="radio" value="3" name="s24item1" /></td>
								<td>
									<input type="radio" value="4" name="s24item1" /></td>
								<td>
									<input type="radio" value="5" name="s24item1" /></td>
								<td>
									<input type="radio" value="6" name="s24item1" /></td>
								<td>
									<input type="radio" value="7" name="s24item1" /></td></tr></table>
						<br />			
						<br />	
						<p>
							Thank you very much. You have now finished the study.</p>
						<p> 
							You have the opportunity to provide comments or feedback in the box below.</p>
						<p>
							<textarea name="comments" id="comments" cols="60" rows="4"></textarea></p>
						<br/ >
						<br/ >	
							
						<p>
							If you would like to recieve a voucher, please provide your email address: <input type="text" name="voucher_email" /></p>
						<p>
							Please select a voucher.  If you want a voucher not shown in the list, select "Other", and indicate in the box which voucher you would like. You MUST ensure that you choose a voucher that can be emailed to you.</p>
						<p>
							<input type="radio" value="1" name="voucher" />E-Bay<br />
							<input type="radio" value="2" name="voucher" />Amazon<br />
							<input type="radio" value="3" name="voucher" />iTunes<br />
							<input type="radio" value="4" name="voucher" />Toys R Us<br />
							<input type="radio" value="5" name="voucher" />The Book Depository<br />
							<input type="radio" value="6" name="voucher" />KMart<br />
							<input type="radio" value="7" name="voucher" />Walmart<br />
							<input type="radio" value="8" name="voucher" />Greater Union Cinemas<br />
							<input type="radio" value="9" name="voucher" />Hoyts Cinemas<br />
							<input type="radio" value="10" name="voucher" />Other (Please indicate): <input type="text" name="voucher_other" /></p>
						
						<p>
							Please press &quot;Submit&quot; when you have finished.</p>
						<p class="begin"> 
							<input type="submit" name="Submit" value="Submit"></p></td></tr></table></form>
	</body>
</html>




