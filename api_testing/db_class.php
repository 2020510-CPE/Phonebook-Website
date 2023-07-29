<?php

	class db_test {
		private $conn;
		private $db_table = "user";
		
		private $id;
		private $lastname;
		private $firstname;
		private $address;
		private $gender;
		private $number;
		private $age;


		public function __construct($db) {
			$this->conn = $db;
		}
		
		public function setData() {
 
		}

    public function readData() {
        try {
            $query = "SELECT * FROM " . $this->db_table;
            $stmt = $this->conn->prepare($query);

            if ($stmt->execute()) {
                return $stmt;
            }
            return false;

        } catch (PDOException $e) {
            echo "Error in retrieving data: " . $e->getMessage();
            return false;
        }
    }

    public function addUser($firstname, $lastname, $gender, $age, $address, $phoneNumber) {
        try {
            $query = "INSERT INTO " . $this->db_table . " (firstname, lastname, gender, age, address, phoneNumber) VALUES (:firstname, :lastname, :gender, :age, :address, :phoneNumber)";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':gender', $gender);
            $stmt->bindParam(':age', $age);
            $stmt->bindParam(':address', $address);
            $stmt->bindParam(':phoneNumber', $phoneNumber);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo "Error adding user: " . $e->getMessage();
            return false;
        }
    }
}
?>