<?php 

Class ShowTimes extends db{
    
    public function getMovieTime($id){
        $query = "SELECT * FROM showtimes WHERE movie_id = :id";
        $stmt=$this->connect()->prepare($query);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}