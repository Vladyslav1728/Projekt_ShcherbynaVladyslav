<?php

class Review {
    private $db;

    public function __construct(Database $database) {
        $this->db = $database->getConnection();
    }

    public function index() {
        $stmt = $this->db->prepare("SELECT * FROM review");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function destroy($id) {
        $stmt = $this->db->prepare("DELETE FROM review WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function create($name, $email, $message) {
        $stmt = $this->db->prepare("INSERT INTO review (name, email, message) VALUES (:name, :email, :message)");
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function show($id) {
        $stmt = $this->db->prepare("SELECT * FROM review WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function edit($id, $name, $email, $message) {
        $stmt = $this->db->prepare("UPDATE review SET name = :name, email = :email, message = :message WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':message', $message, PDO::PARAM_STR);
        return $stmt->execute();
    }
}
?>