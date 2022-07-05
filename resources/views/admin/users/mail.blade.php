<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>

@if( isset($token) && $token != '' )
<h4>One Time Password - Popkart User Registraion</h4>
<h4>Email - {{$email}}</h4>
<h5>Your one time password is {{$token}}</h5>
<p>This OTP detail will valid till next 30 Minutes</p>
@endif
@if(isset($token) && $token == '' )
<h4>Hello Dear {{$name}}</h4>
<h4>{{$email}}</h4>
<h5>Welcome to popkart family </h5>
@endif
@if(isset($password) && $password == '' )
<h4>One Time Password - Popkart Reset Password</h4>
<h4>Hello Dear {{$name}}</h4>
<h4>Email - {{$email}}</h4>
<h5>Your one time password is {{$token}}</h5>
@endif
@if(isset($password) && $password != '')
<h4>Password reset successfully</h4>
<h4>Hello Dear {{$name}}</h4>
<h4>Email - {{$email}}</h4>
<h5>Your new password is {{$password}}</h5>
@endif
<h4>Thanks <h4>
<h5>Regards</h5>
<h6>Popkart</h6>
</body>
</html>