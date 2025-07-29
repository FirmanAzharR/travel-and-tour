-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2025 at 03:33 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;

--
-- Database: `travel_tour`
--

-- --------------------------------------------------------

--
-- Table structure for table `airport_travel_booking`
--

CREATE TABLE `airport_travel_booking` (
    `id` int(11) NOT NULL,
    `wa_number` varchar(20) DEFAULT NULL,
    `booking_date` date DEFAULT NULL,
    `pickup_address` text DEFAULT NULL,
    `airport` varchar(100) DEFAULT NULL,
    `destination_address` text DEFAULT NULL,
    `flight_time` datetime DEFAULT NULL,
    `total_passengers` int(11) DEFAULT NULL,
    `service` varchar(255) DEFAULT NULL,
    `luggage_items` text DEFAULT NULL,
    `flight_number` varchar(255) DEFAULT NULL,
    `vip_pickup` tinyint(1) DEFAULT NULL,
    `booking_type` varchar(100) DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT current_timestamp(),
    `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `city_tour_booking`
--

CREATE TABLE `city_tour_booking` (
    `id` int(11) NOT NULL,
    `wa_number` varchar(20) DEFAULT NULL,
    `booking_date` timestamp NULL DEFAULT NULL,
    `pickup_address` text DEFAULT NULL,
    `total_passengers` int(11) DEFAULT NULL,
    `tour_destination` varchar(255) DEFAULT NULL,
    `duration` int(11) DEFAULT NULL,
    `car_name` varchar(100) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_content`
--

CREATE TABLE `gallery_content` (`id` int(11) NOT NULL) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `header_content`
--

CREATE TABLE `header_content` (
    `id` int(11) NOT NULL,
    `image_rul` text DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
    `id` int(100) NOT NULL,
    `nama` varchar(100) NOT NULL,
    `nik` varchar(100) NOT NULL,
    `tgl_lahir` date NOT NULL,
    `jenis_kelamin` varchar(100) NOT NULL,
    `prodi_id` int(100) NOT NULL,
    `image_url` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO
    `mahasiswa` (
        `id`,
        `nama`,
        `nik`,
        `tgl_lahir`,
        `jenis_kelamin`,
        `prodi_id`,
        `image_url`
    )
VALUES (
        1,
        'rover',
        'Ducimus nobis delen',
        '1995-07-07',
        'P',
        2,
        '2025-07-27_02-56-57_97b318e4.png'
    ),
    (
        2,
        'ciaconna',
        'Enim impedit magnam',
        '2025-07-17',
        'L',
        1,
        '2025-07-27_02-58-00_7288a4dd.png'
    ),
    (
        3,
        'zani',
        'Mollit labore commod',
        '2025-07-02',
        'L',
        1,
        '2025-07-27_02-57-49_f1a99331.png'
    ),
    (
        5,
        'Eka Wulandari',
        '3275012000082305',
        '2000-08-23',
        'P',
        1,
        'image1.png'
    ),
    (
        6,
        'Fajar Nugroho',
        '3275011999110506',
        '1999-11-05',
        'L',
        2,
        'image1.png'
    ),
    (
        7,
        'Gita Rahmawati',
        '3275012002022707',
        '2002-02-27',
        'P',
        3,
        'image1.png'
    ),
    (
        8,
        'Hendra Wijaya',
        '3275011996031808',
        '1996-03-18',
        'L',
        4,
        'image1.png'
    ),
    (
        9,
        'Intan Permata',
        '3275012001110909',
        '2001-11-09',
        'P',
        1,
        'image1.png'
    ),
    (
        10,
        'Joko Santoso',
        '3275011998053000',
        '1998-05-30',
        'L',
        2,
        'image1.png'
    ),
    (
        11,
        'Firman',
        '53109098981',
        '2025-07-14',
        'L',
        3,
        'image1.png'
    ),
    (
        12,
        'Firman 2',
        '53109098982',
        '2025-07-26',
        'L',
        4,
        'image1.png'
    ),
    (
        18,
        'Alifia Intan',
        '09801980',
        '1997-06-06',
        'P',
        4,
        'image1.png'
    );

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
    `id` int(11) NOT NULL,
    `prodi_name` varchar(100) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO
    `prodi` (`id`, `prodi_name`)
VALUES (1, 'Informatika'),
    (2, 'Kimia'),
    (3, 'Elektronika'),
    (4, 'Bidan');

-- --------------------------------------------------------

--
-- Table structure for table `rent_bus_booking`
--

CREATE TABLE `rent_bus_booking` (
    `id` int(11) NOT NULL,
    `wa_number` varchar(20) DEFAULT NULL,
    `booking_date_start` timestamp NULL DEFAULT NULL,
    `booking_date_end` timestamp NULL DEFAULT NULL,
    `pickup_Address` text DEFAULT NULL,
    `total_passengers` int(11) DEFAULT NULL,
    `crated_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rent_car_booking`
--

CREATE TABLE `rent_car_booking` (
    `id` int(11) NOT NULL,
    `wa_number` double DEFAULT NULL,
    `booking_date_start` timestamp NULL DEFAULT NULL,
    `booking_date_end` timestamp NULL DEFAULT NULL,
    `car_name` varchar(100) DEFAULT NULL,
    `booking_type` varchar(100) DEFAULT NULL,
    `route` text DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT current_timestamp(),
    `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `slider_content`
--

CREATE TABLE `slider_content` (`id` int(11) NOT NULL) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `testimoni_content`
--

CREATE TABLE `testimoni_content` (`id` int(11) NOT NULL) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tour_package`
--

CREATE TABLE `tour_package` (`id` int(11) NOT NULL) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tour_reccomendation_content`
--

CREATE TABLE `tour_reccomendation_content` (`id` int(11) NOT NULL) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
    `id` int(11) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` text NOT NULL,
    `role` enum('CUSTOMER', 'ADMIN') NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO
    `users` (
        `id`,
        `email`,
        `password`,
        `role`
    )
VALUES (
        13,
        'firmanazharr@gmail.com',
        '12345678',
        'CUSTOMER'
    );

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
    `id` int(11) DEFAULT NULL,
    `nama` varchar(255) DEFAULT NULL,
    `telepon` varchar(255) DEFAULT NULL,
    `foto` text DEFAULT NULL,
    `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
    `deleted_at` timestamp NULL DEFAULT NULL,
    `user_id` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `airport_travel_booking`
--
ALTER TABLE `airport_travel_booking` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_tour_booking`
--
ALTER TABLE `city_tour_booking` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_content`
--
ALTER TABLE `gallery_content` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header_content`
--
ALTER TABLE `header_content` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent_bus_booking`
--
ALTER TABLE `rent_bus_booking` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent_car_booking`
--
ALTER TABLE `rent_car_booking` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_content`
--
ALTER TABLE `slider_content` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimoni_content`
--
ALTER TABLE `testimoni_content` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_package`
--
ALTER TABLE `tour_package` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_reccomendation_content`
--
ALTER TABLE `tour_reccomendation_content` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users` ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `airport_travel_booking`
--
ALTER TABLE `airport_travel_booking`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city_tour_booking`
--
ALTER TABLE `city_tour_booking`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery_content`
--
ALTER TABLE `gallery_content`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `header_content`
--
ALTER TABLE `header_content`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 22;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 5;

--
-- AUTO_INCREMENT for table `rent_bus_booking`
--
ALTER TABLE `rent_bus_booking`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rent_car_booking`
--
ALTER TABLE `rent_car_booking`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider_content`
--
ALTER TABLE `slider_content`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimoni_content`
--
ALTER TABLE `testimoni_content`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_package`
--
ALTER TABLE `tour_package`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_reccomendation_content`
--
ALTER TABLE `tour_reccomendation_content`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 21;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;