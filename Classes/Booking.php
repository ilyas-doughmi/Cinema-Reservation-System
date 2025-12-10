<?php

Class Booking extends db{
    public function getAllReservations(){
        $query = "SELECT * FROM booking";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getMovieReservation($movie_id,$time){
        $query = "SELECT * FROM booking WHERE show_id = :movie_id AND time_id = :time";
        $stmt= $this->connect()->prepare($query);
        $stmt->bindParam(":movie_id",$movie_id);
        $stmt->bindParam(":time",$time);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function reserveMovie($username,$movie_selected,$seat_number,$time){
        $query = "INSERT INTO booking(user_name,show_id,seat_number,time_id) VALUES(:username,:movie,:seatnumber,:time_selected)";
        $stmt= $this->connect()->prepare($query);
        $stmt->bindParam(":username",$username);
        $stmt->bindParam(":movie",$movie_selected);
        $stmt->bindParam(":seatnumber",$seat_number);
        $stmt->bindParam(":time_selected",$time);
        return $stmt->execute();
    }
}