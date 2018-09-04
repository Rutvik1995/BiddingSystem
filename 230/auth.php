<?php
session_start();
$sid = session_id();
$conn = mysqli_connect("localhost", "root", "root", "xseed");
if(!$conn)
{
	die('Could not connect'.mysql_error());
}

session_reg('login');

//Session variable checking

function session_reg($x)
{
	global $sid,$login;
	$curr_tim = time();
	$expiry_tim = time() + 300000;
	foreach($_SESSION as $k=>$v)
	{
		if($k == 'login')
			$login = $v;
	}
	$SESSION_VARS = session_encode();
}
function session_unreg()
{
	session_unset();
}

function func_header_location($location, $keep_https = true, $http_error_code = 302) 
{
	global $SESSION_NAME, $SESSID, $HTTP_COOKIE_VARS;
	global $use_sessions_type, $is_location;
	global $HTTP_SERVER_VARS;
	global $HTTPS, $REQUEST_METHOD;

	$is_location = 'Y';

	if (function_exists("x_session_save")) {
		x_session_save();
	}

	if ($use_sessions_type < 3) {
		session_write_close();
	}

	$added = array();

	$supported_http_redirection_codes = array(
		"301" => "301 Moved Permanently",
		"302" => "302 Found",
		"303" => "303 See Other",
		"304" => "304 Not Modified",
		"305" => "305 Use Proxy",
		"307" => "307 Temporary Redirect"
	);

	$location = preg_replace('/[\x00-\x1f].*$/sm', '', $location);
	$location_info = @parse_url($location);

	if (!empty($XCARTSESSID) && (!isset($HTTP_COOKIE_VARS[$XCART_SESSION_NAME]) || defined("SESSION_ID_CHANGED")) && !eregi("$XCART_SESSION_NAME=", $location) && !defined('IS_ROBOT') && (empty($location_info) ||  !empty($location_info['host']))) {
		$added[] = $XCART_SESSION_NAME."=".$XCARTSESSID;
	}

	if ($keep_https && $REQUEST_METHOD == "POST" && $HTTPS && strpos($location,'keep_https=yes') === false && $config["Security"]["dont_leave_https"] == "Y") {
		$added[] = "keep_https=yes";
		# this block is necessary (in addition to https.php) to prevent appearance of secure alert in IE
	}

	if (!empty($added)) {
		$hash = "";
		if (preg_match("/^(.+)#(.+)$/", $location, $match)) {
			$location = $match[1];
			$hash = $match[2];
		}

		$location .= (strpos($location, "?") === false ? "?" : "&").implode("&", $added);
		if (!empty($hash))
			$location .= "#".$hash;
	}

	# Opera 8.51 (8.x ?) notes:
	# 1. Opera requires both headers - "Location" & "Refresh". Without "Location" it displays
	#    HTML code for META redirect
	# 2. 'Refresh' header is required when ansvering on POST request

	if (!@preg_match("/Microsoft|WebSTAR|Xitami/", getenv("SERVER_SOFTWARE"))) {
		# Microsoft IIS handle "Location:" headers internaly and repeat request
		# so this can lead to infinite loops
		if (!empty($http_error_code) && in_array($http_error_code, array_keys($supported_http_redirection_codes))) {
			if (substr(php_sapi_name(),0,3) =='cgi')
				@header("Status: " . $supported_http_redirection_codes[$http_error_code]);
			else	
				@header("HTTP/1.1 " . $supported_http_redirection_codes[$http_error_code]);
		}
		@header("Location: ".$location);
	}

	if (strpos($HTTP_SERVER_VARS["HTTP_USER_AGENT"],'Opera')!==false
	|| @preg_match("/Microsoft|WebSTAR|Xitami/", getenv("SERVER_SOFTWARE"))) {
		@header("Refresh: 0; URL=".$location);
	}

	//echo "<br /><br />".func_get_langvar_by_name("txt_header_location_note", array("time" => 2, "location" => $location), false, true, true);
	echo "<meta http-equiv=\"Refresh\" content=\"0;URL=$location\" />";

	//func_flush();
	exit();
}



function func_array2insert ($tbl, $arr, $is_replace = false)
{
	//global $sql_tbl;

	if (empty($tbl) || empty($arr) || !is_array($arr))
		return false;

	//if (!empty($sql_tbl[$tbl]))
		//$tbl = $sql_tbl[$tbl];

	if ($is_replace )
		$query = "REPLACE";
	else
		$query = "INSERT";

	func_check_tbl_fields($tbl, array_keys($arr));

	$arr_keys = array_keys($arr);
	foreach ($arr_keys as $k=>$v) {
		if (!(($v{0} == '`') && ($v{strlen($v)-1} == '`'))) $arr_keys[$k] = "`$v`";
	}

	$arr_values = array_values($arr);
	foreach ($arr_values as $k=>$v) {
		if ((!(($v{0} == '"') && ($v{strlen($v)-1} == '"'))) && 
			(!(($v{0} == "'") && ($v{strlen($v)-1} == "'")))) {
			$arr_values[$k] = "'$v'";
		}
	}

	$query .= " INTO $tbl (" . implode(", ", $arr_keys) . ") VALUES (" . implode(", ", $arr_values) . ")";
	 
	$r = db_query($query);
	if ($r) {
		return db_insert_id();
	}

	return false;
}

function func_array2update ($tbl, $arr, $where = '')
{

	if (empty($tbl) || empty($arr) || !is_array($arr))
		return false;

	$r = array();
	foreach ($arr as $k => $v) {
		if (!(($k{0} == '`') && ($k{strlen($k)-1} == '`'))) $k = "`$k`";
		if ((!(($v{0} == '"') && ($v{strlen($v)-1} == '"'))) && 
			(!(($v{0} == "'") && ($v{strlen($v)-1} == "'")))) {
			$v = "'$v'";
		}
		$r[] = "$k=$v";
	}
/*print_r(array_keys($arr));
exit;*/
	func_check_tbl_fields($tbl, array_keys($arr));

	$query = "UPDATE $tbl SET ". implode(", ", $r) . ($where ? " WHERE " . $where : "");
 
	return db_query($query);
}

function func_check_tbl_fields($tbl, $fields) 
{
	static $storage = array();
	//global $sql_tbl;

	if (empty($fields))
		return;

	if (!is_array($fields))
		func_header_location("error_message.php?access_denied&id=77");
		

	if (!is_array($tbl))
		$tbl = array($tbl);

	$fields_orig = array();
	foreach ($tbl as $t) 
	{
		//if (isset($sql_tbl[$t]))
			//$t = $sql_tbl[$t];

		if (!isset($storage[$t])) {
			$storage[$t] = func_query_column("SHOW FIELDS FROM ".$t);
			if (empty($storage[$t]))
				func_header_location("error_message.php?access_denied&id=78");
		}
		$fields_orig = func_array_merge($fields_orig, $storage[$t]);
	}
	$fields_orig = array_unique($fields_orig);
	$res = array_diff($fields, $fields_orig);
	if (!empty($res)) 
	{
		//func_print_r($res, $fields_orig, $fields, debug_backtrace());  die();
		func_header_location("error_message.php?access_denied&id=79");
	}
}

function func_query_column($query, $column = 0) {
	$result = array();

	$fetch_func = is_int($column) ? 'db_fetch_row' : 'db_fetch_array';

	if ($p_result = db_query($query)) {
		while ($row = $fetch_func($p_result))
			$result[] = $row[$column];

		db_free_result($p_result);
	}

	return $result;
}

function func_array_merge() {
	$vars = func_get_args();

	$result = array();
	if (!is_array($vars) || empty($vars)) {
		return $result;
	}

	foreach($vars as $v) {
		if (is_array($v) && !empty($v)) {
			$result = array_merge($result, $v);
		}
	}

	return $result;
}

function db_query($query) 
{
	global $debug_mode;
	global $mysql_autorepair, $sql_max_allowed_packet;
	if(preg_match("/\s*SELECT/i", $query)) {
    		$query = preg_replace("/FROM([^\"\']+?)LEFT\s+?JOIN/is","FROM($1)LEFT JOIN",$query);
   	}

	if (defined("START_TIME")) {
		global $__sql_time;
		$t = func_microtime();
	}


	if (function_exists("__add_mark")) __add_mark();
	$conn = mysqli_connect("localhost", "root", "root", "xseed");
	$result = mysqli_query($conn, $query);
	$t_end = func_microtime();
	if (defined("START_TIME")) {
		$__sql_time += func_microtime()-$t;
	}

	#
	# Auto repair
	#
	if (!$result && $mysql_autorepair && preg_match("/'(\S+)\.(MYI|MYD)/",mysql_error(), $m)) {
		$stm = "REPAIR TABLE $m[1] EXTENDED";
		error_log("Repairing table $m[1]", 0);
		if ($debug_mode == 1 || $debug_mode == 3) {
			$mysql_error = mysql_errno()." : ".mysql_error();
			echo "<b><font color=\"darkred\">Repairing table $m[1]...</font></b>$mysql_error<br />";
			flush();
		}
        $conn = mysqli_connect("localhost", "root", "root", "xseed");
		$result = mysqli_query($conn,$stm);
		if (!$result)
			error_log("Repaire table $m[1] is failed: ".mysql_errno()." : ".mysql_error(), 0);
		else
			$result = mysqli_query($conn,$query); # try repeat query...
	}

	if (db_error($result, $query) && $debug_mode==1)
		exit;

	$explain = array();
	if (
		defined("BENCH") && constant("BENCH") &&
		!defined("BENCH_BLOCK") && !defined("BENCH_DISPLAY") && 
		defined("BENCH_DISPLAY_TYPE") && constant("BENCH_DISPLAY_TYPE") == "A" &&
		!strncasecmp("SELECT", $query, 6)
	) {
		$r = mysqli_query($conn,'EXPLAIN '.$query);
		if ($r !== false) {
			while ($arr = db_fetch_array($r))
				$explain[] = $arr;

			db_free_result($r);
		}
	}

	if (function_exists("__add_mark"))__add_mark(array("query" => $query, "explain" => $explain), "SQL");

		return $result;
	
}

function func_microtime() {
	list($usec, $sec) = explode(" ",microtime()); 
	return ((float)$usec + (float)$sec); 
}

function db_result($result, $offset) {
	return mysqli_result($result, $offset);
}

function db_fetch_row($result) {
	return mysqli_fetch_row($result);
}

function db_fetch_array($result, $flag=MYSQLI_ASSOC) {
	return mysqli_fetch_array($result, $flag);
}

function db_fetch_field($result, $num = 0) {
	return mysqli_fetch_field($result, $num); 
}

function db_free_result($result) {
	@mysqli_free_result($result);
}

function db_num_rows($result) {
	return mysql_num_rows($result);
}

function db_num_fields($result) {
	return mysql_num_fields($result);
}

function db_insert_id() {
	$conn = mysqli_connect("localhost", "root", "root", "xseed");
	return mysqli_insert_id($conn);
}

function db_affected_rows() {
	return mysql_affected_rows();
}

function db_error($mysql_result, $query) {
	global $config, $login, $REMOTE_ADDR, $current_location;

	if ($mysql_result)
		return false;

	$mysql_error = mysqli_errno($conn)." : ".mysqli_error($conn);
	$msg  = "Site        : ".$current_location."\n";
	$msg .= "Remote IP   : $REMOTE_ADDR\n";
	$msg .= "Logged as   : $login\n";
	$msg .= "SQL query   : $query\n";
	$msg .= "Error code  : ".mysqli_errno($conn)."\n";
	$msg .= "Description : ".mysqli_error($conn);

	db_error_generic($query, $mysql_error, $msg);

	return true;
}

function db_error_generic($query, $query_error, $msg) {
	global $debug_mode, $config;

	$email = false;

	if (@$config["Email_Note"]["admin_sqlerror_notify"]=="Y") {
		$email = array ($config["Company"]["site_administrator"]);
	}

	if ($debug_mode == 1 || $debug_mode == 3) {
		echo "<b><font color=\"darkred\">INVALID SQL: </font></b>".phpspecialchars($query_error)."<br />";
		echo "<b><font color=\"darkred\">SQL QUERY FAILURE:</font></b>".phpspecialchars($query)."<br />";
		flush();
	}

	$do_log = ($debug_mode == 2 || $debug_mode == 3);

	if ($email !== false || $do_log) {
		if (!defined("SKIP_CHARSET_SELECTION")) {
			define("SKIP_CHARSET_SELECTION", 1);
		}
		x_log_add('SQL', $msg, true, 1, $email, !$do_log);
	}
}

function db_prepare_query($query, $params) {
	static $prepared = array();

	if (!empty($prepared[$query])) {
		$info = $prepared[$query];
		$tokens = $info['tokens'];
	}
	else {
		$tokens = preg_split('/((?<!\\\)\?)/S', $query, -1, PREG_SPLIT_DELIM_CAPTURE);

		$count = 0;
		foreach ($tokens as $k=>$v) if ($v === '?') $count ++;

		$info = array (
			'tokens' => $tokens,
			'param_count' => $count
		);
		$prepared[$query] = $info;
	}

	if (count($params) != $info['param_count']) {
		return array (
			'info' => 'mismatch',
			'expected' => $info['param_count'],
			'actual' => count($params));
	}

	$pos = 0;
	foreach ($tokens as $k=>$val) {
		if ($val !== '?') continue;

		if (!isset($params[$pos])) {
			return array (
				'info' => 'missing',
				'param' => $pos,
				'expected' => $info['param_count'],
				'actual' => count($params));
		}

		$val = $params[$pos];
		if (is_array($val)) {
			$val = func_array_map('addslashes', $val);
			$val = implode("','", $val);
		}
		else {
			$val = addslashes($val);
		}

		$tokens[$k] = "'" . $val . "'";
		$pos ++;
	}

	return implode('', $tokens);
}

#
# New DB API: Executing parameterized queries
# Example1:
#   $query = "SELECT * FROM table WHERE field1=? AND field2=? AND field3='\\?'"
#   $params = array (val1, val2)
#   query to execute:
#      "SELECT * FROM table WHERE field1='val1' AND field2='val2' AND field3='\\?'"
# Example2:
#   $query = "SELECT * FROM table WHERE field1=? AND field2 IN (?)"
#   $params = array (val1, array(val2,val3))
#   query to execute:
#      "SELECT * FROM table WHERE field1='val1' AND field2 IN ('val2','val3')"
#
# Warning:
#  1) all parameters must not be escaped with addslashes()
#  2) non-parameter symbols '?' must be escaped with a '\'
#
function db_exec($query, $params=array()) {
	global $config, $login, $REMOTE_ADDR, $current_location;

	if (!is_array($params))
		$params = array ($params);

	$prepared = db_prepare_query($query, $params);

	if (!is_array($prepared)) {
		return db_query($prepared);
	}

	$error = "Query preparation failed";
	switch ($prepared['info']) {
	case 'mismatch':
		$error .= ": parameters mismatch (passed $prepared[actual], expected $prepared[expected])";
		break;
	case 'missing':
		$error .= ": parameter $prepared[param] is missing";
		break;
	}

	$msg  = "Site        : ".$current_location."\n";
	$msg .= "Remote IP   : $REMOTE_ADDR\n";
	$msg .= "Logged as   : $login\n";
	$msg .= "SQL query   : $query\n";
	$msg .= "Description : ".$error;

	db_error_generic($query, $error, $msg);

	return false;
}

#
# Execute mysql query and store result into associative array with
# column names as keys
#
function func_query($query) {
	$result = false;
	if ($p_result = db_query($query)) {
		while ($arr = db_fetch_array($p_result))
			$result[] = $arr;
		db_free_result($p_result);
	}

	return $result;
}

#
# Execute mysql query and store result into associative array with
# column names as keys and then return first element of this array
# If array is empty return array().
#
function func_query_first($query) {
	if ($p_result = db_query($query)) {
		$result = db_fetch_array($p_result);
		db_free_result($p_result);
        }

   return is_array($result) ? $result : array();
}

#
# Execute mysql query and store result into associative array with
# column names as keys and then return first cell of first element of this array
# If array is empty return false.
#
function func_query_first_cell($query) {
	if ($p_result = db_query($query)) {
		$result = db_fetch_row($p_result);
		db_free_result($p_result);
	}

	return is_array($result) ? $result[0] : false;
}

?>