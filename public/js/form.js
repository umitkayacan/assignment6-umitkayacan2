	
	$( document ).ready(function() {
    
		$("#iletisimFrm").on("submit", function (e)
		{
			document.getElementById("sonuc").innerHTML = '<div class="alert alert-success" role="alert">Form Gönderildi</div>';

		} );
});