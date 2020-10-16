<!--main content start-->
<section id="main-content">
	<section class="wrapper site-min-height">
		<div class="row">
			<div class="col-lg-12">
			  	<!--breadcrumbs start -->
			  	<ul class="breadcrumb">
				  	<li><a href="<?php echo base_url('Home'); ?>"><i class="fa fa-home" ></i>   ڈ یش بورڈ</a></li>
				  	<li><a href="<?php echo base_url('Ambulance/ambulance_trips_listing');?>">ٹرپ فہرست</a></li>
				  	<?php
				  	$title = "";
				  	 if(isset($member)){
				  	 $title = "Edit Trip"; 
				  		?>
				  		 <li><a href="<?php echo base_url()?>Ambulance/edit/<?php echo $ambulance_trip['trip_id']; ?>" class="active"> ترمیم </a></li>
				  	<?php
				 	 }else{ 
				 	 	$title ="Add New Trip";
				 	 	?>
				 	 	 <li><a href="<?php echo base_url('Ambulance/new_trip')?>" class="active"> نیا ٹرپ </a></li>

				  	<?php } ?>
				 			  
			  	</ul>
			 	<!--breadcrumbs end -->
		 	 </div>
		</div>
		
								  
		<div class="row">
			<div class="col-sm-12">
				<form class="form-horizontal validate-form " <?php if(isset($ambulance_trip)){?> action="<?php echo base_url(); ?>Ambulance/update_trip"  <?php }else{ ?> action="<?php echo base_url(); ?>Ambulance/add_new_trip" <?php } ?>  method="POST"  role="form">
				<section class="panel ">
					<div class="panel-heading"> ایمبولینس ٹرپ تفصیلات</div>
						<div class="panel-body ">
							

                            <div class="form-group">
                                <label class="col-lg-2 control-label " for="trip_date">ٹرپ تاریخ</label>
                                <div class="col-lg-3">
                                   <?php  $today= date('Y-m-d'); ?>
                                    <input type="date" value="<?php if(isset($ambulance_trip)){ echo $ambulance_trip['trip_date']; }else{ echo $today; }?>" id="trip_date" name="trip_date" class="date-picker form-control"  size="16">
                                        
                                </div>
                            </div>

						  	<div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="trip_reason">ٹرپ بوجہ*</label>
                                <div class="col-lg-4">
                                    <select id="trip_reason" name="trip_reason"    class="required  form-control">
                                        <option>ٹرپ بوجہ</option>
                                    <?php foreach($reasons as $reason){ 
                                        $selected= "";
                                        if(isset($ambulance_trip)){
                                            if($ambulance_trip['trip_reason'] == $reason){
                                                $selected = 'selected';
                                            } } 
                                        if($reason )
                                        ?>
                                        <option value="<?php echo $reason;?>" <?php echo $selected; ?>><?php echo $reason; ?></option>
                                    <?php } ?>
                                    </select>
                                    
                                </div>
                             </div>

                             <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="destination">ایمبولینس کہاں گی*</label>
                                <div class="col-lg-4">
                                    <input id="name" name="destination" type="text" value="<?php if(isset($ambulance_trip)){ echo $ambulance_trip['destination']; } ?>"  class="required  form-control">
                                </div>
                             </div>

                             <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="distance_km">فاصلہ کلومیٹر*</label>
                                <div class="col-lg-4">
                                    <input id="distance_km" name="distance_km" type="number" min='0' value="<?php if(isset($ambulance_trip)){ echo $ambulance_trip['distance_km']; } ?>"  class="required  form-control">
                                </div>
                             </div>
							
							<div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="cnic">صورتحال</label>
                                <div class="col-lg-5">
                                    <input id="cnic" name="situation" type="text" value="<?php if(isset($ambulance_trip)){ echo $ambulance_trip['situation']; } ?>"  class="required  form-control">
                                </div>
                             </div>

                             <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="amount_recieved">کل رقم وصول*</label>
                                <div class="col-lg-4">
                                    <input id="amount_recieved" onblur="change_arrears()" name="amount_recieved" type="number" min="0" value="<?php if(isset($ambulance_trip)){ echo $ambulance_trip['amount_recieved']; } ?>"  class="required  form-control">
                                </div>
                             </div>

                             <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="amount_spent">رقم خرچ کی*</label>
                                <div class="col-lg-4">
                                    <input id="amount_spent" name="amount_spent" onblur="change_arrears()" type="number" min="0" value="<?php if(isset($ambulance_trip)){ echo $ambulance_trip['amount_spent']; } ?>"  class="required  form-control">
                                </div>
                             </div>

                             <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="amount_spent_reason">خرچ کی وجہ*</label>
                                <div class="col-lg-4">
                                    <input id="amount_spent_reason" name="amount_spent_reason" type="text" value="<?php if(isset($ambulance_trip)){ echo $ambulance_trip['amount_spent_reason']; } ?>"  class="required  form-control">
                                </div>
                             </div>

                             <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="drivers_cut">حصہ ڈرائیور*</label>
                                <div class="col-lg-4">
                                    <input id="drivers_cut" name="drivers_cut" onblur="change_arrears()" type="number" min="0" value="<?php if(isset($ambulance_trip)){ echo $ambulance_trip['drivers_cut']; } ?>"  class="required  form-control">
                                </div>
                             </div>

                             <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="arrears">بقایا جات*</label>
                                <div class="col-lg-4">
                                    <input id="arrears" name="arrears" type="number" min="0" value="<?php if(isset($ambulance_trip)){ echo $ambulance_trip['arrears']; } ?>"  class="required  form-control">
                                </div>
                             </div>

                            
                            <div class="form-group">
                                <div class=" col-lg-10">

                                    <?php if(isset($ambulance_trip)){ ?>

                                        <input type="hidden" name="update_id" value="<?php echo $ambulance_trip['trip_id'] ?>">

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
    
    function change_arrears(){
        var arrears = 0;
        var amount_rec = 0;
        var amount_spent = 0;
        var drivers_cut = 0;

        if($("#amount_recieved").val()!=""){
            
            amount_rec = $("#amount_recieved").val();
        
        }

        if($("#amount_spent").val()!=""){
            
            amount_spent = $("#amount_spent").val();

        }

        if($("#drivers_cut").val()!=""){

            drivers_cut = $("#drivers_cut").val();

        }
        

        
        arrears = (parseInt(amount_rec)) - (parseInt(amount_spent)+parseInt(drivers_cut));
        
        $("#arrears").val(arrears);
    }
</script>