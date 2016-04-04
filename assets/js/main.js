//funciones para formularios
var puerto =window.location.port;
var urlhost="http://" + window.location.hostname+":"+puerto;
function getClients() {
	console.log("!!!!!");
	url=urlhost+"/api/getclients";
	$("#clients").empty();
	txt="";
	$.getJSON(url,function(datos){
		$("#clients").append("<option >Seleccionar</option>");
		$.each(datos.clients, function(i, item){
			console.log(item.name+item.lastname);
			opciones = $("#clients").val();
			txt +='<option value="'+item.id_client+'" >'+item.name+" "+item.lastname+"</option>";

		});
		txt+='<option onclick="newClientModal();" >Nuevo Cliente......</option>';
		$("#clients").html(txt);
	});
}

function getTipos () {
	url=urlhost+"/api/gettypes";
	txt="";
	$("#marcas").empty();
	$("#modelos").empty();
	$.getJSON(url,function(datos){

		txt+="<option >Seleccionar</option>";
		$.each(datos.types, function(i, item){
			console.log("marca:"+item.name);
			txt+='<option value="'+item.name+'" onclick="getMarca('+item.id_type+');" >'+item.name + '</option>';
		});
	$("#device").html(txt);
	});	
	verModal();
}
function getMarca (id_device) {
	resetForm();
console.log("getMarca");
	url=urlhost+"/api/getmarca/?type="+id_device;
	txt="";
	$("#marcas").empty();
	$("#modelos").empty();
	$.getJSON(url,function(datos){

		txt+="<option >Seleccionar</option>";
		$.each(datos.marks, function(i, item){	
			console.log("marca:"+item.name);
			txt+='<option value="'+item.name+'" >'+item.name + '</option>';
		});
		txt+='<option onclick="camInputMarca();" >OTROS</option>';
	$("#marcas").html(txt);
	});
}
function camInputMarca() {
	$("#mark").empty();
	var inp = "";
	inp+='<div class="input-control text">';
	inp+='<input type="text" id="marcas" name="marca">';
	inp+="</div>";
	$("#mark").html(inp);
}
function resetForm() {
	$("#mark").empty();
	var inp = "";
	inp+='<div class="input-control select">';
	inp+='<select id="marcas" name="marca" ></select>';
	inp+="</div>";
	$("#mark").html(inp);
}

function getModelo (id_marca) {
	url=urlhost+"/api/getmodelo/?marca="+id_marca;
	txt="";
	$("#modelos").empty();

	$.getJSON(url,function(datos){

		txt+="<option>Seleccionar</option>";
		$.each(datos.models, function(i, item){	
			console.log("marca:"+item.name);
			txt+='<option value="'+item.name+'" >'+item.name + '</option>';
		});
	$("#modelos").html(txt);
	});
}
function addDevice() {
	url=urlhost+"/api/adddevice";
	tipo = $("#device").val();
	mark = $("#marcas").val();
	model = $("#modelos").val();
	detail = $("#detalles").val();
	price = $("#price").val();

	var ajax = new XMLHttpRequest();
  	ajax.open("POST",url,true);
  	ajax.onreadystatechange=function () {
  		if (ajax.readyState==4){
  			console.log("!!!AGREGADO!!!");
  			vaciarForm();
  			getTable();
  		}
  	}
  	
  	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  	ajax.send("type="+tipo+"&mark="+mark+"&model="+model+"&details="+detail+"&price="+price);

	
}
function addProductSale() {
	url=urlhost+"/sale/create";
	cantidad = $("#cantidad").val();
	producto = $("#producto").val();
	precio = $("#precio").val();
	
	var ajax = new XMLHttpRequest();
  	ajax.open("POST",url,true);
  	ajax.onreadystatechange=function () {
  		if (ajax.readyState==4){
  			console.log("!!!AGREGADO!!!");
  			vaciarFormSale();
  			getTableSale();
  		}
  	}
  	
  	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  	ajax.send("producto="+producto+"&cantidad="+cantidad+"&precio="+precio);

}
function getTableSale () {
	url = urlhost+"/api/tablesale";
	txt = "";
	$.getJSON(url,function(datos){
		$.each(datos.devices, function(i, item){	
			txt+="<tr>";
			txt+='<td>'+item.producto+'</td>'+'<td>'+item.cantidad+'</td>'+'<td>'+item.precio+'</td>'+'<td>'+item.idproducto+'</td>';
			txt+="</tr>";
		});
	$("#tbody").html(txt);
	});

}
function vaciarFormSale () {	
	cantidad = $("#cantidad").val("");
	producto = $("#producto").val("");
	precio = $("#precio").val("");
}

function addNewClient() {
	url=urlhost+"/api/newClient";
	var ajax = new XMLHttpRequest();

	nombre = $("#nameclient").val();
	apellido = $("#lastnameclient").val();
	telefono  = $("#phoneclient").val();

  	ajax.open("POST",url,true);
  	ajax.onreadystatechange=function () {
  		if (ajax.readyState==4){
  			console.log("!!!AGREGADO!!!");
  			getClients();
  			$("#nameclient").val("");
  			$("#lastnameclient").val("");
  			$("#phoneclient").val("");
  			quitarModalClient();
  		}
  	}
  	console.log("name="+nombre+"&lastname="+apellido+"&phone="+telefono);
  	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  	ajax.send("name="+nombre+"&lastname="+apellido+"&phone="+telefono);	
}

//funcion para crear tabla con disositivos de la nota
function getTable() {
	url = urlhost+"/api/getdevices";
	txt = "";
	$.getJSON(url,function(datos){
		$.each(datos.devices, function(i, item){	
			txt+="<tr>";
			txt+='<td>'+item.type+'</td>'+'<td>'+item.mark+'</td>'+'<td>'+item.model+'</td>'+'<td>'+item.details+'</td>'+'<td><div class="button cycle-button" title="Eliminar" onclick="quitDevice('+item.id_device+')" ><span class="mif-cross"></span></div></td>';
			txt+="</tr>";
		});
	$("#tbody").html(txt);
	});


}

//funcion para vacir el formulario de dispositivos
function vaciarForm() {
	$("#marcas").empty();
	$("#modelos").empty();
	$("#detalles").val("");
	$("#price").val("");	
}

//funciones para modal

function verModal() {
	$("#modaladd").removeClass("no-mostrar");
	$("#modaladd").addClass("mostrar");
	$("#cortina").removeClass("no-mostrar");
	$("#cortina").addClass("mostrar");
}

function quitarModal() {
	$("#modaladd").removeClass("mostrar");
	$("#modaladd").addClass("no-mostrar");
	$("#cortina").removeClass("mostrar");
	$("#cortina").addClass("no-mostrar");	
}

function quitDevice (id_device) {
	url = urlhost+"/api/quitDevice";

	var ajax = new XMLHttpRequest();
  	ajax.open("POST",url,true);
  	ajax.onreadystatechange=function () {
  		if (ajax.readyState==4){
  			console.log("!!!ELIMINADO!!!");
  			getTable();
  		}
  	}
  	
  	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  	ajax.send("id_device="+id_device);	
}

function newClientModal() {
	$("#modalclient").removeClass("no-mostrar");
	$("#modalclient").addClass("mostar");

	$("#cortinaclient").removeClass("no-mostrar");
	$("#cortinaclient").addClass("mostar");
}
function quitarModalClient() {

	$("#modalclient").removeClass('mostrar');
	$("#modalclient").addClass('no-mostrar');

	$("#cortinaclient").removeClass('mostrar');
	$("#cortinaclient").addClass('no-mostrar');	
}
function modalSearch () {
	console.log("Intentabdo");
	$("#modalsearch").removeClass('no-mostrar');
	$("#modalsearch").addClass('mostrar');

	$("#cortinasearch").removeClass('no-mostrar');
	$("#cortinasearch").addClass('mostrar');	
	$("#buscar").focus();
}
function quitarModalSearch () {

	$("#modalsearch").removeClass('mostrar');
	$("#modalsearch").addClass('no-mostrar');

	$("#cortinasearch").removeClass('mostrar');
	$("#cortinasearch").addClass('no-mostrar');	
	$("#buscar").val("");
	$("#resultados").empty();
}
//----------------------------------
	//funcion para crear buscador

$(document).ready(function() {
	
	url = urlhost+"/search/?search=";
	var value = "";
	$("#buscar").keyup(function() {
		$("#resultados").empty();
		value = "";
		console.log("busqueda");
		value = $("#buscar").val();
		console.log()
		uri = url+value;
		console.log("url"+url);
		txt = "";
		$.getJSON(uri,function(datos){
			txt = "";
			txt = "<ul>";
			$.each(datos.clients, function(i, item){
				console.log(item.name);
				txt+='<li class="no-list" ><a href="/search/notes/?search='+item.id_client+' " class="bottom-space" >'+item.name+" "+item.lastname+'</a></li>';
			});
		$("#resultados").html(txt);
		});
	});
});
function getCortes() {
	 puerto =window.location.port;
	 var urlh;
	if (puerto==80) {
		urlh="http://" + window.location.hostname;
	}else{
		urlh="http://" + window.location.hostname+":"+puerto;
	}
	console.log("!!!!!");
	url=urlhost+"/corte/json/";
	$("#cortes").empty();
	txt="";

	var total = null;
	dia = $("#dia").val();
	uri = url+"?query="+dia;
	console.log("uri="+uri);
	$.getJSON(uri,function(datos){
		$.each(datos.items, function(i, item){
			console.log(item.item+" "+item.mark+" "+item.model+" "+item.price);
			txt += "<tr>";
			txt+= '<td>'+item.item+" "+item.mark+" "+item.model +'</td>';
			txt+= "<td>"+item.details+"</td>";
			txt+='<td style="text-align: right;" >'+item.price+"</td>";
			to = parseInt(item.price);
			console.log(to);
			if (to == NaN) {

			}else{
				total+=to;
			}
		});
		txt+='<tr><td></td><td></td><td style="text-align:right;" >Total: '+total+"</td></tr>"
		$("#cortes").html(txt);
	});
}

function redirectNewNote() {
	window.location=urlhost+"/note/create";
}
function redirect() {
	window.location=urlhost;
}