
    CKEDITOR.replace( 'contenido' ,{
      language : 'es',
      uiColor : '#9AB8F3',
      height : 300
     });

    $('#formBlog').validate({
      rules:{
        titulo:{
          required:true,
          minlength:5
        },
        contenido:{
          required:true,
          minlength:5
        }
      },
      messages:{
        titulo:{
          required:'Por favor, título',
          minlength:'Mínimo, 5 caracteres'
        },
        contenido:{
          required:'Por favor, contenido del blog',
          minlength:'Mínimo, 5 caracteres'
        }
      },
      submitHandler: function(form) {
          $('#btnActualizarBlog').prop( "disabled",true);
          form.submit();
      },
      errorElement: "em"
    });