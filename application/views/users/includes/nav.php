<nav class="navbar navbar-default" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url("images/logo.png") ?>"</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url('about-us') ?>">About Us</a></li>
        <li><a href="<?php echo base_url('faqs') ?>">FAQ's</a></li>
        <li><a href="<?php echo base_url('contact-us') ?>">Contact Us</a></li>
        <form class="navbar-form navbar-left" role="search" method="post" action="<?php echo base_url("search-content") ?>">
          <div class="form-group">
            <input type="text" class="form-control form-search" placeholder="Search category.." name="search_content">
          </div>
          
        </form>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php echo $this->session->flashdata('msg'); ?>