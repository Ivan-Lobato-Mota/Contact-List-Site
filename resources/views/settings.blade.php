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

        <h1 class="display-5 fw-bold">Configuração - Excluir a conta</h1>
        <form method="POST" action="{{ route('delete.post') }}">
              @csrf

              @session('error')
                  <div class="alert alert-danger" role="alert"> 
                      {{ $value }}
                  </div>
              @endsession

              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <h3>Para Excluir sua conta é necessário inserir a sua senha atual!</h3>
                    <h3><b>Atenção</b> - Excluir a conta é uma ação permanente e irreversível!</h3> 
                  </div>
                  @error('us_name')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="us_password" id="us_password" value="" placeholder="Password" required>
                    <label for="us_password" class="form-label">{{ __('Senha') }}</label>
                  </div>
                  @error('us_password')
                      <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="us_password_confirmation" id="us_password_confirmation" value="" placeholder="password_confirmation" required>
                    <label for="us_password_confirmation" class="form-label">{{ __('Confirme sua Senha') }}</label>
                  </div>
                  @error('us_password_confirmation')
                      <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-12">
                  <div class="d-grid my-3">
                    <button class="btn btn-danger btn-lg" type="submit">{{ __('Deletar Conta') }}</button>
                  </div>
                </div>
              </div>
            </form>
      </div>
    </div>

  </div>
</main>

</body>
</html>