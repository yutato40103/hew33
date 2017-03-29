<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/iw31/test/classes/Conf.php');

session_destroy();

header("Location:home.php");

exit;

?>