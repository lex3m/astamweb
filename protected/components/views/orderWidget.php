<div class="zakazheder">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'order-form',
        'enableAjaxValidation'=>true,
//        'enableClientValidation'=>true,
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
        'htmlOptions' => array('class'=>'zakaz1'),
    )); ?>
        <table>
            <tbody>
            <tr>
                <td>
                    <?php echo $form->error($model,'name'); ?>
                    <?php echo $form->textField($model,'name', array('placeholder'=>'Имя')); ?>

                </td>
                <td>
                    <?php echo $form->error($model,'phone'); ?>
                    <?php
                        $this->widget('CMaskedTextField', array(
                            'model' => $model,
                            'attribute' => 'phone',
                            'mask' => '(999)999-99-99',
                            'htmlOptions' => array('placeholder' => 'Телефон'),
                        ));
                    ?>

                </td>
            </tr>
            <tr>
                <td>
                    <?php echo $form->error($model,'email'); ?>
                    <?php echo $form->textField($model,'email', array('placeholder'=>'E-mail')); ?>

                </td>
                <td>
                    <?php echo CHtml::ajaxSubmitButton('Заказать звонок',
                        CHtml::normalizeUrl(array('site/order')),
                        array(
                            'dataType'=>'json',
                            'type'=>'post',
                            'beforeSend'=>'function(){ $(".wrapper").addClass("loading");  }',
                            'success'=>'function(data) {
                                $(".wrapper").removeClass("loading");
                                if(data.status=="success"){
                                    $.fancybox.open({
                                        href : "#inline"
                                    });
                                    $("#order-form")[0].reset();
                                    setTimeout(function(){
                                        $.fancybox.close();
                                    }, 3000);
                                } else {
                                    $.each(data, function(key, val) {
                                        $("#order-form #"+key+"_em_").text(val);
                                        $("#order-form #"+key+"_em_").show();
                                    });
                                }
                            }',
                        ),
                        array('type'=>'button','name'=>'zakaz1')); ?>
                </td>
            </tr>
            </tbody>
        </table>
    <?php $this->endWidget(); ?>

<?php
        $fancy = <<<fanc
            $('.fancybox').fancybox({
                type : 'inline',
                openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,
            });



fanc;

        Yii::app()->getClientScript()->registerScript('fancy', $fancy,  CClientScript::POS_READY);
?>

<div class="fancybox" id="inline" style="width:400px;display: none;">
    <h3>Ваша заявка отправлена!</h3>
    <p>
        Спасибо за Вашу заявку. Она отправлена в обработку, наши менеджеры свяжутся с Вами в ближайшее время.
    </p>
    <br/>
    <p><b>С уважением, команда АстамВеб</b></p>
</div>

</div>
