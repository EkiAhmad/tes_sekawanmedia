<!DOCTYPE html>
<html>
<head>
    <title>Items</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery.dataTables.css'?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/dataTables.bootstrap4.css'?>">
	<style type="text/css">
		body {
		  font-size: .875rem;
		}

		.feather {
		  width: 16px;
		  height: 16px;
		  vertical-align: text-bottom;
		}

		/*
		 * Sidebar
		 */

		.sidebar {
		  position: fixed;
		  top: 0;
		  bottom: 0;
		  left: 0;
		  z-index: 100; /* Behind the navbar */
		  padding: 0;
		  box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
		}

		.sidebar-sticky {
		  position: -webkit-sticky;
		  position: sticky;
		  top: 56px; /* Height of navbar */
		  height: calc(100vh - 75px);
		  padding-top: .5rem;
		  overflow-x: hidden;
		  overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
		}

		.sidebar .nav-link {
		  font-weight: 500;
		  color: #333;
		}

		.sidebar .nav-link .feather {
		  margin-right: 4px;
		  color: #999;
		}

		.sidebar .nav-link.active {
		  color: #007bff;
		}

		.sidebar .nav-link:hover .feather,
		.sidebar .nav-link.active .feather {
		  color: inherit;
		}

		.sidebar-heading {
		  font-size: .75rem;
		  text-transform: uppercase;
		}

		/*
		 * Navbar
		 */

		.navbar-brand {
		  padding-top: .75rem;
		  padding-bottom: .75rem;
		  font-size: 1rem;
		}

		.navbar .form-control {
		  padding: .75rem 1rem;
		  border-width: 0;
		  border-radius: 0;
		}

		.form-control-dark {
		  color: #fff;
		  background-color: rgba(255, 255, 255, .1);
		  border-color: rgba(255, 255, 255, .1);
		}

		.form-control-dark:focus {
		  border-color: transparent;
		  box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
		}

		/*
		 * Utilities
		 */

		.border-top { border-top: 1px solid #e5e5e5; }
		.border-bottom { border-bottom: 1px solid #e5e5e5; }
	</style>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">CMS</a>
            </li>
        </ul>
    </div>
    <div class="mx-auto order-0">
        <!-- <a class="navbar-brand mx-auto" href="#">Navbar 2</a> -->
        <?php if($this->session->userdata('role') == 0): ?>
			<span class="navbar-brand mx-auto">Admin</span>
		<?php elseif($this->session->userdata('role') == 1): ?>
			<span class="navbar-brand mx-auto">Approval</span>
		<?php elseif($this->session->userdata('role') == 2): ?>
			<span class="navbar-brand mx-auto">User</span>
		<?php endif ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
		      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
		        <?php echo $this->session->userdata('name'); ?>
		      </a>
		      <div class="dropdown-menu dropdown-menu-right">
		        <a class="dropdown-item" href="<?php echo base_url(); ?>editprofilecontroller">Edit Profile</a>
		        <a class="dropdown-item" href="<?php echo base_url(); ?>logincontroller/logout">Logout</a>
		      </div>
			</li>
        </ul>
    </div>
</nav>
<div class="row">
<nav class="col-md-2 d-none d-md-block bg-light sidebar">
	<div class="sidebar-sticky">
		<ul class="nav flex-column">
			<?php if($this->session->userdata('role') != 2): ?>
			<li class="nav-item">
				<a class="nav-link <?php if($this->uri->segment(1)=="homecontroller"){echo 'active';}?>" href="<?php echo base_url(); ?>homecontroller">
					<span data-feather="home"></span>
					Dashboard <span class="sr-only">(current)</span>
				</a>
			</li>
			<?php endif ?>
			<li class="nav-item">
				<a class="nav-link <?php if($this->uri->segment(1)=="ordercontroller"){echo 'active';}?>" href="<?php echo base_url(); ?>ordercontroller">
					<span data-feather="file"></span>
					Orders
				</a>
			</li>
			<?php if($this->session->userdata('role') == 0): ?>
			<li class="nav-item">
				<a class="nav-link <?php if($this->uri->segment(1)=="productcontroller"){echo 'active';}?>" href="<?php echo base_url(); ?>productcontroller">
					<span data-feather="shopping-cart"></span>
					Products
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link <?php if($this->uri->segment(1)=="customercontroller"){echo 'active';}?>" href="<?php echo base_url(); ?>customercontroller">
					<span data-feather="users"></span>
					Customers
				</a>
			</li>
			<?php endif ?>
		</ul>

	<!-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
		<span>Saved reports</span>
		<a class="d-flex align-items-center text-muted" href="#">
		<span data-feather="plus-circle"></span>
		</a>
	</h6> -->
	<!-- <ul class="nav flex-column mb-2">
		<li class="nav-item">
			<a class="nav-link" href="#">
			<span data-feather="file-text"></span>
			Current month
			</a>
		</li>
	</ul> -->
	</div>
</nav>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          
    <!-- </main>
	</div> -->

	<!-- <nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">WebSiteName</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="<?php echo base_url() ?>">Home</a></li>
				<li <?php if($this->uri->segment(1)=="bioskop"){echo 'class="active"';}?>><a href="<?php echo base_url('bioskop') ?>">Bioskop</a></li>
				<li <?php if($this->uri->segment(1)=="film"){echo 'class="active"';}?>><a href="<?php echo base_url('film') ?>">Film</a></li>
				<li <?php if($this->uri->segment(1)=="tayang"){echo 'class="active"';}?>><a href="<?php echo base_url('tayang') ?>">Tayang</a></li>
			</ul>
		</div>
	</nav> -->
<!-- </div> -->