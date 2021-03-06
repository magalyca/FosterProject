<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<title>WELCOME TO FOSTER HOME DB</title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


	<link href="../album.css" rel="stylesheet">
</head>


<body >
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Foster Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      
    </ul>
  </div>
</nav>

<h1>Welcome Back <?=currentUser2()->getFirstName()?>!</h1>
	<div class="container-fluid">
		<div class="row">
			<nav class="col-md-2 d-none d-md-block bg-light sidebar">
				<div class="sidebar-sticky">
					<ul class="nav flex-column">
						<li class="nav-item">
							<a class="nav-link active" >
								<span data-feather="shopping-cart"></span>
								Children 
							</a>
						</li>
						<li class="nav-item" >
							<a class="nav-link" href="<?=$router->pathFor('medRec')?>">
								<span data-feather="shopping-cart"></span>
								Medical Records 
							</a>
						</li>
						<li class="nav-item" >
							<a class="nav-link" href="<?=$router->pathFor('personalDoc')?>">
								<span data-feather="users"></span>
								Personal Documents
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link">
								<span data-feather="bar-chart-2"></span>
								Biological Parent
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link">
								<span data-feather="layers"></span>
								New Parents
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link">
								<span data-feather="layers"></span>
								Waiting Parents
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link">
								<span data-feather="layers"></span>
								Expenses
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link">
								<span data-feather="layers"></span>
								Rooms
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link">
								<span data-feather="layers"></span>
								Food Inventory
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link">
								<span data-feather="layers"></span>
								Necessities
							</a>
						</li>
					</ul>
					


					<br><a href="<?=$router->pathFor('sign_out')?>">( Sign out )</a>
				</div>
			</nav>



			<main role="main" class="col-md-0 ml-sm-auto col-lg-10 px-0">
				


				<h4>Foster Home Children Info</h4>
				<div class="table-responsive">
					<table class="table table-striped table-sm">
						<thead>
							<tr>
								<th>Child Id</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>DOB</th>
								<th>Age</th>
								<th>Gender</th>
								<th>Room Id</th>
								<th>Adopted</th>
								<th>Staff</th>
								<th>Emergency Contact</th>
								<th>Medical Record</th>
								<th>Personal Doc</th>
								<th>Height</th>
								<th>Weight</th>
								
							</tr>
						</thead>

						<?php foreach ($all as $al) { ?>
						<tr>
							<td><?=$al->getChildId()?></td>
							<td><?=$al->getFirstName()?></td>
							
							<td><?=$al->getLastName()?></td>
							<td><?=$al->getDateOfBirth()?></td>
							<td><?=$al->getAge()?></td>
							<td><?=$al->getGender()?></td>
							<td><?=$al->getRoomId()?></td>
							<td><?=$al->getStaffId()?></td>
							<td><?=$al->getEmergencyContact()?></td>
							<td><?=$al->getMedicalRecord()?></td>
							<td><?=$al->getPersonalDocId()?></td>
							<td><?=$al->getHeight()?></td>
							<td><?=$al->getWeight()?></td>

							
								<td>
								<button type="button" class="btn btn-default btn-sm">
						          Edit 
						        </button>
						        <button type="button" class="btn btn-default btn-sm">
						          Delete
						        </button>
							</td>
							
						
						</tr>
						<?php } ?>

					</table>
				</div>
				

			</main>

		</div>

	</div>

		</body>
		</html>
