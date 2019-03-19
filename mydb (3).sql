-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 19, 2019 at 05:01 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `agendacol` varchar(45) DEFAULT NULL,
  `anio` varchar(45) DEFAULT NULL,
  `mes` varchar(45) DEFAULT NULL,
  `dia` varchar(45) DEFAULT NULL,
  `flores_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id`, `agendacol`, `anio`, `mes`, `dia`, `flores_id`) VALUES
(5, NULL, '2019', '03', '22', 5),
(6, NULL, '2019', '03', '18', 6),
(7, NULL, '2019', '03', '13', 7),
(10, NULL, '2019', '03', '28', 10),
(11, NULL, '2019', '03', '19', 11),
(12, NULL, '2019', '04', '11', 12);

-- --------------------------------------------------------

--
-- Table structure for table `caracteristicas`
--

CREATE TABLE `caracteristicas` (
  `id` int(11) NOT NULL,
  `Caracteristicascol` varchar(45) DEFAULT NULL,
  `flores_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Rosas'),
(3, 'Flores');

-- --------------------------------------------------------

--
-- Table structure for table `colores`
--

CREATE TABLE `colores` (
  `id` int(11) NOT NULL,
  `color` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `colores`
--

INSERT INTO `colores` (`id`, `color`) VALUES
(1, 'Por defecto'),
(2, 'Blancas');

-- --------------------------------------------------------

--
-- Table structure for table `empaques`
--

CREATE TABLE `empaques` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `empaques`
--

INSERT INTO `empaques` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Normal', NULL),
(2, 'Caja', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `etiquetas`
--

CREATE TABLE `etiquetas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `flores`
--

CREATE TABLE `flores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `precio` varchar(45) DEFAULT NULL,
  `sku` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `empaques_id` int(11) DEFAULT NULL,
  `tamaño_id` int(11) DEFAULT NULL,
  `colores_id` int(11) DEFAULT NULL,
  `cantidad` varchar(45) DEFAULT NULL,
  `imagen_id` int(11) NOT NULL,
  `categorias_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flores`
--

INSERT INTO `flores` (`id`, `nombre`, `precio`, `sku`, `descripcion`, `empaques_id`, `tamaño_id`, `colores_id`, `cantidad`, `imagen_id`, `categorias_id`) VALUES
(5, 'Rosas', '25000', NULL, NULL, NULL, NULL, NULL, '10', 6, 1),
(6, 'Mixtas', '20000', NULL, NULL, NULL, NULL, NULL, '10', 6, 3),
(7, 'Orquideas', '32000', NULL, NULL, NULL, NULL, NULL, '12', 7, 3),
(10, 'Rosas blancas', '24000', NULL, NULL, NULL, NULL, NULL, '25', 15, 1),
(11, 'corazones para un detalle especial', '160000', NULL, NULL, NULL, NULL, NULL, '15', 12, 1),
(12, 'rosadas', '42000', NULL, NULL, NULL, NULL, NULL, '13', 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `flores_etiquetas`
--

CREATE TABLE `flores_etiquetas` (
  `flores_id` int(11) NOT NULL,
  `etiquetas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `imagen`
--

CREATE TABLE `imagen` (
  `id` int(11) NOT NULL,
  `file_name` varchar(45) DEFAULT NULL,
  `file_type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imagen`
--

INSERT INTO `imagen` (`id`, `file_name`, `file_type`) VALUES
(6, 'rosasmixtas.jpg', 'image/jpeg'),
(7, 'orquideas.jpg', 'image/jpeg'),
(12, 'corazon.jpeg', 'image/jpeg'),
(14, 'rosasrosadas.jpg', 'image/jpeg'),
(15, 'rosasblancas.jpg', 'image/jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tamaño`
--

CREATE TABLE `tamaño` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tamaño`
--

INSERT INTO `tamaño` (`id`, `nombre`) VALUES
(1, 'Normal'),
(2, 'Doblar número de rosas');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `imagen` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `last_login` varchar(45) DEFAULT NULL,
  `user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `imagen`, `status`, `last_login`, `user_level`) VALUES
(1, 'Administrador', 'admin', '7c222fb2927d828af22f592134e8932480637c0d', NULL, '1', '2019-03-19 04:39:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(45) DEFAULT NULL,
  `group_level` varchar(45) DEFAULT NULL,
  `group_status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `group_level`, `group_status`) VALUES
(1, 'Administrador', '1', 'Activo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_agenda_flores1_idx` (`flores_id`);

--
-- Indexes for table `caracteristicas`
--
ALTER TABLE `caracteristicas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Caracteristicas_flores_idx` (`flores_id`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empaques`
--
ALTER TABLE `empaques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flores`
--
ALTER TABLE `flores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_flores_Empaques1_idx` (`empaques_id`),
  ADD KEY `fk_flores_tamaño1_idx` (`tamaño_id`),
  ADD KEY `fk_flores_Colores1_idx` (`colores_id`),
  ADD KEY `fk_flores_imagen1_idx` (`imagen_id`),
  ADD KEY `fk_flores_categorias1_idx` (`categorias_id`);

--
-- Indexes for table `flores_etiquetas`
--
ALTER TABLE `flores_etiquetas`
  ADD PRIMARY KEY (`flores_id`,`etiquetas_id`),
  ADD KEY `fk_flores_has_etiquetas_etiquetas1_idx` (`etiquetas_id`),
  ADD KEY `fk_flores_has_etiquetas_flores1_idx` (`flores_id`);

--
-- Indexes for table `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tamaño`
--
ALTER TABLE `tamaño`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_user_groups1_idx` (`user_level`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `flores`
--
ALTER TABLE `flores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `fk_agenda_flores1` FOREIGN KEY (`flores_id`) REFERENCES `flores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `caracteristicas`
--
ALTER TABLE `caracteristicas`
  ADD CONSTRAINT `fk_Caracteristicas_flores` FOREIGN KEY (`flores_id`) REFERENCES `flores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `flores`
--
ALTER TABLE `flores`
  ADD CONSTRAINT `fk_flores_Colores1` FOREIGN KEY (`colores_id`) REFERENCES `colores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_flores_Empaques1` FOREIGN KEY (`empaques_id`) REFERENCES `empaques` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_flores_categorias1` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_flores_imagen1` FOREIGN KEY (`imagen_id`) REFERENCES `imagen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_flores_tamaño1` FOREIGN KEY (`tamaño_id`) REFERENCES `tamaño` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `flores_etiquetas`
--
ALTER TABLE `flores_etiquetas`
  ADD CONSTRAINT `fk_flores_has_etiquetas_etiquetas1` FOREIGN KEY (`etiquetas_id`) REFERENCES `etiquetas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_flores_has_etiquetas_flores1` FOREIGN KEY (`flores_id`) REFERENCES `flores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_user_groups1` FOREIGN KEY (`user_level`) REFERENCES `user_groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
