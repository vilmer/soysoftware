$( "#formContacto" ).validate( {
        rules: {
          nombreContacto: {
            required:true,
            minlength:2
          },
          temaContacto:{
            required:true,
            minlength:2
          },
          mensajeContacto:{
            required:true,
            minlength:2
          },
          emailContacto: {
            required: true,
            email: true
          }
        },
        messages: {
          nombreContacto: {
            required:"Por favor, introduzca su nombre completo",
            minlength:'Mínimo, 2 caracteres'
          },
          temaContacto: {
            required:"Por favor, introduzca un tema",
            minlength:'Mínimo, 2 caracteres'
          },
          mensajeContacto:{
            required:"Por favor, detalle su mensaje",
            minlength:'Mínimo, 2 caracteres'
          },
          emailContacto: {
            required:'Por favor, introduzca una dirección de correo electrónico válida',
            email:'Dirección de correo electrónico no válida'
          }
        },
        submitHandler: function(form) {
          $('#btnEnviarContacto').prop( "disabled",true);
          form.submit();
        },
        errorElement: "em"
      } );