<!DOCTYPE html>
<html>
<head>
	<title>PJS login Page</title>
	<!-- bootstrap min css start form here -->
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<!-- JQuery datatables min css start form here -->
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
	<!-- JQuery ui css start form here -->
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
	<!-- mdb min css start form here -->
	<link rel="stylesheet" type="text/css" href="css/mdb.min.css">
	<!-- progresscircle css start form here -->
	<link rel="stylesheet" type="text/css" href="css/progresscircle.css">
	<!-- select dattables min css start form here -->
	<link rel="stylesheet" type="text/css" href="css/select.dataTables.min.css">
	<!-- toastr css start form here -->
	<link rel="stylesheet" type="text/css" href="css/toastr.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- style css start form here -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<header>
		<div class="contianer">
			<marquee>
				<div class="headerTitle">
					<img src="img/pjs.jpg">
					<h4>Pjs Coaching Center</h4>
				</div>
			</marquee>
		</div>
	</header>
	<main>
		<section class="loginSection">
			<div class="loginDiv">
				<h4 class="loginTitle">PJS Coaching Center Admin login Page..</h4>
					<table class="">
						<tr>
							<th>Admin Id:</th>
							<td><input type="number" class="form-control" id="adminId" placeholder="Pjs Admin Id"></td>
						</tr>
						<tr>
							<th>Admin Password:</th>
							<td><input type="password" class="form-control" id="adminpass" placeholder="Pjs Admin Id"></td>
						</tr>
						<tr>
							<br>
							<td></td>
							<td><button class="form-control adminLogin">Login</button></td>
						</tr>
					</table>
			</div>
		</section>
	</main>

	
	<!-- JQuery js start form here -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<!-- popper min js start form here -->
	<script type="text/javascript" src="js/popper.min.js"></script>
	<!-- bootstrap min js start form here -->
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<!-- axios min js start form here -->	
	<script type="text/javascript" src="js/axios.min.js"></script>
	<!-- toastr min js start form here -->
	<script type="text/javascript" src="js/toastr.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){

			function autoReload() {
				$("input").each(function() {
					$(this).val("");
				})
			}

			$('.adminLogin').click(function(){

				var id   = $('#adminId').val();
				var pass = $('#adminpass').val();

				if (id == "") {
					toastr.warning("Please Admin Id");
				}else if(pass == ""){
					toastr.error("Please Admin Password");
				} else {
					var url = "/loginAdmin";
					var data = {id:id,pass:pass};
					axios.post(url,data)
					.then(function(response) {
						if (id == 111 && pass == 111) {
							window.location.href="admin/";
						} else {
							toastr.warning('Login Faild!!Please Try Agein');
						}
					})
					.catch(function(error) {
						toastr.warning('Login Faild!!Please Try Agein');
					})
					autoReload();
				}
			})
			
		})
	</script>
</body>
</html>