
$(function() {
  // display next row when green square rb is clicked -- if last row then show continue button
	$('table.timer_table tr th').click( 
	    function (){
	    
	        var trNxt = $(this).parent().next('.hidden');    
	        
	        if(trNxt.length > 0)
	            trNxt.show('fast');
	        else    
	            $('p.hidden').show('slow');
	            
	        window.scrollBy(0,150); // horizontal and vertical scroll increments
	    }
	)
});
	
	
	
	function check(iMaxQs, sSquareNm)
	{
		var iMaxAs = 1;
		var sAlert = '';
		
		for (var i = 1; i <= iMaxQs; i++){
		
			var rblGreenSquares = document.getElementsByName(sSquareNm + i);
			var bAnswered = false;
			
			for (var j = 0; j < iMaxAs; j++){
			
				if (rblGreenSquares[j].checked){
					bAnswered = true;
					break;
				}
			}
			
			if (!bAnswered){
				sAlert += 'You have not selected the square in row: ' + i + '\n';
			}
		}
		
		if (sAlert != ''){
		
			alert(sAlert);

			return false
		}
	}

	var c = 0;
	var t;
	var timer_is_on = 0;
	var sInputID;

	function timedCount()
	{
		c++;
		//t = setTimeout("timedCount()", 1);
	}

	function doTimer(inputID)
	{
		if (!timer_is_on)
		{
		    sInputID = inputID;
			timer_is_on = 1;
			t = setInterval('timedCount()', 100);
			
			//timedCount();
	    }
	}

	function stopCount()
	{
		document.getElementById(sInputID).value = c;
		//clearTimeout(t);
		clearInterval(t);
		timer_is_on = 0;
	}

	function show(divid)
	{
	    //document.getElementById(divid).style.display = 'block'
	    $('.task_div').show('slow');
	}	
