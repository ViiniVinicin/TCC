<!DOCTYPE html>
<html lang="pt_BR">

<head>
  <!-- Page Info -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>

  <!-- Icons -->
  <link rel="stylesheet" href="assets/fonts/style.css" />

  <!-- STYLES -->
  <link rel="stylesheet" href="../style/stylelogin.css" />

  <!-- FONTS -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
</head>

<body>
  <!-- Header -->
  <header id="header">
    <nav class="container">
      <a class="logo" href="../home_administrador.html">mecânica<span>baiano</span>.</a>

      <!-- MENU -->
      <div class="dd-menu">
        <ul>
          <li><a href="#">Cadastrar</a>
            <ul>
              <li><a href="../cadastrar/cad_cliente.html">Clientes</a></li>
              <li><a href="../cadastrar/cad_agendamento.html">Agendamento</a></li>
              <li><a href="../cadastrar/cad_orcamento.html">Orçamentos</a></li>
            </ul>
          </li>
          <li><a href="">Listar</a>
            <ul>
              <li><a href="../listar/listar_clientes.php">Clientes</a></li>
              <li><a href="../listar/listar_agendamentos.php">Agendamentos</a></li>
              <li><a href="../listar/listar_orcamentos.php">Orçamentos</a></li>
              <li><a href="../listar/listar_admin.php">Administradores</a></li>
            </ul>
          </li>
          <li><a href="../home/logout.php">Sair</a></li>
        </ul>
      </div>
    </nav>
  </header>

  <main>
    <?php

    require "../validation/conn.php";
    require "../validation/verifica.php";

    $resultadoM = mysqli_query($conexao, "SELECT nome FROM usuario WHERE email = '{$_SESSION['email']}' AND senha = '{$_SESSION['senha']}'");
    $linhasM = mysqli_num_rows($resultadoM);
    for ($m = 0; $m < $linhasM; $m++) {
      $nome = mysqli_fetch_row($resultadoM);
    }
    echo $nome[0];
    ?>

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