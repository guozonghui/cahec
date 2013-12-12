<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo (L("_VRL_")); ?>: <?php echo (L("_ISM_")); ?></title>
<link rel='stylesheet' type='text/css' href='__PUBLIC__/Css/style.css'>
<base target="main" />
</head>
<body>
<!-- 头部区域 -->
<div id="header" class="header">
  <div class="headTitle" style="margin:0pt 5pt 0pt 7pt"><?php echo (L("_VRL_")); ?><br /><font size="2"><?php echo (L("_ISM_")); ?></font> </div>
	<!-- 功能导航区 -->
	<div class="topmenu">
<ul>
<li><span><a href="#" onClick="sethighlight(0); parent.menu.location='__URL__/menu/title/<?php echo (L("_ISM_HOME_")); ?>';parent.main.location='__URL__/main/';return false;"><?php echo (L("_ISM_HOME_")); ?></a></span></li>
<?php if(is_array($nodeGroupList)): $i = 0; $__LIST__ = $nodeGroupList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tag): $mod = ($i % 2 );++$i;?><li><span><a href="#" onClick="sethighlight(<?php echo ($i); ?>); parent.menu.location='__URL__/menu/tag/<?php echo ($key); ?>/title/<?php echo ($tag); ?>';return false;"><?php echo ($tag); ?></a></span></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</div>
	<div class="nav">
	<?php echo (L("_TOP_WELCOME_")); ?> <?php echo (session('loginUserName')); ?>
	<a href="__URL__/password/"><img src="__PUBLIC__/Images/checked_out.png" width="16" height="16" border="0" alt="" align="absmiddle"> <?php echo (L("_CHANGE_PASSWORD_")); ?></a> <a href="__URL__/profile/"><img SRC="__PUBLIC__/Images/write.gif" WIDTH="17" HEIGHT="16" BORDER="0" ALT="" align="absmiddle"> <?php echo (L("_CHANGE_PROFILE_")); ?></a> <a href="__URL__/logout/" target="_top"><img SRC="__PUBLIC__/Images/error.gif" WIDTH="20" HEIGHT="20" BORDER="0" ALT="" align="absmiddle"> <?php echo (L("_SIGN_OUT_")); ?></a></div>
</div>
<script>
function sethighlight(n) {
	var lis = document.getElementsByTagName('span');
	for(var i = 0; i < lis.length; i++) {
		lis[i].className = '';
	}
	lis[n].className = 'current';
}
sethighlight(0);
</script>
</body>
</html>