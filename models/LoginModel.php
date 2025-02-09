<?php

include_once('db/database.php');

class LoginModel
{
    private $db;
                         
    public function __construct()
    {
        $this->db = new Database();
    }

    public function login_validation($email, $nohp, $sandi) {

        $sql = "SELECT id, email, nama, nohp, sandi, level FROM users WHERE email = :email";
        $params = array(":email" => $email);
        $stmt = $this->db->executeQuery($sql, $params);
        
        if ($stmt !== false && !empty($stmt))  {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $hashed_password = $row['sandi'];
            $nama = $row['nama'];
            $db_nohp = $row['nohp']; // nomor HP dari database
            $level = $row['level'];
    
            if ($nohp !== $db_nohp) { // periksa apakah nomor HP sesuai
                $response = array(
                    "success" => false,
                    "message" => "Invalid phone number"
                );
            } elseif (password_verify($sandi, $hashed_password)) { // verify passwords
                $_SESSION['nama'] = $nama;
                $_SESSION['nohp'] = $db_nohp;
                $_SESSION['email'] = $email;
                $_SESSION['level'] = $level;

                $response = array(
                    "success" => true,
                    "message" => "Login successful"
                );
            } else {
                $response = array(
                    "success" => false,
                    "message" => "Invalid password"
                );
            }
        } else {
            $response = array(
                "success" => false,
                "message" => "User not found"
            );
        }
        
        return json_encode($response);
    }

    public function addUsers($email,$nama,$nohp,$sandi)
    {
        $sql = "INSERT INTO users (email, nama, nohp, sandi) VALUES (:email,:nama,:nohp,:sandi)";
        $pwd = password_hash($sandi, PASSWORD_BCRYPT);
        $params = array(
          ":email" => $email,
          ":nama" => $nama,
          ":nohp" => $nohp,
          ":sandi" => $pwd,
          );

        $result= $this->db->executeQuery($sql, $params);
        // Check if the insert was successful
        if ($result) {
            $response = array(
                "success" => true,
                "message" => "Insert successful"
            );
        } else {
            $response = array(
                "success" => false,
                "message" => "Insert failed"
            );
        }
    
        // Return the response as JSON
        return json_encode($response);
    }  
}
