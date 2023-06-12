function cart_functionalty(product_oid,producttotalprice,quantity){
  jQuery.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
});
  var user_session_oid =    jQuery('#user_session_oid').val();
  var update_ajax_url =    jQuery('#update_ajax_url').val();
  jQuery.ajax({
    type: "patch",
    url: update_ajax_url,
    data: {user_session_oid,product_oid,producttotalprice,quantity},
    beforeSend: function(){
      // jQuery(".button").button("disable");
    },
    success: function(response){
      if(response.status =='success'){
        beautyToast.success({
            title: 'success', // Set the title of beautyToast
            message: response.message, // Set the message of beautyToast
            darkTheme: true
            });
        }
        jQuery('#subtotal').text(response.subtotal);
        jQuery('#basket-total').text(response.total);
    }
  });
}
var ajaxResult = null;

async   function Ajax_response(url,method,values,callback,_beforetask =null){
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


jQuery(document).ready(function () {
  jQuery(".hero_banner_sec").slick({
    dots: true,
    arrows: false,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    speed: 300,
  });


    jQuery(".slider-for").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      fade: true,
      asNavFor: ".slider-nav",
    });
    jQuery(".slider-nav").slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      asNavFor: ".slider-for",
      dots: false,
      arrow: true,
      focusOnSelect: true,
    });
    var QtyInput = (function () {
      var jQueryqtyInputs = jQuery(".qty-input");

      if (!jQueryqtyInputs.length) {
        return;
      }

      var jQueryinputs = jQueryqtyInputs.find(".product-qty");
      var jQuerycountBtn = jQueryqtyInputs.find(".qty-count");
      var qtyMin = parseInt(jQueryinputs.attr("min"));
      var qtyMax = parseInt(jQueryinputs.attr("max"));

      jQueryinputs.change(function () {
        var jQuerythis = jQuery(this);
        var jQueryminusBtn = jQuerythis.siblings(".qty-count--minus");
        var jQueryaddBtn = jQuerythis.siblings(".qty-count--add");
        var qty = parseInt(jQuerythis.val());
        if (isNaN(qty) || qty <= qtyMin) {
          var product__price =  jQuerythis.attr("product__price");
          var producttotalprice = qtyMin *product__price
          var quantity = qtyMin;
          jQuery('#product_quantity_price__'+product_oid+'').text(producttotalprice);
          jQuery('#product_quntity__'+product_oid+'').val(quantity);
          jQuery('#product_price__'+product_oid+'').val(producttotalprice);

             jQueryminusBtn.attr("disabled", true);
        } else {
          jQueryminusBtn.attr("disabled", false);

          if (qty >= qtyMax) {

            jQuerythis.val(qtyMax);
            jQueryaddBtn.attr("disabled", true);
          } else {

            jQuerythis.val(qty);
            jQueryaddBtn.attr("disabled", false);
          }
          var product_oid =  jQuerythis.attr("product_oid");
         var product__price =  jQuerythis.attr("product__price");
         var producttotalprice = qty *product__price
         var quantity = qty;
        
         jQuery('#product_quantity_price__'+product_oid+'').text(producttotalprice);
         jQuery('#product_quntity__'+product_oid+'').val(quantity);
         jQuery('#product_price__'+product_oid+'').val(producttotalprice);
     
         if (window.location.pathname.indexOf("/cart") > -1) {
          cart_functionalty(product_oid,producttotalprice,quantity);
        }

        }
      });

      jQuerycountBtn.click(function () {
        var operator = this.dataset.action;
        var jQuerythis = jQuery(this);
        var jQueryinput = jQuerythis.siblings(".product-qty");
        var qty = parseInt(jQueryinput.val());
        var product_oid = jQuerythis.siblings(".product-qty").attr("product_oid");
        // console.log(product_oid);

                if (operator == "add") {
          qty += 1;
          if (qty >= qtyMin + 1) {
            jQuerythis.siblings(".qty-count--minus").attr("disabled", false);
          }

          if (qty >= qtyMax) {
            jQuerythis.attr("disabled", true);
          }
        } else {
          qty = qty <= qtyMin ? qtyMin : (qty -= 1);

          if (qty == qtyMin) {
            jQuerythis.attr("disabled", true);
          }

          if (qty < qtyMax) {
            jQuerythis.siblings(".qty-count--add").attr("disabled", false);
          }
        }

       jQueryinput.val(qty);
       var product_oid =  jQueryinput.attr("product_oid");
       var product__price =  jQueryinput.attr("product__price");
       var producttotalprice = qty *product__price
       var quantity = qty;
        jQuery('#product_quantity_price__'+product_oid+'').text(producttotalprice);
        jQuery('#product_quntity__'+product_oid+'').val(quantity);
        jQuery('#product_price__'+product_oid+'').val(producttotalprice);
        if (window.location.pathname.indexOf("/cart") > -1) {
          cart_functionalty(product_oid,producttotalprice,quantity);
        }

      });
    })();
  });


  jQuery(".dashboard_tabs .nav-tabs button").click(function (e) {
    var id = jQuery(e.target).attr("data-bs-target");
    var position = jQuery(this).parent().position();
    var width = jQuery(this).parent().width();
    if (history.pushState) {
        history.pushState(null, null, id)
      }
      else {
        location.hash = id
      }
  });

    jQuery(document).on("click","#addto_cart",function(e) {
    e.preventDefault(); e.preventDefault()
      jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var product_id =  jQuery(this).attr("product_uid");
    var user_id = jQuery("#logout_user_id").val();
    var product_quntity = jQuery("#product_quntity__"+product_id+'').val();
    var product_price = jQuery("#product_price__"+product_id+'').val();
    var product_sale_price = jQuery("#product_sale_price"+product_id+'').val();

     jQuery.post(jQuery('#ajax_url').val(), {product_id,product_quntity,product_price,user_id,product_sale_price}, (response) => {
      // if(response.status =='success'){
        console.log(response);
      //   console.log();
      beautyToast.success({
          title: 'success', // Set the title of beautyToast
          message: response.message, // Set the message of beautyToast
          darkTheme: true,
          onClose : function(){
            window.location.href =response.redirect;       
          },
          });
      // }
      
  });

  });
  // jQuery("#remove_cart").on("click", function (e) {
    jQuery(document).on("click","#remove_cart",function(e) {
      var user_session_oid =    jQuery('#user_session_oid').val();
    var ele = jQuery(this);
    Swal.fire({
      title: 'Are you sure want to remove?',
      showCancelButton: true,
      confirmButtonText: 'Yes',
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        jQuery.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
          }
      });
      var product_id = jQuery("input[name=product_id]").val();
      var product_quntity = jQuery("input[name=product_quntity]").val();
      var product_price = jQuery("input[name=product_price]").val();
      var user_id = jQuery("input[name=user_id]").val();
      var user_session_oid = jQuery("input[name=user_session_oid]").val()
      jQuery.ajax({
        url: jQuery('#ajax_url').val(),
        method: "DELETE",
        data: {product_id,product_quntity,product_price,user_id,user_session_oid},
        success: function(response){
          console.log(response);
          if(response.status =='success'){
            beautyToast.success({
                title: 'success', // Set the title of beautyToast
                message: response.message, // Set the message of beautyToast
                darkTheme: true
                });
            }
            jQuery('#subtotal').text(response.subtotal);
            jQuery('#basket-total').text(response.total);
            jQuery(`#remove_data_id__jQuery{product_id}`).remove();
        }
    });
      } 
    })
  

  });

  // Country State Functionalty 
    jQuery(document).on("change","#country-dd",async function(e) {
    jQuery("#state-dd").html('');
    var ajx_url = jQuery('#ajax_request_url').val();
    // console.log(selected_state);
    var ajax_value ={ country_id:  jQuery("option:selected", this).attr("country_id")};
    var beforeSendaction = '';
    jQuery('#state-dd').html('<option value="">Select State</option>');
    jQuery('#selected_countries_id').val(jQuery("option:selected", this).attr("country_id"))
    const response = await Ajax_response(ajx_url,"POST",ajax_value,beforeSendaction);
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
      const res = await Ajax_response(ajx_url,"POST",ajax_value,beforeSendaction);
         jQuery.each(res.cities, function (key, value) {
          jQuery("#city-dd").append(`<option value="${value.name}" city_id ="${value.id}" >${value.name}</option>`);
      });
     

  });
  jQuery(document).on("change","#city-dd", function(e) {
    jQuery('#selected_city_id').val(jQuery("option:selected", this).attr("city_id"))
});
 
  $("input").keypress(function(e) {
    var input_val=   $(this).val();
       var name=   $(this).attr('name');
      if(!input_val){  jQuery(`#${name}-error`).html('');  }
  });
  $("select").change(function(e) {
    var input_val=   $(this).val();
       var name=   $(this).attr('name');
      if(!input_val){  jQuery(`#${name}-error`).html('');  }
  });

  var selected_countries = jQuery('#selected_countries').val();
  var selected_state = jQuery('#selected_state').val();
  var selected_city = jQuery('#selected_city').val();
  if(!selected_countries ||selected_state ||selected_city){
     append_selected_option_values();
  }
  async function append_selected_option_values(){
    jQuery('#state-dd').html('<option value="">Select State</option>');
    jQuery('#city-dd').html('<option value="">Select City</option>');
    var selected_ajax_url = jQuery('#selected_ajax_url').val();
    var seletedajax_value ={  country_id:  jQuery('#selected_countries_id').val(),  state_id:  jQuery('#selected_state_id').val(),   city_id:  jQuery('#selected_city_id').val(),};
    const resPose = await Ajax_response(selected_ajax_url,"POST",seletedajax_value,'');
    jQuery.each(resPose.states, function (key, value) {
      jQuery("#state-dd").append(`<option value="${value.name}"  ${(selected_state == value.name ) ? 'selected' : ''} state_id ="${value.id}">${value.name}</option>`);
      }); 
      jQuery.each(resPose.cities, function (key, value) {
        jQuery("#city-dd").append(`<option value="${value.name}"  ${(selected_city == value.name ) ? 'selected' : ''} city_id ="${value.id}" >${value.name}</option>`);
    });
    }


    //  User Dashboard  Jqury Start here 

if (window.location.pathname.indexOf("/dashboard") > -1) { 
  //  Dashboard UI  
  $(".dashboard_tabs .nav-tabs button").click(function () {
    var position = $(this).parent().position();
    var width = $(this).parent().width();
    $(".dashboard_tabs .slider").css({ left: +position.left, width: width });
  });
  var actWidth = $(".dashboard_tabs .nav-tabs")
    .find(".active")
    .parent("li")
    .width();
  var actPosition = $(".dashboard_tabs .nav-tabs .active").position();
  $(".dashboard_tabs .slider").css({ left: +actPosition.left, width: actWidth });


  $( "#datepicker" ).datepicker();
// update_account
  $('#update_account').on('submit',  async function(e) {
    e.preventDefault();
    var ajax_value_list = $(this).serialize();
    var ajx_url = jQuery('#ajax_URL').val();
    // jQuery('.loader').css('display','block');
    const resPose = await Ajax_response(ajx_url,"POST",ajax_value_list,'');
    
    if(jQuery.isEmptyObject(resPose.errors)){
      // console.log(resPose);
      if(resPose.status =='success'){
        beautyToast.success({
          title: 'success', // Set the title of beautyToast
          message: resPose.message, // Set the message of beautyToast
          darkTheme: true
          });
      }

    }else{
      jQuery.each(resPose.errors, function (key, value) {
        jQuery(`#${key}-error`).text(value);
      });
    }
  });


//  Change password 
$('#changepasswordform').on('submit',  async function(e) {
  e.preventDefault();
  var ajax_value_list = $(this).serialize();
  var ajx_url = jQuery('#ajax_password_URL').val();
 
try {
  const resPose = await Ajax_response(ajx_url,"POST",ajax_value_list,'');
  if(resPose.status =='success'){
    beautyToast.success({
        title: 'success', // Set the title of beautyToast
        message: resPose.message, // Set the message of beautyToast
        darkTheme: true,
        onClose : function(){
          window.location.href =resPose.redirect;       
        },
        });
    }
} catch (error) {
  console.log(error);
  if(error.status =='422' || error.status ==422 ){
    console.log();
    jQuery.each(error.responseJSON.errors, function (key, value) {
      jQuery(`#${key}-error`).text(value);
    });
  }
}
});

}

//  Logout Functionalty 

jQuery(document).on("click","#logout_functionbalty",async function(e) {
  e.preventDefault();
  Swal.fire({
    title: 'Are You Logout',
    showCancelButton: true,
    confirmButtonText: 'Yes',
  }).then(async (result) => {
    if (result.isConfirmed) {
      // console.log('Yes');
      var ajx_url = jQuery('#logout_action_url').val();
      var ajax_value ={ logout_user_id:  jQuery('#logout_user_id').val()};
      const resPose = await Ajax_response(ajx_url,"POST",'ajax_value_list','');
      if(resPose.status =='success'){
        beautyToast.success({
            title: 'success', // Set the title of beautyToast
            message: resPose.message, // Set the message of beautyToast
            darkTheme: true,
            onClose : function(){
              window.location.href =resPose.redirect;       
            },
            });
        }
    }
  });

});

//  Contact Us Form Functionalty 
jQuery(document).on("submit","#conatact_cus_form",async function(e) {
  e.preventDefault();
  var ajax_value_list = $(this).serialize();
  var ajx_url = jQuery('#contact_us_action_url').val();
  const resPose = await Ajax_response(ajx_url,"POST",ajax_value_list,'');
  if(jQuery.isEmptyObject(resPose.errors)){
    // console.log(resPose);
    if(resPose.status =='success'){
      beautyToast.success({
        title: 'success', // Set the title of beautyToast
        message: resPose.message, // Set the message of beautyToast
        darkTheme: true,
        onClose : function(){
          location.reload();  
        },
        });
    }
  }else{
    jQuery.each(resPose.errors, function (key, value) {
      jQuery(`#${key}-error`).text(value);
    });
  }
});

