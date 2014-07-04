<style>.pagination{margin:0}</style>
<section class="panel">
	<header class="panel-heading"> <?php echo Rights::t('core', 'Phân bổ vai trò cho :username', array(
		':username'=>$model->getName()
	)); ?>
	</header>
	<div class="panel-body">
		<div class="adv-table">
			<div class="col-sm-6">
				  <section class="panel">
					  <?php $this->widget('bootstrap.widgets.TbGridView', array(
						'dataProvider'=>$dataProvider,
						'template'=>'{items}',
						'hideHeader'=>true,
						'emptyText'=>Rights::t('core', 'This user has not been assigned any items.'),
						'htmlOptions'=>array('class'=>'grid-view user-assignment-table mini'),
						'columns'=>array(
							array(
								'name'=>'name',
								'header'=>Rights::t('core', 'Name'),
								'type'=>'raw',
								'htmlOptions'=>array('class'=>'name-column'),
								'value'=>'$data->getNameText()',
							),
							array(
								'name'=>'type',
								'header'=>Rights::t('core', 'Type'),
								'type'=>'raw',
								'htmlOptions'=>array('class'=>'type-column'),
								'value'=>'$data->getTypeText()',
							),
							array(
								'header'=>'&nbsp;',
								'type'=>'raw',
								'htmlOptions'=>array('class'=>'actions-column'),
								'value'=>'$data->getRevokeAssignmentLink()',
							),
						)
					)); ?>
				  </section>
			  </div>
			  <div class="col-sm-6">
                      <section class="panel">
                          <header class="panel-heading">
                              <?php echo Rights::t('core', 'Assign item'); ?>
                          </header>
							<?php if( $formModel!==null ): ?>

								<div class="form">

									<?php $this->renderPartial('_form', array(
										'model'=>$formModel,
										'itemnameSelectOptions'=>$assignSelectOptions,
									)); ?>

								</div>

							<?php else: ?>

								<p class="info"><?php echo Rights::t('core', 'No assignments available to be assigned to this user.'); ?>

							<?php endif; ?>
                      </section>
                  </div>

		</div>
	 </div>
</section>
