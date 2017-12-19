<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="container-fluid">
					<span class="panel-title">Lista de Projetos</span>
					<div class="pull-right">
						<a href="/admin/Projetos/cadastrar" class="btn btn-default">Cadastrar</a>
					</div>
				</div>
			</div>
			<?php
				if($this->session->flashdata('sucesso') !== null){
					echo "<div class='alert alert-success'>".$this->session->flashdata('sucesso')."</div>";
				}
			?>

			<div class="panel-body">			
				<table class="display table table-bordered table-striped" cellspacing="0" width="100%" id="table">
					<thead>
						<tr>
							<td>Título</td>
							<td>Coordenador</td>
							<td>Tipo</td>
							<td>Ações</td>
						</tr>
					</thead>

					<tbody>
						
					</tbody>
				</table>
			</div>
		</div>
			
	</div>
</div>

<script type="text/javascript" src="/DataTables/datatables.js"></script>
<link rel="stylesheet" type="text/css" href="/DataTables/datatables.min.css">
<script type="text/javascript" src="/js/Admin/ProjetosIndex.js"></script>
