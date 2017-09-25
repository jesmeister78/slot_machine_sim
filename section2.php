<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Survey</title>
		<meta http-equiv="Content-Type" content="text/html; utf-8" />
		<link href="SurveyStyle.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript">
			window.history.forward(); 
			function noBack(){ window.history.forward(); }
		</script>
	</head>
	<body onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">
		<form name="form1" method="post" action="section3.php?bal=MTAw">
			<?php include ("write_post_vals.php"); ?>
			<table class="main_table" align="center">
				<tr> 
					<td> 
						<div align="center">
							<img src="du.jpg" width="100" height="100" alt="" /></div>
						<p align="left">
							The next group of questions ask about you.<br />
							<br />
							Please either select or write in the response which best describes you.</p>
						<p>
							<strong>1.  What is your age?</strong> 
							<input name="age" type="text" id="age" /></p>
						<p>
							<strong>2. What is your gender?</strong><br />
							<input type="radio" name="gender" value="1" /> Male<br />
							<input type="radio" name="gender" value="2" /> Female</p>
						<p>
							<strong>3. What is your highest level of education?</strong><br />
							<input type="radio" name="edu" value="1" /> Primary / Elementary School<br />
							<input type="radio" name="edu" value="2" /> High School (or Junior High School)<br />
							<input type="radio" name="edu" value="3" /> Trade Certificate or Diploma (e.g. Hairdressing or Electrician)<br />
							<input type="radio" name="edu" value="4" /> College / University - Undergraduate <br />
							<input type="radio" name="edu" value="5" /> College / University - Postgraduate <br />
							<input type="radio" name="edu" value="6" /> Other (please specify):
							<input type="text" name="eduother" id="eduother" /></p>
						<p> 
							<strong>4. In what country do you usually live?</strong>
							<input name="country" type="text" id="country" /></p>
						<p> 
							<strong>5. With which ethnic group do you most identify?</strong><br />
							<input type="radio" name="eth" value="1" /> Caucasian (or European)<br />
							<input type="radio" name="eth" value="2" /> Asian <br />
							<input type="radio" name="eth" value="3" /> African <br />
							<input type="radio" name="eth" value="4" /> Hispanic<br />
							<input type="radio" name="eth" value="5" /> Arab <br />
							<input type="radio" name="eth" value="6" />	Other <b>(please specify):</b>
							<input type="text" name="ethother" id="ethother" /></p>
						<p>
							<strong>6. What do you consider your main gambling game?</strong>
							<input type="text" name="game" id="indother3" /></strong></p>
						<p>
							<strong>7. Where do you mostly play this game?</strong><br />
							<input type="radio" name="play" value="1" /> Internet<br />
							<input type="radio" name="play" value="2" /> Not the internet</p>
						<p>
							<strong>8. How frequently do you gamble (including all game types)?</strong><br />
							<input type="radio" name="freq" value="4" /> Most days<br />
							<input type="radio" name="freq" value="3" /> More than once a week<br />
							<input type="radio" name="freq" value="2" /> More than once a month<br />
							<input type="radio" name="freq" value="1" /> Less then once a month</p>
						<p>
							<strong>9. Approximately how many hours do you gamble in a usual session?</strong>
								<input name="hours" type="text" id="hours" size="3" /> hours</p>
						<p>
							<strong>10. When did you last gamble?</strong><br />
							<input type="radio" name="last" value="6" /> Today<br />
							<input type="radio" name="last" value="5" /> Yesterday<br />
							<input type="radio" name="last" value="4" /> Within the last week<br />
							<input type="radio" name="last" value="3" /> Within the last fortnight<br/>
							<input type="radio" name="last" value="2" /> Within the last month<br />
							<input type="radio" name="last" value="1" /> More than a month ago</p>
						<p>
							<strong>11. How long ago did you gamble for the very first time (if you are not sure, just write your best estimate)?</strong><br />
							<input name="firsty" type="text" id="firsty" size="3" /> years
							<input name="firstm" type="text" id="firstm" size="3" /> months</p>
						<p>
							<strong>Since then, how many weeks in total have you gambled more than once a week?</strong> Please give your best estimate. 
							(Please add together any weeks from all times in which you have gambled)<br />
							<input name="weeks" type="text" id="weeks" size="3" /> weeks<br /></p>
						<br />
							        
						<input type="submit" name="Submit" value="Continue"></td></tr></table></form>
	</body>
</html>
