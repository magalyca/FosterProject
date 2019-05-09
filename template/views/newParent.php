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

<h1>Welcome Back <?php if(currentUser()->getEmail()=="admin@admin"){ ?> ADMIN </h1> <?php } 
 else{ currentUser2()->getFirstName() ?> !</h1> <?php } ?>
	<div class="container-fluid">
		<div class="row">
			<nav class="col-md-2 d-none d-md-block bg-light sidebar">
				<div class="sidebar-sticky">
					<ul class="nav flex-column">
						<li class="nav-item">
							<a class="nav-link" href="<?=$router->pathFor('admin')?>">
								<span data-feather="home"></span>
								Staff
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?=$router->pathFor('child')?>">
								<span data-feather="shopping-cart"></span>
								Children 
							</a>
						</li>
						<li class="nav-item ">
							<a class="nav-link" href="<?=$router->pathFor('medRec')?>">
								<span data-feather="shopping-cart"></span>
								Medical Records 
							</a>
						</li>
						<li class="nav-item ">
							<a class="nav-link" href="<?=$router->pathFor('personalDoc')?>">
								<span data-feather="users"></span>
								Personal Documents
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?=$router->pathFor('bioParent')?>">
								<span data-feather="bar-chart-2"></span>
								Biological Parent
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active">
								<span data-feather="layers"></span>
								New Parents
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?=$router->pathFor('waitParent')?>">
								<span data-feather="layers"></span>
								Waiting Parents
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?=$router->pathFor('expense')?>">
								<span data-feather="layers"></span>
								Expenses
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?=$router->pathFor('room')?>">
								<span data-feather="layers"></span>
								Rooms
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?=$router->pathFor('food')?>">
								<span data-feather="layers"></span>
								Food Inventory
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?=$router->pathFor('needs')?>">
								<span data-feather="layers"></span>
								Necessities
							</a>
						</li>
					</ul>
					
					<?php if(currentUser()->getEmail()=="admin@admin"){ ?>
						<div id ="map" >
						<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
							<span>More</span>
							<a class="d-flex align-items-center text-muted" href="#">
								<span data-feather="plus-circle"></span>
							</a>
						</h6>
						<ul class="nav flex-column mb-2">

							
							<li class="nav-item">
								<a class="nav-link" href="<?=$router->pathFor('update')?>" >
									<span data-feather="file-text"></span>
									Users Update
								</a>
							</li>
						</ul>
					</div>
					<?php } ?>

					<br><a href="<?=$router->pathFor('sign_out')?>">( Sign out )</a>
				</div>
			</nav>



			<main role="main" class="col-md-0 ml-sm-auto col-lg-10 px-0">
				


				<h4>Foster Home New Parent Applicants Info</h4>
				<div class="table-responsive">
					<table class="table table-striped table-sm">
						<thead>
							<tr>
								<th>New Parent Id</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Child Name</th>
								<th>Telephone</th>
								<th>Email</th>
								<th>Address</th>
								<th>Date Applied</th>
								<th>Biological Child</th>
								<th>Gender</th>
								<th>Age</th>
								<th>Staff Assigned</th>
								
								
								
								
							</tr>
						</thead>

						<?php foreach ($all as $al) { 
							$staff1 = \StaffQuery::create()->findOneByStaffid($al->getStaffid());
							$child1 = \ChildQuery::create()->findOneByChildid($al->getChildid())
							?>
						<tr>
							<td><?=$al->getNewparentid()?></td>
							<td><?=$al->getFirstname()?></td>
							<td><?=$al->getLastname()?></td>

							<td><?=$child1->getFirstname()?> <?=$child1->getLastname() ?></td>

							<td><?=$al->getTelephone()?></td>
							<td><?=$al->getEmail()?></td>
							<td><?=$al->getAddress()?></td>
							<td><?=$al->getDateapplied()?></td>
							<td><?=$al->getBiologicalchild()?></td>
							<td><?=$al->getGender()?></td>
							<td><?=$al->getAge()?></td>
							<td><?=$staff1->getFirstname()?></td>

								<td>
								<button type="button" class="btn btn-default btn-sm">
						          Edit 
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
