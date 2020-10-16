<!--main content start-->
<section id="main-content">
	<section class="wrapper site-min-height">
		<div class="row">
			<div class="col-lg-12">
			  <!--breadcrumbs start -->
			  <ul class="breadcrumb">
				  <li><a href="<?php echo base_url('Home'); ?>"><i class="fa fa-home" class="active"></i> ڈ یش بورڈ</a></li>
				  
			  </ul>
			  <!--breadcrumbs end -->
		  </div>
		</div>
	  <!-- page start-->
		 <!--state overview start-->
	  <div class="row state-overview">
		  <div class="col-lg-3 col-sm-6">
			  <section class="panel">
				  <div class="symbol terques">
					  <i class="fa fa-users"></i>
				  </div>
				  <div class="value">
					  <h1 >
						  <?php echo $summary['total_members']; ?>
					  </h1>
					  <p>کل ممبران</p>
				  </div>
			  </section>
		  </div>
		  <div class="col-lg-3 col-sm-6">
			  <section class="panel">
				  <div class="symbol red">
					  <i class="fa fa-dollar"></i>
				  </div>
				  <div class="value">
					  <h1 class=" ">
						  <?php echo number_format($summary['total_donations']); ?>
					  </h1>
					  <p>کل عطیات</p>
				  </div>
			  </section>
		  </div>
		  <div class="col-lg-3 col-sm-6">
			  <section class="panel">
				  <div class="symbol yellow">
					  <i class="fa fa-dollar"></i>
				  </div>
				  <div class="value">
					  <h1 class=" ">
						 <?php echo number_format($summary['total_distributions']); ?>
					  </h1>
					  <p>کل تقسیم</p>
				  </div>
			  </section>
		  </div>
		  <div class="col-lg-3 col-sm-6">
			  <section class="panel">
				  <div class="symbol blue">
					  <i class="fa fa-ambulance"></i>
				  </div>
				  <div class="value">
					  <h1 class="">
						  <?php echo number_format($summary['total_amount_recieved']); ?>
					  </h1>
					  <p>کل موصول ہوا</p>
				  </div>
			  </section>
		  </div>
		  <div class="col-lg-3 col-sm-6">
			  <section class="panel">
				  <div class="symbol " style="background: #b24ec3">
					  <i class="fa fa-ambulance"></i>
				  </div>
				  <div class="value">
					  <h1 class="">
						  <?php echo number_format($summary['total_ambulance_expenditure']); ?>
					  </h1>
					  <p>کل اخراجات</p>
				  </div>
			  </section>
		  </div>
		  <div class="col-lg-3 col-sm-6">
			  <section class="panel">
				  <div class="symbol " style="    background: #b59359;">
					  <i class="fa fa-ambulance"></i>
				  </div>
				  <div class="value">
					  <h1 class="">
						  <?php echo number_format($summary['total_drivers_salary']); ?>
					  </h1>
					  <p>کل تنخواہ</p>
				  </div>
			  </section>
		  </div>
		  <div class="col-lg-3 col-sm-6">
			  <section class="panel">
				  <div class="symbol " style="background: #719a72">
					  <i class="fa fa-ambulance"></i>
				  </div>
				  <div class="value">
					  <h1 class="">
						  <?php echo number_format($summary['total_ambulance_income']); ?>
					  </h1>
					  <p>ایمبولینس کی کل آمدنی</p>
				  </div>
			  </section>
		  </div>
	  </div>
	  <!--state overview end-->

<!-- 	  <div class="row">
		  <div class="col-lg-12">
			  <!--custom chart start-->
			 <!--  <div class="border-head">
				  <h3>Jobs Monthly Overview</h3>
			  </div>
			  <div class="custom-bar-chart">
				 
				  <div class="bar">
					  <div class="title">JAN</div>
					  <div class="value tooltips" data-original-title="80" data-toggle="tooltip" data-placement="top">80</div>
				  </div>
				  <div class="bar ">
					  <div class="title">FEB</div>
					  <div class="value tooltips" data-original-title="50" data-toggle="tooltip" data-placement="top">50</div>
				  </div>
				  <div class="bar ">
					  <div class="title">MAR</div>
					  <div class="value tooltips" data-original-title="40" data-toggle="tooltip" data-placement="top">40</div>
				  </div>
				  <div class="bar ">
					  <div class="title">APR</div>
					  <div class="value tooltips" data-original-title="55" data-toggle="tooltip" data-placement="top">55</div>
				  </div>
				  <div class="bar">
					  <div class="title">MAY</div>
					  <div class="value tooltips" data-original-title="20" data-toggle="tooltip" data-placement="top">20</div>
				  </div>
				  <div class="bar ">
					  <div class="title">JUN</div>
					  <div class="value tooltips" data-original-title="39" data-toggle="tooltip" data-placement="top">39</div>
				  </div>
				  <div class="bar">
					  <div class="title">JUL</div>
					  <div class="value tooltips" data-original-title="75" data-toggle="tooltip" data-placement="top">75</div>
				  </div>
				  <div class="bar ">
					  <div class="title">AUG</div>
					  <div class="value tooltips" data-original-title="45" data-toggle="tooltip" data-placement="top">45</div>
				  </div>
				  <div class="bar ">
					  <div class="title">SEP</div>
					  <div class="value tooltips" data-original-title="50" data-toggle="tooltip" data-placement="top">50</div>
				  </div>
				  <div class="bar ">
					  <div class="title">OCT</div>
					  <div class="value tooltips" data-original-title="42" data-toggle="tooltip" data-placement="top">42</div>
				  </div>
				  <div class="bar ">
					  <div class="title">NOV</div>
					  <div class="value tooltips" data-original-title="60" data-toggle="tooltip" data-placement="top">60</div>
				  </div>
				  <div class="bar ">
					  <div class="title">DEC</div>
					  <div class="value tooltips" data-original-title="90" data-toggle="tooltip" data-placement="top">90</div>
				  </div>
			  </div> -->
			  <!--custom chart end
		  </div>
		  
	  </div>
	  <!-- page end--> 
	</section>
</section>
<!--main content end-->

    