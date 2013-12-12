<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo (L("_VRL_")); ?>: <?php echo (L("_ISM_")); ?></title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/blue.css" />
<script type="text/javascript" src="__PUBLIC__/Js/Base.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/prototype.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/mootools.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/Think/ThinkAjax.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/Form/CheckForm.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/common.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/jquery-1.3.2.min.js"></script>
<script language="JavaScript">
<!--
//指定当前组模块URL地址 
var URL = '__URL__';
var APP	 =	 '__APP__';
var PUBLIC = '__PUBLIC__';
//-->
</script>
</head>

<body>
<div class="main">
<div class="content">
<table id="checkList" class="list" cellpadding=0 cellspacing=0 >
<tr><td height="3" colspan="2" class="topTd" ></td></tr>
<tr class="row" ><th colspan="2" class="space"><?php echo (L("_SYSTEM_INFO_")); ?></th></tr>
<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr class="row" onmouseover="over()" onmouseout="out()" onclick="change()"><td width="15%"><?php echo ($key); ?></td><td><?php echo ($v); ?></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
<tr><td height="3" colspan="2" class="bottomTd"></td></tr>
</table>
</div>
</div>
<!-- 主页面结束 -->