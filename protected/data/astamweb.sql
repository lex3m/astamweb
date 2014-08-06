-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Авг 06 2014 г., 14:41
-- Версия сервера: 5.6.19
-- Версия PHP: 5.3.10-1ubuntu3.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `astamweb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `parent_cat_id` int(11) unsigned NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL,
  `position` smallint(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_category_id` (`parent_cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=35 ;

--
-- Дамп данных таблицы `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `description`, `parent_cat_id`, `active`, `position`) VALUES
(1, 'Сайты', 'Разработка и продвижение сайтов', 0, 1, 1),
(2, 'Мобильные приложения', 'Разработка и продвижение мобильных приложений', 0, 1, 2),
(3, '3D Ролики, Видео и инфографика', 'Создание роликов, видео и инфографики', 0, 1, 3),
(4, 'Продвижение сайтов', '', 1, 1, 2),
(5, 'Рекламные кампании', '', 4, 1, 1),
(6, 'Продвижение приложений', '', 2, 1, 2),
(13, 'Продвижение видео', 'Каналы на YouTube и др.', 3, 1, 1),
(32, 'Разработка сайтов', 'весь комплекс услуг по разработке, все языки программирования', 1, 1, 1),
(33, 'PHP и JavaScript', 'популярные языки программирования', 32, 1, 1),
(34, 'Защита сайтов', 'Комплекс услуг по защите сайтов от хакерских атак', 32, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_comment`
--

CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `author` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_comment_post` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_lookup`
--

CREATE TABLE IF NOT EXISTS `tbl_lookup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `type` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_menu`
--

CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `parent_menu_id` int(11) unsigned NOT NULL DEFAULT '0',
  `position` smallint(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_menu_id` (`parent_menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Дамп данных таблицы `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `title`, `link`, `active`, `parent_menu_id`, `position`) VALUES
(3, 'О нас', '/#about-us', 1, 0, 8),
(4, 'Услуги', '/#services', 1, 0, 7),
(5, 'Заказать', '#', 0, 0, 5),
(6, 'Работы', '/#works', 1, 0, 6),
(7, 'Сайты', '#', 0, 6, 1),
(8, 'Мобильные приложения', '#', 0, 6, 2),
(13, 'asdasd', '', 0, 14, 2),
(14, 'asdasdad', '', 0, 0, 9),
(15, 'qwe', '', 0, 14, 3),
(17, 'Контакты', '/#kontakts', 1, 0, 8),
(18, 'Идея студии', '/#idea', 1, 0, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_post`
--

CREATE TABLE IF NOT EXISTS `tbl_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `tags` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_post_author` (`author_id`),
  KEY `FK_category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_requests`
--

CREATE TABLE IF NOT EXISTS `tbl_requests` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `clientname` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `clientemail` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `document` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_services`
--

CREATE TABLE IF NOT EXISTS `tbl_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `date` date NOT NULL,
  `announcement` text NOT NULL,
  `link` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `tbl_services`
--

INSERT INTO `tbl_services` (`id`, `title`, `content`, `status`, `date`, `announcement`, `link`) VALUES
(10, 'Разработка сайтов', '<p>\r\n	<em>Создание сайтов &mdash; ведущее направление нашей деятельности. Для разработки проектов используются исключительно передовые технологии и последние достижения в области программирования, которые позволяют создавать уникальный дизайн и понятную административную панель для управления сайтом.&nbsp;</em></p>\r\n<p>\r\n	Разработка веб-проектов проводится с нуля со сдачей &laquo;под ключ&raquo;. У нас также можно заказать рестайлинг сайта, разработку и внедрение дополнительного функционала для уже действующих ресурсов.&nbsp;</p>\r\n<p>\r\n	Сайт-визитка, бизнес-сайты, интернет-магазин - для каждого клиента мы предлагаем индивидуальные и функциональные решения, в зависимости от преследуемых целей и бюджета.</p>\r\n', 1, '2014-07-29', 'Создание сайтов — ведущее направление нашей деятельности. Для разработки проектов используются только передовые технологии и последние достижения в области программирования, которые позволяют создавать уникальный дизайн и понятную административную панель (СMS-систему) для управления сайтом. ', 'creating-sites'),
(11, 'Веб-дизайн и верстка сайтов', '<p>\r\n	Дизайн сайта &mdash; это тот фактор, который влияет на первое впечатление посетителя о ресурсе. И его нельзя недооценивать, поскольку от этого впечатления будет зависеть останется пользователь на сайте или сразу же уйдет. Для того, чтобы сайт вызывал положительные эмоции и интерес, важно сделать его веб-дизайн и запоминающимся, и удобным.</p>\r\n<p>\r\n	Главная задача дизайна &mdash; не только создание оригинальной и привлекательной &laquo;обложки&raquo; сайта. Он должен обеспечить оптимальное сочетание презентабельного внешнего вида интернет-ресурса с логичной и понятной системой элементов, пользоваться которой будет легко и удобно как его владельцу, так и посетителям.&nbsp;</p>\r\n<p>\r\n	Важно понимать, что задание дизайнера не просто &laquo;раскрасить&raquo; сайт в нужные цвета. Его ключевая задача &ndash; обеспечить удобную и приятную среду для пользования. Для этого, еще на стадии разработки концепции будущего сайта, прорабатываются вопросы по расположению элементов, подаче информации, оформлению блоков, использованию контента &ndash; всего того, что относится к работе с юзабилити.</p>\r\n<p>\r\n	В процессе работы над юзабилити сайта мы создаем оптимальное сочетание уникального и привлекательного внешнего оформления ресурса с понятной структурой, удобным функционалом, логичными элементами управления и читабельным контентом.</p>\r\n<p>\r\n	Немаловажным этапом при разработке сайтов является верстка. Она заключается в подготовке html-макета веб-страниц будущего интернет-ресурса. От качественной верстки зависит корректное отображение сайта в различных браузерах и на мониторах разного разрешения.</p>\r\n<p>\r\n	Умение найти идеальный баланс и расставить нужные акценты поможет не только привлечь посетителей на сайт. Это будет способствовать превращению посетителей в постоянных пользователей, а значит и &nbsp;потребителей той продукции или услуг, которые этот интернет-ресурс предлагает.</p>\r\n<p>\r\n	Мы создаем привлекательный и эффективный дизайн сайтов: с симпатичным и запоминающимся &laquo;лицом&raquo; и удобным интерфейсом.</p>\r\n<p>\r\n	Стоимость услуг зависит от сложности и объема веб-проекта и стартует от 200 у.е.</p>\r\n', 1, '2014-07-29', 'Главная задача дизайна — не только создание оригинальной и привлекательной «обложки» сайта. Веб-дизайн должен обеспечить оптимальное сочетание презентабельного внешнего вида сайта с логичной и понятной системой элементов, пользоваться которой будет легко и удобно, как владельцу интернет-ресурса, так и его посетителям.', 'web-design');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_tag`
--

CREATE TABLE IF NOT EXISTS `tbl_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `frequency` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `profile` text COLLATE utf8_unicode_ci,
  `authKey` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `email`, `profile`, `authKey`, `role`) VALUES
(1, 'demo', '$2a$13$79RFciA/Iesd2gZglXDxF.XtM7Iv.7P/ASLGuAj/4qW/.oP3BNvkW', 'demo@mail.ru', 'lex', '53f7Iy9.l3oFk', 'administrator'),
(4, 'admin', '$2a$13$g5bxbPSfTXJ5/gajFBxe..TUGcTI2Qe6iP5SzoUePBU6UoNUfaZBS', 'admin@ukr.net', 'lex', '53LnyjxJueAes', 'administrator'),
(5, 'platon', '$2a$13$G2sqOM0MQgmmcnaTbXpjXuW.OX.duadiW1PfzZjNKd0qaWlSSmLYe', 'platon444@inbox.ru', 'plation', '53XOW1oJNdg6c', 'administrator'),
(13, 'anton', '$2a$13$VdPhvdzv2cP.kodmFPvFsek6vUGzmKXiKvqJR3zyqG9MHXbqRy7H6', 'topsuak@gmail.com', NULL, '53YV9A6KZitOM', 'administrator');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_works`
--

CREATE TABLE IF NOT EXISTS `tbl_works` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `tags` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_post_author` (`author_id`),
  KEY `FK_category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_works_image`
--

CREATE TABLE IF NOT EXISTS `tbl_works_image` (
  `id` int(11) unsigned NOT NULL,
  `work_id` int(11) unsigned NOT NULL,
  `img_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL,
  `sorter` mediumint(8) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_work_id` (`work_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `FK_comment_post` FOREIGN KEY (`post_id`) REFERENCES `tbl_post` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD CONSTRAINT `FK_category_id` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_post_author` FOREIGN KEY (`author_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
