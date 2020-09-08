<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;


class SettingsController extends Controller {
    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checkLogin();
        if($this->loggedUser === false) {
            $this->redirect('/login');
        }
    }

    public function index() {
        $user = UserHandler::getUser($this->loggedUser->id);

        $flash = '';
        if(!empty($_SESSION['flash'])) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }

        $this->render('settings',[
            'loggedUser' => $this->loggedUser,
            'user' => $user,
            'flash' => $flash
        ]);
    }

    public function save() {
        $name = filter_input(INPUT_POST, 'name');
        $birthdate = filter_input(INPUT_POST, 'birthdate');
        $email = filter_input(INPUT_POST, 'email');
        $city = filter_input(INPUT_POST, 'city');
        $work = filter_input(INPUT_POST, 'work');
        $password = filter_input(INPUT_POST, 'password');
        $passwordConfirm = filter_input(INPUT_POST, 'password_confirm');

        if($name && $email) {
            $updateFields = [];

            $user = UserHandler::getUser($this->loggedUser->id);

            if($user->email != $email) {
                if(!UserHandler::emailExists($email)){
                    $updateFields['email'] = $email;
                } else {
                    $_SESSION['flash'] = 'E-mail já existe!';
                    $this->redirect('/configuracoes');
                }
            }


            if(!empty($password)) {
                if($password === $passwordConfirm) {
                    $updateFields['password'] = $password;
                } else {
                    $_SESSION['flash'] = 'As senhas não batem.';
                    $this->redirect('/configuracoes');
                }
            }

            $updateFields['name'] = $name;
            $updateFields['city'] = $city;
            $updateFields['work'] = $work;

            UserHandler::updateUser($updateFields, $this->loggedUser->id);
                     
        }
        $this->redirect('/configuracoes');

    }
    

}