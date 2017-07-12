$( "#formLogin" ).validate( {
        rules: {
          password:{
            required:true,
            minlength:6
          },
          email: {
            required: true,
            email: true
          }
        },
        messages: {
          password:{
            required:'Por favor, contraseña',
            minlength:'Mínimo, 6 caracteres'
          },
          email: {
            required:'Por favor, email',
            email:'Email no válida'
          }
        },
        submitHandler: function(form) {
          $('#btnLoginUno').prop( "disabled",true);
          form.submit();
        },
        errorElement: "em"
      } );