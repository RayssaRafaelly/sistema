 <!DOCTYPE html>
 <html>
 <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Sistema salárial</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='./style.css'>
    <script src='main.js'></script>

 </head>
 <body>
 <form method="post">
        <label for="nome">Nome</label><br>
        <input type="text" name="nome" /><br>
        <br>
        <label for="semana1">Semana 1</label>
        <input type="number" name="semana1" /><br>
        <label for="semana2">Semana 2</label>
        <input type="number" name="semana2" /><br>
        <label for="semana3">Semana 3</label>
        <input type="number" name="semana3" /><br>
        <label for="semana4">Semana 4</label>
        <input type="number" name="semana4" /><br>
        <br>
        <input id="submit" type="submit" name="submit" value="Calcular" />
      </form>
<div id="mensagem">
<?php
          // Pegar semanas
 
          $nome  = filter_input(INPUT_POST, "nome");
          $semana1 = filter_input(INPUT_POST, "semana1");
          $semana2 = filter_input(INPUT_POST, "semana2");
          $semana3 = filter_input(INPUT_POST, "semana3");
          $semana4 = filter_input(INPUT_POST, "semana4");
 
          if (!($nome && $semana1 && $semana2 && $semana3 && $semana4)) {
              echo "Favor informar todos os dados.";
              return;
          }
       
          if ($semana1 < 0 || $semana2 < 0 || $semana3 < 0 || $semana4 < 0) {
              echo "Favor informar valores positivos.";
              return;
          }
       
          $semanas = [ $semana1, $semana2, $semana3, $semana4 ];
          $mes = $semana1 + $semana2 + $semana3 + $semana4;
          $bonusMes = true;
          $salario = 1927.02;
 
          foreach ($semanas as $semana) {
              if ($semana < 20000) {
                  $bonusMes = false;
              } else {
                  $salario += 200;
                  $salario += ($semana - 20000) * 0.05;
              }
          }
 
          if ($bonusMes)
              $salario += ($mes - 80000) * 0.1;
 
          echo "$nome vai ganhar R$$salario ao fim do mês.";
      ?>
    </div>
 </body>
 </html>