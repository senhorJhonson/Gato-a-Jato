<?php
  include_once('funcoes.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Gato a Jato</title>
  </head>
  <body>
    <h1>Busca de Passageiros</h1>
    <form method="POST" action="funcoes.php">
      <input type="text" name="inpBusca" placeholder="Nome do Passageiro">
      <input type="hidden" name="acao" value="searchUser">
      <input type="submit" value="Consultar">
    </form>
    <p></p>
    <?php
      if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
    ?>
    <p><a href="index.php">Retornar para a Página Incial</a></p>

  </body>
</html>
