
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Factura 00000{{$reserva->id}}</title>
    <link rel="stylesheet" href="{{ asset('css/factura.css') }}" media="all" />
    <!-- Favicon  -->
    <link rel="icon" href=" {{asset('images/favicon.png')}} ">
  </head>
  <body>
      <section class="main">

          <header class="clearfix">
            <div id="logo">
              <img src="{{asset('images/favicon--.png')}}">
            </div>
            <h1>Factura 00000{{$reserva->id}}</h1>
            <div id="company" class="clearfix">
              <div>Sloth's Territory</div>
              <div>La Fortuna,<br /> San Carlos, CR</div>
              <div>+506 8561 0404</div>
              <div><a target="_blank" href="https://sloths-territory.com/es">sloths-territory.com</a></div>
            </div>
            <div id="project">
              <div><span>TOUR: </span> <span>{{$reserva->tour->nombre}}</span></div>
              <div><span>CLIENTE: </span> <span>{{$reserva->nombre_cliente}}</span></div>
              <div><span>AGENCIA: </span> <span>{{$reserva->agencia->nombre}}</span> </div>
              <div><span>HORA: </span> <span>{{$reserva->horario->hora}}:{{$reserva->horario->orden > 20 ? 'PM' : 'AM'}}</span></div>
              <div><span>FECHA: </span> <span>{{$reserva->fecha_tour->fecha}}  </span> </div>
            </div>
          </header>
          <main>
              <h1  class="display-4" > Detalles de reservacion </h1>
        
            <table>
              <tbody>
      
                <tr>
                  <td class="service"><span>Cantidad adultos: </span></td>
                  <td class="desc"><span> {{$reserva->cantidad_adultos}} </span></td>
                </tr>
                <tr>
                  <td class="service"><span>Cantidad niños: </span></td>
                  <td class="desc"><span> {{$reserva->cantidad_niños}} </span></td>
                </tr>
                <tr>
                  <td class="service"><span>Cantidad niños gratis: </span></td>
                  <td class="desc"><span> {{$reserva->cantidad_niños_gratis}} </span></td>
                </tr>
                <tr>
                  <td class="service"><span>Monto total: </span></td>
                  <td class="desc"><span> ${{$reserva->monto_total}} </span></td>
                </tr>
                <tr>
                  <td class="service"><span>No. Factura: </span></td>
                  <td class="desc"><span> {{$reserva->factura}} </span></td>
                </tr>
              </tbody>
            </table>
      
          </main>
          <footer>
            sloth's territory
          </footer>
      </section>

    <div class="btn-container">
        <button class="btn btn-sucess" id="imprimir">Imprimir</button>
        <button class="btn btn-info" id="enviar" data-reserva="{{$reserva->id}}">Enviar</button>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        const imprimir = document.getElementById('imprimir')
        const enviar = document.getElementById('enviar')
        imprimir.addEventListener('click', event => {
            event.preventDefault();
            imprimir.style.visibility = 'hidden';
            enviar.style.visibility = 'hidden';
            print()
            imprimir.style.visibility = 'visible';
            enviar.style.visibility = 'visible';
        })

        enviar.addEventListener('click', event => {
            event.preventDefault();
            const reservaId = event.target.dataset.reserva
            Swal.fire({
                title: 'A que correo desea enviar la factura?',
                html: '<input type="email" id="email">',
                preConfirm: () => {
                    const email = document.getElementById('email').value
                    if(email){
                        fetch(`/enviarCorreo/${reservaId}`,{
                            method: 'post',
                            headers: {"Content-Type": "application/json"},
                            body: JSON.stringify({email: email})
                        })
                        Swal.fire('Correo enviado')
                    }else{
                        Swal.fire({
                            icon: 'warning',
                            title: 'Debes proporcionar un correo'
                        })
                    }

                }
            })
        })
    </script>
  </body>
</html>