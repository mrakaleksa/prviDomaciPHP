<?php 

    class Player{

        public $playerID;
        public $name;
        public $age;
        public $country;
        public $contract;

        public function __construct($playerID = null, $name = null, $age = null, $country = null, $contract = null)
        {
            $this->playerID = $playerID;
            $this->name = $name;
            $this->age = $age;
            $this->country = $country;
            $this->contract = $contract;
            
        }

        public static function getAll(mysqli $conn)
        {
            $q = "SELECT * FROM player";
            return $conn->query($q);
        }

        public static function deleteById($playerID, mysqli $conn)
        {
            $q = "DELETE FROM player WHERE playerID = $playerID";
            return $conn->query($q);
        }

        public static function add($name, $age, $country, $contract, mysqli $conn)
        {

            $q = "INSERT INTO player(name, age, country, contract) VALUES('$name', '$age', '$country',  '$contract')";
            return $conn->query($q);
        }


        public static function update($playerID, $name, $age, $country, $contract, mysqli $conn)
        {
            $q = "UPDATE player SET name='$name', age='$age', country='$country', contract='$contract' WHERE playerID = $playerID";
            return $conn->query($q);
        }

        public static function getById($playerID, mysqli $conn)
        {
            $q = "SELECT * FROM player WHERE playerID = $playerID";
            $myArray = array();
            if ($result = $conn->query($q)) {

                while ($row = $result->fetch_array(1)) {
                    $myArray[] = $row;
                }
            }
            return $myArray;
        }

        public static function getLast(mysqli $conn)
        {
            $q = "SELECT * FROM player ORDER BY playerID DESC LIMIT 1";
            return $conn->query($q);
        }




    }



?>