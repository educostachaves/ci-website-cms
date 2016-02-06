<?php $this->load->view('includes/admin_header'); ?>

<section id="wrapper">
	<?php $this->load->view('includes/admin_menu',$this->session->all_userdata()); ?>
	<div id="page-wrapper">
		<?php $this->load->view($main_content); ?>
	</div>
</section>

<?php $this->load->view('includes/admin_footer'); ?>
