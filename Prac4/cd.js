
  
    function countdown(timer){
		
		  var hours = Math.floor(timer / (60 * 60));
         
          var divisor_for_minutes = timer % (60 * 60);
          var minutes = Math.floor(divisor_for_minutes / 60);
       
          var divisor_for_seconds = divisor_for_minutes % 60;
          var seconds = Math.ceil(divisor_for_seconds);
         
          var obj = hours + ":" + minutes + ":" + seconds;
          return obj;
		  
    }
	
	function timess(timer){
		
        var varName = function(){
            if(timer >= 0) {
                  clock=countdown(timer);
                document.title = clock;
                timer--;
				 
				
            } else {
                  clearInterval(varName);
                  window.location = "logoutime.jsp";
            }
		
		};
		setInterval(varName, 1000);
	}
	
	