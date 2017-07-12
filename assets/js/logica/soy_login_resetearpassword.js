$( "#formLogin2" ).validate( {
        rules: {
          email_userResetearPassword: {
            required: true,
            email: true
          }
        },
        messages: {
         
          email_userResetearPassword: {
            required:'Por favor, email',
            email:'Email no válida'
          }
        },
         submitHandler: function(form) {
          $('#btnResetearPassword').prop( "disabled",true);
          form.submit();
        },
        errorElement: "em"
      } );