<?php
session_start();
session_destroy();

header('location:ret.html');
?>