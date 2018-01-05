$(document).on("keyup", "#pesquisa", function(){
	var filtro = $(this).val();
	$.ajax({
		url: "/NoticiasFiltro/"+filtro,
		data: filtro,
		method: "GET",
		dataType: "JSON",
		success: function(noticias){
			$("#noticias").empty();
			for(var i = 0; i < noticias.length; i++){
				var string = '<li class="list-group-item"> \
                        <h4>\
                        	<a href="/Noticia/' + noticias[i].id + '">'+noticias[i].titulo+'</a>\
                        </h4>\
                        <p>Data: <i>'+noticias[i].datahorapublicacao+'</i></p>\
                        <p>';
                if(noticias[i].descricao.length < 20){
                	string += noticias[i].descricao;
                }else{
                	string += noticias[i].descricao.substr(0, 20) + "...";
                }
                string += '</p></li>';
				$("#noticias").append(string);
			}
		}
	});
});
