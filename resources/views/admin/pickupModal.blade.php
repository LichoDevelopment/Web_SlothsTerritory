<!-- resources/views/admin/pickupModal.blade.php -->
<div class="modal fade" id="pickupModal" tabindex="-1" role="dialog" aria-labelledby="pickupModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Encabezado del Modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="pickupModalLabel">Solicitar Punto de Recogida</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    onclick="closePickupModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Cuerpo del Modal -->
            <div class="modal-body">
                <form id="pickupForm">
                    <!-- Campos ocultos -->
                    <input type="hidden" id="reservaId" name="reserva_id">
                    <input type="hidden" id="scheduleId" name="schedule_id">
                    <input type="hidden" id="reservationDate" name="reservation_date">
                    <!-- Campo de dirección con Autocomplete -->
                    <div class="form-group">
                        <label for="direccion">Dirección de Recogida</label>
                        <input type="text" class="form-control" id="direccion" name="direccion"
                            placeholder="Ingrese el lugar de recogida" required>
                    </div>
                    <div class="form-group">
                        <label for="email_cliente">Correo del Cliente</label>
                        <input type="email" class="form-control" id="email_cliente" name="email_cliente" placeholder="Ingrese el correo del cliente" required>
                    </div>
                    <!-- Campos ocultos para latitud y longitud -->
                    <input type="hidden" id="latitud" name="latitud">
                    <input type="hidden" id="longitud" name="longitud">
                    <input type="hidden" id="placeId" name="placeId">

                    <!-- Campos para mostrar distancia, precio y espacios disponibles -->
                    <div class="form-group">
                        <label for="distance">Distancia (km)</label>
                        <input type="text" class="form-control" id="distance" name="distance" readonly>
                    </div>
                    <div class="form-group">
                        <label for="price">Precio del Transporte ($)</label>
                        <input type="text" class="form-control" id="price" name="price" readonly>
                    </div>
                    <div class="form-group">
                        <label for="available_places">Espacios Disponibles</label>
                        <input type="text" class="form-control" id="available_places" name="available_places" readonly>
                    </div>
                    <!-- Botón de envío -->
                    <button type="submit" class="btn btn-primary">Guardar Recogida</button>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- Agrega este script antes del cierre de la etiqueta </body> -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAydaQ1I66GB2EYP2NxxwEn2oovnxtq5Bg&libraries=places"></script>

<script>
    let autocomplete;
    let transportConfig = null;

     // Usa el helper de Laravel para generar la URL completa de la API
     const appUrl = @json(route('api.getTransportPriceWeb'));

     // Usa fetch con la URL generada
    async function fetchTransportPrice() {
        try {
            const response = await fetch(appUrl);
            const data = await response.json();
            transportConfig = data; // Almacenar la configuración
        } catch (error) {
            console.error('Error fetching transport price:', error);
        }
    }

    // Llama a la función para obtener los datos
    fetchTransportPrice();


    function initAutocomplete() {
        const input = document.getElementById('direccion');
        autocomplete = new google.maps.places.Autocomplete(input, {
            // types: [],
            componentRestrictions: { country: "cr" } // Opcional: Restringir a Costa Rica
        });

        autocomplete.addListener('place_changed', onPlaceChanged);
    }

    function onPlaceChanged() {
        const place = autocomplete.getPlace();

        if (!place.geometry) {
            // El usuario no seleccionó una opción de la lista
            alert('Por favor, seleccione una dirección de la lista desplegable.');
            return;
        }

        // Obtener dirección y coordenadas
        const direccion = place.formatted_address;
        const latitud = place.geometry.location.lat();
        const longitud = place.geometry.location.lng();


        // Asignar valores a los campos del formulario
        document.getElementById('direccion').value = direccion;
        document.getElementById('latitud').value = latitud;
        document.getElementById('longitud').value = longitud;
        document.getElementById('placeId').value = place.place_id;

         // Calcular la distancia
         calculateDistance(latitud, longitud);
    }

    function calculateDistance(lat, lng) {
        const origin = `${lat},${lng}`; // Convertir a cadena "lat,lng"
        const destination = '10.471471,-84.603181'; // Sloths Territory

        const urlCalculateDistance = @json(route('api.calculateDistance'));

        // Construir los datos a enviar
        const data = {
            origen: origin,
            destino: destination
        };

        // Realizar la solicitud al controlador
        fetch(urlCalculateDistance, {
            method: 'POST', // Usaremos POST para evitar problemas con la longitud de la URL
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}', // Asegurarse de incluir el token CSRF
            },
            body: JSON.stringify(data),
        })
        .then(response => response.json())
        .then(responseData => {
            if (responseData.distancia) {
                const distanceInMeters = responseData.distancia;
                const distanceInKm = (distanceInMeters / 1000);
                const distanceParsed = Math.round(distanceInKm);
                document.getElementById('distance').value = distanceInKm;

                // Calcular el precio del transporte
                calculateTransportPrice(distanceParsed);
            } else if (responseData.error) {
                alert('Error al calcular la distancia: ' + responseData.error);
                // Deshabilitar el botón de guardar
                document.querySelector('#pickupForm button[type="submit"]').disabled = true;
            }
        })
        .catch(error => {
            console.error('Error al calcular la distancia:', error);
            alert('Ocurrió un error al calcular la distancia.');
            // Deshabilitar el botón de guardar
            document.querySelector('#pickupForm button[type="submit"]').disabled = true;
        });
    }

    function calculateTransportPrice(distanceInKm) {
        console.log('Distance (km):', distanceInKm);
        if (!transportConfig) {
            alert('No se pudo obtener la configuración del transporte.');
            return;
        }

        const minDistance = parseInt(transportConfig.distancia_minima);
        const maxDistance = parseFloat(transportConfig.distancia_maxima);
        const minPrice = parseFloat(transportConfig.precio_minimo);
        const pricePerKm = parseFloat(transportConfig.precio_por_km_adicional);

        let price = 0;

        if (distanceInKm <= minDistance) {
            price = minPrice;
        } else if (distanceInKm > maxDistance) {
            alert('La distancia excede la distancia máxima permitida.');
            document.getElementById('price').value = 'N/A';
            // Deshabilitar el botón de guardar
            document.querySelector('#pickupForm button[type="submit"]').disabled = true;
            return;
        } else {
            price = minPrice + ((distanceInKm - minDistance) * pricePerKm);
        }

        // Mostrar el precio
        document.getElementById('price').value = price.toFixed(2);

        // Habilitar el botón de guardar
        document.querySelector('#pickupForm button[type="submit"]').disabled = false;

        // Obtener los lugares disponibles
        fetchAvailableTransportPlaces();
    }

    function fetchAvailableTransportPlaces() {
        const scheduleId = document.getElementById('scheduleId').value;
        const date = document.getElementById('reservationDate').value;

        if (!scheduleId || !date) {
            alert('No se pudo obtener la información de la reserva.');
            return;
        }

        // Construir la URL para la API
        // const url = `/api/transport/available-places/${scheduleId}/${date}`;
        const url = @json(route('api.getAvailableTransportPlacesWeb', ['scheduleId' => ':scheduleId', 'date' => ':date']))
            .replace(':scheduleId', scheduleId)
            .replace(':date', date);

            console.log('URL:', url);

        fetch(url)
            .then(response => response.json())
            .then(data => {
                document.getElementById('available_places').value = data;
                // Si no hay lugares disponibles, deshabilitar el botón
                if (parseInt(data) <= 0) {
                    alert('No hay lugares disponibles en el transporte.');
                    document.querySelector('#pickupForm button[type="submit"]').disabled = true;
                }
            })
            .catch(error => {
                console.error('Error al obtener los lugares disponibles:', error);
                alert('Error al obtener los lugares disponibles.');
            });
    }

    // Llama a initAutocomplete cuando se carga la API de Google
    google.maps.event.addDomListener(window, 'load', initAutocomplete);
</script>