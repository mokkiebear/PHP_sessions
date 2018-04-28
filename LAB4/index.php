<?php
	session_start();
	if (empty($_SESSION['cost'])){
		$_SESSION['cost'] = 0.0;
	}
	$cost = $_SESSION['cost'];
	
	if (isset($_SESSION['last_visit']))
	{
		$lv = 'Вы были тут '.(time()-$_SESSION['last_visit']).' секунд назад';
		$_SESSION['last_visit'] = time();
	} 
	else 
	{
		$_SESSION['last_visit'] = time();
		$lv = "Вы зашли в первый раз";
	}

?>
<!doctype html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
		<nav class="navbar fixed-top navbar-expand-md navbar-light bg-light">
		    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
		    </button>
		    <div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Домашняя <span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="task3.php">Задание 3<span class="sr-only">(current)</span></a>
					</li>
					<span class="navbar-text">
						<?php echo $lv; ?>
					</span>
				</ul>
				<ul class="nav nav-pills ml-auto">
					
					<li class="nav-item">
						<a class="nav-link active" href="#"><i class="fas fa-shopping-basket"></i> Ст-сть: <?php echo $cost?>$</a>
					</li>
					<li class="nav-item">
						<form method=post>
						<input class="nav-link btn btn-danger" type=submit value="Отменить" name="cl">
						<?php
								if(!empty($_POST['cl'])){
									header('location: index.php');
									unset($_POST['cl']);
									$_SESSION['cost'] = 0.0;
									exit();
								}
						?>
						</form>
					</li>
				</ul>
			</div>
		</nav>
		<form method=post>
			<div class="goods-container">
				<div class="card" style="width: 18rem;">
					<img class="card-img-top" src="vr.jpg" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">Gear VR</h5>
						<p class="card-text">You need it!</p>
						<p class="price" name="price">300$</p>
						<input type=submit class="btn btn-primary" name=but1 value="Добавить в корзину">
						<?php
								if(!empty($_POST['but1'])){
									header('location: index.php');
									unset($_POST['but1']);
									$_SESSION['cost'] += 300;
									exit();
								}
						?>
					</div>
				</div>
				<div class="card" style="width: 18rem;">
					<img class="card-img-top" src="2.jpg" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">Man from GoT</h5>
						<p class="card-text">You need to buy it.</p>
						<p class="price" name="price">49.9$</p>
						<input type=submit class="btn btn-primary" name=but2 value="Добавить в корзину">
						<?php
								if(!empty($_POST['but2'])){
									header('location: index.php');
									unset($_POST['but2']);
									$_SESSION['cost'] += 49.99;
									exit();
								}
						?>
					</div>
				</div>
				<div class="card" style="width: 18rem;">
					<img class="card-img-top" src="empty.jpg" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">Empty place</h5>
						<p class="card-text">It doesn't cost much!</p>
						<p class="price" name="price">4.99$</p>
						<input type=submit class="btn btn-primary" name=but3 value="Добавить в корзину">
						<?php
								if(!empty($_POST['but3'])){
									header('location: index.php');
									unset($_POST['but3']);
									$_SESSION['cost'] += 4.99;
									exit();
								}
						?>
					</div>
				</div>
				<div class="card" style="width: 18rem;">
					<img class="card-img-top" src="empty.jpg" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">Place for your addvert</h5>
						<p class="card-text">It doesn't cost much!</p>
						<p class="price" name="price">0.99$</p>
						<input type=submit class="btn btn-primary" name=but4 value="Добавить в корзину">
						<?php
								if(!empty($_POST['but4'])){
									header('location: index.php');
									unset($_POST['but4']);
									$_SESSION['cost'] += 0.99;
									exit();
								}
						?>
					</div>
				</div>
				<div class="card" style="width: 18rem;">
					<img class="card-img-top" src="empty.jpg" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">Empty place</h5>
						<p class="card-text">It doesn't cost much!</p>
						<p class="price" name="price">999.9$</p>
						<input type=submit class="btn btn-primary" name=but5 value="Добавить в корзину">
						<?php
								if(!empty($_POST['but5'])){
									header('location: index.php');
									unset($_POST['but5']);
									$_SESSION['cost'] += 999.9;
									exit();
								}
						?>
					</div>
				</div>
			</div>	
		</form>

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	</body>
</html>