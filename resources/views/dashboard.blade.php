<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            #map {
                width: "100%";
                height: 400px;
            }
        </style>
        <title>Lista de Contatos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    </head>
    <body>
    <main>
        <div class="container py-4">
            <header class="pb-3 mb-4 border-bottom">
                <div class="row">
                    <div class="col-md-9">
                        <h3><img src="{{URL::asset('/image/Globe_icon.png')}}" style="vertical-align: 0%;"alt="Globe Icon" height="20" width="20"></img>   Contact List</h3>
                    </div>
                    <div class="col-md-2">
                        <a class="dropdown-item" href="{{ route('settings') }}">
                            {{ __('Configurações') }}
                        </a>
                    </div>
                    <div class="col-md-1">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="GET" class="d-none">
                        @csrf
                        </form>
                    </div>
                </div>
            </header>
            
                @session('success')
                    <div class="alert alert-success" role="alert"> 
                    {{ $value }}
                    </div>
                @endsession
                <div class=" bg-light">
                    <div class="container-fluid py-5">
                        <div class="row">
                            <div class="col-md-6">


                                <table class="table">
                                <tbody>
                                @foreach ($contacts as $con)
                                <tr>
                                    <td>Nome:</td>
                                    <td>{{$con->con_nome}}</td>
                                </tr>
                                <tr>
                                    <th>Endereço:</th>
                                    <td>{{$con->con_endrua}}, {{$con->con_endnum}} - {{$con->con_endbai}} - {{$con->con_endcid}} / {{$con->con_enduf}}</td>

                                <td>
                                    <a onClick="UpdatePin( '{{$con->con_nome}}' , '{{$con->con_poslat}}' , '{{$con->con_poslon}}' ); return false;"  class="btn btn-success btn-sm">Localizar</a>
                                    <a href="#" class="btn btn-danger btn-sm">Editar</a>
                                </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>
                            <div class="col-md-6">
                                <div id="map">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </main>
        <script type="text/javascript">

        let map;

        let pinlist = [];

        function initMap() {

            const GMapCoor = { lat: -25.4951166, lng: -49.2897982 };

            map = new google.maps.Map(document.getElementById("map"), {

            zoom: 11,

            center: GMapCoor,  
            });

        }

        function UpdatePin(PinName, PinCoorLat, PinCoorLng){

            var GMapPinCoor = { lat: parseFloat(PinCoorLat), lng: parseFloat(PinCoorLng) };

            NewPin = new google.maps.Marker({
                title: PinName,
                position: GMapPinCoor,
                map: map,
            });

            if(pinlist.includes(NewPin)){
            
            const pinindex = array.indexOf(NewPin);
            if (index > -1) { // confirma que o Pin existe no array
            array.splice(pinindex, 1); // remove apenas o pin do array
            }
            NewPin.setMap(null);

            console.log("Hello world!"); 

            } else {
            
            map.panTo(NewPin.getPosition());
            map.setZoom(13);

            pinlist.push(NewPin);
            }
        }

        window.initMap = initMap;

        </script>

        <script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap" ></script>


    </body>
</html>
