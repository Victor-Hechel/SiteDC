<div class="row">
	<div class="col-md">

<table class="table">
	<tr>
		<td>Título</td>
		<td>Data/Hora</td>
	</tr>

	<?php
		foreach ($noticias as $noticia) {
	?>
		<tr>
			<td><?php echo $noticia->titulo;?></td>
			<td><?php echo $noticia->datahora;?></td>
		</tr>
	<?php
		}
	?>

</table>