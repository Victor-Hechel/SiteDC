$(function(){
	ListarProfessores();

});

$(document).on("click", ".remover", function(){
	if(confirm("Você deseja excluir esse professor?")){
		var row = $(this).parents("tr");
		var id = $(this).attr("data-id");
		ExcluirProfessor(id, row);
	}
});

$(document).on("change", "input[type='checkbox']", function(e){
	var element = $(this);
	var siape = element.attr("data-id");
	var value = element.attr("data-value");
	console.log(value);
	if (value == 'true') {
		value = 'f';
	}else{
		value = 't';
	}

	$.ajax({
		method: 'post',
		url: '/Admin/Professores/AlterarAtivo/' + siape + "/" + value,
		success: function(){
			if(value == 'f'){
				element.attr("data-value", "false");
			}else{
				element.attr("data-value", "true");
			}
		},
		error: function(error){
			console.log(error);
		}
	});

});

function ExcluirProfessor(id, row){
	$.ajax({
		method: 'post',
		url: '/Admin/Professores/Excluir/' + id,
		success: function(){
			$("#table").DataTable().row(row).remove().draw();
			$("#message").html("<div class='alert alert-success'>Notícia Excluída com sucesso</div>")
		},
		error: function(e){
			$("#message").html("<div class='alert alert-danger'>Houve um erro ao excluir a notícia</div>")
			console.log(e);
		}
	});
	
}

function ListarProfessores(){

	$("#table").DataTable({
		"ajax" : {
			url: "/Admin/Professores/Listar",
			"dataSrc": ""
		},
		"columns": [
			{"data":"nome"},
            {"data":"email"},
            {"data":"ativo",
             "render": function(data, type, full){
             	var checked = "";
             	var value = "false";
             	if (data == "t") {
             		checked = "checked";
             		value="true";
             	}	
             	return '<label class="switch">'+
						'<input data-id='+full.siape+' data-value='+value+' type="checkbox" '+ checked+'>'+
						'<span class="slider round"></span>'+
					   '</label>';
             } 
         	},
            {"data":"siape",
        	 "render": function(data){
			 	return "<a class='btn btn-default' href='/admin/Professores/editar/"+data+"'>Editar</a>"+
			 		   "<button type='button' class='btn btn-default remover' data-id="+data+">Excluir</button>";
			 }
			}
        ]
		
	});
}