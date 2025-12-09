<?php

require_once("Classes/connect.php");
require_once("Classes/Movie.php");

$movies = new Movie();
$available_movies = $movies->getAllMovies();

?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONYX Cinema | Pure HTML</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;400;600;800&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['Manrope', 'sans-serif'] },
                    colors: {
                        'lux-gold': '#D4AF37', 
                        'lux-black': '#000000',
                    }
                }
            }
        }
    </script>

    <style>
        body { background-color: #000000; color: white; overflow-x: hidden; }

        .hero-fade {
            background: linear-gradient(to bottom, rgba(0,0,0,0) 0%, rgba(0,0,0,0.6) 50%, #000000 100%);
        }

        
        .movie-card {
            transition: all 0.5s ease-out;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .movie-card:hover {
            box-shadow: 0 0 30px rgba(212, 175, 55, 0.15);
            border-color: #D4AF37;
        }

        .movie-img {
            transition: transform 0.7s ease, opacity 0.7s ease;
            opacity: 0.8;
        }
        .movie-card:hover .movie-img {
            transform: scale(1.05);
            opacity: 0.4; 
        }
    
        .reveal-content {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.4s ease-out;
        }
        .movie-card:hover .reveal-content {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
</head>
<body class="antialiased">

    <nav class="fixed w-full z-50 top-0 py-6 px-8 flex justify-between items-center bg-gradient-to-b from-black to-transparent">
        <div class="text-2xl font-bold tracking-[0.2em] text-white">
            ONYX<span class="text-lux-gold">.</span>
        </div>

    </nav>

    <header class="relative w-full h-[90vh] flex items-end pb-20">
        <div class="absolute inset-0 z-0">
            <img src="https://www.boxofficepro.com/wp-content/uploads/2022/08/AdobeStock_407530281-scaled.jpeg" class="w-full h-full object-cover opacity-70">
            <div class="absolute inset-0 hero-fade"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 w-full">
            <div class="border-l-2 border-lux-gold pl-6">
                <p class="text-lux-gold text-sm font-bold tracking-[0.2em] uppercase mb-2">Premiere Night</p>
                <h1 class="text-5xl md:text-8xl font-bold text-white mb-6 leading-none">
                    CYBER <br> CHRONICLES
                </h1>
                <p class="text-gray-400 max-w-lg mb-8 text-lg font-light">
                    In a future where humanity has merged with machines, one detective must solve the ultimate crime. Experience it in IMAX Laser.
                </p>
                
                <div class="flex items-center gap-6">
                    <a href="#movies-section" class="bg-lux-gold text-black px-10 py-4 font-bold tracking-widest hover:bg-white transition duration-500 inline-block">
                        RESERVE SEAT
                    </a>
                </div>
            </div>
        </div>
    </header>

    <section id="movies-section" class="max-w-7xl mx-auto px-6 py-24">
        
        <div class="flex gap-10 border-b border-white/10 mb-16 pb-4">
            <span class="text-2xl font-light text-white border-b-2 border-lux-gold pb-4 cursor-pointer">Now Showing</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-12">
        <?php foreach($available_movies as $mv){?>
              <div class="movie-card group relative bg-black cursor-pointer overflow-hidden h-[500px]">
                <div class="w-full h-full relative">
                    <img src="<?= $mv["movie_image"] ?>" class="movie-img w-full h-full object-cover">
                    
                    <div class="absolute inset-0 flex flex-col items-center justify-center p-6 text-center z-10">
                        <div class="reveal-content">
                            <h3 class="text-2xl font-bold text-white mb-1 uppercase tracking-wider font-serif"><?= $mv["movie_name"] ?></h3>
                            <a href="reservation.php?movie=<?= $mv["movie_id"] ?>" class="border border-white text-white px-6 py-3 text-xs font-bold tracking-widest hover:bg-white hover:text-black transition inline-block">
                                GET TICKETS
                            </a>
                        </div>
                    </div>

                    <div class="absolute top-4 right-4 bg-black border border-white/20 text-white text-[10px] font-bold px-2 py-1">
                        $ <?= $mv["price"] ?>
                    </div>
                </div>
            </div>
       <?php } ?>
          

        </div>

    </section>

    <footer class="text-center py-12 border-t border-white/5 text-gray-600 text-xs tracking-widest uppercase">
        <p>Onyx Cinema &copy; 2024. Designed for Cinema Lovers.</p>
    </footer>

</body>
</html>