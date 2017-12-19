$(function(){
	$(document).on("click", "#addBolsista", function(){
		var nome = $("#bolsista").val();
		if(nome != ""){
			$("tbody").append("<tr><td>"+nome+"</td><td> \
							  <input type='hidden' value='"+nome+"' name='bolsista[]'> \
							  <button type='button' class='btn btn-danger removerBolsista'>\
							  Remover</button></td></tr>");
		}
		$("#bolsista").val('');
	});

	$(document).on("click", ".removerBolsista", function(){
		$(this).parents("tr").first().remove();
	});
});