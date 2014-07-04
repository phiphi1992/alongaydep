<!DOCTYPE html>
<html>
<?php $this->renderPartial('//common/header'); ?>
<body>
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a href="<?php echo PIUrl::createUrl('/admin');?>" class="brand" style="padding-left:10px">
					<small>
						STECH
					</small>
				</a><!--/.brand-->

				<ul class="nav ace-nav pull-right">
					
					
					<li class="light-blue">
						<a data-toggle="dropdown" href="#" class="dropdown-toggle">
							<img class="nav-user-photo" src="<?php echo Yii::app()->theme->baseUrl;?>/assets/avatars/user.jpg" alt="Jason's Photo" />
							<span class="user-info">
								<small>Chào,</small>
								<?php echo currentUser()->username;?>
							</span>

							<i class="icon-caret-down"></i>
						</a>
						
						<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
							<li>
								<a href="<?php echo PIUrl::createUrl('/user/profile/edit');?>">
									<i class="icon-user"></i>
									<?php echo translate('Tài khoản');?>
								</a>
							</li>
							<li>
								<a href="/user/profile/changepassword">
									<i class="icon-user"></i>
									<?php echo translate('Mật khẩu');?>
								</a>
							</li>

							<li>
								<a href="<?php echo PIUrl::createUrl('/user/logout');?>">
									<i class="icon-off"></i>
									<?php echo translate('Đăng xuất');?>
								</a>
							</li>
						</ul>
					</li>
				</ul><!--/.ace-nav-->
			</div><!--/.container-fluid-->
		</div><!--/.navbar-inner-->
	</div>

	<div class="main-container container-fluid">
		<a class="menu-toggler" id="menu-toggler" href="#">
			<span class="menu-text"></span>
		</a>
		<?php echo $this->renderPartial('//common/menu');?>
		<?php echo $content;?>
	</div><!--/.main-container-->

	<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
		<i class="icon-double-angle-up icon-only bigger-110"></i>
	</a>
	<?php $this->renderPartial('//common/footer');?>
</body>
</html>
