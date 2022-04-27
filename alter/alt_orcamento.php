<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <!-- Page Info -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="refresh" content="3.5; URL='../home/home_administrador.php'" />
  <title>Alterar Orçamento</title>

  <!-- Icons -->
  <link rel="stylesheet" href="assets/fonts/style.css" />

  <!-- STYLES -->
  <link rel="stylesheet" href="../style/stylealter.css" />
  <<link rel="stylesheet" href="estilocss.css">

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
      include "../validation/conn.php";

      // Verificando se os campos estão vazios
      if (empty($_POST['servico']) || empty($_POST['horario']) || empty($_POST['dia']) || empty($_POST['cliente_nome']) || empty($_POST['valor']) || empty($_POST['valor_n'])) {
        header('Location: ../alter/alt_orcamento.html');
        exit();
      }

      $servico         = $_POST['servico'];
      $horario         = $_POST['horario'];
      $dia             = $_POST['dia'];
      $cliente_nome    = $_POST['cliente_nome'];
      $valor           = $_POST['valor'];
      $valor_n         = $_POST['valor_n'];

      // Buscando o ID do servico
      $resultad  = mysqli_query($conexao, "SELECT id FROM servico where horario = '$horario' and dia = '$dia' and servico = '$servico'");
      $linhas = mysqli_num_rows($resultad);
      for ($i = 0; $i < $linhas; $i++) {
        $reg = mysqli_fetch_row($resultad);

        // Buscando o iD do orçamento
        $resultado1 = mysqli_query($conexao, "SELECT orcamento.id FROM orcamento
WHERE valor = '$valor' and servico_id = '{$reg[0]}'");
        $row = mysqli_num_rows($resultado1);
        for ($c = 0; $c < $row; $c++) {
          $regI = mysqli_fetch_row($resultado1);

          // Atualização do valor na tabela orçamento
          $sql = "UPDATE orcamento SET valor = '$valor_n' WHERE id = '{$regI[0]}' and servico_id = '{$reg[0]}'";
          $resultado1 = mysqli_query($conexao, $sql);
          echo ("Valor do orçamento alterado com sucesso!!");
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