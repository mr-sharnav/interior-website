<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Karigor.</title>
</head>
<body>
    <h1>Hi {{$newUser['name']}}</h1>
   <h4>Welcome to Karigor </h4>
    <h4> Please use this credentials for login into your Account.</h4>

    <h3>Email:  <b>{{$newUser['email']}}</b></h3>
    <h3>Password:  <b>{{$newUser['password']}}</b></h3>
  <h4>Thank You</h4> 
  <h3>Regards</h3> 
  <h4>{{ Auth::user()->name }}</h4> 

</body>
</html>