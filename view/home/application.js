$( "#btn_login" ).click(function() {
  $.ajax({
			data: {user:$("#txt_user").val(), password:$("#txt_pass").val()},
			type: "POST",
			url: "http://localhost/COCOMO/post/user/login",
		})
	 .done(function( data, textStatus, jqXHR ) {
	 		cocomo.setSession("user", data);
	 		if (cocomo.getSession("user").status == "error") {
	 			$("#lbl_error").removeClass("hide");
	 			console.log(cocomo.getSession("user").data);
	 		}else{
	 			$("#lbl_error").addClass("hide");
	 			location.href = cocomo.path + "profile";
	 		}	 			
	 })
	  .fail(function( jqXHR, textStatus, errorThrown ) {
		    console.log(errorThrown);
	});
});

if (cocomo.isHere("profile")) {
	var user = cocomo.getSession("user").data[0];
	$("#lbl_name").text(user[1]);
	$("#lbl_alias").text(user[6]);
	$("#link_alias").attr("href", "https://twitter.com/" + user[6].replace("@", ""));
	$("#lbl_city").text(user[7]);
	$("#lbl_phone").text(user[5]);
	$("#lbl_email").text(user[2]);
	$("#link_email").attr("href", "mailto:" + user[2]);
	$("#img_avatar").attr("src", user[4]);

	obtenerMisImagenes();

	var objUpload = $("#fileuploader").uploadFile({
		multiple : false,
		autoSubmit : false,
		url : "http://localhost/COCOMO/post/user/subirImagen",
		allowedTypes : "png,jpg,gif",
		fileName : "file", /* Se debe llamar file */
		formData: {userId:cocomo.getSession("user").data[0][0]},
		onSuccess:function(files,data,xhr,pd)
		{
			obtenerMisImagenes();
		}
	});
}

var tamanio = function (num) {
	num = (num / 1024).toFixed()
	str = "";
	if (num < 1024) {
		str = " KiloBytes"
	}else if(num >= 1024){
		str = " MegaBytes"
		num = (num / 1024).toFixed(1)
	}
	return num + str;
}

function obtenerMisImagenes() {
	 $.ajax({
		data: {id:cocomo.getSession("user").data[0][0]},
		type: "POST",
		url: "http://localhost/COCOMO/post/user/obtenerMisImagenes",
		})
	 .done(function( data, textStatus, jqXHR ) {
 		data = jQuery.parseJSON(data)['data'];
 		var lon = data.length;
 		var template = "";
 		for (var i = 0; i < lon; i++) {
 			template += "<tr>";
 			
 			template += "<td><b>"+data[i][0]+"</b></td>";
 			template += "<td>"+data[i][1]+"</td>"; 			
 			template += "<td>"+tamanio(data[i][2])+"</td>";
 			template += "<td>"+data[i][3]+"</td>"; 
 			template += "<td>"+data[i][4]+"</td>"; 
 			template += "<td><span id='"+data[i][0]+"' onclick='ver_image(this)' class='label label-default pointer' title='Ver'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span></span>"
						+"&nbsp;<span id='"+data[i][0]+"' onclick='modal_editar(this)' class='label label-default pointer' title='Cambiar nombre'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></span>"
						+"&nbsp;<span id='"+data[i][0]+"' onclick='eliminar_image(this)' class='label label-danger pointer' title='Eliminar'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></span></td>";

 			template += "</tr>";
		}
		$("#tbl_images").html(template);	
	 })
	  .fail(function( jqXHR, textStatus, errorThrown ) {
	    console.log(errorThrown);
	});
}

function ver_image(obj) {
	var name = $("#"+obj.id)[0].parentNode.parentNode.childNodes[1].innerHTML;
	$("#img_ver").attr("src", cocomo.host+"/COCOMO/image/uploads/"+name);
	$("#title_ver").text(name);
	$("#modalVer").modal();
}

function modal_editar(obj) {
	var name = $("#"+obj.id)[0].parentNode.parentNode.childNodes[1].innerHTML;
	$("#txt_editar_nombre").val(name);
	$("#txt_editar_nombre").attr("image", $("#"+obj.id)[0].parentNode.parentNode.childNodes[0].innerText)
	$("#txt_editar_nombre").attr("last", $("#"+obj.id)[0].parentNode.parentNode.childNodes[1].innerText)
	$("#modalEditar").modal();
}

function guardar_editado() {
	$.ajax({
			data: {nombre:$("#txt_editar_nombre").val(), id:$("#txt_editar_nombre").attr("image"), last: $("#txt_editar_nombre").attr("last")},
			type: "POST",
			url: "http://localhost/COCOMO/post/user/editarImagen"
		})
	 .done(function( data, textStatus, jqXHR ) {
	 	console.log(data)
	 	obtenerMisImagenes();
	 })
	  .fail(function( jqXHR, textStatus, errorThrown ) {
		    console.log(errorThrown);
	});
}