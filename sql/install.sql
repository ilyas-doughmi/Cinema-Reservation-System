CREATE DATABASE cinema_reservation;
USE cinema_reservation;

CREATE TABLE movie(
    movie_id INT PRIMARY KEY AUTO_INCREMENT,
    movie_name VARCHAR(255),
    movie_description VARCHAR(255),
    price INT
);
CREATE TABLE showtimes(
    st_id INT PRIMARY KEY AUTO_INCREMENT,
    movie_id INT,
    start_time DATETIME,
    FOREIGN KEY (movie_id) REFERENCES movie(movie_id)
);
CREATE TABLE booking(
    booking_id INT PRIMARY KEY AUTO_INCREMENT,
    price DECIMAL(5,2),
    user_name VARCHAR(100),
    seat_number INT,
    show_id INT,
    FOREIGN KEY (show_id) REFERENCES showtimes(st_id)

);