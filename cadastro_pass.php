<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Gato a Jato</title>
  </head>
  <body>
    <h1>Cadastro de Passageiros</h1>
    <?php
      if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
    ?>
    <p></p>
    <form method="POST" action="funcoes.php">
      <table>
        <tr>
          <td>Nome</td>
          <td><input type = "text" name="inpNome"></td>
        </tr>

        <tr>
          <td>CPF</td>
          <td><input type = "text" name="inpCpf"></td>
        </tr>

        <tr>
          <td>Sexo</td>
          <td>
            <input type = "radio" name="inpSexo" value="M">Masculino
            <input type="radio" name="inpSexo" value="F">Feminino
          </td>
        </tr>

        <tr>
          <td>Endereço</td>
          <td><input type = "text" name="inpEnde"></td>
        </tr>

        <tr>
          <td>Cidade</td>
          <td><input type = "text" name="inpCida"></td>
        </tr>

        <tr>
          <td><input type="hidden" name="acao" value="registerUser"></td>
          <td><input type="submit" value="Concluir Cadastro"></td>
        </tr>

      </table>
    </form>
    <p></p>
    <a href="index.php">Retornar a Página Principal</a>
  </body>
</html>
