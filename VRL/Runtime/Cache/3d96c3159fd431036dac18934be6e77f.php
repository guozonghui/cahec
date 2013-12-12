<?php if (!defined('THINK_PATH')) exit();?><!--  "<!--gzh " 是郭宗辉注释掉的内容，将其替换掉即可-->





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
<!--<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/NCBI/select2.css" />
<script type="text/javascript" src="__PUBLIC__/Js/NCBI/notify.1.js"></script>-->
<!--gzh <script type="text/javascript" src="__PUBLIC__/Js/NCBI/select_query.js"></script> -->
<script type="text/javascript" src="__PUBLIC__/Js/seach.js"></script>
<!-- 菜单区域  -->
<!--<script src="__PUBLIC__/Js/jquery-1.3.2.js" type="text/javascript"></script>-->
<script src="__PUBLIC__/Js/jquery.bgiframe.min.js" type="text/javascript"></script>
<script src="__PUBLIC__/Js/jquery.multiSelect.js" type="text/javascript"></script>
<link type="text/css" href="__PUBLIC__/Js/jdpicker_1.1/jdpicker.css" rel="stylesheet" />
<link href="__PUBLIC__/Css/jquery.multiSelect.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/Js/jdpicker_1.1/jquery.jdpicker.js"></script>
<!-- 主页面开始 -->
<div id="main" class="main" >
<!-- 主体内容  -->
<div class="content" >
<div class="title"><?php echo (L("_VRL_QUERY_")); ?></div>
<!-- form  -->
<script type="text/javascript">
 var URL = __URL__;
</script>

<form id="form" method=post action="__URL__/result">
<fieldset class="nolegend" id="viruses">
<legend>Define search set:</legend>
<table>
    <tr>
    	<th><strong>Family</strong></th>
    </tr>
    <tr>
    	<td>
        	<select name="family" id="family">
    			<?php if(is_array($family)): $i = 0; $__LIST__ = $family;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["biodatabase_id"]); ?>" <?php if(($i) == "1"): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
   		 	</select>
       </td>
    </tr>
</table>
<!--<fieldset class="nolegend formline" id="selects">
	<table>
    <tr>
    	<th width="1px"><strong>Family</strong></th>
        <th><strong>SubFamily</strong></th>
        <th width="10px"><strong>Genus</strong></th>
        <th><strong>Species</strong></th>
        <th><strong>Virus name</strong></th>
        <th><strong>Gene</strong></th>
    </tr>
    <tr>
    	<td>
            <select size="4" name="family" id="family">
                <?php if(is_array($family)): $i = 0; $__LIST__ = $family;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["biodatabase_id"]); ?>" <?php if(($i) == "1"): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
              
            </select>
        </td>
        <td>
        	<select size="4" name="subfamily" id="subfamily" multiple="multiple" class="query_change">
				<option value="0" selected>any</option>
			</select>
    	</td>
        <td>
        	<select size="4" name="genus" id="genus" multiple="multiple" class="query_change">
				<option value="0" selected>any</option>
			</select>
    	</td>
        <td>
        	<select size="4" name="species" id="species" multiple="multiple" class="query_change">
				<option value="0" selected>any</option>
			</select>
    	</td>
        <td>
        	<select size="4" name="virus_name" id="virus_name" multiple="multiple" class="query_change">
				<option value="0" selected>any</option>
			</select>
    	</td>
        <td>
            <select size="4" name="gene" id="gene" multiple="multiple" class="query_change">
                <option value="0" >any</option>
            </select>
        </td>
    </tr>
</table>
<table>
    <tr>
        <th><strong>Host</strong></th>
        <th><strong>Continent</strong></th>
        <th><strong>County</strong></th>
    </tr>
    <tr>
    	<td>
        	<select size="4" name="host" id="host" multiple="multiple" class="query_change">
				<option value="0" selected>any</option>
			</select>
    	</td>
        <td>
        	<select id="continent" size="4">
            	<option value="0" selected>any</option>
                <option value="1">Africa</option>
                <option value="2">Asia</option>
                <option value="7">Europe</option>
                <option value="3">North America</option>
                <option value="5">Oceania</option>
                <option value="4">South America</option>
                <option value="6">Central America and the Antilles</option>
			</select>
        </td>
    	<td>
            <select size="4" name="country" id="country" style="width:100px" multiple="multiple">
            	<option value="0" selected>any</option>             
            </select>
        </td>
	</tr>
</table>
<table>
	<tr>
	<th><strong>TypeA</strong></th>
        <th><strong>TypeB</strong></th>
        <th><strong>SubType</strong></th>
        <th><strong>SubsubType</strong></th>
        <th><strong>SubsubsubType</strong></th>
    </tr>
	<tr>
        <td>
        	<select size="4" name="typeA" id="typeA" class="query_change">
                <option value="0" selected>any</option>
            </select>
        </td>
        <td>
        	<select size="4" name="typeB" id="typeB" class="query_change">
                <option value="0" selected>any</option>
            </select>
        </td>
        <td>
            <select size="4" name="subtype" id="subtype" class="query_change">
                <option value="0" selected>any</option>
        	</select>
        </td>
        <td>
        	<select size="4" name="subsubtype" id="subsubtype" class="query_change">
                <option value="0" selected>any</option>
            </select>
        </td>
        <td>
        	<select size="4" name="subsubsubtype" id="subsubsubtype" class="query_change">
                <option value="0" selected>any</option>
            </select>
        </td>
    </tr>
    </table>
</fieldset>-->
</fieldset>
<div id="block0">
<!-- Collection date -->
 <fieldset class="nolegend" id="cdate-from-to">
<table class="fields">
<thead>
<tr>
	<th></th>
	<th colspan="3"><span>Collection date</span></th>
</tr>
</thead>
<tbody>
<tr>
	<th><label for="fyear">From:</label></th>
    <td><input type="text" name="from" id="from" value="" readonly></td>
</tr>
<tr>
	<th><label for="tyear">To:</label></th>
	<td><input type="text" name="to" id="to" value="" readonly></td>
</tr>
</tbody>
</table>
</fieldset>
<!-- Sequence length -->
 <fieldset class="nolegend" id="length-min-max">
<table class="fields">
<thead><tr><th colspan="2"><label for="flen"><strong>Sequence length</strong></label></th></tr></thead>
<tbody>
<tr>
	<th><label for="flen">Min.:</label></th>
	<td><input type="text" name="flen" id="flen" size="6" maxlength="6" value=""></td>
</tr>
<tr>
	<th><label for="tlen">Max.:</label></th>
	<td><input type="text" name="tlen" id="tlen" size="6" maxlength="6" value=""></td>
</tr>
</tbody>
</table>
 </fieldset>
</div>
<input type="hidden" id="post_data" name="post_data"/>
<div class="buttons">
	<span class="action" style="float:left">
    	<input type="button" name="cmd_qb" value="Add query">
    </span>
    <span class="default combined" id="cmd_get_query_group" style="float:left">
        <input type="button" id="show_result_button" value="Show results">
    </span>
</div>
<span class="cancel" style="float:right">
	<input type="reset" id="clear_form" value="Clear form">
</span>
<!--gzh <form method=post action="__URL__/result">
<fieldset class="nolegend" id="viruses">
<legend>Define search set:</legend>
<fieldset class="nolegend formline" id="selects">

<select id="shengfen" name="shengfen">
	<?php if(is_array($shengfen)): $i = 0; $__LIST__ = $shengfen;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
</select>


<!-- Family -->
<!--gzh <span class="field" id="field_family"><label>
	<span><strong>Family</strong></span>
	<select size="4" name="family" onclick="this.focus()" onblur="fixSelectFocus(this)" multiple onchange="oNotifier.Notify(this, 'multiselect_change')">
		<option value="any" selected>any</option>
		<?php if(is_array($family)): $i = 0; $__LIST__ = $family;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["name"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	</select>
</label></span>
<!-- Gene -->
<!--gzh <span class="field" id="field_gene"><label>
	<span><strong>Gene</strong></span>
	<select size="4" name="gene" onclick="this.focus()" onblur="fixSelectFocus(this)" multiple onchange="oNotifier.Notify(this, 'multiselect_change')">
		<option value="any" selected>any</option>
		<optgroup label="Genome">
		<option value="Segment A">Segment A</option>
		<option value="Segment B">Segment B</option>
		</optgroup>
		<optgroup label="Segment A">
		<option value="Ployprotein">Ployprotein</option>
		<option value="Others">Others</option>
		</optgroup>
		<optgroup label="Segment B">
		<option value="VP1">VP1</option>
		<option value="Others">Others</option>
		</optgroup>
		<optgroup label="Ployprotein">
		<option value="VP2">VP2</option>
		<option value="VP3">VP3</option>
		<option value="VP4">VP4</option>
		<option value="VP4">Others</option>
		</optgroup>
	</select>
</label></span>
<!-- Host -->
<!--gzh <span class="field" id="field_host"><label>
	<span><strong>Host</strong></span>
	<select size="4" name="host" onclick="this.focus()" onblur="fixSelectFocus(this)" multiple onchange="oNotifier.Notify(this, 'multiselect_change')">
		<option value="any" selected>any</option>
		<?php if(is_array($host)): $i = 0; $__LIST__ = $host;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["vrl_host"]); ?>"><?php echo ($vo["vrl_host"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
	</select>
</label></span>
<!-- County -->
<!--gzh <span class="field" id="field_country"><label>
	<span><strong>Country</strong></span>
	<select size="4" name="country" onclick="this.focus()" onblur="fixSelectFocus(this)" multiple onchange="oNotifier.Notify(this, 'multiselect_change')">
		<option value="any" selected>any</option>
		<?php if(is_array($country)): $i = 0; $__LIST__ = $country;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["isolation_country"]); ?>"><?php echo ($vo["isolation_country"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        <!-- 
		<optgroup label="regions">
			<option value="N">Northern temperate</option>
			<option value="S">Southern temperate</option>
			<option value="T">Tropical</option>
		</optgroup>
		<optgroup label="continents">
			<option value="1">Africa</option>
			<option value="2">Asia</option>
			<option value="0">Europe</option>
			<option value="3">North America</option>
			<option value="5">Oceania</option>
			<option value="4">South America</option>
		</optgroup>
		<optgroup label="countries">
			<option value="Afghanistan">Afghanistan</option>
			<option value="Albania">Albania</option>
		</optgroup>
        -->
<!--gzh	</select>
</label></span>
<!-- Protein -->
<!--
<script type="text/javascript">segment={p:{any:[{v:"PB2",t:"PB2"},{v:"PB1",t:"PB1"},{v:"PB1-F2",t:"PB1-F2"},{v:"PA",t:"PA"},{v:"PA-X",t:"PA-X"},{v:"P3",t:"P3"},{v:"HA",t:"HA"},{v:"HE",t:"HE"},{v:"NP",t:"NP"},{v:"NA",t:"NA"},{v:"M1",t:"M1"},{v:"M2",t:"M2"},{v:"BM2",t:"BM2"},{v:"CM2",t:"CM2"},{v:"NS1",t:"NS1"},{v:"NS2",t:"NS2"}],a:[{v:"PB2",t:"PB2"},{v:"PB1",t:"PB1"},{v:"PB1-F2",t:"PB1-F2"},{v:"PA",t:"PA"},{v:"PA-X",t:"PA-X"},{v:"HA",t:"HA"},{v:"NP",t:"NP"},{v:"NA",t:"NA"},{v:"M1",t:"M1"},{v:"M2",t:"M2"},{v:"NS1",t:"NS1"},{v:"NS2",t:"NS2"}],b:[{v:"PB1",t:"PB1"},{v:"PB2",t:"PB2"},{v:"PA",t:"PA"},{v:"HA",t:"HA"},{v:"NP",t:"NP"},{v:"NA",t:"NA"},{v:"NB",t:"NB"},{v:"M1",t:"M1"},{v:"BM2",t:"BM2"},{v:"NS1",t:"NS1"},{v:"NS2",t:"NS2"}],c:[{v:"PB1",t:"PB1"},{v:"PB2",t:"PB2"},{v:"P3",t:"P3"},{v:"HE",t:"HE"},{v:"NP",t:"NP"},{v:"M1",t:"M1"},{v:"CM2",t:"CM2"},{v:"NS1",t:"NS1"},{v:"NS2",t:"NS2"}]}, n:{any:[{v:"1",t:"1 (PB1/PB2)"},{v:"2",t:"2 (PB2/PB1)"},{v:"3",t:"3 (PA/PA-X/P3)"},{v:"4",t:"4 (HA/HE)"},{v:"5",t:"5 (NP)"},{v:"6",t:"6 (NA/NP)"},{v:"7",t:"7 (MP/NS)"},{v:"8",t:"8 (NS)"}],a:[{v:"1",t:"1 (PB2)"},{v:"2",t:"2 (PB1)"},{v:"3",t:"3 (PA/PA-X)"},{v:"4",t:"4 (HA)"},{v:"5",t:"5 (NP)"},{v:"6",t:"6 (NA)"},{v:"7",t:"7 (MP)"},{v:"8",t:"8 (NS)"}],b:[{v:"1",t:"1 (PB1)"},{v:"2",t:"2 (PB2)"},{v:"3",t:"3 (PA)"},{v:"4",t:"4 (HA)"},{v:"5",t:"5 (NP)"},{v:"6",t:"6 (NA)"},{v:"7",t:"7 (MP)"},{v:"8",t:"8 (NS)"}],c:[{v:"1",t:"1 (PB2)"},{v:"2",t:"2 (PB1)"},{v:"3",t:"3 (P3)"},{v:"4",t:"4 (HE)"},{v:"5",t:"5 (NP)"},{v:"6",t:"6 (MP)"},{v:"7",t:"7 (NS)"}]}};</script>
<span class="field" id="field_protein"><label>
	<span><strong>Protein</strong></span>
	<select size="4" name="segment" onclick="this.focus()" onblur="fixSelectFocus(this)" multiple onchange="oNotifier.Notify(this, 'multiselect_change')">
		<option value="any">any</option>
		<option value="PB2" class="a">PB2</option>
		<option value="PB1" class="a">PB1</option>
		<option value="PB1-F2" class="a">PB1-F2</option>
		<option value="PA" class="a">PA</option>
		<option value="PA-X" class="a">PA-X</option>
		<option value="HA" class="a">HA</option>
		<option value="NP" class="a">NP</option>
		<option value="NA" class="a">NA</option>
		<option value="M1" class="a">M1</option>
		<option value="M2" class="a">M2</option>
		<option value="NS1" class="a">NS1</option>
		<option value="NS2" class="a">NS2</option>
	</select>
</label></span>
-->
<!-- Type -->
<!--gzh <span class="field" id="field_type"><label>
	<span><strong>Type</strong></span>
    <select size="4" name="type" onchange="VirusChanged(this, 'P')">
		<option value="any" selected>any</option>
    	<option value="a">A</option>
		<option value="b">B</option>
		<option value="c">C</option>
	</select>
</label></span>
<!-- Subtype -->
<!--
<span class="field" id="field_subtype"><strong>Subtype</strong> <br />
<label id="field_subtypeh"><strong>H</strong>
	<select size="4" name="subtype_h" onclick="this.focus()" onblur="fixSelectFocus(this)" multiple onchange="oNotifier.Notify(this, 'multiselect_change')">
		<option value="any" selected>any</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
	</select>
</label>
<label id="field_subtypen"><strong>N</strong>
	<select size="4" name="subtype_n" onclick="this.focus()" onblur="fixSelectFocus(this)" multiple onchange="oNotifier.Notify(this, 'multiselect_change')">
		<option value="any" selected>any</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
	</select>
</label>
</span>
-->
<!--gzh <span class="field" id="field_subtype"><label>
	<span><strong>Subtype</strong></span>
    <select size="4" name="subtype" onchange="VirusChanged(this, 'P')">
		<option value="any" selected>any</option>
    	<option value="a">A</option>
		<option value="b">B</option>
		<option value="c">C</option>
	</select>
</label></span>
<!-- Subsubtype -->
<!--gzh <span class="field" id="field_subsubtype"><label>
	<span><strong>Subsubtype</strong></span>
    <select size="4" name="subsubtype" onchange="VirusChanged(this, 'P')">
		<option value="any" selected>any</option>
    	<option value="a">A</option>
		<option value="b">B</option>
		<option value="c">C</option>
	</select>
</label></span>
<!-- Subsubsubtype -->
<!--gzh <span class="field" id="field_subsubsubtype"><label>
	<span><strong>Subsubsubtype</strong></span>
    <select size="4" name="subsubsubtype" onchange="VirusChanged(this, 'P')">
		<option value="any" selected>any</option>
    	<option value="a">A</option>
		<option value="b">B</option>
		<option value="c">C</option>
	</select>
</label></span>
</fieldset>

<div id="block0">
<!-- Collection date -->
<!--gzh <fieldset class="nolegend" id="cdate-from-to">
<table class="fields">
<thead>
<tr>
	<th></th>
	<th colspan="3"><span>Collection date</span></th>
</tr>
</thead>
<tbody>
<tr>
	<th><label for="fyear">From:</label></th>
    <td><input type="text" name="fyear" id="fyear" size="3" maxlength="4" value=""></td>
	<td><input type="text" name="fmonth" id="fmonth" size="1" maxlength="2" value=""></td>
    <td><input type="text" name="fday" id="fday" size="1" maxlength="2" value=""></td>
</tr>
<tr>
	<th><label for="tyear">To:</label></th>
	<td><input type="text" name="tyear" id="tyear" size="3" maxlength="4" value=""></td>
    <td><input type="text" name="tmonth" id="tmonth" size="1" maxlength="2" value=""></td>
    <td><input type="text" name="tday" id="tday" size="1" maxlength="2" value=""></td>
</tr>
<tr class="labels">
	<th></th>
    <th><label for="fyear">Year</label></th>
    <th><label for="fmonth">Month</label></th>
    <th><label for="fday">Day</label></th>
</tr>
</tbody>
</table>
</fieldset>
<!-- Release date -->
<!--
<fieldset class="nolegend daterange" id="pdate-from-to">
<table class="fields">
<thead>
<tr>
	<th colspan="3"><span>Release date </span><a href="/genomes/FLU/help.html#release_date" class="helper" title="What is the release date date range?"><span> </span><em>What is the release date date range?</em></a>
	</th>
</tr>
</thead>
<tbody>
<tr>
	<td><input type="text" name="fpyear" id="fpyear" size="3" maxlength="4" value=""></td>
    <td><input type="text" name="fpmonth" id="fpmonth" size="1" maxlength="2" value=""></td>
    <td><input type="text" name="fpday" id="fpday" size="1" maxlength="2" value=""></td>
</tr>
<tr>
	<td><input type="text" name="tpyear" id="tpyear" size="3" maxlength="4" value=""></td>
    <td><input type="text" name="tpmonth" id="tpmonth" size="1" maxlength="2" value=""></td>
    <td><input type="text" name="tpday" id="tpday" size="1" maxlength="2" value=""></td>
</tr>
<tr class="labels">
	<th><label for="fpyear">Year</label></th>
    <th><label for="fpmonth">Month</label></th>
    <th><label for="fpday">Day</label></th>
</tr>
</tbody>
</table>
</fieldset>
-->
<!-- Sequence length -->
<!--gzh <fieldset class="nolegend" id="length-min-max">
<table class="fields">
<thead><tr><th colspan="2"><label for="flen"><strong>Sequence length</strong></label></th></tr></thead>
<tbody>
<tr>
	<th><label for="flen">Min.:</label></th>
	<td><input type="text" name="flen" id="flen" size="6" maxlength="6" value=""></td>
</tr>
<tr>
	<th><label for="tlen">Max.:</label></th>
	<td><input type="text" name="tlen" id="tlen" size="6" maxlength="6" value=""></td>
</tr>
</tbody>
</table>
<!--
<div id="full-length-div">
<label id="full-length-only"><input type="checkbox" name="sonly" onclick="oNotifier.Notify(this,'check-splus-sonly')"><strong>Full-length</strong> only <a href="/genomes/FLU/help.html#fulllength" class="helper" title="What is full-length sequences?"><span> </span><em>What is full-length sequences?</em></a></label><br><label id="full-length-plus"><input type="checkbox" name="splus" onclick="oNotifier.Notify(this,'check-splus-sonly')"><strong>Full-length</strong> plus <a href="/genomes/FLU/help.html#fulllength" class="helper" title="What is full-length sequences?"><span> </span><em>What is full-length sequences?</em></a></label>
</div>
-->
<!--gzh </fieldset>
</div>

<!-- Buttons -->
<!--gzh <div class="buttons">
<span class="action" style="float:left"><input type="button" name="cmd_qb" value="Add query" onclick="oNotifier.Notify(this, 'cmd_add', 'add_query')"></span>
<!--
<span class="default combined" id="cmd_get_query_group" style="float:left"><input type="button" name="cmd_get_query" value="Show results" onclick="oNotifier.Notify(this, 'cmd_show', 'show_query')"></span>
-->
<!--gzh <span class="default combined" id="cmd_get_query_group" style="float:left"><input type="submit" value="Show results"></span>
</div>
<!--
<span class="cancel" style="float:right"><input type="button" name="cmd_clear" value="Clear form" onclick="oNotifier.Notify(this, 'cmd_add', 'clear')"></span>
-->
<!--gzh <span class="cancel" style="float:right"><input type="reset" value="Clear form"></span>

</fieldset>
</form>
<!-- form -->
</div>
<!-- 主体内容结束 -->
</div>
<!-- 主页面结束 -->