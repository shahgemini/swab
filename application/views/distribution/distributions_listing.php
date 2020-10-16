<!--main content start-->


<section id="main-content">

	<section class="wrapper site-min-height">
		<div class="row">
			<div class="col-lg-12">
			  <!--breadcrumbs start -->
			  <ul class="breadcrumb">
				  <li><a href="<?php echo base_url('Home'); ?>"><i class="fa fa-home" ></i>   ڈ یش بورڈ</a></li>
				  <li><a href="<?php echo base_url('Ambulance/ambulance_expenditures_listing');?>">فہرست تقسیم عطیات</a></li>
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
                 فہرست تقسیم عطیات
            </header>
            <div class="panel-body">
              	<section id="no-more-tables">
              		<table  class=" table table-bordered table-striped table-condensed cf" id="jobs-listing-table">
                                              
              			<thead class="cf">
		              		<tr>
		              			<th style="width: 5% !important;"></th>
		                  		<th>تقسیم نمبر</th>
		                  		<th>تاریخ تقسیم عطیات</th>
		                  		<th>تفصیل تقسیم عطیات</th> 
                          <th>کل رقم تقسیم</th>
		              		</tr>
              			</thead>
              			<tbody>
              				<?php
              				foreach($distributions as $distribution){
              				?>
              				<tr>
              					<td data-title="Action"> 
              						<div class="radios">
                              	<label  for="trip">
                                  	<input name="distribution_id" onclick='set_link(this.value)' id="distribution_id" value="<?php echo $distribution['distribution_id']; ?>" type="radio"  /> 
                              	</label>
                          	</div>
                        </td>
              					<td data-title="تقسیم نمبر"><?php echo $distribution['distribution_id']; ?></td>
              					<td data-title="تاریخ تقسیم عطیات"><?php echo $distribution['distribution_date']; ?></td>
              					<td data-title="تفصیل تقسیم عطیات"><?php echo $distribution['distribution_details']; ?></td>
                        <td data-title="کل رقم تقسیم"><?php echo number_format($distribution['total_distribution_amount'],2); ?>
                          <form action="<?php echo base_url();?>Distributions/delete_distribution" method="post" id="delete<?php echo $distribution['distribution_id']; ?>">
                              <input type="hidden" value="<?php echo $distribution['distribution_id'];?>" name="delete_id">
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
   
    document.getElementById("edit").href = "<?php echo base_url(); ?>Distributions/edit_distribution/"+value;
    
    
  }
</script>