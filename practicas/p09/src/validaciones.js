document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById("productoForm");
        console.log('js ejecutado')
    form.addEventListener("submit", function(event) {
        let isValid = true;

        // Validar Nombre (Requerido y 100 caracteres o menos)
        const nombre = document.getElementById("nombre").value;
        if (!nombre || nombre.length > 100) {
            alert("El nombre es requerido y debe tener 100 caracteres o menos.");
            isValid = false;
        }

        // Validar Marca (Debe seleccionarse de la lista)
        const marca = document.getElementById("marca").value;
        if (!marca) {
            alert("Debes seleccionar una marca.");
            isValid = false;
        }

        // Validar Modelo (Requerido, alfanumérico, 25 caracteres o menos)
        const modelo = document.getElementById("modelo").value;
        const modeloRegex = /^[a-zA-Z0-9]+$/;
        if (!modelo || modelo.length > 25 || !modeloRegex.test(modelo)) {
            alert("El modelo es requerido, debe ser alfanumérico y tener 25 caracteres o menos.");
            isValid = false;
        }

        // Validar Precio (Requerido y mayor a 99.99)
        const precio = parseFloat(document.getElementById("precio").value);
        if (isNaN(precio) || precio <= 99.99) {
            alert("El precio es requerido y debe ser mayor a 99.99.");
            isValid = false;
        }

        // Validar Detalles (Opcional, 250 caracteres o menos)
        const detalles = document.getElementById("detalles").value;
        if (detalles.length > 250) {
            alert("Los detalles deben tener 250 caracteres o menos.");
            isValid = false;
        }

        // Validar Unidades (Requerido y mayor o igual a 0)
        const unidades = parseInt(document.getElementById("unidades").value);
        if (isNaN(unidades) || unidades < 0) {
            alert("Las unidades son requeridas y deben ser mayores o iguales a 0.");
            isValid = false;
        }

        // Validar Imagen (Opcional, usar imagen por defecto si no se proporciona)
        const imagenes = document.getElementById("imagenes").value;
        if (!imagenes) {
            document.getElementById("imagenes").value = "../img/imagen1.jpg"; // Ruta de imagen por defecto
        }

        // Evitar el envío del formulario si hay errores
        if (!isValid) {
            event.preventDefault();
        }
    });
});
