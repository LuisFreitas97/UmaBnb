$(document).ready(function()
{
	$("#profile-pic-input").change(function()
	{
		var file    = document.querySelector('input[type=file]').files[0]; //sames as here
	       var reader  = new FileReader();

	       reader.onloadend = function () 
	       {
	           $("#profile-pic").attr('src',reader.result);
	       };

	       if (file) 
	       {
	           reader.readAsDataURL(file); //reads the data as a URL
	       }
	       else
	       {
	       	alert("Erro ao ler a imagem enviada!");
	       }
	});
});