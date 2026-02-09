<?php 
namespace App\Http\Controllers;
use App\Models\User;
use App\Core\View;

class UserController{

      public function users (){
            $users = User::jibKolchi();
             view::render('home',['users'=>$users]);
      }

      public function createForm(){
             view::render('users_create',[]);
      }

      public function create() {

        $username = trim($_POST['username'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $age = $_POST['age'] ?? null;


        $user = new User([
            'username' => $username,
            'email' => $email,
            'age' => $age
        ]);

        $success = $user->dakhal(); 

        if ($success) {
            header('Location: /'); 
            exit;
        } else {
            header('Location: /create'); 
            exit;
        }
      }
      

      public function editForm(){
          $id = $_GET['id'];
              $user = User::jibWa7d($id);
              view::render('users_edit',['user'=>$user]);
      }


      public function edit() {

             $id = $_POST['id'] ?? null;
             $username = trim($_POST['username'] ?? '');
             $email = trim($_POST['email'] ?? '');
             $age = $_POST['age'] ?? null;
             
           
             $user = User::jibWa7d($id);
             
             if (!$user) {
                 die('User not found.');
                 }
                 
                 $user->username = $username;
                 $user->email = $email;
                 $user->age = $age;
                 
                 $success = $user->dakhal();
                 
                 if ($success) {
                     header('Location: /');
                     exit;
                     } else {
                         die('errrrrrrror');
                         }
            }
                         
                         
            public function deleteUser(){
                    $id = $_POST['id'];
                    $user = User::jibWa7d($id);
                    $user->msa7();
        
                    header('Location: /');
                    exit;
                         
            }
}