<?php
namespace Src\Controllers;

use config\Database; 
use PDO;

class UserController {
    public function index() {
        header('content-Type: application/json');
        echo json_encode([
            "success" => true,
            "data" => [
                ["id" => 1, "name" => "Admin", "email" => "admin@example.com"],
                ["id" => 2, "name" => "Novi", "email" => "novi@example.com"]
            ]
        ]);
    }

    public function show($id) {
        
        echo json_encode([
            "success" => true,
            "data" => ["id" => $id, "name" => "User $id"]
        ]);
    }
}
