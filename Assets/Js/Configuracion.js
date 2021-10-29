$(document).ready(function () {
	//Crear usuario
	$("#btn-crear-usuario").click(function () {
		let Datos = $("#form-crear-usuario").serializeArray();

		let email = Validacion_email($("#txt-email-usuario").val());

		if (!email) {
			swal.fire({
				icon: "error",
				title: "Oppsss!",
				text: "Ingrese un email valido",
			});
			return false;
		} else {
			//Validamos campos vacios
			var check = Validacion_campos(Datos);

			//validar campos
			if (check == 0) {
				$.ajax({
					type: "POST",
					url: "Configuracion_ctr/Crear_usuario",
					data: Datos,
					beforeSend: function () {
						$(".back").css("display", "flex");
					},
					success: function (msg) {
						$(".back").css("display", "none");
						//console.log(msg);
						if (msg == 1) {
							swal
								.fire({
									icon: "success",
									title: "Excelente!",
									text: "El usuario ha sido creado con exito",
								})
								.then(function () {
									location.reload();
								});
						} else if (msg == 0) {
							swal
								.fire({
									icon: "error",
									title: "Oppsss!",
									text: "El usuario no pudo ser creada",
								})
								.then(function () {
									location.reload();
								});
						} else {
							swal
								.fire({
									icon: "error",
									title: "Oppsss!",
									html:
										"Algo salio mal contactese con el administrador error: <br><b>" +
										msg +
										"</b>",
								})
								.then(function () {
									location.reload();
								});
						}
					},
				});
			} else {
				swal.fire({
					icon: "warning",
					title: "Atencion!",
					text: "Todos los campos son obligatorios",
				});
			}
		}
	});

	//Validamos si existe la tabla para cargar los datos
	if ($("body").find("#tbl-usuarios").length > 0) {
		//Crear tabla de los usuarios
		$.ajax({
			type: "POST",
			url: "Configuracion_ctr/Ver_usuarios",
			dataType: "JSON",
			beforeSend: function () {
				$(".back").css("display", "flex");
			},
			success: function (msg) {
				$(".back").css("display", "none");

				let tr = "";
				let Estado = "";
				//Validamos que el arreglo no este vacio
				if (Object.entries(msg).length > 0) {
					tr += "<tbody>";
					//recorremos el arreglo
					$.each(msg, function (i, item) {
						if (msg[i].Usu_estado == "ACTIVO") {
							Estado =
								'<span style="color:green;"><i class="bi bi-check2-circle"></i></span>';
						} else if (msg[i].Usu_estado == "INACTIVO") {
							Estado =
								'<span style="color:red;"><i class="bi bi-x-circle"></i></span>';
						} else {
						}
						tr +=
							'<tr><td> <div class="form-check" > ' +
							'<div class="checkbox tbl-usuarios" >' +
							'<input type = "checkbox" id="' +
							msg[i].Usu_Id +
							'" class="form-check-input">' +
							"</div></div></td> ";
						tr +=
							"<td>" +
							msg[i].Usu_email +
							"</td><td>" +
							msg[i].Usu_nombres +
							"</td><td>" +
							msg[i].Usu_apellido +
							"</td><td>" +
							msg[i].Usu_rol_usuario +
							"</td><td>" +
							Estado +
							"</td>";

						tr += "</tr>";
					});
					tr += "</tbody>";
					$("#tbl-usuarios").append(tr);

					//Crear datatable
					$("#tbl-usuarios").DataTable({
						pageLength: 5,
						lengthMenu: [
							[5, 10, 25, 50, -1],
							[5, 10, 25, 50, "Todo"],
						],
						language: {
							url: "../Assets/Js/Spanish.json",
						},
					});
				} else {
					//console.log('No pasa nada');
				}
			},
		});
	}

	//Obtener id seleccionado para editar las opciones del menu
	$("#btn-eliminar").click(function () {
		let count = 0;
		let Id = "";

		//Recorremos la tabla para obtener el id del checkbox seleccionado para editar
		$("#tbl-usuarios tbody input:checkbox:checked").each(function () {
			count++;
			Id += $(this).attr("Id");
		});

		if (count == 0) {
			swal.fire({
				icon: "warning",
				title: "Atencion!",
				text: "Para eliminar un usuario tiene que seleccionar una fila",
			});
		} else if (count > 1) {
			swal.fire({
				icon: "warning",
				title: "Atencion!",
				text: "Solo es permitido seleccionar una fila",
			});
		} else {
			$.ajax({
				type: "POST",
				url: "Configuracion_ctr/Eliminar_usuario",
				data: { Id: Id },
				dataType: "JSON",
				beforSend: function () {
					$(".back").css("display", "flex");
				},
				success: function (msg) {
					$(".back").css("display", "none");

					if (msg == 1) {
						swal
							.fire({
								icon: "success",
								title: "Excelente!",
								text: "El usuario a sido eliminado con exito",
							})
							.then(function () {
								location.reload();
							});
					} else {
						swal
							.fire({
								icon: "danger",
								title: "Uppsss!",
								text: "El usuario no a sido eliminado",
							})
							.then(function () {
								location.reload();
							});
					}
				},
			});
		}
	});

	//Obtener id seleccionado para editar las opciones del menu
	$("#btn-select-usuario").click(function () {
		let count = 0;
		let Id = "";

		//Recorremos la tabla para obtener el id del checkbox seleccionado para editar
		$("#tbl-usuarios tbody input:checkbox:checked").each(function () {
			count++;
			Id += $(this).attr("Id");
		});

		if (count == 0) {
			swal.fire({
				icon: "warning",
				title: "Atencion!",
				text: "Para editar un usuario tiene que seleccionar una fila",
			});
		} else if (count > 1) {
			swal.fire({
				icon: "warning",
				title: "Atencion!",
				text: "Solo es permitido seleccionar una fila",
			});
		} else {
			$.ajax({
				type: "POST",
				url: "Configuracion_ctr/Cargar_usuario",
				data: { Id: Id },
				dataType: "JSON",
				beforSend: function () {
					$(".back").css("display", "flex");
				},
				success: function (msg) {
					$(".back").css("display", "none");

					//Validamos que el arreglo no este vacio
					if (Object.entries(msg).length > 0) {
						//recorremos el arreglo
						$.each(msg, function (i, item) {
							$("#editar-txt-id-usuario").val(msg[i].Usu_Id);
							$("#editar-txt-email-usuario").val(msg[i].Usu_email);
							$("#editar-txt-nombre-usuario").val(msg[i].Usu_nombres);
							$("#editar-txt-apellido-usuario").val(msg[i].Usu_apellido);

							if (msg[i].Usu_estado == "INACTIVO") {
								$("#editar-chk-estado-usuario").prop("checked", false);
							} else if (msg[i].Usu_estado == "ACTIVO") {
								$("#editar-chk-estado-usuario").prop("checked", true);
							} else {
								$("#editar-chk-estado-usuario").prop("disabled ", true);
							}
						});

						var myModal = new bootstrap.Modal(
							document.getElementById("editar-usuario")
						);
						myModal.show();
					} else {
						//console.log('Datos estan vacios, parametro enviado: ' + Id);
					}
				},
			});
		}
	});

	//Actualizar registro del menu de opciones
	$("#btn-editar-usuario").click(function () {
		let Datos = $("#form-editar-usuario").serializeArray();

		//Validamos campos vacios
		var check = Validacion_campos(Datos);
		let Estado = $("#editar-chk-estado-opcion").is(":checked") ? 1 : 0;

		Datos.push({ name: "editar-estado", value: Estado });

		if (check == 0) {
			$.ajax({
				type: "POST",
				url: "Configuracion_ctr/Editar_usuario",
				data: Datos,
				beforeSend: function () {
					$(".back").css("display", "flex");
				},
				success: function (msg) {
					$(".back").css("display", "none");
					//console.log(msg);
					if (msg == 1) {
						swal
							.fire({
								icon: "success",
								title: "Excelente!",
								text: "El usuario ha sido editado con exito",
							})
							.then(function () {
								location.reload();
							});
					} else if (msg == 0) {
						swal
							.fire({
								icon: "warning",
								title: "Oppsss!",
								text: "El usuario no tuvo cambios a realizar",
							})
							.then(function () {
								location.reload();
							});
					} else {
						swal
							.fire({
								icon: "error",
								title: "Oppsss!",
								html:
									"Algo salio mal contactese con el administrador error: <br><b>" +
									msg +
									"</b>",
							})
							.then(function () {
								location.reload();
							});
					}
				},
			});
		} else {
			swal.fire({
				icon: "warning",
				title: "Ooppss!",
				text: "Hay campos que se encuentran vacios",
			});
		}
	});
});

//Función para comprobar los campos de texto de un formulario
function Validacion_campos(obj) {
	let count = 0;
	//recorremos el arreglo
	$.each(obj, function (i, item) {
		if (
			$("#" + obj[i].name + "")
				.val()
				.trim().length <= 0
		) {
			count++;
		} else {
		}
	});

	return count;
}

function Validacion_email(email) {
	var validar = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	return validar.test(email);
}
