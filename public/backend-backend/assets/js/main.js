function makeid(length) {
  let result = '';
  const characters = '0123456789';
  const charactersLength = characters.length;
  let counter = 0;
  while (counter < length) {
    result += characters.charAt(Math.floor(Math.random() * charactersLength));
    counter += 1;
  }
  return result;
}


var ajaxResult = null;
async   function Ajax_response(url,method,values,callback,_beforetask =null){
  jQuery.ajaxSetup({headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')  }
});
return await jQuery.ajax({
  type: method,
  url: url,
  data: values,
  processData: false,
  contentType: false,
  success: callback,
  error: function(_request, status, _error) {
    console.log(status);
  }
});
}

var Ajax_Post = null;

async   function Ajax_call(url,method,values,callback,_beforetask =null){
  jQuery.ajaxSetup({headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')  }
});
return await jQuery.ajax({
  type: method,
  url: url,
  data: values,
  success: callback,
  error: function(_request, status, _error) {
    console.log(status);
  }
});
}
function append_subcatagories_on_the_basis_of_catagories(ajaxvalue,catatgories_oid){

    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
if(catatgories_oid){
    $.ajax({
        url: jQuery('#ajax_url').val(),
        type: "POST",
        dataType: "json",
        data: ajaxvalue,
        success: function (successResponse) {
            console.log(successResponse.html);
            $('#subcategory').append('asdsada');
        }

    })
    // console.log(url);
}else{
    $('#subcategory').empty();
}

}




$(document).ready(function() {
    $('#menu li:first-child').addClass('active');
    $('#menu li a').click(function() {
      $(this).parent().addClass('show');
      $(this).next('ul').slideToggle();
    });
    $('.dropify').dropify();
 $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
        jQuery(document).on("change", "#category", function (e) {
            e.preventDefault();
          var ajaxvalue = {
            catatgories_oid_name: jQuery(this).val(),
            selected_category_name: jQuery("option:selected", this).attr("selected_category_name"),
            catatgories_oid: jQuery("option:selected", this).attr("catatgories_oid"),
          }
          console.log(ajaxvalue);
          var catId = $(this).val();
        append_subcatagories_on_the_basis_of_catagories(ajaxvalue,jQuery("option:selected", this).attr("catatgories_oid"));



        });

        jQuery(document).on("change", "#category_name", function (e) {
            jQuery('#category_id').val( jQuery("option:selected", this).attr("catatgories_oid"))
        });
        var fileArr = [];
        jQuery(document).on("change", "#multiple_product_images", function (e) {
            // console.log('asdaaaaa');
            if (fileArr.length > 0) fileArr = []
            $('#image_preview').html("");
            var total_file = document.getElementById("multiple_product_images").files;
            var i;
                if (!total_file.length) return;
                for (i = 0; i < total_file.length; i++) {
                    if (total_file[i].size > 1048576) {
                        document.querySelector('#submit-btn').setAttribute('disabled', true);
                        return false;
                    } else {
                        fileArr.push(total_file[i]);
                        // $('#image_preview').append("<div class='img-div' id='img-div" + i + "'><img src='" + URL.createObjectURL(event.target.files[i]) + "' class='img-responsive image img-thumbnail'><div class='middle'><button id='action-icon' value='img-div" + i + "' class='btn btn-danger' role='" + total_file[i].name + "'><i class='glyphicon glyphicon-trash'></i></button></div></div><div class='clear-fix'></div>");
                        $('#image_preview').append("<img id='showImage1'"+ i+" src='" + URL.createObjectURL(event.target.files[i]) + "' alt='' class='img-thumbnail shadow-sm' width='110'>");
                        $('#submit-btn').prop('disabled', false);
                    }
                }

        });


    jQuery(document).on("submit","#settingStore",async function(e) {
      e.preventDefault();
      var ajx_url = jQuery('#ajax_password_URL').val();
      var ajax_value_list = $(this)[0];
      var formData = new FormData(ajax_value_list);
      const resPose = await Ajax_response(ajx_url,"POST",formData,'');
      if(jQuery.isEmptyObject(resPose.errors)){
        if(resPose.status =='success'){
           Swal.fire( resPose.message,  )
        }
      }else{
        jQuery.each(resPose.errors, function (key, value) {
          jQuery(`#${key}-error`).text(value);
        });
      }

    });
    jQuery(document).on("focusout","#title", function(e) {
      jQuery('#slug').val(jQuery(this).val().replace(/\s+/g, '-').toLowerCase());
      jQuery('#product_code').val(`ecom_${jQuery(this).val().replace(/\s+/g, '-').toLowerCase()}_${makeid(10)}`);
    });

    jQuery(document).on("submit","#postproduct",async function(e) {
      e.preventDefault();
      var ajx_url = jQuery('#ajaxurl').val();
      var formData = new FormData( $(this)[0]);
      const resPose = await Ajax_response(ajx_url,"POST",formData,'');
      if(jQuery.isEmptyObject(resPose.errors)){
        if(resPose.status =='success'){
           notify(resPose.status,resPose.redirct_url,resPose.message,{   closeButton: true, progressBar: false, });
        }
      }else{
        jQuery.each(resPose.errors, function (key, value) {
          jQuery(`#${key}-error`).text(value);
        });
      }
    });

 // Country State Functionalty
 jQuery(document).on("change","#country-dd",async function(e) {
  jQuery("#state-dd").html('');
  var beforeSendaction = '';  var ajx_url = jQuery('#ajax_request_url').val();
  var ajax_value ={ country_id:  jQuery("option:selected", this).attr("country_id")};
  const response = await Ajax_call(ajx_url,"POST",ajax_value,beforeSendaction);
  jQuery.each(response.states, function (key, value) {
  jQuery("#state-dd").append(`<option value="${value.name}" state_id ="${value.id}">${value.name}</option>`);
  });
  jQuery('#city-dd').html('<option value="">Select City</option>');
});
  jQuery(document).on("change","#state-dd",async function(e) {
    jQuery("#city-dd").html('');
    var beforeSendaction = '';
    var ajx_url = jQuery('#ajax_request_url2').val();
    var ajax_value ={ state_id :jQuery("option:selected", this).attr("state_id") };
    jQuery('#selected_state_id').val(jQuery("option:selected", this).attr("state_id"))
    jQuery('#city-dd').html('<option value="">Select City</option>');
    const res = await Ajax_call(ajx_url,"POST",ajax_value,beforeSendaction);
       jQuery.each(res.cities, function (key, value) {
        jQuery("#city-dd").append(`<option value="${value.name}" city_id ="${value.id}" >${value.name}</option>`);
    });


});
jQuery(document).on("change","#city-dd", function(e) {
  jQuery('#selected_city_id').val(jQuery("option:selected", this).attr("city_id"))
});



//  Shipping Post Functionalty
jQuery(document).on("submit","#shipping_post_data",async function(e) {
  e.preventDefault();
  var post_ajax_url = jQuery('#post_ajax_url').val();
  var ajax_value_list = $(this)[0];
  var formData = new FormData(ajax_value_list);
  const resPose = await Ajax_response(post_ajax_url,"POST",formData,'');
  if(jQuery.isEmptyObject(resPose.errors)){
    if(resPose.status =='success'){
       notify(resPose.status,resPose.redirct_url,resPose.message,{   closeButton: true, progressBar: false, });
    }
  }else{
    jQuery.each(resPose.errors, function (key, value) {
      jQuery(`#${key}-error`).text(value);
    });
  }
});


});

