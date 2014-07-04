<?php $this->beginContent('//layouts/main'); ?>
<section class=" wrapper site-min-height">
	<?php $this->renderPartial('/_flash'); ?>
	<?php echo $content; ?>	
</section>
<?php $this->endContent(); ?>