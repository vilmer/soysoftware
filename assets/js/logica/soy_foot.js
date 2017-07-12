$('#formSusbribirse').validate({
    rules:{
      EmailSuscribirse:{
        required:true,
        email:true
      }
    },
    messages:{
      EmailSuscribirse:{
        required:'Por favor, email',
        email:'Email, no válido'
      }
    },
    submitHandler: function(form) {
          $('#btnSuscribirse').prop( "disabled",true);
          form.submit();
        },
    errorElement: "em"
  });