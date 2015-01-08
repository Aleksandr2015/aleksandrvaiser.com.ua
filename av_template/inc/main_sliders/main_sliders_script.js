$(function () {
	var s1 =  $('#slider_exclusives img'),
		indexImg = 1,
		indexMax = s1.length;
		
		function autoCange () {	
			indexImg++;
			if(indexImg > indexMax) {
				indexImg = 1;
			}			
			s1.fadeOut(1000);
			s1.filter(':nth-child('+indexImg+')').fadeIn(1000);
		}	
		setInterval(autoCange, 5000);	
});

$(function () {
	var s2 =  $('#slider_sell img'),
		indexImg = 1,
		indexMax = s2.length;
		
		function autoCange () {	
			indexImg++;
			if(indexImg > indexMax) {
				indexImg = 1;
			}			
			s2.fadeOut(700);
			s2.filter(':nth-child('+indexImg+')').fadeIn(700);
		}	
		setInterval(autoCange, 7000);	
});

$(function () {
	var s3 =  $('#slider_rent img'),
		indexImg = 1,
		indexMax = s3.length;
		
		function autoCange () {	
			indexImg++;
			if(indexImg > indexMax) {
				indexImg = 1;
			}			
			s3.fadeOut(700);
			s3.filter(':nth-child('+indexImg+')').fadeIn(700);
		}	
		setInterval(autoCange, 9000);	
});