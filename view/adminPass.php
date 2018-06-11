<?php
session_start();
if (isset($_SESSION['admin'])) {
    require('admin.php');
}
else{
    require('formAdmin.php');
}

