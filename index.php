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
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    </head>
    <body>
        <div style="margin-left: 200px;"><br>
            <label>Ip:</label>
            <input type="text" id="ip"></input><br><br>
            <label>Puerto:</label>
            <input type="text" id="port"></input><br><br>
            <label>Mensaje:</label>
            <input type="text" id="mensajeEnviar"></input><br><br>
            <button id="button" class="btn btn-primary">Enviar</button>
        </div>
        <script>
            $('#button').click(
            function() {

                $.ajax({
                    type: "POST",
                    url: "socket.php",
                    data: {ip: $('#ip').val(),
                           port: $('#port').val(),
                           mensaje: $('#mensajeEnviar').val()}
                }).done(function (msg) {
                    alert("Data: " + msg);
                });

            });</script>
    </body>
</html>
