<?php $this->breadcrumbs = array(
	'Rights'=>Rights::getBaseUrl(),
	Rights::t('core', 'Generate items'),
); ?>
<section class="panel">
	<header class="panel-heading"> <?php echo Rights::t('core', 'Generate items'); ?></header>
	<div class="panel-body">
		<div class="adv-table">
			<div class="alert alert-warning fade in">
               <?php echo Rights::t('core', 'Please select which items you wish to generate.'); ?>
            </div>
				<?php $form=$this->beginWidget('CActiveForm',array('htmlOptions' => array('class'=>'form-horizontal tasi-form'))); ?>

					<div class="grid-view assignment-table">

						<table class="generate-item-table display table table-bordered table-striped dataTable table" border="0" cellpadding="0" cellspacing="0">

							<tbody>

								<tr class="application-heading-row">
									<th colspan="3"><?php echo Rights::t('core', 'Application'); ?></th>
								</tr>

								<?php $this->renderPartial('_generateItems', array(
									'model'=>$model,
									'form'=>$form,
									'items'=>$items,
									'existingItems'=>$existingItems,
									'displayModuleHeadingRow'=>true,
									'basePathLength'=>strlen(Yii::app()->basePath),
								)); ?>

							</tbody>

						</table>

					</div>

					<div class="grid-view assignment-table">

		   				<?php echo CHtml::link(Rights::t('core', 'Select all'), '#', array(
		   					'onclick'=>"jQuery('.generate-item-table').find(':checkbox').attr('checked', 'checked'); return false;",
		   					'class'=>'selectAllLink')); ?>
		   				/
						<?php echo CHtml::link(Rights::t('core', 'Select none'), '#', array(
							'onclick'=>"jQuery('.generate-item-table').find(':checkbox').removeAttr('checked'); return false;",
							'class'=>'selectNoneLink')); ?>

					</div>

		   			<div class="grid-view assignment-table">

						<?php echo CHtml::submitButton(Rights::t('core', 'Generate'),array('class'=>'btn')); ?>

					</div>

				<?php $this->endWidget(); ?>

			</div>
	  </div>
</section>