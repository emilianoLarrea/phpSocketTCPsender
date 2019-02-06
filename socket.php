<?php   
        class TCP_Client {

            function __construct($ip, $port, $mensaje) {

                $socket = socket_create(AF_INET, SOCK_STREAM, 0) or die('Socket Create Error');
                socket_connect($socket, $ip, $port) or die('Error de conexión');
                $data_packet = $this->CreateDataPacket($mensaje);
                foreach ($data_packet as $ele) {
                    $ret = socket_write($socket, $ele);
                    echo $ele;
                }
            }

            function CustomMerge(&$target_array, $target_data) {
                foreach ($target_data as $key => $value) {
                    $target_array[count($target_array)] = chr($value);
                }
            }

            function CreateDataPacket($data) {
                $packet = array();
                $packet[count($packet)] = chr(2); //initialize
                $this->CustomMerge($packet, unpack('C*', strlen($data)));
                $packet[count($packet)] = chr(4); //separator
                $this->CustomMerge($packet, unpack('C*', $data));
                return $packet;
            }

        }
        if(isset($_POST['ip'])&&isset($_POST['port'])&&isset($_POST['nombreApellido'])){
           $ip = $_POST['ip'];
           $p = $_POST['port'];
           $nombreApellido = $_POST['nombreApellido'];
           $empresaCargo = $_POST['empresaCargo'];
           $telefono = $_POST['telefono'];
           $mail = $_POST['mail'];
           
           $zpl = '^XA'.
                  '^CFA,45'.
                  '^FO50,25^FD'.$nombreApellido.'^FS'.
                  '^CFA,30'. 
                  '^FO50,80^FD'.$empresaCargo.'^FS'.
                  '^FO50,120^FD'.$telefono.'^FS'.
                  '^FO50,160^FD'.$mail.'^FS'.
                  '^FO50,110^BY2,2,95^BQ,2,4'.
                  '^FDHM,A'.$nombreApellido.'/'.$empresaCargo.'/'.$telefono.'/'.$mail.'^FS'.
                  '^XZ';

           $obj_client = new TCP_Client($ip,$p,$zpl); 
           echo '-mensaje entregado';
        }else{
            echo '-mensaje no entregado: '.$zpl;
        }

        
        ?>
