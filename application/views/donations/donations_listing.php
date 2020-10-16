<!--main content start-->


<section id="main-content">

	<section class="wrapper site-min-height">
		<div class="row">
			<div class="col-lg-12">
       <!--breadcrumbs start -->
       <ul class="breadcrumb">
        <li><a href="<?php echo base_url('Home'); ?>"><i class="fa fa-home" ></i> ڈ یش بورڈ</a></li>
        <li><a href="<?php echo base_url('Donations/donations_listing');?>"> فہرست عطیات</a></li>
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
              
              <!--    <a  id="member_details" class="btn btn-shadow btn-default"><i class="fa fa-eye"> </i> Donation Details</a>  -->
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
            فہرست عطیات
          </header>
          <div class="panel-body">
           <section id="no-more-tables">
            <table  class=" table table-bordered table-striped table-condensed cf" id="jobs-listing-table">
              
             <thead class="cf">
              <tr>
               <th></th>
               <th>عطیہ نمبر</th>
               <th>ممبر نمبر</th>
               <th>نام</th>
               <th>ولدیت</th>		                  		
               <th>عطیہ کی تاریخ</th>		                  		
               <th>عطیہ کی نویت</th>

               <th>وصول کنندہ</th>
               <th>کل رقم عطیہ</th>
             </tr>
           </thead>
           <tbody>
            <?php
            foreach($donations as $donation){
              ?>
              <tr>
               <td data-title="Action"> 
                <div class="radios">
                 <label  for="donations">
                   <input name="donation_id" onclick='set_link(this.value)' id="donation_id" value="<?php echo $donation['donation_id']; ?>" type="radio"  /> 
                 </label>
               </div>
             </td>
             <td data-title="عطیہ نمبر"><?php echo $donation['donation_id']; ?></td>
             <td data-title="ممبر نمبر"><?php echo $donation['member_id']; ?></td>
             <td data-title="نام"><?php echo $donation['name']; ?></td>
             <td data-title="ولدیت"><?php echo $donation['father_name']; ?></td>
             
             <td data-title="عطیہ کی تاریخ"><?php echo $donation['donation_date']; ?></td>
             <td data-title="عطیہ کی نویت"><?php echo $donation['donation_nature']; ?></td>
             <td data-title="وصول کنندہ"><?php echo $donation['recieved_by']; ?></td>
             <td data-title="کل رقم عطیہ"><?php echo $donation['total_donation']; ?>
             <form action="<?php echo base_url();?>Donations/delete" method="post" id="delete<?php echo $donation['donation_id']; ?>">
              <input type="hidden" value="<?php echo $donation['donation_id'];?>" name="delete_id">
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
        
        document.getElementById("edit").href = "<?php echo base_url(); ?>Donations/edit/"+value;
        
        
      }
    </script>