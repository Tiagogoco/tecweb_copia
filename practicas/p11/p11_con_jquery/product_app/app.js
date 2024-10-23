// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;

    // SE LISTAN TODOS LOS PRODUCTOS
    listarProductos();
}

function listarProductos() {
    $.ajax({
        url: './backend/product-list.php',
        type: 'GET',
        contentType: 'application/x-www-form-urlencoded',
        success: function (response) {
            let productos = JSON.parse(response);
            if (Object.keys(productos).length > 0) {
                let template = '';
                productos.forEach(function (producto) {
                    let descripcion = `
                        <li>precio: ${producto.precio}</li>
                        <li>unidades: ${producto.unidades}</li>
                        <li>modelo: ${producto.modelo}</li>
                        <li>marca: ${producto.marca}</li>
                        <li>detalles: ${producto.detalles}</li>
                    `;
                    template += `
                        <tr productId="${producto.id}">
                            <td>${producto.id}</td>
                            <td>${producto.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                            <td>
                                <button class="product-delete btn btn-danger">Eliminar</button>
                            </td>
                        </tr>
                    `;
                });
                $("#products").html(template);
            }
        }
    });
}

function agregarProducto(e) {
    e.preventDefault();

    let productoJsonString = $("#description").val();
    let finalJSON = JSON.parse(productoJsonString);
    finalJSON['nombre'] = $("#name").val();
    productoJsonString = JSON.stringify(finalJSON, null, 2);

    $.ajax({
        url: './backend/product-add.php',
        type: 'POST',
        data: productoJsonString,
        contentType: 'application/json;charset=UTF-8',
        success: function (response) {
            let respuesta = JSON.parse(response);
            let template_bar = `
                <li style="list-style: none;">status: ${respuesta.status}</li>
                <li style="list-style: none;">message: ${respuesta.message}</li>
            `;
            $("#product-result").addClass("d-block").find("#container").html(template_bar);
            listarProductos();
        }
    });
}

function eliminarProducto() {
    if (confirm("De verdad deseas eliminar el Producto")) {
        let id = $(event.target).closest('tr').attr("productId");

        $.ajax({
            url: './backend/product-delete.php?id=' + id,
            type: 'GET',
            contentType: 'application/x-www-form-urlencoded',
            success: function (response) {
                let respuesta = JSON.parse(response);
                let template_bar = `
                    <li style="list-style: none;">status: ${respuesta.status}</li>
                    <li style="list-style: none;">message: ${respuesta.message}</li>
                `;
                $("#product-result").addClass("d-block").find("#container").html(template_bar);
                listarProductos();
            }
        });
    }
}

function buscarProducto(e) {
    e.preventDefault();

    let search = $("#search").val();

    $.ajax({
        url: './backend/product-search.php?search=' + search,
        type: 'GET',
        contentType: 'application/x-www-form-urlencoded',
        success: function (response) {
            let productos = JSON.parse(response);
            if (Object.keys(productos).length > 0) {
                let template = '';
                let template_bar = '';
                productos.forEach(function (producto) {
                    let descripcion = `
                        <li>precio: ${producto.precio}</li>
                        <li>unidades: ${producto.unidades}</li>
                        <li>modelo: ${producto.modelo}</li>
                        <li>marca: ${producto.marca}</li>
                        <li>detalles: ${producto.detalles}</li>
                    `;
                    template += `
                        <tr productId="${producto.id}">
                            <td>${producto.id}</td>
                            <td>${producto.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                            <td>
                                <button class="product-delete btn btn-danger">Eliminar</button>
                            </td>
                        </tr>
                    `;
                    template_bar += `<li>${producto.nombre}</li>`;
                });
                $("#product-result").addClass("d-block").find("#container").html(template_bar);
                $("#products").html(template);
            }
        }
    });
}
