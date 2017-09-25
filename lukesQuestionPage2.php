<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
    <title>Questions</title>
</head>
<body>


    <div>
        Was it good for you again?</div>
        
    <div>
     <form action="lukesQuestionPage3.php?a=<?php echo $_GET['bal']; ?>&b=MTU%3d&c=NTA%3d&d=2" method="post">
        <?php 
            foreach($_POST as $name => $value) {
                echo '<input type="hidden" name="' . $name . '" value="' . str_replace('"',"'", $value]) . '" />';
            }
        
        ?>        
            
            <input name="s1item1" type="radio" value="2" />
            
            <input name="s1item2" type="hidden" value="4" />
            <br />
            <br />
          <input type="submit" name="Submit" value="Continue" />
    </form>
    
        <a href="http://deakinpsychology.com/frmMain.aspx?a=<?php echo $_GET['bal']; ?>&b=MTU%3d&c=NTA%3d&d=3">Click here to play again...</a></div>
</body>
</html>
