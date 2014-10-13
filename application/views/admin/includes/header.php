<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title> <?php echo ucfirst($title).' | Admin | Seasons Pokhara'; ?> </title>
	<link rel="icon" href="<?php echo base_url('favicon.png'); ?>" type="image/png">
	<link rel="stylesheet" type="text/css" href="<?php echo site_url().'assets/css/bootstrap.min.css'; ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/cropper.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/imgareaselect-default.css')?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/admin.css'); ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/lightbox.css'); ?>">
	<script type="text/javascript" src="<?php echo site_url().'assets/ckeditor/ckeditor.js' ?>"></script>
	<style>
    .eg-container {
      padding-top: 15px;
      padding-bottom: 15px;
    }

    .eg-main {
      max-height: 480px;
      margin-bottom: 30px;
    }

    .eg-wrapper {
      background-color: #f7f7f7;
      border: 1px solid #eee;
      box-shadow: inset 0 0 3px #f7f7f7;
      height: 480px;
      width: 100%;
      overflow: hidden;
    }

    .eg-wrapper img {
      width: 100%;
    }

    .eg-preview {
      margin-bottom: 15px;
    }

    .preview {
      float: left;
      margin-right: 15px;
      margin-bottom: 15px;
      overflow: hidden;
      background: #f7f7f7;
    }

    .preview-lg {
      width: 290px;
      height: 160px;
    }

    .preview-md {
      width: 145px;
      height: 90px;
    }

    .preview-sm {
      width: 72.5px;
      height: 45px;
    }

    .preview-xs {
      width: 36.25px;
      height: 22.5px;
    }

    .eg-data {
      padding-right: 15px;
    }

    .eg-data .input-group {
      width: 100%;
      margin-bottom: 15px;
    }

    .eg-data .input-group-addon {
      min-width: 65px;
    }

    .eg-button {
      margin-bottom: 15px;
    }

    .eg-button > .btn {
      margin-right: 15px;
    }

    .eg-input .input-group {
      margin-bottom: 15px;
    }

    .eg-input .input-group .btn {
      width: 140px;
    }
  </style>
</head>

<body id="<?php echo $id; ?>">
<input id="base_value" type="hidden" value="<?php echo base_url(); ?>">

