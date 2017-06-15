$(document).ready(function () {
			
			 $.ajax({
                url: "validate-albaran",
                type: "get",
                dataType: "json",
                data:  $("input[name='albaran[]']"),

            }).done(function(response){
            	console.log(response);
            });
            $('[data-toggle="popover"]').popover(); 
		});