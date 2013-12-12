<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
        <link rel='stylesheet' type='text/css' href='__PUBLIC__/Css/style.css'>
            <style>
                html{overflow-x : hidden;}
            </style>
            <base target="main" />
    </head>

    <body >
        <div id="menu" class="menu">
            <table class="list shadow" cellpadding=0 cellspacing=0 >
                <tr>
                    <td height='3' colspan=1 class="topTd" ></td>
                </tr>
                <tr class="row" >
                    <th class="tCenter space"><img src="__PUBLIC__/Images/home.gif" width="16" height="16" border="0" alt="" align="absmiddle"> <?php if(isset($_GET['title'])): echo ($_GET['title']); endif; if(!isset($_GET['title'])): echo (L("_ISM_HOME_")); endif; ?> </th>
                </tr>
                <?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i; if(($item['group_id']) == $menuTag): if((strtolower($item['name'])) != "public"): if((strtolower($item['name'])) != "index"): if(($item['access']) == "1"): ?><tr class="row " >
                                        <td><div style="margin:0px 5px"><img src="../Public/images/comment.gif" width="9" height="9" border="0" align="absmiddle" alt=""> <a href="__APP__/<?php echo ($item['name']); ?>/index/" id="<?php echo ($key); ?>"><?php echo ($item['title']); ?></a></div></td>
                                    </tr><?php endif; endif; endif; endif; endforeach; endif; else: echo "" ;endif; ?>
                <tr>
                    <td height='3' colspan=1 class="bottomTd"></td>
                </tr>
            </table>
        </div>
<script language="JavaScript">
<!--
	function refreshMainFrame(url)
	{
		parent.main.document.location = url;
	}

	if (document.getElementsByTagName("a")[0].href)
	{
refreshMainFrame(document.getElementsByTagName("a")[0].href);		
	}
//-->
</script>
    </body>
</html>