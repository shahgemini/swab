<!--main content start-->


<section id="main-content">

	<section class="wrapper site-min-height">
		<div class="row">
			<div class="col-lg-12">
			  <!--breadcrumbs start -->
			  <ul class="breadcrumb">
				  <li><a href="<?php echo base_url('Home'); ?>"><i class="fa fa-home" ></i>  ڈ یش بورڈ</a></li>
				  <li><a href="<?php echo base_url('Ambulance/ambulance_trips_listing');?>">ٹرپ فہرست</a></li>
			  </ul>
			  <!--breadcrumbs end -->
		  </div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<section class="panel">
				 	  	<div class="panel-body">
							<a  id="edit" class="btn btn-shadow btn-default"><i class="fa fa-pencil"> </i> ترمیم</a> 
							<!-- 
              <a  id="change_status" data-toggle="modal" href="#change_status_modal"  class="btn btn-shadow btn-default"><i class="fa fa-pencil"> </i> Change Status</a> 

              <a  id="job_set_to_featured" class="btn btn-shadow btn-default"><i class="fa fa-certificate"> </i> Set As Featured Job</a>  -->
              
              <!-- <a  id="member_details" class="btn btn-shadow btn-default"><i class="fa fa-eye"> </i> Member Details</a>  -->
<!-- 
              <a  id="job_applications" class="btn btn-shadow btn-default"><i class="fa fa-eye"> </i> Job Applications</a> 

               <a  id="job_set_inactive" class="btn btn-shadow btn-default"><i class="fa fa-cross"> </i> Set as Featured Job</a> 
                -->
              <a  id="delete" class="btn btn-shadow btn-danger"><i class="fa fa-trash-o"> </i> ڈیلیٹ</a> 
						</div>
				</section>
		
			</div>
		</div>
		<div class="row">
            <div class="col-sm-12">
            <section class="panel">
            <header class="panel-heading">
                 ایمبولینس ٹرپ فہرست
            </header>
            <div class="panel-body">
              	<section id="no-more-tables">
              		<table  class=" table table-bordered table-striped table-condensed cf" id="jobs-listing-table">
                                              
              			<thead class="cf">
		              		<tr>
		              			<th style="width: 5% !important;"></th>
		                  		<th>ٹرپ نمبر</th>
		                  		<th>ٹرپ تاریخ</th>
		                  		<th>ٹرپ بوجہ</th>
		                  		<th>ایمبولینس کہاں گی</th>		                  		
		                  		<th>فاصلہ کلومیٹر</th>		                  		
		                  		<th>صورتحال</th>
                          <th>کل رقم وصول </th>
                          <th>رقم خرچ کی</th>
                          <th>خرچ کی وجہ</th>
                          <th>حصہ ڈرائیور</th>
                          <th>بقایا جات</th>
		              		</tr>
              			</thead>
              			<tbody>
              				<?php
              				foreach($ambulance_trips as $trip){
              				?>
              				<tr>
              					<td data-title="Action"> 
              						<div class="radios">
                              	<label  for="trip">
                                  	<input name="trip_id" onclick='set_link(this.value)' id="trip_id" value="<?php echo $trip['trip_id']; ?>" type="radio"  /> 
                              	</label>
                          	</div>
                        </td>
              					<td data-title="ٹرپ نمبر"><?php echo $trip['trip_id']; ?></td>
              					<td data-title="ٹرپ تاریخ"><?php echo $trip['trip_date']; ?></td>
              					<td data-title="ٹرپ بوجہ"><?php echo $trip['trip_reason']; ?></td>
              					<td data-title="ایمبولینس کہاں گی"><?php echo $trip['destination']; ?></td>
              				  
                        <td data-title="فاصلہ کلومیٹر"><?php echo $trip['distance_km']; ?></td>
                        <td data-title="صورتحال"><?php echo $trip['situation']; ?></td>
                        <td data-title="کل رقم وصول"><?php echo number_format($trip['amount_recieved'],2); ?></td>

                        <td data-title="رقم خرچ کی"><?php echo number_format($trip['amount_spent'],2); ?></td>
                        <td data-title="خرچ کی وجہ"><?php echo $trip['amount_spent_reason']; ?></td>
                        <td data-title="حصہ ڈرائیور"><?php echo number_format($trip['drivers_cut'],2); ?></td>
                        <td data-title="بقایا جات"><?php echo number_format($trip['arrears'],2); ?>
                          <form action="<?php echo base_url();?>Ambulance/delete" method="post" id="delete<?php echo $trip['trip_id']; ?>">
                              <input type="hidden" value="<?php echo $trip['trip_id'];?>" name="delete_id">
                            </form>
                        </td>
                        
              				</tr>

              				<?php
              				}
              				?>	
              
              			</tbody>
              		</table>
              	</section>

            </div>
      	</section>
      	</div>
      	</div>
	</section>
</section>

<script type="text/javascript">
  
      // swal({

      //   title: "Already Added!",

      //   text: "Job is Already Added to Feature Listing!",

      //   type: "info",

      //   showCancelButton: true,
      // });
  

  function set_link(value){

    document.getElementById("delete").onclick = function() {alertDelete('delete'+value);}
   
    document.getElementById("edit").href = "<?php echo base_url(); ?>Ambulance/edit/"+value;
    
    
  }
</script>