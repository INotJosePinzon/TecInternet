





// JQUERY Consultar base de datos y mostrar en una tabla

$("#table-tab").click(function () {
	submitConsulta();
});
function submitConsulta() {
	console.log("Entró a llamar");
	fetch('http://localhost/TestPHP_3/server/loginselec.php', {
		method: 'GET',
		headers: {
			'Content-Type': 'application/json'
		}
	}).then(response => response.json())
		.then(result => {
			if (result.length > 0) {
				cargarDatos(result);
			} else {
				console.log(JSON.stringify(result));
			}
		})
		.catch(error => console.log('error: ' + error));
}


function cargarDatos(data) {
	var rows = "";
	$("#dataTable tr").remove();
	$("#dataTable").append('<tr><td>Placa</td>' +
		'<td>Modelo</td>' +
		'<td>Campo</td>');
	for (x in data) {
		rows += `<tr><td>${data[x].placa}</td><td>${data[x].modelo}</td><td>${data[x].campo}</td></tr>`;
	}
	$("#dataTable").append(rows);

}



// insertar información a la base de datos capturados desde interfaz gráfica

$(document).ready(function () {
	$("#fromlogin").submit(function (event) {
		console.log("entro from login");
		event.preventDefault();
		submitFormInsert();
	});
});
$(document).ready(function () {
	$("#agregar").submit(function (event) {
		console.log("entro from agregar");
		event.preventDefault();
		submitFormInsertproducto();
	});
});
$(document).ready(function () {
	$("#registro").submit(function (event) {
		console.log("entro registo-login");
		event.preventDefault();
		entrarRegistro();
	});
});
$(document).ready(function () {
	$("#eliminar").submit(function (event) {
		console.log("entro eliminar");
		event.preventDefault();
		eliminarproducto();
	});
});
$(document).ready(function () {
	$("#actualizar").submit(function (event) {
		console.log("entro eliminar");
		event.preventDefault();
		actualizarproducto();
	});
});
function actualizarproducto() {

	var precio = $("#actualziarprecio").val();
	var codigo = $("#actualziarcodigo").val();
	var object = { "codigo": codigo, "precio": precio };
	console.log(object);


	fetch('http://localhost/Proyecto/server/actualizarproducto.php', {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify(object),
		cache: 'no-cache'

	})

		.then(function (response) {
			console.log("entró");
			return response.text();
		})

		.then(function (data) {
			if (data === "OK") {
				formSuccess();
			}
			else {
				alert("Error al actualizar");
			}
		})
		.catch(function (err) {
			console.error(err);
		});
}
function submitConsultaProducto() {
	console.log("Entró a llamar");
	fetch('http://localhost/Proyecto/server/indexproducto.php', {
		method: 'GET',
		headers: {
			'Content-Type': 'application/json'
		}
	}).then(response => response.json())
		.then(result => {
			if (result.length > 0) {
				//cargarDatos(result);
				console.log(result);
				var html="";
				for(var i in result){
					var item= result[i];
					console.log(item);
					 html+= "	<a href='producto.php?id="+item.codigo+"'><div class='card'><h4>"+item.nombre+"</h4><img src='"+item.imagen+"' class='card-img-top' ></div></a>";
				}
				console.log(html+"-------");
				document.getElementById('resultadoproducto').innerHTML=html;
				

				
			} else {
				console.log(JSON.stringify(result));
			}
		})
		.catch(error => console.log('error: ' + error));
}
function submitConsultacompra() {
	console.log("Entró a llamar");
	fetch('http://localhost/Proyecto/server/indexproducto.php', {
		method: 'GET',
		headers: {
			'Content-Type': 'application/json'
		}
	}).then(response => response.json())
		.then(result => {
			if (result.length > 0) {
				//cargarDatos(result);
				console.log(result);
				var html="";
				for(var i in result){
					var item= result[i];
					console.log(item);
					 html+= "	<a href='producto.php?id="+item.codigo+"'><div class='card'><h4>"+item.nombre+"</h4><img src='"+item.imagen+"' class='card-img-top' ></div></a>";
				}
				console.log(html+"-------");
				document.getElementById('resultadoproducto').innerHTML=html;
				

				
			} else {
				console.log(JSON.stringify(result));
			}
		})
		.catch(error => console.log('error: ' + error));
}
function submitConsultaUsuario() {
	console.log("Entró a llamar");
	fetch('http://localhost/Proyecto/server/indexusuario.php', {
		method: 'GET',
		headers: {
			'Content-Type': 'application/json'
		}
	}).then(response => response.json())
		.then(result => {
			if (result.length > 0) {
				cargarDatos(result);
			} else {
				console.log(JSON.stringify(result));
			}
		})
		.catch(error => console.log('error: ' + error));
}

function entrarRegistro() {

	var contrasena = $("#logincontrasena").val();
	var correo = $("#logincorreo").val();
	var tipou = $("#tipousuaio").val();



	var object = { "clave": contrasena, "correo": correo, "tipou": tipou };

	console.log(object);

	fetch('http://localhost/Proyecto/server/login.php', {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify(object),
		cache: 'no-cache'

	})

		.then(function (response) {
			console.log("entró");
			return response.text();
		})

		.then(function (data) {
			if (data === "OK") {
				if (tipou === "admin") {
					window.location.href = "addproducto.HTML";
				} else {
					window.location.href = "home.HTML";
				}


			}
			else {
				alert("Usuario no existe");
			}
		})
		.catch(function (err) {
			console.error(err);
		});
}
function submitFormInsertproducto() {

	var codigo = $("#codigo").val();
	var nombre = $("#nombreproducto").val();
	var precio = $("#precioproducto").val();
	var cantidad = $("#cantidadproducto").val();
	var color = $("#colorproducto").val();


	var object = { "codigo": codigo, "nombre": nombre, "precio": precio, "cantidad": cantidad, "color": color };

	console.log(object);

	fetch('http://localhost/Proyecto/server/addproducto.php', {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify(object),
		cache: 'no-cache'

	})

		.then(function (response) {
			console.log("entró");
			return response.text();
		})

		.then(function (data) {
			if (data === "OK") {
				formSuccess();
			}
			else {
				alert("PRODUCTO AGREGADO");
			}
		})
		.catch(function (err) {
			console.error(err);
		});
}
function submitFormInsert() {

	var nombre = $("#inputnombre").val();
	var contrasena = $("#inputcontrasena").val();
	var correo = $("#inputcorreo").val();
	var telefono = $("#inputtelefono").val();
	var direccion = $("#inputdireccion").val();
	var ciudad = $("#inputciudad").val();

	var object = { "nombre": nombre, "clave": contrasena, "correo": correo, "celular": telefono, "direccion": direccion, "ciudad": ciudad };



	fetch('http://localhost/Proyecto/server/registro.php', {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify(object),
		cache: 'no-cache'

	})

		.then(function (response) {
			console.log("entró");
			return response.text();
		})

		.then(function (data) {
			if (data === "OK") {
				formSuccess();
			}
			else {
				alert("Error al insertar");
			}
		})
		.catch(function (err) {
			console.error(err);
		});
}

function eliminarproducto() {

	var codigo = $("#nuevocodigo").val();
	var object = { "codigo": codigo };
	console.log(object);


	fetch('http://localhost/Proyecto/server/eliminarproducto.php', {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify(object),
		cache: 'no-cache'

	})

		.then(function (response) {
			console.log("entró");
			return response.text();
		})

		.then(function (data) {
			if (data === "OK") {
				formSuccess();
			}
			else {
				alert("Error al eliminar");
			}
		})
		.catch(function (err) {
			console.error(err);
		});
}


function formSuccess() {
	alert("Datos almacenados");
}