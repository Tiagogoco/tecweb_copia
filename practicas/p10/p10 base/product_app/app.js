// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
};

// FUNCIÓN CALLBACK DE BOTÓN "Buscar"
function buscarProducto(e) {
    e.preventDefault();

    // SE OBTIENE EL TEXTO A BUSCAR
    var busqueda = document.getElementById('busqueda').value;

    // SE CREA EL OBJETO DE CONEXIÓN ASÍNCRONA AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/read.php', true);
    client.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    client.onreadystatechange = function () {
        // SE VERIFICA SI LA RESPUESTA ESTÁ LISTA Y FUE SATISFACTORIA
        if (client.readyState == 4 && client.status == 200) {
            console.log('[CLIENTE]\n'+client.responseText);

            // SE OBTIENE EL OBJETO DE DATOS A PARTIR DE UN STRING JSON
            let productos = JSON.parse(client.responseText);

            // SE VERIFICA SI EL OBJETO JSON TIENE DATOS
            if (productos.length > 0) {
                let template = '';

                // RECORRER CADA PRODUCTO Y CREAR UNA FILA EN LA TABLA
                productos.forEach(producto => {
                    let descripcion = '';
                    descripcion += '<li>precio: ' + producto.precio + '</li>';
                    descripcion += '<li>unidades: ' + producto.unidades + '</li>';
                    descripcion += '<li>modelo: ' + producto.modelo + '</li>';
                    descripcion += '<li>marca: ' + producto.marca + '</li>';
                    descripcion += '<li>detalles: ' + producto.detalles + '</li>';

                    // CREAR UNA FILA PARA CADA PRODUCTO
                    template += `
                        <tr>
                            <td>${producto.id}</td>
                            <td>${producto.nombre}</td>
                            <td><ul>${descripcion}</ul></td>
                        </tr>
                    `;
                });

                // SE INSERTA LA PLANTILLA EN EL ELEMENTO CON ID "productos"
                document.getElementById("productos").innerHTML = template;
            } else {
                // SI NO HAY RESULTADOS, MOSTRAR UN MENSAJE
                document.getElementById("productos").innerHTML = "<tr><td colspan='3'>No se encontraron productos.</td></tr>";
            }
        }
    };

    client.send("search=" + encodeURIComponent(busqueda));
}

// FUNCIÓN CALLBACK DE BOTÓN "Agregar Producto"
function agregarProducto(e) {
    e.preventDefault();

    // Validaciones
    const nombre = document.getElementById('name').value.trim();
    const finalJSON = JSON.parse(document.getElementById('description').value.trim());
    const marca = finalJSON['marca'];
    const modelo = finalJSON['modelo'];
    const precio = parseFloat(finalJSON['precio']);
    const unidades = parseInt(finalJSON['unidades']);
    const detalles = finalJSON['detalles'] || '';

    // Validación de campos
    if (!nombre || nombre.length > 100) {
        alert('El nombre es requerido y debe tener 100 caracteres o menos.');
        return;
    }

    if (!marca) {
        alert('La marca es requerida y debe seleccionarse de una lista de opciones.');
        return;
    }

    const alfanumericoRegex = /^[a-zA-Z0-9]+$/;
    if (!modelo || modelo.length > 25 || !alfanumericoRegex.test(modelo)) {
        alert('El modelo es requerido, debe ser alfanumérico y tener 25 caracteres o menos.');
        return;
    }

    if (isNaN(precio) || precio <= 99.99) {
        alert('El precio es requerido y debe ser mayor a 99.99.');
        return;
    }

    if (detalles.length > 250) {
        alert('Los detalles deben tener 250 caracteres o menos.');
        return;
    }

    if (isNaN(unidades) || unidades < 0) {
        alert('Las unidades son requeridas y deben ser mayor o igual a 0.');
        return;
    }

    // SE AGREGA AL JSON EL NOMBRE DEL PRODUCTO
    finalJSON['nombre'] = nombre;

    // SE ENVÍA EL OBJETO FINAL AL SERVIDOR
    var client = getXMLHttpRequest();
    client.open('POST', './backend/create.php', true);
    client.setRequestHeader('Content-Type', "application/json;charset=UTF-8");
    client.onreadystatechange = function () {
        if (client.readyState == 4 && client.status == 200) {
            console.log(client.responseText);
            alert('Producto agregado correctamente.');
        }
    };
    client.send(JSON.stringify(finalJSON, null, 2));
}

// SE CREA EL OBJETO DE CONEXIÓN COMPATIBLE CON EL NAVEGADOR
function getXMLHttpRequest() {
    var objetoAjax;

    try {
        objetoAjax = new XMLHttpRequest();
    } catch (err1) {
        try {
            objetoAjax = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (err2) {
            try {
                objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (err3) {
                objetoAjax = false;
            }
        }
    }
    return objetoAjax;
}

// FUNCIÓN PARA INICIALIZAR EL FORMULARIO CON EL JSON BASE
function init() {
    var JsonString = JSON.stringify(baseJSON, null, 2);
    document.getElementById("description").value = JsonString;
}
