$(function(){
	
	var note = $('#note'),
		ts = new Date(2022, 4, 14);
		newYear = true;
		//alert(ts);
		//alert(new Date());
		alert('La hora cero llegará el 11 de Abril a las 11:00')
	
	if((new Date()) > ts){ 
		// The new year is here! Count towards something else.
		// Notice the *1000 at the end - time must be in milliseconds
		ts = (new Date()).getTime() + 5*24*60*60*1000;
		newYear = false;
	}
	// alert(ts);

	$('#countdown').countdown({
		timestamp	: ts,
		callback	: function(days, hours, minutes, seconds){
			
			var message = "";
			
			message += days + " day" + ( days==1 ? '':'s' ) + ", ";
			message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
			message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
			message += seconds + " second" + ( seconds==1 ? '':'s' ) + " <br />";
			
			if(newYear){
				message += "quedan para despegar !";
			}
			else {
				message += "a partir de ahora !";
			}
			
			note.html(message);
		}
	});
	
});