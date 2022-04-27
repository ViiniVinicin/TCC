<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <!-- Page Info -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="refresh" content="3.5; URL='../home/home_administrador.php'" />
  <title>Exclusão de Serviços</title>

  <!-- Icons -->
  <link rel="stylesheet" href="assets/fonts/style.css" />

  <!-- STYLES -->
  <link rel="stylesheet" href="../style/styledelete.css" />

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
          <li>
            <a class="title" href="../cadastro/cad_cliente.html">Início</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <main>
    <form>
      <?php

      include "../validation/conn.php";
      // Verificando se os campos estão vazios
      if (empty($_POST['id_agendamento']) || empty($_POST['matricula'])) {
        header('Location: ../delete/del_servicos.html');
        exit();
      }

      $id_agendamento   = $_POST['id_agendamento'];
      $matricula        = $_POST['matricula'];

      $sql = "DELETE FROM servicos WHERE idagendamento = '{$id_agendamento}' AND administrador_matricula = '{$matricula}'";
      $resultado = mysqli_query($conexao, $sql);
      echo ("Serviço excluido com sucesso! ");

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
<!-- main.js -->
<script src="main.js"></script>

</html>