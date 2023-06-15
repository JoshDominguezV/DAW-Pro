<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">    
    <title>TITULO</title>
<style>
    .cards {
  display: flex;
  flex-direction: column;
  gap: 15px;
  }

    .cards .red {
    background-color: #f43f5e;
    }
    .cards .blue {
    background-color: #3b82f6;
    }
    .cards .green {
    background-color: #22c55e;
    }
    .cards .purple {
    background-color: #7c22c5;
    }

    .cards .card {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    text-align: center;
    height: 100px;
    width: 250px;
    border-radius: 10px;
    color: white;
    cursor: pointer;
    transition: 400ms;
    }

    .cards .card p.tip {
    font-size: 1em;
    font-weight: 700;
    }

    .cards .card p.second-text {
    font-size: .7em;
    }

    .cards .card:hover {
    transform: scale(1.1, 1.1);
    }

    .cards:hover > .card:not(:hover) {
    filter: blur(10px);
    transform: scale(0.9, 0.9);
    }
/*card*/
/*LINK*/
    a {
        color: rgb(255, 255, 255);
        font-size: 1.3rem;
        text-decoration: none;
        margin-top: 1em;
        display: inline-block;
        font-weight: bold;
        padding: .5em;
        margin-left: -.5em;
        position: relative;
        clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 100%);

        &:before, &:after {
            position: absolute;
            content: '';
            border-bottom: 3px solid rgb(255, 255, 255);
            border-radius: 1em;
            bottom: .3em;
            transition: transform .5s cubic-bezier(0.075, 0.82, 0.165, 1);
        }

        &:before {
            width: 1em;
            transform-origin: left;
        }

        &:after {
            width: 82%;
            left: 1em;
            transform: translateX(110%);
        }

        &:hover:before {
            transform: scaleX(0.3);
        }

        &:hover:after {
            transform: translateX(0);
        }

    }


</style>
</head>
<body>
    <div class="container-fluid">
        <div class="container text-center">
            <div class="row">
              <div class="col">
                <div class="cards" >
                    <div class="card red">
                        <div>
                            <a href="#">GESTION DE USUARIOS</a>
                        </div>                        
                    </div>
                </div>
              </div>
              <div class="col">
                <div class="cards">
                    <div class="card blue">
                        <div>
                            <a href="{{ route('administrador.inventario.index') }}">INVENTARIO</a>
                        </div> 
                    </div>
                </div>
              </div>
              <div class="col">
                <div class="cards">
                    <div class="card green">
                        <div>
                            <a href="#">GENERAR REPORTE</a>
                        </div> 
                    </div>
                </div>
              </div>
              <div class="col">
                <div class="cards">
                    <div class="card purple">
                        <div>
                            <a href="{{ route('entrada.index') }}">ENTRADAS/SALIDAS</a>
                        </div> 
                    </div>
                </div>
              </div>
            </div>
        </div>

</body>
</body>
</html>