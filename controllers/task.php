<?php

// контролер
    Class Controller_task Extends Controller_Base
    {

        // шаблон
        public $layouts = "first_layouts";

        // экшен
        function index()
        {
            $this->template->view('index');
        }

        function view()
        {
            $task = Model_Task::get(intval($_GET['id']));
            if (isset($_GET["page"])) {
                $page = $_GET["page"];
            } else {
                $page = 1;
            }
            $this->template->vars('task', $task);
            $this->template->vars('page', $page);
            $this->template->view('view');
        }

        function create()
        {

            if($_SESSION['auth_user'] == "" || $_SESSION['auth_user'] == null){
                header('HTTP/1.1 301 Moved Permanently');
                header('Location: /login');
                exit();
            }
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // The request is using the POST method
                /**/
                if (isset($_POST['title'])) {
                    $title = $_POST['title'];
                }
                if (isset($_POST["text"])) {
                    $text = $_POST["text"];
                }

                if (isset($_POST["email"])) {
                    $email = $_POST["email"];
                }


                $model = new Model_Task($title, $email, $text);
                $save = $model->save();


                if ($save == false) {
                    if (isset($_GET["page"])) {
                        $page = $_GET["page"];
                    } else {
                        $page = 1;
                    }

                    $this->template->vars('page', $page);
                    $this->template->vars('error', $save);
                    $this->template->view('create');
                } else {
                    // header("/task/view?id=$save");

                    header('HTTP/1.1 301 Moved Permanently');
                    header('Location: /task/view?id=' . $save);
                    exit();
                }


            } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (isset($_GET["page"])) {
                    $page = $_GET["page"];
                } else {
                    $page = 1;
                }
                $this->template->vars('page', $page);
                $this->template->vars('save', true);
                $this->template->view('create');
            }
        }

        function edit()
        {
            if($_SESSION['auth_user'] == "" || $_SESSION['auth_user'] == null){
                header('HTTP/1.1 301 Moved Permanently');
                header('Location: /login');
                exit();
            }

            if (isset($_GET["page"])) {
                $page = $_GET["page"];
            } else {
                $page = 1;
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $task = Model_Task::get(intval($_GET['id']));

                $task->name = $_POST["title"];

                if ($task->text != $_POST["text"]) {
                    $task->edit = 1;
                } else {
                }

                $task->text = $_POST["text"];
                $task->email = $_POST["email"];
                if (isset($_POST["status"]) && $_POST["status"] == "on") {
                    $task->status = 1;
                } else {
                    $task->status = 0;
                }
                //  $task->update();
                $task->save();
                $this->template->vars('task', $task);
                $this->template->vars('page', $page);
                $this->template->view('edit');

            } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
                if (!isset($_GET["id"])) {

                }
                $task = Model_Task::get(intval($_GET["id"]));
                $this->template->vars('task', $task);
                $this->template->vars('page', $page);
                $this->template->view('edit');
            }
        }

    }