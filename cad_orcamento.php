<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <!-- Page Info -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="refresh" content="3.5; URL='home_administrador.php'" />
  <title>Cadastro de Orçamento</title>

  <!-- Icons -->
  <link rel="stylesheet" href="assets/fonts/style.css" />

  <!-- STYLES -->
  <link rel="stylesheet" href="styleorcamento.css" />

  <!-- FONTS -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
</head>

<body>
  <!-- Header -->
  <header id="header">
    <nav class="container">
      <a class="logo" href="home_administrador.html">mecânica<span>baiano</span>.</a>

      <!-- MENU -->
      <div class="menu">
        <ul class="grid">
          <li><a class="title" href="home_administrador.html">Início</a></li>
        </ul>
      </div>
    </nav>
  </header>

  <main>
    <form>
      <?php
      require "conn.php";
      require "verifica.php";

      // Verificando se os campos estão vazios
      if (empty($_POST['servico'])  || empty($_POST['dia']) || empty($_POST['cliente_nome']) || empty($_POST['valor'])) {
        header('Location: cad_orcamento.html');
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
</body>

</html>