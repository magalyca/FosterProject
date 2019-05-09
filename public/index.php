<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
// invoke autoload to get access to the propel generated models


// require the config file that propel init created with your db connection information
require_once '../vendor/autoload.php';
require_once '../generated-conf/config.php';
require '../functions.php';

$config['displayErrorDetails'] = true;

$app = new \Slim\App(["settings" => $config]);

$container = $app->getContainer();
$container['view'] = new \Slim\Views\PhpRenderer("../template/views/");
// now this script can access the database through the propel models!

// retreive a person by id and print their name
// note that the getters were generated based on the db col names first_name and last_name

$app->get('/sign_out', function (Request $request, Response $response, array $args) {
    signUserOut();

    return $response->withRedirect($this->router->pathFor('home'));
})->setName('sign_out');

//not sign in
$app->group('', function () use ($app) {
    $app->get('/', function (Request $request, Response $response, array $args) {
        return $this->view->render($response, 'home.html', ['router'=>$this->router]);
    })->setName('home');


    // post here when trying to sign in or sign up
    $app->post('/', function (Request $request, Response $response, array $args) {
        $post = $request->getParsedBody();

        $email = $post['Email'];
        $password = $post['Password'];

        if (isset($post['signin'])) {
        // trying to sign IN
            if ($email == 'admin@admin') {
                $admin=\AdminQuery::create()->findOneByEmail($email);
                signUserIn($admin->getId());
                return $response->withJSON(['success'=>true, 'path'=>$this->router->pathFor('admin')]);
            } else {
                $user = \StaffQuery::create()->findOneByEmail($email);

                if ($user == null) {
                    return $response->withJSON(['success'=>false]);
                }
                //function created in Logins.php (model/map)
                if (!$user->logIn($password)) {
                    return $response->withJSON(['success'=>false]);
                }

                //function in functions.php
                signUserIn($user->getStaffId());
                //redirect them to main page after signing in

                return $response->withJSON(['success'=>true, 'path'=>$this->router->pathFor('staff')]);
            }
        }
    });
});
//->add(function ($request, $response, $next) {
   // if (currentUser() != null) {
     //   return $response->withRedirect($this->router->pathFor('home'));
    //}

    //return $next($request, $response);
//});


//sign in
$app->group('/user', function () use ($app) {
    $app->get('/admin', function (Request $request, Response $response, array $args) {
   
        $all = \StaffQuery::create()->find();
    	
        return $this->view->render(
        $response,
        'adminView.php',
        ['router'=>$this->router, 'all'=>$all]
        );
    })->setName('admin');

      // create new item
  

     $app->get('/child', function (Request $request, Response $response, array $args) {
    $all = \ChildQuery::create()->find();
    return $this->view->render(
        $response,
        'child.php',
        ['router'=>$this->router,'all'=>$all]
        );
    })->setName('child');

     $app->post('/child', function (Request $request, Response $response, array $args) {
        $post = $request->getParsedBody();
        if ($post['Childid'] != "-1") {
            // trying to edit
            $book= \ChildQuery::create()->findOneByChildId($post['Childid']);
        } else { //create new staff
            $book = new \Child();
        }
        foreach ($post as $key => $value) {
            // make a new staff user from incoming data
            if ($key != "Childid") {
                $book->setByName($key, $value);
            }
        }
        $book->save();

        return $response->withJSON(['success'=>true, 'path'=>$this->router->pathFor('child')]);
    });
     

     $app->get('/staff', function (Request $request, Response $response, array $args) {

        $all = \ChildQuery::create()->find();
        return $this->view->render(
        $response,
        'staffView.php',
        ['router'=>$this->router, 'all'=>$all]
        );
    })->setName('staff');

     $app->get('/medRecord', function (Request $request, Response $response, array $args) {

        $all = \MedicalrecordQuery::create()->find();
        return $this->view->render(
        $response,
        'medicalRecords.php',
        ['router'=>$this->router, 'all'=>$all]
        );
    })->setName('medRec');

      $app->post('/medRecord', function (Request $request, Response $response, array $args) {
        $post = $request->getParsedBody();
        if ($post['Medrecordid'] != "-1") {
            // trying to edit
            $book= \MedicalRecordQuery::create()->findOneByMedRecordId($post['Medrecordid']);
        } else { //create new staff
            $book = new \Medicalrecord();
        }
        foreach ($post as $key => $value) {
            // make a new staff user from incoming data
            if ($key != "Medrecordid") {
                $book->setByName($key, $value);
            }
        }
        $book->save();

        return $response->withJSON(['success'=>true, 'path'=>$this->router->pathFor('medrec')]);
    });

     $app->get('/personalDoc', function (Request $request, Response $response, array $args) {

        $all = \PersonaldocumentQuery::create()->find();
        return $this->view->render(
        $response,
        'personalDoc.php',
        ['router'=>$this->router, 'all'=>$all]
        );
    })->setName('personalDoc');

     $app->get('/bioParent', function (Request $request, Response $response, array $args) {

        $all = \BiologicalparentQuery::create()->find();
        return $this->view->render(
        $response,
        'bioParent.php',
        ['router'=>$this->router, 'all'=>$all]
        );
    })->setName('bioParent');

    $app->get('/newParent', function (Request $request, Response $response, array $args) {

        $all = \NewparentQuery::create()->find();
        return $this->view->render(
        $response,
        'newParent.php',
        ['router'=>$this->router, 'all'=>$all]
        );
    })->setName('newParent');

    $app->get('/waitParent', function (Request $request, Response $response, array $args) {

        $all = \WaitingparentQuery::create()->find();
        return $this->view->render(
        $response,
        'waitingParent.php',
        ['router'=>$this->router, 'all'=>$all]
        );
    })->setName('waitParent');

    $app->get('/expense', function (Request $request, Response $response, array $args) {

        $all = \ExpensesQuery::create()->find();
        return $this->view->render(
        $response,
        'expenses.php',
        ['router'=>$this->router, 'all'=>$all]
        );
    })->setName('expense');

    $app->get('/room', function (Request $request, Response $response, array $args) {

        $all = \RoomsQuery::create()->find();
        return $this->view->render(
        $response,
        'rooms.php',
        ['router'=>$this->router, 'all'=>$all]
        );
    })->setName('room');

     $app->get('/food', function (Request $request, Response $response, array $args) {

        $all = \FoodinventoryQuery::create()->find();
        return $this->view->render(
        $response,
        'food.php',
        ['router'=>$this->router, 'all'=>$all]
        );
    })->setName('food');


        $app->post('/food', function (Request $request, Response $response, array $args) {
        $post = $request->getParsedBody();
        if ($post['Foodid'] != "-1") {
            // trying to edit
            $book= \FoodinventoryQuery::create()->findOneByFoodid($post['Foodid']);
        } else { //create new staff
            $book = new \Foodinventory();
        }
        foreach ($post as $key => $value) {
            // make a new staff user from incoming data
            if ($key != "Foodid") {
                $book->setByName($key, $value);
            }
        }
        $book->save();

        return $response->withJSON(['success'=>true, 'path'=>$this->router->pathFor('food')]);
    });

    $app->get('/needs', function (Request $request, Response $response, array $args) {

        $all = \NecessitiesQuery::create()->find();
        return $this->view->render(
        $response,
        'necessities.php',
        ['router'=>$this->router, 'all'=>$all]
        );
    })->setName('needs');

        $app->post('/needs', function (Request $request, Response $response, array $args) {
        $post = $request->getParsedBody();
        if ($post['Necessitiesid'] != "-1") {
            // trying to edit
            $book= \NecessitiesQuery::create()->findOneByNecessitiesid($post['Necessitiesid']);
        } else { //create new staff
            $book = new \Necessities();
        }
        foreach ($post as $key => $value) {
            // make a new staff user from incoming data
            if ($key != "Necessitiesid") {
                $book->setByName($key, $value);
            }
        }
        $book->save();

        return $response->withJSON(['success'=>true, 'path'=>$this->router->pathFor('needs')]);
    });

    $app->get('/update', function (Request $request, Response $response, array $args) {

        $all = \StaffQuery::create()->find();
        return $this->view->render(
        $response,
        'update.php',
        ['router'=>$this->router, 'all'=>$all]
        );
    })->setName('update');

      $app->post('/update', function (Request $request, Response $response, array $args) {
        $post = $request->getParsedBody();
        if ($post['Staffid'] != "-1") {
            // trying to edit
            $book= \StaffQuery::create()->findOneByStaffId($post['Staffid']);
        } else { //create new staff
            $book = new \Staff();
        }
        foreach ($post as $key => $value) {
            // make a new staff user from incoming data
            if ($key != "Staffid") {
                $book->setByName($key, $value);
            }
        }
        $book->save();

        return $response->withJSON(['success'=>true, 'path'=>$this->router->pathFor('update')]);
    });

})->add(function ($request, $response, $next) {
    if (currentUser() == null) {
        return $response->withRedirect($this->router->pathFor('home'));
    }
    return $next($request, $response);
});

$app->run();