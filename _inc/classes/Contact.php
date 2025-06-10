<?php
class Contact
{
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database->getConnection();
    }

    public function index()
    {
        $query = "SELECT * FROM contact";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function destroy($id)
    {
        $query = "DELETE FROM contact WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        
        return $stmt->execute();
    }

    public function create($name, $email, $phone, $course)
    {
        $query = "INSERT INTO contact (name, email, phone, course) 
                  VALUES (:name, :email, :phone, :course)";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
        $stmt->bindParam(":course", $course, PDO::PARAM_STR);
        
        return $stmt->execute();
    }

    public function show($id)
    {
        $query = "SELECT * FROM contact WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function edit($id, $name, $email, $phone, $course)
    {
        $query = "UPDATE contact 
                  SET name = :name, email = :email, phone = :phone, course = :course 
                  WHERE id = :id";
        $stmt = $this->db->prepare($query);
        
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
        $stmt->bindParam(":course", $course, PDO::PARAM_STR);
        
        return $stmt->execute();
    }
}
?>