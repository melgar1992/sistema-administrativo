$(document).ready(function () {
	var base_url = $("#base_url").val();
	$('#tablaProdcutos').DataTable({
		responsive: "true",
		"language": {
			'lengthMenu': "Mostrar _MENU_ registros",
			"zeroRecords": "No se encontraron resultados",
			"info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registro",
			"infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
			"infoFiltered": "(filtrado de un total de _MAX_ registros)",
			"sSearch": "Buscar",
			"oPaginate": {
				"sFirst": "Primero",
				"sLast": "Ultimo",
				"sNext": "Siguiente",
				"sPrevious": "Anterior",

			},
			"sProcesing": "Procesando...",
		}

	});
	$('#comprobantes').on('change', function () {
		option = $(this).val();

		if (option != '') {
			infocomprobante = option.split('*');

			$('#idcomprobante').val(infocomprobante[0]);
			$('#igv').val(infocomprobante[2]);
			$('#serie').val(infocomprobante[3]);
			$('#numero').val(infocomprobante[1]);
			$('#numero_autorizacion').val(infocomprobante[4]);
			$('#nit_ci').val(infocomprobante[5]);
			$('#llave_dosificacion').val(infocomprobante[6]);
			$('#fecha_limite').val(infocomprobante[7]);
		} else {
			$('#idcombrobante').val(null);
			$('#igv').val(null);
			$('#serie').val(null);
			$('#numero').val(null);

		}
		sumar();

	})
	$('#descuento_porcentaje').on('change', function () {
		sumar();

	});
	$(document).on("click", ".btn-check", function () {

		cliente = $(this).val();
		infocliente = cliente.split("*");
		$("#idcliente").val(infocliente[0]);
		$("#cliente").val(infocliente[1]);
		$("#modal-default").modal("hide");
	});
	$(document).on("click", ".btn-check-producto", function () {

		producto = $(this).val();
		$("#btn-agregar").val(producto);
		agregarProducto();
		$("#modal-productos").modal("hide");
	});
	$("#producto").autocomplete({
		source: function (request, response) {
			$.ajax({
				url: base_url + "Movimientos/Ventas/getProductos",
				type: "POST",
				dataType: "json",
				data: {
					valor: request.term
				},
				success: function (data) {
					response(data);
				}
			});
		},
		minLength: 3,
		select: function (event, ui) {
			data = ui.item.id_productos + "*" + ui.item.codigo + "*" + ui.item.label + "*" + ui.item.precio + "*" + ui.item.stock;
			$("#btn-agregar").val(data);
		},
	});
	$("#codigo_producto").autocomplete({
		source: function (request, response) {
			$.ajax({
				url: base_url + "Movimientos/Ventas/getProductosCodigo",
				type: "POST",
				dataType: "json",
				data: {
					valor: request.term
				},
				success: function (data) {
					response(data);
				}
			});
		},
		minLength: 3,
		select: function (event, ui) {
			data = ui.item.id_productos + "*" + ui.item.codigo + "*" + ui.item.label + "*" + ui.item.precio + "*" + ui.item.stock;
			$("#btn-agregar").val(data);
		},
	});
	$("#btn-agregar").on("click", function () {
		data = $(this).val();
		if (data != '') {
			infoproducto = data.split("*");
			html = "<tr>";
			html += "<td><input type='hidden' name= 'idproductos[]' value ='" + infoproducto[0] + "'>" + infoproducto[1] + "</td>";
			html += "<td>" + infoproducto[2] + "</td>";
			html += "<td><input type='hidden' name = 'precios[]' value ='" + infoproducto[3] + "'>" + infoproducto[3] + "</td>";
			html += "<td>" + infoproducto[4] + "</td>";
			html += "<td><input type = 'number' class='cantidades' name = 'cantidades[]' value = '1'></td>";
			html += "<td><input type ='hidden' name = 'importes[]' value ='" + infoproducto[3] + "'><p>" + infoproducto[3] + "</p></td>";
			html += "<td><button type='button' class='btn btn-danger btn-remove-producto'><span class='fa fa-remove'></span></button></td>";
			html += "</tr>";
			$("#tbventas tbody").append(html);
			sumar();
			$("#btn-agregar").val(null);
			$("#producto").val(null);
		} else {
			alert("seleccione un producto");
		}
	});
	$(document).on("click", ".btn-remove-producto", function () {

		$(this).closest("tr").remove();
		sumar();
	});
	$(document).on("change", "#tbventas input.cantidades", function () {


		cantidad = $(this).val();
		precio = $(this).closest("tr").find("td:eq(2)").text();
		importe = cantidad * precio;
		$(this).closest("tr").find("td:eq(5)").children("p").text(importe.toFixed(2));
		$(this).closest("tr").find("td:eq(5)").children("input").val(importe.toFixed(2));
		sumar();
	});
	$(document).on('click', '.btn-view-venta', function () {
		valor_id = $(this).val();
		$.ajax({
			url: base_url + 'Movimientos/Ventas/vista',
			type: 'POST',
			dataType: 'html',
			data: {
				id: valor_id
			},
			success: function (data) {

				$('#modal-default .modal-body').html(data);
			}
		});
	});

	$(document).on('click', '.btn-print', function () {

		$("#modal-default .modal-body").print({
			title: 'Comprobante de venta',
		});
	});

})

function sumar() {
	subtotal = 0;
	porcentaje_descuento = $('#descuento_porcentaje').val();
	$("#tbventas  tbody tr").each(function () {
		subtotal = subtotal + Number($(this).find("td:eq(5)").text());
	});
	$("input[name=subtotal]").val(subtotal.toFixed(2));
	porcentaje_descuento = (porcentaje_descuento / 100);
	$('input[name=descuento]').val((subtotal * porcentaje_descuento).toFixed(2));
	porcentaje = $("#igv").val();
	subtotal = subtotal - (subtotal * porcentaje_descuento);
	descuento = subtotal * porcentaje_descuento;
	total = subtotal - descuento;
	igv = total * (porcentaje / 100);
	$("input[name=igv]").val(igv.toFixed(2));
	$("input[name=total]").val(total.toFixed(2));
}

function generarNumero(numero) {
	if (numero >= 99999 && numero < 999999) {
		return (Number(numero) + 1);
	}
	if (numero >= 9999 && numero < 99999) {
		return '0' + (Number(numero) + 1);
	}
	if (numero >= 999 && numero < 9999) {
		return '00' + (Number(numero) + 1);
	}
	if (numero >= 99 && numero < 999) {
		return '000' + (Number(numero) + 1);
	}
	if (numero >= 9 && numero < 99) {
		return '0000' + (Number(numero) + 1);
	}
	if (numero < 9) {
		return '00000' + (Number(numero) + 1);
	}
}
function agregarProducto() {
	data = $('#btn-agregar').val();
	if (data != '') {
		infoproducto = data.split("*");
		html = "<tr>";
		html += "<td><input type='hidden' name= 'idproductos[]' value ='" + infoproducto[0] + "'>" + infoproducto[1] + "</td>";
		html += "<td>" + infoproducto[2] + "</td>";
		html += "<td><input type='hidden' name = 'precios[]' value ='" + infoproducto[3] + "'>" + infoproducto[3] + "</td>";
		html += "<td>" + infoproducto[4] + "</td>";
		html += "<td><input type = 'number' class='cantidades' name = 'cantidades[]' value = '1'></td>";
		html += "<td><input type ='hidden' name = 'importes[]' value ='" + infoproducto[3] + "'><p>" + infoproducto[3] + "</p></td>";
		html += "<td><button type='button' class='btn btn-danger btn-remove-producto'><span class='fa fa-remove'></span></button></td>";
		html += "</tr>";
		$("#tbventas tbody").append(html);
		sumar();
		$("#btn-agregar").val(null);
		$("#producto").val(null);
	} else {
		alert("seleccione un producto");
	}
}

