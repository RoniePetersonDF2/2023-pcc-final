<?php 

@session_start();
@session_destroy();
echo "<script language='javascript'>window.alert('logout realizado com sucesso!!'); </script>";
echo "<script language='javascript'>window.location='index.php'; </script>";
 ?>