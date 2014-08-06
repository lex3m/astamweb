<?php
/* @var $this SiteController */

?>
<?php
$initScripts = <<<ISC
        $('input, textarea').placeholder();
        $('#parallax').jparallax();
ISC;

Yii::app()->getClientScript()->registerScript('initscripts', $initScripts,  CClientScript::POS_READY);
?>
<script type="text/javascript">
    $(function(){
        var wrapper = $( ".file_upload" ),
            inp = wrapper.find( "input[type=file]" ),
            btn = wrapper.find( ".button" ),
            lbl = wrapper.find( "mark" );

        // Crutches for the :focus style:
        inp.focus(function(){
            wrapper.addClass( "focus" );
        }).blur(function(){
                wrapper.removeClass( "focus" );
            });

        var file_api = ( window.File && window.FileReader && window.FileList && window.Blob ) ? true : false;

        inp.change(function(){
            var file_name;
            if( file_api && inp[ 0 ].files[ 0 ] )
                file_name = inp[ 0 ].files[ 0 ].name;
            else
                file_name = inp.val().replace( "C:\\fakepath\\", '' );

            if( ! file_name.length )
                return;

            if( lbl.is( ":visible" ) ){
                lbl.text( file_name );
                btn.text( "Выбрать" );
            }else
                btn.text( file_name );
        }).change();

    });
    $( window ).resize(function(){
        $( ".file_upload input" ).triggerHandler( "change" );
    });

</script>
<div class="sliders" id="works">
    <div class="slider_col1">

        <div class="fader slider_pril">
            <div class="slide" style="opacity: 1;"><a href="#" class="a_slid"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slider1/block1_leftt_1.jpg"  alt=""  /></a>
            </div>
            <div class="slide"><a href="#" class="a_slid"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slider1/img1_2.jpg"  alt=""  /></a>
            </div>
            <div class="slide"><a href="#" class="a_slid"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slider1/img1_3.jpg"  alt=""  /></a>
            </div>
            <div class="slide"><a href="#" class="a_slid"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slider1/img1_4.jpg"  alt=""  /></a>
            </div>

            <div class="fader_controls navslider2">
                <ul class="pager_list">
                    <li class="page" data-target="0">1</li>
                    <li class="page" data-target="1">2</li>
                    <li class="page" data-target="2">3</li>
                    <li class="page" data-target="3">4</li>
                </ul>
            </div>
        </div><!-- end slider_pril -->


        <div class="fader slider_razrabot">
            <div class="slide" style="opacity: 1;"><a href="#" class="a_slid"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slider1/block1_leftt_2.jpg"  alt=""  /></a>
            </div>
            <div class="slide"><a href="#" class="a_slid"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slider1/img1_2.jpg"  alt=""  /></a>
            </div>
            <div class="slide"><a href="#" class="a_slid"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slider1/img1_3.jpg"  alt=""  /></a>
            </div>
            <div class="slide"><a href="#" class="a_slid"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slider1/img1_4.jpg"  alt=""  /></a>
            </div>

            <div class="fader_controls navslider2">
                <ul class="pager_list">
                    <li class="page" data-target="0">1</li>
                    <li class="page" data-target="1">2</li>
                    <li class="page" data-target="2">3</li>
                    <li class="page" data-target="3">4</li>
                </ul>
            </div>
        </div><!-- end slider_razrabot -->
    </div><!-- end slider_col1 -->

    <div class="slider_col2">

        <div class="fader slider_site">
            <div class="slide" style="opacity: 1;"><a href="#" class="a_slid"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slider1/block1_center.jpg"  alt=""  /></a>
            </div>
            <div class="slide"><a href="#" class="a_slid"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slider1/img1_2.jpg"  alt=""  /></a>
            </div>
            <div class="slide"><a href="#" class="a_slid"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slider1/img1_3.jpg"  alt=""  /></a>
            </div>
            <div class="slide"><a href="#" class="a_slid"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slider1/img1_4.jpg"  alt=""  /></a>
            </div>

            <div class="fader_controls navslider2">
                <ul class="pager_list">
                    <li class="page" data-target="0">1</li>
                    <li class="page" data-target="1">2</li>
                    <li class="page" data-target="2">3</li>
                    <li class="page" data-target="3">4</li>
                </ul>
            </div>
        </div><!-- end slider_site -->

    </div><!-- end slider_col2 -->
    <div class="slider_col3">

        <div class="fader slider_video">
            <div class="slide" style="opacity: 1;"><a href="#" class="a_slid"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slider1/block1_right_1.jpg"  alt=""  /></a>
            </div>
            <div class="slide"><a href="#" class="a_slid"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slider1/img1_2.jpg"  alt=""  /></a>
            </div>
            <div class="slide"><a href="#" class="a_slid"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slider1/img1_3.jpg"  alt=""  /></a>
            </div>
            <div class="slide"><a href="#" class="a_slid"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slider1/img1_4.jpg"  alt=""  /></a>
            </div>

            <div class="fader_controls navslider2">
                <ul class="pager_list">
                    <li class="page" data-target="0">1</li>
                    <li class="page" data-target="1">2</li>
                    <li class="page" data-target="2">3</li>
                    <li class="page" data-target="3">4</li>
                </ul>
            </div>
        </div><!-- end slider_video -->

        <div class="fader slider_nastroy">
            <div class="slide" style="opacity: 1;"><a href="#" class="a_slid"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slider1/block1_right_2.jpg"  alt=""  /></a>
            </div>
            <div class="slide"><a href="#" class="a_slid"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slider1/img1_2.jpg"  alt=""  /></a>
            </div>
            <div class="slide"><a href="#" class="a_slid"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slider1/img1_3.jpg"  alt=""  /></a>
            </div>
            <div class="slide"><a href="#" class="a_slid"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/slider1/img1_4.jpg"  alt=""  /></a>
            </div>

            <div class="fader_controls navslider2">
                <ul class="pager_list">
                    <li class="page" data-target="0">1</li>
                    <li class="page" data-target="1">2</li>
                    <li class="page" data-target="2">3</li>
                    <li class="page" data-target="3">4</li>
                </ul>
            </div>
        </div><!-- end slider_nastroy -->

    </div><!-- end slider_col3 -->

</div><!-- end sliders -->

<section class="studio" id="works">

<article class="preimuchestva">

    <div id="parallax">
        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/butterflies3.png" alt="" />
    </div>

    <div class="preim_bg">
        <h2>Наши преимущества</h2>
        <div class="delaem">
            <div class="delaem1">
                Мы делаем качественно!<br /> Делаем ярко! Делаем в срок!
            </div>
            <div class="delaem2">
                Сайт подготовлен <br />для дальнейшей раскрутки!
            </div>
        </div>
        <div class="allsite">
            <a href="#" class="moda">Сайты<br /> о красоте и моде</a>
            <a href="#" class="kupony">Сайты<br /> бесплатных купонов</a>
            <a href="#" class="kreativ">Сайты <br />креатива и творчества</a>
            <a href="#" class="prezent">Сайты презентации</a>
            <a href="#" class="zdorov">Сайты <br />о красоте и здоровье</a>
            <a href="#" class="restoran">Сайты<br /> ресторанно-развлекательные<br /> <span>и мн. др.</span></a>
        </div>
    </div>
</article><!-- end preimuchestva -->

<article class="uslugy" id="services">
    <h2 class="usl_h2">Наши услуги</h2>
    <div class="uslugy_box">
        <div class="uslugy_box_1">
            <div class="usl_div uslugy1">
                <ul class="uslugy_ul">
                    <li>
                        <div class="cel">
                            <a href="#"><span>разработка</span> сайтов </a>
                            <span class="usl_info"> с нуля под ключ  разной сложности </span>
                        </div>
                        <a href="#" class="usl_right">заказать</a>
                    </li>
                    <li>
                        <div class="cel">
                            <a href="#"><span>продвижение</span> сайтов </a>
                            <span class="usl_info"> в сети. SEO</span>
                        </div>
                        <a href="#" class="usl_right">Расчитать</a>
                    </li>
                    <li>
                        <div class="cel">
                            <a href="#" class="bn"><span>настройка</span> рекламных компаний </a>
                        </div>
                        <a href="#" class="usl_right">заказать</a>
                    </li>
                    <li>
                        <div class="cel">
                            <a href="#"><span>поддержка</span> сайтов </a>
                            <span class="usl_info">созданных нами продуктов</span>
                        </div>
                        <a href="#" class="usl_right">В комплекте</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="uslugy_box_2">
            <div class="usl_div uslugy2">
                <ul class="uslugy_ul">
                    <li>
                        <div class="cel">
                            <a href="#"><span>создание</span> мобильных<br />приложений</a>
                            <span class="usl_info top1"> на базе Андроид и iOS </span>
                        </div>
                        <a href="#" class="usl_right">заказать</a>
                    </li>
                    <li>
                        <div class="cel">
                            <a href="#"><span>продвижение</span>  мобильных <br />приложений </a>
                            <span class="usl_info top2"> в различных<br />специализированных<br />магазинах</span>
                        </div>
                        <a href="#" class="usl_right">заказать</a>
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
                        <a href="#" class="usl_right">заказать</a>
                    </li>
                    <li>
                        <div class="cel">
                            <a href="#"><span>съемки </span> роликов </a>
                            <span class="usl_info"> на камеру</span>
                        </div>
                        <a href="#" class="usl_right">Расчитать</a>
                    </li>
                    <li>
                        <div class="cel">
                            <a href="#" class="bn"><span>создание 3D </span> панорам </a>
                        </div>
                        <a href="#" class="usl_right">заказать</a>
                    </li>
                    <li>
                        <div class="cel">
                            <a href="#" class="bn"><span>создание </span> инфографики </a>
                        </div>
                        <a href="#" class="usl_right">заказать</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="uslugy4">
            <div class="cel cel_us4">
                <span>Мн. другое...</span>
            </div>
            <div class="cel cel_us5">
                <a href="#" class="usl_info"> посмотреть список  </a>
            </div>
        </div>

    </div>

</article><!-- end uslugy -->

<article class="idea" id="idea">
    <div class="idea_box">
        <div class="idea_content">
            <p>
                <span class="uppercase1">Идея студии —</span> мы хотим создавать креативные решения, которые будут работать, если и не во благо всего человечества, то <span class="color1">в плюс нашим клиентам,</span> так это точно. Мы стремимся работать с удовольствием и в удовольствие, и у нас это получается.
            </p>
            <div class="idea_block2">
                В разделе <a href="#about-us" class="knopka1">о нас</a>можно почитать<br /> <span class="bold">о нашей команде.</span>
                <img alt="Команда" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/4elove4ky.png" class="komandos" />
            </div>
            <p>
                <span class="color1">Приоритетной задачей для нас является эффективность проектов. </span>Эффективные проекты - это те, которые приносят стабильный приток клиентов своим владельцам, т.е. нашим партнерам. А со временем мы именно и становимся партнерами, т.к. годами поддерживаем клиентские сайты, обновляем, наполняем новой информацией, вдыхаем в них жизнь. Многие из наших заказчиков уже перешли полностью в Интернет, то есть именно из сети они получают основной поток заказов. «Сарафанное радио» - уже не их уровень.
            </p>
        </div>
        <img alt="Человечки" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/4elove4ky_2.png" class="para" />
        <img alt="График" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/grafik.png" class="grafik" />
    </div>
</article><!-- end idea -->

<article class="my" id="about-us">
    <div class="mybox">
        <div class="img_my">
            <img alt="anton" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/anton.png" class="anton" />
            <img alt="leha" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/leha.png" class="leha" />
            <img alt="platon" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/platon.png" class="platon" />
            <img alt="evgeniy" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/evgeniy.png" class="evgeniy" />
            <img alt="dima" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/dima.png" class="dima" />
            <img alt="vova" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/vova.png" class="vova" />
            <img alt="dmitriy" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/dmitriy.png" class="dmitriy" />
            <img alt="viola" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/viola.png" class="viola" />
            <img alt="evgeniya" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/evgeniya.png" class="evgeniya" />
            <img alt="alyena" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/alyena.png" class="alyena" />
            <img alt="sacsha" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/sacsha.png" class="sacsha" />
            <img alt="lena" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/lena.png" class="lena" />
            <img alt="lyuda" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/lyuda.png" class="lyuda" />
            <img alt="andrey" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/andrey.png" class="andrey" />
            <img alt="sveta" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/sveta.png" class="sveta" />
            <img alt="nadya" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/nadya.png" class="nadya" />
            <img alt="sergey" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/sergey.png" class="sergey" />
        </div>
        <div class="myinfo">
            <div class="my_left">
                <h2>Чем мы отличаемся?</h2>
                <p>Хороший вопрос... Мы отличаемся тем, что очень персонально подходим к работе, знаем, чего хочет заказчик.</p>
                <p>Мы внимательны к просьбам и требованиям, понимаем суть вопроса, даже когда клиент сам это не очень хорошо понимает)) Ищем оптимальный, самый результативный путь решения задач, чтобы достичь поставленной цели.</p>
                <p>Мы всегда искренни с клиентом, поэтому предлагаем разные варианты реализации проекта — экономный и оптимальный по финансовым затратам и объемам работ.</p>
            </div>
            <div class="my_right">
                <h3>Держим руку на пульсе!</h3>
                <p>Наши специалисты участвуют в конференциях по вопросам SEO, разработке мобильных приложений, веб-разработке, поэтому в курсе новых тенденций и эффективных решений. Их мы и предлагаем заказчикам.</p>
            </div>
        </div>
    </div>
</article><!-- end my -->

<article class="kava">
    <div class="kava_box">
        <img alt="Пена кофе" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/bg_kofe_ef2.png" class="bgpena" />
        <div class="kava_kontent">
            <div class="kava_left">
                <img alt="Смайл" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/kofe_smail_1.png" class="kava_smail" />
            </div>
            <div class="kava_right">
                <h2>заходите на кофе</h2>
                <p>Каждый новый заказ для студии — это... как новое открытие — обязательно интригующее, увлекательное и трудоемкое. Не бывает скучных или стандартных проектов, по крайней мере, у нас и для нас.</p>
            </div>
            <div class="kava_box2">
                <p>Мы всегда рады работе с интересными и творческими людьми. Готовы помочь советом непрофессионалам и новичкам.</p>
                <p>С удовольствием угостим Вас чашечкой кофе или чая!</p>
                <img alt="Зерна кофе" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/zerna_2_r.png" class="zerna" />
                <img alt="Зерна кофе" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/zerna_2_l.png" class="zerna1" />
                <img alt="Зерна кофе" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/zerna_2n.png" class="zerna2" />
            </div>
            <img alt="Пена кофе" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/pena.png" class="pena" />
        </div>
    </div>
</article><!-- end kava -->

<?php $this->widget('ContactWidget'); ?>
<!--<article class="kontakts" id="kontakts">
    <h3 class="kont_h3">Связаться с нами</h3>

    <img alt="Контакты" src="<?php /*echo Yii::app()->theme->baseUrl; */?>/images/narezka/bg_kontakts.jpg" class="img_kont_ie" />
    <img alt="Контакты" src="<?php /*echo Yii::app()->theme->baseUrl; */?>/images/narezka/bg_kontakts.jpg" class="img_kont" />
    <form name="kontakt1" action="" class="kontaktform">
        <div class="form_tr">
            <div class="c3">
                <input id="name2" name="name2" type="text" placeholder="Ваше имя" />
            </div>
            <div class="c3c">
                <input id="email2" name="email2" type="email" placeholder="e-mail" />
            </div>
            <div class="c3">
                <input id="phone2" name="phone2" type="tel" placeholder="Телефон" />
            </div>
        </div>
        <!--<div class="form_tr prikrdiv">
            <label for="fileup">Прикрепите файл размером не более 10 мб</label>
            <input id="fileup" type="file" name="fileup" class="prikrep" />
        </div>
        <div class="form_tr prikrdiv">
            <label class="file_upload">
                <span class="button">Выбрать</span>
                <mark>Прикрепите файл размером не более 10 мб</mark>
                <input type="file">
            </label>
        </div>
        <div class="form_tr form_text">
            <textarea id="textarea" name="textarea" class="textarea" cols="40" rows="6"></textarea>
        </div>
        <div class="form_tr">
            <input id="" name="submit" type="submit" value="Отправить" class="knopka" />
        </div>
    </form>
</article><!-- end kontakts -->



</section><!-- end studio -->