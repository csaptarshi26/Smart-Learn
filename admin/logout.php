<?php
session_start();
if(session_destroy())
{
	sleep(1);
header("Location: index.php");
}
?>
