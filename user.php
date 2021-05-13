<?php
include_once('db.php');

class User extends DB
{
    function register($name, $surname, $email, $dni, $phone)
    {
        $query = "SELECT * FROM users WHERE email=:email";
        $stmt = $this->connect()->prepare($query);
        $res = $stmt->execute(array(":email" => $email));
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($row) {
            echo "Ya hay un usuario con este email";
        } else {
            $query = "INSERT INTO users (name, surname, DNI, phone, email) VALUES (:name,:surname,:dni, :phone, :email)";
            $stmt = $this->connect()->prepare($query);
            if ($stmt->execute(array(':name' => $name, ':surname' => $surname, ':dni' => $dni, ':phone' => $phone, ':email' => $email))) {
                echo "Se ha creado el nuevo registro!";
            }
        }
    }

    function getAll()
    {
        $query = "SELECT * FROM users";
        $stmt = $this->connect()->prepare($query);
        $res = $stmt->execute();
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $users = array();
        $users["users"] = array();
        foreach ($row as $r) {
            $user = array("name" => $r["name"], "email" => $r["email"], "phone" => $r["phone"], "dni" => $r["DNI"], "surname" => $r["surname"]);
            $allUsers = json_encode($user);
            echo "<div class='usrs'><h4 class='tit'>" . $user["name"] . "</h4><p clas='usr'>" . $user["email"] . "</p></div>";
        }
        echo "<a class='submit' href='login.html'>Volver al login</a>";
    }
}
