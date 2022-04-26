<?php
session_start();
if(!$_SESSION['email']){
    header('Location: home_administrador.html');
    exit();
}