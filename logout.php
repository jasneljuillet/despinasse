<?php 
require_once('php_action/core.php');
// remove all sessions

session_unset();
// destroy the session
session_destroy();
header('location:http://127.0.0.1/systeme_beaudyne/');
?>