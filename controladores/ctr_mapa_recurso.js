//##############################################
//############# establecer las opciones del mapa
var opcionesMapa = {
	center: [43.08, -8.37],
	zoom: 8,
	attributionControl:false
};
 
// crear un objeto mapa
var mapa1 = new L.map('mi-mapa', opcionesMapa);
// var mapa1 = new L.map('mi-mapa').setView([51,0],13);


// crear un objeto capa
var capa1 = new  L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
 
// añadir una capa al mapa	 
mapa1.addLayer(capa1);
//##############################





//##############################################
mapa1.zoomControl.setPosition('topright');
// //------boton de zoom
// L.control.zoom({
//      position:'bottomright'
// }).addTo(mapa1);
// //-----





//##############################################
//###### elegir o modificar el icono de posicion
var opcionesIcono={
	iconUrl: 'img/icono1.png',
	iconSize: [30,40]
};
// iconUrl, iconSize, iconSize, shadowSize, iconAnchor, 
//shadowAnchor, and popupAnchor ...

var iconoTipo1 = L.icon(opcionesIcono);
//##############################
//##############################################



//##############################################
//################funcion crear un marcador
function pin_mark(longM1,latM1,nombre){

	// var longM1= 43.08;
	// var latM1= -8.37;
	var opcionesMarcador={
		title: "empresa A",
		icon: iconoTipo1
	};
	// draggable, clickable,

	var marcador1 = new L.Marker([longM1,latM1], opcionesMarcador);

	// anidar un pop-up al marcador
	marcador1.bindPopup(nombre).openPopup();


	//añadir el marcador al mapa
	marcador1.addTo(mapa1);
}

// var in_lon= 43.08;
// var in_lat= -8.37;
// pin_mark(in_lon,in_lat);


//##############################
//##############################################










//##############################################
//############################ varios test

//añade un marcador al pinchar
// mapa1.on("click", function(e){
// 			new L.Marker( [e.latlng.lat, e.latlng.lng], opcionesMarcador).addTo(mapa1);

// 			var coord=e.latlng.toString().split(',');
// 			var c1=coord[0].split('(');
// 			var c2=coord[1].split(')');

// 			$("#lat").val(c1[1]);
// 			$("#lon").val(c2[0]);
// 			// $("#mi-mapa").after(e.latlng.toString());
			
			
// 		});



// mapa1.on('click',function(e){
// 			var coord=e.latlng.toString().split(',');
// 			var lat=coord[0].split('(');
// 			var long=coord[1].split(')');
// 			alert("you clicked the map at LAT: "+ lat[1]+" and LONG:"+long[0]);
// 		});


var nota1= L.control.attribution({prefix: "you clicked"});
nota1.addTo(mapa1);

mapa1.on('click',function(e){
			nota1.remove();
			var coord=e.latlng.toString().split(',');
			var lat=coord[0].split('(');
			var long=coord[1].split(')');
			nota1 = L.control.attribution({prefix: "Click en LAT: "+ lat[1]+" and LONG:"+long[0]}).addTo(mapa1);
		});




// // Attribution options
// var attrOptions = {prefix: 'attribution sample'};

// // Creating an attribution
// var attr = L.control.attribution(attrOptions);
// attr.addTo(mapa1);



//##############################
//##############################################
