$('#formComentario').validate({
		rules:{
			comentario:{
				required:true,
          		minlength:2,
          		maxlength:250
			}
		},
		messages:{
			comentario:{
				required:'Por favor, comentario',
	      		minlength:'Mínimo, 2 caracteres',
	      		maxlength:'Máximo, 250 caracteres'
			}
		},
		submitHandler: function(form) {
          $('#btnNuevoCoemntario').prop( "disabled",true);
          form.submit();
      	},
		errorElement: "em"
	});

	$('#formComentarioEdi').validate({
		rules:{
			descripcionEd:{
				required:true,
          		minlength:2,
          		maxlength:250
			}
		},
		messages:{
			descripcionEd:{
				required:'Por favor, comentario',
	      		minlength:'Mínimo, 2 caracteres',
	      		maxlength:'Máximo, 250 caracteres'
			}
		},
		submitHandler: function(form) {
          $('#btnActualizarComentario').prop( "disabled",true);
          form.submit();
      	},
		errorElement: "em"
	});

	


	function editarComentario (argument) {
		$('#modalContactForm').modal('show');
		$('#labeldescripcionEd').addClass('active');
		$('#descripcionEd').html($(argument).data('res'));
		$('#idCome').val($(argument).data('id'));

	}

	function eliminarComentario(argument) {
		

			alertify.defaults = {
			        // dialogs defaults
			        autoReset:true,
			        basic:false,
			        closable:true,
			        closableByDimmer:true,
			        frameless:false,
			        maintainFocus:true, // <== global default not per instance, applies to all dialogs
			        maximizable:true,
			        modal:true,
			        movable:true,
			        moveBounded:false,
			        overflow:true,
			        padding: true,
			        pinnable:true,
			        pinned:true,
			        preventBodyShift:false, // <== global default not per instance, applies to all dialogs
			        resizable:true,
			        startMaximized:false,
			        transition:'pulse',

			        // notifier defaults
			        notifier:{
			            // auto-dismiss wait time (in seconds)  
			            delay:5,
			            // default position
			            position:'bottom-right',
			            // adds a close button to notifier messages
			            closeButton: false
			        },

			        // language resources 
			        glossary:{
			            ok: 'Si, eliminar <i class="fa fa-check"></i>',
			            // cancel button text
			            cancel: 'Cancelar <i class="fa fa-times"></i>'            
			        },

			        // theme settings
			        theme:{
			            // class name attached to prompt dialog input textbox.
			            input:'ajs-input',
			            // class name attached to ok button
			            ok:'btn btn-outline-primary btn-rounded waves-effect',
			            // class name attached to cancel button 
			            cancel:'btn btn-outline-secondary btn-rounded waves-effect'
			        }
			    };
		alertify.confirm(
			'<h1>Eliminar comentario</h1>',
			"Está seguro de eliminar comentario? :'(",
			function(){ 
				window.location.href = $(argument).data('url');
			}, 
			function(){ 
				alertify.success('Disfrutalo, :)');
			}
		);
	}

	function eliminarBlog(argument) {

		alertify.defaults = {
			        // dialogs defaults
			        autoReset:true,
			        basic:false,
			        closable:true,
			        closableByDimmer:true,
			        frameless:false,
			        maintainFocus:true, // <== global default not per instance, applies to all dialogs
			        maximizable:true,
			        modal:true,
			        movable:true,
			        moveBounded:false,
			        overflow:true,
			        padding: true,
			        pinnable:true,
			        pinned:true,
			        preventBodyShift:false, // <== global default not per instance, applies to all dialogs
			        resizable:true,
			        startMaximized:false,
			        transition:'pulse',

			        // notifier defaults
			        notifier:{
			            // auto-dismiss wait time (in seconds)  
			            delay:5,
			            // default position
			            position:'bottom-right',
			            // adds a close button to notifier messages
			            closeButton: false
			        },

			        // language resources 
			        glossary:{
			            // ok button text
			            ok: 'Si, eliminar <i class="fa fa-check"></i>',
			            // cancel button text
			            cancel: 'Cancelar <i class="fa fa-times"></i>'            
			        },

			        // theme settings
			        theme:{
			            // class name attached to prompt dialog input textbox.
			            input:'ajs-input',
			            // class name attached to ok button
			            ok:'btn btn-outline-primary btn-rounded waves-effect',
			            // class name attached to cancel button 
			            cancel:'btn btn-outline-secondary btn-rounded waves-effect'
			        }
			    };
		alertify.confirm(
			'<h1>Eliminar Blog</h1>',
			"Está seguro de eliminar Blog? :'(",
			function(){ 
				window.location.href = $(argument).data('url');
			}, 
			function(){ 
				alertify.success('Disfrutalo, :)');
			}
		);
	}