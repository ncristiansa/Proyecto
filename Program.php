<html>
  <head>
    <title></title>
  </head>
  <script type="text/javascript" defer src="script.js">
  </script>
  <body>
    <?php
    #Arrays que usaremos
    $arrayImg = array();
    $arrayGeneral = array();
    $arrayNombres = array();
    $Carac = array();
    #Lectura de fichero.
    $Img = fopen("imatges.txt", "r") or die("Error al leer documento.");
    while(!feof($Img)){
      $linea=fgets($Img);
      $saltodelinea=nl2br($linea);
      array_push($arrayImg, $saltodelinea);
    }
    fclose($Img);

    # Añadimos el fichero en un array
    foreach ($arrayImg as $key => $i) {
      $names = explode(":",$i);
      array_push($arrayGeneral, $names);
    }
    # Creacion de array nombres
    $longGnl = count($arrayGeneral);
    for($i = 0; $i<$longGnl;$i++){
      array_push($arrayNombres, $arrayGeneral[$i][0]);
    }
    # Creacion de array caracteristicas
    for($i=0;$i<$longGnl;$i++){
      array_push($Carac, $arrayGeneral[$i][1]);
    }

    # 1. Una misma imagen (nombre de imagen) aparece dos veces en el archivo img.txt

    if(count($arrayNombres)>count(array_unique($arrayNombres))){
      $Logs = fopen("logs.txt", "w");
      fwrite($Logs, "¡Error! Hay un nombre repetido en el archivo imatges.txt.");
      fclose($Logs);
      echo"<h2>¡Error! Hay un nombre repetido en el archivo imatges.txt.</h2>";
    }elseif(count($Carac)>count(array_unique($Carac))){
      print_r("klk");
      $Log = fopen("logs.txt", "w");
      fwrite($Log, "¡Error! Hay caracteristicas repetidas en el archivo imatges.txt.");
      fclose($Log);
      echo"<h2>¡Error! Hay caracteristicas repetidas en el archivo imatges.txt.</h2>";
    }
    else{

    $arrayRandom=[];

    $numeros=range(0,11);
    shuffle($numeros);
    foreach ($numeros as $value) {
      array_push($arrayRandom,$value);
    }
    $arrayGeneral2=[];
    foreach ($numeros as $value) {
      array_push($arrayGeneral2, $arrayGeneral[$value][0]);
    }
    echo"<link href='estilos-quien-es-quien.css' type='text/css' rel='stylesheet' >";
    $cartaoculta = $arrayGeneral2[0];
    $img = $arrayGeneral2;
    $div = ['div1','div2','div3','div4','div5','div6','div7','div8','div9','div10','div11'];

    echo "<table>";
    $i=0;
    foreach ($img as $fotos) {
      if( substr($fotos,-3)=="jpg" or substr($fotos,-3)=="png" or substr($fotos,-4)=="jpeg"){
        if ($cartaoculta!=$fotos){
          echo "<div class=$div[$i]>";
          echo "<img src='imagenes/$fotos' width='120' height='120'>";
          echo "</div>";
          $i=$i+1;
        }else{
          echo "<div class='divoculta'>";
          echo "<img src='imagenes/$fotos' width='150' height='150'>";
          echo "</div>";
        }
    }
    }
      $names = array('OptCabello', 'OptGafas', 'OptSexo');
      $namesC = array('Rubio', 'Moreno', 'Castany');
      $namesG = array('Si', 'No');
      $namesS = array('Hombre', 'Mujer');

      $longC = count($namesC);
      $longGS = count($namesG);
      echo"<form method='post'>";
      echo"<div class='general'>";
        echo"<div class='caja1'>";
        echo"<p>¿Color de pelo?</p>";
        for($i=0;$i<1;$i++){
          echo"<select name='$names[$i]' id='$names[$i]'>";
              echo"<option value='selecciona'>Selecciona...</option>";
            for($e=0;$e<$longC;$e++){
              echo"<option value='$namesC[$e]'>$namesC[$e]</option>";
            }
          echo"</select>";
        }
        echo"</div>";
        echo"<div class='caja2'>";
        echo"<p>¿Tiene gafas?</p>";
        for($i=0;$i<1;$i++){
          echo"<select name='$names[$i]' id='OptCabello'>";
              echo"<option value='selecciona'>Selecciona...</option>";
            for($e=0;$e<$longGS;$e++){
              echo"<option value='$namesG[$e]'>$namesG[$e]</option>";
            }
          echo"</select>";
        }
        echo"</div>";
        echo"<div class='caja3'>";
        echo"<p>¿Género?</p>";
          for($o=0;$o<1;$o++){
            echo"<select name='$names[$i]' id='OptGafas'>";
                echo"<option value='selecciona'>Selecciona...</option>";
              for($i=0;$i<$longGS;$i++){
                echo"<option value='$namesS[$i]'>$namesS[$i]</option>";
              }
            echo"</select>";
          }
        echo"</div>";

        echo"<input type='submit' value='Respuesta' onclick='validacion()'>";

        echo"</form>";

      echo"</div>";

    }
    ?>
  </body>
</html>