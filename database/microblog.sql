-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 20, 2020 at 07:02 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `microblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(255) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Quotes'),
(2, 'Poemas');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `category_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` mediumtext,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `title`, `description`, `date`) VALUES
(1, 1, 1, 'Untitled Love (I)', '<p>Ya perdí la cuenta de todos los besos que quiero darte.</p><br><br>\r\n\r\n<p>unknown</p>', '2020-07-16'),
(2, 1, 2, 'En mi oficio o mi arte sombrío', '<p>En mi oficio o mi arte sombrío<br>  \r\nejercido en la noche silenciosa<br>\r\ncuando sólo la luna se enfurece<br>\r\ny los amantes yacen en el lecho<br>\r\ncon todas sus tristezas en los brazos,<br>\r\njunto a la luz que canta yo trabajo<br>\r\nno por ambición ni por el pan<br>\r\nni por ostentación ni por el tráfico de encantos<br>\r\nen escenarios de marfil,<br>\r\nsino por ese mínimo salario<br>\r\nde sus más escondidos corazones.<br>\r\n</p>\r\n\r\n<p>No para el hombre altivo<br>\r\nque se aparta de la luna colérica<br>\r\nescribo yo estas páginas de efímeras espumas,<br>\r\nni para los muertos encumbrados<br>\r\nentre sus salmos y ruiseñores,<br>\r\nsino para los amantes, para sus brazos<br>\r\nque rodean las penas de los siglos,<br>\r\nque no pagan con salarios ni elogios<br>\r\ny no hacen caso alguno de mi oficio o mi arte.\r\n</p><br><br>\r\n\r\n<p>Dylan Thomas</p>\r\n\r\n\r\n', '2020-07-16'),
(3, 2, 1, 'Untitled Love (II)', '<p>El amor puede con todo, me dijo.<br>¿Hablas de capacidad o de destrucción?,</br> pensé.<br><br><p>Loreto Sesma</p>', '2020-07-16'),
(4, 2, 2, 'Un cambio en los climas del corazón', '<p>Un cambio en los climas del corazón<br>\r\nvuelve seco lo húmedo, la bala de oro estalla<br>\r\nsobre la tumba helada.<br>\r\nUn clima en la comarca de las venas<br>\r\ncambia la noche en día; la sangre entre<br>\r\nsus soles ilumina al viviente gusano.<br>\r\n</p>\r\n\r\n<p>Un cambio en el ojo advierte a tiempo<br>\r\nla ceguera hasta el hueso; y el útero incorpora<br>\r\nuna muerte mientras surge la vida.<br>\r\n</p>\r\n\r\n<p>Una sombra en el clima del ojo<br>\r\nes a medias su luz; el mar sondeado irrumpe<br>\r\nsobre una tierra sin arpones.<br>\r\nLa semilla que del lomo hace una selva<br>\r\ndivide en dos su fruto; y la mitad se escurre<br>\r\nlenta en un viento dormido.<br>\r\n</p>\r\n\r\n<p>Un clima en la carne y el hueso<br>\r\nes seca y húmeda; el viviente y el muerto<br>\r\nse mueven como espectros ante el ojo.<br>\r\n</p>\r\n\r\n<p>Un cambio en el clima del mundo<br>\r\nvuelve espectro al espectro; y cada niño dentro su madre<br>\r\nse repliega en su doble de sombra.<br>\r\nUn cambio echa la luna dentro del sol,<br>\r\ntira de las ajadas cortinas de la piel;<br>\r\ny el corazón entrega a sus muertos.<br>\r\n</p><br><br>\r\n\r\n<p>Dylan Thomas<p>', '2020-07-16'),
(10, 6, 2, 'No entres dócil en esa buena noche', '<p>No entres dócil en esa buena noche<br>\r\nNo entres dócil en esa buena noche,<br>\r\nLa vejez debe arder y delirar al acabarse el día;<br>\r\nRabiar, rabiar contra la muerte de la luz.\r\n</p><br>\r\n\r\n<p>Aunque los sabios en su fin entienden que la oscuridad es justa,<br>\r\nPues sus palabras no espigaron rayo alguno,<br>\r\nNo entran dóciles en esa buena noche.<br>\r\n</p><br>\r\n\r\n\r\n<p>Los hombres buenos, cercana ya la última ola, gritando cuán brillantes<br>\r\nSus frágiles hazañas podrían haber danzado en un verde remanso,<br>\r\nRabian, rabian contra la muerte de la luz.<br>\r\n<p><br>\r\n\r\n<p>Los hombres fieros, que al sol en vuelo capturaron y cantaron,<br>\r\nY entienden, tarde ya, que al mismo tiempo lo lloraban,<br>\r\nNo entran dóciles en esa buena noche.</p><br>\r\n\r\n<p>Los hombres graves, que cerca de la muerte ven con deslumbrante claridad<br>\r\nQue los ojos ciegos pudieron relumbrar cual meteoros y estar vivos,<br>\r\nRabian, rabian contra la muerte de la luz.</p><br>\r\n\r\n<p>Y tú, padre mío, allá en tu triste altura,<br>\r\nMaldice, bendíceme ahora con tus fieras lágrimas, lo ruego.<br>\r\nNo entres dócil en esa buena noche.<br>\r\nRabia, rabia contra la muerte de la luz.\r\n</p><br><br>\r\n\r\n<p>Dylan Thomas</p>', '2020-07-19'),
(11, 6, 2, 'Y la muerte no tendrá dominio', '<p>Y la muerte no tendrá dominio<br>\r\nY la muerte no tendrá dominio.<br>\r\nMuertos y desnudos los hombres serán uno<br>\r\nCon el hombre en el viento y la luna del poniente;<br>\r\nCuando sus huesos queden limpios y los limpios huesos cesen,<br>\r\nLlevarán estrellas en el codo y en el pie;<br>\r\nAunque enloquezcan, cuerdos estarán,<br>\r\nAunque se hundan en el mar, saldrán a flote;<br>\r\nAunque se pierdan los amantes, no lo hará el amor;<br>\r\nY la muerte no tendrá dominio.</p><br>\r\n\r\n<p>Y la muerte no tendrá dominio.<br>\r\nBajo el airado mar<br>\r\nLos que largo tiempo yacen no morirán como en el aire;<br>\r\nRetorciéndose en el potro cuando los tendones cedan,<br>\r\nAtados a la rueda, no se romperán;<br>\r\nEn dos se partirá la fe en sus manos,<br>\r\nY los males unicornios las recorrerán;<br>\r\nSeparados, no se quebrarán los cabos;<br>\r\nY la muerte no tendrá dominio.</p><br>\r\n\r\n<p>Y la muerte no tendrá dominio.<br>\r\nNo griten ya en su oído las gaviotas<br>\r\nNi rompan ruidosas las olas en la orilla;<br>\r\nDonde nazca una flor no ofrezca ya<br>\r\nsu cabeza una flor a los embates de la lluvia,<br>\r\nAunque estén locas y muertas como clavos,<br>\r\nLas cabezas de los hombres superen a las margaritas;<br>\r\nArremetan contra el sol hasta que el sol sucumba,<br>\r\nY la muerte no tendrá dominio.</p><br><br>\r\n\r\n<p>Dylan Thomas</p>\r\n\r\n', '2020-07-19'),
(12, 6, 2, 'Al borde', '<p>Soy alta,<br>\r\nen la guerra<br>\r\nllegué a pesar cuarenta kilos.<br><br>\r\n\r\nHe estado al borde de la tuberculosis,<br>\r\nal borde de la cárcel,<br>\r\nal borde de la amistad,<br>\r\nal borde del arte,<br>\r\nal borde del suicidio,<br>\r\nal borde de la misericordia,<br>\r\nal borde de la envidia,<br>\r\nal borde de la fama,<br>\r\nal borde del amor,<br>\r\nal borde de la playa,<br>\r\ny, poco a poco, me fue dando sueño,<br>\r\ny aquí estoy durmiendo al borde,<br>\r\nal borde de despertar.</p><br><br><br>\r\n\r\n<p>Gloria Fuertes</p>\r\n', '2020-07-19'),
(13, 6, 2, 'En el árbol de mi pecho', '<p> \r\nEn el árbol de mi pecho<br>\r\nhay un pájaro encarnado.<br><br>\r\n\r\nCuando te veo se asusta,<br>\r\naletea, lanza saltos.<br><br>\r\n\r\nEn el árbol de mi pecho<br>\r\nhay un pájaro encarnado.<br><br>\r\n\r\nCuando te veo se asusta,<br>\r\n¡eres un espantapájaros!\r\n</p><br><br><br>\r\n\r\n<p>Gloria Fuertes</p>', '2020-07-19'),
(14, 6, 1, 'Isla Ignorada', '<p>Soy como esa isla que ignorada,<br>\r\nlate acunada por árboles jugosos,<br>\r\nen el centro de un mar<br>\r\nque no me entiende, rodeada de nada, sola\r\n</p><br><br>\r\n<p>Gloria Fuentes</p>\r\n', '2020-07-19'),
(15, 8, 2, 'EL CORAZÓN DE LA TIERRA', '<p>\r\n El corazón de la Tierra<br>\r\ntiene hombres que le desgarran.<br>\r\nLa Tierra es muy anciana.<br>\r\nSufre ataques al corazón<br>\r\nen sus entrañas.<br>\r\nSus volcanes,<br>\r\nlaten demasiado<br>\r\npor exceso de odio y de lava.<br>\r\n\r\nLa Tierra no está para muchos trotes<br>\r\nestá cansada.<br>\r\nCuando entierran en ella<br>\r\nniños con metralla<br>\r\nle dan arcadas.<br>\r\n</p><br><br>\r\n\r\n<p>Gloria Fuertes</p>', '2020-07-19'),
(16, 8, 1, 'TODO EL PASADO', 'No puedo detenerme,<br>\r\nperdonad, tengo prisa,<br>\r\nsoy un río de fuerza, si me detengo<br>\r\nmoriré ahogada en mi propio remanso.<br>', '2020-07-19'),
(17, 8, 1, 'Arte', 'Soy abstrato<br>\r\nasí que esto de estar roto<br>\r\nes parte de mi esencia.<br><br>\r\n\r\nSiempre he sido arte<br>\r\na mi modo.<br><br><br>\r\n\r\nH.M.Molina\r\n', '2020-07-19'),
(18, 6, 2, 'ALMA AUSENTE', 'No te conoce el toro ni la higuera, <br>\r\nni caballos ni hormigas de tu casa.<br>\r\nNo te conoce el niño ni la tarde<br>\r\nporque te has muerto para siempre.<br><br>\r\n\r\nNo te conoce el lomo de la piedra,<br>\r\nni el raso negro donde te destrozas.<br>\r\nNo te conoce tu recuerdo mudo<br>\r\nporque te has muerto para siempre.<br><br>\r\n\r\nEl otoño vendrá con caracolas,<br>\r\nuva de niebla y monjes agrupados,<br>\r\npero nadie querrá mirar tus ojos<br>\r\nporque te has muerto para siempre.<br><br>\r\n\r\nPorque te has muerto para siempre,<br>\r\ncomo todos los muertos de la Tierra,<br>\r\ncomo todos los muertos que se olvidan<br>\r\nen un montón de perros apagados.<br><br>\r\n\r\nNo te conoce nadie. No. Pero yo te canto.<br>\r\nYo canto para luego tu perfil y tu gracia.<br>\r\nLa madurez insigne de tu conocimiento.<br>\r\nTu apetencia de muerte y el gusto de tu boca.<br>\r\nLa tristeza que tuvo tu valiente alegría.<br>\r\nTardará mucho tiempo en nacer, si es que nace,<br>\r\nun andaluz tan claro, tan rico de aventura.<br>\r\nYo canto su elegancia con palabras que gimen<br>\r\ny recuerdo una brisa triste por los olivos.<br><br><br>\r\n\r\nGarcía Lorca\r\n\r\n', '2020-07-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `date`) VALUES
(1, 'Tiago', 'Dario', 'tiago@me.com', '123456', '2020-07-15'),
(2, 'Victor', 'Velayos', 'victor@me.com', '123456', '2020-07-13'),
(3, 'Maria', 'Caba', 'maria@me.com', '123456', '2020-05-07'),
(4, 'Esther', 'Garzo', 'esther@me.com', '123456', '2020-05-01'),
(5, NULL, NULL, 'tiago@tiago.com', '123456', NULL),
(6, 'Tiago', 'Dario', 'tiago@dario.com', '$2y$04$oLnzIij6MybaSdQwbK4ut.UAnfY0J2eNILFemqHBk0mUdM5lQYw6G', '2020-07-16'),
(8, 'Paula', 'Dario', 'paula@dario.com', '$2y$04$m5mlYxRL2/a3JmfegdKDkOrt.CEVN8bLlbq.W5P.NN8iXN64LWmG.', '2020-07-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post_user` (`user_id`),
  ADD KEY `fk_post_category` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_post_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_post_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
