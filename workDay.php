<?php

require_once 'DB.php';


class workDay{
    const required_work_hour_daily = 8;

    public $pdo;

    public function __construct(){
        $db = new DB();
        $this->pdo = $db->pdo;
    }

    public function store(
        string $name,
        string $arrived_at,
        string $leaved_at

    ){
        $arrived_at = new DateTime($arrived_at);
        $leaved_at = new DateTime($leaved_at);

         
        $sql = "INSERT INTO work_times(name, arrived_at, leaved_at, required_of) VALUES (:name, :arrived_at, :leaved_at,:required_of)";
        $stmt = $this->pdo->prepare($sql);
        
        $diff = $arrived_at->diff($leaved_at);
        $hour = $diff->h;
        $minute = $diff->i;
        $secund = $diff->s;
        $total = ((self::required_work_hour_daily * 3600)) - (($hour * 3600) + ($minute * 60));

        $stmt->bindParam(":name", $name);
        $stmt->bindValue(":arrived_at", $arrived_at->format('Y-m-d H:i'));
        $stmt->bindValue(":leaved_at", $leaved_at->format('Y-m-d H:i'));
        $stmt->bindParam('required_of', $total);
        $stmt->execute();  
        header('Location: index.php');
        return;
    }

    public function getWorDayList () {
        $query = "SELECT * FROM work_times";
        $stmt = $this->pdo->query($query);
        return  $stmt->fetchAll();
    }


    public function calculateDebtTimeForEachUser () {
        $query = "SELECT name, SUM(required_of) as debt FROM  work_times GROUP BY name";
        $stmt = $this->pdo->query($query);
        return  $stmt->fetchAll();
    }

    public function markAsDone(int $id) {
        $query = "UPDATE work_times SET required_of = 0 WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
    
    }


