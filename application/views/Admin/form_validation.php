<?php
	if(validation_errors() != null){
?>
	<div class="alert alert-danger text-center">
		<?php
			echo validation_errors();
		?>
	</div>
<?php
	}
?>