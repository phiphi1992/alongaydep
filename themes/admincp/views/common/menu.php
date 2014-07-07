<div class="sidebar" id="sidebar">


<ul class="nav nav-list">
	<li <?php if(curCA('controller') == 'default' && curCA('action') == 'index') echo 'class="active"'?>>
		<a href="<?php echo PIUrl::createUrl('/admin');?>">
			<i class="icon-dashboard"></i>
			<span class="menu-text"> Trang chủ </span>
		</a>
	</li>
	
	<li <?php if(curCA('controller') == 'system' && curCA('action') == 'index') echo 'class="active"'?>>
		<a href="<?php echo PIUrl::createUrl('/admin/system');?>">
			<i class="icon-desktop"></i>
			<span class="menu-text"> Cài đặt </span>
		</a>
	</li>
	<li <?php if(curCA('controller') == 'informations' )  echo 'class="active"'?>>
		<a href="#" class="dropdown-toggle">
			<i class="icon-text-width"></i>
			<span class="menu-text">Thông tin</span>
			<b class="arrow icon-angle-down"></b>
		</a>
		
		<ul class="submenu">
			<li>
				<a href="<?php echo PIUrl::createUrl('/admin/informations');?>">
					<i class="icon-list-alt"></i>
					<span class="menu-text"> Giới Thiệu</span>
				</a>
			</li>
			<li>
				<a href="<?php echo PIUrl::createUrl('/admin/informations', array('id'=>1));?>">
					<i class="icon-list-alt"></i>
					<span class="menu-text"> Phương thức thanh toán</span>
				</a>
			</li>
			<li>
				<a href="<?php echo PIUrl::createUrl('/admin/informations', array('id'=>2));?>">
					<i class="icon-list-alt"></i>
					<span class="menu-text"> Tuyển dụng</span>
				</a>
			</li>
			<li>
				<a href="<?php echo PIUrl::createUrl('/admin/informations', array('id'=>3));?>">
					<i class="icon-list-alt"></i>
					<span class="menu-text"> Dịch vụ</span>
				</a>
			</li>
		</ul>
	</li>
	<li <?php if(curCA('controller') == 'support' || curCA('controller') == 'groupSupport' )  echo 'class="active"'?>>
		<a href="#" class="dropdown-toggle">
			<i class="icon-text-width"></i>
			<span class="menu-text">Hỗ trợ trực tuyến</span>
			<b class="arrow icon-angle-down"></b>
		</a>
		
		<ul class="submenu">
			<li>
				<a href="<?php echo PIUrl::createUrl('/admin/groupSupport');?>">
					<i class="icon-list-alt"></i>
					<span class="menu-text"> Danh sách nhóm</span>
				</a>
			</li>
			<li>
				<a href="<?php echo PIUrl::createUrl('/admin/support');?>">
					<i class="icon-list-alt"></i>
					<span class="menu-text"> Danh sách thành viên</span>
				</a>
			</li>
		</ul>
	</li>
	<li <?php if(curCA('controller') == 'categoriesNews' ||  curCA('controller') == 'news' ||  curCA('controller') == 'subCategoryNews')  echo 'class="active"'?>>
		<a href="#" class="dropdown-toggle">
			<i class="icon-text-width"></i>
			<span class="menu-text"> Tin tức</span>
			<b class="arrow icon-angle-down"></b>
		</a>
		
		<ul class="submenu">
			<li>
				<a href="<?php echo PIUrl::createUrl('/admin/categoriesNews/');?>" class="dropdown-toggle">
					<i class="icon-double-angle-right"></i>
					Danh mục
				</a>
			</li>
			<li>
				<a href="<?php echo PIUrl::createUrl('/admin/subCategoryNews/');?>" class="dropdown-toggle">
					<i class="icon-double-angle-right"></i>
					Danh mục con
				</a>
			</li>
			<li>
				<a href="<?php echo PIUrl::createUrl('/admin/news/');?>">
					<i class="icon-double-angle-right"></i>
					Danh sách tin tức
				</a>
			</li>
		</ul>
	</li>
	<li <?php if(curCA('controller') == 'productCategory' ||  curCA('controller') == 'product' )  echo 'class="active"'?>>
		<a href="#" class="dropdown-toggle">
			<i class="icon-text-width"></i>
			<span class="menu-text"> Sản phẩm</span>
			<b class="arrow icon-angle-down"></b>
		</a>
		
		<ul class="submenu">
			<li>
				<a href="<?php echo PIUrl::createUrl('/admin/productCategory/');?>" class="dropdown-toggle">
					<i class="icon-double-angle-right"></i>
					Danh mục sản phẩm
				</a>
			</li>
			<li>
				<a href="<?php echo PIUrl::createUrl('/admin/product/');?>" class="dropdown-toggle">
					<i class="icon-double-angle-right"></i>
					Dánh sách sản phẩm
				</a>
			</li>
		</ul>
	</li>
	<li <?php if(curCA('controller') == 'post') echo 'class="active"'?>>
		<a href="<?php echo PIUrl::createUrl('/admin/post');?>">
			<i class="icon-desktop"></i>
			<span class="menu-text"> Album </span>
		</a>
	</li>
	<li <?php if(curCA('controller') == 'hotel') echo 'class="active"'?>>
		<a href="<?php echo PIUrl::createUrl('/admin/hotel');?>">
			<i class="icon-desktop"></i>
			<span class="menu-text"> Danh bạ khách sạn </span>
		</a>
	</li>
	<li <?php if(curCA('controller') == 'counter') echo 'class="active"'?>>
		<a href="<?php echo PIUrl::createUrl('/admin/counter');?>">
			<i class="icon-file-alt"></i>
			<span class="menu-text"> Quản lý truy cập </span>
		</a>
	</li>
	<!--<li <?php if(curCA('controller') == 'slides')  echo 'class="active"'?>>
		<a href="#" class="dropdown-toggle">
			<i class="icon-text-width"></i>
			<span class="menu-text"> Hình ảnh</span>
			<b class="arrow icon-angle-down"></b>
		</a>
		
		<ul class="submenu">
			<li>
				<a href="<?php echo PIUrl::createUrl('/admin/slides/');?>" class="dropdown-toggle">
					<i class="icon-double-angle-right"></i>
					Hoạt động
				</a>
			</li>
			<li>
				<a href="<?php echo PIUrl::createUrl('/admin/slides/',array('is_product'=>2));?>">
					<i class="icon-double-angle-right"></i>
					Sản phẩm mới
				</a>
			</li>
			<li>
				<a href="<?php echo PIUrl::createUrl('/admin/slides/',array('is_product'=>3));?>">
					<i class="icon-double-angle-right"></i>
					Hình ảnh trình diễn
				</a>
			</li>
		</ul>
	</li>-->
	<li <?php if(curCA('controller') == 'contact' && (curCA('action') == 'index' ||  curCA('action') == 'update')) echo 'class="active"'?>>
		<a href="<?php echo PIUrl::createUrl('/admin/contact');?>">
			<i class="icon-file-alt"></i>
			<span class="menu-text"> Thư liên hệ </span>
		</a>
	</li>
</ul><!--/.nav-list-->
	<div class="sidebar-collapse" id="sidebar-collapse">
		<i class="icon-double-angle-left"></i>
	</div>
</div>
