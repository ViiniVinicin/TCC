<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <!-- Page Info -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Clientes</title>

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

    $resultado = mysqli_query($conexao, "SELECT * FROM cliente");
    $linhas = mysqli_num_rows($resultado);
    echo "<p><b>Lista de Clientes </b></p>";
    for ($i = 0; $i < $linhas; $i++) {
      $reg = mysqli_fetch_row($resultado);

      $tabela = '<table border="1">';
      $tabela .= '<table width="900" border="1px">';
      $tabela .= '<tr>';
      $tabela .= '<td>CPF</td>';
      $tabela .= '<td>Nome</td>';
      $tabela .= '<td>E-mail</td>';
      $tabela .= '<td>Endereço</td>';
      $tabela .= '<td>Telefone</td>';
      $tabela .= '<td>Editar</td>';

      $tabela .= '</tr>';
      $tabela .= '<tr>';
      $tabela .= '<td width="25%">' . $reg[0] . '</td>';
      $tabela .= '<td width="20%">' . $reg[1] . '</td>';
      $tabela .= '<td width="20%">' . $reg[2] . '</td>';
      $tabela .= '<td width="20%">' . $reg[3] . '</td>';
      $tabela .= '<td width="25%">' . $reg[4] . '</td>';
      $tabela .= '<td>
<a href="alt_cliente.php">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
</svg>
</a></td>';
      $tabela .= '</tbody>';
      $tabela .= '</table>';

      echo $tabela;
    }

    mysqli_close($conexao);

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