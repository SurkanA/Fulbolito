<?php
require_once('config/config.php');
class Model
{
  protected $db;

  private function _deploy()
  {
    $query = $this->db->query('SHOW TABLES');
    $tables = $query->fetchAll();
    if (count($tables) == 0) {
      $sql = <<<END
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2025 at 12:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soccer`
--

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `player_name` varchar(50) NOT NULL,
  `team_name` varchar(50) NOT NULL,
  `id_player` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `position` varchar(50) NOT NULL,
  `number` int(11) NOT NULL,
  `biography` varchar(300) DEFAULT NULL,
  `image_url` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id_team` int(11) NOT NULL,
  `team_name` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `year_founded` year(4) NOT NULL,
  `biography` varchar(300) DEFAULT NULL,
  `image_url` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `administrator` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `user`, `password`, `administrator`) VALUES
(1, 'webadmin', '$2y$10$6zil872KW/HBsFJKH0D33OlEaGsshD36NDl455kfhz9Uhs.FxqLa2', 'Y');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id_player`,`team_name`) USING BTREE,
  ADD KEY `nombre_equipo` (`team_name`) USING BTREE;

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id_team`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id_team` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
END;
      $this->db->query($sql);
    }
  }

  public function ___construct()
  {
    $this->db = new PDO(
      "mysql:host=" . MYSQL_HOST .
      ";dbname=" . MYSQL_DB . ";charset=utf8",
      MYSQL_USER,
      MYSQL_PASS
    );
    $this->_deploy();

  }
  protected function createConnection()
  {
    $host = MYSQL_HOST;
    $user = MYSQL_USER;
    $password = MYSQL_PASS;
    $database = MYSQL_DB;

    try {
      $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $user, $password);
    } catch (\Throwable $th) {
      die($th);
    }

    return $pdo;
  }
}