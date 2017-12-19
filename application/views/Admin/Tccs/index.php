<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="container-fluid">
						<span class="panel-title">Lista de Tccs</span>
					<div class="pull-right">
						<a href="/admin/Tccs/cadastrar" class="btn btn-default">Cadastrar</a>
					</div>
				</div>
			</div>
			<?php
				if($this->session->flashdata('sucesso') !== null){
					echo "<div class='alert alert-success'>".$this->session->flashdata('sucesso')."</div>";
				}
			?>
			<div class="panel-body">

				<table class="table table-striped table-bordered display" id="table">
					<thead>
						<tr>
							<th>Titulo</th>
							<th>Autor</th>
							<th>Ano</th>
							<th>Ações</th>
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
<script type="text/javascript" src="/js/Admin/TccsIndex.js"></script>