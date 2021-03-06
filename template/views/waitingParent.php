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
							<a class="nav-link" href="<?=$router->pathFor('newParent')?>">
								<span data-feather="layers"></span>
								New Parents
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active">
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
								<a class="nav-link" href="<?=$router->pathFor('update')?>">
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

			<div class="container" align="center">
			<h5>NEW PARENT INFO</h5>
			<form action="" method="post" id="new-item">
				<input type="hidden" name="Waitingparentid" value="-1">
				<p>FIRST NAME:</p>
				<input type="text" name="Firstname" value="">
				<br><br>
				<p>LAST NAME:</P>
				 <input  type="text" name="Lastname" value="" >
				<p>TELEPHONE:</P>
				<input  type="text" name="Telephone" value="" >
				<br>
				<p>EMAIL:</P>
				 <input  type="text" name="Email" value="" >
				<br>
				<p>ADDRESS:</p>
				 <input  type="text" name="Address" value="" >
				 <br>
				 <p>DATE APPLIED:</p>
				 <input  type="text" name="Dateapplied" value="" >
				 <br>
				 <p>OWN CHILDREN:</p>
				 <input  type="text" name="Biologicalchild" value="" >
				 <br>
				 <p>STAFF:</p>
				 <input  type="text" name="Staffid" value="" >
				 <br>
				 <p>GENDER:</p>
				 <input  type="text" name="Gender" value="" >
				 <br>
				 <p>AGE:</p>
				 <input  type="text" name="Age" value="" >
				 <br>
				 <p>Form number:</p>
				 <input  type="text" name="Formid" value="" >
				 <br>
				<button type="submit">GO</button>
			</form>
			<br>
			</div>

			<main role="main" class="col-md-0 ml-sm-auto col-lg-10 px-0">
				


				<h4>Foster Home Waiting Parent Applicants Info</h4>
				<div class="table-responsive">
					<table class="table table-striped table-sm">
						<thead>
							<tr>
								<th>Waiting Parent Id</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Telephone</th>
								<th>Email</th>
								<th>Address</th>
								<th>Date Applied</th>
								<th>Biological Child</th>
								<th>Staff</th>
								<th>Gender</th>
								<th>Age</th>
								<th>Form Id</th>
								
								
							</tr>
						</thead>

						<?php foreach ($all as $al) { 
							$staff1 = \StaffQuery::create()->findOneByStaffid($al->getStaffid());
							$form = \PersonaldocumentQuery::create()->findOneByDocumentid($al->getFormid())?>
						<tr>
							<td><?=$al->getWaitingparentid()?></td>
							<td><?=$al->getFirstname()?></td>
							<td><?=$al->getLastname()?></td>
							<td><?=$al->getTelephone()?></td>
							<td><?=$al->getEmail()?></td>
							<td><?=$al->getAddress()?></td>
							<td><?=$al->getDateapplied()?></td>
							<td><?=$al->getBiologicalchild()?></td>
							<td><?=$staff1->getFirstname()?></td>
							<td><?=$al->getGender()?></td>
							<td><?=$al->getAge()?></td>

							<td><?=$form->getDocumentid()?> <?=$form->getDocType()?></td>

							

								<td>
								<button  class="btn btn-primary edit-btn">Edit</button>
						        <button type="button" class="delete_data" id="<?=$al->getWaitingparentid()?>">
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
		<script src="../js/jquery.min.js"></script>
		<script src="../js/global.js"></script>
		<script src="../js/waitparent.js"></script>

		</html>
