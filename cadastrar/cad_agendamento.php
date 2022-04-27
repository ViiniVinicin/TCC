<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <!-- Page Info -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="refresh" content="3.5; URL='../home/home_administrador.php'" />
  <title>Cadastro de Agendamento</title>

  <!-- Icons -->
  <link rel="stylesheet" href="assets/fonts/style.css" />

  <!-- STYLES -->
  <link rel="stylesheet" href="../style/styleagendamento.css" />

  <!-- FONTS -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
</head>

<body>
  <!-- Header -->
  <header id="header">
    <nav class="container">
      <a class="logo" href="h../ome/home_administrador.html">mecânica<span>baiano</span>.</a>

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
      if (empty($_POST['servico']) || empty($_POST['dia']) || empty($_POST['horario']) || empty($_POST['nome'])) {
        header('Location: ../cadastrar/cad_agendamento.html');
        exit();
      }

      $servico            = $_POST['servico'];
      $dia                = $_POST['dia'];
      $horario            = $_POST['horario'];
      $nome               = $_POST['nome'];

      // Buscando o CPF do cliente pelo Nome dele
      $resultad = mysqli_query($conexao, "SELECT cpf FROM cliente WHERE nomeC = '{$nome}'");
      $linhas = mysqli_num_rows($resultad);
      for ($i = 0; $i < $linhas; $i++) {
        $reg = mysqli_fetch_row($resultad);

        // Query para usar os dados da sessão e encontrar a matrícula do usuario
        $resultadoN = mysqli_query($conexao, "SELECT matricula FROM usuario WHERE email = '{$_SESSION['email']}' AND senha = '{$_SESSION['senha']}'");
        $linhasM = mysqli_num_rows($resultadoN);
        for ($m = 0; $m < $linhasM; $m++) {
          $matricula = mysqli_fetch_row($resultadoN);
        }

        // Query de inserção de dados no banco
        $sql = "INSERT INTO servico(servico,horario,dia, cliente_cpf, usuario_matricula) VALUES ";
        $sql .= "('$servico','$horario','$dia', '$reg[0]', '$matricula[0]')";
        $resultado = mysqli_query($conexao, $sql);
        echo "Agendamento cadastrado com sucesso!!";
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
        <a href="https://api.whatsapp.com/send?phone=+5561993398630&text=Oi! Gostaria de agendar um horário" target="_blank"><i class="icon-whatsapp"></i></a>
      </div>
    </div>
  </footer>

</body>

</html>