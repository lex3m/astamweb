
<?php $tooltipster = <<<tooltip
    $(function() {
        $('.tooltip').tooltipster({
             theme: 'tooltipster-shadow',
             animation: 'fade',
             delay: 200,
             timer : 3000,
        });

        $('"#contact-form input').on('change', function (e) {

            var id = this.id;
            if (id == 'phone') id = 'OrderForm_phone';
            $("#contact-form #"+id+"_em_").tooltipster('hide');
        });
    });
tooltip;
Yii::app()->getClientScript()->registerScript('tooltip', $tooltipster,  CClientScript::POS_READY);
?>

<article class="kontakts" id="kontakts">
<h3 class="kont_h3">Связаться с нами</h3>
<p class="perezwon">Напишите нам, и мы Вам перезвоним.</p>

<img alt="Контакты" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/bg_kontakts.jpg" class="img_kont_ie" />
<img alt="Контакты" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/narezka/bg_kontakts.jpg" class="img_kont" />
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'contact-form',
    'enableAjaxValidation'=>true,
//        'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
    'htmlOptions' => array('class'=>'kontaktform', 'enctype'=>'multipart/form-data'),
)); ?>
    <div class="form_tr">
        <div class="c3">
            <?php echo $form->error($model,'name', array('class'=>'tooltip')); ?>
            <?php echo $form->textField($model,'name', array('placeholder'=>'Ваше имя*')); ?>
        </div>
        <div class="c3c">
            <?php echo $form->error($model,'phone', array('class'=>'tooltip')); ?>
            <?php
            $this->widget('CMaskedTextField', array(
                'model' => $model,
                'attribute' => 'phone',
                'mask' => '(999)999-99-99',
                'htmlOptions' => array('placeholder' => 'Телефон*', 'class'=>'phone', 'id'=>'phone'),
            ));
            ?>
        </div>
        <div class="c3">
            <?php echo $form->error($model,'email', array('class'=>'tooltip')); ?>
            <?php echo $form->textField($model,'email', array('placeholder'=>'E-mail')); ?>
        </div>

    </div>
    <?php echo $form->error($model,'file', array('class'=>'tooltip')); ?>
    <div class="form_tr prikrdiv">
        <label class="file_upload">
            <span class="button">Выбрать</span>
            <mark>Прикрепите файл размером не более 5 мб</mark>

            <?php echo $form->fileField($model,'file'); ?>
<!--            , array('accept' => 'application/msword,  application/pdf, application/excel,  application/rtf, text/plain') -->
        </label>
    </div>
    <div class="form_tr form_text">
        <?php echo $form->error($model, 'msg');?>
        <?php echo $form->textArea($model, 'msg', array('cols'=>40, 'rows'=>6));?>
    </div>
    <div class="form_tr">
        <input type="submit" name="submit" class="knopka">
        </div>
    <?php $this->endWidget(); ?>
</article><!-- end kontakts -->
<script>

    $( '#contact-form' )
        .submit( function( e ) {
            $.ajax( {
                dataType: 'json',
                url: '<?php echo Yii::app()->createUrl('site/order'); ?>',
                type: 'POST',
                data: new FormData( this ),
                processData: false,
                contentType: false,
                beforeSend : function(){
                    $(".loading").width($(document).width());
                    $(".loading").height($(document).height());
                    var posY = $(document).height()- 400;
                    $(".loading").css("background-position-y", posY);
                    $(".loading").show();
                },
                success : function(data) {
                    $(".loading").hide();
                    if(data.status=="success"){
                        $(".tooltip").tooltipster('hide');
                        var top = $(document).height()- 400
                        $.fancybox.open({
                            href : "#inline2"
                        });
                        $("#contact-form")[0].reset();
                        $(".file_upload mark").html('Прикрепите файл размером не более 5 мб');
                        setTimeout(function(){
                            $.fancybox.close();
                        }, 3000);
                    } else {
                        $.each(data, function(key, val) {
                            $("#contact-form #"+key+"_em_").tooltipster('content', ''+val);
                            $("#contact-form #"+key+"_em_").show();
                            $("#contact-form #"+key+"_em_").tooltipster('show');
                        });
                    }
                },
                error : function(xhr, status, error) {
                    $(".loading").hide();
                    alert(error);
                }
            } );
            e.preventDefault();
        } );
</script>

<?php
        $fancy = <<<fanc
            $('.fancybox').fancybox({
                type : 'inline',
                modal : true,
                openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,
            });
            $("#phone").mask("(999)999-99-99");
fanc;

        Yii::app()->getClientScript()->registerScript('fancy', $fancy,  CClientScript::POS_READY);
?>

<div class="fancybox" id="inline2" style="width:400px;display: none;">
    <h3>Ваша заявка отправлена!</h3>
    <p>
        Спасибо за Вашу заявку. Она отправлена в обработку, наши менеджеры свяжутся с Вами в ближайшее время.
    </p>
    <br/>
    <p><b>С уважением, команда АстамВеб</b></p>
</div>
