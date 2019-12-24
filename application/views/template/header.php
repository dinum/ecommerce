<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Part Time Jobs</title>
        <link rel="icon" href="<?php echo base_url(); ?>assets/image/symbole.png" sizes="192x192" />

        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/linearicons.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/magnific-popup.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/nice-select.css">					
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animate.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/owl.carousel.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css"> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />

    </head>

    <body>

        <!-- Navigation -->
        <header id="header" id="home" class="back-black">
            <div class="container">
                <div class="row align-items-center justify-content-between d-flex">
                    <div id="logo">
                        <a href="index.html"><img src="<?php echo base_url(); ?>assets/img/logo.png" alt="" title="" /></a>
                    </div>
                    <nav id="nav-menu-container">
                        <ul class="nav-menu">
                            <li class="menu-active"><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li><a href="<?php echo base_url(); ?>about-us">About Us</a></li>
                            <li><a href="<?php echo base_url(); ?>contact">Contact</a></li>                            
                            <?php if ($this->session->userdata('user_logged')) { ?>
                                <?php if (array_search('view_staff', $permissions) || array_search('staff_requests', $permissions)) { ?>
                                <li class="menu-has-children"><a href="">Staff</a>
                                    <ul>
                                        <?php if (array_search('staff_requests', $permissions)) { ?>
                                        <li><a href="<?php echo base_url(); ?>staff/requests">Requests</a></li>
                                        <?php } ?>
                                        <?php if (array_search('view_staff', $permissions)) { ?>
                                        <li><a href="<?php echo base_url(); ?>staff">View All</a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <?php } ?>
                                <?php if(array_search('vacancies_requests', $this->permissions)||array_search('view_vacancy', $this->permissions)||array_search('add_vacancy', $this->permissions)){ ?>
                                <li class="menu-has-children"><a href="">Vacancies</a>
                                    <ul>
                                        <?php if (array_search('add_vacancy', $permissions)) { ?>
                                        <li><a href="<?php echo base_url(); ?>vacancies/add">Add</a></li>
                                        <?php } ?>
                                        <?php if (array_search('vacancies_requests', $permissions)) { ?>
                                        <li><a href="<?php echo base_url(); ?>vacancies/requests">Requests</a></li>
                                        <?php } ?>
                                        <?php if (array_search('view_vacancy', $permissions)) { ?>
                                        <li><a href="<?php echo base_url(); ?>vacancies">View All</a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <?php } ?>
                                <?php if (array_search('view_users', $permissions) || array_search('add_user', $permissions)||array_search('add_user_role', $permissions) || array_search('view_user_roles', $permissions)||array_search('add_permissions', $permissions) || array_search('view_permissions', $permissions)) { ?>
                                <li class="menu-has-children"><a href="">Settings</a>
                                    <ul>
                                        <?php if (array_search('view_users', $permissions) || array_search('add_user', $permissions)) { ?>
                                            <li ><a href="<?php echo base_url(); ?>users"><span><i class="fa fa-user"></i>&nbsp;&nbsp;Users</span></a></li>
                                        <?php } ?>
                                        <?php if (array_search('add_user_role', $permissions) || array_search('view_user_roles', $permissions)) { ?>
                                            <li ><a href="<?php echo base_url(); ?>roles"><span><i class="fa fa-level-up"></i>&nbsp;&nbsp;Roles</span></a></li>
                                        <?php } ?>
                                        <?php if (array_search('add_permissions', $permissions) || array_search('view_permissions', $permissions)) { ?>
                                            <li ><a href="<?php echo base_url(); ?>permissions"><span><i class="fa fa-lock"></i>&nbsp;&nbsp;Permissions</span></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <?php } ?>
                                <li class="menu-has-children"><a href="">Hi , <?php echo $this->session->userdata('user_name'); ?></a>
                                    <ul>
                                        <li><a href="<?php echo base_url(); ?>home/account">Account</a></li>
                                        <li><a href="<?php echo base_url(); ?>logout">Logout</a></li>
                                    </ul>
                                </li>
                                
                            <?php } else { ?>
                                <li><a class="ticker-btn" href="<?php echo base_url(); ?>signup">Signup</a></li>
                                <li><a class="ticker-btn" href="<?php echo base_url(); ?>login">Login</a></li>
                                <?php } ?>

                        </ul>
                    </nav><!-- #nav-menu-container -->		    		
                </div>
            </div>
        </header>        
        