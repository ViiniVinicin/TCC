<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <!-- Page Info -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Orçamentos</title>

  <!-- Icons -->
  <link rel="stylesheet" href="assets/fonts/style.css" />

  <!-- STYLES -->
  <link rel="stylesheet" href="styleagendamento.css" />

  <!-- FONTS -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link
    href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap"
    rel="stylesheet" />

    
</head>

<body>


  <!-- MENU -->
  <div class="menu">
    <ul class="grid">
      <li><a class="title" href="home_administrador.html">Início</a></li>

    </ul>
  </div>

</body>

<?php

include "conn.php";



 $resultado = mysqli_query($conexao,"SELECT  cliente.nomeC, servico, dia, orcamento.valor
 FROM servico
 INNER JOIN orcamento on orcamento.servico_id = servico.id
 INNER JOIN cliente on servico.cliente_cpf = cliente.cpf;
 ");
              $linhas= mysqli_num_rows($resultado);
              echo "<p><b>Lista de Orçamentos de Ordens de Serviços </b></p>";
              for ($i=0;$i<$linhas; $i++){
              $reg = mysqli_fetch_row($resultado);
     

$tabela = '<table border="2">';
$tabela.='<table width="900" border="1px">';
$tabela .= '<tr>';
$tabela .= '<td>Nome do Cliente</td>';
$tabela .= '<td>Serviço</td>';
$tabela .= '<td>Data do Serviço</td>';
$tabela .= '<td>Valor do Serviço</td>';
$tabela .= '</tr>';
$tabela .= '<tr>';
$tabela .= '<td width="15%">'.$reg[0].'</td>'; 
$tabela .= '<td width="15%">'.$reg[1].'</td>'; 
$tabela .= '<td width="15%">'.date('d/m/Y', strtotime($reg[2])).'</td>'; 
$tabela .= '<td width="15%">R$ '.$reg[3].'</td>'; 
$tabela .= '</tr>';
$tabela .='</tbody>'; 
$tabela .= '</table>';

echo $tabela; 
              }
              
              
              
 

mysqli_close($conexao);

?>


</body>
<!-- main.js -->
<script src="main.js"></script>

</html>