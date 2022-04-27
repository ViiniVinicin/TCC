<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <!-- Page Info -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="refresh" content="3.5; URL='../home/home_administrador.html'" />
  <title>Cadastro de Administrador</title>

  <!-- Icons -->
  <link rel="stylesheet" href="assets/fonts/style.css" />

  <!-- STYLES -->
  <link rel="stylesheet" href="../style/stylecad.css" />

  <!-- FONTS -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />

<body>
  <!-- Header -->
  <header id="header">
    <nav class="container">
      <a class="logo" href="../home/home_administrador.html">mecânica<span>baiano</span>.</a>

      <!-- MENU -->
      <div class="menu">
        <ul class="grid">
          <li><a class="title" href="../home/login.php">Início</a></li>
        </ul>
      </div>

    </nav>
  </header>

  <main>
    <form>
      <?php
      include "../validation/conn.php";

      // Verificando se os campos estão vazios
      if (
        empty($_POST['matricula'])  || empty($_POST['nome'])
        || empty($_POST['endereco']) || empty($_POST['email']) || empty($_POST['telefone'])
        || empty($_POST['senha'])
      ) {
        header('Location: ../cadastrar/cad_administrador.html');
        exit();
      }

      $matricula    = $_POST['matricula'];
      $nome         = $_POST['nome'];
      $endereco     = $_POST['endereco'];
      $email        = $_POST['email'];
      $telefone     = $_POST['telefone'];
      $senha        = $_POST['senha'];


      // Buscar se a matrícula já foi cadastrada ou não
      $query = ("SELECT matricula FROM usuario WHERE matricula = '$matricula'");
      $result = mysqli_query($conexao, $query);
      $row = mysqli_num_rows($result);

      if ($row > 0) {
        echo "A matrícula já esta sendo usada, utilize uma nova ou entre em contato com o administrador do sistema.";
        exit;
      } else {

        // Query de Inserir usuario administrador no banco
        $sql = "INSERT INTO usuario(matricula, nome, endereco, email, telefone, senha, perfil_id) VALUES ";
        $sql .= "('$matricula','$nome','$endereco','$email','$telefone','$senha', 1)";
        $resultado = mysqli_query($conexao, $sql);
        echo "Administrador cadastrado com sucesso!!";
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