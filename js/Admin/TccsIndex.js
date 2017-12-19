$(function(){
	ListarTccs();

});

$(document).on("click", ".remover", function(){
	if(confirm("Você deseja excluir esse TCC?")){
		var row = $(this).parents("tr");
		var id = $(this).attr("data-id");
		ExcluirTcc(id, row);
	}
});

function ExcluirTcc(id, row){
	$.ajax({
		method: 'post',
		url: '/Admin/Projetos/Excluir/' + id,
		success: function(){
			$("#table").DataTable().row(row).remove().draw();
			$("#message").html("<div class='alert alert-success'>TCC Excluído com sucesso</div>");
		},
		error: function(e){
			$("#message").html("<div class='alert alert-danger'>Houve um erro ao excluir o TCC</div>");
			console.log(e);
		}
	});
	
}

function ListarTccs(){

	$("#table").DataTable({
		"ajax" : {
			url: "/Admin/Tccs/Listar",
			"dataSrc": ""
		},
		"columns": [
			{"data":"titulo"},
            {"data":"autor"},
            {"data":"ano" },
            {"data":"id",
        	 "render": function(data){
			 	return "<a class='btn btn-default' href='/admin/Tccs/editar/"+data+"'>Editar</a>"+
			 		   "<button type='button' class='btn btn-default remover' data-id="+data+">Excluir</button>";
			 }
			}
        ]
		
	});
}