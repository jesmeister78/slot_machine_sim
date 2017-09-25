<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title>Survey</title>
		<meta http-equiv="Content-Type" content="text/html; utf-8">
		<link href="SurveyStyle.css" rel="stylesheet" type="text/css" />
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
		<script type="text/javascript" src="RandomAction.js"></script>
		<script type="text/javascript">
			window.history.forward(); 
			function noBack(){ window.history.forward(); }
		</script>
	</head>

	<body bgcolor="#000066" text="#000000" link="#990000" vlink="#990000" alink="#990000" leftmargin="0" topmargin="0" bottommargin="0" onLoad="noBack(); fnRndAction(1, 'MTAw');" onpageshow="if (event.persisted) noBack();" onUnload="">
		<form name="form1" method="post" action="">
			<?php include ("write_post_vals.php"); ?>
			<table class="main_table" align="center">
				<tr> 
					<td>        
						<div align="center">
							<img src="du.jpg" width="100" height="100" alt=""></div>
						<p>
							In a moment, we would like you to gamble (20 bets) on a computerised slot-machine game.</p>       
						<p>
							You can increase the $10 voucher that you will receive for participating in this study by playing the slot-machine 
							(however, you cannot lose any of the $10 voucher).</p>       
						<p>
							Each dollar is worth ten credits, so you will be given 100 credits to start with (as $10 x 10 credits = 100 credits).</p>
						<p>
							You will be asked to play a few blocks of 10 or 20 gambles during this study.</p>         
						<p>
							Any credits remaining above $10 at the end of the study  will be paid to you as extra voucher credit.</p>         
						<p>
							<u>Please read the following brief instructions on how to play.</u></p>
						<p>
							Choose a bet amount by pressing &quot;5&quot; or &quot;10&quot; (you can change this amount at any time during play) then press SPIN to play 
							(please DO NOT press SPIN again until the symbols display).</p>        
						<p>
							When you have 0 bets remaining, hit &quot;RESTART&quot; to return to the study.</p>        
						<p>
							For each spin, you can lose the credits you bet, or win one, two, or three times the amount you bet (this depends on the combination of symbols displayed after you press SPIN). 
							The winning combinations are different to commercial slot-machines.</p>
						<p>
							Before you start, please rate how much you exepct to <strong>like </strong>playing the slot machine game:</p>        
						<table class="bipolar_input_table" align="center">
							<tr class="odd_row">
								<th>
									Not at all</strong></th>
								<td>
									<input type="radio" value="1" name="s3item1" />1</td>
								<td>
									<input type="radio" value="2" name="s3item1" />2</td>
								<td>
									<input type="radio" value="3" name="s3item1" />3</td>
								<td>
									<input type="radio" value="4" name="s3item1" />4</td>
								<td>
									<input type="radio" value="5" name="s3item1" />5</td>
								<td>
									<input type="radio" value="6" name="s3item1" />6</td>
								<td>
									<input type="radio" value="7" name="s3item1" />7</td>
								<th>
									Very much</th></tr></table>
						<p>
							Please rate how much you<strong> want </strong>to play the slot machine game:</p>        
						<table class="bipolar_input_table" align="center">
							<tr class="odd_row">
								<th>
									Not at all</strong></th>
								<td>
									<input type="radio" value="1" name="s3item2" />1</td>
								<td>
									<input type="radio" value="2" name="s3item2" />2</td>
								<td>
									<input type="radio" value="3" name="s3item2" />3</td>
								<td>
									<input type="radio" value="4" name="s3item2" />4</td>
								<td>
									<input type="radio" value="5" name="s3item2" />5</td>
								<td>
									<input type="radio" value="6" name="s3item2" />6</td>
								<td>
									<input type="radio" value="7" name="s3item2" />7</td>
								<th>
									Very much</th></tr></table>
										
						<p>
							Please rate how you feel <strong>right now</strong>.</p>
						<table class="img_input_table" align="center">
							<tr class="odd_row">
								<th>
									Unpleasant</th>
								<td>
									<input type="radio" value="-7" name="s10item1" /></td>
								<td>
									<input type="radio" value="-6" name="s10item1" /></td>
								<td>
									<input type="radio" value="-5" name="s10item1" /></td>
								<td>
									<input type="radio" value="-4" name="s10item1" /></td>
								<td>
									<input type="radio" value="-3" name="s10item1" /></td>
								<td>
									<input type="radio" value="-2" name="s10item1" /></td>
								<td>
									<input type="radio" value="-1" name="s10item1" /></td>
								<th>
									<input type="radio" value="0" name="s10item1" /><br/>Neither</th>
								<td>
									<input type="radio" value="1" name="s10item1" /></td>
								<td>
									<input type="radio" value="2" name="s10item1" /></td>
								<td>
									<input type="radio" value="3" name="s10item1" /></td>
								<td>
									<input type="radio" value="4" name="s10item1" /></td>
								<td>
									<input type="radio" value="5" name="s10item1" /></td>
								<td>
									<input type="radio" value="6" name="s10item1" /></td>
								<td>
									<input type="radio" value="7" name="s10item1" /></td>
								<th>
									Pleasant</th></tr></table>
						<br />
						<br />
						<table class="img_input_table" align="center">
							<tr class="odd_row">
								<th>
									Sleepy</th>
								<td>
									<input type="radio" value="-7" name="s10item4" /></td>
								<td>
									<input type="radio" value="-6" name="s10item4" /></td>
								<td>
									<input type="radio" value="-5" name="s10item4" /></td>
								<td>
									<input type="radio" value="-4" name="s10item4" /></td>
								<td>
									<input type="radio" value="-3" name="s10item4" /></td>
								<td>
									<input type="radio" value="-2" name="s10item4" /></td>
								<td>
									<input type="radio" value="-1" name="s10item4" /></td>
								<th>
									<input type="radio" value="0" name="s10item4" /><br/>Neither</th>
								<td>
									<input type="radio" value="1" name="s10item4" /></td>
								<td>
									<input type="radio" value="2" name="s10item4" /></td>
								<td>
									<input type="radio" value="3" name="s10item4" /></td>
								<td>
									<input type="radio" value="4" name="s10item4" /></td>
								<td>
									<input type="radio" value="5" name="s10item4" /></td>
								<td>
									<input type="radio" value="6" name="s10item4" /></td>
								<td>
									<input type="radio" value="7" name="s10item4" /></td>
								<th>
									Energised</th></tr></table>
						<p>
							Now, please press the button below to begin gambling.</p>        
						<p class="begin">
							<input type="submit" name="Submit" value="Begin gambling" onclick="fnRndAction(1, gup('bal'));" /></p></td></tr></table></form>
	</body>
</html>

