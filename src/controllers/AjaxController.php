<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\UserHandler;
use src\handlers\PostHandler;

class AjaxController extends Controller {

    private $loggedUser;

    public function __construct() {
        $this->loggedUser = UserHandler::checklogin();
        if($this->loggedUser === false) {
            header("Content-Type: application/json");
            echo json_encode(['error' => 'Usuario não logado']);
            exit;
        }
    }

    public function like($atts) {
        $id = $atts['id'];
        
        if(PostHandler::isLiked($id,$this->loggedUser->id)) {
            PostHandler::deleteLike($id,$this->loggedUser->id);
        } else {
            PostHandler::addLike($id,$this->loggedUser->id);
        }

        
    }

}