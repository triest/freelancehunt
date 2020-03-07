<?php

// контролер
    Class Controller_login Extends Controller_Base
    {

        // шаблон
        public $layouts = "first_layouts";

        // экшен
        function index()
        {

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $email = $_POST["email"];
                $password = $_POST["password"];
                $user = new Model_Users();

                if($user->login($email, $password)){
                    header("Location: /");
                }else{
                    $this->template->vars('error', true);
                    $this->template->view('login');
                }
            } else {
                $this->template->vars('error', false);
                $this->template->view('login');
            }
        }

        function logout()
        {
            $_SESSION['auth_user'] = "";

            header("Location: /");
        }


    }