/*#########################################################
activar los botones para editar la ingormacion del usuario
###########################################################*/
function activar_editar(tipo){	
	let btn_clase ="";
	let btn_acpt ="";
	let btn_canc ="";

	if(tipo == "gear_datos"){
		btn_clase =".mod_datos";
		btn_acpt ="#btn_actualizar_datos";
		btn_canc ="#btn_cancelar_datos";

	}

	if(tipo == "gear_categ"){
		btn_clase =".mod_cat";
		btn_acpt ="#btn_actualizar_categorias";
		btn_canc ="#btn_cancelar_categorias";
	}
	$(btn_clase).each(function() {
	    $( this ).prop('disabled', false);
	  });
	$(btn_acpt).show(500);
	$(btn_canc).show(500);
}


/*#####################################
añadir una foto a la galeria del usuario
#######################################*/
