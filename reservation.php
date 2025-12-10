<?php

require_once("Classes/connect.php");
require_once("Classes/Movie.php");
require_once("Classes/ShowTimes.php");
$movie = new Movie;
$show_time = new ShowTimes;


if (isset($_GET["movie"])) {
    $movie_selected = $_GET["movie"];
    $movie_data = $movie->getMovieData($movie_selected);

    $reservation_time = $show_time->getMovieTime($movie_selected);
}

$time_selected = "";
if (isset($_GET["time"])){
    $time_selected = $_GET["time"];
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONYX Cinema | Book Ticket</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;400;600;800&display=swap" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Manrope', 'sans-serif']
                    },
                    colors: {
                        'lux-gold': '#D4AF37',
                        'lux-black': '#000000',
                        'lux-dark-gray': '#111111',
                    }
                }
            }
        }
    </script>

    <style>
        body {
            background-color: #000000;
            color: white;
            overflow-x: hidden;
        }

        /* Smooth fade for the background image */
        .image-fade {
            mask-image: linear-gradient(to right, black 50%, transparent 100%);
            -webkit-mask-image: linear-gradient(to right, black 50%, transparent 100%);
        }

        /* Input styling to look premium */
        .lux-input {
            background: transparent;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            transition: all 0.3s;
        }

        .lux-input:focus {
            outline: none;
            border-bottom: 1px solid #D4AF37;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col md:flex-row">

    <div class="w-full md:w-1/2 h-[50vh] md:h-screen relative overflow-hidden">
        <img src="<?= $movie_data["movie_image"] ?>"
            class="w-full h-full object-cover">

        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent md:bg-gradient-to-r md:from-transparent md:to-black"></div>

        <a href="index.php" class="absolute top-8 left-8 text-white/70 hover:text-lux-gold transition flex items-center gap-2 text-sm font-bold tracking-widest uppercase">
            ← Back to Home
        </a>
    </div>

    <div class="w-full md:w-1/2 bg-lux-black flex flex-col justify-center px-8 md:px-20 py-12">

        <div class="mb-10 border-l-2 border-lux-gold pl-6">
            <span class="text-lux-gold text-xs font-bold tracking-[0.2em] uppercase mb-2 block">Now Booking</span>
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-4 leading-none uppercase">
                <?= $movie_data["movie_name"] ?>
            </h1>
        </div>

        <p class="text-gray-400 text-lg font-light leading-relaxed mb-10 max-w-md">
            <?= $movie_data["movie_description"] ?>
        </p>

        <div class="flex items-end gap-2 mb-10">
            <span class="text-5xl font-bold text-white">$<?= $movie_data["price"] ?></span>
            <span class="text-gray-500 pb-2 text-sm uppercase tracking-wider">/ Per Ticket</span>
        </div>

        <div class="space-y-6 max-w-sm">

            <div>
                <label class="block text-xs text-lux-gold font-bold uppercase tracking-widest mb-2">Select Time</label>
                <div class="grid grid-cols-3 gap-3">
                    <?php foreach ($reservation_time as $rt) { ?>
                        <?php if($time_selected == $rt["st_id"]){ ?>
                            <a href="reservation.php?movie=<?= $rt["movie_id"] ?>&time=<?= $rt["st_id"] ?>">
                                <button class="border border-lux-gold text-white font-bold py-2 text-sm transition shadow-[0_0_10px_rgba(212,175,55,0.3)]">
                                    <?= $rt["start_time"] ?>
                                </button>
                            </a>
                        <?php } else { ?>
                            <a href="reservation.php?movie=<?= $rt["movie_id"] ?>&time=<?= $rt["st_id"] ?>">
                                <button class="border border-white/20 text-gray-400 py-2 text-sm hover:border-white transition">
                                    <?= $rt["start_time"] ?>
                                </button>
                            </a>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>

            <?php if($time_selected) { ?>
                <a href="seat-selection.php?movie=<?= $movie_selected ?>&time=<?= $time_selected ?>" class="block w-full">
                    <button class="w-full bg-white text-black font-bold tracking-[0.2em] py-5 mt-4 hover:bg-lux-gold transition duration-500 uppercase">
                        Confirm Reservation
                    </button>
                </a>
            <?php } else { ?>
                <button class="w-full bg-gray-800 text-gray-500 font-bold tracking-[0.2em] py-5 mt-4 cursor-not-allowed uppercase border border-white/10">
                    Select a Time
                </button>
            <?php } ?>

            <p class="text-xs text-gray-600 text-center mt-4">
                *Seat selection will open after time confirmation.
            </p>
        </div>

    </div>

</body>

</html>