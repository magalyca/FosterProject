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

      $app->delete('/medRecord/{pnid}/',function($request, $response, $args){
            //check that they are authorized to edit
            //
            $all = \MedicalrecordQuery::create()->findPk($args['pnid']);
            $all->delete();
            return $this->view->render($response,
                'medicalRecords.php',
        ['router'=>$this->router, 'all'=>$all]
        );
                          
        })->setName('medRecord/{pnid}');


     $app->get('/personalDoc', function (Request $request, Response $response, array $args) {

        $all = \PersonaldocumentQuery::create()->find();
        return $this->view->render(
        $response,
        'personalDoc.php',
        ['router'=>$this->router, 'all'=>$all]
        );
    })->setName('personalDoc');

     $app->post('/personalDoc', function (Request $request, Response $response, array $args) {
        $post = $request->getParsedBody();
        if ($post['Documentid'] != "-1") {
            // trying to edit
            $book= \PersonaldocumentQuery::create()->findOneByDocumentid($post['Documentid']);
        } else { //create new staff
            $book = new \Personaldocument();
        }
        foreach ($post as $key => $value) {
            // make a new staff user from incoming data
            if ($key != "Documentid") {
                $book->setByName($key, $value);
            }
        }
        $book->save();

        return $response->withJSON(['success'=>true, 'path'=>$this->router->pathFor('personalDoc')]);
    });

        $app->delete('/personalDoc/{pnid}/',function($request, $response, $args){
            //check that they are authorized to edit
            //
            $all = \PersonaldocumentQuery::create()->findPk($args['pnid']);
            $all->delete();
            return $this->view->render($response,
                'personalDoc.php',
        ['router'=>$this->router, 'all'=>$all]
        );
                          
        })->setName('personalDoc/{pnid}');


    $app->get('/bioParent', function (Request $request, Response $response, array $args) {

        $all = \BiologicalparentQuery::create()->find();
        return $this->view->render(
        $response,
        'bioParent.php',
        ['router'=>$this->router, 'all'=>$all]
        );
    })->setName('bioParent');

    $app->post('/bioParent', function (Request $request, Response $response, array $args) {
        $post = $request->getParsedBody();
        if ($post['Bioparentid'] != "-1") {
            // trying to edit
            $book= \BiologicalparentQuery::create()->findOneByBioparentid($post['Bioparentid']);
        } else { //create new staff
            $book = new \Biologicalparent();
        }
        foreach ($post as $key => $value) {
            // make a new staff user from incoming data
            if ($key != "Bioparentid") {
                $book->setByName($key, $value);
            }
        }
        $book->save();

        return $response->withJSON(['success'=>true, 'path'=>$this->router->pathFor('bioParent')]);
    });

     $app->delete('/bioParent/{pnid}/',function($request, $response, $args){
            //check that they are authorized to edit
            //
            $all = \BiologicalparentQuery::create()->findPk($args['pnid']);
            $all->delete();
            return $this->view->render($response,
                'bioParent.php',
        ['router'=>$this->router, 'all'=>$all]
        );
                          
        })->setName('bioParent/{pnid}');

    $app->get('/newParent', function (Request $request, Response $response, array $args) {

        $all = \NewparentQuery::create()->find();
        return $this->view->render(
        $response,
        'newParent.php',
        ['router'=>$this->router, 'all'=>$all]
        );
    })->setName('newParent');

    $app->post('/newParent', function (Request $request, Response $response, array $args) {
        $post = $request->getParsedBody();
        if ($post['Newparentid'] != "-1") {
            // trying to edit
            $book= \NewparentQuery::create()->findOneByNewparentid($post['Newparentid']);
        } else { //create new staff
            $book = new \Newparent();
        }
        foreach ($post as $key => $value) {
            // make a new staff user from incoming data
            if ($key != "Newparentid") {
                $book->setByName($key, $value);
            }
        }
        $book->save();

        return $response->withJSON(['success'=>true, 'path'=>$this->router->pathFor('newParent')]);
    });

    $app->delete('/newParent/{pnid}/',function($request, $response, $args){
            //check that they are authorized to edit
            //
            $all = \NewparentQuery::create()->findPk($args['pnid']);
            $all->delete();
            return $this->view->render($response,
                'newParent.php',
        ['router'=>$this->router, 'all'=>$all]
        );
                          
        })->setName('newParent/{pnid}');

    $app->get('/waitParent', function (Request $request, Response $response, array $args) {

        $all = \WaitingparentQuery::create()->find();
        return $this->view->render(
        $response,
        'waitingParent.php',
        ['router'=>$this->router, 'all'=>$all]
        );
    })->setName('waitParent');

     $app->post('/waitParent', function (Request $request, Response $response, array $args) {
        $post = $request->getParsedBody();
        if ($post['Waitingparentid'] != "-1") {
            // trying to edit
            $book= \WaitingparentQuery::create()->findOneByWaitingparentid($post['Waitingparentid']);
        } else { //create new staff
            $book = new \Waitingparent();
        }
        foreach ($post as $key => $value) {
            // make a new staff user from incoming data
            if ($key != "Waitingparentid") {
                $book->setByName($key, $value);
            }
        }
        $book->save();

        return $response->withJSON(['success'=>true, 'path'=>$this->router->pathFor('waitParent')]);
    });

     $app->delete('/waitParent/{pnid}/',function($request, $response, $args){
            //check that they are authorized to edit
            //
            $all = \WaitingparentQuery::create()->findPk($args['pnid']);
            $all->delete();
            return $this->view->render($response,
                'waitingParent.php',
        ['router'=>$this->router, 'all'=>$all]
        );
                          
        })->setName('waitParent/{pnid}');

    $app->get('/expense', function (Request $request, Response $response, array $args) {

        $all = \ExpensesQuery::create()->find();
        return $this->view->render(
        $response,
        'expenses.php',
        ['router'=>$this->router, 'all'=>$all]
        );
    })->setName('expense');

    $app->post('/expense', function (Request $request, Response $response, array $args) {
        $post = $request->getParsedBody();
        
            $book = new \Expenses();
        
        foreach ($post as $key => $value) {
            // make a new staff user from incoming data
            
                $book->setByName($key, $value);
            
        }
        $book->save();

        return $response->withJSON(['success'=>true, 'path'=>$this->router->pathFor('expense')]);
    });

    $app->get('/room', function (Request $request, Response $response, array $args) {

        $all = \RoomsQuery::create()->find();
        return $this->view->render(
        $response,
        'rooms.php',
        ['router'=>$this->router, 'all'=>$all]
        );
    })->setName('room');

    $app->post('/room', function (Request $request, Response $response, array $args) {
        $post = $request->getParsedBody();
        if ($post['Roomid'] != "-1") {
            // trying to edit
            $book= \RoomsQuery::create()->findOneByRoomid($post['Roomid']);
        } else { //create new staff
            $book = new \Rooms();
        }
        foreach ($post as $key => $value) {
            // make a new staff user from incoming data
            if ($key != "Roomid") {
                $book->setByName($key, $value);
            }
        }
        $book->save();

        return $response->withJSON(['success'=>true, 'path'=>$this->router->pathFor('room')]);
    });

    $app->delete('/room/{pnid}/',function($request, $response, $args){
            //check that they are authorized to edit
            //
            $all = \RooomsQuery::create()->findPk($args['pnid']);
            $all->delete();
            return $this->view->render($response,
                'rooms.php',
        ['router'=>$this->router, 'all'=>$all]
        );
                          
        })->setName('room/{pnid}');

     $app->get('/food', function (Request $request, Response $response, array $args) {

        $all = \FoodinventoryQuery::create()->find();
        return $this->view->render(
        $response,
        'food.php',
        ['router'=>$this->router, 'all'=>$all]
        );
    })->setName('food');

     $app->delete('/food/{pnid}/',function($request, $response, $args){
            //check that they are authorized to edit
            //
            $all = \FoodinventoryQuery::create()->findPk($args['pnid']);
            $all->delete();
            return $this->view->render($response,
                'food.php',
        ['router'=>$this->router, 'all'=>$all]
        );
                          
        })->setName('food/{pnid}');

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


    $app->delete('/needs/{pnid}/',function($request, $response, $args){
            //check that they are authorized to edit
            //
            $all = \NecessitiesQuery::create()->findPk($args['pnid']);
            $all->delete();
            return $this->view->render($response,
                'necessities.php',
        ['router'=>$this->router, 'all'=>$all]
        );
                          
        })->setName('needs/{pnid}');


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

         $app->delete('/update/{pnid}/',function($request, $response, $args){
            //check that they are authorized to edit
            //
            $all = \StaffQuery::create()->findPk($args['pnid']);
            $all->delete();
            return $this->view->render($response,
                'update.php',
        ['router'=>$this->router, 'all'=>$all]
        );
                          
        })->setName('update/{pnid}');


})->add(function ($request, $response, $next) {
    if (currentUser() == null) {
        return $response->withRedirect($this->router->pathFor('home'));
    }
    return $next($request, $response);
});








$app->run();