<?php  $form=$this->beginWidget('CActiveForm', array(
	'id'=>'instrumento-fuente',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

<?php echo CHtml::hiddenField("idFuente",$fuente->id_fuente_proceso); ?>  
<h1><?php echo $fuente->nombre; ?></h1>
<div id="drag">
<table class="ww" border="1" id="table1">
<colgroup>
    <col width="250"/>
</colgroup>
    
<tbody>
<h2><?php echo $fuente->enunciado; ?></h2>        
<?php foreach ($fuente->preguntas as $i=>$pregunta) {?>
    

<tr class="zzz">
    <td class="xx"><?php echo ($i+1);?>. 
    <div id="c" class="drag green" style="display: inline">
        <?php echo CHtml::ActiveHiddenField($pregunta,"[$i]id_pregunta_proceso",array('value'=>$pregunta->id_pregunta_proceso)); ?>
        <?php echo $pregunta->enunciado; ?>
    </div>
    </td>
</tr>

<?php } ?>
</tbody>
</table>
</div>
<?php  $this->endWidget(); ?>