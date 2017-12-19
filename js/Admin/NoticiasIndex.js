$(function(){
	ListarNoticias();

});

$(document).on("click", ".remover", function(){
	if(confirm("Você deseja excluir essa notícia?")){
		var row = $(this).parents("tr");
		var id = $(this).attr("data-id");
		ExcluirNoticia(id, row);
	}
});

function ExcluirNoticia(id, row){
	$.ajax({
		method: 'post',
		url: '/Admin/Noticias/Excluir/' + id,
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

function ListarNoticias(){

	$("#table").DataTable({
		"ajax" : {
			url: "/Admin/Noticias/ListarNoticias",
			"dataSrc": ""
		},
		"columns": [
			{"data":"titulo"},
            {"data":"datahorapublicacao"},
            {"data":"datahoraatualizacao" },
            {"data":"id",
        	 "render": function(data){
			 	return "<a class='btn btn-default' href='/admin/Noticias/editar/"+data+"'>Editar</a>"+
			 		   "<button type='button' class='btn btn-default remover' data-id="+data+">Excluir</button>";
			 }
			}
        ]
		
	});
}