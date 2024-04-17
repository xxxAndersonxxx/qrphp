<?php require 'phpqrcode/qrlib.php';?>

<html>
<head>
    <title>Generador de código QR</title>
</head>
<body>
    <form method="post" action="index.php">
    Ingrese su enlace: <input type="text" name="txturl"  />
    <input type='submit' value='Generar QR' name="btnGenerar" />

    </form>
</boby>
</html>




<?php

function generador($enlace){
   
   $dir = "temp/";

   if(!file_exists($dir)){mkdir($dir);}
    $nomarch=''.md5($enlace).'-test.png';
    //$urlactual=$_SERVER['HTTP_HOST'].''.$_SERVER['REQUEST_URI']."/".$dir.''.md5($enlace).'-test.png';
    $urlactual='/'.$dir.''.md5($enlace).'-test.png';
   $filename= $dir.''.$nomarch;

   $tamano=15;
   $level = "H";
   $frameSize =1;
   $contenido = $enlace;

      // we need to generate filename somehow, 
   // with md5 or with database ID used to obtains $codeContents...
   //$fileName = $dir.md5($contenido).'.png';

   QRcode::png ($contenido,$filename,$level,$tamano, $frameSize);
   return '<a href="descargar.php/?cod='.$urlactual.'" target="_blank" download="'.$nomarch.'">Descargar</a><br/><img src="'.$filename.'" />';
}

?>

<?php
    if (isset($_POST['btnGenerar'])) {
        $enlace1=$_POST["txturl"];
        $texto= generador($enlace1);
        echo $texto;
    }



?>