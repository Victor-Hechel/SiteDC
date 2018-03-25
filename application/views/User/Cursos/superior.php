<div class="row">
	<div class="col-sm-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="text-center">Tecnologia em Análise e Desenvolvimento de Sistemas</h4>
			</div>
			<ul class="nav nav-pills nav-stacked" role="tablist">
				<li class="active">
					<a class="nav-item" id="nav-descricao-tab" data-toggle="tab" href="#nav-descricao" role="tab" aria-controls="nav-descricao" aria-selected="true">Descrição</a>
				</li>
				<li>
					<a class="nav-item" id="nav-grade-tab" data-toggle="tab" href="#nav-grade" role="tab" aria-controls="nav-grade" aria-selected="false">Grade Curricular</a>
				</li>
				<li>
				  <a class="nav-item" id="dropdown" data-toggle="tab" aria-expanded="false" href="#" role="tab">
				    TCCs
				    <span class="caret"></span>
				  </a>
				  <ul class="nav nav-pills nav-stacked" role="tablist" id = "drop">
				  	<li class='dropdown-item'>
						<a class="nav-item" id="nav-normas-tab" data-toggle="tab" href="#nav-normas" role="tab" aria-controls="nav-normas" aria-selected="false">Documento</a>
					</li>
					<li class="dropdown-item">
						<a class="nav-item dropdown-item" id="nav-trabalhos-tab" data-toggle="tab" href="#nav-trabalhos" role="tab" aria-controls="nav-trabalhos" aria-selected="false">Trabalhos</a>
					</li>
				  </ul>
				</li>
				
			</ul>
		</div>
	</div>

	<div class="col-sm-9">
		<div class="panel panel-default tab-content" id="mainPanel">

			<div class="tab-pane active" id="nav-descricao" role="tabpanel" aria-labelledby="nav-descricao-tab">
				<div class="panel-heading">
					<h2 class="text-center">Descrição</h2>
				</div>
				<div class="panel-body">
					<p>Inserir Descrição do Curso</p>
				</div>
			</div>

			<div class="tab-pane" id="nav-grade" role="tabpanel" aria-labelledby="nav-grade-tab">
				<div class="panel-heading">
					<h2 class="text-center">Grade Curricular</h2>
				</div>
				<div class="panel-body">
					<img src="/images/gradeTads.png" class="img-responsive">
				</div>
			</div>

			<div class="tab-pane" id="nav-normas" role="tabpanel" aria-labelledby="nav-normas-tab">
				<div class="panel-heading">
					<h2 class="text-center">Documentos</h2>
				</div>
				<div class="panel-body">
					<p>Inserir Normas de TCC</p>
				</div>
			</div>

			<div class="tab-pane" id="nav-trabalhos" role="tabpanel" aria-labelledby="nav-trabalhos-tab">
				<div class="panel-heading">
					<h2 class="text-center">Trabalhos</h2>
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
							<ul class="list-group" id="tccs">
								<?php foreach ($dados as $tcc): ?>
									<li class="list-group-item">
				                        <h4>
				                        	<a target="_blank" href="/tccs/<?php echo $tcc->file; ?>">
				                        		<?php echo $tcc->titulo; ?>
				                        	</a>
				                        </h4>
				                        <p>Autor(a): <?php echo $tcc->autor; ?></p>
				                        <p>Orientador(a): <?php echo $tcc->orientador; ?></p>
				                        <p>Palavras Chave: <?php echo $tcc->palavraschave; ?></p>
				                       	<p>Ano: <?php echo $tcc->ano;?></p>
			                       </li>
			                   <?php endforeach ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<style type="text/css">
	#drop{
		display: none;
	}
</style>


<script type="text/javascript">
	$(document).on("click", "#dropdown", function(){
		if($("#drop").css("display") != "none"){
			$("#drop").slideUp("fast");
		}else{
			$("#drop").slideDown("fast");
		}
	});

	$(".nav").on("click", "li", function(){
		if($(this).children().first().attr("id") != "dropdown"){
			if(!($(this).hasClass("dropdown-item"))){
				$(".active").removeClass("active");
				$("#drop").slideUp("fast");

			}
			$(this).children().first().tab('show');
		}
	});

	$(document).on("keyup", "#pesquisa", function(){
		var filtro = $(this).val();
		$.ajax({
			url: "/CursosListar/superior/"+filtro,
			data: filtro,
			method: "GET",
			dataType: "JSON",
			success: function(tccs){
				$("#tccs").empty();
				for(var i = 0; i < tccs.length; i++){
					var string = '<li class="list-group-item"> \
	                        <h4>\
	                        	<a target="_blank" href="/tccs/' + tccs[i].file + '">'+tccs[i].titulo+'</a>\
	                        </h4>\
	                        <p>Autor: ' + tccs[i].autor + '</p>'+
	                        '<p>Orientador(a): ' + tccs[i].orientador + '</p>\
	                        <p>Palavras Chave: ' + tccs[i].palavraschave +'</p>\
	                       	<p>Ano: ' + tccs[i].ano+'</p></li>';
					$("#tccs").append(string);
				}
			}
		});
	});

</script>