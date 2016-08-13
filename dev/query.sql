SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `user_id` int(10) unsigned NOT NULL,
  `time` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Estructura de tabla para la tabla `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `user_id` int(10) unsigned NOT NULL,
  `time` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `failed` int(11) NOT NULL DEFAULT '5',
  `blocked` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Estructura de tabla para la tabla `logout`
--

CREATE TABLE IF NOT EXISTS `logout` (
  `user_id` int(10) unsigned NOT NULL,
  `time` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `permission_id` int(10) unsigned NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile_permission`
--

CREATE TABLE IF NOT EXISTS `profile_permission` (
  `profile_id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile_table`
--

CREATE TABLE IF NOT EXISTS `profile_table` (
  `profile_id` int(10) unsigned NOT NULL,
  `description` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `profile_table`
--

INSERT INTO `profile_table` (`profile_id`, `description`) VALUES
(0, 'Comensal');
INSERT INTO `profile_table` (`profile_id`, `description`) VALUES
(1, 'Cocinero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_login_attempt`
--

CREATE TABLE IF NOT EXISTS `reg_login_attempt` (
`user_id` int(10) unsigned NOT NULL,
  `user_ip` int(10) unsigned NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reg_users`
--

CREATE TABLE IF NOT EXISTS `reg_users` (
`user_id` int(10) unsigned NOT NULL,
  `fullname` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `profile_id` int(10) unsigned NOT NULL,
  `salt` char(128) COLLATE utf8_unicode_ci NOT NULL,
  `registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`user_id`,`time`);

--
-- Indices de la tabla `login_attempts`
--
ALTER TABLE `login_attempts`
 ADD PRIMARY KEY (`user_id`,`time`);

--
-- Indices de la tabla `logout`
--
ALTER TABLE `logout`
 ADD PRIMARY KEY (`user_id`,`time`);

--
-- Indices de la tabla `permission`
--
ALTER TABLE `permission`
 ADD PRIMARY KEY (`permission_id`);

--
-- Indices de la tabla `profile_permission`
--
ALTER TABLE `profile_permission`
 ADD PRIMARY KEY (`profile_id`,`permission_id`), ADD KEY `permission_id` (`permission_id`);

--
-- Indices de la tabla `profile_table`
--
ALTER TABLE `profile_table`
 ADD PRIMARY KEY (`profile_id`);

--
-- Indices de la tabla `reg_login_attempt`
--
ALTER TABLE `reg_login_attempt`
 ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `reg_users`
--
ALTER TABLE `reg_users`
 ADD PRIMARY KEY (`email`), ADD UNIQUE KEY `email` (`email`), ADD KEY `profile_id` (`profile_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reg_login_attempt`
--
ALTER TABLE `reg_login_attempt`
MODIFY `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `reg_users`
--
ALTER TABLE `reg_users`
MODIFY `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `reg_users` (`user_id`);

--
-- Filtros para la tabla `login_attempts`
--
ALTER TABLE `login_attempts`
ADD CONSTRAINT `login_attempts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `reg_users` (`user_id`);

--
-- Filtros para la tabla `logout`
--
ALTER TABLE `logout`
ADD CONSTRAINT `logout_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `reg_users` (`user_id`);

--
-- Filtros para la tabla `profile_permission`
--
ALTER TABLE `profile_permission`
ADD CONSTRAINT `profile_permission_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profile_table` (`profile_id`),
ADD CONSTRAINT `profile_permission_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `permission` (`permission_id`);

--
-- Filtros para la tabla `reg_login_attempt`
--
ALTER TABLE `reg_login_attempt`
ADD CONSTRAINT `reg_login_attempt_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `reg_users` (`user_id`);

--
-- Filtros para la tabla `reg_users`
--
ALTER TABLE `reg_users`
ADD CONSTRAINT `reg_users_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profile_table` (`profile_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
