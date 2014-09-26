<?php
/* @var $this ServicesController */

$this->pageTitle='Услуги веб-студии АстамВеб ';
$this->breadcrumbs=array(
	'Услуги',
);
?>

<style>
    .uslugy {
        background: url("<?php echo Yii::app()->baseUrl . Yii::app()->theme->baseUrl; ?> /images/narezka/line_duble.png") repeat-x scroll 0 38px #FFFFFF;
        padding: 0;
        width: 100%;
    }
    .uslugy .uslugy_box div div ul li span.usl_info {
        color: #989898;
        font-size: 22px;
        padding: 0;
        top: 0;
        position: relative;
        display: inline-block;
        text-align: justify;
    }
    .my p {
        font-size: 27px;
        line-height: 30px;
        color: #000000;
        text-align: justify;
        padding: 0 20px 10px 20px;
    }
    .uslugy_box div {
        padding-bottom: 10px !important;
        height: auto;
    }
    .uslugy1 {
        background: url("<?php echo Yii::app()->baseUrl . Yii::app()->theme->baseUrl; ?>/images/narezka/block_3_site.jpg") no-repeat scroll center;
    }
    .uslugy_ul {
        padding: 0 0 0 380px;
    }
</style>
<article class="uslugy" id="services">
    <h2 class="usl_h2">Наши услуги</h2>
        <div class="my">
            <p>Веб-студия «АстамВеб» оказывает комплексные услуги в области веб-технологий, создавая интернет-инструменты высокой эффективности.
            Использование в работе современных технологий и инструментов, квалифицированный персонал, креативное мышление и индивидуальный подход обеспечивают высокое качество реализованных нами проектов. Мы не работаем для статистики! Наши продукты действительно работают и добиваются высоких показателей.
            </p>
        </div>
    <div class="uslugy_box">
        <div class="uslugy_box">
            <div class="usl_div uslugy1">
                <ul class="uslugy_ul">
                    <?php foreach ($model as $value): ?>
                        <li>
                            <div class="cel">
                                <a href="<?php echo $this->createUrl('services/view',array('id'=>$value->id));?>" class="bn"><?php echo $value->title;?></a>
                                <span class="usl_info">  <?php echo $value->announcement; ?> </span>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div class="uslugy_box_2">
            <div class="usl_div uslugy2">
                <ul class="uslugy_ul">
                    <li>
                        <div class="cel">
                            <a href="#"><span>создание</span> мобильных<br>приложений</a>
                            <span class="usl_info top1"> на базе Android и iOS </span>
                        </div>
                        <a href="#kontakts" class="usl_right">заказать</a>
                    </li>
                    <li>
                        <div class="cel">
                            <a href="#"><span>продвижение</span>  мобильных <br>приложений </a>
                            <span class="usl_info top2"> в различных<br>специализированных<br>магазинах</span>
                        </div>
                        <a href="#kontakts" class="usl_right">заказать</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="uslugy_box_3">
            <div class="usl_div uslugy3">
                <ul class="uslugy_ul">
                    <li>
                        <div class="cel">
                            <a href="#"><span>создание 3D</span></a>
                            <span class="usl_info"> анимированное видео  </span>
                        </div>
                        <a href="#kontakts" class="usl_right">заказать</a>
                    </li>
                    <li>
                        <div class="cel">
                            <a href="#"><span>съемки </span> роликов </a>
                            <span class="usl_info"> на камеру</span>
                        </div>
                        <a href="#kontakts" class="usl_right">Расчитать</a>
                    </li>
                    <li>
                        <div class="cel">
                            <a href="#" class="bn"><span>создание 3D </span> панорам </a>
                        </div>
                        <a href="#kontakts" class="usl_right">заказать</a>
                    </li>
                    <li>
                        <div class="cel">
                            <a href="#" class="bn"><span>создание </span> инфографики </a>
                        </div>
                        <a href="#kontakts" class="usl_right">заказать</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</article>