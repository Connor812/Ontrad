<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css">
body {background-color: #ffffff; color: #000000;}
body, td, th, h1, h2 {font-family: sans-serif;}
pre {margin: 0px; font-family: monospace;}
a:link {color: #000099; text-decoration: none; background-color: #ffffff;}
a:hover {text-decoration: underline;}
table {border-collapse: collapse;}
.center {text-align: center;}
.center table { margin-left: auto; margin-right: auto; text-align: left;}
.center th { text-align: center !important; }
td, th { border: 1px solid #000000; font-size: 75%; vertical-align: baseline;}
h1 {font-size: 150%;}
h2 {font-size: 125%;}
.p {text-align: left;}
.e {background-color: #ccccff; font-weight: bold; color: #000000;}
.h {background-color: #9999cc; font-weight: bold; color: #000000;}
.v {background-color: #cccccc; color: #000000;}
.vr {background-color: #cccccc; text-align: right; color: #000000;}
img {float: right; border: 0px;}
hr {width: 600px; background-color: #cccccc; border: 0px; height: 1px; color: #000000;}
</style>
<body><div class="center">
<table border="0" cellpadding="3" width="600">
<tr class="h"><td>

<h1 class="p">
<?php
echo 'Current PHP version: ' . phpversion();

?>
</h1>
</td></tr>
</table><br/>

<table border="0" cellpadding="3" width="600">
<?php
//echo " <tr><td class='e'>Configuration File (php.ini) Path </td><td class='v'>" .   php_ini_loaded_file()  .  "</td></tr>";
//print_r(php_ini_scanned_files());
echo " <tr><td class='e'> Zend engine version  </td><td class='v'>". zend_version() .  "</td></tr>"  ; 
echo " <tr><td class='e'> Registered PHP Streams  </td><td class='v'>";
foreach ( stream_get_wrappers()  as $a ) {
    echo "$a  ";
}
echo   "</td></tr>"  ; 

echo " <tr><td class='e'> Registered Stream Socket Transports   </td><td class='v'>";
foreach ( stream_get_transports()  as $a ) {
    echo "$a  ";
}
echo   "</td></tr>"  ;
echo " <tr><td class='e'> Registered Stream Filters  </td><td class='v'>";
foreach ( stream_get_filters()  as $a ) {
    echo "$a  ";
}
echo   "</td></tr>"  ;
?>
</table><br />

<h1>Configuration</h1>

<H2>Components</h2>

<table border="0" cellpadding="3" width="600">
<?php

 echo '<tr><td class="e">  MBSTRING (multi-byte string)  </td><td class="v">' ;
   if (extension_loaded('mbstring')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

 echo '<tr><td class="e">  Mcypt </td><td class="v">' ;
   if (function_exists('mcrypt_encrypt')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

 echo '<tr><td class="e">  ctype  </td><td class="v">' ;
   if (extension_loaded('ctype')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

 echo '<tr><td class="e">  filter  </td><td class="v">' ;
   if (extension_loaded('filter')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

 echo '<tr><td class="e">  MSSQL  </td><td class="v">' ;
   if (extension_loaded('mssql')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

 echo '<tr><td class="e"> PDO_ODBC ( PDO Driver for ODBC )  </td><td class="v">' ;
   if (extension_loaded('PDO_ODBC')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

 echo '<tr><td class="e"> Reflection </td><td class="v">' ;
   if (extension_loaded('Reflection')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

 echo '<tr><td class="e"> siteguard ( SiteGuard Support  ) </td><td class="v">' ;
   if (extension_loaded('siteguard')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

 echo '<tr><td class="e"> wddx ( WDDX Session Serializer ) </td><td class="v">' ;
   if (extension_loaded('wddx')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

 echo '<tr><td class="e"> xmlreader </td><td class="v">' ;
   if (extension_loaded('xmlreader')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

 echo '<tr><td class="e"> Zend Optimizer </td><td class="v">' ;
   if (   function_exists('zend_optimizer_version') ) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

 echo '<tr><td class="e"> Zend Guard Loader </td><td class="v">' ;
   if (  extension_loaded('Zend Guard Loader')  ) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

 echo '<tr><td class="e"> ionCube Loader </td><td class="v">' ;
   if (extension_loaded('ionCube Loader')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e"> BC Math </td><td class="v">' ;
   if (function_exists('bcsqrt') ) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

 echo '<tr><td class="e">  BZ2  </td><td class="v">' ;
   if (extension_loaded('bz2')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  CALENDAR  </td><td class="v">' ;
   if (extension_loaded('calendar')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  CURL  </td><td class="v">' ;
   if (extension_loaded('curl')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  DATE  </td><td class="v">' ;
   if (extension_loaded('date')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  DBA  </td><td class="v">' ;
   if (extension_loaded('dba')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  DOM (Document Object Model)  </td><td class="v">' ;
   if (extension_loaded('dom')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  CURL  </td><td class="v">' ;
   if (extension_loaded('curl')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

echo '<tr><td class="e">  EXIF  </td><td class="v">' ;
   if (extension_loaded('exif')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  FTP  </td><td class="v">' ;
   if (extension_loaded('ftp')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  GD  </td><td class="v">' ;
   if (extension_loaded('gd')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  GETTEXT  </td><td class="v">' ;
   if (extension_loaded('gettext')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  HASH  </td><td class="v">' ;
   if (extension_loaded('hash')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  ICONV  </td><td class="v">' ;
   if (extension_loaded('iconv')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

 echo '<tr><td class="e">  IMAP  </td><td class="v">' ;
   if (extension_loaded('imap')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  JSON  </td><td class="v">' ;
   if (extension_loaded('json')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  LIBXML  </td><td class="v">' ;
   if (extension_loaded('libxml')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  MBSTRING  </td><td class="v">' ;
   if (extension_loaded('mbstring')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  MCRYPT  </td><td class="v">' ;
   if (extension_loaded('mcrypt')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  MYSQL  </td><td class="v">' ;
   if (extension_loaded('mysql')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  MYSQLI  </td><td class="v">' ;
   if (extension_loaded('mysqli')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  OPENSSL  </td><td class="v">' ;
   if (extension_loaded('openssl')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  PCRE  </td><td class="v">' ;
   if (extension_loaded('pcre')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  PDO  </td><td class="v">' ;
  if (extension_loaded('PDO')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  PDO_MYSQL  </td><td class="v">' ;
   if (extension_loaded('pdo_mysql')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  PDO_SQLITE  </td><td class="v">' ;
   if (extension_loaded('pdo_sqlite')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  POSIX  </td><td class="v">' ;
   if (extension_loaded('posix')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  SESSION  </td><td class="v">' ;
   if (extension_loaded('session')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  SIMPLEXML  </td><td class="v">' ;
   if (extension_loaded('SimpleXML')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  SOAP  </td><td class="v">' ;
   if (extension_loaded('soap')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  SOCKETS  </td><td class="v">' ;
   if (extension_loaded('sockets')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  SPL  </td><td class="v">' ;
   if (extension_loaded('SPL')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  SQLITE  </td><td class="v">' ;
   if (extension_loaded('SQLite')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  STANDARD  </td><td class="v">' ;
   if (extension_loaded('standard')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  TIDY  </td><td class="v">' ;
   if (extension_loaded('tidy')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  TOKENIZER  </td><td class="v">' ;
   if (extension_loaded('tokenizer')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  XML  </td><td class="v">' ;
   if (extension_loaded('xml')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  XMLWRITER  </td><td class="v">' ;
   if (extension_loaded('xmlwriter')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  XSL  </td><td class="v">' ;
   if (extension_loaded('xsl')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  ZIP  </td><td class="v">' ;
   if (extension_loaded('zip')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

  echo '<tr><td class="e">  ZLIB  </td><td class="v">' ;
   if (extension_loaded('zlib')) {  echo " <font color='DarkGreen'>  OK  </font> </td></tr>";  }
 else {echo "<font color='red'> NOT present</font> </td></tr>";}

?>
</table><br />

<h2>Core</h2>

<table border="0" cellpadding="3" width="600">
<?php
foreach ( get_defined_vars()  as $a => $v ) {
echo "<tr><td class='e'>$a</td><td class='v'>";
if ( is_array($v) )
{
foreach ( $v as $b => $n ) {
print "" ;
                            }
}
 else
{
echo $v ;
}
echo "</td></tr>\n";
}

?>
</table><br />


<table border="0" cellpadding="3" width="600">
<?php
foreach ( ini_get_all(null, false)  as $a => $v ) { echo "<tr><td class='e'>$a</td><td class='v'>$v</td></tr>\n"; }
?>
</table><br />




<h1>Server Variables </h1>
<?php

$indicesServer = array('PHP_SELF',
'argv',
'argc',
'GATEWAY_INTERFACE',
'SERVER_ADDR',
'SERVER_NAME',
'SERVER_SOFTWARE',
'SERVER_PROTOCOL',
'REQUEST_METHOD',
'REQUEST_TIME',
'REQUEST_TIME_FLOAT',
'QUERY_STRING',
'DOCUMENT_ROOT',
'HTTP_ACCEPT',
'HTTP_ACCEPT_CHARSET',
'HTTP_ACCEPT_ENCODING',
'HTTP_ACCEPT_LANGUAGE',
'HTTP_CONNECTION',
'HTTP_HOST',
'HTTP_REFERER',
'HTTP_USER_AGENT',
'HTTPS',
'REMOTE_ADDR',
'REMOTE_HOST',
'REMOTE_PORT',
'REMOTE_USER',
'REDIRECT_REMOTE_USER',
'SCRIPT_FILENAME',
'SERVER_ADMIN',
'SERVER_PORT',
'SERVER_SIGNATURE',
'PATH_TRANSLATED',
'SCRIPT_NAME',
'REQUEST_URI',
'PHP_AUTH_DIGEST',
'PHP_AUTH_USER',
'PHP_AUTH_PW',
'AUTH_TYPE',
'PATH_INFO',
'ORIG_PATH_INFO') ;

echo '<table cellpadding="10">' ;
foreach ($indicesServer as $arg) {
    if (isset($_SERVER[$arg])) {
        echo '<tr><td class="e" >'.$arg.'</td><td class="v" >' . $_SERVER[$arg] . '</td></tr>' ;
    }
    else {
        echo '<tr><td  class="e"  >'.$arg.'</td><td class="v">-</td></tr>' ;
    }
}
echo '</table>' ; 
?>

