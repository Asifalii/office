<?php

$langcode = 'en';
$wl = '.ht_whitelist';

$langs = array(
	'English' => 'en',
	'Castellano' => 'es',
	'Català' => 'ca',
	'Français' => 'fr'
);

$get_msg['en'] = '<h1>WARNING! Are you human?</h1>
    {lang_output}
    <p>This is first time you try to access to this page from your current IP (connection).</p>
    <p>Press button to continue. You won\'t see again this warning from this IP.</p>
    <form method="POST" action="{curpagename}">
      <input type="hidden" name="query_string" value="{query_string}">
      <input type="hidden" name="actionname" value="{actionname}" />
      <input type="submit" value="Click here to continue"/>
    </form>';

$get_msg['es'] = '<h1>ATENCIÓN! ¿Eres humano?</h1>     
    {lang_output}
    <p>Es la primera vez que accedes a esta página desde tu actual IP (conexión).</p>
    <p>Pulsa el siguiente botón para continuar. No volverás a ver este aviso desde esta IP.</p>
    <form method="POST" action="{curpagename}">
      <input type="hidden" name="query_string" value="{query_string}">
      <input type="hidden" name="actionname" value="{actionname}" />
      <input type="submit" value="Pulsa aquí para continuar"/>
    </form>';

$get_msg['ca'] = '<h1>ATENCIÓ! Ets humà?</h1>     
    {lang_output}
    <p>Es la primera vegada que accedeixes a aquesta pàgina des de la teva IP actual (conexió).</p>
    <p>Prem el següent butó per continuar. No tornaràs a veure aquest avís des de la teva IP actual.</p>
    <form method="POST" action="{curpagename}">
      <input type="hidden" name="query_string" value="{query_string}">
      <input type="hidden" name="actionname" value="{actionname}" />
      <input type="submit" value="Fes clic aquí per continuar"/>
    </form>';

$get_msg['fr'] = '<h1>ATTENTION! Êtes-vous humain?</h1>     
    {lang_output}
    <p>C\'est la première fois que vous accédez à cette page à partir de votre adresse IP actuelle (de connexion).</p>
    <p>Cliquez sur le bouton ci-dessous pour continuer. Vous ne verrez jamais cette annonce de cette adresse IP.</p>
    <form method="POST" action="{curpagename}">
      <input type="hidden" name="query_string" value="{query_string}">
      <input type="hidden" name="actionname" value="{actionname}" />
      <input type="submit" value="Cliquez pour continuer"/>
    </form>';

/* Selected language */
if (isset($_POST['langcode'])) {
	$langcode = $_POST['langcode'];
}


/* Get translations buttons */
$lang_output = '';
foreach ($langs as $langname => $langcoded) {
	$lang_output .= '<form method="POST" style="float:left;"><input type="hidden" name="langcode" value="' . $langcoded . '" /><input type="submit" value="' . $langname . '"/></form>';
}
$lang_output .= '<div style="clear:both"></div>';

/**
 * FUNCTIONS
 */

/**
 * Get html header
 */
function _get_header()
{
	$page_header = '
<html>
<head>
<title>Antibot Protection</title>
<meta charset="UTF-8" />
</head>
<body>
  ';
	return $page_header;
}

/**
 * Get html footer
 */
function _get_footer()
{
	$page_footer = '
<hr />
</body>
</html>';
	return $page_footer;
}

/**
 * Try to get current IP from current request
 */
function getRealIP()
{
	$client_ip = (!empty($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : ((!empty($_ENV['REMOTE_ADDR'])) ? $_ENV['REMOTE_ADDR'] : "unknown");
	if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
		$entries = mb_split('[, ]', $_SERVER['HTTP_X_FORWARDED_FOR']);
		reset($entries);
		while (list(, $entry) = each($entries)) {
			$entry = trim($entry);
			if (preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list)) { // http://www.faqs.org/rfcs/rfc1918.html
				$private_ip = array(
					'/^0\./',
					'/^127\.0\.0\.1/',
					'/^192\.168\..*/',
					'/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/',
					'/^10\..*/'
				);
				$found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);
				if ($client_ip != $found_ip) {
					$client_ip = $found_ip;
					break;
				}
			}
		}
	}
	return $client_ip;
}

/**
 * Get protected script name
 */
function curPageName()
{
//	return substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
	return '';
}

/**
 * Get url path of protected script name
 */
function curPathURL()
{
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on") {
		$pageURL .= "s";
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"];
	}
	$parts = explode('/', $_SERVER['REQUEST_URI']);
	for ($i = 0; $i < count($parts) - 1; $i++) {
		$pageURL .= $parts[$i] . "/";
	}
	return $pageURL;
}

/**
 * Block access
 */
function blocked($get_msg, $langcode, $lang_output, $actionname)
{
	$data = array(
		'lang_output' => $lang_output,
		'curPageName' => curPageName(),
		'actionname' => $actionname,
		'query_string' => $_SERVER['QUERY_STRING']
	);
	$content = replace_vars($get_msg[$langcode], $data);
	header("HTTP/1.0 404 Not Found");
	die(_get_header() . $content . _get_footer());
}

/**
 * Replace {vars} in translations
 */
function replace_vars($buffer, $data)
{
	/* replace declared var names */
	foreach ($data as $k => $v) {
		if (is_string($v) || is_numeric($v) || $v == NULL) {
			$buffer = preg_replace('/\{' . strtolower($k) . '\}/', $v, $buffer);
		}
	}
	return $buffer;
}

/** END FUNCTIONS ****/

/**
 * Vars
 */
$requester_IP = getRealIP(); // current requester IP
//$wl_filename = dirname(__FILE__) . '/' . $wl; // set full path whitelist file
$wl_filename = 'public/' . $wl; // set full path whitelist file

/* Create/Open session */
session_start();

/* Check actionname */
if (isset($_SESSION['actionname']) and isset($_POST['actionname'])) {

	if ($_SESSION['actionname'] == $_POST['actionname']) {

		/* Add IP to whitelist */
		$fh = fopen($wl_filename, 'a');
		fwrite($fh, $requester_IP . "\n");
		fclose($fh);

		/* Destroy current session */
		$_SESSION = array(); // destroys sesion parameters
		$_COOKIE = array(); // destroys cookies parameters
		session_destroy();

		/* Redirects to protected script */
		if (!empty($_POST['query_string'])) {
			header('Location: ' . curPathURL() . curPageName() . '?' . $_POST['query_string']);
		} else {
			header('Location: ' . curPathURL() . curPageName());
		}
		die();

	} else {

		/* Get current actionname session */
		$actionname = $_SESSION['actionname'];

	}

} else {

	/* Create new actionname session */
	$actionname = '.ht_' . uniqid();
	$_SESSION['actionname'] = $actionname;

}

/* Check whitelist */
if (is_file($wl_filename)) {
	$whitelist = file($wl_filename, FILE_IGNORE_NEW_LINES);

	$host_name = gethostbyaddr($requester_IP);
	$is_google_bot = false;
	if (!empty($host_name)) {
		$pos = strpos($host_name, 'google');

		if ($pos == false) {
			$is_google_bot = false;
		} else {
			$is_google_bot = true;
		}
	}

	/* is IP in whitelist? */
	if (!in_array($requester_IP, $whitelist) && $is_google_bot == false) {
		blocked($get_msg, $langcode, $lang_output, $actionname);
	}

} else {

	/* Empty whitelist */
	blocked($get_msg, $langcode, $lang_output, $actionname);

}
// Lets continue loading protected script
?>
