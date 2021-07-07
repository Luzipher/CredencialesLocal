<?php

error_reporting(E_ALL ^ E_DEPRECATED);
header("Content-Type: text/html; Charset=UTF-8");

$buscador = isset($_POST['buscador']) ? $_POST['buscador'] : '';



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credencial</title>
    <style>
      *{
          margin: 0px;
          padding: 0px;
       }
       @font-face {
           font-family: 'code39';
           src: url('css/font/free3of9-webfont.ttf') format('truetype');
           font-style: normal;
           font-weight: normal;
       }
       .otroCodigoB{
           font-family: 'code39';
           font-size: 3.5em;
       }
       .credenF{
           width: 488px;
           height: 311px;
           background-image: url('img/frentergb.jpg');
           -webkit-background-size: cover;
           -moz-backgrund-size: cover;
           -o-background-size: cover;
           background-size: cover;
           margin: 0px auto; 
       }
       .caja{
           font-family: Arial, Helvetica, sans-serif;
           position: absolute;
           margin-top: 130px;
           width: 293px;
           text-align: right;
           font-weight: bold;
           font-size: 1.2em;
           color: #7C7A7E;
       }
       .cajaM{
           font-family: Arial, Helvetica, sans-serif;
           position: absolute;
           margin-top: 215px;
           width: 293px;
           text-align: right;
           font-weight: bold;
           font-size: .8em;
           color: #7C7A7E;
       }
       .cajaC{
           font-family: Arial, Helvetica, sans-serif;
           position: absolute;
           margin-top: 270px;
           width: 293px;
           text-align: right;
           font-weight: bold;
           font-size: .7em;
           color: #7C7A7E;
       }
       .cajaI{
           position: absolute;
           margin-top: 130px;
           margin-left: 330px;
       }
       .credenF1{
           width: 488px;
           height: 311px;
           background-image: url('img/vueltargb.jpg');
           -webkit-background-size: cover;
           -moz-backgrund-size: cover;
           -o-background-size: cover;
           background-size: cover;
           margin: 0px auto; 
       }
       .cajaM2{
           font-family: Arial, Helvetica, sans-serif;
           position: absolute;
           margin-top: 215px;
           width: 270px;
           text-align: right;
           font-weight: bold;
           font-size: .8em;
           color: #7C7A7E;
       }
       .cajaV{
        font-family: Arial, Helvetica, sans-serif;
           position: absolute;
           margin-top: 90px;
           width: 468px;
           text-align: right;
           font-weight: bold;
           font-size: .7em;
           color: #7C7A7E;
       }
       .cajaB{
        position: absolute;
           margin-top: 170px;
           width: 488px;
           text-align: center;
       }
         
       
    

    </style>
</head>
<body style="background-color: red;">
    
        <?php
            $con = new SQLite3("credenciales.db") or die("problemas para conectar");

            $cs = $con -> query("SELECT * FROM vista1 WHERE comodin LIKE '%$buscador%'");

            while ($res = $cs -> fetchArray()) {
                $matricula = $res['matricula'];
                $apellidos = $res['apellidos'];
                $nombre = $res['nombre'];
                $carrera = $res['carrera'];
                $vigencia = $res['vigencia'];
                $grupo = $res['grupo'];
                $codigodebarras = $res['codigodebarras'];
                $cuat = $res['grupo'];

                echo '

                <div class="credenF">
                
                <div class="caja">
                    <p>'.$nombre.'</p>
                    <p>'.$apellidos.'</p>
                </div>
                <div class="cajaM">
                    <p>'.$matricula.'</p>
                </div>
                <div class="cajaC">
                    <p>'.$carrera.'</p>
                </div>
                <div Class="cajaI">
                    <img src="https://utfv.net/credencialesUtfv/imgAlumnos/'.$matricula.'.jpg" width="125">
                </div>

                </div>


                <div class="credenF1">
                <div class="cajaM2">
                    <p>'.$matricula.'</p>
                </div>
                <div class="cajaV">
                    <p>'.$vigencia.'</p>
                </div>
                <div class="cajaB">
                   <div class="otroCodigoB">
                   *'.$codigodebarras.'*
                   </div>
                </div>
                <!-- <div class="cajaB">
                  <img src="barcode.php?text='.$codigodebarras.'">
                </div> -->
                </div>
                
                ';
            }

            $con -> close();
        ?>
        
    </div>
    
</body>
</html>