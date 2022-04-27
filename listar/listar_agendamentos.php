<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <!-- Page Info -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Agendamentos</title>

  <!-- Icons -->
  <link rel="stylesheet" href="assets/fonts/style.css" />

  <!-- STYLES -->
  <link rel="stylesheet" href="../style/stylelist.css" />

  <!-- FONTS -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet" />
</head>

<body>
  <header id="header">
    <nav class="container">
      <a class="logo" href="../home/home_administrador.html">mecânica<span>baiano</span>.</a>

      <!-- Menu -->
      <div class="dd-menu">
        <ul>
          <li><a href="../home/home_administrador.html">Início</a></li>
        </ul>
      </div>
    </nav>
  </header>

  <main>
    <?php

    include "../validation/conn.php";

    $resultado = mysqli_query($conexao, " SELECT cliente.nomeC, servico, horario, dia FROM cliente
 INNER JOIN servico on cliente.cpf = servico.cliente_cpf
               ");
    $linhas = mysqli_num_rows($resultado);
    echo "<p><b>Lista de Serviços </b></p>";
    for ($i = 0; $i < $linhas; $i++) {
      $reg = mysqli_fetch_row($resultado);

      $tabela = '<table border="1">';
      $tabela .= '<table width="900" border="1px">';
      $tabela .= '<tr>';
      $tabela .= '<td>Nome do Cliente</td>';
      $tabela .= '<td>Serviço</td>';
      $tabela .= '<td>Horário</td>';
      $tabela .= '<td>Data</td>';
      $tabela .= '</tr>';
      $tabela .= '<tr>';
      $tabela .= '<td width="15%">' . $reg[0] . '</td>';
      $tabela .= '<td width="15%">' . $reg[1] . '</td>';
      $tabela .= '<td width="15%">' . $reg[2] . '</td>';
      $tabela .= '<td width="15%">' . date('d/m/Y', strtotime($reg[3])) . '</td>';

      $tabela .= '</tr>';
      $tabela .= '</tbody>';
      $tabela .= '</table>';

      echo $tabela;
    }
    mysqli_close($conexao);

    ?>

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
  </main>
</body>
<!-- main.js -->
<script src="main.js"></script>

</html>