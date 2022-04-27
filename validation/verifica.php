<?php
session_start();
if (!$_SESSION['email']) {
    header('Location: home/home_administrador.html');
    exit();
}
