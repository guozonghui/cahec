<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo (L("_VRL_")); ?>: <?php echo (L("_ISM_")); ?></title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/style.css" />
<script type="text/javascript" src="__PUBLIC__/Js/Base.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/prototype.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/mootools.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/Think/ThinkAjax.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/common.js"></script>
 <script language="JavaScript">
<!--
var PUBLIC	 =	 '__PUBLIC__';
function keydown(e){
	var e = e || event;
	if (e.keyCode==13)
	{
	ThinkAjax.sendForm('form1','__URL__/checkLogin/',loginHandle,'result');
	}
}
function fleshVerify(){ 
	//重载验证码
	var timenow = new Date().getTime();
	$('verifyImg').src= '__URL__/verify/'+timenow;
}
//-->
</script>
</head>
<body onLoad="document.login.account.focus()" >
<form method='post' name="login" id="form1" action="__URL__/checkLogin">
<div class="tCenter hMargin">
<table id="checkList" class="login shadow" cellpadding=0 cellspacing=0 >
<tr><td height="3" colspan="2" class="topTd" ></td></tr>
<tr class="row" ><th colspan="2" class="tCenter space" ><img src="__PUBLIC__/Images/preview_f2.png" width="16" height="16" border="0" alt="" align="absmiddle"> <?php echo (L("_VRL_")); ?>: <?php echo (L("_ISM_")); ?></th></tr>
<tr><td height="3" colspan="2" class="topTd" ></td></tr>
<tr class="row" ><td class="tRight" width="25%"><?php echo (L("_ACCOUNT_")); ?></td><td><input type="text" class="medium bLeftRequire" check="Require" warning="<?php echo (L("_ACCOUNT_INPUT_")); ?>" name="account"></td></tr>
<tr class="row" ><td class="tRight"><?php echo (L("_PASSWORD_")); ?></td><td><input type="password" class="medium bLeftRequire" check="Require" warning="<?php echo (L("_PASSWORD_INPUT_")); ?>" name="password"></td></tr>
<tr class="row" ><td class="tRight"><?php echo (L("_VERIFICATION_")); ?></td><td><input type="text" onKeyDown="keydown(event)" class="small bLeftRequire" check="Require" warning="<?php echo (L("_VERIFICATION_INPUT_")); ?>" name="verify"> <img id="verifyImg" src="__URL__/verify/" onClick="fleshVerify()" border="0" alt="<?php echo (L("_VERIFICATION_CLICK_REFRESH_")); ?>" style="cursor:pointer" align="absmiddle"></td></tr>
<tr class="row" ><td class="tCenter" align="justify" colspan="2">
<input type="submit" value="<?php echo (L("_SIGN_IN_")); ?>" class="submit medium hMargin">
</td></tr>
<tr><td height="3" colspan="2" class="bottomTd" ></td></tr>
</table>
<div class="result">测试账号(用户名/密码) 管理：manage/manage  检索：search/search  演示：demo/demo</div>
</div>
</form>
</body>
</html>