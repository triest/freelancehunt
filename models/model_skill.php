<?php

    Class Model_Skill
    {
        public $name;
        public $id;

        public static function get($id)
        {
            global $mysqli;

            if ($stmt = $mysqli->prepare("select * from `skills` where `id`=? limit 1")) {
                $stmt->bind_param('s', $id);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result && $result->num_rows > 0) {
                    $item = new Model_Skill();
                    while ($row = $result->fetch_assoc()) {
                        $item->id = intval($row['id']);
                        $item->name = $row['name'];
                    }
                    return $item;
                }
            } else {
                return null;
            }
        }

        public static function getAll()
        {
            global $mysqli;
            if ($stmt = $mysqli->prepare("select * from `skills`")) {
               // $stmt->bind_param('s', $id);
                $stmt->execute();
                $result = $stmt->get_result();
                $array_skils = array();
                if ($result && $result->num_rows > 0) {
                    $item = new Model_Skill();
                    while ($row = $result->fetch_assoc()) {

                        $item->id = intval($row['id']);
                        $item->name = $row['name'];
                        $array_skils[] = $item;
                    }
                    return $array_skils;
                }


            }
        }

        public function getProjects()
        {
            global $mysqli;
            $array_project = array();

            if ($stmt = $mysqli->prepare("select * from `project_skill` where `skill_id `=? limit 1")) {
                $stmt->bind_param('i', $this->id);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $item = Model_Project::get(intval($row['project_id']));
                        $array_project[] = $item;
                    }
                    return $array_project;
                }
            } else {
                return null;
            }
        }

        public function getCountProject()
        {
            return count($this->getProjects());
        }


    }