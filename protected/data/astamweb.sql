-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 14 2014 г., 17:32
-- Версия сервера: 5.5.38-log
-- Версия PHP: 5.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(33, 'PHP и JavaScript', 'популярные языки программирования', 32, 1, 2),
(34, 'Защита сайтов', 'Комплекс услуг по защите сайтов от хакерских атак', 32, 1, 1);

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
(4, 'Услуги', '/services', 1, 0, 7),
(5, 'Заказать', '#', 0, 0, 5),
(6, 'Работы', '/#works', 1, 0, 6),
(7, 'Сайты', '#', 0, 6, 1),
(8, 'Мобильные приложения', '#', 0, 6, 2),
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
  `client_name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `client_phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `client_email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `document` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `tbl_requests`
--

INSERT INTO `tbl_requests` (`id`, `client_name`, `client_phone`, `client_email`, `document`, `message`, `status`, `date`) VALUES
(1, 'Алексей', '(066)479-96-18', 'lex24@ukr.net', 'dealers.doc', 'Тестовая форма связи', 2, '2014-09-11 09:56:51'),
(2, 'test', '(123)213-12-32', '', '', '', 2, '2014-09-18 15:38:48'),
(3, 'asdf', '(123)123-12-32', 'asd@asd.asd', '', '', 2, '2014-09-22 15:27:41');

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_services`
--

CREATE TABLE IF NOT EXISTS `tbl_services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `content` text NOT NULL,
  `active` tinyint(1) NOT NULL,
  `date` datetime NOT NULL,
  `announcement` text NOT NULL,
  `link` varchar(100) NOT NULL,
  `author_id` int(11) NOT NULL,
  `category_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Дамп данных таблицы `tbl_services`
--

INSERT INTO `tbl_services` (`id`, `title`, `content`, `active`, `date`, `announcement`, `link`, `author_id`, `category_id`) VALUES
(10, 'Разработка сайтов', '<p>\r\n	<em>Создание сайтов &mdash; ведущее направление нашей деятельности. Для разработки проектов используются исключительно передовые технологии и последние достижения в области программирования, которые позволяют создавать уникальный дизайн и понятную административную панель для управления сайтом.&nbsp;</em></p>\r\n<p>\r\n	Разработка веб-проектов проводится с нуля со сдачей &laquo;под ключ&raquo;. У нас также можно заказать рестайлинг сайта, разработку и внедрение дополнительного функционала для уже действующих ресурсов.&nbsp;</p>\r\n<p>\r\n	Сайт-визитка, бизнес-сайты, интернет-магазин - для каждого клиента мы предлагаем индивидуальные и функциональные решения, в зависимости от преследуемых целей и бюджета.</p>\r\n', 1, '2014-07-29 00:00:00', 'Создание сайтов — ведущее направление нашей деятельности. Для разработки проектов используются только передовые технологии и последние достижения в области программирования, которые позволяют создавать уникальный дизайн и понятную административную панель (СMS-систему) для управления сайтом. ', 'creating-sites', 1, 1),
(11, 'Веб-дизайн и верстка сайтов', 'Дизайн сайта &mdash; это тот фактор, который влияет на первое впечатление посетителя о ресурсе. И его нельзя недооценивать, поскольку от этого впечатления будет зависеть останется пользователь на сайте или сразу же уйдет. Для того, чтобы сайт вызывал положительные эмоции и интерес, важно сделать его веб-дизайн и запоминающимся, и удобным.<br />\r\nГлавная задача дизайна &mdash; не только создание оригинальной и привлекательной &laquo;обложки&raquo; сайта. Он должен обеспечить оптимальное сочетание презентабельного внешнего вида интернет-ресурса с логичной и понятной системой элементов, пользоваться которой будет легко и удобно как его владельцу, так и посетителям.&nbsp;<br />\r\nВажно понимать, что задание дизайнера не просто &laquo;раскрасить&raquo; сайт в нужные цвета. Его ключевая задача &ndash; обеспечить удобную и приятную среду для пользования. Для этого, еще на стадии разработки концепции будущего сайта, прорабатываются вопросы по расположению элементов, подаче информации, оформлению блоков, использованию контента &ndash; всего того, что относится к работе с юзабилити.<br />\r\nВ процессе работы над юзабилити сайта мы создаем оптимальное сочетание уникального и привлекательного внешнего оформления ресурса с понятной структурой, удобным функционалом, логичными элементами управления и читабельным контентом.<br />\r\nНемаловажным этапом при разработке сайтов является верстка. Она заключается в подготовке html-макета веб-страниц будущего интернет-ресурса. От качественной верстки зависит корректное отображение сайта в различных браузерах и на мониторах разного разрешения.<br />\r\nУмение найти идеальный баланс и расставить нужные акценты поможет не только привлечь посетителей на сайт. Это будет способствовать превращению посетителей в постоянных пользователей, а значит и &nbsp;потребителей той продукции или услуг, которые этот интернет-ресурс предлагает.<br />\r\nМы создаем привлекательный и эффективный дизайн сайтов: с симпатичным и запоминающимся &laquo;лицом&raquo; и удобным интерфейсом.<br />\r\nСтоимость услуг зависит от сложности и объема веб-проекта и стартует от 200 у.е.', 1, '2014-07-29 00:00:00', 'Главная задача дизайна &mdash; не только создание оригинальной и привлекательной &laquo;обложки&raquo; сайта. Веб-дизайн должен обеспечить оптимальное сочетание презентабельного внешнего вида сайта с логичной и понятной системой элементов, пользоваться которой будет легко и удобно, как владельцу интернет-ресурса, так и его посетителям.', 'web-design', 0, 32),
(12, 'Копирайтинг: написание уникальных материалов', 'Копирайтинг &mdash; это подготовка уникальных, интересных, доступно написанных и грамотно поданных текстовых материалов, главная задача которых заинтересовать посетителей в продукции, услугах, которые предлагает &nbsp;сайт.&nbsp;<br />\r\nМногие недооценивают значение информационного содержимого сайта. А ведь именно уникальное текстовое наполнение является одним из важнейших факторов, который определяет популярность и востребованность веб-ресурса и влияет на его успешное продвижение и раскрутку.<br />\r\nПодготовку текстовой составляющей сайта нужно доверять &nbsp;квалифицированным специалистам. Копирайтеры веб-студии &laquo;Вершина успеха&raquo; создают уникальные, интересные и доступные для потребителей тексты на любую тематику и разного назначения.&nbsp;<br />\r\nПомимо стандартного копирайтинга, мы предлагаем услуги:\r\n<ul>\r\n	<li>SEO-копирайтинг &mdash; подготовка уникальных и грамотных материалов с оптимизацией для продвижения сайта в поисковых системах;</li>\r\n	<li>написание рекламных текстов &mdash; подготовка &laquo;продающих&raquo; материалов, которые интригуют и стимулируют посетителя к определенным действиям;</li>\r\n	<li>рерайтинг &mdash; грамотная текстовая обработка статьи из первоисточника до ее полной &laquo;внешней&raquo; несопоставимости, но с сохранением &nbsp; первоначального смысла и идеи.</li>\r\n	<li>редактирование материалов &mdash; подготовка различной информации (пресс-релиз, доклад, выступление, презентация, статистические данные, исследования) к опубликованию в интернете: литературная обработка, структурирование, редактирование.</li>\r\n</ul>\r\nВажно понимать, что подготовка текстовых материалов для интернет-ресурсов и их наполнение - не менее важная и ответственная задача, чем разработка сайтов. Заказывая в веб-студии услугу по разработке сайта, не забудьте и про профессиональный копирайтинг. В противном случае Вы можете оказаться в достаточно распространенной и неприятной ситуации: когда вложив немалые средства, потратив много сил и времени, в итоге получить качественный, но не работающий продукт.&nbsp;<br />\r\nМы создаем профессиональные тексты, которые будут интересны и полезны пользователям Вашего сайта. Качественный контент от нашей веб-студии повышает имидж веб-ресурса и помогает превратить в постоянных пользователей и реальных клиентов даже случайных посетителей. Главное - заинтересовать!<br />\r\n<strong>Стоимость услуг</strong>&nbsp;(за 1500 знаков без пробелов или 1 страница):\r\n\r\n<ul>\r\n	<li>копирайтинг &mdash; 120 грн/480 руб.;</li>\r\n	<li>SEO-копирайтинг &mdash; 150 грн/600 руб.;</li>\r\n	<li>рекламные тексты &mdash; 150 грн/600 руб.;</li>\r\n	<li>рерайтинг &mdash; 80 грн/320 руб.;</li>\r\n	<li>редактирование &mdash; 50 грн/200 руб.</li>\r\n</ul>\r\n', 1, '2014-09-26 15:56:06', 'Копирайтинг &mdash; это подготовка уникальных, интересных, доступно написанных и грамотно поданных текстовых материалов, главная задача которых заинтересовать посетителей в продукции, услугах, которые предлагает &nbsp;сайт. Многие недооценивают значение информационного содержимого сайта. А ведь именно уникальное текстовое наполнение является одним из важнейших факторов, который определяет популярность и востребованность веб-ресурса и влияет на его успешное продвижение и раскрутку.', 'copyrighting', 4, 4),
(13, 'Разработка мобильных приложений', '<h3>Приложение для мобильных устройств: ТЗ, разработка, тестирование, запуск, реклама</h3>\r\nНаша команда разрабатывает приложения для мобильных устройств в соответствии с требованиями заказчиков, задачами и конечной целью. В процессе создания используются новейшие достижения в области мобильных технологий, предназначенные для техники нового поколения.<br />\r\nНачальным и самым важным этапом при разработке мобильного приложения является подготовка<strong>Технического Задания</strong>&nbsp;(ТЗ). Если говорить в общем, то ТЗ &mdash; это понимание разработчиками и заказчиком цели создания программного продукта, детально прописанное в технических условиях и параметрах. Заказчик и исполнитель должны четко понимать, какой продукт будет разработан еще на этапе ТЗ. Только после согласования всех нюансов, вплоть до мельчайших деталей, можно приступать непосредственно к программированию.<br />\r\n<strong>Тестирование</strong>&nbsp;&mdash; следующий за разработкой этап, в ходе которого отслеживается корректность работы программного продукта. Наши специалисты очень тщательно подходят к проведению тестов, вовремя реагируя на те или иные отклонения в работе приложения. При получении положительных результатов осуществляется запуск готового мобильного приложения.<br />\r\n<strong>Реклама</strong>&nbsp;&mdash; важная часть продвижения мобильного продукта на рынке. SEO-специалисты студии анализируют конкурентную среду и разрабатывают наиболее эффективную модель раскрутки приложения. В ходе продвижения, на каждом этапе проводится мониторинг и анализ достигнутых результатов, при необходимости проводится коррекция рекламного проекта.\r\n\r\n<h3>Наши разработки: бесплатные мобильные приложения</h3>\r\n<strong>&laquo;Акции для дилеров&raquo;</strong>&nbsp;- приложение для мобильных устройств, которое обеспечивает оперативное информирование об акциях, новостях, актуальных предложениях компании.<br />\r\n<a href="https://play.google.com/store/apps/details?id=com.platon.astamrss&amp;feature=search_result#?t=W251bGwsMSwxLDEsImNvbS5wbGF0b24uYXN0YW1yc3MiXQ" target="_blank">Подробнее здесь &gt;&gt;</a><br />\r\n<br />\r\n<strong>&laquo;Фото натяжных потолков&raquo;</strong>&nbsp;- динамическая фотоколлекция, посвященная теме дизайна потолков. Установка приложения позволит просматривать огромный каталог фотографий высокого качества, следить за добавлением новых иллюстраций.<br />\r\n<a href="https://play.google.com/store/apps/details?id=com.platon.astam_gallery" target="_blank">Подробнее здесь &gt;&gt;</a><br />\r\n<br />\r\n<strong>&laquo;Roombot: дизайн интерьера</strong><strong>&raquo;</strong>&nbsp;-&nbsp;динамический фотокаталог изображений, посвященных дизайну интерьера. Лучшие фотографии интерьерного дизайна с тематических сайтов, блогов, сообществ, групп ВКонтакте. Русский интерфейс, удобный поиск фото по темам, возможность добавления рисунков в закладки, ежедневное обновление базы данных. Настоящая сокровищница идей для собственного ремонта!<br />\r\n<a href="https://play.google.com/store/apps/details?id=com.astam.roombot" target="_blank">Подробнее здесь &gt;&gt;</a><br />\r\n<strong>&laquo;Где мама?&raquo;</strong>&nbsp;- детская развивающая и познавательная игра для детей младшего возраста (от полутора лет). Учиться и играть можно одновременно!<br />\r\n<a href="https://play.google.com/store/apps/details?id=com.platon.animalmothers" target="_blank">Подробнее здесь &gt;&gt;</a><br />\r\n<br />\r\n<strong>Мобильная книга для детей</strong>&nbsp;&mdash; прекрасная и удобная альтернатива традиционным книгам. &laquo;Сказка про Зайца и Ежа&raquo; - иллюстрированная красочная сказка для детей, читать которую можно на мобильном телефоне, планшете и других устройствах. Это так удобно! Возьмите &laquo;книжку&raquo; с собой в дорогу...<br />\r\n<a href="https://play.google.com/store/apps/details?id=com.platon.skazka" target="_blank">Подробнее здесь &gt;&gt;</a>', 1, '2014-10-03 16:57:18', 'Разработка мобильных приложений &mdash; одно из направлений деятельности веб-студии &laquo;Вершина успеха&raquo;. Мы активно осваиваем этот рынок, создавая под заказ качественные и полезные программные продукты для потребителей в сфере мобильных технологий.<br />\r\nПриложения для мобильных телефонов и других устройств &mdash; актуальная тема, которая интересна всем участникам процесса: разработчикам, заказчикам и пользователям, для которых, собственно, они и создаются. Они помогают решать деловые и личные вопросы, получать информацию, учиться, общаться, отдыхать, находясь в любом месте и в любое время. Поэтому владельцы мобильных устройств стараются &laquo;оснастить&raquo; их всем необходимым, а компании предложить интересные для потребителей&nbsp;', 'applications', 4, 2);

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
(1, 'demo', '$2a$13$79RFciA/Iesd2gZglXDxF.XtM7Iv.7P/ASLGuAj/4qW/.oP3BNvkW', 'demo@mail.ru', 'lex', '543ULNV10sHkA', 'administrator'),
(4, 'admin', '$2a$13$ricyt/kEedlYj6Rx31TUhO9XiFKwG86UkPXl0QQ2jABGpYy2ZMIYq', 'admin@ukr.net', 'lex', '54XJD7Hpukpr.', 'administrator'),
(5, 'platon', '', 'platon444@inbox.ru', 'plation', '53XOW1oJNdg6c', 'moderator'),
(13, 'anton', '', 'topsuak@gmail.com', NULL, '53YV9A6KZitOM', 'moderator');

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
