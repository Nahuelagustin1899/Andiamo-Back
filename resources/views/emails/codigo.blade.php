<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Código contraseña</title>
    <style>
      h1 {text-align:center;
      font-weight:bold;}

      hr{
          border:2px solid black;
      } 

      #usuario{
        font-size:1em;
      }   

      #box{
        width:80%;
        margin:auto;
        display:block;
        margin-top:2em;
      } 

      body{
          background-color:#ffc107;
      } 

    </style>

</head>
<body>
      
    <h1>Código de contraseña</h1>   
    <hr>

    <div id="box">
    <p id="usuario">{{$random}}</p> 

    </div> 
    
</body>
</html>