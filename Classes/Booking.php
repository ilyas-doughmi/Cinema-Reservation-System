<?php

Class Booking extends db{
    public function getAllReservations(){
        $query = "SELECT * FROM booking";
        $stmt = $this->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}