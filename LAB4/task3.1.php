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

	$_SESSION['mail'] = $_POST['mail'];

	if(!isset($_SESSION['visits'])){
		$_SESSION['visits'] = 0;
		$vis = "Вы впервые на секретной странице";
	}
	else{
		$_SESSION['visits'] += 1;
		$vis = "Вы посетили эту страницу ".$_SESSION['visits']." раз. ";
	}
?>
<!doctype html>
<html>
	<head>
		<meta charset=utf8>
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
					<span class="navbar-text">
						<?php echo $vis; ?>
					</span>
					<li class="nav-item">
						<form method=post>
						<input class="nav-link btn btn-danger" type=submit value="Дестрой" name="des">
						<?php
								if(!empty($_POST['des'])){
									header('location: task3.1.php');
									session_unset();
									session_destroy();
									unset($_POST['des']);
									exit();
				
								}
						?>
						</form>
					</li>
				</ul>
				
			</div>
		</nav>
		<form style="margin-top:10%;">
		  <div class="form-group">
			<label for="exampleInputEmail1">Введите электронную почту</label>
			<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $_SESSION['mail']; ?>">
		  </div>
		  <div class="form-group">
			<label for="exampleInputPassword1">Введите пароль</label>
			<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
		  </div>
		  <button type="submit" class="btn btn-primary">Подтвердить</button>
		</form>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	</body>
</html>