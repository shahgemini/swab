<!--main content start-->
<section id="main-content">
	<section class="wrapper site-min-height">
		<div class="row">
			<div class="col-lg-12">
       <!--breadcrumbs start -->
       <ul class="breadcrumb">
        <li><a href="<?php echo base_url('Home'); ?>"><i class="fa fa-home" ></i> ڈ یش بورڈ</a></li>
        <li><a href="<?php echo base_url('Jobs/jobs_listing');?>">All Jobs</a></li>
        <li><a href="<?php echo base_url('Jobs/details')?>/<?php echo $job['Id'];?>" class="active"> Details </a></li>
        
      </ul>
      <!--breadcrumbs end -->
    </div>
  </div>
  <!-- page start-->
  <section class="panel">
    <header class="panel-heading">
      Job Details
      <span class="pull-right">
        <a href="<?php echo base_url('');?>Jobs/applicants/<?php echo $job['Id']; ?>" id="loading-btn" class="btn btn-shadow btn-success btn-xs"><i class="fa fa-eye"></i> Job Applications</a>
      </span>
    </header>

  </section>
  <div class="row">
    <div class="col-md-8">
      <section class="panel">
        <div class="bio-graph-heading project-heading">
          <strong> <?php echo $job['Title']; ?> </strong>
        </div>
        <div class="panel-body bio-graph-info">
          <!--<h1>New Dashboard BS3 </h1>-->
          <div class="row p-details">
           <div class="bio-row">
            <p><span class="bold">Job ID </span>: <?php echo $job['JobId']; ?></p>
          </div>
          <div class="bio-row">
            <p><span class="bold">Created by </span>: EmployerAdmin</p>
          </div>
          <div class="bio-row">
            <p><span class="bold">Status </span>: <span class="label label-primary">Active</span></p>
          </div>
          <div class="bio-row">
            <p><span class="bold">Created On </span>: <?php echo date("Y-m-d h:i:sa",strtotime($job['PostDate'])); ?></p>
          </div>
          <div class="bio-row">
            <p><span class="bold">Starting From </span>: <?php echo  date("Y-m-d h:i:sa",strtotime($job['StartDate']));?></p>
          </div>
          <div class="bio-row">
            <p><span class="bold">Deadline </span>: <?php echo  date("Y-m-d h:i:sa",strtotime($job['DeadLine'])); ?></p>
          </div>
          <div class="bio-row">
           <p><span class="bold">Direct Apply Link </span>: <?php echo $job['DirectApplyLink']; ?></p>
         </div>
       </div>

     </div>

   </section>

   <section class="panel">
    <header class="panel-heading">
      Job's Description
    </header>
    <div class="panel-body">
     <?php echo $job["Description"]; ?>
   </div>
 </section>
 <section class="panel">
  <header class="panel-heading">
    Application Instruction
  </header>
  <div class="panel-body">
   <?php echo $job["ApplicationInstruction"]; ?>
 </div>
</section>
</div>
<div class="col-md-4">
  <section class="panel">
    <header class="panel-heading">
      Jobs Details
    </header>

    <div class="panel-body">
     <p>
       <b class="bold">Job Category</b>
       <span class="pull-right"><?php echo $job['Category']; ?></span>
     </p>
     <p>
       <b class="bold">Job Type</b>
       <?php
       $class = "";
       if($job["JobType"] == "Full Time"){
        $class= "fulltime-info";

      }elseif($job["JobType"] == "Part Time"){
        $class= "parttime-info";

      }elseif($job["JobType"] == "Intern"){
        $class= "intern-info";

      }elseif($job["JobType"] == "Contract"){
        $class= "contract-info";

      }elseif($job["JobType"] == "Temporary"){
        $class= "temporary-info";

      }
      ?>
      <span class=" pull-right label <?php echo $class; ?>"><?php echo $job['JobType']; ?></span>
    </p>
    <p>
     <b class="bold">Salary</b>
     <span class="pull-right"><?php echo $job['Salary']; ?></span>
   </p>
   <p>
     <b class="bold">Email</b>
     <span class="pull-right"><?php echo $job['Email']; ?></span>
   </p>
   <p>
     <b class="bold">Phone Number</b>
     <span class="pull-right"><?php echo $job['PhoneNumber']; ?></span>
   </p>
   
   <br/>
   <p>
     <b class="bold">City</b>
     <span class="pull-right"><?php echo $job['City']; ?></span>
   </p>
   <p>
     <b class="bold">State</b>
     <span class="pull-right"><?php echo $job['State']; ?></span>
   </p>
   <p>
     <b class="bold">Country</b>
     <span class="pull-right"><?php echo $job['CountryName']; ?></span>
   </p>
   <p>
     <b class="bold">Location</b>
     <span class="pull-right"><?php echo $job['Location']; ?></span>
   </p>
   <br/>
   

   <h5 class="bold">Job Tags</h5>
   <ul class="p-tag-list">
     <?php if($job['Tags']!=""){
      $array_tags = explode(',',$job["Tags"]);
      foreach($array_tags as $tag){
       ?>
       <li><a href="#"><i class="fa fa-tag"></i> <?php echo $tag; ?></a></li>
       <?php
     }
   }else{
     ?>
     <li><a href="#"><i class="fa fa-tag"></i> Information Technology</a></li>
     <li><a href="#"><i class="fa fa-tag"></i> Academics</a></li>
     <li><a href="#"><i class="fa fa-tag"></i> Education</a></li>
     <?php
   }
   ?>
   
 </ul>

 <div class="text-center mtop20">
  <a href="<?php echo base_url();?>Jobs/edit/<?php echo $job['Id'];?>" class="btn btn-sm btn-primary">Edit Job</a>
  <a href="#" class="btn btn-sm btn-warning">Close Job</a>
</div>
</div>

</section>
</div>
</div>
<!-- page end-->
</section>
</section>
  <!--main content end-->