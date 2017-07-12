$("#archivo").fileinput({
      browseClass: "btn btn-outline-success waves-effect",
      previewFileType: "image",
      browseLabel: "Subir imagen",
      browseIcon: "<i class=\"glyphicon glyphicon-picture\"></i> ",
      showCaption: false,
      allowedFileExtensions: ["jpg", "png"],
      showUpload: false,
      language:'es'
    });

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
        },
        archivo:'required',
        terminosCondiciones:'required'
      },
      messages:{
        titulo:{
          required:'Por favor, título',
          minlength:'Mínimo, 5 caracteres'
        },
        contenido:{
          required:'Por favor, contenido del blog',
          minlength:'Mínimo, 5 caracteres'
        },
        archivo:'Por favor, imagen',
        terminosCondiciones:'Por favor, acepté términos y condiciones<br>'
      },
      submitHandler: function(form) {
          $('#btnNuevoBlog').prop( "disabled",true);
          form.submit();
      },
      errorElement: "em"
    });

    function abrirModalTC(argument) {
      $('#modalTC').modal('show');
    }