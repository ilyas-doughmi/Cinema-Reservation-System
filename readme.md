# ONYX Cinema Reservation System 🎬

web-based cinema ticket booking application built with **PHP** and **MySQL**. This system allows users to browse movies, view showtimes, select specific seats, and book tickets in a responsive, dark-themed interface.

##  Features

* **Movie Browsing:** Dynamic homepage displaying "Now Showing" movies with hover effects.
* **Showtime Selection:** Users can filter movie details and select available showtimes.
* **Interactive Seat Map:** Visual representation of the theater layout.
    * **Seat Selection:** Users can select available seats for booking.
* **Booking System:** Captures user details and saves reservations to the database.
* **Modern UI:** Built with **Tailwind CSS** for a fully responsive, "luxury cinema" aesthetic (Dark/Gold theme).
* **MVC Structure:** precise organization using `Classes` (Movie, Booking, ShowTimes) for logic separation.

##  Tech Stack

* **Backend:** PHP (Object-Oriented)
* **Database:** MySQL
* **Frontend:** HTML5, Tailwind CSS (via CDN)
* **Server:** Apache (XAMPP/WAMP recommended)

##  Folder Structure

```text
cinema-seat-reservation/
├── Classes/            # PHP Classes (DB connection, Movie, Booking, ShowTimes)
├── Includes/           # Form handlers and logic (e.g., Booking.php)
├── sql/                # Database setup files
│   └── install.sql     # SQL script to create tables and dummy data
├── index.php           # Homepage (Movie Gallery)
├── reservation.php     # Movie Details & Time Selection
├── seat-selection.php  # Seat Grid & Booking Form
└── readme.md           # Project Documentation