let peticion;
			const buscar_calle = (dir) => {
				peticion = new XMLHttpRequest();
				// let URL_s= "https://nominatim.openstreetmap.org/search?q=29+general+sanjurjo+coru%C3%B1a&format=json";
				
				let URL_s= dir;
				// let URL_s="https://nominatim.openstreetmap.org/search?q="+num+"+"+calle+"+"+ciudad+"&format=json";
				// alert(URL_s);
				peticion.open('GET', URL_s); 
				peticion.send();
				peticion.addEventListener("load", cargada);
			}
		

			const cargada = () => {

				let datos = JSON.parse(peticion.responseText);
				
				let calle = datos[0].display_name;
				let lat = datos[0].lat;
				let lon = datos[0].lon;

				// let resultados =calle+" - "+lat+"::"+lon;
				//let resultados = `Direccion: ${calle} - [${lat}]:[${lon}]`;

				document.getElementById("ilat").value = lat;
				document.getElementById("ilon").value = lon;
				// document.getElementById("gogo").click();

			}

			let var1 = document.getElementById("iPoblacion");
			var1.addEventListener("focusout", function() {
			    if(var1.value != ""){
			    	let num = document.getElementById("iNumero").value;
			    	let calle = document.getElementById("iCalle").value;
			    	let ciudad= document.getElementById("iPoblacion").value;
			    	let direccion = "https://nominatim.openstreetmap.org/search?q="+num+"+"+calle+"+"+ciudad+"&format=json";
			        buscar_calle(direccion);
			    }
			});