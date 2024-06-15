<?php
    $server = '127.0.0.1:3306';//localhost:3306
    $username = 'root';
    $password = '';
    $namadb = 'newdb';

   $k = new mysqli($server, $username, $password, $namadb);
   if($k->connect_errno)
   {
        echo "failed ", $k->connect_error;
        exit();
   }
   