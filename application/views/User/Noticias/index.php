<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="text-center">Notícias</h3>
			</div>

			<div class="panel-body">
				<input type="text" class="form-control" placeholder="Pesquisar..." id="pesquisa">	
			</div>
			<div id="noticias">
				<ul class="list-group">
					<?php foreach ($dados as $noticia): ?>
						<li class="list-group-item">
	                        <h4>
	                        	<a href="/Noticia/<?php echo $noticia->id; ?>">
	                        		<?php echo $noticia->titulo; ?>
	                        	</a>
	                        </h4>
	                        <p>Data: <i><?php echo $noticia->datahorapublicacao; ?></i></p>
	                        <p>
	                            <?php 
	                                echo substr($noticia->descricao, 0, 10);

	                                if(strlen($noticia->descricao) > 10){
	                                    echo "...";
	                                }

	                            ?>
	                            
	                        </p>
                       </li>
                   <?php endforeach ?>
				</ul>
			</div>
		</div>	
	</div>
</div>

<script type="text/javascript" src='/js/User/ListarNoticias.js'></script>