<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Assessment - LOG IN</title>
<link rel="stylesheet" href="{{asset('assets/css/login.css')}}" />
<link rel="stylesheet" href="{{asset('js/login.js')}}" />
</head>
<body>
<section class='login' id='login' style="width: 250px;">
       <div class='head'>
       <img src="{{ asset('assets/images/logo.svg') }}">
       </div>
       <p class='msg'><b>Welcome Back</b></p>
       @if ($errors->has('email'))
       <span class="help-block" role="alert">
           <strong style="color: white; font-size:12px;">{{ $errors->first('email') }}</strong>
       </span>
       @endif
       @if ($errors->has('password'))
       <span class="help-block" role="alert">
       <strong>{{ $errors->first('password') }}</strong>
       </span>
       @endif 
       <div class='form'>
         <form method="POST" action="{{ route('login') }}">
         @csrf
         <input type="text" name="email" placeholder='Email' class='text' value="{{old('email')}}" required><br><br>
         <input class='password' type="password" name="password" placeholder="Password"/><br>
         <button type="submit" class='btn-login' style="margin-left: 82px;">Login</button>
         </form>
       </div>
</section>

</body>
</html>
