<?php
    $conx = mysqli_connect("localhost","root","","tricycle_permit_management");
    if(!$conx){
        echo 'Connection Failed';
    }
