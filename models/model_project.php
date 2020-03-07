<?php

// модель
    Class Model_Project
    {

        protected $table = "project";
        public $id = null;
        public $name;
        public $budget;
        public $customir_login;
        public $customer_name;

        /**
         * Model_Project constructor.
         * @param null $id
         * @param $name
         * @param $budget
         * @param $customir_login
         * @param $customer_name
         */
        public function __construct(
                $id = null,
                $name = null,
                $budget = null,
                $customir_login = null,
                $customer_name = null
        ) {
            $this->id = $id;
            $this->name = $name;
            $this->budget = $budget;
            $this->customir_login = $customir_login;
            $this->customer_name = $customer_name;
        }


        public static function get($id)
        {
            global $mysqli;

            if ($stmt = $mysqli->prepare("select * from `projects` where `id`=? limit 1")) {
                $stmt->bind_param('s', $id);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result && $result->num_rows > 0) {
                    $task = new Model_Project();
                    while ($row = $result->fetch_assoc()) {
                        $task->id = intval($row['id']);
                        $task->name = $row['name'];
                        $task->budget = $row['budget'];
                        $task->customir_login = $row['customir_login'];
                        $task->customer_name = $row['customer_name'];
                    }
                    return $task;
                }
            } else {
                return null;
            }
        }

        public function save()
        {
            global $mysqli;

            if (!$this->validate()) {
                return $this->validate();
            }

            if ($this->id != null) {
                return $this->update();
            }


            $sql = 'INSERT INTO `tasks`( `name`, `email`, `text`) VALUES ("' . $this->name . '","' . $this->email . '","' . $this->text . '")';
            if (!$result = $mysqli->query($sql)) {
                return false;
            } else {

                return $mysqli->insert_id;;
            }
        }

        public function update()
        {
            if (!$this->validate()) {
                return $this->validate();
            }

            global $mysqli;
            if ($stmt = $mysqli->prepare("UPDATE `tasks` SET `text` = ?,`name`=?,`email`=?,`status`=?,`edit`=? WHERE `tasks`.`id` = ?")) {
                $stmt->bind_param('sssiii', $this->text, $this->name, $this->email, $this->status, $this->edit,
                        $this->id);
                $stmt->execute();
                $result = $stmt->get_result();
                return $result;
            }
            return false;
        }

        private function validate()
        {
            if ($this->name != "" && $this->name != null && $this->email != null && $this->email != "" && $this->text != "" && $this->text != null) {

                if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                    return false;
                }
                return true;
            } else {
                return false;
            }
        }


        public function getUser()
        {
            return array('id' => 1, 'name' => 'test_name');
        }

        public function getSkills()
        {
            global $mysqli;
            $array_project = array();

            if ($stmt = $mysqli->prepare("select * from `project_skill` where `project_id `=? limit 1")) {
                $stmt->bind_param('i', $this->id);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $item = Model_Skill::get(intval($row['skill_id']));
                        $array_project[] = $item;
                    }
                }
            } else {
                return null;
            }
        }

    }