<?php

  function startConnection(){
    $strcon = mysqli_connect('localhost','root','','dbgatoajato') or die('Erro
      tentar realizar a conexão.');
    return $strcon;
  }

?>
