<?php

require_once(dirname(__FILE__) . "/../extensions/pidebug/debug_methods.php");
/**
 * this method is used to get current user
 */ 
function currentUser() {
	return User::model()->findByPk(Yii::app()->user->id);
}

function isAdmin(){
	return Yii::app()->user->checkAccess(null,array('admin'));
}
function curCA($key){
	if($key == 'controller')
		return Yii::app()->controller->id;
	elseif($key == 'action')
		return Yii::app()->controller->action->id;
	elseif($key == 'module'){
		if(Yii::app()->controller->module !== null)
			return Yii::app()->controller->module->id;
		else
			return '';
	}
}
function jlOut($obj, $dataType = 'json', $exit = true) {
	// dataType: json, text
	error_reporting(0);
	$category = "Slidelane";
	if(!empty(Yii::app()->name)){
		$category = Yii::app()->name;
	}
	
	if(!empty($obj['message'])){
		$obj['message'] = Yii::t($category,$obj['message']);
	}
	if(!empty($obj['msg'])){
		$obj['msg'] = Yii::t($category,$obj['msg']);
	}
	
	$obj = @CJSON::encode($obj);
	$gzContent = gzencode($obj, 5);
	
	header('Connection: close');
	
	switch ($dataType) {
		case 'json':
			header("Content-type: application/json");
			break;
		case 'text':
			//header("Content-type: application/json");
			break;
	}
	
	if ($gzContent) {
		header('Content-Encoding: gzip');
		header('Vary: Accept-Encoding');
		header("Content-Length: ".strlen($gzContent));
		echo $gzContent;
		@ob_end_flush();
	} else {
		if (stripos($_SERVER['HTTP_ACCEPT_ENCODING'], "gzip") !== false) {
			header('Content-Encoding: gzip');
			header('Vary: Accept-Encoding');
			ob_start("ob_gzhandler");
		} else {
			ob_start();
		}
		
		echo $obj;
		$size = ob_get_length();
		//ob_end_flush();
		
		header("Content-Length: {$size}");
		
		@ob_end_flush();
		@ob_flush();
		
	}
	
	@flush();

	if ($exit) {
		if (YII_DEBUG) exit();
		else Yii::app()->end();
	} else {
		$session_id = session_id();
		if (session_id()) session_write_close();
		return $session_id;
	}
}
/**
 * This method is used to output a json string and terminate current process
 */
function jsonOut($obj, $exit = true) {
	jlOut($obj, 'json', $exit);
}

function ajaxOut($out) {
	if (!preg_match("/MSIE/", $_SERVER['HTTP_USER_AGENT'])) {
		jsonOut($out);
	} else {
		jlOut($out, 'text');
	}
}

function dump($obj,$isExit = true) {
	CVarDumper::dump($obj,10,true);
	if ($isExit) exit();	
}
/**
 * This is the shortcut to Yii::app()->createUrl()
 */
function url($route,$params=array(),$ampersand='&')
{
    return Yii::app()->createUrl($route,$params,$ampersand);
}
 
/**
 * This is the shortcut to CHtml::encode
 */
function h($text)
{
    return htmlspecialchars($text,ENT_QUOTES,Yii::app()->charset);
}
 
/**
 * This is the shortcut to CHtml::link()
 */
function l($text, $url = '#', $htmlOptions = array()) 
{
    return CHtml::link($text, $url, $htmlOptions);
}

function idStr($id=NULL){
	return IDHelper::uuidFromBinary($id,true);
}
function idBin($id=NULL){
	return IDHelper::uuidToBinary($id,true);

}
function urlProfile($username=NULL){
	return Yii::app()->createUrl('/'.$username);
}

function N2L($number)
{
    $result = array();
    $tens = floor($number / 10);
    $units = $number % 10;

    $words = array
    (
        'units' => array('', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eightteen', 'Nineteen'),
        'tens' => array('', '', 'Twenty', 'Thirty', 'Fourty', 'Fifty', 'Sixty', 'Seventy', 'Eigthy', 'Ninety')
    );

    if ($tens < 2)
    {
        $result[] = $words['units'][$tens * 10 + $units];
    }

    else
    {
        $result[] = $words['tens'][$tens];

        if ($units > 0)
        {
            $result[count($result) - 1] .= '-' . $words['units'][$units];
        }
    }

    if (empty($result[0]))
    {
        $result[0] = 'Zero';
    }

    return trim(implode(' ', $result));
}
/**
* Phương thức dùng để bỏ dấu tiếng việt
**/
function alias_change($str){
	$unicode = array(
		'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
		'd'=>'đ',
		'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
		'i'=>'í|ì|ỉ|ĩ|ị',
		'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
		'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
		'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
		'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
		'D'=>'Đ',
		'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
		'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
		'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
		'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
		'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
	);

	foreach($unicode as $nonUnicode=>$uni){
		$str = preg_replace("/($uni)/i", $nonUnicode, $str);
	}
	$str = strtolower(trim($str));
	return str_replace(' ','-',$str);
}
function alias ( $alias )
{
	$alias = nv_EncString( $alias );

	//thêm trường hợp các kí tự đặc biệt
	$alias = preg_replace( "/(!|\"|#|$|%|'|̣)/", '', $alias );
	$alias = preg_replace( "/(̀|́|̉|$|>)/", '', $alias );
	$alias = preg_replace( "'<[\/\!]*?[^<>]*?>'si", "", $alias );

	$alias = str_replace( "----", " ", $alias );
	$alias = str_replace( "---", " ", $alias );
	$alias = str_replace( "--", " ", $alias );

	$alias = preg_replace( '/(\W+)/i', '-', $alias );
	$alias = str_replace( array(
		'-8220-', '-8221-', '-7776-'
	), '-', $alias );
	$alias = preg_replace( '/[^a-zA-Z0-9\-]+/e', '', $alias );
	$alias = str_replace( array(
		'dAg', 'DAg', 'uA', 'iA', 'yA', 'dA', '--', '-8230'
	), array(
		'dong', 'Dong', 'uon', 'ien', 'yen', 'don', '-', ''
	), $alias );
	$alias = preg_replace( '/(\-)$/', '', $alias );
	$alias = preg_replace( '/^(\-)/', '', $alias );
	return $alias;
}
 
/**
* EncString()
*
* @param mixed $text
* @return
*/
function nv_EncString ( $text )
{
	$text = html_entity_decode( $text );
	//thay thế chữ thuong
	$text = preg_replace( "/(å|ä|ā|à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|ä|ą)/", 'a', $text );
	$text = preg_replace( "/(ß|ḃ)/", "b", $text );
	$text = preg_replace( "/(ç|ć|č|ĉ|ċ|¢|©)/", 'c', $text );
	$text = preg_replace( "/(đ|ď|ḋ|đ)/", 'd', $text );
	$text = preg_replace( "/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|ę|ë|ě|ė)/", 'e', $text );
	$text = preg_replace( "/(ḟ|ƒ)/", "f", $text );
	$text = str_replace( "ķ", "k", $text );
	$text = preg_replace( "/(ħ|ĥ)/", "h", $text );
	$text = preg_replace( "/(ì|í|î|ị|ỉ|ĩ|ï|î|ī|¡|į)/", 'i', $text );
	$text = str_replace( "ĵ", "j", $text );
	$text = str_replace( "ṁ", "m", $text );

	$text = preg_replace( "/(ö|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|ö|ø|ō)/", 'o', $text );
	$text = str_replace( "ṗ", "p", $text );
	$text = preg_replace( "/(ġ|ģ|ğ|ĝ)/", "g", $text );
	$text = preg_replace( "/(ü|ù|ú|ū|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|ü|ų|ů)/", 'u', $text );
	$text = preg_replace( "/(ỳ|ý|ỵ|ỷ|ỹ|ÿ)/", 'y', $text );
	$text = preg_replace( "/(ń|ñ|ň|ņ)/", 'n', $text );
	$text = preg_replace( "/(ŝ|š|ś|ṡ|ș|ş|³)/", 's', $text );
	$text = preg_replace( "/(ř|ŗ|ŕ)/", "r", $text );
	$text = preg_replace( "/(ṫ|ť|ț|ŧ|ţ)/", 't', $text );

	$text = preg_replace( "/(ź|ż|ž)/", 'z', $text );
	$text = preg_replace( "/(ł|ĺ|ļ|ľ)/", "l", $text );

	$text = preg_replace( "/(ẃ|ẅ)/", "w", $text );

	$text = str_replace( "æ", "ae", $text );
	$text = str_replace( "þ", "th", $text );
	$text = str_replace( "ð", "dh", $text );
	$text = str_replace( "£", "pound", $text );
	$text = str_replace( "¥", "yen", $text );

	$text = str_replace( "ª", "2", $text );
	$text = str_replace( "º", "0", $text );
	$text = str_replace( "¿", "?", $text );

	$text = str_replace( "µ", "mu", $text );
	$text = str_replace( "®", "r", $text );

	//thay thế chữ hoa
	$text = preg_replace( "/(Ä|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|Ą|Å|Ā)/", 'A', $text );
	$text = preg_replace( "/(Ḃ|B)/", 'B', $text );
	$text = preg_replace( "/(Ç|Ć|Ċ|Ĉ|Č)/", 'C', $text );
	$text = preg_replace( "/(Đ|Ď|Ḋ)/", 'D', $text );
	$text = preg_replace( "/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|Ę|Ë|Ě|Ė|Ē)/", 'E', $text );
	$text = preg_replace( "/(Ḟ|Ƒ)/", "F", $text );
	$text = preg_replace( "/(Ì|Í|Ị|Ỉ|Ĩ|Ï|Į)/", 'I', $text );
	$text = preg_replace( "/(Ĵ|J)/", "J", $text );

	$text = preg_replace( "/(Ö|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ø)/", 'O', $text );
	$text = preg_replace( "/(Ü|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|Ū|Ų|Ů)/", 'U', $text );
	$text = preg_replace( "/(Ỳ|Ý|Ỵ|Ỷ|Ỹ|Ÿ)/", 'Y', $text );
	$text = str_replace( "Ł", "L", $text );
	$text = str_replace( "Þ", "Th", $text );
	$text = str_replace( "Ṁ", "M", $text );

	$text = preg_replace( "/(Ń|Ñ|Ň|Ņ)/", "N", $text );
	$text = preg_replace( "/(Ś|Š|Ŝ|Ṡ|Ș|Ş)/", "S", $text );
	$text = str_replace( "Æ", "AE", $text );
	$text = preg_replace( "/(Ź|Ż|Ž)/", 'Z', $text );

	$text = preg_replace( "/(Ř|R|Ŗ)/", 'R', $text );
	$text = preg_replace( "/(Ț|Ţ|T|Ť)/", 'T', $text );
	$text = preg_replace( "/(Ķ|K)/", 'K', $text );
	$text = preg_replace( "/(Ĺ|Ł|Ļ|Ľ)/", 'L', $text );

	$text = preg_replace( "/(Ħ|Ĥ)/", 'H', $text );
	$text = preg_replace( "/(Ṗ|P)/", 'P', $text );
	$text = preg_replace( "/(Ẁ|Ŵ|Ẃ|Ẅ)/", 'W', $text );
	$text = preg_replace( "/(Ģ|G|Ğ|Ĝ|Ġ)/", 'G', $text );
	$text = preg_replace( "/(Ŧ|Ṫ)/", 'T', $text );

	return $text;
}
/**
* Phương thức dùng để cắt chuổi
**/
function word_limiter($str, $limit = 100, $end_char = '&#8230;')
{
	if (trim($str) == '')
	{
		return $str;
	}

	preg_match('/^\s*+(?:\S++\s*+){1,'.(int) $limit.'}/', $str, $matches);

	if (strlen($str) == strlen($matches[0]))
	{
		$end_char = '';
	}

	return rtrim($matches[0]).$end_char;
}

/**
* Phương thức dùng để tạp chuổi randum
*/
function random_string($type = 'alnum', $len = 8)
{
	switch($type)
	{
		case 'basic'	: return mt_rand();
			break;
		case 'alnum'	:
		case 'numeric'	:
		case 'nozero'	:
		case 'alpha'	:

				switch ($type)
				{
					case 'alpha'	:	$pool = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
						break;
					case 'alnum'	:	$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
						break;
					case 'numeric'	:	$pool = '0123456789';
						break;
					case 'nozero'	:	$pool = '123456789';
						break;
				}

				$str = '';
				for ($i=0; $i < $len; $i++)
				{
					$str .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
				}
				return $str;
			break;
		case 'unique'	:
		case 'md5'		:

					return md5(uniqid(mt_rand()));
			break;
		case 'encrypt'	:
		case 'sha1'	:

					$CI =& get_instance();
					$CI->load->helper('security');

					return do_hash(uniqid(mt_rand(), TRUE), 'sha1');
			break;
	}
}
function quote_escape($str) {
	return "'" . $str . "'";
}
function dateDiffMinute($time)
{
	$begin = new DateTime($time);
	$end = new DateTime(date('Y/m/d H:i:s'));
	$interval = new DateInterval('PT1M');
	$periods = new DatePeriod($begin, $interval, $end, DatePeriod::EXCLUDE_START_DATE);
	return count(iterator_to_array($periods));
}
function dateDiff($start, $end) {
	$start_ts = strtotime($start);
	$end_ts = strtotime($end);
	$diff = $end_ts - $start_ts;
	$date = round($diff / 86400);
	if($date < 1 || $date == -0){
		$date = 0;
	}
	return $date;
}
function clean($str) {
	$str = @trim($str);
	if(get_magic_quotes_gpc()) {
		$str = stripslashes($str);
	}
	return mysql_real_escape_string($str);
}
function translate($str='',$params=array(),$dic='user'){
	if (Yii::t("Kovo", $str)==$str)
		return Yii::t("Kovo.".$dic, $str, $params);
	else
		return Yii::t("Kovo", $str, $params);
}
function getImage($name='no-image.png',$w=100,$h=100,$zc=0){
	if($name == '') $name = 'no-image.png';
	if(!file_exists(Yii::getPathOfAlias('webroot').'/upload/images/'.$name))
		$name = 'no-image.png';
	return Yii::app()->getBaseUrl(true)."/image/{$w}/{$h}/{$zc}/{$name}";
}

function getImageFullSize($filename){
	if($filename != ""){
		if(file_exists(yii::app()->basePath."/../upload/images/".$filename))
			$filename = $filename;
		else	$filename = 'no-image.png';
	}else	$filename = 'no-image.png';
	return yii::app()->baseUrl."/upload/images/".$filename;
}
/* End file function_alias.php */
/* Location: aplication.protected.config.function_alias.php */