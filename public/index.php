<?php
require_once __DIR__ . '/../helpers.php';
require_once __DIR__ . '/../Request.php';
require_once __DIR__ . '/../Router.php';
require_once __DIR__ . '/../db/Database.php';

session_start();

$db = new Database();

$router = new Router(new Request);





$router->get('/', 'index');
if (isLoggedIn()) {
$router->get('/profile', 'profile'); }
$router->get('/about', 'about' );
$router->get('/newpost', function () use ($router, $db) {
    return $router->renderOnlyView('newpost', [
        'successpost' => ''
        ]);
});

$router->get('/changemail', function () use ($router, $db) {
    return $router->renderOnlyView('changemail', [
        'emailsuccess' => ''
    ]);
});

$router->get('/delete', 'delete');

$router->get('/users', function () use ($router, $db) {
    return $router->renderOnlyView('users', [
        'users' => $db->getUsers()
    ]);
} );

$router->get('/inbox', function () use ($router, $db) {
    return $router->renderOnlyView('inbox', [
        'contacts' => $db->getMessages()
    ]);
} );


$router->get('/contact', function () use ($router) {
    return $router->renderOnlyView('contact', [
        'sendmessage' => ''
    ]);
});

$router->get('/news', function () use ($router, $db) {
    return $router->renderOnlyView('news', [
        'posts' => $db->getPosts()
    ]);
});
$router->get('/signup', function () use ($router){
      return $router->renderOnlyView('signup', [
          'success' => '',
          'error2' => ''
          ]);
});

$router->get('/login', function () use ($router) {
    return $router->renderOnlyView('login', [
        'error' => '',
        'data' => [
            'email' => ''
        ]
    ]);
});

$router->get('/logout', function(){
    session_unset();
    session_destroy();
    redirect('/');
});

$router->post('/signup', function (IRequest $request) use ($router, $db) {
    $body = $request->getBody();
    if ($db->registerUser($body['username'], $body['email'], $body['password'])) {
       return $router->renderOnlyView('signup', [
           'success' => 'Your account registered succesfully, please login.',
           'error2' => ''
       ]);

    } else {
        return $router->renderOnlyView('signup', [
            'error2' => 'Please enter valid information',
            'success' => ''
        ]);
    }
});


$router->post('/login', function (IRequest $request) use ($router, $db) {
    $body = $request->getBody();
    if ($db->loginUser($body['email'], $body['password'])) {
        redirect('/');
    } else {
        return $router->renderOnlyView('login', [
            'error' => 'Email or Password is Inncorect',
            'data' => [
                'email' => $body['email']
            ]
        ]);
    }
});

$router->post('/contact', function (IRequest $request) use ($router, $db) {
    $body = $request->getBody();
    if ($db->sendMessage($body['name'], $body['surname'], $body['email'], $body['message']))
    {
        return $router->renderOnlyView('contact', [
            'sendmessage' => 'Message has been send succesfully'
        ]);
    }
    else
    {
        redirect('/contact');
    }
});

$router->post('/changemail', function (IRequest $request) use ($router, $db) {
    $body = $request->getBody();
    if ($db->changeEmail($body['email']))
    {
        return $router->renderOnlyView('changemail', [
            'emailsuccess' => 'Email succesfully changed, go back to your user profile.'
        ]);
    }
    else
    {
        redirect('/profile');
    }
});

$router->post('/newpost', function (IRequest $request) use ($router, $db) {
    $body = $request->getBody();
    $username = currentUser()['username'];
    if ($db->writePost($body['name'] ,$username ,$body['message']))
    {
        return $router->renderOnlyView('newpost', [
            'successpost' => 'Posted Succesfully'
        ]);
    }
    else
    {
        redirect('/newpost');
    }
});

/*
$router->post('/delete', function (IRequest $request) use ($router, $db) {
    $body = $request->getBody();

})
*/


