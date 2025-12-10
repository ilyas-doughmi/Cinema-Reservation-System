<?php

Class Booking extends db{
    public function getAllReservations(){
        $query = "SELECT * FROM booking";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getMovieReservation($movie_id){
        $query = "SELECT * FROM booking WHERE show_id = :movie_id";
        $stmt= $this->connect()->prepare($query);
        $stmt->bindParam(":movie_id",$movie_id);
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}