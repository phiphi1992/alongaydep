<!DOCTYPE HTML>
<html>
<?php $this->renderPartial('//common/header');?>
<style>
.errorMessage{color:red;}
</style>
<body class="login-layout">
	<div class="main-container container-fluid">
			<div class="main-content">
				<div class="row-fluid">
					<div class="span12">
						<div class="login-container">
							<div class="row-fluid">
								<div class="center" style="margin-top:30px;">
									<!--<img src = "<?php echo Yii::app()->theme->baseUrl;?>/assets/img/logo.png" />-->
								</div>
							</div>

							<div class="space-6"></div>

							<div class="row-fluid">
								<div class="position-relative">
									<div id="login-box" class="login-box visible widget-box no-border">
										<div class="widget-body">
											<div class="widget-main">
												<h4 class="header blue lighter bigger">
													<i class="icon-coffee green"></i>
													Đăng nhập hệ thống
												</h4>

												<div class="space-6"></div>

												<?php echo CHtml::beginForm('','post',array('class'=>'form-signin')); ?>
													<fieldset>
														<label>
															<span class="block input-icon input-icon-right">
																<?php echo CHtml::activeTextField($model,'username',array('class'=>'form-control user-name span12','placeholder'=>'Tên đăng nhập','autofocus'=>'true')) ?>
																<i class="icon-user"></i>
															</span>
														<?php echo CHtml::error($model,'username'); ?>
														</label>

														<label>
															<span class="block input-icon input-icon-right">
																<?php echo CHtml::activePasswordField($model,'password',array('class'=>'form-control user-pass span12','placeholder'=>'Mật khẩu')) ?>
																<i class="icon-lock"></i>
															</span>
															<?php echo CHtml::error($model,'password'); ?>
														</label>

														<div class="space"></div>

														<div class="clearfix">
															<label class="inline">
																<?php echo CHtml::activeCheckBox($model,'rememberMe',array('class'=>'rem_me')); ?>
																<span class="lbl"> Ghi nhớ tài khoản</span>
															</label>

															<button type="submit" class="width-35 pull-right btn btn-small btn-primary">
																<i class="icon-key"></i>
																Đăng nhập
															</button>
														</div>

														<div class="space-4"></div>
													</fieldset>
												<?php echo CHtml::endForm(); ?>
											</div><!--/widget-main-->
											<!--
											<div class="toolbar clearfix">
												<div>
													<a href="#" onclick="show_box('forgot-box'); return false;" class="forgot-password-link">
														<i class="icon-arrow-left"></i>
														Bạn quên mật khẩu
													</a>
												</div>
											</div> -->
										</div><!--/widget-body-->
									</div><!--/login-box-->

									<!--<div id="forgot-box" class="forgot-box widget-box no-border">
										<div class="widget-body">
											<div class="widget-main">
												<h4 class="header red lighter bigger">
													<i class="icon-key"></i>
													Retrieve Password
												</h4>

												<div class="space-6"></div>
												<p>
													Enter your email and to receive instructions
												</p>

												<form />
													<fieldset>
														<label>
															<span class="block input-icon input-icon-right">
																<input type="email" class="span12" placeholder="Email" />
																<i class="icon-envelope"></i>
															</span>
														</label>

														<div class="clearfix">
															<button onclick="return false;" class="width-35 pull-right btn btn-small btn-danger">
																<i class="icon-lightbulb"></i>
																Send Me!
															</button>
														</div>
													</fieldset>
												</form>
											</div><!--/widget-main-->

											<div class="toolbar center">
												<a href="#" onclick="show_box('login-box'); return false;" class="back-to-login-link">
													Back to login
													<i class="icon-arrow-right"></i>
												</a>
											</div>
										</div><!--/widget-body-->
									</div><!--/forgot-box-->
								</div><!--/position-relative-->
							</div>
						</div>
					</div><!--/.span-->
				</div><!--/.row-fluid-->
			</div>
		</div>
</body>






<!--
<body class="login-layout">

    <div class="container">
	<?php echo CHtml::beginForm('','post',array('class'=>'form-signin')); ?>
        <h2 style="padding:0" class="form-signin-heading"><img src="<?php echo Yii::app()->theme->baseUrl;?>/img/logo_login.png" /></h2>
        <div class="login-wrap">
			<?php echo CHtml::activeTextField($model,'username',array('class'=>'form-control user-name','placeholder'=>'Email','autofocus'=>'true')) ?>
			<?php echo CHtml::error($model,'username'); ?>
            
			<?php echo CHtml::activePasswordField($model,'password',array('class'=>'form-control user-pass','placeholder'=>'Mật khẩu')) ?>
			<?php echo CHtml::error($model,'password'); ?>
            <label class="checkbox">
				<?php echo CHtml::activeCheckBox($model,'rememberMe',array('class'=>'rem_me')); ?> Ghi nhớ tài khoản
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Bạn quên mật khẩu?</a>

                </span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Đăng nhập</button>
            <!--<p>or you can sign in via social network</p>
            <div class="login-social-link">
                <a href="index.html" class="facebook">
                    <i class="icon-facebook"></i>
                    Facebook
                </a>
                <a href="index.html" class="twitter">
                    <i class="icon-twitter"></i>
                    Twitter
                </a>
            </div>
            <div class="registration">
                Don't have an account yet?
                <a class="" href="registration.html">
                    Create an account
                </a>
            </div>
			
        </div>
      <?php echo CHtml::endForm(); ?>
    </div>
	
	
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
              <div class="modal-dialog">
                  <div class="modal-content">
				  <form id="ForgotPasssFrom" method="POST" action="<?php echo PIUrl::createUrl('/user/recovery');?>">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Phục hồi mật khẩu?</h4>
                      </div>
                      <div class="modal-body">
                          <p>Nhập tên đăng nhập hoặc email muốn phục hồi mật khẩu rồi click vào tiếp tục.</p>
                          <input type="text" name="UserRecoveryForm[login_or_email]" placeholder="Tên đăng nhập hoặc Email" autocomplete="off" class="form-control placeholder-no-fix">
                      </div>
                      <div class="modal-footer">
                          <button data-dismiss="modal" class="btn btn-default btnCancel" type="button">Hủy bỏ</button>
                          <button class="btn btn-success btnForgotPasss" type="submit">Tiếp tục</button>
                      </div>
					</form>
                  </div>
              </div>
          </div>
          
    <?php $this->renderPartial('//common/footer');?>

	<script>
		$(document).ready(function(){
			$('#ForgotPasssFrom').submit(function(){
				var _this = $(this);
				$.ajax({
					url:_this.attr('action'),
					type:'POST',
					data:_this.serialize(),
					beforeSend:function(){
						_this.find('.btnForgotPasss').attr('disabled',true);
					},
					success:function(res){
						_this.find('.btnForgotPasss').attr('disabled',false);
						if(res.error){
							var error = $.parseJSON(res.msg);
							$.each(error.UserRecoveryForm_login_or_email,function(x,y){
								smessage(y,'error');
							});
						}else{
							$('.modal-dialog .modal-body p').html(res.msg);
							$('.modal-dialog .modal-body input').remove();
							$('.modal-dialog .modal-footer .btnForgotPasss').remove();
							$('.modal-dialog .modal-footer .btnCancel').html('OK');
							$('.modal-dialog .modal-footer .btnCancel').addClass('btnReload');
						}
					}
				});
				return false;
			});
			$('.btnReload').live('click',function(){
				window.location.reload();
			});
		});
	</script>
  </body>-->
  <script type="text/javascript">
			function show_box(id) {
			 $('.widget-box.visible').removeClass('visible');
			 $('#'+id).addClass('visible');
			}
		</script>
<?php
$form = new CForm(array(
	'elements'=>array(
		'username'=>array(
			'type'=>'text',
			'maxlength'=>32,
		),
		'password'=>array(
			'type'=>'password',
			'maxlength'=>32,
		),
		'rememberMe'=>array(
			'type'=>'checkbox',
		)
	),

	'buttons'=>array(
		'login'=>array(
			'type'=>'submit',
			'label'=>'Login',
		),
	),
	), $model);
	?>
