<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <!-- Page Info -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="refresh" content="3.5; URL='../home/home_administrador.php'" />
  <title>Cadastro de Cliente</title>

  <!-- Icons -->
  <link rel="stylesheet" href="assets/fonts/style.css" />

  <!-- STYLES -->
  <link rel="stylesheet" href="../style/stylecad.css" />

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
      if (empty($_POST['cpf']) || empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['telefone']) || empty($_POST['endereco'])) {
        header('Location: ../cadastro/cad_cliente.html');
        exit();
      }

      $cpf       = $_POST['cpf'];
      $nome      = $_POST['nome'];
      $email     = $_POST['email'];
      $telefone  = $_POST['telefone'];
      $endereco  = $_POST['endereco'];

      // Query para usar os dados da sessão e encontrar a matrícula do usuario
      $resultadoN = mysqli_query($conexao, "SELECT matricula FROM usuario WHERE email = '{$_SESSION['email']}' AND senha = '{$_SESSION['senha']}'");
      $linhasM = mysqli_num_rows($resultadoN);
      for ($m = 0; $m < $linhasM; $m++) {
        $matricula = mysqli_fetch_row($resultadoN);
      }

      // Query de inserçao de cliente no banco de dados
      $sql = "INSERT INTO cliente (cpf, nomeC, emailC, enderecoC,  telefoneC, matricula) VALUES ";
      $sql .= "('$cpf','$nome','$email','$telefone','$endereco', '$matricula[0]')";
      $resultado = mysqli_query($conexao, $sql);
      echo ("Cliente cadastrado com sucesso!!");

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