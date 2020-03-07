<?php

// модель
    Class Model_Task
    {

        protected $table = "tasks";
        public $id = null;
        public $name;
        public $email;
        public $text;
        public $status;
        public $edit=0;

        /**
         * Model_Tasks constructor.
         * @param string $table
         */
        public function __construct($name = null, $email = null, $text = null)
        {
            $this->name = $name;
            $this->email = $email;
            $this->text = $text;
        }

        public static function get($id)
        {
            global $mysqli;

            if ($stmt = $mysqli->prepare("select `id`,`name`,`text`,`email`,`status`,`edit` from `tasks` where `id`=? limit 1")) {
                $stmt->bind_param('s', $id);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result && $result->num_rows > 0) {
                    $task = new Model_Task();
                    while ($row = $result->fetch_assoc()) {
                        $task->id = $row["id"];
                        $task->name = $row["name"];
                        $task->email = $row["email"];
                        $task->text = $row["text"];
                        $task->status = $row["status"];
                        $task->edit = $row["edit"];
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

                return   $mysqli->insert_id;;
            }
        }

        public function update()
        {
            if (!$this->validate()) {
                return $this->validate();
            }

            global $mysqli;
            if ($stmt = $mysqli->prepare("UPDATE `tasks` SET `text` = ?,`name`=?,`email`=?,`status`=?,`edit`=? WHERE `tasks`.`id` = ?")) {
                $stmt->bind_param('sssiii', $this->text, $this->name, $this->email, $this->status, $this->edit,$this->id);
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

    }