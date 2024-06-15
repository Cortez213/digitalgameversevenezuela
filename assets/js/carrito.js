function agregarAlCarrito(descripcion, precio_compra, imagen) {
    $.ajax({
        url: 'agregar_producto.php',
        type: 'POST',
        data: {
            descripcion: descripcion,
            precio_compra: precio_compra,
            imagen: imagen
        },
        success: function(response) {
            // Aquí puedes manejar la respuesta del servidor
        }
    });
}