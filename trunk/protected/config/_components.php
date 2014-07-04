<?php
//Nơi khai báo các components được sử dụng trong hệ thống.
return array(
	'user'=>array(
		'class'=>'RWebUser',
		// enable cookie-based authentication
		'allowAutoLogin'=>true,
		'loginUrl'=>array('/user/login'),
	),
	// uncomment the following to enable URLs in path-format
	
	'urlManager'=>array(
		'urlFormat'=>'path',
		'showScriptName'=>false,
		'rules'=>require(dirname(__FILE__) . '/_routers.php'),
	),
	'db'=>array(
		'connectionString' => 'mysql:host=localhost;dbname=alongaydep',
		'emulatePrepare' => true,
		'username' => 'root',
		'password' => '',
		'charset' => 'utf8',
		'enableProfiling' => true,
		'enableParamLogging' => true
	),
	/*'db'=>array(
		'connectionString' => 'mysql:host=localhost;dbname=immobilier_test',
		'emulatePrepare' => true,
		'username' => 'root',
		'password' => '',
		'charset' => 'utf8',
	),*/
	/*'db'=>array(
		'connectionString' => 'mysql:host=mariadb-immobilier.jelastic.lunacloud.com;dbname=immo',
		'emulatePrepare' => true,
		'username' => 'root',
		'password' => 'pnyE7IX4zq',
		'charset' => 'utf8',
	),*/
	/*'mongodb' => array(
		'class'            => 'EMongoDB',
		'connectionString' => 'mongodb://192.168.1.113',
		'dbName'           => 'immobilier',
		'fsyncFlag'        => true,
		'safeFlag'         => true,
		'useCursor'        => false
	),*/
	/*'mongodb' => array(
		'class'            => 'EMongoDB',
		'connectionString' => 'mongodb://localhost',
		'dbName'           => 'immobilier',
		'fsyncFlag'        => true,
		'safeFlag'         => true,
		'useCursor'        => false
	),*/
	'errorHandler'=>array(
		// use 'site/error' action to display errors
		'errorAction'=>'home/error',
	),
	'log'=>array(
		'class'=>'CLogRouter',
		'routes'=>array(
			/*array(
				'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
				'ipFilters'=>array('127.0.0.1','192.168.1.113'),
			),*/
			/*array(
				'class'=>'EMongoLogRoute',
			),*/
			// uncomment the following to show log messages on web pages
			
			/*array(
				'class'=>'CWebLogRoute',
				'showInFireBug'=>true
			),*/
			array(
				'class' => 'CFileLogRoute',
				'levels' => 'info, error, warning, vardump, notice',//trace
			)
			
		),
	),
	
	'bootstrap' => array(
		'class' => 'ext.bootstrap.components.Bootstrap',
		'responsiveCss' => true,
	),
	'dynamicRes'=>array(
		'class' => 'application.extensions.DynamicRes.DynamicRes',
		'urlConfig' => array( // Its fix Css, and convert Url to RealName 
		'baseUrl'  => '/',
		'basePath' => dirname(__FILE__).'/../../', // path of your site (ending with /) (No Change This)
		'debug'=>true
		)
	),
	'mail' => array(
		'class' => 'application.components.Mailer',
		'transportType'=>'smtp', /// case sensitive!
		'transportOptions'=>array(
			'host'=>'smtp.gmail.com',
			'username' => 'orishop.biz@gmail.com',
			'password' => 'muadonglanhgia',
			'port'=>'465',
			'encryption'=>'ssl',
		),
		'viewPath' => 'application.views.mail',
		'logging' => true,
		'dryRun' => false
	),
	'authManager'=>array(
		'class'=>'RDbAuthManager',
		'connectionID'=>'db',
		'defaultRoles'=>array('Authenticated', 'Guest'),
		'assignmentTable'=>'authassignment',
		'itemTable'=>'authitem',
		'itemChildTable'=>'authitemchild',
		'rightsTable'=>'rights'
	),
	'cache' => array(
		'class' => 'CFileCache'
	),
);
/* End file _components.php */
/* Location: aplication.protected.config._components */