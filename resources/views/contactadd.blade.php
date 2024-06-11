<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Configurações - Lista de Contatos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
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
                <a class="dropdown-item" href="{{ route('dashboard') }}">
                    {{ __('Pagina Inicial') }}
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

    <div class="p-5 mb-4 bg-light rounded-3">
      <div class="container-fluid py-5">

        @session('success')
            <div class="alert alert-success" role="alert"> 
              {{ $value }}
            </div>
        @endsession

        <h1 class="display-5 fw-bold">Configuração do usuário: {{ auth()->user()->name }}</h1>
        <p class="col-md-8 fs-4">[Placeholder Text]</p>
      </div>
    </div>

  </div>
</main>

</body>
</html>