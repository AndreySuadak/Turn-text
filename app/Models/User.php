<?php

    namespace App\Models;

    class User {
        private $name;

        public function setUserName($name) {
            $this->name = $name;
        }

        public function getUserName() {
            return $this->name;
        }
    }
