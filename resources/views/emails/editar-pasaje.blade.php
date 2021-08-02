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
          background-color:#f4f4ff;
      }

      img{
        margin-top: 1em;
      }

    </style>

</head>
<body>
      
    <h1>Información del pasaje modificado</h1>   
    <hr>

    <div id="box">
    <p id="usuario">Estimado usuario:</p> 
    
    <p>Le hacemos llegar por medio de este mail la modificacion del pasaje de <b>{{$empresa->nombre}}</b> con salida de <b>{{$destino->nombre}}</b> y con llegada a <b>{{$salida->nombre}}</b></p>

    <p><b>Modificaciones:</b></p>  

    <ul>
      <li>Horario de salida: {{$viaje->fecha_salida}}</li>
      <li>Horario de llegada: {{$viaje->fecha_llegada}}</li>
      <li>Precio: {{$viaje->precio}}</li>
    </ul>

    <p>Desde ya muchas gracias. <br/><b>Andiamo</b></p>
    
    <img width="200" height="100" src="{{url("imgs/bus.png")}}" alt="Autobus andiamo">

    </div> 
    
</body>
</html>