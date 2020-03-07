<?php
    /**
     * Created by PhpStorm.
     * User: triest
     * Date: 28.02.2020
     * Time: 20:46
     */

    class connector
    {
        private $host;
        private $password;
        private $login;
        private $database;

        /**
         * connector constructor.
         * @param $host
         * @param $password
         * @param $login
         * @param $database
         */
        public function __construct($host, $password, $login, $database)
        {
            $this->host = $host;
            $this->password = $password;
            $this->login = $login;
            $this->database = $database;
        }


    }