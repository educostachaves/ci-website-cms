
<section class="content-fluid inside-section" >
	<article class="col-sm-10 col-sm-offset-1 contact-content">
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
				<address>
					<p>
						Rua da Conceição, 188, Sala 704<br/>
						Niterói Shopping<br/>
						Centro - Niterói - RJ<br/>
					  <abbr title="Telefone"><strong>Telefone:</strong></abbr> 21 99983-2421
					</p>
				</address>
				<div id="map" class="col-sm-12 map-contact"></div>
			</div>
			<div class="col-sm-6 col-sm-offset-1">
				<h2>Fale Conosco</h2>
				<p>Preencha o formulário abaixo para entrar em contato conosco. Suas opiniões e sugestões são muito importantes para nós. Assim que possível retornaremos sua mensagem.</p>
				<div class="form-contact">
					<?php
            $attributes = array('class' => 'form-signup');
            echo form_open(base_url().'enviar', $attributes);
	        ?>
					<div class="row">
						<div class="col-sm-6">
							<?php echo form_input('nome', set_value('nome'), 'placeholder="Nome" class="field"'); ?>
						</div>
						<div class="col-sm-6">
							<?php echo form_input('email', set_value('email'), 'placeholder="E-mail" class="field"'); ?>
						</div>
						<div class="col-sm-6">
							<?php echo form_input('telefone', set_value('telefone'), 'placeholder="Telefone" class="field"'); ?>
						</div>
						<div class="col-sm-6">
							<?php echo form_input('endereco', set_value('endereco'), 'placeholder="Endereço" class="field"'); ?>
						</div>
						<div class="col-sm-12">
							<?php echo form_textarea('mensagem', set_value('mensage'), 'placeholder="Nome" class="text"'); ?>
						</div>
						<div class="col-sm-12">
							<input type="submit" value="enviar" class="btn-submit"/>
						</div>
					</div>
				</div>
			</div>
		</div>
	</article>
</section>
