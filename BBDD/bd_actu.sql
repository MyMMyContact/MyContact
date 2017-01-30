
CREATE TABLE `tbl_contacto` (
  `id_contacto` int(5) NOT NULL,
  `nombre_contacto` varchar(20) NOT NULL,
  `apellido1_contacto` varchar(20) NOT NULL,
  `apellido2_contacto` varchar(20) DEFAULT NULL,
  `correo_contacto` varchar(40) NOT NULL,
  `telefono1_contacto` int(9) NOT NULL,
  `telefono2_contacto` int(9) DEFAULT NULL,
  `ubicacion1_contacto` varchar(40) NOT NULL,
  `ubicacion2_contacto` varchar(40) DEFAULT NULL,
  `id_usuario` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_contacto`
--

INSERT INTO `tbl_contacto` (`id_contacto`, `nombre_contacto`, `apellido1_contacto`, `apellido2_contacto`, `correo_contacto`, `telefono1_contacto`, `telefono2_contacto`, `ubicacion1_contacto`, `ubicacion2_contacto`, `id_usuario`) VALUES
(1, 'prueba_mod16', 'prueba_modape1', 'prueba_mod_ape2', 'prueba_mod_ape2@prueba.com', 999999, 999999, 'C: modificacion122', 'C: falsa122', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `id_usuario` int(5) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `apellido1_usuario` varchar(20) NOT NULL,
  `apellido2_usuario` varchar(20) DEFAULT NULL,
  `fechaAlta_usuario` date NOT NULL,
  `correo_usuario` varchar(40) NOT NULL,
  `contrasena_usuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`id_usuario`, `nombre_usuario`, `apellido1_usuario`, `apellido2_usuario`, `fechaAlta_usuario`, `correo_usuario`, `contrasena_usuario`) VALUES
(1, 'prueba', 'prueba', 'prueba', '2017-01-27', 'prueb2a@prueba.com', 'prueba2'),
(2, 'prueba2', 'prueba2', 'prueba2', '2017-01-11', 'prueba2@prueba2.com', 'prueba2'),
(3, 'asd', 'asd', 'asd', '2017-01-29', 'asd@asd.com', '12345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_contacto`
--
ALTER TABLE `tbl_contacto`
  ADD PRIMARY KEY (`id_contacto`),
  ADD KEY `contactus` (`id_usuario`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_contacto`
--
ALTER TABLE `tbl_contacto`
  MODIFY `id_contacto` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_usuario` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_contacto`
--
ALTER TABLE `tbl_contacto`
  ADD CONSTRAINT `contactus` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuario` (`id_usuario`);

