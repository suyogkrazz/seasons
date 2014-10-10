<?php 


$data['title'] = $title;
$data['id'] = $id;

$this->load->view('admin/includes/header', $data);

if($this->session->userdata('admin_logged_in') == true){
	$this->load->view('admin/includes/nav', $data);
}
?>
<div class="col-md-9 content">
	<?php $msg = $this->session->flashdata('msg'); if(!empty($msg)): ?>
	<div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo ucfirst($msg); ?>
    </div>
	<?php endif; ?>
	<?php $this->load->view($content); ?>
</div>
<?php 

if($this->session->userdata('admin_logged_in') == true){
	$this->load->view('admin/includes/footer');
}