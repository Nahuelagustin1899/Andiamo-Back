<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar pasajes</title>
    <style>
      h1 {text-align:center;
      font-weight:bold;}

      hr{
          border:2px solid black;
      }      

    </style>

</head>
<body>
      
    <h1>Información del pasaje modificado</h1>   
    <hr>

    <ul>

      <li> Empresa: {{$empresa->nombre}}</li>
      <li> Precio: ${{$precio}}</li>
    </ul>
  
    
</body>
</html>