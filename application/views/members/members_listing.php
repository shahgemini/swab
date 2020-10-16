<!--main content start-->


<section id="main-content">

	<section class="wrapper site-min-height">
		<div class="row">
			<div class="col-lg-12">
			  <!--breadcrumbs start -->
			  <ul class="breadcrumb">
				  <li><a href="<?php echo base_url('Home'); ?>"><i class="fa fa-home" ></i>  ڈ یش بورڈ</a></li>
				  <li><a href="<?php echo base_url('Members/members_listing');?>">ممبروں کی فہرست</a></li>
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
              <a  id="delete" class="btn btn-shadow btn-danger"><i class="fa fa-trash-o"> </i> ڈیلیٹ </a>
						</div>
				</section>
		
			</div>
		</div>
		<div class="row">
            <div class="col-sm-12">
            <section class="panel">
            <header class="panel-heading">
                  تمام ممبران
            </header>
            <div class="panel-body">
              	<section id="no-more-tables">
              		<table  class=" table table-bordered table-striped table-condensed cf" id="jobs-listing-table">
                                              
              			<thead class="cf">
		              		<tr>
		              			<th></th>
		                  		<th>ممبر نمبر</th>
		                  		<th>ریفرنس  نمبر</th>
		                  		<th>نام</th>
		                  		<th>ولدیت</th>		                  		
		                  		<th>شناختی کارڈ نمبر</th>		                  		
		                  		<th>موبائل نمبر</th>

                          <th>ممبرشپ کی تاریخ</th>
                          <th>پتہ</th>
		              		</tr>
              			</thead>
              			<tbody>
              				<?php
              				foreach($members as $member){
              				?>
              				<tr>
              					<td data-title="Action"> 
              						<div class="radios">
                              	<label  for="member">
                                  	<input name="member_id" onclick='set_link(this.value)' id="member_id" value="<?php echo $member['member_id']; ?>" type="radio"  /> 
                              	</label>
                          	</div>
                        </td>
              					<td data-title="ممبر نمبر"><?php echo $member['member_id']; ?></td>
              					<td data-title="ریفرنس  نمبر"><?php echo $member['reference_no']; ?></td>
              					<td data-title="نام"><?php echo $member['name']; ?></td>
              					<td data-title="ولدیت"><?php echo $member['father_name']; ?></td>
              				  
                        <td data-title="شناختی کارڈ نمبر"><?php echo $member['cnic']; ?></td>
                        <td data-title="موبائل نمبر"><?php echo $member['mobile_number']; ?></td>
                        <td data-title="ممبرشپ کی تاریخ"><?php echo $member['membership_date']; ?>
						<td data-title="پتہ"><?php echo $member['address']; ?></td>
                        
                          <form action="<?php echo base_url();?>Members/delete" method="post" id="delete<?php echo $member['member_id']; ?>">
                              <input type="hidden" value="<?php echo $member['member_id'];?>" name="delete_id">
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
    //document.getElementById("member_details").href = "<?php echo base_url(); ?>Members/details/"+value;
    
    document.getElementById("edit").href = "<?php echo base_url(); ?>Members/edit/"+value;
    
    
  }
</script>