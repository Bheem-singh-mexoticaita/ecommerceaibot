jQuery(function(e) {
    'use strict';
    $(document).ready(function() {
        $('.summernote').summernote({
            placeholder: 'Enter some text',
            height: 200,
             toolbar: [
          ['font', ['bold', 'underline', 'clear']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['insert', ['link']],
          ['view', ['codeview', 'help']]
        ]
        });
    });



});

function notify(status, url,message) {
    if(typeof message == 'string'){
        iziToast[status]({
            message: message,
            position: "topRight",
            timeout: 1000,
            onClosing: function(){
                window.location.href =url;       

            }
            
            
        });
    }else{
        $.each(message, function(i, val) {
            iziToast[status]({
                message: val,
                timeout: 1000,
                position: "topRight",
                onClosing: function(){
                    window.location.href =url;   
                }
            });
        });
    }

}

function notifyOne(status, message) {
    iziToast[status]({
        message: message,
        position: "bottomRight"
    });
}