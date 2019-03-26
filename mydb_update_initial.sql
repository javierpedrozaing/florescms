-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 26, 2019 at 05:34 AM
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
  `anio` varchar(45) DEFAULT NULL,
  `mes` varchar(45) DEFAULT NULL,
  `dia` varchar(45) DEFAULT NULL,
  `flores_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agenda`
--

INSERT INTO `agenda` (`id`, `anio`, `mes`, `dia`, `flores_id`) VALUES
(1, '2019', '03', '27', 1),
(2, '2019', '03', '26', 2),
(3, '2019', '03', '31', 3);

-- --------------------------------------------------------

--
-- Table structure for table `caracteristicas`
--

CREATE TABLE `caracteristicas` (
  `id` int(11) NOT NULL,
  `caracteristica` varchar(45) DEFAULT NULL,
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
(1, 'Flores'),
(2, 'Arreglos'),
(3, 'Rosas');

-- --------------------------------------------------------

--
-- Table structure for table `colores`
--

CREATE TABLE `colores` (
  `id` int(11) NOT NULL,
  `color` varchar(45) DEFAULT NULL,
  `precio` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `colores`
--

INSERT INTO `colores` (`id`, `color`, `precio`) VALUES
(1, 'Por defecto', '0'),
(2, 'Blancas', '10000'),
(3, 'Rosadas', '10000');

-- --------------------------------------------------------

--
-- Table structure for table `empaques`
--

CREATE TABLE `empaques` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `precio` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `empaques`
--

INSERT INTO `empaques` (`id`, `nombre`, `precio`) VALUES
(1, 'Por defecto', '0'),
(2, 'Caja especial', '12000'),
(3, 'Jarron', '15000');

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
  `cantidad` varchar(45) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `empaques_id` int(11) DEFAULT NULL,
  `tamano_id` int(11) DEFAULT NULL,
  `colores_id` int(11) DEFAULT NULL,
  `categorias_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flores`
--

INSERT INTO `flores` (`id`, `nombre`, `precio`, `sku`, `descripcion`, `cantidad`, `activo`, `empaques_id`, `tamano_id`, `colores_id`, `categorias_id`) VALUES
(1, 'Rosas', '15000', NULL, 'descripciÃ³n de producto ', '7', 1, NULL, NULL, NULL, 3),
(2, 'arreglo', '21000', NULL, 'descripciÃ³n de la flor ', '10', 1, NULL, NULL, NULL, 2),
(3, 'Especiales', '12000', NULL, 'asda sdasd ', '9', 1, NULL, NULL, NULL, 2);

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
-- Table structure for table `flores_has_imagen`
--

CREATE TABLE `flores_has_imagen` (
  `flores_id` int(11) NOT NULL,
  `imagen_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flores_has_imagen`
--

INSERT INTO `flores_has_imagen` (`flores_id`, `imagen_id`) VALUES
(1, 2),
(1, 3),
(1, 4),
(2, 2),
(2, 3),
(2, 4),
(3, 1),
(3, 2),
(3, 3),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `imagen`
--

CREATE TABLE `imagen` (
  `id` int(11) NOT NULL,
  `file_name` varchar(45) DEFAULT NULL,
  `file_type` varchar(45) DEFAULT NULL,
  `tamano_id` int(11) NOT NULL,
  `colores_id` int(11) NOT NULL,
  `empaques_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `imagen`
--

INSERT INTO `imagen` (`id`, `file_name`, `file_type`, `tamano_id`, `colores_id`, `empaques_id`) VALUES
(1, 'corazon.jpeg', 'image/jpeg', 1, 1, 1),
(2, 'orquideas.jpg', 'image/jpeg', 1, 1, 1),
(3, 'rosasmixtas.jpg', 'image/jpeg', 1, 1, 1),
(4, 'columbine-3379045_1920 (1).jpg', 'image/jpeg', 2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pago`
--

CREATE TABLE `pago` (
  `id` int(11) NOT NULL,
  `referencia` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `flores_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tamano`
--

CREATE TABLE `tamano` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `precio` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tamano`
--

INSERT INTO `tamano` (`id`, `nombre`, `precio`) VALUES
(1, 'Normal', '0'),
(2, 'Doblar cantidad de flores', '15000');

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
(1, 'Javier', 'administrador', '7c222fb2927d828af22f592134e8932480637c0d', 'NULL', '1', '2019-03-25 01:12:04', 1);

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
  ADD KEY `fk_flores_tamaño1_idx` (`tamano_id`),
  ADD KEY `fk_flores_Colores1_idx` (`colores_id`),
  ADD KEY `fk_flores_categorias1_idx` (`categorias_id`);

--
-- Indexes for table `flores_etiquetas`
--
ALTER TABLE `flores_etiquetas`
  ADD PRIMARY KEY (`flores_id`,`etiquetas_id`),
  ADD KEY `fk_flores_has_etiquetas_etiquetas1_idx` (`etiquetas_id`),
  ADD KEY `fk_flores_has_etiquetas_flores1_idx` (`flores_id`);

--
-- Indexes for table `flores_has_imagen`
--
ALTER TABLE `flores_has_imagen`
  ADD PRIMARY KEY (`flores_id`,`imagen_id`),
  ADD KEY `fk_flores_has_imagen_imagen1_idx` (`imagen_id`),
  ADD KEY `fk_flores_has_imagen_flores1_idx` (`flores_id`);

--
-- Indexes for table `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_imagen_tamaño1_idx` (`tamano_id`),
  ADD KEY `fk_imagen_colores1_idx` (`colores_id`),
  ADD KEY `fk_imagen_empaques1_idx` (`empaques_id`);

--
-- Indexes for table `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pago_flores1_idx` (`flores_id`);

--
-- Indexes for table `tamano`
--
ALTER TABLE `tamano`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `caracteristicas`
--
ALTER TABLE `caracteristicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `colores`
--
ALTER TABLE `colores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `flores`
--
ALTER TABLE `flores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pago`
--
ALTER TABLE `pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tamano`
--
ALTER TABLE `tamano`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
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
  ADD CONSTRAINT `fk_flores_Empaques1` FOREIGN KEY (`empaques_id`) REFERENCES `empaques` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_flores_categorias1` FOREIGN KEY (`categorias_id`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_flores_tamaño1` FOREIGN KEY (`tamano_id`) REFERENCES `tamano` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `flores_etiquetas`
--
ALTER TABLE `flores_etiquetas`
  ADD CONSTRAINT `fk_flores_has_etiquetas_etiquetas1` FOREIGN KEY (`etiquetas_id`) REFERENCES `etiquetas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_flores_has_etiquetas_flores1` FOREIGN KEY (`flores_id`) REFERENCES `flores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `flores_has_imagen`
--
ALTER TABLE `flores_has_imagen`
  ADD CONSTRAINT `fk_flores_has_imagen_flores1` FOREIGN KEY (`flores_id`) REFERENCES `flores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_flores_has_imagen_imagen1` FOREIGN KEY (`imagen_id`) REFERENCES `imagen` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `fk_imagen_colores1` FOREIGN KEY (`colores_id`) REFERENCES `colores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_imagen_empaques1` FOREIGN KEY (`empaques_id`) REFERENCES `empaques` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_imagen_tamaño1` FOREIGN KEY (`tamano_id`) REFERENCES `tamano` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `fk_pago_flores1` FOREIGN KEY (`flores_id`) REFERENCES `flores` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_user_groups1` FOREIGN KEY (`user_level`) REFERENCES `user_groups` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
