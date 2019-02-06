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
        if(isset($_POST['ip'])&&isset($_POST['port'])&&isset($_POST['mensaje'])){
           $ip = $_POST['ip'];
           $p = $_POST['port'];
           $m = $_POST['mensaje'];
           $obj_client = new TCP_Client($ip,$p,$m); 
           echo '-mensaje entregado';
        }else{
            echo '-mensaje no entregado';
        }

        
        ?>
