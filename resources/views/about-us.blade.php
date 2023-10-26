{{-- <?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?> --}}
<title>About Us</title>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap');
*{
	margin:0px;
	padding:0px;
	box-sizing: border-box;
	font-family: 'Poppins', sans-serif;
}
.section{
	width: 100%;
	min-height: 100vh;
	background-color: #ddd;
	align-items: center;
}
.container1{
	width: 80%;
	display: block;
	margin:auto;
	padding-top: 100px;
}
.content-section{
	align-items: : center;
	width: 55%;
}

.content-section h1{
	text-transform: uppercase;
	font-size: 80px;
	font-weight: 700;
}
.content-section h2{
	text-transform: uppercase;
	font-size: 20px;
	font-weight: 200;
}
.content-section .social{
	margin: 0;
}
.content-section .social i{
	color:#a52a2a;
	font-size: 50px;
	padding:0;
	float: left;
	justify-content: space-between;
}
.card{
	position: relative;
	width: 600px;
	height: 350px;
	border-radius: 20px;
	display: flex;
	align-items: center;
	border-radius: 20px;
	transition: 0.5s;
}
.card .circle{
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	border-radius: 20px;
	overflow: hidden;
}
.card .circle::before{
	content: '';
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: #00CDFF;
	clip-path: circle(120px at center);
	transition: 0.5s;
}
.card:hover .circle:before{
	background: #0056c3;
	clip-path: circle(400px at center);
}
.card img{
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	height: 500px;
	pointer-events: none;
	transition: 0.5s;
}
.card:hover img{
	left: 72%;
	height: 650px;
}
.card .content1{
	position: relative;
	width: 50%;
	left: 5%;
	padding: 20px 20px 20px 40px;
	transition: 0.5s;
	opacity: 0;
	visibility: 0;
}
.card:hover .content1{
	left: 0;
	opacity: 1;
	visibility: visible;
}
.card .content1 h2{
	color: #fff;
	text-transform: uppercase;
	font-size: 2em;
	line-height: 1em;
	margin-bottom: 5px;
}
.card .content1 h3{
	color: #fff;
	text-transform: uppercase;
	font-size: 1em;
	line-height: 1em;
	margin-bottom: 5px;
}
.card .content1 p{
	color: #fff;
}
.card .content1 a{
	color: #fff;
	position: relative;
	padding: 10px 20px;
	border-radius: 10px;
	background: #fff;
	color: #111;
	margin-top: 10px;
	display: inline-block;
	text-decoration: none;
	font-weight: 700;
}
.x{
	margin-left: 500px;
}
</style>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	{{-- <?php include 'includes/navbar.php'; ?> --}}

	  <div class="content-wrapper">
	    <div class="container">

  	<div class="section">
  		<div class="container1">
  			<div class="content-section">
  				<div class="title1">
  					<h1>About Us</h1>

						<h2>Follow Us<h2>
						<div class="social">
  					<a href=""><i class='fab fa-facebook-square'></i></a>
  					<a href=""><i class="fab fa-twitter"></i></a>
  					<a href=""><i class="fab fa-instagram"></i></a>
  				</div>
  				</div>
				</div>
			</div>
			<div class="x">
					<div class="card">
			      <div class="circle">
			        <div class="content1">
			          <h2>LOOTBOX</h2>
								
			          <p>"We Bring to you the most trusted brands in the world"
										FAST. EASY. RELIABLE. RIGHT AT YOUR DOORSTEP.</p>
			           <!--link homepage --> <a href="index.php">Shop Now!</a>
			        </div>
			        <img src="images/logo1.png" alt="">
			      </div>
			    </div>
			</div>


	    </div>
	  </div>

  	{{-- <?php include 'includes/footer.php'; ?> --}}
</div>

{{-- <?php include 'includes/scripts.php'; ?> --}}
</body>
</html>
