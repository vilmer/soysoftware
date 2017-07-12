$('#example').DataTable({
        "scrollX": true,
        "language":{
		    "sProcessing":     "Procesando...",
		    "sLengthMenu":     "Mostrar _MENU_ registros",
		    "sZeroRecords":    "No se encontraron resultados",
		    "sEmptyTable":     "Ningún dato disponible en esta tabla",
		    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
		    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
		    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
		    "sInfoPostFix":    "",
		    "sSearch":         "Buscar:",
		    "sUrl":            "",
		    "sInfoThousands":  ",",
		    "sLoadingRecords": "Cargando...",
		    "oPaginate": {
		        "sFirst":    "Primero",
		        "sLast":     "Último",
		        "sNext":     "Siguiente",
		        "sPrevious": "Anterior"
		    },
		    "oAria": {
		        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
		        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
		    }
		}
	 });
	 function cambiarEstado(argument) {
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
			            ok: 'Si, aprobar <i class="fa fa-check"></i>',
			            // cancel button text
			            cancel: 'Cancelar <i class="fa fa-times"></i>'            
			        },

			        // theme settings
			        theme:{
			            ok:'btn btn-outline-primary btn-rounded waves-effect',
			            // class name attached to cancel button 
			            cancel:'btn btn-outline-secondary btn-rounded waves-effect'
			        }
			    };
		alertify.confirm(
			'<h1>Confirmación.</h1>',
			'Marcar contacto como visto',
			function(){ 
				window.location.href = $(argument).data('url');
			}, 
			function(){ 
				alertify.success('Disfrutalo, :)');
			}
		);
	 }