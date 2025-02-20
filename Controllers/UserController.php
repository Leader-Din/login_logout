<?php
require_once "Models/UserModel.php";
class UserController extends BaseController {
    private $users;
    public function __construct() {
        $this->users = new UserModel();
    }
    public function index() {
        $users = $this->users->getUsers();
        $this->view("users/users_list", ['users' => $users]);
    }

    public function create() {
        $this->view("users/create");
    }

    public function store() {
        $name = htmlentities($_POST['name']);
        $email = htmlentities($_POST['email']);
        $password = htmlentities($_POST['password']);
        $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
        $role = htmlentities($_POST['role']);
        try {
            $this->users->createUser($name, $email, $encrypted_password, $role);
            header("Location: /users");
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) { // Duplicate entry error code
                $this->view("users/create", ['error' => 'Email already exists.']);
            } else {
                throw $e;
            }
        }
    }

    public function edit($id) {
        $user = $this->users->getUserById($id);
        $this->view("users/edit", ['user' => $user]);
    }
    public function update($id) {
        $name = htmlentities($_POST['name']);
        $email = htmlentities($_POST['email']);
        $role = htmlentities($_POST['role']);
        $this->users->updateUser($id, $name, $email, $role);
        header("Location: /users");
    }  
    public function delete($id) {
        $this->users->deleteUser($id);
        header("Location: /users");
    }
    // show view login form
    public function login() {
        $this->view("users/login");
    }
    public function authenticate() {
        session_start();
        $email = htmlspecialchars ($_POST['email']);
        $password = htmlspecialchars ($_POST['password']);
        $user = $this->users->getUserByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];
            $this->redirect("/users");
        } else {
            header("Location: /users/login-error");
            exit();
        }    
        
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        $this->redirect("/");
    }

    public function loginError() {
        $this->view('login_error');
    }
}
