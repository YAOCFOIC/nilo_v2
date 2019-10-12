$(document).ready(function(){
	
	$(".search").click( function(e){
		//e.preventDefault();
		var submitButton = $("#nit").attr("pattern", '^[0-9]{9}-{1}[0-9]{1}');
		var submitButton = $("#actividadeconomica").attr("pattern", '^[0-9]{4}}');		
		$('#formulario').css('display', 'none'); 
	
	});
});

