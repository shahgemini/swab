<!--main content start-->
<section id="main-content">
	<section class="wrapper site-min-height">
		<div class="row">
			<div class="col-lg-12">
			  	<!--breadcrumbs start -->
			  	<ul class="breadcrumb">
				  	<li><a href="<?php echo base_url('Home'); ?>"><i class="fa fa-home" ></i> ڈ یش بورڈ</a></li>
				  	<li><a href="<?php echo base_url('Distributions/distributions_listing');?>">فہرست تقسیم عطیات</a></li>
				  	<?php
				  	$title = "";
				  	 if(isset($distribution)){
				  	 $title = "ترمیم تقسیم"; 
				  		?>
				  		 <li><a href="<?php echo base_url()?>Distributions/edit_distribution/<?php echo $distribution['distribution_id']; ?>" class="active"> <?php echo $title; ?> </a></li>
				  	<?php
				 	 }else{ 
				 	 	$title =" نئ تقسیم";
				 	 	?>
				 	 	 <li><a href="<?php echo base_url('Distributions/new_distribution')?>" class="active"> <?php echo $title; ?>  </a></li>

				  	<?php } ?>
				 			  
			  	</ul>
			 	<!--breadcrumbs end -->
		 	 </div>
		</div>
		
								  
		<div class="row">
			<div class="col-sm-12">
				<form class="form-horizontal validate-form " <?php if(isset($distribution)){?> action="<?php echo base_url(); ?>Distributions/update_distribution"  <?php }else{ ?> action="<?php echo base_url(); ?>Distributions/add_new_distribution" <?php } ?>  method="POST"  role="form">
				<section class="panel ">
					<div class="panel-heading"> تفصیل تقسیم عطیات</div>
						<div class="panel-body ">
							

                            <div class="form-group">
                                <label class="col-lg-2 control-label " for="distribution_date">تاریخ تقسیم عطیات</label>
                                <div class="col-lg-3">
                                   <?php  $today= date('Y-m-d'); ?>
                                    <input type="date" value="<?php if(isset($distribution)){ echo $distribution['distribution_date']; }else{ echo $today; }?>" id="distribution_date" name="distribution_date" class="date-picker form-control"  size="16">
                                        
                                </div>
                            </div>

						  	
                             <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="distribution_details">تفصیل تقسیم عطیات*</label>
                                <div class="col-lg-4">
                                    <input id="name" name="distribution_details" type="text" value="<?php if(isset($distribution)){ echo $distribution['distribution_details']; } ?>"  class="required  form-control">
                                </div>
                             </div>
							

                             <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="total_distribution_amount">کل رقم تقسیم *</label>
                                <div class="col-lg-4">
                                    <input id="total_distribution_amount"  name="total_distribution_amount" type="number" min="0" value="<?php if(isset($distribution)){ echo $distribution['total_distribution_amount']; } ?>"  class="required  form-control">
                                </div>
                             </div>

                            <div class="form-group">
                                <div class=" col-lg-10">

                                    <?php if(isset($distribution)){ ?>

                                        <input type="hidden" name="update_id" value="<?php echo $distribution['distribution_id'] ?>">

                                    <?php } ?>
                                    <button type="submit"   class=" btn btn-shadow btn-success">اپ ڈیٹ</button>
                                      
                                </div>
                            </div>
		  
						</div>
					</section> 
                   
				</form>
			</div>
		</div>
	</section>
</section>


<script type="text/javascript">
    
</script>