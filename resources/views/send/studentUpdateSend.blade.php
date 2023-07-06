<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Email Verify</title>
    <link rel="icon" href="{{ asset('pjs.jpg') }}">
    <style>
        div.card-header {border: 1px solid gainsboro;text-align: center;color: #00dd18;font-family: emoji;}
        div.card {background: #ededed;}
        div.card-body {border: 1px solid gainsboro;text-align: center;padding-bottom: 20px;}
        button{font-size: 29px;border-radius: 7px 28px 7px 28px;background: #349647;color: white;font-weight: bold;cursor: pointer;padding: 14px;border: 3px dotted blanchedalmond;}
        h6 {font-size: 23px;color: #04ff00;}
        a{color: white;text-decoration: none}
    </style>   

</head>
<body>
    <div class="card">
		<div class="card-header">
			<h1>Welcome, {{ $nonVerifyStuData->student_name }}</h1>
		</div>
		<div class="card-body">
			<h6>Please Click The Button Bellow To Verify Your Email Address..</h6>
			<button><a href="{{ url('student/emailverify/'.$nonVerifyStuData->studentEmailVerify->student_token) }}">Verify Then login</a></button>
		</div>
	</div>	
</body>
</html>