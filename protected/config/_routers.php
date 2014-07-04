<?php
/*Nơi khai báo xác lập url routing*/
return array(
	''=>'home',
	'tin-tuc/tim-kiem/<name:.*?>'=>'new/index',
	'tin-tuc/danh-muc/<alias:.*?>'=>'new/index',
	'tin-tuc'=>'new/index',
	'tin-tuc/<alias:.*?>'=>'new/newDetail',
	'gioi-thieu'=>'information',
	'linh-vuc-kinh-doanh'=>'newBusiness',
	'lien-he'=>'contact',
	'hinh-anh'=>'image',
	'<controller:\w+>/<id:\d+>'=>'<controller>/view',
	'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
	'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
);

/* End file _routers.php */
/* Location: aplication.protected.config._routers.php */