<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Clientes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <h1>Reporte de clientes</h1>
    <hr>
    <br>

    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Id Cliente</th>

          </tr>
        </thead>

        @foreach($data as $item )
        <tr>
            <th >{{$item}}</th>


          </tr>
        @endforeach

        
      </table>
      
      


    <br>
    
</body>
</html>