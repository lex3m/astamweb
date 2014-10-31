<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

    <meta name="keywords" content="создание сайтов, раскрутка, продвижение, аудит, разработка приложений, IOS , ANDROID" />
    <meta name="description" content="Мы поможем сделать ваш бизнес более эффективным. Оптимизируем все интернет каналы. Проанализируем ваших конкурентов. Разработаем оптимальную стратегию развития" />
    <title>Astamweb.ru | создание и продвижение сайтов и приложений для IOS и ANDROID. Аудиты сайтов. Консультации</title> 

    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />

    <link  rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/styles/style.css" >
    <link  rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/styles/jquery.fancybox.css" >
    <link  rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/styles/tooltipster.css" >
    <link  rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/styles/tooltipster-shadow.css" >

    <!--[if lte IE 9]>
    <style type="text/css">
        .idea_block2:hover .komandos {
            -ms-transform: none; /* Для IE */
            transform: none;
        }
        .img_my {
            background-image: url("<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/bg_block_5.jpg");
            width: 1125px;
            height: 370px;
            background-attachment: scroll;
            background-repeat: no-repeat;
            background-position-x: 0px;
            background-position-y: center;
            background-size: auto;
            background-origin: padding-box;
            background-clip: border-box;
            background-color: rgb(255, 255, 255);
        }
        .my:hover .mybox  .img_my img {
            display: none;
        }
        .my_left h2 {
            padding-top: 7px;
            height: 25px;
        }
    </style>
    <![endif]-->

    <!--[if lte IE 8]>
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/styles/ie8only.css" rel="stylesheet" type="text/css" />
    <![endif]-->

    <!--[if IE 7]>
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/styles/ie7only.css" rel="stylesheet" type="text/css" />
    <![endif]-->

    <!--[if lte IE 6]>
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/styles/ieonly.css" rel="stylesheet" type="text/css" />
    <![endif]-->

    <?php
        Yii::app()->clientscript
            ->registerCoreScript( 'jquery' )
//            ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/jquery-1.2.6.min.js', CClientScript::POS_BEGIN )
            ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/jquery.jparallax.0.9.1.js', CClientScript::POS_BEGIN )
            ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/jquery.placeholder.js', CClientScript::POS_BEGIN )
            ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/jquery.fancybox.js' , CClientScript::POS_BEGIN)
            ->registerScriptFile( Yii::app()->theme->baseUrl . '/js/jquery.tooltipster.min.js' , CClientScript::POS_BEGIN)

    ?>

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<a name="werh" id="werh"></a>
<div class="loading"></div>
<div class="wrapper">

    <header class="header">
        <div class="werh">

            <div class="hederight">

                <a class="logo" href="<?php echo Yii::app()->request->baseUrl; ?>/">
                    <img alt="logo" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/logo.png" />
                </a>


                <?php $this->widget('OrderWidget'); ?>

                <div class="infoheder">
                    <menu class="menuheader">
                        <?php $this->widget('zii.widgets.CMenu',array(
                            'items'=>Menu::getMenuItems(0),
                        )); ?>
                    </menu>

                    <div class="swyazverh">
					    <div class="telwerh">
						    8 966 116 72 40
						</div>
                        <a href="#kontakts" class="pochta">Напишите нам</a>
						
                        <div class="sotcheader">
                            <a class="vk" href="https://vk.com/topsu_ru"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/prozrachnyi.png" alt="logo"></a>
                            <a class="ok" href="http://www.ok.ru/profile/573212817936/statuses"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/prozrachnyi.png" alt="logo"></a>
                            <a class="f" href="https://www.facebook.com/VershinaUspeha"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/prozrachnyi.png" alt="logo"></a>
                            <a class="tv" href="https://twitter.com/topsuak"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/prozrachnyi.png" alt="logo"></a>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </header><!-- .header-->


    <?php if(isset($this->breadcrumbs)):?>
        <?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
            'separator'=>' / ',
            'htmlOptions'=>array('class'=>'bread')
		)); ?><!-- breadcrumbs -->
    <?php endif?>
    <main class="content">
        <?php echo $content; ?>
    </main><!-- .content -->
</div><!-- .wrapper -->

<footer class="footer">
    <div class="footer-info">
        <div class="footer_logo">
            <a href="<?php echo Yii::app()->baseUrl;?>"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/logo_footer.png" alt="logo"></a>
        </div>
        <div class="footer_phone">
            8 966 116 72 40<br />
        </div>
        <div class="footer_mail">
            <a href="mailto:info@astamweb.ru" target="_blank">info@astamweb.ru</a>
        </div>
        <div class="footer_sotc">
            <a class="sset1" target="_blank" href="https://vk.com/topsu_ru"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/prozrachnyi.png" alt="В контакте" /></a>
            <a class="sset2" target="_blank" href="http://www.ok.ru/profile/573212817936/statuses"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/prozrachnyi.png" alt="Однокласники" /></a>
            <a class="sset3" target="_blank" href="https://www.facebook.com/VershinaUspeha"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/prozrachnyi.png" alt="facebook" /></a>
            <a class="sset4" target="_blank" href="https://twitter.com/topsuak"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/prozrachnyi.png" alt="Twitter" /></a>
            <!--<a class="sset5" target="_blank" href="#"><img src="<?php /*echo Yii::app()->theme->baseUrl; */?>/images/narezka/prozrachnyi.png" alt="Pinterest" /></a>
            <a class="sset6" target="_blank" href="#"><img src="<?php /*echo Yii::app()->theme->baseUrl; */?>/images/narezka/prozrachnyi.png" alt="Skype" /></a>
            <a class="sset_all" href="#werh"><img src="<?php /*echo Yii::app()->theme->baseUrl; */?>/images/narezka/prozrachnyi.png" alt="Другие соцсети" /></a>-->
        </div>
    </div>
    <div class="footer_ie">
    </div>
</footer><!-- .footer -->
<a href="#werh" class="vwerh"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/wverh.png" alt="Вверх" /></a>

<?php
$scroll = <<<scr
  $(function() {
        $('a[href*=#]:not([href=#])').click(function(e) {
            e.preventDefault();
            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                if (target.length) {
                    if(!$('html,body').is(':animated')) {
                        $('html,body').animate({
                            scrollTop: target.offset().top
                        }, 1000);
                        return false;
                    }
                }
            }
        });
  });
scr;

Yii::app()->getClientScript()->registerScript('scr', $scroll,  CClientScript::POS_READY);
?>

</body>
</html>
