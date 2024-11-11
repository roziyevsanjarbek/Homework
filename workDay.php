<?php

require 'DB.php';

class WorkDay{
    const REQUIRED_HOUR_DURATION = 8;
    public $conn;
    public function __construct () {
        $db = new DB();
        $this->conn = $db->pdo;
    }
    public function store (string $name, string $arrived_at, string $leaved_at) {
        $arrived_at = new DateTime($arrived_at);
        $leaved_at = new DateTime($leaved_at);
        $diff = $arrived_at->diff($leaved_at);
        $hour = $diff->h;
        $minute = $diff->i;
        $total = ((self::REQUIRED_HOUR_DURATION * 3600) - (($hour * 3600) + ($minute * 60)));
        $query = "INSERT INTO work_times (name,arrived_at,leaved_at, required_of) 
                        VALUES (:name, :arrived_at, :leaved_at, :required_of)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindValue(':arrived_at', $arrived_at->format('Y-m-d H:i'));
        $stmt->bindValue(':leaved_at', $leaved_at->format('Y-m-d H:i'));
        $stmt->bindParam(':required_of', $total);
        $stmt->execute();
        header('Location: index.php');
        return;
    }
    public function getWorkDayList () {
        $query = "SELECT * FROM work_times ORDER BY arrived_at DESC";
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function calculateDebtTimeForEachUser () {
        $query = "SELECT name, SUM(required_of) as debt FROM work_times GROUP BY name";
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll();
    }
    public function markAsDone (int $id) {
        $query = "UPDATE work_times SET required_of = 0 WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        header('Location: index.php');
    }
    public function getWorkDayListWithPagination (int $offset) {
        $offset = $offset ? ($offset * 10)-10 : 0;
        $query = "SELECT * FROM work_times ORDER BY arrived_at DESC LIMIT 10 OFFSET " . $offset;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getTotalRecords () {
        $query = "SELECT COUNT(id) as pageCount FROM work_times";
        $stmt = $this->conn->query($query);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function calculatePageCount () {
        $total = $this->getTotalRecords()['pageCount'];
        return ceil($total/10);
    }
}

