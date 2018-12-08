<?php
    class BaseDeDatos {
        

        public function EjecutarQuery($sql){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "publicis";
            $conn = new mysqli($servername, $username, $password,$database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } else {
                $error = $conn->error;
                error_log($error);
                if (strpos($sql, "INSERT INTO usuario") === 0) {
                    echo "El nombre de usuario no está disponible";
                 }
                
            }
            $conn->close();
        }
        
        public function ObtenerResultado($sql){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "publicis";
            $conn = new mysqli($servername, $username, $password,$database);
            $result = $conn->query($sql);
            if($result === FALSE){
                $error = $conn->error;
                error_log($error);
            } 
            $conn->close();
            return $result;
                    
        }
    }
    
    
    