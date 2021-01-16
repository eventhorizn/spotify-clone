<?php
    class User {
        private $con;
        private $username;
        private $email;
        private $firstLastName;

        public function __construct($con, $username) {
            $this->con = $con;
            $this->username = $username;

            $query = mysqli_query($con, "SELECT email, concat(firstName, ' ', lastName) AS 'name' FROM users WHERE username='$this->username'");
            $user = mysqli_fetch_array($query);

            $this->email = $user['email'];
            $this->firstLastName = $user['name'];
        }

        public function getUserName() {
            return $this->username;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getFirstLastName() {
            return $this->firstLastName;
        }
    }
?>