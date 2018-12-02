<?php
include "schema.php";

 session_start();

    unset($_SESSION);

    session_destroy();

    header('location: signin.php');
    exit;
   