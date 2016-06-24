<?php 
define('DB_HOST','localhost');
define('DB_NAME','upwork');
define('DB_USER','root');
define('DB_PASS','');

$data = file_get_contents('http://portal.amfiindia.com/DownloadNAVHistoryReport_Po.aspx?frmdt=10-Jun-2016');
if(empty($data)) return false;
$conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
$conn->exec('set names utf8');
$data = explode(PHP_EOL,$data);
foreach($data as $d){
	$buff = explode(';',$d);
	if(!is_numeric($buff[0]) || count($buff) != 6) continue;
	$q_params = $params = array(
		'scheme_id' => $buff[0],
		'nav' => number_format((float)$buff[2],2,'.',''),
		'nav_date' => date('Y-m-d',strtotime($buff[5])),
	);
	$sql = 'INSERT INTO mf_nav '.svi($params);
	unset($params['scheme_id']);
	$sql .= ' ON DUPLICATE KEY UPDATE '.svu($params);
	$stmt = $conn->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
	$stmt->execute($q_params);
}
function svi($params) {
	$new_array = array_map(create_function('$key', 'return ":".$key;'), array_keys($params));
	return '('.implode(',',array_keys($params)).') VALUES ('.implode(',',$new_array).')';
}
function svu($params) {
	$new_array = array_map(create_function('$key, $value', 'return ",".$key."=:".$key." ";'), array_keys($params), array_values($params));
	return substr(implode($new_array), 1); 
}

