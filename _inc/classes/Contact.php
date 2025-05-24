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
        $stmt = $this->db->prepare("SELECT * FROM contact");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function destroy($id)
    {
        $stmt = $this->db->prepare("DELETE FROM contact WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function create($name, $email, $phone)
    {
        $stmt = $this->db->prepare(
            "INSERT INTO contact (name, email, phone) VALUES (:name, :email, :phone)"
        );
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function show($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM contact WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function edit($id, $name, $email, $phone)
    {
        $stmt = $this->db->prepare(
            "UPDATE contact SET name = :name, email = :email, phone = :phone WHERE id = :id"
        );
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":phone", $phone, PDO::PARAM_STR);
        return $stmt->execute();
    }
}
?>