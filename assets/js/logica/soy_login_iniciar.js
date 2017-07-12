 $( "#formLogin2" ).validate( {
        rules: {
          password_user:{
            required:true,
            minlength:6
          },
          email_user: {
            required: true,
            email: true
          }
        },
        messages: {
          password_user:{
            required:'Por favor, password',
            minlength:'Mínimo, 6 caracteres en password'
          },
          email_user: {
            required:'Por favor, email',
            email:'Email no válida'
          }
        },
        submitHandler: function(form) {
          $('#btnLoginDos').prop( "disabled",true);
          form.submit();
        },
        errorElement: "em"
      } );