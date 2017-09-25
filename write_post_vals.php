<?php 
	foreach($_POST as $name => $value) {
		if(($name != 'Submit') and (preg_match("/square/i", $name) == 0))
			echo '<input type="hidden" name="' . $name . '" value="' . str_replace('"',"'", $value) . '" />';
	}	
?>