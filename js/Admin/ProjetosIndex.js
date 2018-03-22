$(function(){
	ListarProjetos();

});

$(document).on("click", ".remover", function(){
	if(confirm("Você deseja excluir esse projeto?")){
		var row = $(this).parents("tr");
		var id = $(this).attr("data-id");
		ExcluirProjeto(id, row);
	}
});

function ExcluirProjeto(id, row){
	$.ajax({
		method: 'post',
		url: '/Admin/Projetos/Excluir/' + id,
		success: function(){
			$("#table").DataTable().row(row).remove().draw();
			$("#message").html("<div class='alert alert-success'>Projeto Excluído com sucesso</div>")
		},
		error: function(e){
			$("#message").html("<div class='alert alert-danger'>Houve um erro ao excluir o projeto</div>")
			console.log(e);
		}
	});
	
}

function ListarProjetos(){

	$("#table").DataTable({
		"ajax" : {
			url: "/Admin/Projetos/ListarDatatable",
			"dataSrc": ""
		},
		"columns": [
			{"data":"titulo"},
            {"data":"nome"},
            {"data":"tipo" },
            {"data":"id",
        	 "render": function(data){
			 	return "<a class='btn btn-default' href='/admin/Projetos/editar/"+data+"'>Editar</a>"+
			 		   "<button type='button' class='btn btn-default remover' data-id="+data+">Excluir</button>";
			 }
			}
        ]
		
	});
}