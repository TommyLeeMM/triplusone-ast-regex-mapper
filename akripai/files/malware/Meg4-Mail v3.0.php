<?php
$testa = $_POST['veio'];
if($testa != "") {
	$message = $_POST['html'];
	$subject = $_POST['assunto'];
	$nome = $_POST['nome'];
	$de = $_POST['de'];
	$to = $_POST['emails'];

	$email = explode("\n", $to);
	$message = stripslashes($message);

	$i = 0;
	$count = 1;
	while($email[$i]) {
                 $dataHora = date("d/m/Y h:i:s");


				$oldphpself = $_SERVER['PHP_SELF']; 
				$oldremoteaddr = $_SERVER['REMOTE_ADDR'];
				$_SERVER['PHP_SELF'] = "/"; 
				$_SERVER['REMOTE_ADDR'] = $_SERVER['SERVER_ADDR']; 
		
                $EmailTemporario = $email[$i];
                $message = stripslashes($message);
				$msgx = str_replace("%email%", $EmailTemporario, $message);
				$headers  = "MIME-Version: 1.0\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\n";
//				$headers .= "Content-Transfer-Encoding: base64\n";
				$headers .= "From: ".$nome." <".$EmailTemporario.">\r\n";
//*				$msgx = $message . $dataHora;
//				$msg_temp = base64_encode($msgx). "\n";
//				$tmp[1] = strlen($msg_temp);
//				$tmp[2] = ceil($tmp[1]/76);
//				for ($b = 0; $b <= $tmp[2]; $b++) {
//				$tmp[3] = $b * 76;
//				$message = substr($msg_temp, $tmp[3], 76) . "\n";
//				}
//
			if(mail($EmailTemporario, $subject."      ".$dataHora, $msgx.$dataHora, $headers))
		echo "<font color=blue>* N&#1098;mero: $count <b>".$email[$i]."</b> <font color=black>VEM INFOOOOO....!</font><br><hr>";
		else
		echo "<font color=red>* N&#1098;mero: $count <b>".$email[$i]."</b> <font color=red>EROO NAO ENVIO</font><br><hr>";
		$i++;
		$count++;
	}
	$count--;
	if($ok == "ok")
	echo "[Fim do Envio]"; 

}

?>
<HTML>
<head>
<title>Meg4-Mail v3.0</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style>
body {
	margin-left: 0;
	margin-right: 0;
	margin-top: 0;
	margin-bottom: 0;
}
.titulo {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 70px;
	color: #000000;
	font-weight: bold;
}

.normal {
	font-family: "Courier New", Courier, monospace;
	font-size: 16px;
	color: #00F;
}

.form {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10px;
	color: #000000;
	background-color: #0000FF;
	border: 1px dashed #666666;
}

.texto {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
}

.alerta {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #000;
	font-size: 10px;
}
.normal tr td p strong {
	font-size: 24px;
}
</style>
</head>
<BODY>
<form action="" method="post" enctype="multipart/form-data" name="form1">
  <input type="hidden" name="veio" value="sim">
  <table width="511" height="750" border="0" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="normal">
    <tr>
      <td width="509" height="46" align="center" bgcolor="#000000"><p><strong>Meg4-Mail v3.0</strong></p></td>
    </tr>
    <tr>
      <td height="194" valign="top" bgcolor="#FFFFFF">
	  	<table width="100%"  border="0" cellpadding="0" cellspacing="5" class="normal" height="499">
		  <tr>
            
            
            <td align="right" height="17"><span class="texto">Assunto:</span></td>
            <td height="17"><input name="assunto" value="Please Login to Update Your Account informations." type="text"class="normal" id="assunto" style="width:100%" ></td>
          </tr>
          <tr align="center" bgcolor="#99CCFF">
            <td height="20" colspan="2" bgcolor="#99CCFF"><span class="texto">C&oacute;digo HTML:</span></td>
          </tr>
          <tr align="right">
            <td height="146" colspan="2" valign="top"><br>
             <textarea name="html" style="width:100%" rows="8" wrap="VIRTUAL" class="normal" id="html"><!-- If you see this message, please enable HTML e-mail -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta name="viewport" content="initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,width=device-width,height=device-height,target-densitydpi=device-dpi,user-scalable=no">
<style type="text/css">
.ReadMsgBody {
	width: 100%;
}
.ExternalClass {
	width: 100%;
}
*[class=button_style] {
	border-radius: 7px !important;
	-webkit-border-radius: 7px !important;
	-moz-border-radius: 7px !important;
	-o-border-radius: 7px !important;
	-ms-border-radius: 7px !important;
}
*[class=button_style]:active {
	background: #008bdb !important;
}
*[class=button_style]:hover {
	background: #008bdb !important;
}

@media screen and (max-device-width: 640px) {

/* -------------------------------generic------------------------------- */
table[class=nomob], span[class=nomob], td[class=nomob], img[class=nomob] {
display:none !important;}

table[class=nobk], span[class=nobk], td[class=nobk], img[class=nobk] {
background:none!important;}

table[class=email320resize], td[class=email320resize] {
width:320px!important;
border:0px!important;
}

table[class=mobile_table_width], td[class=mobile_table_width] {
width:320px!important;
margin: 0px!important;}

table[class=mobile_table_width_smaller], td[class=mobile_table_width_smaller]{
width:280px!important;
margin: 0px!important;}
/* -------------------------------shell------------------------------- */

/* header */
*[class=resize10width] {
width: 10px!important;}

*[class=resize8width] {
width: 8px!important;}

*[class=resize50width] {
width: 50px!important;}

*[class=resize28height] {
height: 28px!important;}

/*Images*/

img[class=resize5] {
width: 5px !important;}

img[class=resize8] {
width: 8px !important;}

img[class=resize10] {
width: 10px !important;}

img[class=resize50] {
width: 50px !important;}

img[class=resize5h] {
height: 5px !important;}

img[class=resize8h] {
height: 8px !important;}

img[class=resize10h] {
height: 10px !important;}

img[class=resize12h] {
height: 12px !important;}

img[class=resize13h] {
height: 13px !important;}

img[class=resize20h] {
height: 20px !important;}

img[class=resize26h] {
height: 26px !important;}

img[class=resize30h] {
height: 30px !important;}

img[class=resize95]{
	width: 95px !important;
	height:auto!important;
}

img[class=resize17width]{
	width: 17px !important;
}

img[class=img130] { width:130px !important;
height: auto !important;}

img[class=resize280]{
	width: 280px !important;
}

img[class=resize300]{
	width: 280px !important;
	margin: 8px 0px 14px 0px!important;
}

img[class=resize300hero1]{
	width: 300px !important;
	height: auto!important;
} 

img[class=resize300hero2]{
	width: 300px !important;
	height:150px!important;
	background:url(https://image.paypal-communication.com/paypal/2012_Q2/PayPalEU_Mobile_Optimisation_Project_USD/html2/images/img_hero_nl_mobile.png) no-repeat!important;
} 

img[class=resize320]{
	width: 320px !important;
}

img[class=heroresize]{
	width:100px !important;	
	height:auto !important;
}

img[class=heroresize140]{
	width:140px !important;	
	height:auto !important;
}

img[class=heroresize2]{
	width:150px !important;	
	height:auto !important;
}


/*BACKGROUND IMAGES*/

td[class=smallDivider] {
background:url(https://image.paypal-communication.com/paypal/2012_Q2/PayPalEU_Mobile_Optimisation_Project_USD/html/images/img_divider.gif)!important;
background-position:top!important;
background-repeat:no-repeat!important;
width:280px!important;
height: auto!important;
margin-bottom: 15px!important;}

td[class=eduTop] {
background:url(https://image.paypal-communication.com/paypal/2012_Q2/PayPalEU_Mobile_Optimisation_Project_USD/html/images/img_eduTopMOB.gif)!important;
background-position:top!important;
background-repeat:no-repeat!important;
height:14px!important;
width:280px!important;}

td[class=eduBottom] {
background:url(https://image.paypal-communication.com/paypal/2012_Q2/PayPalEU_Mobile_Optimisation_Project_USD/html/images/img_eduBottomMOB.gif)!important;
background-position:top!important;














background-repeat:no-repeat!important;
height:14px!important;
width:280px!important;}



/*font sizes*/

*[class=fontsize12]{
	font-size: 12px !important;
	line-height: 16px !important;
}

td[class=fontsize16]{
	font-size: 16px !important;
	line-height: 19px !important;
}

td[class=fontsize18]{
	font-size: 18px !important;
	line-height: 21px !important;
}



*[class=fontsize18blue]{
	font-size: 18px !important;
	line-height: 21px !important;
	color:#717074;
	text-decoration:none;
}

td[class=fontsize24]{
	font-size: 24px !important;
	line-height: 28px !important;
}



*[class=fontsize24blue]{
	font-size: 24px !important;
	line-height: 28px !important;
	color:#717074;
	text-decoration:none;
}





/* footer */
td[class=emailcolsplit280] {
width:280px!important;
float:left!important;}

td[class=emailcolsplit260_2] {
width:260px!important;
float:left!important;
margin: 0  20px!important;
}

td[class=emailcolsplit300] {
width:290px!important;
float:left!important;}

*[id=padding14bottom] {
margin-bottom:16px!important;}
	
*[id=padding14] {
margin:16px 0px!important;}

*[class=resize11font] {
font-size:11px!important;
line-height: 15px!important;}

*[class=resize14height] {
height: 14px!important;}

*[class=resize14font] {
font-size:14px!important;
line-height: 18px!important;}


/* CTA */
*[class=footer300cta] {
font-size: 14px!important;
color:#FFF!important;
width:280px!important;
float:left!important;
text-align:center!important;
margin: 0px 0px 4px 0px!important;
padding: 2px 0px 2px 0px!important;
border: 0px!important;
border-radius: 10px !important;
background-color:#009CDE !important;}


*[class=blueband78width] {
width: 78px!important;
height: auto!important;
margin: 12px  0px!important;}

}

/* ---------------------- IPAD ---------------------- */
@media only screen and (min-device-width: 700px) and (max-device-width: 1024px) {
*[class=display_on] {
	display: block !important;
	height: auto !important;
	padding: 0;
	max-height: inherit !important;
	overflow: visible !important;
}
*[class=mobile_app_display_on] {
	margin-left: 187px !important;
	display: block !important;
	height: auto !important;
	padding: 0;
	max-height: inherit !important;
	overflow: visible !important;
}
*[class=mobile_body_table_width_mobapp] {
	display: block !important;
	width: 698px !important;
	height: auto !important;
	padding: 0;
	max-height: inherit !important;
	overflow: visible !important;
}
} /* END IPAD */
/* ---------------------- PHONE ---------------------- */
@media 
only screen and (max-width: 480px), 
only screen and (device-aspect-ratio: 9/16), 
only screen and (device-aspect-ratio: 5/8) and (max-width : 400px), 
only screen and (device-aspect-ratio: 3/5) { 
/* ------ OVERALL TABLE CONTROLS ------ */
*[class=display_on] {
	display: block !important;
	height: auto !important;
	padding: 0;
	max-height: inherit !important;
	overflow: visible !important;
}
*[class=mobile_app_display_on] {
	display: block !important;
	height: auto !important;
	padding: 0;
	max-height: inherit !important;
	overflow: visible !important;
}
*[class=no_mobile_all] {
	display: none !important;
}
*[class=no_mobile_phone] {
	display: none !important;
}
*[class=mobile_table_width_social] {
	display: block !important;
	width: 320px !important;
	float: left !important;
	height: auto !important;
	padding: 0;
	max-height: inherit !important;
	overflow: visible !important;
}
*[class=mobile_table_width] {

	width: 320px !important;
	height: auto !important;
	padding: 0;
	max-height: inherit !important;
	overflow: visible !important;
}

table[class=mobile_table_width_smaller], td[class=mobile_table_width_smaller]{
width:280px!important;
margin: 0px!important;}

*[class=column_split_preheader] {
	display: block !important;
	width: 320px !important;
	float: left !important;
	height: auto !important;
	max-height: inherit !important;
	overflow: visible !important;
	text-align: left !important;
	padding: 5px 3px !important;
}
*[class=mobile_body_table_width_pad29_4up_1] {
	display: block !important;
	width: 260px !important;
	float: left !important;
	height: auto !important;
	max-height: inherit !important;
	overflow: visible !important;
	text-align: left !important;
}
*[class=column_split_large_promo_hero] {
	display: block !important;
	width: 260px !important;
	float: left !important;
	height: auto !important;
	max-height: inherit !important;
	overflow: visible !important;
	text-align: left !important;
}
*[class=column_split_large_promo_hero278] {
	display: block !important;
	width: 278px !important;
	float: left !important;
	height: auto !important;
	max-height: inherit !important;
	overflow: visible !important;
	text-align: left !important;
}
*[class=column_split_bml_banner] {
	display: block !important;
	width: 260px !important;
	float: left !important;
	height: auto !important;
	max-height: inherit !important;
	overflow: visible !important;
	text-align: left !important;
	padding: 16px 0 0 0 !important;
}
*[class=column_split_statement_login] {
	display: block !important;
	width: 260px !important;
	float: left !important;
	height: auto !important;
	max-height: inherit !important;
	overflow: visible !important;
	text-align: left !important;
	padding: 16px 0 0 0 !important;
}
*[class=column_split_bml_banner_phone] {
	display: block !important;
	width: 260px !important;
	float: left !important;
	height: auto !important;
	max-height: inherit !important;
	overflow: visible !important;
	text-align: left !important;
	padding: 5px 0 0 0 !important;
}
*[class=column_split_one_up_large_image] {
	display: block !important;
	width: 260px !important;
	float: left !important;
	height: auto !important;
	max-height: inherit !important;
	overflow: visible !important;
	text-align: left !important;
	padding: 0 0 10px 0 !important;
}
*[class=column_split_one_up_large_image278] {
	display: block !important;
	width: 278px !important;
	float: left !important;
	height: auto !important;
	max-height: inherit !important;
	overflow: visible !important;
	text-align: left !important;
	padding: 0 0 10px 0 !important;
}
*[class=column_split_one_up_large_text] {
	display: block !important;
	width: 260px !important;
	float: left !important;
	height: auto !important;
	max-height: inherit !important;
	overflow: visible !important;
	text-align: left !important;
	padding: 0 !important;
}
*[class=mobile_body_table_width_pad29_3up] {
	display: block !important;
	width: 278px !important;
	height: auto !important;
	max-height: inherit !important;
	overflow: visible !important;
}
*[class=mobile_body_table_width_pad29_4up] {
	display: block !important;
	width: 278px !important;
	height: auto !important;
	max-height: inherit !important;
	overflow: visible !important;
	padding: 0 !important;
}
*[class=mobile_body_table_width_pad29_5up] {
	display: block !important;
	width: 278px !important;
	height: auto !important;
	max-height: inherit !important;
	overflow: visible !important;
	padding: 0 !important;
}
*[class=mobile_body_table_width] {
	width: 318px !important; /* 320px - 2px border */
	height: auto !important;
	padding: 0;
	max-height: inherit !important;
	overflow: visible !important;
}
*[class=mobile_body_table_width_mobapp] {
	display: block !important;
	width: 318px !important; /* 320px - 2px border */
	height: auto !important;
	padding: 0;
	max-height: inherit !important;
	overflow: visible !important;
}
*[class=mobile_body_table_width_pad29] {
	display: block !important;
	width: 260px !important; /* 320px - 2px border - 29px left padding - 29px right padding */
	height: auto !important;
	padding: 0;
	max-height: inherit !important;
	overflow: visible !important;
}
*[class=mobile_body_table_width_pad20] {
	width: 278px !important; /* 320px - 2px border - 20px left padding - 20px right padding */
	height: auto !important;
	padding: 0;
	max-height: inherit !important;
	overflow: visible !important;
}
*[class=mobile_only_body_table_width_pad20] {
	width: 278px !important; /* 320px - 2px border - 20px left padding - 20px right padding */
	height: auto !important;
	padding: 0;
	max-height: inherit !important;
	overflow: visible !important;
}
*[class=addPadding25h] {
	padding-bottom: 25px !important;
}
*[class=removePadding] {
	padding: 0 !important;
}
*[class=showmobile]{
	display:block !important; 
	width:318px !important; 
	height:auto !important; 
	padding:0; 
	max-height:inherit !important; 
	overflow:visible !important;
	}
*[class=showmobile320]{
	display:block !important; 
	width:320px !important; 
	height:auto !important; 
	padding:0; 
	max-height:inherit !important; 
	overflow:visible !important;
	}
*[class=showmobileApp]{
	display:block !important; 
	width:318px !important; 
	height:auto !important; 
	padding:0; 
	max-height:inherit !important; 
	overflow:visible !important;
	}

/* ------ HEADER CONTROLS ------ */
*[class=head_top_320px] {
	display: block !important;
}
*[class=head_top_160px] {
	display: none !important;
}
*[class=head_top_220px] {
	display: none !important;
}
/* ------ BODY SPACER CONTROLS ------ */
*[class=img_body_spacer] {
	width: 318px !important;
}
*[class=bml_banner_height_spacer] {
	width: 20px !important;
	height: 130px !important;
}
*[class=leftRightMargin20] {
	width: 20px !important;
}

*[class=leftRightMargin20top] {
	width: 10px !important;
}

/* ------ IMAGE CONTROLS ------ */
*[class=mobile_hero_width] {
	width: 318px !important;

	height: auto !important;
}
*[class=mobile_promo_hero_width] {
	width: 194px !important;
	height: auto !important;
	margin: 20px 0 0 0 !important;
}
*[class=one_up_small_image] {
	margin: 0 0 0 0px !important;
}
*[class=body_horizontal_rule] {
	width: 318px !important;
	height: 1px !important;
}
*[class=mobile_promo_hero_width_4_up] {
	width: 138px !important;
	height: auto !important;
}
*[class=mobile_promo_hero_width_5_up] {
	margin: 0 !important;
}
*[class=mobile_app_width] {
	width: 235px !important;
	height: 10px !important;
}
*[class=mobile_app_button_width] {
	width: 95px !important;
	height: 1px !important;
}
*[class=oneUpSmallSpacer] {
	width: 30px !important;
	height: 20px !important;
	display: block !important;
	float: left !important;
	overflow: visible !important;
	text-align: left !important;
	padding: 0 !important;
}
/* ------ TEXT CONTROLS ------ */
*[class=text_darkblue_header] {
	font-size: 28px !important;
}
*[class=text_lightblue_header] {
	font-size: 28px !important;
}
*[class=text_gray_paragraph] {
	font-size: 14px !important;
}
.appleLinksBlue a {
	color:#009CDE !important; 
	text-decoration: none !important;
}

.appleLinksGrey a {
	color:#666666 !important; 
	text-decoration: none !important;
}
/* ------ UTILITY NAV CONTROLS ------ */
*[class=mobile_table_width_utility_nav_phone] {
	display: block !important;
	width: 320px !important;
	float: left !important;
	height: auto !important;
	padding: 0;
	max-height: inherit !important;
	overflow: visible !important;
}
*[class=mobile_table_width_utility_nav] {
	display: block !important;
	width: 320px !important;
	float: left !important;
	height: auto !important;
	padding: 0;
	max-height: inherit !important;
	overflow: visible !important;
}
*[class=utility_nav] {
	/*display: block !important;
	background: #666 !important;
	color: #fff !important;
	border-radius: 5px !important;
	-webkit-border-radius: 5px !important;
	-moz-border-radius: 5px !important;
	width: 320px !important;
	padding: 5px 0 !important;
	margin: 5px 0 !important;
	line-height:26px !important;*/
	font-size: 12px !important;
	text-align: center !important;
}
*[class=ultility_nav_padding] {
	padding: 19px 0 21px 0 !important;
	text-align: center;
	width: 320px !important;
}
*[class=column_split_utility_nav] {
	display: block !important;
	width: 320px !important;
	float: left !important;
	height: auto !important;
	padding: 0;
	max-height: inherit !important;
	overflow: visible !important;
}
/* ------ BUTTON CONTROLS ------ */
*[class=button_style] {
	border-radius: 7px !important;
	-webkit-border-radius: 7px !important;
	-moz-border-radius: 7px !important;
	-o-border-radius: 7px !important;
	-ms-border-radius: 7px !important;
}
*[class=button_style]:active {
	background: #009CDE !important;
}
*[class=button_style]:hover {
	background: #009CDE !important;
}
*[class=mobile_button] {
	width: 278px !important;
}
/* ------ FOOTER CONTROLS ------ */
*[class=horizontal_rule] {
	width: 320px !important;
	height: 2px !important;
}
} /* END PHONE CSS */



/* ---------------------- TABLET ---------------------- */
@media only screen and (min-device-width: 481px) and (max-device-width: 699px) {
/* ------ OVERALL TABLE CONTROLS ------ */
*[class=display_on] {
	display: block !important;
	height: auto !important;
	padding: 0;
	max-height: inherit !important;
	overflow: visible !important;
}
*[class=mobile_app_display_on] {
	margin-left: 75px !important;
	display: block !important;
	height: auto !important;
	padding: 0;
	max-height: inherit !important;
	overflow: visible !important;
}
*[class=no_mobile] {
	display: none !important;
}
*[class=mobile_table_width] {
	display: block !important;
	width: 480px !important;
	height: auto !important;
	padding: 0;

	max-height: inherit !important;
	overflow: visible !important;
}

table[class=mobile_table_width_smaller], td[class=mobile_table_width_smaller]{
width:280px!important;
margin: 0px!important;}

*[class=column_split] {
	display: block !important;
	width: 480px !important;
	float: left !important;
	height: auto !important;
	padding: 0;
	max-height: inherit !important;
	overflow: visible !important;
}
*[class=mobile_body_table_width] {
	display: block !important;
	width: 478px !important; /* 480px - 2px border */
	height: auto !important;
	padding: 0;
	max-height: inherit !important;
	overflow: visible !important;
}
*[class=mobile_body_table_width_mobapp] {
	display: block !important;
	width: 478px !important; /* 480px - 2px border */
	height: auto !important;
	padding: 0;
	max-height: inherit !important;
	overflow: visible !important;
}
*[class=mobile_body_table_width_pad29] {
	display: block !important;
	width: 420px !important; /* 480px - 2px border - 29px left padding - 29px right padding */
	height: auto !important;
	padding: 0;
	max-height: inherit !important;
	overflow: visible !important;
}
*[class=mobile_body_table_width_pad20] {
	display: block !important;
	width: 438px !important; /* 480px - 2px border - 29px left padding - 29px right padding */
	height: auto !important;
	padding: 0;
	max-height: inherit !important;
	overflow: visible !important;
}
*[class=mobile_body_table_width_pad29_3up] {
	display: block !important;
	width: 134px !important;
	height: auto !important;
	padding: 0;
	max-height: inherit !important;
	overflow: visible !important;
}
*[class=mobile_body_table_width_pad29_4up] {
	display: block !important;
	width: 98px !important;
	height: auto !important;
	padding: 0;
	max-height: inherit !important;
	overflow: visible !important;
}
*[class=mobile_body_table_width_pad29_5up] {
	display: block !important;
	width: 78px !important;
	height: auto !important;
	padding: 0;
	max-height: inherit !important;
	overflow: visible !important;
}
*[class=column_split_bml_banner] {
	display: block !important;
	width: 420px !important;
	float: left !important;
	height: auto !important;
	max-height: inherit !important;
	overflow: visible !important;
	text-align: left !important;
	padding: 16px 0 0 0 !important;
}
*[class=column_split_statement_login] {
	display: block !important;
	width: 210px !important;
	float: left !important;
	height: auto !important;
	max-height: inherit !important;
	overflow: visible !important;
	text-align: left !important;
	padding: 8px 0 0 0 !important;
}
*[class=mobile_body_table_width_pad29_4up_1] {
	display: block !important;
	width: 420px !important;
	float: left !important;
	height: auto !important;
	max-height: inherit !important;
	overflow: visible !important;
	text-align: left !important;
}
*[class=addPadding25h] {
	padding-bottom: 25px !important;
}

*[class=showmobileApp]{
	display:block !important; 
	width:448px !important; 
	height:auto !important; 
	padding:0; 
	max-height:inherit !important; 
	overflow:visible !important;
	}
/* ------ HEADER CONTROLS ------ */
*[class=head_top_320px] {
	display: block !important;
}
*[class=head_top_160px] {
	display: block !important;
}
*[class=head_top_220px] {
	display: none !important;
}
/* ------ BODY SPACER CONTROLS ------ */
*[class=img_body_spacer] {
	width: 478px !important;
}
*[class=bml_banner_height_spacer] {
	width: 20px !important;
	height: 100px !important;
}
*[class=leftRightMargin20] {
	width: 20px !important;
}
*[class=leftRightMargin20top] {
	width: 10px !important;
}

*[class=three_up_horizontal_spacer_19] {
	width: 19px !important;
}
*[class=three_up_horizontal_spacer_9] {
	width: 9px !important;
}
*[class=four_up_horizontal_spacer_7] {
	width: 7px !important;
}
*[class=four_up_horizontal_spacer_4] {
	width: 4px !important;
}
*[class=five_up_horizontal_spacer_1] {
	width: 4px !important;
}
*[class=five_up_horizontal_spacer_6] {
	width: 6px !important;
}
/* ------ IMAGE CONTROLS ------ */
*[class=mobile_hero_width] {
	width: 478px !important;
	height: auto !important;
}
*[class=mobile_promo_hero_width] {
	width: 134px !important;
	height: auto !important;

}
*[class=mobile_promo_hero_width_4_up] {
	width: 98px !important;
	height: auto !important;
}
*[class=mobile_promo_hero_width_5_up] {
	width: 78px !important;
	height: auto !important;
}
*[class=body_horizontal_rule] {
	width: 478px !important;
	height: 1px !important;
}


*[class=mobile_app_width] {
	width: 398px !important;
	height: 10px !important;
}
*[class=mobile_app_button_width] {
	width: 173px !important;
	height: 1px !important;
}
*[class=oneUpSmallSpacer] {
	width: 30px !important;
	height: 20px !important;
}
/* ------ TEXT CONTROLS ------ */
*[class=text_darkblue_header] {
	font-size: 32px !important;
}
*[class=text_lightblue_header] {
	font-size: 32px !important;
}
*[class=text_gray_paragraph] {
	font-size: 14px !important;
}
.appleLinksBlue a {
	color:#009CDE !important; 
	text-decoration: none !important;
}
/* ------ UTILITY NAV CONTROLS ------ */
*[class=utility_nav_spacer] {
	width: 10px !important;
}
*[class=mobile_table_width_social] {
	width: 78px !important;
}
*[class=mobile_table_width_utility_nav] {
	width: 400px !important;
}
*[class=mobile_table_width_utility_nav_phone] {
	display: none !important;
}
/* ------ FOOTER CONTROLS ------ */
*[class=horizontal_rule] {
	width: 480px !important;
	height: 2px !important;
}
/* ------ BUTTON CONTROLS ------ */
*[class=button_style] {
	border-radius: 7px !important;
	-webkit-border-radius: 7px !important;
	-moz-border-radius: 7px !important;
	-o-border-radius: 7px !important;
	-ms-border-radius: 7px !important;
}
*[class=button_style]:active {
	background: #008bdb !important;
}
*[class=button_style]:hover {
	background: #009CDE !important;
}
*[class=mobile_button] {
	width: 278px !important;
}
} /* END TABLET CSS */
</style>
</head>
<body style="padding:0; margin:0; background:#f2f2f2;">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="top" style="padding:0; margin:0; background:#f2f2f2;"><table class="mobile_table_width" width="700" border="0" cellpadding="0" cellspacing="0" align="center">
        <!-- TEMPLATE: PREHEADER -->
      <tr>
          <td><table class="no_mobile_phone" width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
              <tr>
                <td class="column_split_preheader" width="471" align="left" style="padding:15px 0; font-family:Helvetica,Arial,sans-serif;  -webkit-font-smoothing: antialiased; font-size:12px; color:#666; text-align:left;">&nbsp;</td>
                <td class="no_mobile_phone" width="38"><img src="http://img.ed4.net/spacer10.gif" height="1" width="38" border="0" style="display:block;" /></td>
                <td class="column_split_preheader" width="191" align="right" style="padding:15px 0; font-family:Helvetica,Arial,sans-serif;  -webkit-font-smoothing: antialiased; font-size:12px; color:#666; text-align:right;">&nbsp;</td>
              </tr>
            </table>
            
            
            <!--[if !mso]><!-->
<div style="display:none; width:0px; max-height:0px; overflow:hidden;" class="showmobile320">
            <table width="320" border="0" cellpadding="0" cellspacing="0" align="center" style="display:none; width:0px; max-height:0px; overflow:hidden;" class="showmobile320">
              <tr>
                <td width="320" align="left" style="padding:5px 3px; font-family:Helvetica,Arial,sans-serif;  -webkit-font-smoothing: antialiased; font-size:12px; color:#666; text-align:left;"><a
 href="#" style="text-decoration:none; color:#666;" target="_blank"
><strong></strong></a></td>
                </tr>
                <tr>
                
                <td width="320" align="left" style="padding:5px 3px; font-family:Helvetica,Arial,sans-serif;  -webkit-font-smoothing: antialiased; font-size:12px; color:#666; text-align:left;"><a
 href="https://email-edg.paypal.com/r/Z86IWH9/KR9EXX/16OFVAO/FICJRM/IQY76T/1C/h?a=Z86IWH9&b=P3JW2O&c=XACBGYA&d=16OFVAO&e=1&f=5e2b8bd276526e4846ca" style="font-weight:normal; text-decoration:underline; color:#666;" target="_blank"
><span style="font-family:Helvetica,Arial,sans-serif;  font-size:12px; color:#666; text-align:right;">View Online</span></a></td>
                
              </tr>
            </table>
            </div>
<!--<![endif]--></td>
        </tr>
        <!-- TEMPLATE: PREHEADER --> 
        <!-- TEMPLATE: TOP BORDER -->
        <tr>
          <td><table class="mobile_table_width" width="700" border="0" cellpadding="0" cellspacing="0" align="center">
              <tr>
                <td><img src="https://image.paypal-communication.com/paypal_eu/common/module_system/wireframe/images/template_top_left_1px.jpg" width="1" height="20" alt="" border="0" style="display:block;"></td>
                <td><img src="https://image.paypal-communication.com/paypal_eu/common/module_system/wireframe/images/template_top_left_3px.jpg" width="3" height="20" alt="" border="0" style="display:block;"></td>
                <td><img class="head_top_320px" src="https://image.paypal-communication.com/paypal_eu/common/module_system/wireframe/images/template_top_312px.jpg" width="312" height="20" alt="" border="0" style="display:block;"></td>
                <td><img class="head_top_160px" src="https://image.paypal-communication.com/paypal_eu/common/module_system/wireframe/images/template_top_160px.jpg" width="160" height="20" alt="" border="0" style="display:block;"></td>
                <td><img class="head_top_220px" src="https://image.paypal-communication.com/paypal_eu/common/module_system/wireframe/images/template_top_220px.jpg" width="220" height="20" alt="" border="0" style="display:block;"></td>
                <td><img src="https://image.paypal-communication.com/paypal_eu/common/module_system/wireframe/images/template_top_right_3px.jpg" width="3" height="20" alt="" border="0" style="display:block;"></td>
                <td><img src="https://image.paypal-communication.com/paypal_eu/common/module_system/wireframe/images/template_top_right_1px.jpg" width="1" height="20" alt="" border="0" style="display:block;"></td>
              </tr>
            </table></td>
        </tr>
        <!-- / TEMPLATE: TOP BORDER --> 
        <!-- TEMPLATE: BODY -->
        <tr>
          <td style="background:#f2f2f2;"><table class="mobile_table_width" width="700" border="0" cellpadding="0" cellspacing="0" align="center" style="background:#f2f2f2;">
              <!-- TEMPLATE: BODY: FORCED SPACERS -->
              <tr>
                <td style="background:#e3e3e3;"><img src="http://img.ed4.net/spacer10.gif" height="1" width="1" border="0" style="display:block;" /></td>
                <td style="background:#fff;"><img class="img_body_spacer" src="http://img.ed4.net/spacer10.gif" height="1" width="698" border="0" style="display:block;" /></td>
                <td style="background:#e3e3e3;"><img src="http://img.ed4.net/spacer10.gif" height="1" width="1" border="0" style="display:block;" /></td>
              </tr>
              <!-- / TEMPLATE: BODY: FORCED SPACERS --> 
              <!-- TEMPLATE: BODY: LEFT BORDER -->
              <tr>
                <td style="background:#e3e3e3;"><img src="http://img.ed4.net/spacer10.gif" height="1" width="1" border="0" style="display:block;" /></td>
                <!-- / TEMPLATE: BODY: LEFT BORDER -->
                <td align="left" valign="top" style="background:#fff;"><!-- TEMPLATE: PAYPAL LOGO AND SPACERS -->
                  
                  <table class="mobile_body_table_width" width="698" border="0" cellpadding="0" cellspacing="0" align="center" style="background:#fff;">
                    <tr>
                      <td><table class="mobile_body_table_width" width="698" border="0" cellpadding="0" cellspacing="0" align="center" style="background:#fff;">
                          <tr>
                          <td width="29" style="background:#fff;"><img src="http://img.ed4.net/spacer10.gif" height="1" width="29" border="0" style="display:block;" /></td>
                            <td width="140" style="background:#fff;"><a
 href="https://email-edg.paypal.com/r/Z86IWH9/KR9EXX/16OFVAO/FICJRM/FD4XJY/1C/h" style="font-family:Arial, Helvetica, sans-serif; color:#00447c; font-size:20px; text-decoration:none; line-height:22px; font-weight:bold;" target="_blank"
><img src="https://image.paypal-communication.com/paypal_eu/common/module_system/wireframe/images/pp_h_rgb.gif" height="34" width="140" alt="PayPal" border="0" style="display:block;"></a></td>
                            <td width="40" style="background:#fff;"><img src="http://img.ed4.net/spacer10.gif" height="1" width="40" border="0" style="display:block;" /></td>
                            <!-- Partner Logo #1 -->
                            <td width="174" style="background:#fff;">&nbsp;</td>
                            <!-- / Partner Logo #1 -->
                            <td width="40" style="background:#fff;"><img src="http://img.ed4.net/spacer10.gif" height="1" width="40" border="0" style="display:block;" /></td>
                            <!-- Partner Logo #2 -->
                            <td style="background:#fff;">&nbsp;</td>
                            <!-- / Partner Logo #2 --> 
                          </tr>
                        </table></td>
                    </tr>
                    <tr>
                      <td style="background:#fff;"><img src="http://img.ed4.net/spacer10.gif" height="29" width="1" border="0" style="display:block;" /></td>
                    </tr>
                  </table>
                  
                  <!-- / TEMPLATE: PAYPAL LOGO AND SPACERS --></td>
                <!-- TEMPLATE: BODY: RIGHT BORDER -->
                <td style="background:#e3e3e3;"><img src="http://img.ed4.net/spacer10.gif" height="1" width="1" border="0" style="display:block;" /></td>
              </tr>
              <!-- / TEMPLATE: BODY: RIGHT BORDER --> 
              <!-- TEMPLATE: BODY: LEFT BORDER -->
          
                <!-- / TEMPLATE: BODY: LEFT BORDER -->
                <tr>
                <td style="background:#e3e3e3;"><img src="http://img.ed4.net/spacer10.gif" height="1" width="1" border="0" style="display:block;" /></td>
                <!-- / TEMPLATE: BODY: LEFT BORDER -->
                <td align="left" valign="top" style="background:#fff; font-family:Helvetica,Arial,sans-serif;  -webkit-font-smoothing: antialiased; font-size:13px; color:#666; padding-bottom:9px;"><table class="mobile_body_table_width" width="698" border="0" cellpadding="0" cellspacing="0" align="center" style="background:#fff;">
                    <tr>
                      <td class="mobile_body_table_width_pad29" width="640" style="background:#fff;"><!-- BODY CONTENT HERE --> <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#e3e3e3" class="mobile_table_width"><tr>
                <td style="background:#e3e3e3;"><img src="http://img.ed4.net/spacer10.gif" height="1" width="1" border="0" style="display:block;" /></td></tr></table>
<table class="mobile_table_width" border="0" cellspacing="0" cellpadding="0" width="100%" bgcolor="#F5F5F5">
<tr>
<td class="resize10width" width="35" align="left" valign="top"><img class="resize10width" style="display:block;" src="https://image.paypal-communication.com/paypal_eu/images/IMG/spacer50.gif" border="0" alt="" width="35" height="1" /></td>
<td align="left" valign="top">
<table border="0" cellspacing="0" cellpadding="0" width="100%">
<tr><td colspan="2" align="left" valign="top" ><img style="display:block;" src="https://image.paypal-communication.com/paypal_eu/images/IMG/spacer50.gif" width="1" height="15" border="0"/></td></tr>

<tr>
<td valign="top" style="font-family: Arial, Helvetica, sans-serif; font-size: 24px; color: #009CDE; text-decoration: none; line-height: 28px;" ><font class="fontsize18blue" style="font-family: Arial, Helvetica, sans-serif; font-size: 24px; color: #009CDE; text-decoration: none; line-height: 26px;">Update your account information</font></td>
<tr><td colspan="2" align="left" valign="top" ><img style="display:block;" src="https://image.paypal-communication.com/paypal_eu/images/IMG/spacer50.gif" width="1" height="15" border="0"/></td></tr>

</table>
</td>
<td class="nomob" width="35" align="left" valign="top"><img style="display:block;" src="https://image.paypal-communication.com/paypal_eu/images/IMG/spacer50.gif" border="0" alt="" width="35" height="1" /></td>
</tr>  
</table><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#e3e3e3" class="mobile_table_width"><tr>
                <td style="background:#e3e3e3;"><img src="http://img.ed4.net/spacer10.gif" height="1" width="1" border="0" style="display:block;" /></td></tr></table><table class="mobile_body_table_width" width="698" border="0" cellpadding="0" cellspacing="0" align="center" style="background:#fff;">
  <tr>
    <td width="29" class="leftRightMargin20"><img class="leftRightMargin20" src="http://img.ed4.net/spacer10.gif" height="1" width="29" border="0" style="display:block;" /></td>
    <td style="padding: 25px 0 25px 0;"><!-- START 29PX-LEFT, 29PX-RIGHT INDENTED CONTENT --><table class="mobile_body_table_width_pad20" width="640" border="0" cellpadding="0" cellspacing="0" align="center" style="background:#fff;">
        <tr>
          <td  style="font-family:Helvetica,Arial,sans-serif; color:#717074; font-size:13px; -webkit-font-smoothing: antialiased;"><p style="font-size: 13px; color: #717074; font-family: Helvetica,Arial,sans-serif; font-weight: bold;">Hello PayPal user, </p>
            <p style="font-size:13px; color:#717074; font-family:Helvetica,Arial,sans-serif;">Recently, we have detected different logins to your account from different country followed by some illegals buys and we think that the hackers have hacked it, so we have suspended your account.</p>
            <p style="font-size: 13px; color: #717074; font-family: Helvetica,Arial,sans-serif; font-weight: bold;">What do I need to do?</p>
            <p style="font-size: 13px; color: #717074; font-family: Helvetica,Arial,sans-serif;"> Open your account by clicking to &quot;login&quot; button, and remember to update your informations after logging in.<br />
              We will give you 3 days to update your informations or we will suspend your account forever.</p>
            <p style="font-size: 13px; color: #717074; font-family: Helvetica,Arial,sans-serif;"><span style="font-size:13px; color:#717074; font-family:Helvetica,Arial,sans-serif;">Sincerely,</span><span style="font-size:13px; color:#717074; font-family:Helvetica,Arial,sans-serif;"><br />
            </span><strong>PayPal</strong></p></td>
        </tr>
        
         <tr>
                <td align="left" valign="top"><img class="resize12height" src="https://image.paypal-communication.com/paypal_eu/images/IMG/spacer50.gif" alt="" width="1" height="21" border="0" style="display:block;" /></td>
              </tr>
              <tr>
                <td  valign="top" style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #009CDE; text-decoration: none; line-height: 20px;"><span style="font-size: 13px; color: #717074; font-family: Helvetica,Arial,sans-serif;">P.S:the following button contains a special link that give you the possibility to open your suspended account, but you should not login from the page in official website because that can suspend your account forever.</span></td>
              </tr>
       
           
      </table><!-- / START 29PX-LEFT, 29PX-RIGHT INDENTED CONTENT --></td>
    <td width="29" class="leftRightMargin20top"><img class="leftRightMargin20top" src="http://img.ed4.net/spacer10.gif" height="1" width="29" border="0" style="display:block;" /></td>
  </tr>
</table>
<table class="mobile_body_table_width" width="698" border="0" cellpadding="0" cellspacing="0" align="center" style="background:#fff;">
  <tr>
    <td width="29" class="leftRightMargin20"><img class="leftRightMargin20" src="http://img.ed4.net/spacer10.gif" height="1" width="29" border="0" style="display:block;" /></td>
    <td style="padding: 0 0 25px 0;"><!-- START 29PX-LEFT, 29PX-RIGHT INDENTED CONTENT -->
      
      <table class="mobile_body_table_width_pad20" width="640" border="0" cellpadding="0" cellspacing="0" align="center" style="background:#fff;">
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><table id="blue_button" width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><table align="center" class="mobile_button" width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td height="1" id="button_force_width"><img class="mobile_button" src="http://img.ed4.net/spacer10.gif" height="1" width="299" border="0" style="display:block;" /></td>
                          </tr>
                          <tr>
                            <td><table class="mobile_button" width="299" border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                  <td height="40" width="1" id="force_height"><img src="http://img.ed4.net/spacer10.gif" height="40" width="1" border="0" style="display:block;" /></td>
                                  <td class="button_style" id="button_text" width="262" align="center" valign="middle" style="font-family:Arial,sans-serif; font-weight:bold; font-stretch:normal; text-align:center; color:#fff; font-size:13px; font-weight:bold;/*button styles*/background:#009CDE; border-radius:7px !important; -webkit-border-radius: 7px !important; -moz-border-radius: 7px !important; -o-border-radius: 7px !important; -ms-border-radius: 7px !important;">
                                  
                                  
                                  <a
 href="http://www.savannahstorageunits.com/secure/paypal/resolution" style="color:#fff; text-decoration:none; display:block; font-weight:bold;" class=""
><span style="color:#ffffff; text-decoration:none; display:block; font-family:Arial,sans-serif; font-weight:bold; font-size:13px; line-height:15px;">Login</span></a>
                                  
                                  </td>
                                </tr>
                              </table></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
              </tr>
            </table></td>
        </tr>
      </table>
      <!-- / START 29PX-LEFT, 29PX-RIGHT INDENTED CONTENT --></td>
    <td width="29" class="leftRightMargin20"><img class="leftRightMargin20" src="http://img.ed4.net/spacer10.gif" height="1" width="29" border="0" style="display:block;" /></td>
  </tr>
</table>

         <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#e3e3e3" class="mobile_table_width"><tr>
                <td style="background:#e3e3e3;"><img src="http://img.ed4.net/spacer10.gif" height="1" width="1" border="0" style="display:block;" /></td></tr></table>
          <table class="no_mobile_phone" width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="background:#fff;">
  
  <tr>
    <td><table class="mobile_body_table_width" width="698" border="0" cellpadding="0" cellspacing="0" align="center" style="background:#fff;">
        <tr>
          <td width="29" class="leftRightMargin20"><img class="leftRightMargin20" src="http://img.ed4.net/spacer10.gif" height="1" width="29" border="0" style="display:block;" /></td>
          <td class="text_gray_paragraph" align="left" valign="top" style="font-family:HelveticaNeueLight,HelveticaNeue-Light,'Helvetica Neue Light',HelveticaNeue,Helvetica,Arial,sans-serif; color:#717074; font-size:14px; padding: 0 0 0 0; -webkit-font-smoothing: antialiased;">
            
            <table class="mobile_body_table_width_pad20" width="669" border="0" cellpadding="0" cellspacing="0" align="center" style="background:#fff;">
              <tr>
                <td class="column_split_one_up_large_image278" valign="middle">
                <table class="mobile_only_body_table_width_pad20" width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td align="left" valign="top" width="416" style="font-family:Helvetica,Arial,sans-serif; color:#009CDE; font-size:24px; -webkit-font-smoothing: antialiased; padding: 0 0 13px 0;"><span style="font-size:24px; color:#009CDE; font-family:Helvetica,Arial,sans-serif;">It&#8217;s a small world</span><br />
                  <br />
                 <span style="font-size:13px; color:#717074; font-family:Helvetica,Arial,sans-serif;">Whether you are looking to shop at top international brands or small sellers in remote cities, we can help. We accept 26 currencies from 203 countries and markets and can convert them for a small fee. If ever your item does not arrive or differs from the description, you can ask for a refund.
                  </span>
                  </td>
                  </tr>
                  
                  <tr>
                  <td align="left" valign="top" style="font-family:Helvetica,Arial,sans-serif; color:#009CDE; font-size:13px; -webkit-font-smoothing: antialiased;">
                
                  
<a
 href="https://email-edg.paypal.com/r/Z86IWH9/KR9EXX/16OFVAO/FICJRM/IQD20W/1C/h" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#009CDE; font-weight:bold; text-decoration:none" target="_blank"
>Learn more</a>
                  
                  </td>
</tr>
</table>
</td>
                <td class="no_mobile_phone"><img src="http://img.ed4.net/spacer10.gif" height="1" width="30" border="0" style="display:block;" /></td>
                <td align="left" valign="middle" style="font-family:HelveticaNeueLight,HelveticaNeue-Light,'Helvetica Neue Light',HelveticaNeue,Helvetica,Arial,sans-serif; color:#717074; font-size:14px; -webkit-font-smoothing: antialiased;">
                
                
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td align="center" valign="middle" style="font-family:Helvetica,Arial,sans-serif; color:#717074; font-size:14px; -webkit-font-smoothing: antialiased;">
                <a
 href="https://email-edg.paypal.com/r/Z86IWH9/KR9EXX/16OFVAO/FICJRM/A4ZBLC/1C/h" target="_blank"
><img src="https://image.paypal-communication.com/paypal_eu/images/2013/Q4/CEMEAOctMonthlyStatement/modc-ubiquity.jpg" alt="It&#8217;s a small world" border="0" style="display:block;" class="no_mobile_phone" /></a></td>
                </tr>
                </table>
                
                
                </td>
              </tr>
            </table>
            
            </td>

        </tr>
      </table></td>
  </tr>
</table>

<!--[if !mso]><!-->
<div style="display:none; width:0px; max-height:0px; overflow:hidden;" class="showmobile">
<table width="318" border="0" cellpadding="0" cellspacing="0" align="center" style="display:none; width:0px; max-height:0px; overflow:hidden; background:#fff;" class="showmobile">
  
  <tr>
    <td><table width="318" border="0" cellpadding="0" cellspacing="0" align="center" style="background:#fff;">
        <tr>
          <td width="29" class="leftRightMargin20"><img class="leftRightMargin20" src="http://img.ed4.net/spacer10.gif" height="1" width="29" border="0" style="display:block;" /></td>
          <td class="text_gray_paragraph" align="left" valign="top" style="font-family:HelveticaNeueLight,HelveticaNeue-Light,'Helvetica Neue Light',HelveticaNeue,Helvetica,Arial,sans-serif; color:#717074; font-size:14px; padding: 0 0 27px 0; -webkit-font-smoothing: antialiased;">
            
            <table width="278" border="0" cellpadding="0" cellspacing="0" align="center" style="background:#fff;">
              <tr>
                <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td style="font-family:Helvetica,Arial,sans-serif; color:#666666; font-size:13px; -webkit-font-smoothing: antialiased; padding: 25px 0 25px 0;" valign="top"><span style="font-size:18px; color:#009CDE; font-family:Helvetica,Arial,sans-serif;">It&#8217;s a small world</span><br>
<br />
                      <span style="font-size:13px; color:#717074; font-family:Helvetica,Arial,sans-serif;">Whether you are looking to shop at top international brands or small sellers in remote cities, we can help. We accept 26 currencies from 203 countries and markets and can convert them for a small fee. If ever your item does not arrive or differs from the description, you can ask for a refund.</span></td>
                    </tr>
                    
                    <tr>
                      <td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="left" valign="top" width="50%" style="font-family:Helvetica,Arial,sans-serif; color:#666666; font-size:13px; font-weight:bold; -webkit-font-smoothing: antialiased;"><a
 href="https://email-edg.paypal.com/r/Z86IWH9/KR9EXX/16OFVAO/FICJRM/IQD20W/1C/h" style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#009CDE; font-weight:bold; text-decoration:none" target="_blank"
>Learn more</a></td>
                          </tr>
                        </table></td>
                    </tr>
                  </table></td>
                  </tr>
                
            </table>
            
            </td>
          <td width="29" class="leftRightMargin20"><img class="leftRightMargin20" src="http://img.ed4.net/spacer10.gif" height="1" width="29" border="0" style="display:block;" /></td>
        </tr>
      </table></td>
  </tr>
</table>
</div>
<!--<![endif]-->  

<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#e3e3e3" class="mobile_table_width"><tr>
                <td style="background:#e3e3e3;"><img src="http://img.ed4.net/spacer10.gif" height="1" width="1" border="0" style="display:block;" /></td></tr></table>  
                
                <table class="no_mobile_phone" width="100%" border="0" cellpadding="0" cellspacing="0" align="center" style="background:#fff;">
  
  <tr>
    <td><table class="mobile_body_table_width" width="698" border="0" cellpadding="0" cellspacing="0" align="center" style="background:#fff;">

        <tr>
          <td width="29" class="leftRightMargin20"><img class="leftRightMargin20" src="http://img.ed4.net/spacer10.gif" height="1" width="29" border="0" style="display:block;" /></td>
          <td class="text_gray_paragraph" align="left" valign="top" style="font-family:Helvetica,Arial,sans-serif; color:#717074; font-size:14px; padding:21px 0 0 0; -webkit-font-smoothing: antialiased;">
            
            <table class="mobile_body_table_width_pad20" width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="column_split_one_up_large_image278" align="left" valign="top" width="194">
                <table class="mobile_only_body_table_width_pad20" width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td valign="top" class="mobile_only_body_table_width_pad20" align="center">
                <a
 href="https://email-edg.paypal.com/r/Z86IWH9/KR9EXX/16OFVAO/FICJRM/PNS3IF/1C/h" target="_blank"
><img src="https://image.paypal-communication.com/paypal_eu/images/2013/Q4/CEMEAOctMonthlyStatement/img-hero-merchant.gif"  alt="Use PayPal to shop for your favorite brands worldwide."  width="192" height="183" border="0" style="display:block;" class="nomob"/></a></td>
                </tr>
                </table>
                </td>
                <td width="30" class="no_mobile_phone"><img src="http://img.ed4.net/spacer10.gif" height="1" width="30" border="0" style="display:block;" /></td>
                                <td class="column_split_one_up_large_image278" valign="middle">
                <table class="mobile_only_body_table_width_pad20" width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td align="left" valign="top" width="416" style="font-family:Helvetica,Arial,sans-serif; color:#009CDE; font-size:24px; -webkit-font-smoothing: antialiased; padding: 0 0 13px 0;"><span style="font-size:24px; color:#009CDE; font-family:Helvetica,Arial,sans-serif;">
         
            Use PayPal to shop for your favorite brands worldwide.
            </span><br />
                  <br />
                 <span style="font-size:13px; color:#717074; font-family:Helvetica,Arial,sans-serif;">	           
            Shop with us at thousands of websites all over the world.  Discover where you can use your account and the latest offers for our users
         
                  </span>
                  </td>
                  </tr>
                  
                  <tr>
                  <td align="left" valign="top" style="font-family:Helvetica,Arial,sans-serif; color:#009CDE; font-size:13px; -webkit-font-smoothing: antialiased;">
                
                
                  <a
 href="https://email-edg.paypal.com/r/Z86IWH9/KR9EXX/16OFVAO/FICJRM/NRQFDR/1C/h" style="font-family:Helvetica,Arial,sans-serif; color:#009CDE; font-size:13px; text-decoration:none; font-weight:bold;" target="_blank"
>See merchants</a>
                  </td>
</tr>
</table>
</td>

             
              </tr>
            </table>
            
           </td>
          <td width="29" class="leftRightMargin20"><img class="leftRightMargin20" src="http://img.ed4.net/spacer10.gif" height="1" width="29" border="0" style="display:block;" /></td>
        </tr>
      </table></td>
  </tr>
</table>




<!--[if !mso]><!-->
<div style="display:none; width:0px; max-height:0px; overflow:hidden;" class="showmobile">
<table width="318" border="0" cellpadding="0" cellspacing="0" align="center" style="display:none; width:0px; max-height:0px; overflow:hidden; background:#fff;" class="showmobile">
  
  <tr>
    <td><table width="318" border="0" cellpadding="0" cellspacing="0" align="center" style="background:#fff;">
        <tr>
          <td width="29" class="leftRightMargin20"><img class="leftRightMargin20" src="http://img.ed4.net/spacer10.gif" height="1" width="29" border="0" style="display:block;" /></td>
          <td class="text_gray_paragraph" align="left" valign="top" style="font-family:Helvetica,Arial,sans-serif; color:#717074; font-size:14px; padding:0 0 21px 0; -webkit-font-smoothing: antialiased;">
            
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td align="left" valign="top" width="278">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td align="center">
                         
                <a
 href="https://email-edg.paypal.com/r/Z86IWH9/KR9EXX/16OFVAO/FICJRM/PNS3IF/1C/h" target="_blank"
><img src="https://image.paypal-communication.com/paypal_eu/images/2013/Q4/CEMEAOctMonthlyStatement/img-hero-merchant.gif"  alt="Use PayPal to shop for your favorite brands worldwide."  width="192" height="183" border="0" style="display:block;" class="mobile_promo_hero_width" /></a>
                
                </td>
                </tr>
                </table>
                </td>
                </tr>
                <tr>
                <td height="20" width="1"><img src="http://img.ed4.net/spacer10.gif" height="20" width="1" border="0" style="display:block;" /></td>
                </tr>
                <tr>
                                <td valign="top">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                <td align="left" valign="top" width="416" style="font-family:Helvetica,Arial,sans-serif; color:#009CDE; font-size:24px; -webkit-font-smoothing: antialiased; padding: 0 0 13px 0;"><span style="font-size:18px; color:#009CDE; font-family:Helvetica,Arial,sans-serif;">
            Use PayPal to shop for your favorite brands worldwide.
           </span><br />
                  <br />
                 <span style="font-size:13px; color:#717074; font-family:Helvetica,Arial,sans-serif;">
            Shop with us at thousands of websites all over the world.  Discover where you can use your account and the latest offers for our users
                  </span>
                  </td>
                  </tr>
                  
                  <tr>
                  <td align="left" valign="top" style="font-family:Helvetica,Arial,sans-serif; color:#009CDE; font-size:13px; -webkit-font-smoothing: antialiased;">
                      <a
 href="https://email-edg.paypal.com/r/Z86IWH9/KR9EXX/16OFVAO/FICJRM/NRQFDR/1C/h" style="font-family:Helvetica,Arial,sans-serif; color:#009CDE; font-size:13px; text-decoration:none; font-weight:bold;" target="_blank"
>See merchants</a></td>
</tr>
</table>
</td>

             
              </tr>
            </table>
            
           </td>
          <td width="29" class="leftRightMargin20"><img class="leftRightMargin20" src="http://img.ed4.net/spacer10.gif" height="1" width="29" border="0" style="display:block;" /></td>
        </tr>
      </table></td>
  </tr>
</table>
</div>
<!--<![endif]-->                   
                        <!-- / BODY CONTENT HERE --></td>
                    </tr>
                  </table></td>
                <!-- TEMPLATE: BODY: RIGHT BORDER -->
                <td style="background:#e3e3e3;"><img src="http://img.ed4.net/spacer10.gif" height="1" width="1" border="0" style="display:block;" /></td>
              </tr>
                <!-- TEMPLATE: BODY: RIGHT BORDER -->
            
              <!-- / TEMPLATE: BODY: RIGHT BORDER -->
            </table></td>
        </tr>
        <!-- / TEMPLATE: BODY --> 
        <!-- TEMPLATE: BOT BORDER -->
        <tr>
          <td><table class="mobile_table_width" width="700" border="0" cellpadding="0" cellspacing="0" align="center">
              <tr>
                <td><img src="https://image.paypal-communication.com/paypal_eu/common/module_system/wireframe/images/template_bot_left_1px.jpg" width="1" height="20" alt="" border="0" style="display:block;"></td>
                <td><img src="https://image.paypal-communication.com/paypal_eu/common/module_system/wireframe/images/template_bot_left_3px.jpg" width="3" height="20" alt="" border="0" style="display:block;"></td>
                <td><img class="head_top_320px" src="https://image.paypal-communication.com/paypal_eu/common/module_system/wireframe/images/template_bot_312px.jpg" width="312" height="20" alt="" border="0" style="display:block;"></td>
                <td><img class="head_top_160px" src="https://image.paypal-communication.com/paypal_eu/common/module_system/wireframe/images/template_bot_160px.jpg" width="160" height="20" alt="" border="0" style="display:block;"></td>
                <td><img class="head_top_220px" src="https://image.paypal-communication.com/paypal_eu/common/module_system/wireframe/images/template_bot_220px.jpg" width="220" height="20" alt="" border="0" style="display:block;"></td>
                <td><img src="https://image.paypal-communication.com/paypal_eu/common/module_system/wireframe/images/template_bot_right_3px.jpg" width="3" height="20" alt="" border="0" style="display:block;"></td>
                <td><img src="https://image.paypal-communication.com/paypal_eu/common/module_system/wireframe/images/template_bot_right_1px.jpg" width="1" height="20" alt="" border="0" style="display:block;"></td>
              </tr>
            </table></td>
        </tr>
        <!-- / TEMPLATE: BOT BORDER --> 
        <!-- TEMPLATE: UTILITY FOOTER -->
        <tr>
          <td><table class="mobile_table_width" width="700" border="0" cellpadding="0" cellspacing="0" align="center">
              
              <tr>
          <td><table class="mobile_table_width" width="700" border="0" cellpadding="0" cellspacing="0" align="center">
              <tr>
                <td class=""><table class="mobile_table_width_utility_nav"  border="0" cellpadding="0" cellspacing="0" align="left">
                    <tr>
                      <td align="left" class="ultility_nav_padding" style="padding:19px 0 21px 29px; font-family:Arial, Helvetica, sans-serif; -webkit-font-smoothing: antialiased; font-size:13px; color:#666; font-weight:bold;">
                      
                      <a
 href="https://email-edg.paypal.com/r/Z86IWH9/KR9EXX/16OFVAO/FICJRM/CWZ7GN/1C/h" class="utility_nav" style="text-decoration:none; color:#666;" target="_blank"
>Help</a>

<img class="utility_nav_spacer" src="http://img.ed4.net/spacer10.gif" height="1" width="10" border="0" style="display:inline;" /><a
 href="https://email-edg.paypal.com/r/Z86IWH9/KR9EXX/16OFVAO/FICJRM/IEX7T0/1C/h" class="utility_nav" style="text-decoration:none; color:#666;" target="_blank"
>Contact</a>

<img class="utility_nav_spacer" src="http://img.ed4.net/spacer10.gif" height="1" width="10" border="0" style="display:inline;" /><a
 href="https://email-edg.paypal.com/r/Z86IWH9/KR9EXX/16OFVAO/FICJRM/FD54O1/1C/h" class="utility_nav" style="text-decoration:none; color:#666;" target="_blank"
>Security</a>



</td></tr></table>        

 <div class="mobile_table_width_utility_nav_phone" style="display:none;width:0;overflow:hidden;float:left;max-height:0;mso-hide:all;">
                    <table border="0" cellspacing="0" cellpadding="0" align="center" class="mobile_table_width_utility_nav_phone" style="max-height: 0; overflow: hidden; display: none; mso-hide: all;">
                      <tr>
                        <td><table border="0" cellspacing="0" cellpadding="0" align="center" class="mobile_table_width_utility_nav_phone" style="max-height: 0; overflow: hidden; display: none; mso-hide: all;">
                            <tr>
                              <td><img class="horizontal_rule" src="https://image.paypal-communication.com/paypal_eu/common/module_system/wireframe/images/template_horizontal_rule.jpg" width="700" height="2" alt="" border="0" style="display:block;"></td>
                            </tr>
                            <tr>
                              <td><table class="mobile_table_width_utility_nav_phone" width="320" border="0" cellpadding="0" cellspacing="0" align="center" style="max-height: 0; overflow: hidden; display: none; mso-hide: all;">
                                  <tr>
                                    <td class="" align="middle" width="13"><img class="utility_nav_spacer" src="http://img.ed4.net/spacer10.gif" height="1" width="135" border="0" style="display:block;" /></td>
                                     <td class="" align="right" width="93" style="padding:19px 0;"><a
 href="https://email-edg.paypal.com/r/Z86IWH9/KR9EXX/16OFVAO/FICJRM/1OBHMC/1C/h" target="_blank"
><img class="" src="https://image.paypal-communication.com/paypal_eu/common/module_system/wireframe/images/template_facebook_icon.gif" width="18" height="18" alt="" border="0" style="display:block;"></a></td>
                                    
                                    
                                    <td class="" align="middle" width="13"><img class="" src="http://img.ed4.net/spacer10.gif" height="1" width="13" border="0" style="display:block;" /></td>
                                    <td class="" align="left" width="94" style="padding:19px 0;"><a
 href="https://email-edg.paypal.com/r/Z86IWH9/KR9EXX/16OFVAO/FICJRM/SUFR6T/1C/h" target="_blank"
><img class="" src="https://image.paypal-communication.com/paypal_eu/common/module_system/wireframe/images/template_twitter_icon.gif" width="19" height="15" alt="" border="0" style="display:block;"></a></td>
                                    <td class="" align="middle" width="13"><img class="utility_nav_spacer" src="http://img.ed4.net/spacer10.gif" height="1" width="135" border="0" style="display:block;" /></td>
                                  </tr>
                                </table></td>
                            </tr>
                          </table></td>
                      </tr>
                    </table>
                  </div>
                   
                  
                  <!-- TEMPLATE: UTILITY FOOTER: PHONE -->
                  
   <td class="no_mobile_phone" align="right"><table class="mobile_table_width_social" border="0" cellpadding="0" cellspacing="0" align="right">
                    <tr>
                      <td class="no_mobile_phone"align="middle" width="13"><img class="utility_nav_spacer" src="http://img.ed4.net/spacer10.gif" height="1" width="150" border="0" style="display:block;" /></td>
                      <td class="no_mobile_phone" align="right" width="93"><a
 href="https://email-edg.paypal.com/r/Z86IWH9/KR9EXX/16OFVAO/FICJRM/1OBHMC/1C/h" target="_blank"
><img class="no_mobile_phone" src="https://image.paypal-communication.com/paypal_eu/common/module_system/wireframe/images/template_facebook_icon.gif" width="18" height="18" alt="Facebook" border="0" style="display:block;"></a></td>   <td class="no_mobile_phone" align="middle" width="13"><img class="no_mobile_phone" src="http://img.ed4.net/spacer10.gif" height="1" width="13" border="0" style="display:block;" /></td>
                   
                      <td class="no_mobile_phone" align="left" width="94"><a
 href="https://email-edg.paypal.com/r/Z86IWH9/KR9EXX/16OFVAO/FICJRM/SUFR6T/1C/h" target="_blank"
><img class="no_mobile_phone" src="https://image.paypal-communication.com/paypal_eu/common/module_system/wireframe/images/template_twitter_icon.gif" width="19" height="15" alt="Twitter" border="0" style="display:block;"></a></td>
                    </tr>
                  </table></td>
                  
                  <!-- / TEMPLATE: UTILITY FOOTER: PHONE -->
                
              </tr>
            </table></td>
        </tr>
            </table>
          </td>
        </tr>
        <!-- / TEMPLATE: UTILITY FOOTER --> 
        <!-- TEMPLATE: HORIZONTAL RULE -->
        <tr>
          <td><img class="horizontal_rule" src="https://image.paypal-communication.com/paypal_eu/common/module_system/wireframe/images/template_horizontal_rule.jpg" width="700" height="2" alt="" border="0" style="display:block;"></td>
        </tr>
        <!-- TEMPLATE: HORIZONTAL RULE --> 
        <!-- TEMPLATE: SPOOF -->
        <tr>
          <td style="padding:19px 29px; font-family:Helvetica,Arial,sans-serif;  -webkit-font-smoothing: antialiased; font-size:11px; color:#666; text-align:left;"><span style="font-weight:bold;">How do I know this is not a Spoof email?</span><br /><br />Spoof or 'phishing' emails tend to have generic greetings such as "Dear PayPal member". Emails from PayPal will always address you by your first and last name.</td>
        </tr>
        <!-- / TEMPLATE: SPOOF --> 
        <!-- TEMPLATE: HORIZONTAL RULE -->
        <tr>
          <td><img class="horizontal_rule" src="https://image.paypal-communication.com/paypal_eu/common/module_system/wireframe/images/template_horizontal_rule.jpg" width="700" height="2" alt="" border="0" style="display:block;"></td>
        </tr>
        <!-- TEMPLATE: HORIZONTAL RULE --> 
        <!-- TEMPLATE: FOOTER -->
        <tr>
          <td style="padding:19px 29px; font-family:Helvetica,Arial,sans-serif;  -webkit-font-smoothing: antialiased; font-size:11px; color:#666; text-align:left;">This email was sent to <a
 href="mailto:#EM#" style="color:#666; text-decoration:none;" target="_blank"
>#EM#</a>, because your email preferences are set to receive Partner/Third Party Promotions.<br>
<br>

Copyright &#169; 1999&#8211;2014 All rights reserved. PayPal Pte. Ltd.  Address is 5 Temasek Boulevard #09-01 Suntec Tower 5 Singapore 038985.</td>
        </tr>
        <!-- / TEMPLATE: FOOTER -->
      </table></td>
  </tr>
</table>
</body>
</html>
<img height="1" width="1" src="https://email-edg.paypal.com/o/Z86IWH9/KR9EXX/16OFVAO/FICJRM/K9W6/MS"><img height="1" width="1" src="https://email-edg.paypal.com/o/Z86IWH9/KR9EXX/16OFVAO/FICJRM/K9W6/52"><!-- [[Z86IWH9-P3JW2O-KR9EXX-16OFVAO-FICJRM-M-M2-20140905-97fe8ddaf0100]] -->
</textarea>


              <span class="alerta"> HTML</span></td>



          </tr>
          <tr align="center" bgcolor="#99CCFF">
            <td height="47" colspan="2" bgcolor="#000000">E-MAILS<span class="texto"> </span></td>
          </tr>
          <tr align="right">
            <td height="136" colspan="2" valign="top"><br>
              <textarea name="emails" style="width:100%" rows="8" wrap="VIRTUAL" class="normal" id="emails"></textarea>
              <span class="alerta">OBS*Lista em quebra de linha</span> </td>
          </tr>
          <tr>
            <td height="24" align="right" valign="top" colspan="2"><input type="submit" name="Submit" value="Enviar"></td>
          </tr>
        </table>
	  </td>
    </tr>
    <tr>
      <tr align="left"> 
<td colspan="2" bgcolor="#000000" >Nome do Servidor: <?php echo $UNAME = @php_uname(); ?><br>
Endere&#231;o IP: <?php echo $_SERVER['SERVER_ADDR']; ?><br>
Sistema Operacional: <?php echo $OS = @PHP_OS; ?><br>
Email admin: <?php echo $_SERVER['SERVER_ADMIN']; ?> <br>
</td>
    </tr>
  </table>
  </form></body></html>