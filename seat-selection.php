<?php

    require_once("Classes/connect.php");
    require_once("Classes/Movie.php");
    require_once("Classes/Booking.php");

    $book = new Booking;
    if(isset($_GET["movie"]) && isset($_GET["time"])){
        $movie_selected = $_GET["movie"];
        $time_selected = $_GET["time"];

        $movieObj = new Movie;
        $movie = $movieObj->getMovieData($movie_selected);
        $movie_reservation = $book->getMovieReservation($movie_selected,$time_selected);
        $booked_seats = array_column($movie_reservation,"seat_number");

    }else{
        header("location: index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Select Your Seat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white min-h-screen flex flex-col items-center py-10">

    <h1 class="text-3xl font-bold text-[#D4AF37] mb-2">SELECT YOUR SEAT</h1>
    <p class="text-gray-400 mb-8">For <?= $movie['movie_name'] ?></p>

    <form action="Includes/Booking.php" method="POST" class="w-full max-w-4xl flex flex-col items-center">
        
        <input type="hidden" name="time_selected" value="<?= $time_selected ?>">
        <input type="hidden" name="movie_selected" value="<?= $movie_selected ?>" >
        
        <div class="mb-10 p-10 border border-gray-800 rounded bg-gray-900">
            <p class="text-center text-gray-500 mb-5">Screen</p>
            <div class="grid grid-cols-5 gap-4">
                <?php for($i=1; $i<=20; $i++): ?>
                    <label class="cursor-pointer">
                        <input type="radio" name="seat_number" value="<?= $i ?>" class="peer sr-only">
                         <div class="w-10 h-10 rounded border border-gray-600 flex items-center justify-center 
                                <?= in_array($i, $booked_seats) ? 'bg-gray-700 text-gray-500' : 'peer-checked:bg-[#D4AF37] peer-checked:text-black hover:bg-gray-700' ?> transition">
        <?= $i ?>
    </div>
                    </label>
                <?php endfor; ?>
            </div>
        </div>

        <div class="mb-8 w-full max-w-md">
            <label class="block text-[#D4AF37] text-sm font-bold tracking-widest mb-2">YOUR NAME</label>
            <input type="text" name="user_name" required 
                   class="w-full bg-transparent border-b border-gray-600 py-2 text-white focus:outline-none focus:border-[#D4AF37] transition"
                   placeholder="Enter your full name">
        </div>

        <button type="submit" name="confirm_booking" 
                class="bg-white text-black font-bold py-4 px-10 hover:bg-[#D4AF37] transition uppercase tracking-widest">
            Confirm & Pay
        </button>

    </form>

</body>
</html>