<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <!-- Page Info -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="refresh" content="3.5; URL='../home/home_administrador.php'" />
  <title>Cadastro de Orçamento</title>

  <!-- Icons -->
  <link rel="stylesheet" href="assets/fonts/style.css" />

  <!-- STYLES -->
  <link rel="stylesheet" href="../style/styleorcamento.css" />

  <!-- FONTS -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
</head>

<body>
  <!-- Header -->
  <header id="header">
    <nav class="container">
      <a class="logo" href="../home/home_administrador.html">mecânica<span>baiano</span>.</a>

      <!-- MENU -->
      <div class="menu">
        <ul class="grid">
          <li><a class="title" href="../home/home_administrador.html">Início</a></li>
        </ul>
      </div>
    </nav>
  </header>

  <main>
    <form>
      <?php
      require "../validation/conn.php";
      require "../validation/verifica.php";

      // Verificando se os campos estão vazios
      if (empty($_POST['servico'])  || empty($_POST['dia']) || empty($_POST['cliente_nome']) || empty($_POST['valor'])) {
        header('Location: ../cadastrar/cad_orcamento.html');
        exit();
      }

      $servico         = $_POST['servico'];
      $dia             = $_POST['dia'];
      $cliente_nome    = $_POST['cliente_nome'];
      $valor           = $_POST['valor'];

      // Buscando o CPF do cliente pelo Nome dele
      $resultad  = mysqli_query($conexao, "SELECT cpf FROM cliente WHERE nomeC = '{$cliente_nome}'");
      $linhas = mysqli_num_rows($resultad);
      for ($i = 0; $i < $linhas; $i++) {
        $reg = mysqli_fetch_row($resultad);

        // Buscando o ID do serviçp pelo tipo, horario, dia e nome do cliente 
        $resultado = mysqli_query($conexao, "SELECT id FROM  servico 
             WHERE servico = '{$servico}'  AND dia = '{$dia}' AND Cliente_cpf = '{$reg[0]}'");
        $row = mysqli_num_rows($resultado);
        for ($c = 0; $c < $row; $c++) {
          $regI = mysqli_fetch_row($resultado);


          // Query de Inserção de dados na tabela orçamento
          $sql = "INSERT INTO orcamento(valor, servico_id) VALUES ";
          $sql .= "('$valor','$regI[0]')";
          $resultado = mysqli_query($conexao, $sql);
          echo ("Orçamento cadastrado com sucesso!!");
        }
      }
      ?>
    </form>
  </main>

  <footer class="section">
    <div class="container grid">
      <div class="brand">
        <a class="logo logo-alt" href="#home">mecânica<span>baiano</span>.</a>
        <p>©2022 mecânicaeverton.</p>
        <p>Todos os direitos reservados.</p>
      </div>

      <div class="social grid">
        <a href="https://www.instagram.com/viinivinicin/" target="_blank">
          <i class="icon-instagram"></i>
        </a>
        <a href="https://www.youtube.com/watch?v=0XIqH9DfpIc" target="_blank"><i class="icon-youtube"></i></a>
      </div>
    </div>
  </footer>
</body>

</html>