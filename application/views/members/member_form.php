<!--main content start-->
<section id="main-content">
	<section class="wrapper site-min-height">
		<div class="row">
			<div class="col-lg-12">
			  	<!--breadcrumbs start -->
			  	<ul class="breadcrumb">
				  	<li><a href="<?php echo base_url('Home'); ?>"><i class="fa fa-home" ></i> ڈ یش بورڈ</a></li>
				  	<li><a href="<?php echo base_url('Jobs/members_listing');?>">ممبروں کی فہرست</a></li>
				  	<?php
				  	$title = "";
				  	 if(isset($member)){
				  	
				  		?>
				  		 <li><a href="<?php echo base_url()?>Members/edit/<?php echo $member['member_id']; ?>" class="active"> ترمیم </a></li>
				  	<?php
				 	 }else{ 
				 	
				 	 	?>
				 	 	 <li><a href="<?php echo base_url('Members/new_member')?>" class="active"> نیا ممبر </a></li>

				  	<?php } ?>
				 			  
			  	</ul>
			 	<!--breadcrumbs end -->
		 	 </div>
		</div>
		
								  
		<div class="row">
			<div class="col-sm-12">
				<form class="form-horizontal validate-form " <?php if(isset($member)){?> action="<?php echo base_url(); ?>Members/update_member"  <?php }else{ ?> action="<?php echo base_url(); ?>Members/add_new_member" <?php } ?>  method="POST"  role="form">
				<section class="panel ">
					<div class="panel-heading"> ممبر تفصیل فارم</div>
						<div class="panel-body ">
							
						  	<div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="reference_no">ریفرنس  نمبر*</label>
                                <div class="col-lg-4">
                                    <input id="reference_no" name="reference_no" type="text" value="<?php if(isset($member)){ echo $member['reference_no']; } ?>"  class="required  form-control">
                                </div>
                             </div>

                             <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="name">نام*</label>
                                <div class="col-lg-4">
                                    <input id="name" name="name" type="text" value="<?php if(isset($member)){ echo $member['name']; } ?>"  class="required  form-control">
                                </div>
                             </div>

                             <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="father_name">ولدیت*</label>
                                <div class="col-lg-4">
                                    <input id="father_name" name="father_name" type="text" value="<?php if(isset($member)){ echo $member['father_name']; } ?>"  class="required  form-control">
                                </div>
                             </div>
							
							<div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="cnic">شناختی کارڈ نمبر*</label>
                                <div class="col-lg-5">
                                    <input id="cnic" name="cnic" type="text" value="<?php if(isset($member)){ echo $member['cnic']; } ?>"  class="required  form-control">
                                </div>
                             </div>

                             <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="mobile_number">موبائل نمبر*</label>
                                <div class="col-lg-4">
                                    <input id="mobile_number" name="mobile_number" type="text" value="<?php if(isset($member)){ echo $member['mobile_number']; } ?>"  class="required  form-control">
                                </div>
                             </div>

                             <div class="form-group clearfix">
                                <label class="col-lg-2 control-label " for="address">پتہ*</label>
                                <div class="col-lg-8">
                                    <input id="address" name="address" type="text" value="<?php if(isset($member)){ echo $member['address']; } ?>"  class="required  form-control">
                                </div>
                             </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label " for="membership_date">ممبرشپ کی تاریخ</label>
                                <div class="col-lg-3">
                                   <?php  $today= date('Y-m-d'); ?>
                                    <input type="date" value="<?php if(isset($member)){ echo $member['membership_date']; }else{ echo $today; }?>" id="membership_date" name="membership_date" class="date-picker form-control"  size="16">
                                        
                                </div>
                            </div>
                            <div class="form-group">
                                <div class=" col-lg-10">

                                    <?php if(isset($member)){ ?>

                                        <input type="hidden" name="update_id" value="<?php echo $member['member_id'] ?>">

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

</script>
<script>
// This sample uses the Autocomplete widget to help the user select a
// place, then it retrieves the address components associated with that
// place, and then it populates the form fields with those details.
// This sample requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script
// src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

var placeSearch, autocomplete;

var componentForm = {
locality: 'long_name',
administrative_area_level_1: 'short_name',
country : 'long_name',
postal_code: 'short_name' 
}; 

function initAutocomplete() {
// Create the autocomplete object, restricting the search predictions to
// geographical location types.
autocomplete = new google.maps.places.Autocomplete(
document.getElementById('Location'), {types: ['geocode']});

// Avoid paying for data that you don't need by restricting the set of
// place fields that are returned to just the address components.
autocomplete.setFields('address_components');

// When the user selects an address from the drop-down, populate the
// address fields in the form.
autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
// Get the place details from the autocomplete object.
var place = autocomplete.getPlace();


// Get each component of the address from the place details,
// and then fill-in the corresponding field on the form.
for (var i = 0; i < place.address_components.length; i++) { 
var addressType = place.address_components[i].types[0];
if (componentForm[addressType]) {
var val = place.address_components[i][componentForm[addressType]];
if(addressType =="country"){
document.getElementById("Country").value = val;
}
if(addressType =="locality"){
document.getElementById("City").value = val;
}
if(addressType =="administrative_area_level_1"){
document.getElementById("State").value = val;
}
}
}
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
if (navigator.geolocation) {
navigator.geolocation.getCurrentPosition(function(position) {
var geolocation = {
lat: position.coords.latitude,
lng: position.coords.longitude
};

var circle = new google.maps.Circle(
{center: geolocation, radius: position.coords.accuracy});
autocomplete.setBounds(circle.getBounds());
});
}
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlewOcdTks2kOy2EaNJ05HsFiLdZKC6J4&libraries=places&callback=initAutocomplete"
async defer></script>