<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from thevectorlab.net/flatlab/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:47:32 GMT -->
<head>
 <!--  <div id="load" ></div> -->

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Mosaddek">
  <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <link rel="shortcut icon" href="img/favicon.html">

  <title>SWAB</title>

  <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css/bootstrap-reset.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/data-tables/DT_bootstrap.css" />
  <!--external css-->
  <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/owl.carousel.css" type="text/css">
  <!--toastr-->
  <link href="<?php echo base_url(); ?>assets/toastr-master/toastr.css" rel="stylesheet" type="text/css" />
  <!--right slidebar-->
  <link href="<?php echo base_url(); ?>css/slidebars.css" rel="stylesheet">

  <!-- Custom styles for this template -->

  <link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>css/style-responsive.css" rel="stylesheet" />
  <!--dynamic table-->
  <link href="<?php echo base_url(); ?>assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
  <link href="<?php echo base_url(); ?>assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/data-tables/DT_bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap-datetimepicker/css/datetimepicker.css" />
  <script src="https://checkout.stripe.com/checkout.js"></script>
  <link href="<?php echo base_url(); ?>css/table-responsive.css" rel="stylesheet" />
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    
    <!-- sweetalerts -->
    <link href="<?php echo base_url(); ?>sweetalerts/assets/docs.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>sweetalerts/dist/sweetalert.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>sweetalerts/dist/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/jquery.steps.css" />
    <!--  summernote -->
    <link href="<?php echo base_url(); ?>assets/summernote/dist/summernote.css" rel="stylesheet">
    <style>
    #load{
      width:100%;
      height:100%;
      position:fixed;
      z-index:9999;
      background:url("<?php echo base_url();?>/img/loader.gif") no-repeat center center white;
    }

    .dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus {
      background-color: #b3b3b3;
      color: #FFFFFF;
      text-decoration: none;
    }

    .label {
      padding: 0.5em 0.8em;
      font-size: 12px;
    }
  </style>

</head>

<body>


  <section id="container" class="" >
    <!--header start-->
    <header class="header white-bg">
      <div class="sidebar-toggle-box">
        <div data-original-title="Toggle Navigation" data-placement="right" class="fa fa-bars tooltips"></div>
      </div>
      <!--logo start-->
      <a href="<?php echo base_url("Home");?>" class="logo" > <span>سوشل ورکرز ایسوسی ایشن بھیلووال</span> </a>
      <!--logo end-->
      
      <div class="top-nav ">
        <ul class="nav pull-right top-menu">
                  <!--<li>
                      <input type="text" class="form-control search" placeholder="Search">
                    </li>-->
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="img/avatar1_small.jpg">
                        <span class="username"><?php echo  $this->session->user_data[0]['name'];?></span>
                        <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu extended logout">
                        <div class="log-arrow-up"></div>
                        <li style="width: 100%;"><a href="<?php echo base_url("Login/logout"); ?>"><i class=" fa fa-sign-out"></i>لاگ آوٹ</a></li>                         
                        
                      </ul>
                    </li>

                    
                  </ul>
                </div>
              </header>
              <!--header end-->
              <!--sidebar start-->
              <aside>
                <div id="sidebar"  class="nav-collapse ">
                  <!-- sidebar menu start-->
                  <ul class="sidebar-menu" id="nav-accordion">
                    <li>
                      <a href="<?php echo base_url('Home');?>">
                        <i class="fa fa-dashboard"></i>
                        <span>ڈ یش بورڈ</span>
                      </a>
                    </li>
                    
                    
                    
                    <li class="sub-menu">
                      <a >
                        <i class="fa fa-users"></i>
                        <span>ممبرشپ</span>
                      </a>
                      <ul class="sub">
                        <li><a  href="<?php echo base_url();?>Members/members_listing">ممبروں کی فہرست</a></li>
                        <li><a  href="<?php echo base_url();?>Members/new_member">نئے ممبران</a></li>
                        
                      </ul>
                    </li>
                    <li class="sub-menu">
                      <a >
                        <i class="fa fa-hand-o-right"></i>
                        <span>عطیات</span>
                      </a>
                      <ul class="sub">
                        <li><a  href="<?php echo base_url();?>Donations/donations_listing"> فہرست عطیات</a></li>
                        <li><a  href="<?php echo base_url();?>Donations/new_donation">نیا عطیہ</a></li>
                        
                      </ul>
                    </li>
                    <li class="sub-menu">
                      <a >
                        <i class="fa fa-ambulance"></i>
                        <span>ایمبولینس</span>
                      </a>
                      <ul class="sub">
                        <li><a  href="<?php echo base_url();?>Ambulance/ambulance_trips_listing">فہرست ٹرپ </a></li>
                        <li><a  href="<?php echo base_url();?>Ambulance/ambulance_expenditures_listing">تمام اخراجات</a></li>

                        <li><a  href="<?php echo base_url();?>Ambulance/new_trip">نیا ٹرپ </a></li> 
                        <li><a  href="<?php echo base_url();?>Ambulance/new_expenditure">نیا خرچ</a></li>
                      </ul>
                    </li>
                    <li class="sub-menu">
                      <a >
                        <i class="fa  fa-gift"></i>
                        <span>تقسیم</span>
                      </a>
                      <ul class="sub">
                        <li><a  href="<?php echo base_url();?>Distributions/distribution_listing">فہرست تقسیم</a></li>
                        <li><a  href="<?php echo base_url();?>Distributions/new_distribution">نئی تقسیم</a></li>
                        
                      </ul>
                    </li>
                    <li>
                      <a href="<?php echo base_url("Login/logout");?>">
                        <i class="fa fa-sign-out"></i>
                        <span>لاگ آوٹ</span>
                      </a>
                    </li>
                  <!--<li class="sub-menu">
                      <a href="javascript:;">
                          <i class="fa fa-laptop"></i>
                          <span>Layouts</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="boxed_page.html">Boxed Page</a></li>
                          <li><a  href="horizontal_menu.html">Horizontal Menu</a></li>
                          <li><a  href="header-color.html">Different Color Top bar</a></li>
                          <li><a  href="mega_menu.html">Mega Menu</a></li>
                          <li><a  href="language_switch_bar.html">Language Switch Bar</a></li>
                          <li><a  href="email_template.html" target="_blank">Email Template</a></li>
                      </ul>
                    </li>-->


                  </ul>
                  <!-- sidebar menu end-->
                </div>
              </aside>
              <!--sidebar end-->
              <script src="<?php echo base_url(); ?>js/jquery.js"></script>
              <script type="text/javascript">
                
                document.onreadystatechange = function () {
                  var state = document.readyState
                  if (state == 'complete') {
                    setTimeout(function(){
                      document.getElementById('interactive');
                      document.getElementById('load').style.visibility="hidden";
                    },1000);
                  }
                }

                
              </script>