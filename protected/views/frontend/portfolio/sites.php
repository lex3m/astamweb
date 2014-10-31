<?php
/* @var $this PortfolioController */
?>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/styles/css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/styles/css/jquery.jscrollpane.css" />
<!-- Fullscreen jQuery template -->
<script id="fullviewTmpl" type="text/x-jquery-tmpl">
			{{html bgimage}}
			<div class="full-view">
				<span class="full-view-exit">Exit full screen view</span>
				<div class="header">
					<h2 class="title">${title}</h2>
					<div class="full-nav">
						<span class="full-nav-prev">Previous</span>
						<span class="full-nav-pages">
							<span class="full-nav-current">${current}</span>/
							<span class="full-nav-total">${total}</span>
						</span>
						<span class="full-nav-next">Next</span>
					</div>
					<p class="subline">${subline}</p>
					<span class="loading-small"></span>
				</div>
				<div class="project-descr-full">
					<div class="thumbs-wrapper"><div class="thumbs">{{html thumbs}}</div></div>
					<div class="project-descr-full-wrapper">
						<div class="project-descr-full-content">{{html description}}</div><!-- project-descr-full-content -->
					</div>
				</div><!-- project-descr-full -->
			</div><!-- full-view -->
		</script>
<div class="container" id="container">

<div class="item block" data-bgimage="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/asta_werh.jpg">
    <div class="thumbs-wrapper">
        <div class="thumbs">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/asta_werh.jpg"/>
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/asta_niz.jpg"/>
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/asta_wnutrenyaya.jpg"/>
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/asta_novosty.jpg"/>
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/asta_kontakty.jpg"/>
        </div>
    </div>
    <h2 class="title">astam.ru</h2>
    <p class="subline">Корпоративный сайт крупного производителя</p>
    <div class="intro">
        <p>Разработка интернет-портала для крупного предприятия. Одна из фишек - реализация мультигородности. Проделана огромная работа по подговке контента, 3D рисунков, панорам. Продвижение сайта и настройка рекламных кампаний.<a href="#" class="more_link">Подробнее</a></p>
    </div>
    <div class="project-descr">
        <h3>Выполненные работы по проекту:</h3>
		<ol>
			<li>Анализ рынка, конкурентов, спроса.</li>
            <li>Формирование концепции сайта, семантического ядра.</li>
			<li>Дизайн сайта в корпоративном стиле компании; подготовка иконок, баннеров, картинок в стилистике сайта.</li>
			<li>Верстка макета: кроссбраузерная и адаптивная под мобильные устройства.</li>
			<li>Разработка мобильной версии.</li>
			<li>Программирование: реализация мультигородности, создание калькулятора; установка и настройка модулей: отзывы, онлайн-формы заказа, обратная связь, слайдер, галерея, выбор цвета, новости, статьи, акции.</li>
			<li>Создание мобильных приложений для устройств с ОС Android: «Фото натяжных потолков» и «Акции компании».</li>
			<li>Оптимизация сайта.</li>
			<li>Написание уникального, заточенного под SEO контента, подготовка графических изображений.</li>
			<li>3D графика: создание 3D изображений, 3D панорам.</li>
			<li>Настройка системы онлайн-поддержки.</li>
			<li>Продвижение сайта в поисковых системах, SMM продвижение.</li>
			<li>Контент- и техническая поддержка.</li>
            <li>Услуга хостинга.</li>
		</ol>
    </div>
</div>

<div class="item block" data-bgimage="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/dental_1.jpg">
    <div class="thumbs-wrapper">
        <div class="thumbs">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/dental_1.jpg"/>
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/dental_2.jpg"/>
        </div>
    </div>
    <h2 class="title">dentalsolutions.ru</h2>
    <p class="subline">Сайт стоматологической клиники</p>
    <div class="intro">
        <p>Масштабный проект - создание сайта под ключ. Были выполнены комплексные работы: программирование, дизайн, верстка, копирайтинг/рерайтинг, наполнение, оптимизация. <a href="#" class="more_link">Подробнее</a></p></div>
    <div class="project-descr">
        <h3>Выполненные работы по проекту:</h3>
		<ol>			
            <li>Анализ конкурентов, изучение спроса.</li>
            <li>Формирование концепции сайта, подготовка ТЗ, семантического ядра.</li>
			<li>Дизайн сайта: разработка логотипа, фирменного стиля, баннеров, графики, иконок.</li>
			<li>Верстка: кроссбраузерная и адаптивная под мобильные устройства.</li>
			<li>Программирование, настройка модулей и функционала: слайдер, фотогалерея, статьи, отзывы, цены, обратная форма связи, анонсирование материалов на главной странице.</li>
			<li>Оптимизация сайта.</li>
			<li>Подготовка контента: узкоспециализированные статьи, графика; согласование каждого материала.</li>
			<li>Настройка рекламной кампании в Яндекс.Директ.</li>
            <li>Услуга хостинга.</li>
		</ol>
    </div>
</div>


<div class="item block" data-bgimage="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/proffstyle_all.jpg">
    <div class="thumbs-wrapper">
        <div class="thumbs">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/proffstyle001.jpg"/>
        </div>
    </div>
    <h2 class="title">proff-style.ru</h2>
    <p class="subline">Сайт под ключ для строительно-ремонтной компании</p>
    <div class="intro">
        <p>Создание сайта для продвижения услуг компании и дополнительного источника клиентов. Комплексные работы - от анализа рынка до запуска полноценного ресурса.<a href="#" class="more_link">Подробнее</a></p>
    </div>
    <div class="project-descr">
        <h3>Выполненные работы по проекту:</h3>
		<ol>
			<li>Анализ рынка, конкурентов, спроса.</li>
<li>Формирование концепции сайта, семантического ядра, разработка ТЗ.</li>
		<li>Дизайн сайта, включая разработку логотипа, фирменного стиля, подготовка изображений, информационных блоков.</li>
			<li>Верстка: кроссбраузерная, адаптивная под мобильные устройства.</li>
			<li>Программирование. Внедрен «классический» набор модулей: новости, галерея, слайдер, онлайн-формы, отзывы.</li>
			<li>Копирайтинг и наполнение сайта: продающие статьи, заточенные под SEO, наполнение и оформление текстовых материалов.</li>
			<li>Оптимизация сайта.</li>
<li>Услуга хостинга.</li>
		</ol>
    </div>
</div>

<div class="item block" data-bgimage="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/bashnya_stroy_all.jpg">
    <div class="thumbs-wrapper">
        <div class="thumbs">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/bashnya_stroy_1.jpg"/>
        </div>
    </div>
    <h2 class="title">bashnya-stroy.ru</h2>
    <p class="subline">Сайт «под ключ» для строительной компании</p>
    <div class="intro">
        <p>Создание сайта с нуля для продвижения услуг компании и привлечения новых клиентов.<a href="#" class="more_link">Подробнее</a></p>
    </div>
    <div class="project-descr">
        <h3>Выполненные работы по проекту:</h3>
		<ol>
			<li>Анализ рынка, формирование концепции сайта, разработка ТЗ.</li>
<li>Формирование семантического ядра.</li>
			<li>Дизайн сайта, включая разработку логотипа и фирменного стиля.</li>
			<li>Верстка: кроссбраузерная, адаптивная под мобильные устройства.</li>
			<li>Программирование, настройка модулей и функционала: статьи, фотогалерея, онлайн-форма заказа, форма обратной связи, слайдер, отзывы. Был разработан и внедрен калькулятор для расчета стоимости услуг.</li>
			<li>SEO-копирайтинг, наполнение сайта. Обработка фото заказчика и наполнение фотогалереи.</li>
			<li>Оптимизация сайта.</li>
			<li>Услуга хостинга.</li>
		</ol>
    </div>
</div>

<div class="item block" data-bgimage="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/astam_com_ua_all.jpg">
    <div class="thumbs-wrapper">
        <div class="thumbs">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/astam_com_ua_1.jpg"/>
        </div>
    </div>
    <h2 class="title">astam.com.ua</h2>
    <p class="subline">Лендинг пейдж для продажи товаров и услуг</p>
    <div class="intro">
        <p>Создание Лендинг Пейдж. Ресурс ориентирован на две целевые аудитории - дилеров и частных клиентов. Основная работа включала разработку дизайна и визуальных элементов.<a href="#" class="more_link">Подробнее</a></p>
    </div>
    <div class="project-descr">
        <h3>Выполненные работы по проекту:</h3>
		<ol>
			<li>Формирование концепции, разработка ТЗ.</li>
			<li>Дизайн сайта в корпоративном стиле компании; 3D графика.</li>
			<li>Верстка сайта: кроссбраузерная и адаптивная под мобильные устройства.</li>
			<li>Программирование, настройка модулей и функционала: онлайн-счетчик, онлайн-форма заказа, онлайн-калькулятор.</li>
			<li>Настройка системы онлайн-поддержки.</li>
			<li>Написание уникального контента.</li>
			<li>Оптимизация сайта.</li>
			<li>Контент- и техподдержка сайта.</li>
			<li>Продвижение сайта в поисковых системах.</li>
<li>Услуга хостинга.</li>
		</ol>
    </div>
</div>

<div class="item block" data-bgimage="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/rooms_all.jpg">
    <div class="thumbs-wrapper">
        <div class="thumbs">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/rooms_1.jpg"/>
        </div>
    </div>
    <h2 class="title">rooms-mebel.com.ua</h2>
    <p class="subline">Разработка интернет-магазина</p>
    <div class="intro">
        <p>Создание интернет-магазина мебели без наполнения каталога товаров. Проект в стадии разработки.<a href="#" class="more_link">Подробнее</a></p>
    </div>
    <div class="project-descr">
        <h3>Выполненные работы по проекту:</h3>
		<ol>
			<li>Анализ рынка, конкурентов, спроса.</li>
<li>Разработка ТЗ.</li>
			<li>Дизайн сайта.</li>
			<li>Верстка: кроссбраузерная, адаптивная под мобильные устройства.</li>
			<li>Программирование.</li>
		</ol>
    </div>
</div>


<div class="item block" data-bgimage="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/alumil.jpg">
    <div class="thumbs-wrapper">
        <div class="thumbs">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/alumil.jpg"/>
        </div>
    </div>
    <h2 class="title">alumilpro.ru</h2>
    <p class="subline">Модернизация, контент- и техподдержка сайта</p>
    <div class="intro">
        <p>Доработка сайта. Проводятся работы по расширению структуры, модернизации функционала, добавления новых модулей и компонентов. Уже более года проект находится на всесторонней поддержке студии: написание статей и наполнение сайта, разработка калькуляторов, добавление конструкторов, размещение каталога.<a href="#" class="more_link">Подробнее</a></p>
    </div>
    <div class="project-descr">
        <h3>Выполняемые работы по проекту:</h3>
		<ol>
			<li>Анализ и разработка ТЗ для каждого нового этапа работ.</li>
			<li>Доработка дизайна сайта: подготовка иконок, кнопок, изображений.</li>
			<li>Верстка: кроссбраузерная с адаптацией под мобильные устройства.</li>
			<li>Программирование модулей и функционала: разработаны и добавлены новые онлайн-калькуляторы, каталог продукции, конструктор шкафов.</li>
			<li>Копирайтинг: написание и наполнение SEO-статьями.</li>
<li>Работа с изображениями: обработка фото и наполнение фотогалереи.</li>
			<li>Расширение структуры: создание новых разделов, рубрик, меню.</li>
			<li>Оптимизация сайта.</li>
			<li>Контент- и техподдержка сайта.</li>
			<li>Услуга хостинга.</li>
		</ol>
    </div>
</div>


<div class="item block" data-bgimage="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/potolki_sity_1.jpg">
    <div class="thumbs-wrapper">
        <div class="thumbs">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/potolki_sity_2.jpg"/>
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/potolki_sity_1.jpg"/>
        </div>
    </div>
    <h2 class="title">potolok-cityplus.ru</h2>
    <p class="subline">Лендинг-пейдж для потолочной компании</p>
    <div class="intro">
        <p>Создание сайта под контекстную рекламу. Ключевые страницы представлены по принципу лендинг пейдж.<a href="#" class="more_link">Подробнее</a></p>
    </div>
    <div class="project-descr">
        <h3>Выполненные работы по проекту:</h3>
		<ol>
			<li>Анализ рынка и конкурентов.</li>
<li>Разработка ТЗ.</li>
			<li>Дизайн сайта: лендинг пейдж для главной и ключевых страниц сайта.</li>
			<li>Верстка: кроссбраузерная, адаптивная.</li>
			<li>Программирование. Настройка модулей и функционала: онлайн-калькулятор, слайдер, фотогалерея, отзывы, онлайн-формы заказа, акции, новости, статьи.</li>
			<li>Копирайтинг: SEO-статьи; наполнение сайта.</li>
<li>Подбор, обработка изображений для фотогалереи.</li>
			<li>Оптимизация сайта.</li>
			<li>Услуга хостинга.</li>
		</ol>
    </div>
</div>

<div class="item block" data-bgimage="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/cezarstroy_all.jpg">
    <div class="thumbs-wrapper">
        <div class="thumbs">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/cezarstroy_1.jpg"/>
        </div>
    </div>
    <h2 class="title">cezarstroy.ru</h2>
    <p class="subline">Создание продающего сайта под контекстную рекламу</p>
    <div class="intro">
        <p>Дизайн и структура сайта разрабатывался по принципу лендинг пейдж. Большое внимание уделялось визуализации услуг и предложений компании для целевой аудитории.<a href="#" class="more_link">Подробнее</a></p>
    </div>
    <div class="project-descr">
        <h3 style="margin-bottom: 0cm;">Выполненные работы по проекту:</h3>
		<ol>
			<li>Анализ рынка, формирование концепции сайта.</li>
<li>Разработка технического задания, формирование семантического ядра.</li>
			<li>Дизайн сайта. Лендинг пейдж для главной страницы сайта и ключевых разделов.</li>
			<li>Верстка сайта. Кроссбраузерная, адаптивная под мобильные устройства.</li>
			<li>Программирование: статьи, акции, фотогалерея, онлайн-формы, отзывы.</li>
			<li>Копирайтинг и наполнение сайта. Написание продающих статей, оптимизированных под ключевые запросы, размещение и оформление.</li>
			<li>Оптимизация сайта: ключевые слова, дискрипшны, титлы.</li>
			<li>На данный момент ведется настройка рекламной кампании в Яндексе.</li>
		</ol>
    </div>
</div>



<div class="item block" data-bgimage="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/14.jpg">
    <div class="thumbs-wrapper">
        <div class="thumbs">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/windkompani.jpg"/>
        </div>
    </div>
    <h2 class="title">windcompany-s.com.ua</h2>
    <p class="subline">Комплексная модернизация сайта оконной тематики</p>
    <div class="intro">
        <p>Перенос сайта на новую платформу, редизайн, расширение структуры, оптимизация, копирайтинг. <a href="#" class="more_link">Подробнее</a></p>
    </div>
    <div class="project-descr">
        <h3>Выполненные работы по проекту:</h3>
		<ol>
			<li>Оценка сайта и подготовка рекомендаций по его усовершенствованию.</li>
			<li>Анализ конкурентов, спроса, разработка ТЗ.</li>
	<li>Формирование семантического ядра.</li>
			<li>Дизайн сайта: было создано два принципиально разных макета на выбор заказчика.</li>
			<li>Программирование: настройка и установка модулей и функционала. Фотогалерея, отзывы, онлайн-формы заказа, слайдеры, поиск по сайту, карта сайта.</li>
			<li>Копирайтинг и наполнение: написание уникальных статей, заточенных под SEO.</li>
			<li>Комплексная оптимизация: метаданные, титлы.</li>
			<li>Настройка системы онлайн-поддержки.</li>
		</ol>
    </div>
</div>

<div class="item block" data-bgimage="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/timeceiling_all.jpg">
    <div class="thumbs-wrapper">
        <div class="thumbs">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/time_siling_1.jpg"/>
        </div>
    </div>
    <h2 class="title">timeceiling.ru</h2>
    <p class="subline">Сайт-визитка для ремонтной компании</p>
    <div class="intro">
        <p>Создание контентного ресурса для компании, работающей в области отделки. Сайт-визитка с калькулятором. <a href="#" class="more_link">Подробнее</a></p></div>
   <div class="project-descr">
        <h3>Выполненные работы по проекту:</h3>
		<ol>
			<li>Разработка ТЗ, формирование семантического ядра.</li>
			<li>Дизайн сайта: простой и лаконичный по требованию заказчика.</li>
			<li>Программирование: настройка и установка модулей и функционала. Фотогалерея, отзывы, онлайн-формы заказа, слайдер. Разработка калькулятора.</li>
			<li>Копирайтинг и наполнение: написаны уникальные оптимизированные статьи.</li>
			<li>Комплексная оптимизация сайта.</li>
			<li>Услуга хостинга.</li>
		</ol>
    </div>
</div>

<div class="item block" data-bgimage="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/specautostroy_all.jpg">
    <div class="thumbs-wrapper">
        <div class="thumbs">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/spetcautostroy.jpg"/>
        </div>
    </div>
    <h2 class="title">specautostroy.ru</h2>
    <p class="subline">Функциональные доработки и программирование сайта спецтехники.</p>
    <div class="intro">
        <p>Программные, дизайнерские, контентные доработки сайта. Все работы были проведены оперативно, сайт запущен.<a href="#" class="more_link">Подробнее</a></p>
    </div>
    <div class="project-descr">
        <h3>Выполненные работы по проекту:</h3>
		<ol>
			<li>Аудит сайта и подготовка рекомендаций по необходимым доработкам для запуска сайта.</li>
<li>Разработка ТЗ, формирование семантического ядра.</li>
			<li>Дизайн: разработка логотипа, баннеров, других элементов дизайна.</li>
			<li>Кроссбраузерная верстка, адаптация под мобильные устройства.</li>
			<li>Расширение информационной структуры сайта в соответствии со спецификой деятельности компании.</li>
			<li>Программирование: настройка модулей и функционала.</li>
			<li>Копирайтинг: написаны тематические статьи.</li>
			<li>Обработка изображений для оформления страниц.</li>
			<li>Оптимизация сайта.</li>
			<li>Настройка корпоративной почты.</li>
<li>Услуга хостинга.</li>
		</ol>
    </div>
</div>
<div class="item block" data-bgimage="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/potolokportal_all.jpg">
    <div class="thumbs-wrapper">
        <div class="thumbs">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/potolokportal_1.jpg"/>
        </div>
    </div>
    <h2 class="title">potolokportal.ru</h2>
    <p class="subline">Потолочный портал</p>
    <div class="intro">
        <p>Портал посвящен все видам потолочной отделки. Предоставляет возможность компаниям рекламировать свои услуги, привлекать клиентов, а посетителям получать полезную информацию о возможностях отделки потолка и находить исполнителей для своих задач.<a href="#" class="more_link">Подробнее</a></p>
    </div>
    <div class="project-descr">
        <h3>Выполненные работы по проекту:</h3>
		<ol>
			<li>Анализ рынка, конкурентных ресурсов, спроса.</li>
<li>Формирование концепции портала.</li>
<li>Разработка ТЗ.</li>
			<li>Дизайн и верстка портала.</li>
			<li>Программирование. Внедрение модулей и функционала: акции, новости, статьи, регистрационные формы, онлайн-заказы, комментарии, отзывы. Настройка фильтра.</li>
<li>Настройка личного кабинета для компаний, предпринимателей.</li>
			<li>Копирайтинг: SEO-статьи; наполнение сайта.</li>
<li>Подбор, обработка изображений для фотогалереи.</li>
			<li>Оптимизация.</li>
<li>Техподдержка портала.</li>
		</ol>
    </div>
</div>

<div class="item block" data-bgimage="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/mebeli_all.jpg">
    <div class="thumbs-wrapper">
        <div class="thumbs">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/mebeli_1.jpg"/>
        </div>
    </div>
    <h2 class="title">mebeli.kiev.ua</h2>
    <p class="subline">Продвижение интернет-магазина мебели</p>
    <div class="intro">
        <p>Аудит, оптимизация интернет-магазина под продвижение, настройка рекламных кампаний в Google и Яндекс.<a href="#" class="more_link">Подробнее</a></p>
    </div>
    <div class="project-descr">
        <h3>Выполненные работы по проекту:</h3>
		<ol>
			<li>Анализ конкурентов.</li>
<li>Аудит интернет-магазина.</li>
<li>Разработка ТЗ.</li>
			<li>Оптимизация сайта, исправление ошибок.</li>
			<li>Продвижение сайта (продолжается и на данный момент)</li>
			<li>Настройка рекламный кампаний в Google и Яндекс (продолжается на данный момент).</li>
			<li>Анализ эффективности продвижения и рекламы.</li>
		</ol>
    </div>
</div>

<div class="item block" data-bgimage="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/itcloud.jpg">
    <div class="thumbs-wrapper">
        <div class="thumbs">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/soyuz.jpg"/>
        </div>
    </div>
    <h2 class="title">Сайт "НТЦ Союз"</h2>
    <p class="subline">Создание сайта-визитки для компании, предоставляющей услуги в области ИТ-аутсорсинга. Проект в стадии разработки.</p>
    <div class="intro">
        <p>"Классический" информационный сайт, продвигающий услуги компании в Интернете. <a href="#" class="more_link">Подробнее</a></p>
    </div>
    <div class="project-descr">
        <h3>Запланированные работы по проекту:</h3>
		<ol>
			<li>Анализ рынка, конкурентов, спроса.</li>
			<li>Определение целевой аудитории, формирование семантического ядра.</li>
<li>Разработка ТЗ.</li>
			<li>Дизайн в процессе доработки.</li>
			<li>Программирование.</li>
<li>Ведется подготовка контента.</li>
		</ol>
    </div>
</div>

<div class="item block" data-bgimage="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/remontipotolok_all.jpg">
    <div class="thumbs-wrapper">
        <div class="thumbs">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/remontipotolok.jpg"/>
        </div>
    </div>
    <h2 class="title">remontipotolok.ru</h2>
    <p class="subline">Разработка сайта под ключ для ремонтной компании</p>
    <div class="intro">
		<p>Выполнены комплексные работы по созданию сайта с нуля и его запуску. Это контентный ресурс, оптимизированный. Отдельные виды услуг оформлены под контекстную рекламу.<a href="#" class="more_link">Подробнее</a></p>
    </div>
    <div class="project-descr">
        <h3>Выполненные работы по проекту:</h3>
		<ol>
			<li>Анализ регионального рынка, конкурентной среды.</li>
<li>Подготовка ТЗ, составление семантического ядра.</li>
			<li>Дизайн сайта. Подготовили два концептуально разных макета на выбор заказчика. Разработка всех визуальных элементов, обработка изображений, баннеров.</li>
			<li>Верстка: кроссбраузерная, адаптивная.</li>
			<li>Программирование. Настройка и установка модулей и функционала: отзывы, фотогалерея, онлайн-формы заказа, слайдеры, поиск по сайту, карта сайта.</li>
			<li>Настройка системы онлайн-поддержки.</li>
			<li>SEO-копирайтинг: написание уникального оптимизированного статейного материала.</li>
			<li>Оптимизация сайта.</li>
			<li>Услуга хостинга.</li>
		</ol>
    </div>
</div>

<div class="item block" data-bgimage="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/podmoskovnye_potolky_all.jpg">
    <div class="thumbs-wrapper">
        <div class="thumbs">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/podmoskovhye_potolki_1.jpg"/>
        </div>
    </div>
    <h2 class="title">podmospotolok.ru</h2>
    <p class="subline">Сайт-визитка для монтажной фирмы</p>
    <div class="intro">
        <p>Создание сайта-визитки, оптимизированного под определенный регион. Контентный ресурс с внедрением калькулятора расчета стоимости услуг компании. <a href="#" class="more_link">Подробнее</a></p>
    </div>
    <div class="project-descr">
        <h3>Виды работ по проекту:</h3>
		<ol>
			<li>Анализ регионального рынка.</li>
<li>Разработка ТЗ.</li>
<li>Составление семантического ядра.</li>
			<li>Дизайн и адаптивная верстка.</li>
			<li>Программирование. Внедрение модулей и функционала: слайдеры, фотогалерея, отзывы.</li>
			<li>Разработка онлайн-калькулятора: подготовка ТЗ, программирование, внедрение, тестирование.</li>
			<li>Копирайтинг: написание уникального контента.</li>
			<li>Подготовка изображений и наполнение фотогалереи.</li>
			<li>Оптимизация сайта.</li>
			<li>Услуга хостинга.</li>
		</ol>
    </div>
</div>

<div class="item block" data-bgimage="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/mossiling_all.jpg">
    <div class="thumbs-wrapper">
        <div class="thumbs">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/mossilling_1.jpg"/>
        </div>
    </div>
    <h2 class="title">mossiling.ru</h2>
    <p class="subline">Масштабные доработки сайта, оптимизация, продвижение</p>
    <div class="intro">
        <p>Глобальные программные, функциональные, дизайнерские и контентные доработки сайта. Запуск, продвижение, информационная и техподдержка проекта.<a href="#" class="more_link">Подробнее</a></p>
    </div>
    <div class="project-descr">
        <h3>Виды работ по проекту:</h3>
		<ol>
			<li>Аудит сайта, подготовка рекомендаций по комплексным доработкам.</li>
<li>Разработка ТЗ.</li>
			<li>Дизайн: были завершены работы по оформлению сайта, разработаны баннеры.</li>
<li>Верстка: были исправлены ошибки в верстке.</li>
			<li>Программирование. Настройка дополнительных модулей и функционала: слайдер, фотогалерея, онлайн-формы, отзывы.</li>
			<li>Настройка системы онлайн-поддержки.</li>
			<li>Копирайтинг: оптимизация контента, написание уникальных статей.</li>
			<li>Контент- и техническая поддержка сайта.</li>
			<li>Оптимизация. На сайте исполльзована технология оптимизации под города определенного региона, в результате чего выросли позиции сайта в Яндексе по городам.</li>
			<li>Продвижение сайта.</li>
		</ol>
    </div>
</div>

<div class="item block" data-bgimage="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/magazin_rybaka_all.jpg">
    <div class="thumbs-wrapper">
        <div class="thumbs">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/magazin_rybaka_1.jpg"/>
        </div>
    </div>
    <h2 class="title">magazin-rybaka.com</h2>
    <p class="subline">Создание интернет-магазина рыбацких снастей, экипировки</p>
    <div class="intro">
        <p>Разработка интернет-магазина без наполнения каталога.<a href="#" class="more_link">Подробнее</a></p>
    </div>
  <div class="project-descr">
        <h3>Выполненные работы по проекту:</h3>
		<ol>
			<li>Разработка ТЗ.</li>
			<li>Дизайн интернет-магазина.</li>
<li>Верстка: кроссбраузерная, адаптивная.</li>
			<li>Программирование.</li>
			<li>Создание рубрик каталога, меню.</li>
		</ol>
    </div>
</div>

<div class="item block" data-bgimage="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/InterAssistans_all.jpg">
    <div class="thumbs-wrapper">
        <div class="thumbs">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/Inter_Assistans1.jpg"/>
			<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/Inter_Assistans2.jpg"/>
			<img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/InterAssistans_an.jpg"/>
        </div>
    </div>
    <h2 class="title">inukrainestudy.com</h2>
    <p class="subline">Разработка трехъязычного сайта</p>
    <div class="intro">
        <p>Создание информационного презентационного сайта с нуля. Три языковые версии ресурса — русская, английская и французская.  <a href="#" class="more_link">Подробнее</a></p>
    </div>
    <div class="project-descr">
        <h3>Выполненные работы по проекту:</h3>
		<ol>
			<li>Анализ рынка, конкурентов.</li>
<li>Подготовка ТЗ, составление семантического ядра.</li>
			<li>Дизайн сайта. Разработка макета в стилистике компании, подготовка баннеров.</li>
			<li>Верстка сайта: кроссбраузерная и адаптивная под мобильные устройства.</li>
			<li>Программирование. Настройка модулей и функционала: слайдер, фотогалерея, онлайн-форма заказа, форма обратной связи, статьи, новости, карта сайта.</li>
			<li>Контент и наполнение сайта. Пока готова только русская версия, в стадии наполнения английская, тексты на французском в процессе подготовки.</li>
			<li>SEO-оптимизация сайта русскоязычной версии сайта. В планах оптимизация английской и французской версии.</li>
<li>Услуга хостинга.</li>
		</ol>
    </div>
</div>

<div class="item block" data-bgimage="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/esta_all.jpg">
    <div class="thumbs-wrapper">
        <div class="thumbs">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/esta.jpg"/>
        </div>
    </div>
    <h2 class="title">Сайт "НИЛ Эста"</h2>
    <p class="subline">Создание научного сайта. В процессе разработки</p>
    <div class="intro">
        <p>Разработка серьезного информационного ресурса для научно-исследовательской лаборатории. Задача ресурса продвигать собственные разработки компании, давать обзоры последним технологиям. <a href="#" class="more_link">Подробнее</a></p>
    </div>
    <div class="project-descr">
        <h3>Выполняемые и запланированные работы:</h3>
		<ol>
			<li>Анализ рынка, формирование концепции сайта.</li>
			<li>Разработка ТЗ.</li>
			<li>Утвержден макет дизайна сайта.</li>
			<li>На этапе подготовки: программирование, написание статей и наполнение сайта.</li>
			<li>Планируется продвижение сайта.</li>
		</ol>
    </div>
</div>
<div class="item block" data-bgimage="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/dskredit_all.jpg">
    <div class="thumbs-wrapper">
        <div class="thumbs">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/dscredit_1.jpg"/>
        </div>
    </div>
    <h2 class="title">dscredit.ru</h2>
    <p class="subline">Разработка сайта под ключ</p>
    <div class="intro">
        <p>Создание сайта, продающего кредитные продукты и услуги. Информационный ресурс.<a href="#" class="more_link">Подробнее</a></p>
    </div>
    <div class="project-descr">
        <h3>Выполненные работы по проекту:</h3>
		<ol>
			<li>Анализ рынка, конкурентной среды.</li>
<li>Разработка ТЗ, составление семантического ядра.</li>
			<li>Дизайн сайта. Визуализация алгоритма предоставления услуг, путей сотрудничества компании с партнерскими организациями и финансовыми учреждениями.</li>
			<li>Верстка: кроссбраузерная, адаптивная под мобильные устройства.</li>
			<li>Программирование. Настройка модулей и функционала: слайдер, онлайн-формы заказ, обратной связи, новостная лента.</li>
			<li>Копирайтинг, рерайтинг, наполнение сайта.</li>
			<li>Оптимизация сайта.</li>
		</ol>
    </div>
</div>

<div class="item block" data-bgimage="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/astam_magazin_all.jpg">
    <div class="thumbs-wrapper">
        <div class="thumbs">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/tmpl/thumbs/asta_magazin.jpg"/>
        </div>
    </div>
    <h2 class="title">potolok-magazin.ru</h2>
    <p class="subline">Создание интернет-магазина под ключ</p>
    <div class="intro">
        <p>Разработка интернет-магазина строительных материалов и комплектующих. Проект почти завершен: на данный момент наполняется каталог товарами. <a href="#" class="more_link">Подробнее</a></p>
    </div>
    <div class="project-descr">
        <h3>Работы по проекту:</h3>
		<ol>
			<li>Анализ рынка, конкурентных магазинов.</li>
<li>Разработка ТЗ, составление семантического ядра.</li>
			<li>Дизайн сайта в фирменном стиле компании. Проработка иконок и других элементов визуализации.</li>
			<li>Верстка: кроссбраузерная, адаптивная под мобильные устройства.</li>
			<li>Программирование.</li>
			<li>Наполнение каталога товарами: еще в процессе.</li>
			<li>Копирайтинг: в процессе подготовки.</li>
<li>Запланированы: оптимизация, продвижение интернет-магазина, настройка рекламы в Яндексе.</li>
<li>Услуга хостинга.</li>
		</ol>
    </div>
</div>

<div class="clr"></div>
</div><!-- container -->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.tmpl.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.easing.1.3.js"></script>
<!-- the jScrollPane script -->
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.jscrollpane.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.masonry.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.gpCarousel.js"></script>
<script type="text/javascript">
$(window).load(function(){

    // the main container
    var $GPContainer	= $('#container'),
    // the articles (the thumbs)
        $articles		= $GPContainer.children('div.block'),
    // total number of articles
        totalArticles	= $articles.length,
    // the fullview container
        $fullview		= $('<div id="fullview" class="full-view-elements"></div>').prependTo( $('body') ),
    // the overlay
        $overlay		= $('<div class="overlay"></div>').prependTo( $('body') ),

        GridPortfolio	= (function() {
            // current will be the index of the current article
            var animspeed				= 500,
                animeasing				= 'jswing', // try easeOutExpo
                current					= -1,
            // indicates if certain elements can be animated or not at a given time
                animrun					= false,
                init 					= function() {
                    initPlugins();
                    initEventsHandler();
                },
            // builds each article's carousel
            // initiallizes the mansory
                initPlugins				= function() {
                    // apply carousel functionality to the thumbs-wrapper in each article
                    $articles.find('div.thumbs-wrapper').gpCarousel();
                    // apply mansory to the grid items
                    $GPContainer.masonry({
                        itemSelector	: '.item',
                        columnWidth		: 5,
                        isAnimated		: true
                    });
                },
            // events
                initEventsHandler		= function() {
                    // switch to fullview when we click the "View Project" link
                    $articles.each( function(i) {
                        $(this).find('a.more_link').bind('click.GridPortfolio', function(e) {

                            if( animrun ) return false;
                            animrun			= true;

                            var $article	= $(this).closest('div.block');
                            // update the current value
                            current	= $article.index('.block');
                            // hide scrollbar
                            $('body').css( 'overflow', 'hidden' );
                            // preload the fullview image and then start the animation (showArticle)
                            var $intro		= $article.find('div.intro');
                            $intro.addClass('intro-loading');
                            $('<img/>').load(function() {
                                $intro.removeClass('intro-loading');
                                showArticle( $article, true );
                                animrun	= false;
                            }).attr('src', $article.data('bgimage'));

                            return false;
                        });
                    });

                    // fullview navigation
                    $('#fullview').find('span.full-nav-next').live('click.GridPortfolio', function(e) {
                        if( animrun ) return false;
                        animrun	= true;

                        // circular navigation
                        if( current === totalArticles - 1 )
                            current = 0
                        else
                            ++current;
                        // update the fullview current articles number
                        $fullview.find('span.full-nav-current').html( current + 1 );

                        showFullviewArticle();
                    });
                    $('#fullview').find('span.full-nav-prev').live('click.GridPortfolio', function(e) {
                        if( animrun ) return false;
                        animrun	= true;

                        // circular navigation
                        if( current === 0 )
                            current = totalArticles - 1
                        else
                            --current;
                        // update the fullview current articles number
                        $fullview.find('span.full-nav-current').html( current + 1 );

                        showFullviewArticle();
                    });

                    // switch to thumbs view
                    $('#fullview').find('span.full-view-exit').live('click.GridPortfolio', function(e) {
                        var $article	= $articles.eq( current );
                        hideArticle( $article );
                    });


                    $('#fullview').find('.thumbs img').live('click.GridPortfolio', function(e) {
                        $(".bg-img").attr('src', $(this).attr('src'));

                        //$(this).parents('.thumbs-wrapper').find('.thumbs-nav').remove();
                        console.log()
                        var $article	= $articles.eq( current );
                        var $thumbs = $(this).parents('div.thumbs-wrapper');

                        /*$thumbs.gpCarousel({
                            start	: $thumbs.data('currentImage')
                        });*/
                        //showBgImage($(this));
                    });

                    // window resize
                    // center the background image if in fullview
                    // reinitialise jscrollpane
                    $(window).bind('resize.GridPortfolio', function(e) {
                        var $bgimage	= $fullview.find('img.bg-img');
                        if( $bgimage.length )
                            centerBgImage( $bgimage );

                        $fullview.find('div.project-descr-full-wrapper').jScrollPane('reinitialise');
                    });
                },
            // the clicked article will be cloned;
            // the clone will be positioned on top of the cloned article;
            // remove every element from the clone except the thumbs wrapper (basically the image);
            // enlarge the clone to the window's width & height;
            // move the thumbs wrapper to the position where the fullview's thumbs wrapper will be placed;
            // at the same time fade in the overlay;
            // build the fullview panel with the right data (template)
            // remove the clone

            // this function will also be used when we close the fullview article. In this case,
            // the difference is that we don't animate the values (just set the css values), and the clone is not removed, since we
            // will use it for the animation (back to the thumb position)
                showArticle				= function( $article, anim ) {
                    // clone the article
                    var	$clone	= $article.clone().css({
                        left	: $article.offset().left + 'px',
                        top		: $article.offset().top + 'px',
                        zIndex	: 1001,
                        margin	: '0px',
                        height	: $article.height() + 'px'
                    }).attr( 'id', 'article-clone' );

                    // this is the images container which is going to "fly" down
                    var $thumbsWrapper	= $clone.find('div.thumbs-wrapper');

                    // remove unnecessary elements from the clone
                    $clone.children().not($thumbsWrapper).remove();
                    $clone.find('div.thumbs-nav').remove();

                    // position the clone on top of the article with the right css style
                    var padding	= 20 + 20;
                    // animate?
                    $.fn.applyStyle = ( anim ) ? $.fn.animate : $.fn.css;

                    var clonestyle 	= {
                        width	: $(window).width() - padding + 'px',
                        height	: $(window).height() - padding + 'px',
                        left	: '0px',
                        top		: $(window).scrollTop() + 'px'
                    };

                    $clone.appendTo( $('body') ).stop().applyStyle( clonestyle, $.extend( true, [], { duration : animspeed, easing : animeasing, complete : function() {
                        // show the panel (it will be hidden behing the clone though, until this one is removed)
                        $fullview.show()

                        // use the template "fullviewTmpl" to build the fullview panel with the right data
                        var articleFullviewData		= getArticleFullviewData($article);
                        articleFullviewData.current	= current + 1;
                        articleFullviewData.total	= totalArticles;
                        var $fullview_content	= $('#fullviewTmpl').tmpl( articleFullviewData );

                        $fullview_content.appendTo( $fullview );

                        // call the gpCarousel plugin on the fullview thumbs-wrapper
                        $fullview_content.find('div.thumbs-wrapper').gpCarousel({
                            start	: $article.find('div.thumbs-wrapper').data('currentImage')
                        });

                        //jscrollpane
                        $fullview_content.find('div.project-descr-full-wrapper').jScrollPane('destroy').jScrollPane({
                            verticalDragMinHeight: 40,
                            verticalDragMaxHeight: 40
                        });

                        // center bg image
                        centerBgImage( $fullview.find('img.bg-img') );

                        // fade out overlay
                        $overlay.stop().css( 'opacity', 0 );

                        // fade out clone to show the fullview panel. After that remove the clone
                        $clone.fadeOut( 300, function() { $clone.remove(); } );
                    }}));

                    // animate the images container to the position where is going to be on fullview
                    var thumbsstyle 	= {
                        left	: $(window).width() - $thumbsWrapper.width() - 25 + 'px',  // 25 is the margin left / right of the fullview thumbs-wrapper
                        top		: ($(window).height() / 2) - ($thumbsWrapper.height() / 2) - 22 + 'px' // 10 is the margin top / bottom of the fullview thumbs-wrapper
                    };
                    $thumbsWrapper.stop().applyStyle( thumbsstyle, $.extend( true, [], { duration : animspeed, easing : animeasing} ) );

                    // fade in overlay
                    ( anim ) ? $overlay.show().fadeTo( animspeed, 0.7, animeasing ) : $overlay.show().css( 'opacity', 0.7 );
                },

            // used when click on thumb image to set background image
                showBgImage		= function( $img ) {

                    var $fullviewImage				= $fullview.find('img.bg-img');
                    $img.addClass("bg-img");
                    $fullviewImage.load(function() {
                        //  $loading.hide();
                        var $bgImage	= $img;
                        $bgImage.insertBefore( $fullviewImage );
                        // center the bg image
                        centerBgImage( $bgImage );
                        $fullviewImage.remove();

                    }).attr('src', $img.attr('src'));

                    console.log($img);
                },
            // close the fullview
                hideArticle				= function( $article ) {
                    // create the article's clone. the second argument is false to prevent the clone to be removed
                    showArticle( $article, false );
                    // hide the overlay for now
                    $overlay.hide();
                    // reference to the created clone and its thumbs wrapper
                    var $clone			= $('#article-clone'),
                        $thumbsWrapper	= $clone.find('div.thumbs-wrapper');
                    // fade in the clone
                    $clone.hide().fadeIn( 200, function() {
                        // remove the contents of the fullview container
                        $fullview.empty();
                        // animate the clone to the article position and size
                        $(this).animate({
                            left	: $article.offset().left + 'px',
                            top		: $article.offset().top + 'px',
                            width	: $article.width() + 'px',
                            height	: $article.height() + 'px'
                        }, animspeed, animeasing, function() {
                            // remove the clone
                            $clone.remove();
                            // show the scrollbar
                            $('body').css( 'overflow', 'visible' );
                        });

                        // animate the clone's thumbs wrapper so it moves to the article's thumbs wrapper position
                        $thumbsWrapper.animate({
                            left	: '0px',
                            top		: '0px'
                        }, animspeed, animeasing);

                        // fade out the overlay
                        $overlay.show().fadeTo( animspeed, 0, animeasing, function() { $overlay.hide() } );
                    });
                },
            // gets the article's necessary info to build the fullview panel
                getArticleFullviewData	= function( $article ) {
                    return {
                        bgimage			: '<img src="' + $article.data('bgimage') + '" class="bg-img"></img>',
                        title 			: $article.find('h2.title').text(),
                        thumbs			: $article.find('div.thumbs').html(),
                        subline			: $article.find('p.subline').text(),
                        description		: $article.find('div.project-descr').html()
                    }
                },
            // used when navigating in fullview
            // needs to get the next / previous article's info
                showFullviewArticle		= function() {
                    var $article					= $articles.eq( current ),
                        articleFullviewData			= getArticleFullviewData($article),

                        $loading					= $fullview.find('span.loading-small'),

                        $fullviewImage				= $fullview.find('img.bg-img'),

                        $fullviewTitle				= $fullview.find('h2.title'),

                        $fullviewSubline			= $fullview.find('p.subline'),

                        $fullviewDescriptionWrapper	= $fullview.find('div.project-descr-full-wrapper'),
                        $fullviewDescription		= $fullviewDescriptionWrapper.find('div.project-descr-full-content'),

                        $fullviewProjectDescrFull	= $fullview.find('div.project-descr-full'),
                        $fullviewThumbsWrapper		= $fullviewProjectDescrFull.find('div.thumbs-wrapper'),
                        $newFullviewThumbsWrapper	= $('<div class="thumbs-wrapper"><div class="thumbs">' + articleFullviewData.thumbs + '</div></div>');

                    // preload the article's background image
                    $loading.show();
                    $( articleFullviewData.bgimage ).load(function() {
                        $loading.hide();
                        var $bgImage	= $(this);
                        $bgImage.insertBefore( $fullviewImage );
                        // center the bg image
                        centerBgImage( $bgImage );
                        $fullviewImage.remove();

                        $fullviewTitle.html( articleFullviewData.title );

                        $fullviewSubline.html( articleFullviewData.subline );

                        $fullviewDescriptionWrapper.jScrollPane('destroy');
                        $fullviewDescription.html( articleFullviewData.description );
                        $fullviewDescriptionWrapper.jScrollPane('destroy').jScrollPane({
                            verticalDragMinHeight: 40,
                            verticalDragMaxHeight: 40
                        });

                        $fullviewThumbsWrapper.remove();
                        $fullviewProjectDescrFull.prepend( $newFullviewThumbsWrapper );
                        $newFullviewThumbsWrapper.gpCarousel();

                        animrun	= false;
                    }).attr('src', $article.data('bgimage'));

                },
            // centers the background image
                centerBgImage			= function( $img ) {
                    var dim	= getImageDim($img);
                    //set the returned values and show the image
                    $img.css({
                        width	: dim.width + 'px',
                        height	: dim.height + 'px',
                        left	: dim.left + 'px',
                        top		: dim.top + 'px'
                    });
                },
            //get dimentions of the image,
            //in order to make it full size and centered
                getImageDim				= function($i) {
                    var $img     = new Image();
                    $img.src     = $i.attr('src');

                    var w_w	= $(window).width(),
                        w_h	= $(window).height(),
                        r_w	= w_h / w_w,
                        i_w	= $img.width,
                        i_h	= $img.height,
                        r_i	= i_h / i_w,
                        new_w,new_h,
                        new_left,new_top;

                    if(r_w > r_i){
                        new_h	= w_h;
                        new_w	= w_h / r_i;
                    }
                    else{
                        new_h	= w_w * r_i;
                        new_w	= w_w;
                    }

                    return {
                        width	: new_w,
                        height	: new_h,
                        left	: (w_w - new_w) / 2,
                        top		: (w_h - new_h) / 2
                    };

                };

            return {
                init	: init
            };

        })()

    GridPortfolio.init();

});

$(document).ready(function(){
    $('.thumbs').on('click', function( e ) {
       $(this).parents().find('.more_link').trigger("click");
    });

    $(document).keydown(function(e){
        switch (e.which) {
            case 37 : $( ".full-nav-prev" ).trigger( "click" ); break; //left
            case 39 : $( ".full-nav-next" ).trigger( "click" ); break; //right
            default : return;
        }
    })
});
</script>
