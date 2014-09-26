<?php
/* @var $this ServicesController */

$this->breadcrumbs=array(
    'Услуги'=>array('index'),
    $model->title,
);
?>

<style>
    .mybox {
        padding: 0;
        margin: 0 auto;
        width: 100%;
    }
    .my_left {
         width: 100%;
    }
    .my_left p {
        text-align: justify;
    }
</style>
<article class="my" id="about-us">
    <div class="mybox">
        <div class="myinfo">
            <div class="my_left">
                <h2><?php echo $model->title; ?></h2>
                <?php echo $model->content; ?>
            </div>
        </div>
    </div>
</article>