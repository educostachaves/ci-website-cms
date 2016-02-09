
<section class="container contact">
	<div class="col-md-12">
		<?php
			if(isset($message_error) && $message_error){
				echo '<div class="alert alert-warning alert-dismissible" role="alert">';
				echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
				echo $message_error;
				echo '</div>';
			}

			if(validation_errors()){
				echo '<div class="alert alert-danger alert-dismissible" role="alert">';
				echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
				echo validation_errors();
				echo '</div>';
			}
		?>
		<div class="row">
			<div class="col-sm-5">
				<h2>Contatos</h2>
				<?php
					if (count($configuracoes) > 0 ) {
						foreach ($configuracoes as $configuracao) {
							echo '<address>';
							echo '<p>'.$configuracao->endereco.'<br/>';
							echo $configuracao->bairro.'<br/>';
							echo $configuracao->cidade." - ".$configuracao->estado.'</p>';
							echo '<p>'.$configuracao->telefone.'<br/>';
							echo $configuracao->celular.'</p>';
							echo '<p><a href="mailto:'.$configuracao->email.'">'.$configuracao->email.'</a></p>';
							echo '</address>';
							echo $configuracao->maps;
						}
					}
				?>
			</div>
			<div class="col-sm-6 col-sm-offset-1">
				<div class="row">
					<div class="col-sm-12">
						<h2>Fale Conosco</h2>
						<p>Preencha o formulário abaixo para entrar em contato conosco. Suas opiniões e sugestões são muito importantes para nós. Assim que possível retornaremos sua mensagem.</p>
					</div>
				</div>
				<div class="row">
					<?php
	          $attributes = array('class' => 'form-contact', 'role' => 'form');
	          echo form_open(base_url().'enviar', $attributes);
	        ?>
					<div class="form-group">
						<div class="col-sm-6">
							<?php echo form_input('nome', set_value('nome'), 'placeholder="Nome" class="form-control"'); ?>
						</div>
						<div class="col-sm-6">
							<?php echo form_input('email', set_value('email'), 'placeholder="E-mail" class="form-control"'); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-6">
							<?php echo form_input('telefone', set_value('telefone'), 'placeholder="Telefone" class="form-control"'); ?>
						</div>
						<div class="col-sm-6">
							<?php echo form_input('endereco', set_value('endereco'), 'placeholder="Endereço" class="form-control"'); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<?php echo form_textarea('mensagem', set_value('mensage'), 'placeholder="Digite sua mensagem" class="form-control"'); ?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<input type="submit" value="Enviar" class="btn btn-default"/>
							<input type="reset" value="Limpar" class="btn btn-default"/>
						</div>
					</div>
					<?php
	          echo form_close();
	        ?>
				</div>
			</div>
		</div>
	</article>
</section>
