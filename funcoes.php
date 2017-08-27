<?php
  include_once('conexao.php');
  session_start();

  //Verificando qual página vai realizar alguma operação;
  if(isset($_POST['acao'])){
    //Página cadastro passageiros;
    if($_POST['acao'] == 'registerUser'){
      registerUser();
    }
    if($_POST['acao'] == 'searchUser'){
      searchUser();
    }
  }

  function registerUser(){
    $banco = startConnection();

    $nome = $_POST['inpNome'];
    $cpf = $_POST['inpCpf'];
    $sexo = $_POST['inpSexo'];
    $ende = $_POST['inpEnde'];
    $cidade = $_POST['inpCida'];

    //Verificando se todos os campos foram preenchidos;
    if(!empty($nome) && !empty($cpf) && !empty($sexo) && !empty($ende) && !empty($cidade)){

      //Verificação do CPF, para ver se já não está cadastrado;
      $query_busca = "SELECT * FROM tab_pass WHERE cpf = '$cpf'";
      $result_busca = mysqli_query($banco, $query_busca);

      if($result_busca && ($result_busca -> num_rows != 0)){
        $_SESSION['msg'] = "<i>Esse CPF já está cadastrado!</i>";
        header('Location: cadastro_pass.php');
      }else{

        $query = "INSERT INTO tab_pass VALUES(NULL, '$nome', '$cpf', '$sexo', '$ende','$cidade' )";
        $result_set = mysqli_query($banco, $query);

        if(mysqli_insert_id($banco)){
          $_SESSION['msg'] = "<i>Cadastro realizado com sucesso!</i>";
          header('Location: cadastro_pass.php');
        }else{
          $_SESSION['msg'] = "<i>Erro ao realizado com sucesso!</i>";
          header('Location: cadastro_pass.php');
        }
      }
    }else{
      $_SESSION['msg'] = "<i>Todos os campos são obrigatórios!</i>";
      header('Location: cadastro_pass.php');
    }
  }

  function searchUser(){
    require('consulta_pass.php');
    $banco = startConnection();
    @$busca = $_POST['inpBusca'];
    $query = "SELECT * FROM tab_pass WHERE nome LIKE '%$busca%'";
    $result_set = mysqli_query($banco, $query);
    if($result_set && ($result_set-> num_rows != 0)){
      echo "<table border = 1>";
      echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nome</th>";
        echo "<th>CPF</th>";
        echo "<th>Sexo</th>";
        echo "<th>Endereço</th>";
        echo "<th>Cidade</th>";
    echo "</tr>";

      while($passageiro = mysqli_fetch_array($result_set)){
        echo "<tr>";
          echo "<td>".$passageiro['id']."</td>";
          echo "<td>".$passageiro['nome']."</td>";
          echo "<td>".$passageiro['cpf']."</td>";
          echo "<td>".$passageiro['sexo']."</td>";
          echo "<td>".$passageiro['endereco']."</td>";
          echo "<td>".$passageiro['cidade']."</td>";
        echo "</tr>";
      }
    echo "</table>";
    }else{
      $_SESSION['msg'] = "<i><b>Passageiro não encontrado.<b></i>";
      header("Location: consulta_pass.php");
    }
  }

  function registerPlane(){
    
