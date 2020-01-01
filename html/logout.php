<?php
session_start();
session_destroy();
echo "<script>javascript:alert('Session Destroyed');</script>";
header('Location: login.php');