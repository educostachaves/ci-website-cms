<?php $this->load->view('includes/site_header'); ?>

<?php $this->load->view('includes/site_menu', $this->session->all_userdata()); ?>

<?php $this->load->view($main_content); ?>

<?php $this->load->view('includes/site_footer'); ?>
