//Text Area
 $('.summernote').summernote({
              height: 200,                 // set editor height

              minHeight: null,             // set minimum height of editor
              maxHeight: null,             // set maximum height of editor

              focus: true                 // set focus to editable area after initializing summernote
          });

 
   var form = $(".validate-form");
      form.validate({
          errorPlacement: function errorPlacement(error, element) {
              element.after(error);
          }
      });

//Job Application Page Script
$('.applications_detail_view').hide();

$('#btn_change_view').on(
  'click',
  function() 
  {
    $('.applications_list_view, .applications_detail_view').toggle();
    if ($.trim($('#btn_change_view').text()) === 'List View') {
        $('#btn_change_view').text('Detail View');
    } else {
        $('#btn_change_view').text('List View');        
    }
  }
);


//Show Toaster

function showToaster(type,msg,title){
  
  toastr[type](msg, title);

  toastr.options = {
    "closeButton": true,
    "debug": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
  }
}


//Reject Candidate
  function confirmReject(jobId,applicantId){

    

       swal({

          title: "Are you sure?",

          text: "You want to reject this application",

          type: "warning",

          showCancelButton: true,

          confirmButtonClass: 'btn-info',

          confirmButtonText: 'Yes Reject it'

        }, function () {
           
            showToaster('success','Candidate Rejected!','Success');

        });

  }



  //Add Candidate To Favourite
  function addCandidateToFav(jobId,applicantId){
           
            showToaster('success','Candidate Added to Favourite!','Success');

  }




//Delete Rrcords

function alertDelete(record_id){

       swal({

          title: "Are you sure?",

          text: "You want to delete this record",

          type: "warning",

          showCancelButton: true,

          confirmButtonClass: 'btn-info',

          confirmButtonText: 'Yes Delete it'

        }, function () {
           record_id = record_id.replace(' ','');
          document.getElementById(record_id).submit();

        });

      }


//Send Email to Candidate
function sendEmailToCanndidate(id){

  showToaster('success','Email Sent to Candidate!','Success');
  $("#contact_modal_"+id).modal('hide');
}

//Report Candidate Profile
function reportCandidateProfile(id){

 showToaster('success','Candidate Profile is Reported!','Success');
 $("#report_profile_modal_"+id).modal('hide');
}