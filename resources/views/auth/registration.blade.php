<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel 11 Custom User Register Page - itsolutionstuff.com</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <style type="text/css">
    body{
      background: #F8F9FA;
    }
  </style>
</head>
<body>

<section class="bg-light py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4">
        <div class="card border border-light-subtle rounded-3 shadow-sm">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="text-center mb-3">
              <row>
                <h3><img src="{{URL::asset('/image/Globe_icon.png')}}" style="vertical-align: 0%;"alt="Globe Icon" height="20" width="20"></img>   Contact List</h3>
              </row>
            </div>
            <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Registre a sua conta!</h2>
            <form method="POST" action="{{ route('register.post') }}">
              @csrf

              @session('error')
                  <div class="alert alert-danger" role="alert"> 
                      {{ $value }}
                  </div>
              @endsession

              <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="us_name" id="us_name" placeholder="name@example.com" required>
                    <label for="us_name" class="form-label">{{ __('Nome de Usuário') }}</label>
                  </div>
                  @error('us_name')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="col-12">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="us_email" id="us_email" placeholder="name@example.com" required>
                    <label for="us_email" class="form-label">{{ __('Endereço de Email') }}</label>
                  </div>
                  @error('us_email')
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
                    <button class="btn btn-primary btn-lg" type="submit">{{ __('Registrar') }}</button>
                  </div>
                </div>
                <div class="col-12">
                  <p class="m-0 text-secondary text-center">Já tem uma conta? <a href="{{ route('login') }}" class="link-primary text-decoration-none">Entre aqui!</a></p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>