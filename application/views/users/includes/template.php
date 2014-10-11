<script type="text/javascript"> var i;</script>
<?php 


$data['title'] = $title;

$this->load->view('users/includes/header', $data);
$this->load->view('users/includes/nav');
?>
<div class="container">
	<?php $this->load->view($content); ?>
</div>
<?php 
$this->load->view('users/includes/footer');