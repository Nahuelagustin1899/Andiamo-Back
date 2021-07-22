<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasajes</title>
    <style>
      h1 {text-align:center;
      font-weight:bold;}

      hr{
          border:2px solid black;
      }

      li{
          font-size:1em;
          font-weight:bold;
          margin-top:4px;
      }
      body{
          background-color:#ffc107;
      }

      #div1{
        background-color:red;
        font-weight:bold;
        border-radius:3px;
        
      }

      div{
        margin-top: 2.5em;
      }

      p{
        padding:1em;
        text-align:center;
        color:#ffda6a;
      }
      
      #qr{
        margin-left:2.5em;
        list-style: none;
      }

    </style>

</head>
<body>
      <div id="div1">
        <p>
        Tenes 72hs antes del viaje para poder pagar el viaje reservado.
        </p>
      </div>
    <h1>Información del pasaje reservado</h1>   
    <hr>
    <ul>
      <li>Nombre : {{$user->name}}</li>
      <li>Usuario : {{$user->email}}</li>
      <li>Salida : {{$viaje->salida->nombre}}</li>
      <li>Destino : {{$viaje->destino->nombre}}</li>
      <li>Precio : ${{$viaje->precio}}</li>
      <li>Asiento : {{$asiento_reservado}}</li>

      <li id="qr">
      {!!QrCode::size(150)->color(23, 27, 109)->generate($qr) !!}
      </li>

      <img src="{{url("imgs/bus.png")}}" alt="Autobus andiamo">
     
    </ul>
    
</body>
</html>