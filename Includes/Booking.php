<?php 

require_once("../Classes/connect.php");
require_once("../Classes/Booking.php");

$book = new Booking();
$all_bookings = $book->getAllReservations();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $time_selected = $_POST["time_selected"];
    $movie_selected = $_POST["movie_selected"];
    $seat_number = $_POST["seat_number"];
    $user_name = $_POST["user_name"];

    $booking =  $book->reserveMovie($user_name,$movie_selected,$seat_number,$time_selected);
    
    if($booking){
        header("location: ../index.php?reservation=success");
        exit;
    }

}