<!--main content start-->
<section id="main-content">
	<section class="wrapper site-min-height">
		<div class="row">
			<div class="col-lg-12">
			  	<!--breadcrumbs start -->
			  	<ul class="breadcrumb">
				  	<li><a href="<?php echo base_url('Home'); ?>"><i class="fa fa-home" ></i> ڈ یش بورڈ</a></li>
				  	<li><a href="<?php echo base_url('Ambulance/ambulance_trips_listing');?>">تمام ایمبولینس اخراجات</a></li>
				  	<?php
				  	$title = "";
				  	 if(isset($expenditure)){
				  	 $title = "ترمیم"; 
				  		?>
				  		 <li><a href="<?php echo base_url()?>Ambulance/edit_expenditure/<?php echo $expenditure['expenditure_id']; ?>" class="active"> <?php echo $title; ?> </a></li>
				  	<?php
				 	 }else{ 
				 	 	$title ="نیا خرچ";
				 	 	?>
				 	 	 <li><a href="<?php echo base_url('Ambulance/new_expenditure')?>" class="active"> <?php echo $title; ?>  </a></li>

				  	<?php } ?>
				 			  
			  	</ul>
			 	<!--breadcrumbs end -->
		 	 </div>
		</div>
		
								  
		<div class="row">
			<div class="col-sm-12">
				<form class="form-horizontal validate-form " <?php if(isset($expenditure)){?> action="<?php echo base_url(); ?>Ambulance/update_expenditure"  <?php }else{ ?> action="<?php echo base_url(); ?>Ambulance/add_new_expenditure" <?php } ?>  method="POST"  role="form">
				<section class="panel ">
					<div class="panel-heading"> ایمبولینس اخراجات کی تفصیلات</div>
						<div class="panel-body ">
							

                            <div class="form-group">
                                <label class="col-lg-2 control-label " for="expenditure_date">اخراجات کی تاریخ</label>
                                <div class="col-lg-3">
                                   <?php  $today= date('Y-m-d'); ?>
                                    <input type="date" value="<?php if(isset($expenditure)){ echo $expenditure['expenditure_date']; }else{ echo $today; }?>" id="expenditure_date" name="expenditure_date" class="date-picker form-control"  size="16">
                                        
                                </div>
                            </div>

						  	
                             <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="expenditure_details">اخراجات کی تفصیلات*</label>
                                <div class="col-lg-4">
                                    <input id="name" name="expenditure_details" type="text" value="<?php if(isset($expenditure)){ echo $expenditure['expenditure_details']; } ?>"  class="required  form-control">
                                </div>
                             </div>
							
							<div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="expenditure">صورتحال</label>
                                <div class="col-lg-5">
                                    <input id="expenditure" name="situation" type="text" value="<?php if(isset($expenditure)){ echo $expenditure['situation']; } ?>"  class="required  form-control">
                                </div>
                             </div>

                             <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="amount">رقم *</label>
                                <div class="col-lg-4">
                                    <input id="amount"  name="amount" type="number" min="0" value="<?php if(isset($expenditure)){ echo $expenditure['amount']; } ?>"  class="required  form-control">
                                </div>
                             </div>

                            <div class="form-group">
                                <div class=" col-lg-10">

                                    <?php if(isset($expenditure)){ ?>

                                        <input type="hidden" name="update_id" value="<?php echo $expenditure['expenditure_id'] ?>">

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