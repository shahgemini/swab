<!--main content start-->
<section id="main-content">
	<section class="wrapper site-min-height">
		<div class="row">
			<div class="col-lg-12">
              <!--breadcrumbs start -->
              <ul class="breadcrumb">
                 <li><a href="<?php echo base_url('Home'); ?>"><i class="fa fa-home" ></i>  ڈ یش بورڈ</a></li>
                 <li><a href="<?php echo base_url('Donations/donations_listing');?>">فہرست عطیات</a></li>
                 <?php
                 $title = "";
                 if(isset($donation)){
                    $title = "Edit Donation"; 
                    ?>
                    <li><a href="<?php echo base_url()?>Donations/edit/<?php echo $donation['donation_id']; ?>" class="active"> ترمیم </a></li>
                    <?php
                }else{ 
                    $title ="Add New Donation";
                    ?>
                    <li><a href="<?php echo base_url('Donations/new_donation')?>" class="active"> نیا عطیہ </a></li>

                <?php } ?>
                
            </ul>
            <!--breadcrumbs end -->
        </div>
    </div>
    
    
    <div class="row">
     <div class="col-sm-12">
        <form class="form-horizontal validate-form " <?php if(isset($donation)){?> action="<?php echo base_url(); ?>Donations/update_donation"  <?php }else{ ?> action="<?php echo base_url(); ?>Donations/add_new_donation" <?php } ?>  method="POST"  role="form">
            <section class="panel ">
               <div class="panel-heading"> تفصیل عطیہ</div>
               <div class="panel-body ">
                 
                   <div class="form-group clearfix">
                    <label class="col-lg-2 control-label " for="reference_no">ممبر منتخب کریں</label>
                    <div class="col-lg-4">
                        <select name="member_id" onchange="get_member(this.value)" class="form-control" >
                            <option > موجودہ ممبر نہیں</option>
                            <?php

                            foreach($members as $member){
                                $selected = "";
                                if(isset($donation)){
                                    if(isset($donation['member_id']) && $donation['member_id']!=""){
                                        if($donation['member_id'] == $member['member_id']){
                                            $selected = "selected";
                                        }
                                    }
                                }
                                ?>
                                <option <?php echo $selected; ?> value="<?php echo $member['member_id'];?>"><?php echo $member['name'];?></option>

                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group clearfix">
                    <label class="col-lg-2 control-label " for="name">نام*</label>
                    <div class="col-lg-4">
                        <input id="name" name="name" type="text" value="<?php if(isset($donation)){ echo $donation['name']; } ?>"  class="required  form-control">
                    </div>
                </div>

                <div class="form-group clearfix">
                    <label class="col-lg-2 control-label " for="father_name">ولدیت*</label>
                    <div class="col-lg-4">
                        <input id="father_name" name="father_name" type="text" value="<?php if(isset($donation)){ echo $donation['father_name']; } ?>"  class="required  form-control">
                    </div>
                </div>
                
                <div class="form-group clearfix">
                    <label class="col-lg-2 control-label " for="donation_date">عطیہ کی تاریخ*</label>
                    <div class="col-lg-5">

                     <?php  $today= date('Y-m-d'); ?>
                     <input id="donation_date" name="donation_date" type="date" value="<?php if(isset($donation)){ echo $donation['donation_date']; }else{ echo $today; } ?>"  class="required  form-control">
                 </div>
             </div>

             <div class="form-group clearfix">
                <label class="col-lg-2 control-label " for="donation_nature">عطیہ کی نویت*</label>
                <div class="col-lg-4">
                    <select id="donation_nature" name="donation_nature" value="<?php  ?>"  class="required  form-control">
                        <?php

                        foreach($donation_natures as $nature){
                            $selected = "";
                            if(isset($donation)){ 
                                if($donation['donation_nature'] == $nature){
                                    $selected ="selected";
                                } 
                            }
                            ?>

                            <option value="<?php echo $nature; ?>" <?php echo $selected;?>><?php echo $nature; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group clearfix">
                <label class="col-lg-2 control-label " for="recieved_by">وصول کنندہ*</label>
                <div class="col-lg-8">
                    <input id="recieved_by" name="recieved_by" type="text" value="<?php if(isset($donation)){ echo $donation['recieved_by']; } ?>"  class="required  form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-2 control-label " for="total_amount">Total Amount*</label>
                <div class="col-lg-3">
                    <input type="number" min="0" value="<?php if(isset($donation)){ echo $donation['total_donation']; }?>" id="total_donation" name="total_donation" class="date-picker form-control" >
                    
                </div>
            </div>
            <div class="form-group">
                <div  class="col-lg-10">

                    <?php if(isset($donation)){ ?>

                        <input type="hidden" name="update_id" value="<?php echo $donation['donation_id'] ?>">

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
    function save_Job(){
        showToaster("success","Job Saved Successfully!","Success");
    }

    function get_member(val){

        if(val !="Not Existing Member"){
            
            $.ajax({
                type:"POST",
                url:"<?php echo base_url(); ?>Members/member_name_by_id",
                data:{member_id:val},
                success: function(data){
                    var member = data.split("+");
                    $("#name").val(member[0]);
                    $("#father_name").val(member[1]);
                }
            });    
        }else{

        }
        
    }
</script>
