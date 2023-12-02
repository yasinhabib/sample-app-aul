<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="/css/app.css" rel="stylesheet">
        <link href="/css/bootstrap.css" rel="stylesheet">

        
    </head>
    <body class="antialiased">
        <div class="vh-100 vw-100 d-flex align-items-center justify-content-center">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <h5 class="card-title">Login</h5>
                  <form method="POST" action="/login">
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                      <input name="email" type="email" class="form-control" value="{{old('email')}}">
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input name="password" type="password" class="form-control">
                    </div>
                    @foreach ($errors->all() as $error)
                         <div class="form-text text-danger">{{$error}}</div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
        </div>
        <script src="/app.js"></script>
    </body>
</html>
