
function agregarCliente() {
 
    let datosCliente = {
        dni: $('#dni').val(),
        nombre: $('#nombre').val(),
        direccion: $('#direccion').val(),
        telefono: $('#telefono').val(),
        email: $('#email').val()
    };
    $.ajax({
        url: '../../Api/clientes/add.php',
        type: 'POST',
        data: datosCliente,
        success: function(response) {
            alert(response);
          
        },
        error: function(error) {
            console.log(error);
        }
    });
}


function actualizarCliente() {
 
    let datosUCliente = {
        dni: $('#dni').val(),
        nombre: $('#nombre').val(),
        direccion: $('#direccion').val(),
        telefono: $('#telefono').val(),
        email: $('#email').val()
    };
    $.ajax({
        url: '../../Api/clientes/edit.php',
        type: 'POST',
        data: datosUCliente,
        success: function(response) {
            console.log(response);
          
        },
        error: function(error) {
            console.log(error);
        }
    });
}



function factura() {
 
    let datosFactura = {
        idPedido: $('#idPedido').val(),
        idProducto: $('#idProducto').val(),
        cantidadPT: $('#cantidadPT').val(),
        total: $('#total').val(),

    };
    $.ajax({
        url: '../../Api/informes/facturar.php',
        type: 'POST',
        data: datosFactura,
        success: function(response) {
            console.log(response);
          
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function agregarMP() {
 
    let datosMP = {
        precio: $('#precio').val(),
        nombre: $('#nombre').val(),
    };
    $.ajax({
        url: '../../Api/stock/mp.php',
        type: 'POST',
        data: datosMP,
        success: function(response) {
            alert(response);
          
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function agregarPedido() {
    let  clienteID = $('#clienteID').val();
    let fechaPedido = $('#fechaPedido').val();


    let fechaFormateada = new Date(fechaPedido);
    let fechaMySQL = fechaFormateada.toISOString().split('T')[0];

    let datosPedido = {
        clienteID: clienteID,
        fechaPedido: fechaMySQL
    };

    $.ajax({
        url: '../../Api/pedidos/adding.php',
        type: 'POST',
        data: datosPedido,
        success: function(response) {
            alert(response);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function agregarPT() {
    let datosPT = {
        idPT: $('#idPT').val(),
        nombre: $('#productoNombre').val()
    };

    $.ajax({
        url: '../../Api/stock/productosterminados.php',
        type: 'POST',
        data: datosPT,
        success: function(response) {
            console.log(response); 
        },
        error: function(error) {
            console.error(error);
        }
    });
}

function agregarStock() {
    let datosStock = {
    idMP: $('#idMP').val(),
        idPT: $('#idPT').val(),
        cantidad: $('#cantidad').val()
    };

    $.ajax({
        url: '../../Api/stock/stock.php',
        type: 'POST',
        data: datosStock,
        success: function(response) {
            console.log(response); 
        },
        error: function(error) {
            console.error(error);
        }
    });
}

function movimientoMP() {
    let idMP = $('#idMP').val();
    let fechaIngreso = $('#fechaIngreso').val();
    let fechaEgreso = $('#fechaEgreso').val();

    // Asegúrate de que las fechas sean válidas y en el formato correcto
    let fechaIngresoFormateada = new Date(fechaIngreso);
    let fechaEgresoFormateada = new Date(fechaEgreso);

    // Formatea las fechas en el formato de MySQL (solo fecha)
    let fechaIngresoMySQL = fechaIngresoFormateada.toISOString().split('T')[0];
    let fechaEgresoMySQL = fechaEgresoFormateada.toISOString().split('T')[0];

    let datosMPM = {
        idMP: idMP,
        fechaIngreso: fechaIngresoMySQL,
        fechaEgreso: fechaEgresoMySQL
    };

    $.ajax({
        url: '../../Api/stock/movimientos.php',
        type: 'POST',
        data: datosMPM,
        success: function(response) {
            console.log(response);
        },
        error: function(error) {
            console.log(error);
        }
    });
}

function movimientoPT() {
    let idProductos = $('#idProductos').val();
    let fechaIngreso = $('#fechaIngreso').val();
    let fechaEgreso = $('#fechaEgreso').val();

  
    let fechaIngresoFormateada = new Date(fechaIngreso);
    let fechaEgresoFormateada = new Date(fechaEgreso);


    let fechaIngresoMySQL = fechaIngresoFormateada.toISOString().split('T')[0];
    let fechaEgresoMySQL = fechaEgresoFormateada.toISOString().split('T')[0];

    let datosPTM = {
        idProductos: idProductos,
        fechaIngreso: fechaIngresoMySQL,
        fechaEgreso: fechaEgresoMySQL
    };

    $.ajax({
        url: '../../Api/stock/movimientoPT.php',
        type: 'POST',
        data: datosPTM,
        success: function(response) {
            console.log(response);
        },
        error: function(error) {
            console.log(error);
        }
    });
}


function getMovimientoPt(){
    $(document).ready(function() {
    
        $.ajax({
            url: '../../Api/informes/movimientoPT.php',
            type: 'GET',
            dataType: 'html',
            success: function(data) {             
                actualizarTabla(data);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
}

function actualizarTabla(datos) {

    var tabla = $('#tabla');

    tabla.empty();
    tabla.append(datos);

}


function getMovimientoMP(){
    $(document).ready(function() {
    
        $.ajax({
            url: '../../Api/informes/movimientomp.php',
            type: 'GET',
            dataType: 'html',
            success: function(data) {             
                actualizarTabla(data);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
}

function getFactura(){
    $(document).ready(function() {
    
        $.ajax({
            url: '../../Api/informes/mostrarFacturas.php',
            type: 'GET',
            dataType: 'html',
            success: function(data) {             
                actualizarTabla(data);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
}

function getstockMp(){
    $(document).ready(function() {
    
        $.ajax({
            url: '../../Api/informes/stock.php',
            type: 'GET',
            dataType: 'html',
            success: function(data) {             
                actualizarTabla(data);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
}
function getstockMp2(){
    $(document).ready(function() {
    
        $.ajax({
            url: '../../Api/informes/stock.php',
            type: 'GET',
            dataType: 'html',
            success: function(data) {             
                actualizarTabla(data);
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
}





