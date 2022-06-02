<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Aplikasi Nota Gudang</title>
	<!-- DataTablees -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/DataTables/datatables.min.css"/>
	<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css" type="text/css" >
    <link rel="stylesheet" href="<?php echo base_url();?>assets/fontawesome-free/css/all.min.css">
    
    <script src="<?php echo base_url();?>assets/js/jquery-3.3.1.js"></script>
   <!-- 
   	<script type='text/javascript' src='<?php echo base_url();?>assets/js/jquery-2.1.4.min.js'></script> -->
    <script type='text/javascript' src='<?php echo base_url();?>assets/js/autocomplete/jquery.autocomplete.js'></script>
    <!-- Memanggil file .css untuk style saat data dicari dalam filed -->
    <link href='<?php echo base_url();?>assets/js/autocomplete/jquery.autocomplete.css' rel='stylesheet' />
</head>
<body>	

		<nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
		 
		  <!-- Brand -->
		  <a class="navbar-brand mb-0 h1" href="<?php echo site_url('home/gudang');?>">
		  	<img src="<?php echo base_url();?>assets/images/logo.png" height="33" class="d-inline-block align-top" alt="">
		  </a>
		  <div class="col-md-9">
		  <!-- Links -->
		  <ul class="navbar-nav">
		    <!-- Dropdown master-->
		    <li class="nav-item dropdown">
		      	<a class="nav-link text-light" href="<?php echo site_url('nota/dashboard');?>" id="navbardrop" data-toggle="dropdown">
		        Master </a>
		      	<div class="dropdown-menu">
		        <a class="dropdown-item" href="<?php echo site_url('gudang/nota/view_nota');?>">Input Nota</a>
<!-- 		  	    <?php if($this->session->userdata('hak_akses') == "Super Admin"){ ?>
          		<div class="dropdown dropdown-submenu">
          			<a class="dropdown-item" href="#">Restore Data</a>
					<ul class="dropdown-menu" style="margin: -20% 0% 0% 100%;">
						<li><a class="dropdown-item" href="<?php echo site_url('gudang/nota/view_res_nota');?>">Restore Nota</a></li>
						<li><a class="dropdown-item" href="<?php echo site_url('gudang/nota/view_res_dtlnota');?>">Restore Detail Nota</a></li>
					</ul>
				</div>
            	<?php } ?> -->
		      	</div>
		    </li>
		    <li class="nav-item dropdown">
		   	 	<?php if($this->session->userdata('hak_akses') == "Super Admin"){ ?>
		      	<a class="nav-link text-light" href="<?php echo site_url('nota/dashboard');?>" id="navbardrop" data-toggle="dropdown">
		        Maintenance </a>
		  		<div class="dropdown-menu">
		        	<a class="dropdown-item" href="<?php echo site_url('gudang/user/view_user')?>">User</a>
          		<div class="dropdown dropdown-submenu">
          			<a class="dropdown-item" href="#">Restore Data</a>
					<ul class="dropdown-menu" style="margin: -20% 0% 0% 100%;">
						<li><a class="dropdown-item" href="<?php echo site_url('gudang/nota/view_res_nota');?>">Restore Nota</a></li>
						<li><a class="dropdown-item" href="<?php echo site_url('gudang/nota/view_res_dtlnota');?>">Restore Detail Nota</a></li>
					</ul>
				</div>
				</div>
        		<?php } ?>
    		</li>
		    <!-- Dropdown master End -->


		    <!-- Dropdown maintenance-->
<!-- 		    <li class="nav-item dropdown">
		      <a class="nav-link text-light" href="#" id="navbardrop" data-toggle="dropdown">
		        Maintenance
		      </a>
		      <div class="dropdown-menu">
		        <a class="dropdown-item" href="#"></a>
		      </div>
		    </li> -->
		    <!-- Dropdown maintenance End -->	

		  </ul>
		  </div>

		  <div class="row justify-content-end">
			  <div class="col-md-3">
				  <!-- Links -->
				  <ul class="navbar-nav">
				    <li class="nav-item dropdown">
				      <a class="nav-link text-light" href="<?php echo site_url('nota/dashboard');?>" id="navbardrop" data-toggle="dropdown">
				        <?php echo $this->session->userdata('user_name');?> 
				      </a>
				      <div class="dropdown-menu">
				        <a class="dropdown-item" href="<?php echo site_url('login/logout');?>">Logout</a>
				      </div>
				    </li>
				  </ul>
			  </div>
		  </div>
		</nav>
		
		<?php $content ?>

	<!-- Optional JavaScript -->
    
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js" ></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/DataTables/datatables.min.js"></script>

    <script type="text/javascript">
      $(document).ready(function() {
          var table = $('#myTable').DataTable({
          	"deferRender": true,
            "processing": true,
            "order" : [],
          });
      });
    </script>
</body>
</html>