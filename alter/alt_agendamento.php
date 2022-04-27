<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <!-- Page Info -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="refresh" content="3.5; URL='../home/home_administrador.php'" />
  <title>Alteração de Agendamento</title>

  <!-- Icons -->
  <link rel="stylesheet" href="assets/fonts/style.css" />

  <!-- STYLES -->
  <link rel="stylesheet" href="../style/stylealter.css" />

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
      if (empty($_POST['nome']) || empty($_POST['servico']) || empty($_POST['horario_a']) || empty($_POST['dia_a']) || empty($_POST['horario_n']) || empty($_POST['dia_n'])) {
        header('Location: ../alter/alt_agendamento.html');
        exit();
      }

      $servico              = $_POST['servico'];
      $dia_a                = $_POST['dia_a'];
      $horario_a            = $_POST['horario_a'];
      $dia_n               = $_POST['dia_n'];
      $horario_n           = $_POST['horario_n'];
      $nome                 = $_POST['nome'];


      // Buscando o ID do Servico 
      $resultad = mysqli_query($conexao, "SELECT id FROM servico 
 WHERE servico = '{$servico}' AND horario = '{$horario_a}' AND dia = '{$dia_a}'");
      $linhas = mysqli_num_rows($resultad);
      for ($i = 0; $i < $linhas; $i++) {
        $reg = mysqli_fetch_row($resultad);

        // Query de alteração de dia
        $sql = "UPDATE servico SET dia = '$dia_n' WHERE id = '$reg[0]'";
        $resultado = mysqli_query($conexao, $sql);


        // Query de alteração de horario
        $sql1 = "UPDATE servico SET horario = '$horario_n' WHERE id = '$reg[0]'";
        $resultad = mysqli_query($conexao, $sql1);
        echo "Agendamento alterado com sucesso!!";
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