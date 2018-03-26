<input type="hidden" id="tipoProjeto" value="<?php echo $tipoProjeto; ?>">

<div class="row">
	<div class="col-sm-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="text-center">Projetos</h4>
			</div>
			<ul class="nav nav-pills nav-stacked tabMenu" role="tablist">
				<li data-item = "pesquisa" <?php echo ($tipoProjeto == "pesquisa" ? "class='active'" : ""); ?>>
					<a class="nav-item" id="nav-pesquisa-tab" href="#nav-pesquisa">Pesquisa</a>
				</li>
				<li data-item="extensao" <?php echo ($tipoProjeto == "extensao" ? "class='active'" : ""); ?>>
					<a class="nav-item" id="nav-extensao-tab" href="#nav-extensao">Extensão</a>
				</li>
				<li data-item="ensino" <?php echo ($tipoProjeto == "ensino" ? "class='active'" : ""); ?>>
					<a class="nav-item" id="nav-ensino-tab" href="#nav-ensino">Ensino</a>
				</li>
			</ul>
		</div>
	</div>

	<div class="col-sm-9">

		<div class="panel panel-default tab-content">

			<div class="panel-heading">
				<h2 class="text-center">Projetos</h2>
			</div>
			<div class="panel-body">
				<div class='row'>
					<div class="col-sm-12">
						<hr>
						<input type="text" id="pesquisa" placeholder="Pesquisar..." class="form-control">
						<hr>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-12">
						<ul class="list-group" id="projetos">
							<?php foreach ($dados as $projeto): ?>
								<li class="list-group-item">
			                        <h4>
			                        	<a href="/ProjetoDetalhes/<?php echo $projeto->id; ?>">
			                        		<?php echo $projeto->titulo; ?>
			                        	</a>
			                        </h4>
			                        <p>Orientador(a): <?php echo $projeto->nome; ?></p>
		                       </li>
		                   <?php endforeach ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">

	var tipoProjeto;

	$(function(){
		tipoProjeto = $("#tipoProjeto").val();
	});

	$(document).on("keyup", "#pesquisa", ListarProjetos);

	$(document).on("click", ".tabMenu li", function(){
		$("#tipoProjeto").val($(this).attr("data-item"));
		tipoProjeto = $(this).attr("data-item");
		$("ul .active").removeClass("active");
		$(this).addClass("active");
		$("#pesquisa").val('');
		ListarProjetos('');
	});

	function ListarProjetos(){
		var filtro = $("#pesquisa").val();
		$.ajax({
			url: "/ProjetosListar/"+tipoProjeto+"/"+filtro,
			data: filtro,
			method: "GET",
			dataType: "JSON",
			success: function(projetos){
				$("#projetos").empty();
				for(var i = 0; i < projetos.length; i++){
					var string = '<li class="list-group-item"> \
	                        <h4>\
	                        	<a target="_blank" href="/ProjetoDetalhes/' + projetos[i].id + '">'+projetos[i].titulo+'</a>\
	                        </h4>\
	                        <p>Orientador(a): ' + projetos[i].nome + '</p></li>';
					$("#projetos").append(string);
				}
			}
		});
	}

</script>