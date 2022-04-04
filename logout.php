<?php 
require_once('php_action/core.php');
// remove all sessions

session_unset();
// destroy the session
session_destroy();
header('location:./jasnel.xp3.biz/index.php');
?>