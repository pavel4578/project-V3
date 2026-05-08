<?php

include 'template/db.php';

session_start();

include 'template/head.php';
if (!empty($_SESSION['role'])) {
    $role = ($_SESSION['role']);

    if ($role == 'client') {
        include 'template/navclient.php';
    } if ($role == 'admin') {
        include 'template/navadmin.php'; 
    }
} 
else {
  
    include 'template/nav.php';
}