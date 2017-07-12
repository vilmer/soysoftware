$( "#formFoto" ).validate( {
        rules: {
          archivo:{
          	required:true
          }
        },
        messages: {
          archivo:{
          	required:'Por favor, foto'
          }
        },
        submitHandler: function(form) {
          $('#btnFotoPerfil').prop( "disabled",true);
          form.submit();
      	},
        errorElement: "em"
      } );


	$( "#formPassword" ).validate( {
        rules: {
          passworda:{
          	required:true,
          	minlength:6,
          	remote:{
      		  url:$(passworda).data('url'),
		        type:'post',
		        data:{
		          password:function(){
		            return $('#passworda').val();
		          }
		        }
          	}
          },
          nuevoPassword: {
            required: true,
            minlength:6,
          },
          repitaNuevoPassword:{
          	required:true,
          	equalTo:nuevoPassword,
          }
        },
        messages: {
          passworda:{
          	required:'Por favor, contraseña antigua',
          	minlength:'Mínimo, 6 caracteres',
          	remote:'Contraseña antigua incorrecta'
          },
          nuevoPassword: {
            required:'Por favor, nueva contraseña',
          	minlength:'Mínimo, 6 caracteres',
          },
          repitaNuevoPassword:{
          	required:'Por favor, repita nueva contraseña',
          	equalTo:'La contraseña no coinciden',
          }
        },
        submitHandler: function(form) {
          $('#btnCambiarPassword').prop( "disabled",true);
          form.submit();
      	},
        errorElement: "em"
      } );


	$( "#formInfo" ).validate( {
        rules: {
          nombre:{
          	required:true,
          	minlength:2,
          	maxlength:100
          },
          apellido: {
            required: true,
            minlength:2,
          	maxlength:100
          },
          descripcion:{
          	required:true,
          	minlength:2,
          	maxlength:250
          }
        },
        messages: {
          nombre:{
          	required:'Por favor, nombre',
          	minlength:'Mínimo, 2 caracteres',
          	maxlength:'Máximo, 100 caracteres'
          },
          apellido: {
            required:'Por favor, apellido',
          	minlength:'Mínimo, 2 caracteres',
          	maxlength:'Máximo, 100 caracteres'
          },
          descripcion:{
          	required:'Por favor, descripcion',
          	minlength:'Mínimo, 2 caracteres',
          	maxlength:'Máximo, 250 caracteres'
          }
        },
        submitHandler: function(form) {
          $('#btnActualizarInformacion').prop( "disabled",true);
          form.submit();
      	},
        errorElement: "em"
      } );