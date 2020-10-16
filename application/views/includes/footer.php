<style>
 .site-footer {
    position: fixed;
    left: 0px;
    bottom: 0px;
    height: 40px;
    width: 100%;
  }
  </style>
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2019 &copy; SWAB
              <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
 </section>

 
<script src="<?php echo base_url(); ?>js/jquery-ui-1.9.2.custom.min.js"></script>
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="<?php echo base_url(); ?>js/jquery.dcjqaccordion.2.7.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.scrollTo.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/jquery.sparkline.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="<?php echo base_url(); ?>js/owl.carousel.js" ></script>

<script src="<?php echo base_url(); ?>js/jquery.customSelect.min.js" ></script>
<script src="<?php echo base_url(); ?>js/respond.min.js" ></script>

<!--right slidebar-->
<script src="<?php echo base_url(); ?>js/slidebars.min.js"></script>
 <!--custom tagsinput-->
  <script src="<?php echo base_url(); ?>js/jquery.tagsinput.js"></script>
<!--common script for all pages-->
<script src="<?php echo base_url(); ?>js/common-scripts.js"></script>
<script src="<?php echo base_url(); ?>js/dynamic_table_init.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/fuelux/js/spinner.min.js"></script>
<!--script for this page-->
<script src="<?php echo base_url(); ?>js/sparkline-chart.js"></script>
<script src="<?php echo base_url(); ?>js/count.js"></script>
<script src="<?php echo base_url(); ?>assets/toastr-master/toastr.js"></script>

<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/advanced-datatable/media/js/jquery.dataTables.js"></script>

<script src="<?php echo base_url(); ?>js/respond.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/data-tables/DT_bootstrap.js"></script>
    <!--right slidebar-->
<script src="<?php echo base_url(); ?>js/slidebars.min.js"></script>

    <!--dynamic table initialization -->
<script src="<?php echo base_url(); ?>js/dynamic_table_init.js"></script>

  <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
  <!--Form Validation-->
  <script src="<?php echo base_url(); ?>js/bootstrap-validator.min.js" type="text/javascript"></script>

  <!--Form Wizard-->
  <script src="<?php echo base_url(); ?>js/jquery.steps.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>js/jquery.validate.min.js" type="text/javascript"></script>

  <!--summernote-->
  <script src="<?php echo base_url(); ?>assets/summernote/dist/summernote.min.js"></script>


  <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
  <script src="<?php echo base_url(); ?>js/advanced-form-components.js"></script>
  
  <!--script for this page-->
  <script src="<?php echo base_url(); ?>js/form-component.js"></script>

  <!-- General Scripts -->
  <script src="<?php echo base_url(); ?>js/general_script.js"></script>

  <!-- Requests Scripts -->
  <script src="<?php echo base_url(); ?>js/requests.js"></script>
  
  
 
<script>

</script>
<script>
window.scrollTo(0,0);

      $('#jobs-listing-table').dataTable( {
             "aaSorting": [[ 0, "asc" ]],
      //        "bProcessing": true,
      //       //  'processing':true,
      //       //  "serverSide": true,
      //       //  "ajax":{
      //       //   url :"<?php echo base_url(); ?>Jobs/jobs_listing", 
      //       //   type: "post",  
      //       //   data:{},
      //       //   error: function(data){
      //       //     alert(data);
      //       //      $("#jobs-listing-table_processing").css("display","none");
      //       //   }
            
            
      //       // },
      // "language": {
      //   processing: '<i class="fa fa-spinner fa-spin fa-3x fa-fw"></i><span class="sr-only">Loading...</span> '
      // },
    
      });
     
    
</script>
<!--main content start-->
<?Php  $type= $this->session->flashdata("type"); 
 $msg = $this->session->flashdata("msg");
  $title = $this->session->flashdata("title") ?>
<script type="text/javascript">
  
  if("<?php echo $msg; ?>"!=""){
    showToaster('<?Php  echo $type;if("<?php echo $msg; ?>"!=""){
      
    } ?>','<?php echo $msg; ?>','<?php echo $title; ?>');
  
  }






</script>

  </body>

<!-- Mirrored from thevectorlab.net/flatlab/blank.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Aug 2015 03:47:32 GMT -->
</html>
