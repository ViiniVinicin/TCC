<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <!-- Page Info -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="refresh" content="3.5; URL='home_administrador.html'" />
  <title>Cadastro de Administrador</title>

  <!-- Icons -->
  <link rel="stylesheet" href="assets/fonts/style.css" />

  <!-- STYLES -->
  <link rel="stylesheet" href="stylefuncionario.css" />
  <link rel="stylesheet" href="estilocss.css">

  <!-- FONTS -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link
    href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap"
    rel="stylesheet" />

<body>
  <!-- Header -->
  <header id="header">
    <nav class="container">
      <a class="logo" href="home_administrador.html">mecânica<span>baiano</span>.</a>

      <!-- MENU -->
      <div class="menu">
        <ul class="grid">
          <li><a class="title" href="login.html">Início</a></li>
        </ul>
      </div>

      <!-- /menu -->
      <div class="toggle icon-menu"></div>
      <div class="toggle icon-close"></div>
    </nav>
  </header>

  <form>
    <h3>

      <?php

include "conn.php";

// Verificando se os campos estão vazios
if(empty($_POST['matricula'])  || empty($_POST['nome']) || empty($_POST['senha']) || empty($_POST['senha_n'])) {
	header('Location: alt_administrador.html');
	exit();
}

$matricula    = $_POST['matricula'];
$nome         = $_POST['nome'];
$senha        = $_POST['senha'];
$senha_n        = $_POST['senha_n'];



// Query de Inserir usuario administrador no banco
  $sql = "UPDATE usuario SET senha = '$senha_n' WHERE matricula = '$matricula'";
         $resultado = mysqli_query($conexao,$sql);
         echo "Senha do Administrador alterada com sucesso!!";




?>

  </form>
  </h3>
</body>

</html>