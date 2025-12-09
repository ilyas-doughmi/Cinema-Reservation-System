<?php
Class Movie extends db{

    public function getAllMovies(){
        $query = "SELECT * FROM movie";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}