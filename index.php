<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="./alertify.js-0.3.11/themes/alertify.bootstrap.css">
        <link rel="stylesheet" href="./alertify.js-0.3.11/themes/alertify.core.css">
        <link rel="stylesheet" href="./alertify.js-0.3.11/themes/alertify.default.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
        <script src="./alertify.js-0.3.11/lib/alertify.js"></script>
        <script src="./alertify.js-0.3.11/lib/alertify.min.js"></script>
    </head>
    <body>
        <div style="margin-left: 200px;"><br>
            <h3>Envío de Datos TCP</h3>
            <label>Ip:</label>
            <input type="text" id="ip"></input><br><br>
            <label>Puerto:</label>
            <input type="text" id="port"></input><br><br>
            <label>Nombre y apellido:</label>
            <input type="text" id="nombreApellido"></input><br><br>
            <label>Empresa/Cargo:</label>
            <input type="text" id="empresaCargo"></input><br><br>
            <label>Telefono:</label>
            <input type="text" id="telefono"></input><br><br>
            <label>Mail:</label>
            <input type="text" id="mail"></input><br><br>


            <button id="button" class="btn btn-primary">Enviar</button>
            <button id="btnCarga" class="btn btn-warning">Cargar Datos Preestablecidos</button>
        </div>
        
        <script>
            function notificacion(mensaje){
                
            alertify.success(mensaje);
            return false;
            }
            $('#button').click(
            function() {

                $.ajax({
                    type: "POST",
                    url: "socket.php",
                    data: {ip: $('#ip').val(),
                           port: $('#port').val(),
                           nombreApellido: $('#nombreApellido').val(),
                           empresaCargo: $('#empresaCargo').val(),
                           telefono: $('#telefono').val(),
                           mail: $('#mail').val()}
                }).done(function (msg) {
                    notificacion("Data: " + msg);
                    console.log("Data: " + msg);
                });

            });
            
            $('#btnCarga').click(
            function() {
                $('#ip').val('http://tcp.ngrok.io');
                $('#port').val(8880);
                $('#nombreApellido').val('Emiliano Larrea');
                $('#empresaCargo').val('ProLine - CEO ');
                $('#telefono').val('2644804290');
                $('#mail').val('emiliano18796@gmail.com');

            });</script>
    </body>
</html>
