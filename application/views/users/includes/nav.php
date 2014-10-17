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
     
     <ul class="nav navbar-nav navbar-left">
        <li class="dropdow">
          <a href="#" class="dropdown-toggl" data-toggle="dropdow"></a>
          <ul class="dropdown-menu" role="menu">
                      
          </ul>
        </li>
       
        <form class="navbar-form navbar-left" role="search" method="post" action="<?php echo base_url("search-content") ?>">
          <div class="form-group">
            <input type="text" id="search" class="form-control form-search" placeholder="Search category.." name="search_content">
            <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
          </div>
          <button type="submit" class="btn btn-default serch">Search</button>
        </form>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container links">
    <ul class="go-quickly">
      <li>Go Quickly To<span class="glyphicon gly glyphicon-forward"></span></li>
      <?php $categories = $this->db->get('categories')->result(); ?>
      <?php foreach($categories as $cat): ?>
        <?php $pack = $this->db->where('ad_id', $cat->id)->get('package')->num_rows(); ?>
        <li><?php echo anchor('categories/'.$cat->id, $cat->name.'('.$pack.')'); ?></li>
      <?php endforeach; ?>
    </ul>
</div>
<?php echo $this->session->flashdata('msg'); ?>

<div id="search_results">