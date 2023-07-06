<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hello | {{ $adminData->admin_name; }}</title>
	<style type="text/css" media="screen">
		.content {background: #f6f2f2; border-radius: 10px;text-align: center;}
		.nameDiv h4 { font-size: 27px; color: blue;}
		button {background: #ffffff;border: 1px solid red;border-radius: 10px;padding: 6px;}
		a {color: blue;text-decoration: none;font-size: 20px;}
		h4 {color: blue;}
		.linkDiv {padding-bottom: 4px;}
		p {color: #ff17d7;font-size: 19px;}
	</style>
</head>
<body>
	<div class="content">
		<div class="row">
			<div class="collunm">
				<div class="nameDiv">
					<h4>Wellcome {{ $adminData->admin_name; }}  <span class="emoji">👇</span> </h4>
				</div>
				<div class="linkDiv">
					<button type=""><a href="{{ route('admin.getResetPassword',$adminResetCode) }}" title="{{ $adminData->admin_name.'Your Reset Password' }}">Reset Your Password</a></button>
					<p>Or Copy & Paste The Following Link To Your Browser<span class="emoji">👇</span></p>
					<a href="" title="">{{route('admin.getResetPassword',$adminResetCode); }}</a>
					<br>
					<h4>Thank You</h4>
				</div>	
			</div>
		</div>	
	</div>
</body>
</html>