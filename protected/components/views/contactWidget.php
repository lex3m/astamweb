<article class="kontakts" id="kontakts">
<h3 class="kont_h3">Связаться с нами</h3>

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
<!--        <span class="tooltip" id="example" title="My tooltip content">Example</span>-->
        <div class="c3">
            <?php echo $form->error($model,'name'); ?>
            <?php echo $form->textField($model,'name', array('placeholder'=>'Ваше имя*')); ?>
        </div>
        <div class="c3c">
            <?php echo $form->error($model,'phone'); ?>
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
            <?php echo $form->error($model,'email'); ?>
            <?php echo $form->textField($model,'email', array('placeholder'=>'E-mail')); ?>
        </div>

    </div>
    <div class="form_tr prikrdiv">
        <label class="file_upload">
            <span class="button">Выбрать</span>
            <mark>Прикрепите файл размером не более 10 мб</mark>
            <?php echo $form->error($model,'file'); ?>
            <?php echo $form->fileField($model,'file', array('accept' => 'application/msword,  application/pdf, application/excel,  application/rtf, text/plain')); ?>
        </label>
    </div>
    <div class="form_tr form_text">
        <?php echo $form->error($model, 'msg');?>
        <?php echo $form->textArea($model, 'msg', array('cols'=>40, 'rows'=>6));?>
    </div>
    <div class="form_tr">
        <input type="submit" name="submit" class="knopka">
        <?php /*echo CHtml::ajaxSubmitButton('Отправить',
            CHtml::normalizeUrl(array('site/order')),
            array(
                'dataType'=>'json',
                'type'=>'post',
                'processData' => false,
                'contentType' => false,
//                'data' => 'new FormData($("#contact-form")); ',
                'beforeSend'=>'function(){
                    $(".loading").width($(document).width());
                    $(".loading").height($(document).height());
                    var posY = $(document).height()- 400;
                    $(".loading").css("background-position-y", posY);
                    $(".loading").show();
                }',
                'success'=>'function(data) {
                                $(".loading").hide();
                                if(data.status=="success"){
                                var top = $(document).height()- 400
                                    $.fancybox.open({
                                        href : "#inline2",
                                    });
                                    $(".fancybox-wrap").css("top", top + "!important")
                                    $("#contact-form")[0].reset();
                                    setTimeout(function(){
//                                        $.fancybox.close();
                                    }, 3000);
                                } else {
                                    $.each(data, function(key, val) {
                                        $("#contact-form #"+key+"_em_").text(val);
                                        $("#contact-form #"+key+"_em_").show();
                                    });
                                }
                            }',
                'error'=>'function(xhr, status, error) {
                     $(".loading").hide();
                     alert(error);
                }'
                ),
                array('type'=>'button','name'=>'submit', 'class'=>'knopka'));*/
            ?>
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
                        var top = $(document).height()- 400
                        $.fancybox.open({
                            href : "#inline2"
                        });
                        $("#contact-form")[0].reset();
                        $(".file_upload mark").html('Прикрепите файл размером не более 10 мб');
                        setTimeout(function(){
                            $.fancybox.close();
                        }, 3000);
                    } else {
                        $.each(data, function(key, val) {
                            $("#contact-form #"+key+"_em_").text(val);
                            $("#contact-form #"+key+"_em_").show();
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
//            $('.tooltip').tooltipster();

            // then immediately show the tooltip
//            $('#example').tooltipster('show');



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
