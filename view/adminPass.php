<?php
session_start();
if (isset($_SESSION['admin'])) {
    require('admin.phtml');
}
else{
    require('formAdmin.php');
}

