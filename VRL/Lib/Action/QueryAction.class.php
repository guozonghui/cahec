<?php
class QueryAction extends CommonAction {
	public function index() {
		// family
		$BioDB = M('biodatabase',null,'DB_VRL');
		$family = $BioDB->field('biodatabase_id,name')->select();
		$this->assign("family",$family);
//gene 此处未找出排列关系  建议改变数据表结构
		/*$Gene = M('gene',null,'DB_VRL');
		$gene = $Gene->field('gene_id,name,parent_id,level')->order('level')->select();
		$this->assign("gene",$gene);
		

		
		$BioEntry = M('bioentry',null,'DB_VRL');
		$condition['is_usable'] = 'Y';
		// host 该表中有重复的host 无法读取id
		$BioEntry = M('bioentry',null,'DB_VRL');
		$condition['is_usable'] = 'Y';
		$condition['biodatabase_id'] = 1;
		// host
		$host = $BioEntry->Distinct(true)->where($condition)->field('host')->select();
		foreach($host as $k=>$v){ $host_filter[$k] = array_filter($host[$k]); }
		$host = array_filter($host_filter);
		sort($host);
		$this->assign("host",$host);
		// country
		/*$country = $BioEntry->Distinct(true)->where($condition)->field('isolation_country')->select();
		foreach($country as $k=>$v){ $country_filter[$k] = array_filter($country[$k]); }
		$country = array_filter($country_filter);
		sort($country);*/
		/*$Country = M('country',null,'DB_VRL');
		$country_1 = $Country->field('country')->select();
		$this->assign("country",$country_1);*/
		
		unset($condition);

		$this->display();
	}
	
	public function geneSelect(){
		$condition['biodatabase_id'] = $_GET['family_id'];
		$BioEntry = M('bioentry',null,'DB_VRL');
		$condition['is_usable'] = 'Y';
		$subfamily = data_filter($BioEntry->Distinct(true)->where($condition)->field('subfamily')->select());
		$genus = data_filter($BioEntry->Distinct(true)->where($condition)->field('genus')->select());
		$species = data_filter($BioEntry->Distinct(true)->where($condition)->field('species')->select());
		$virus_name = data_filter($BioEntry->Distinct(true)->where($condition)->field('virus_name')->select());
		$host = data_filter($BioEntry->Distinct(true)->where($condition)->field('host')->select());
		$typeA = data_filter($BioEntry->Distinct(true)->where($condition)->field('typeA')->select());
		$typeB = data_filter($BioEntry->Distinct(true)->where($condition)->field('typeB')->select());
		$subtype = data_filter($BioEntry->Distinct(true)->where($condition)->field('subtype')->select());
		$subsubtype = data_filter($BioEntry->Distinct(true)->where($condition)->field('subsubtype')->select());
		$subsubsubtype = data_filter($BioEntry->Distinct(true)->where($condition)->field('subsubsubtype')->select());
		$Gene = M('gene',null,'DB_VRL');
		$gene = $Gene->field('gene_id,name,parent_id,level,left_value,right_value')->where($condition)->order('level')->select();
		//$this->ajaxReturn($genus,"success",'1');
		$this->ajaxReturn(array('subfamily'=>$subfamily,'genus'=>$genus,'species'=>$species,'virus_name'=>$virus_name,'host'=>$host,'typeA'=>$typeA,'typeB'=>$typeB,'subtype'=>$subtype,'subsubtype'=>$subsubtype,'subsubtype'=>$subsubtype,'subsubsubtype'=>$subsubsubtype,'gene'=>$gene),"success",'1');
	}
	
	public function queryAddress(){
		$id = $_GET['shengfen_id'];
		$Method = M("Shengfen");
		$arr_2 = $Method->where("pid=".$id)->select();
		if(empty($arr_2)){
			$arr_2 = 0;
		}
		else{
			$condition_3['pid'] = $arr_2[0]["id"];
			$arr_3 = $Method->where($condition_3)->select();
			if(empty($arr_3)){
				$arr_3 =0;
			}
		}
		$this->ajaxReturn(json_encode(array('arr_2'=>$arr_2, 'arr_3'=>$arr_3)),"success",$id);
		

	}
	
	public function result(){
		$query_fields = explode("||",$_POST['post_data']);
		/*$BioEntry = M('bioentry',null,'DB_VRL');
		$condition['is_usable'] = 'Y';
		if($query_fields[0] != '0')
			$condition['biodatabase_id'] = array("in",$query_fields[0]);*/
		$BioEntry = M('bioentry',null,'DB_VRL');
		$sql = "SELECT count(*) FROM bioentry LEFT JOIN biosequence ON bioentry.bioentry_id = biosequence.bioentry_id WHERE is_usable = 'Y'";
		if($query_fields[0] !='0'){
			$sql .= " AND biodatabase_id IN (".$query_fields[0].")";
		}
		if($query_fields[1] != '0'){
			$gene_sql = "SELECT left,right FROM gene WHERE gene_id IN (".$query_fields[1].")";
			$gene_l_r = $BioEntry->query($gene_sql);
			
			$sql .= "AND bioentry.bioentry_id IN (SELECT bioentry_id FROM bioentry_gene WHERE gene_id IN (SELECT gene_id FROM gene WHERE gene_id IN (".$query_fields[1].") OR parent_id IN (".$query_fields[1].")))";
		}
		if($query_fields[2] != '0'){
			$host = convertString($query_fields[2]);
			$sql .= " AND bioentry.host IN (".$host.")";
		}
		if($query_fields[3] != '0'){
			$country = convertString($query_fields[3]);
			$sql .= " AND bioentry.isolation_country IN (".$country.")";
		}
		if($query_fields[4] != '0'){
			$type = convertString($query_fields[4]);
			$sql .= " AND bioentry.vrl_type = ".$type;
		}
		if($query_fields[5] != '0'){
			$subtype = convertString($query_fields[5]);
			$sql .= " AND bioentry.vrl_subtype = ".$subtype;
		}
		if($query_fields[6] != '0'){
			$subsubtype = convertString($query_fields[6]);
			$sql .= " AND bioentry.vrl_subsubtype = ".$subsubtype;
		}
		if($query_fields[7] != '0'){
			$subsubsubtype = convertString($query_fields[7]);
			$sql .= " AND bioentry.vrl_subsubsubtype = ".$subsubsubtype;
		}
		if($query_fields[8] != '0'){
			$isolation_year = substr($query_fields[8],0,4);
			$sql .= " AND bioentry.isolation_year >= ".$isolation_year;
		}
		if($query_fields[9] != '0'){
			$isolation_year = substr($query_fields[9],0,4);
			$sql .= " AND bioentry.isolation_year <= ".$isolation_year;
		}
		if($query_fields[10] != 0){
			$sql .=  " AND biosequence.length >= ".$query_fields[10];
		}
		if($query_fields[11] != 0){
			$sql .=  " AND biosequence.length <= ".$query_fields[11];
		}
		$show_bioentry_count = $BioEntry->query($sql);
		//dump($show_bioentry_count);
		//$show_bioentry_count = $BioEntry->where($condition)->count();
		$this->assign('post_data',$_POST['post_data']);
		$this->assign('show_bioentry_count',$show_bioentry_count[0]['count(*)']);
		$this->display();
	}

	public function result_ajax() {
// 1、根据输入查询条件得到数据库查询字段。
// 2、根据数据库查询字段得到bioentry_ids。
// 3、根据bioentry_ids查询输出显示字段。

// 1 2:
// 输入查询条件全any或空时 => bioseqdbvrl->bioentry => query_bioentry_ids
// 输入查询条件除family外全any或空时 => bioseqdbvrl->bioentry|biodatabase_id => query_bioentry_ids
// 其它情况下需要判断某一个查询条件（condition）是否为any（结合family条件：非any和any）查询得到$query_bioentry_ids_by_condition（该数组count是否大于0判断非any和any）再将所有查询条件非any的查询结果根据键值求交集
// 输入查询条件family为非any和any情况通过count($query_biodatabase_ids)是否大于0来判断

		//***** 1 *****//
		//$query_fields = I('post.');
		//dump($query_fields,1,'<pre>',0);
		$query_fields = explode("||",$_POST['post_data']);
		$from = 0;
		$limit = 0;
		$orderby = $_POST['orderby'];
		$order_line = $_POST['order_line'];
		//dump($query_fields['family']);
// 判断输入查询条件全0或空  0代表any
		if(($query_fields[0] == '0') && ($query_fields[1] == '0') && ($query_fields[2] == '0') && 
		   ($query_fields[3] == '0') && ($query_fields[4] == '0') && ($query_fields[5] == '0') && 
		   ($query_fields[6] == '0') && ($query_fields[7] == '0') && ($query_fields[8] == '0') && 
		   ($query_fields[9] == '0') && ($query_fields[10] == '0') && ($query_fields[11] == '0'))
		{
			$BioEntry = M('bioentry',null,'DB_VRL');
			$condition['is_usable'] = 'Y';
			$condition['bioentry_id'] = array("gt",$from);
			$query_bioentry_id = $BioEntry->where($condition)->field('bioentry_id')->limit($limit)->select();
			unset($condition);
			foreach($query_bioentry_id as $k=>$v) {
				$query_bioentry_ids[] = $query_bioentry_id[$k]['bioentry_id'];
			}
			//dump($query_bioentry_ids,1,'<pre>',0);
		}
		/* json_decode时使用即可 if(($query_fields->family == 0) && ($query_fields->gene == 0) && ($query_fields->host == 0) && 
		   ($query_fields->country == 0) && ($query_fields->type == 0) && ($query_fields->subtype == 0) && 
		   ($query_fields->subsubtype == 0) && ($query_fields->subsubsubtype == 0) && ($query_fields->from == '') && 
		   ($query_fields->to == '') && ($query_fields->flen == '') && ($query_fields->tlen == ''))
		{
			$BioEntry = M('bioentry',null,'DB_VRL');
			$condition['is_usable'] = 'Y';
			$condition['bioentry_id'] = array("gt",$from);
			$query_bioentry_id = $BioEntry->where($condition)->field('bioentry_id')->limit($limit)->select();
			unset($condition);
			foreach($query_bioentry_id as $k=>$v) {
				$query_bioentry_ids[] = $query_bioentry_id[$k]['bioentry_id'];
			}
			//dump($query_bioentry_ids,1,'<pre>',0);
		}*/
		elseif(($query_fields[0] != '0') && ($query_fields[1] == '0') && ($query_fields[2] == '0') && 
			   ($query_fields[3] == '0') && ($query_fields[4] == '0') && ($query_fields[5] == '0') && 
			   ($query_fields[6] == '0') && ($query_fields[7] == '0') && ($query_fields[8] == '0') && 
			   ($query_fields[9] == '0') && ($query_fields[10] == '0') && ($query_fields[11] == '0'))
		{
			/*$BioDB = M('biodatabase',null,'DB_VRL');
			$condition['name'] = $query_fields->family;
			$query_biodatabase_id = $BioDB->where($condition)->field('biodatabase_id')->select();*/
			//dump($query_biodatabase_id,1,'<pre>',0);
			//unset($condition);
			//$query_biodatabase_ids[] = $query_biodatabase_id[0]['biodatabase_id']; 
			//dump(implode(",",$query_fields->family));
			$BioEntry = M('bioentry',null,'DB_VRL');
			$condition['is_usable'] = 'Y';
			$condition['biodatabase_id'] = array("in",$query_fields[0]);
			$condition['bioentry_id'] = array("gt",$from);
			$query_bioentry_id = $BioEntry->where($condition)->field('bioentry_id')->limit($limit)->select();
			unset($condition);
			foreach($query_bioentry_id as $k=>$v) {
				$query_bioentry_ids[] = $query_bioentry_id[$k]['bioentry_id'];
			}
			//echo 'ALL any or empty except family | query bioentry_ids:<br />';
			//dump($query_bioentry_ids,1,'<pre>',0);
		}
//family=>0 gene=>1 host=>2 country=>3 type=>4 subtype=>5 subsubtype=>6 subsubsubtype=>7 from=>8 to=>9 flen=>10 tlen=>11		
		
		/*else
		{
			$BioEntry = M('bioentry',null,'DB_VRL');
			$sql = "SELECT bioentry_id FROM bioentry WHERE is_usable = 'Y'";
			
			if($query_fields[0] !='0'){
				$sql .= " AND biodatabase_id IN (".$query_fields[0].")";
			}
			if($query_fields[1] != '0'){
				$sql .= " AND bioentry_id IN (SELECT bioentry_id FROM bioentry_gene WHERE gene_id IN (".$query_fields[1]."))"; 
			}
			if($query_fields[2] != '0'){
				$host = convertString($query_fields[2]);
				$sql .= " AND host IN (".$host.")";
			}
			if($query_fields[3] != '0'){
				$country = convertString($query_fields[3]);
				$sql .= " AND isolation_country IN (".$country.")";
			}
			if($query_fields[4] != '0'){
				$type = convertString($query_fields[4]);
				$sql .= " AND vrl_type = ".$type;
			}
			if($query_fields[5] != '0'){
				$subtype = convertString($query_fields[5]);
				$sql .= " AND vrl_subtype = ".$subtype;
			}
			if($query_fields[6] != '0'){
				$subsubtype = convertString($query_fields[6]);
				$sql .= " AND vrl_subsubtype = ".$subsubtype;
			}
			if($query_fields[7] != '0'){
				$subsubsubtype = convertString($query_fields[7]);
				$sql .= " AND vrl_subsubsubtype = ".$subsubsubtype;
			}
			if($query_fields[8] != '0'){
				$isolation_year = substr($query_fields[8],0,4);
				$sql .= " AND isolation_year >= ".$isolation_year;
			}
			if($query_fields[9] != '0'){
				$isolation_year = substr($query_fields[9],0,4);
				$sql .= " AND isolation_year <= ".$isolation_year;
			}
			$sql .= " AND bioentry_id > ".$from;
			switch($orderby){
				case "length":
					$sql .= " ORDER BY biosequence.".$orderby." DESC";
					break;
				case "gene":
					$sql .= " ORDER BY ".$orderby." ASC";
					break;
				default:
					$sql .= " ORDER BY bioentry.".$orderby." DESC";
					break;
				
			}
			$sql .= " limit ".$limit;
			$query_bioentry_id = $BioEntry->query($sql);
			foreach($query_bioentry_id as $k=>$v) {
				$query_bioentry_ids[] = $query_bioentry_id[$k]['bioentry_id'];
			}
		}*/
		//$this->ajaxReturn($sql,"success",'1');
		/*$query_bioentry_count = count($query_bioentry_ids);  
		if($query_bioentry_count>0) {      //gzh 用$query_bioentry_ids.length判断即可
			$BioEntry = M('bioentry',null,'DB_VRL');
			$condition['is_usable'] = 'Y';
			//import("@.ORG.Util.Page");
			$BioSequence = M('biosequence',null,'DB_VRL');
			$query = D('Query');*/
			/*$query_bioentry_ids='';
			$query_bioentry_ids[0]=1001;
			$query_bioentry_ids[1]=2000;
			$query_bioentry_ids[2]=2001;*/
			//$sql = "SELECT bioentry.bioentry_id,bioentry.accession,bioentry_qualifier_value.value AS name,bioentry.isolation_year,bioentry.isolation_country,bioentry.host,bioentry.vrl_type,bioentry.vrl_subtype,bioentry.vrl_subsubtype,bioentry.vrl_subsubsubtype,biosequence.length,gene.name AS gene FROM bioentry_qualifier_value,bioentry LEFT JOIN biosequence ON bioentry.bioentry_id = biosequence.bioentry_id LEFT JOIN bioentry_gene ON bioentry.bioentry_id = bioentry_gene.bioentry_id LEFT JOIN gene ON gene.gene_id = bioentry_gene.gene_id WHERE bioentry.bioentry_id IN (" .implode(",",$query_bioentry_ids). ") AND bioentry.is_usable = 'Y' AND bioentry_qualifier_value.term_id = term.term_id AND term.name = 'source';";
			/*gzh no order $sql = "SELECT bioentry.bioentry_id,bioentry.accession,bioentry_qualifier_value.value AS name,bioentry.isolation_year,bioentry.isolation_country,bioentry.host,bioentry.vrl_type,bioentry.vrl_subtype,bioentry.vrl_subsubtype,bioentry.vrl_subsubsubtype,biosequence.length,gene.name AS gene FROM bioentry LEFT JOIN biosequence ON bioentry.bioentry_id = biosequence.bioentry_id LEFT JOIN bioentry_gene ON bioentry.bioentry_id = bioentry_gene.bioentry_id LEFT JOIN gene ON gene.gene_id = bioentry_gene.gene_id LEFT JOIN  bioentry_qualifier_value ON bioentry.bioentry_id =  bioentry_qualifier_value.bioentry_id WHERE bioentry.bioentry_id IN (" .implode(",",$query_bioentry_ids). ") AND bioentry.is_usable = 'Y' AND  bioentry_qualifier_value.term_id IN (SELECT term_id FROM term WHERE term.name='source')";
			if($query_fields[10] != 0){
				$sql .=  " AND biosequence.length >= ".$query_fields[10];
			}
			if($query_fields[11] != 0){
				$sql .=  " AND biosequence.length <= ".$query_fields[11];
			}*/
			$BioEntry = M('bioentry',null,'DB_VRL');
			$sql = "SELECT bioentry.bioentry_id,B.value AS sequence_version,bioentry.accession,A.value AS name,bioentry.isolation_year,bioentry.isolation_country,bioentry.host,bioentry.vrl_type,bioentry.vrl_subtype,bioentry.vrl_subsubtype,bioentry.vrl_subsubsubtype,biosequence.length,gene.name AS gene FROM bioentry LEFT JOIN biosequence ON bioentry.bioentry_id = biosequence.bioentry_id LEFT JOIN bioentry_gene ON bioentry.bioentry_id = bioentry_gene.bioentry_id LEFT JOIN gene ON gene.gene_id = bioentry_gene.gene_id LEFT JOIN  bioentry_qualifier_value as A ON bioentry.bioentry_id =  A.bioentry_id LEFT JOIN bioentry_qualifier_value as B ON bioentry.bioentry_id =  B.bioentry_id WHERE bioentry.is_usable = 'Y' AND bioentry.is_usable = 'Y' AND  A.term_id IN (SELECT term_id FROM term WHERE term.name='source') AND  B.term_id IN (SELECT term_id FROM term WHERE term.name='sequence_version')";
			
			if($query_fields[0] !='0'){
				$sql .= " AND bioentry.biodatabase_id IN (".$query_fields[0].")";
			}
			if($query_fields[1] != '0'){
				$sql .= " AND bioentry.bioentry_id IN (SELECT bioentry_id FROM bioentry_gene WHERE gene_id IN (".$query_fields[1]."))"; 
			}
			if($query_fields[2] != '0'){
				$host = convertString($query_fields[2]);
				$sql .= " AND bioentry.host IN (".$host.")";
			}
			if($query_fields[3] != '0'){
				$country = convertString($query_fields[3]);
				$sql .= " AND bioentry.isolation_country IN (".$country.")";
			}
			if($query_fields[4] != '0'){
				$type = convertString($query_fields[4]);
				$sql .= " AND bioentry.vrl_type = ".$type;
			}
			if($query_fields[5] != '0'){
				$subtype = convertString($query_fields[5]);
				$sql .= " AND bioentry.vrl_subtype = ".$subtype;
			}
			if($query_fields[6] != '0'){
				$subsubtype = convertString($query_fields[6]);
				$sql .= " AND bioentry.vrl_subsubtype = ".$subsubtype;
			}
			if($query_fields[7] != '0'){
				$subsubsubtype = convertString($query_fields[7]);
				$sql .= " AND bioentry.vrl_subsubsubtype = ".$subsubsubtype;
			}
			if($query_fields[8] != '0'){
				$isolation_year = substr($query_fields[8],0,4);
				$sql .= " AND bioentry.isolation_year >= ".$isolation_year;
			}
			if($query_fields[9] != '0'){
				$isolation_year = substr($query_fields[9],0,4);
				$sql .= " AND bioentry.isolation_year <= ".$isolation_year;
			}
			if($query_fields[10] != 0){
				$sql .=  " AND biosequence.length >= ".$query_fields[10];
			}
			if($query_fields[11] != 0){
				$sql .=  " AND biosequence.length <= ".$query_fields[11];
			}
			//$sql .= " AND bioentry.bioentry_id > ".$from;
			switch($orderby){
				case "length":
					$sql .= " ORDER BY biosequence.".$orderby." ".$order_line;
					break;
				case "gene":
					$sql .= " ORDER BY ".$orderby." ".$order_line;
					break;
				case "name":
					$sql .= " ORDER BY ".$orderby." ".$order_line;
					break;
				default:
					$sql .= " ORDER BY bioentry.".$orderby." ".$order_line;
					break;
			}
			//$sql .= " limit ".$limit;
			
			
			/*$count = $query_bioentry_count;
			$p = new Page($count,10);
			$sql = "SELECT bioentry.bioentry_id,bioentry.accession,bioentry_qualifier_value.value AS name,bioentry.isolation_year,bioentry.isolation_country,bioentry.host,bioentry.vrl_type,bioentry.vrl_subtype,bioentry.vrl_subsubtype,bioentry.vrl_subsubsubtype,biosequence.length,gene.name AS gene FROM bioentry LEFT JOIN biosequence ON bioentry.bioentry_id = biosequence.bioentry_id LEFT JOIN bioentry_gene ON bioentry.bioentry_id = bioentry_gene.bioentry_id LEFT JOIN gene ON gene.gene_id = bioentry_gene.gene_id LEFT JOIN  bioentry_qualifier_value ON bioentry.bioentry_id =  bioentry_qualifier_value.bioentry_id WHERE bioentry.bioentry_id IN (" .implode(",",$query_bioentry_ids). ") AND bioentry.is_usable = 'Y' AND  bioentry_qualifier_value.term_id IN (SELECT term_id FROM term WHERE term.name='source') ORDER BY bioentry.bioentry_id LIMIT ".$p->firstRow.','.$p->listRows.";";
			//$list = $Project->order('updatetime DESC')->limit($p->firstRow.','.$p->listRows)->select();
			$page = $p->show();
			//$this->assign('list',$list);
			$this->assign('page',$page);*/
			$show_bioentry_info = $BioEntry->query($sql);
			//dump($sql);
		//}
		/*$show_bioentry_id = 0;
		foreach($show_bioentry_info as $k=>$v){
			if($show_bioentry_info[$k]['bioentry_id'] == $show_bioentry_id){
				$show_bioentry_info[$k]['gene'] = $show_bioentry_info[$k]['gene']. '-' .$show_bioentry_info[$k-1]['gene'];
				unset($show_bioentry_info[$k-1]);
				
			}
			$show_bioentry_id = $show_bioentry_info[$k]['bioentry_id'];
			
		}*/
		$show_bioentry_info = delOthers($show_bioentry_info,"Others");
		
		/*	foreach($query_bioentry_ids as $k=>$v) {
				$condition['bioentry_id'] = $v;
				// bioentry
				$query_info_bioentry = $BioEntry->where($condition)->field('accession,isolation_year,isolation_country,host,vrl_type,vrl_subtype,vrl_subsubtype,vrl_subsubsubtype')->select();
				$show_bioentry_info[$k] = $query_info_bioentry[0];
				//echo 'show info from bioentry:<br />';
				//dump($show_bioentry_info,1,'<pre>',0);
				//-----//
				// biosequence
				$query_info_biosequence = $BioSequence->where($condition)->field('length')->select();
				$show_bioentry_info[$k] = $show_bioentry_info[$k] + $query_info_biosequence[0];
 				//echo 'show info from biosequence:<br />';
				//dump($show_bioentry_info,1,'<pre>',0);
				//-----//
				// bioentry_gene => gene
				$query_info_gene = $query->getGeneName($v);//$v 3
				unset($query_info_gene_str);
				if(count($query_info_gene)>0) {
					foreach($query_info_gene as $kk=>$vv) {
						if($query_info_gene[$kk]['name'] == 'Others') { unset($query_info_gene[$kk]); }   //什么意思
						else { $query_info_gene_str = $query_info_gene_str.'-'.$query_info_gene[$kk]['name']; }
					}
				$query_info_gene_str = trim($query_info_gene_str,'-');
				//echo $query_info_gene_str; echo '<br />';
				}
				//echo 'query info gene:<br />';
				//dump($query_info_gene,1,'<pre>',0);
				$show_bioentry_info[$k]['gene'] = $query_info_gene_str;
 				//echo 'show info from gene:<br />';
				//dump($show_bioentry_info,1,'<pre>',0);
				//-----//
				// bioentry_qualifier_value->source<-term
				$query_info_source = $query->getVirusName($v);
				if(count($query_info_source)>0) {
					$show_bioentry_info[$k]['name'] = $query_info_source[0]['value'];
				}
				//echo 'query info source:<br />';
				//dump($query_info_source,1,'<pre>',0);
 				//echo 'show info from source:<br />';
				//dump($show_bioentry_info,1,'<pre>',0);
				//-----//
				// bioentry_qualifier_value->sequence_version<-term
				$query_info_version = $query->getSequenceVersion($v);
				if(count($query_info_version)>0) {
					$show_bioentry_info[$k]['dotversion'] = '.'.$query_info_version[0]['value'];
				}
				//echo 'query info version:<br />';
				//dump($query_info_version,1,'<pre>',0);
 				//echo 'show info from version:<br />';
				//dump($show_bioentry_info,1,'<pre>',0);
			}
			//echo 'show bioentry info:<br />';
			//dump($show_bioentry_info,1,'<pre>',0);
			//
			unset($condition);
		} //查询结果不为空的情况结束

		$show_bioentry_count = count($show_bioentry_info);*/
		//dump($show_bioentry_info);
		//$this->assign("show_bioentry_count",count($show_bioentry_info));
		//$this->assign("show_bioentry_info",$show_bioentry_info);
		
		$this->ajaxReturn($show_bioentry_info,"success",'1');
		


// 判断输入查询条件全any或空
/*gzh		if(($query_fields['family'] == 'any') && ($query_fields['gene'] == 'any') && ($query_fields['host'] == 'any') && ($query_fields['country'] == 'any') && ($query_fields['type'] == 'any') && ($query_fields['subtype'] == 'any') && ($query_fields['subsubtype'] == 'any') && ($query_fields['subsubsubtype'] == 'any') && ($query_fields['fyear'] == '') && ($query_fields['fmonth'] == '') && ($query_fields['fday'] == '') && ($query_fields['tyear'] == '') && ($query_fields['tmonth'] == '') && ($query_fields['tday'] == '') && ($query_fields['flen'] == '') && ($query_fields['tlen'] == '')) {
			$BioEntry = M('bioentry',null,'DB_VRL');
			$condition['is_usable'] = 'Y';
			$query_bioentry_id = $BioEntry->where($condition)->field('bioentry_id')->select();
			unset($condition);
			foreach($query_bioentry_id as $k=>$v) {
				$query_bioentry_ids[] = $query_bioentry_id[$k]['bioentry_id'];
			}
			//echo 'ALL any or empty | query bioentry_ids:<br />';
			//dump($query_bioentry_ids,1,'<pre>',0);
		}
// 判断输入查询条件除family外全any或空
		elseif(($query_fields['family'] != 'any') && ($query_fields['gene'] == 'any') && ($query_fields['host'] == 'any') && ($query_fields['country'] == 'any') && ($query_fields['type'] == 'any') && ($query_fields['subtype'] == 'any') && ($query_fields['subsubtype'] == 'any') && ($query_fields['subsubsubtype'] == 'any') && ($query_fields['fyear'] == '') && ($query_fields['fmonth'] == '') && ($query_fields['fday'] == '') && ($query_fields['tyear'] == '') && ($query_fields['tmonth'] == '') && ($query_fields['tday'] == '') && ($query_fields['flen'] == '') && ($query_fields['tlen'] == '')) {
			$BioDB = M('biodatabase',null,'DB_VRL');
			$condition['name'] = $query_fields['family'];
			$query_biodatabase_id = $BioDB->where($condition)->field('biodatabase_id')->select();
			unset($condition);
			$query_biodatabase_ids[] = $query_biodatabase_id[0]['biodatabase_id'];
			$BioEntry = M('bioentry',null,'DB_VRL');
			$condition['is_usable'] = 'Y';
			$condition['biodatabase_id'] = $query_biodatabase_ids[0];
			$query_bioentry_id = $BioEntry->where($condition)->field('bioentry_id')->select();
			unset($condition);
			foreach($query_bioentry_id as $k=>$v) {
				$query_bioentry_ids[] = $query_bioentry_id[$k]['bioentry_id'];
			}
			//echo 'ALL any or empty except family | query bioentry_ids:<br />';
			//dump($query_bioentry_ids,1,'<pre>',0);
		}
// 其它情况
		else {
		// family => biodatabase->biodatabase_id
		if($query_fields['family'] != 'any') {
			$BioDB = M('biodatabase',null,'DB_VRL');
			$condition['name'] = $query_fields['family'];
			$query_biodatabase_id = $BioDB->where($condition)->field('biodatabase_id')->select();
			unset($condition);
			$query_biodatabase_ids[] = $query_biodatabase_id[0]['biodatabase_id'];
		}
		//echo 'query bioentry_biodatabase_ids:<br />';
		//dump($query_biodatabase_ids,1,'<pre>',0);
		//-----//
		// gene => gene->gene_id => bioentry_gene->gene_id
		if($query_fields['gene'] != 'any') {
			$Gene = M('gene',null,'DB_VRL');
			$gene = $Gene->field('gene_id,name,parent_id')->select();
			//echo 'gene:<br />';
			//dump($gene,1,'<pre>',0);
			$condition['name'] = $query_fields['gene'];
			if(count($query_biodatabase_ids)>0) {
				$condition['biodatabase_id'] = $query_biodatabase_ids[0];
			}
			$query_gene_id = $Gene->where($condition)->field('gene_id')->select();
			unset($condition);
			//echo 'query gene_id:<br />';
			//dump($query_gene_id,1,'<pre>',0);
			findAdjacencyListLeaves($gene,'gene_id','parent_id',$query_gene_id[0]['gene_id'],$query_gene_ids);
			//echo 'query gene_ids (all leaves of query gene_id):<br />';
			//dump($query_gene_ids,1,'<pre>',0);
			//***** 2 *****//*gzh /
/*gzh			$BioentryGene = M('bioentry_gene',null,'DB_VRL');
			foreach($query_gene_ids as $k=>$v) {
				$condition['gene_id'][] = array('eq',$v);
			}
			$condition['gene_id'][] = 'or';
			$query_bioentry_ids = $BioentryGene->Distinct(true)->where($condition)->field('bioentry_id')->select();
			unset($condition);
			foreach($query_bioentry_ids as $kk=>$vv) {
				$query_bioentry_ids_by_gene[] = $query_bioentry_ids[$kk]['bioentry_id'];
			}
		}
		//echo 'query bioentry_ids by gene:<br />';
		//dump($query_bioentry_ids_by_gene,1,'<pre>',0);die;

		// bioentry
		$BioEntry = M('bioentry',null,'DB_VRL');
		// bioentry->is_usable
		$condition['is_usable'] = 'Y';
		// bioentry->biodatabase_id
		if(count($query_biodatabase_ids)>0) {
			$condition['biodatabase_id'] = $query_biodatabase_ids[0];
		}
		// host => bioentry->host
		if($query_fields['host'] != 'any') {
			$condition['host'] = $query_fields['host'];
		}
		// country => bioentry->isolation_country
		if($query_fields['country'] != 'any') {
			$condition['isolation_country'] = $query_fields['country'];
		}
		//
		$query_bioentry_ids = $BioEntry->Distinct(true)->where($condition)->field('bioentry_id')->select();
		unset($condition);
		foreach($query_bioentry_ids as $kk=>$vv) {
			$query_bioentry_ids_by_host_country[] = $query_bioentry_ids[$kk]['bioentry_id'];
		}
		//echo 'query bioentry_ids by host_country:<br />';
		//dump($query_bioentry_ids_by_host_country,1,'<pre>',0);

		// biosequence->length
		if(($query_fields['flen'] != '') || ($query_fields['tlen'] != '')) {
			$flen = $query_fields['flen'];
    		$tlen = $query_fields['tlen'];
			$BioSequence = M('biosequence',null,'DB_VRL');
			if(($flen != '') && ($tlen == '')) { $map['length'] = array('egt',$flen); }
			elseif(($flen == '') && ($tlen != '')) { $map['length'] = array('elt',$tlen); }
			elseif(($flen != '') && ($tlen != '')) { $map['length'] = array(array('egt',$flen),array('elt',$tlen)); }
			$query_bioentry_ids = $BioSequence->Distinct(true)->where($map)->field('bioentry_id')->select();
			unset($map);
			foreach($query_bioentry_ids as $kk=>$vv) {
				$query_bioentry_ids_by_length[] = $query_bioentry_ids[$kk]['bioentry_id'];
			}
		}
		//echo 'query bioentry_ids by length:<br />';
		//dump($query_bioentry_ids_by_length,1,'<pre>',0);
		//-----//

		// 交集
		//unset($query_bioentry_ids);
		//$query_bioentry_ids = array();
		if(count($query_bioentry_ids_by_gene)>0) {
			$query_bioentry_ids = $query_bioentry_ids_by_gene;
		} elseif(count($query_bioentry_ids_by_host_country)>0) {
			$query_bioentry_ids = $query_bioentry_ids_by_host_country;
		} elseif(count($query_bioentry_ids_by_length)>0) {
			$query_bioentry_ids = $query_bioentry_ids_by_length;
		}

		if(count($query_bioentry_ids_by_gene)>0) {
			$query_bioentry_ids = array_intersect($query_bioentry_ids_by_gene,$query_bioentry_ids);
		}
		if(count($query_bioentry_ids_by_host_country)>0) {
			$query_bioentry_ids = array_intersect($query_bioentry_ids_by_host_country,$query_bioentry_ids);
		}
		if(count($query_bioentry_ids_by_length)>0) {
			$query_bioentry_ids = array_intersect($query_bioentry_ids_by_length,$query_bioentry_ids);
		}
		sort($query_bioentry_ids);

		//echo 'query bioentry_ids:<br />';
		//dump($query_bioentry_ids,1,'<pre>',0);
		//echo 'THE END<br />';
		} // 判断结束

		//***** 3 *****//*gzh/
		$query_bioentry_count = count($query_bioentry_ids);
		if($query_bioentry_count>0) {
			$BioEntry = M('bioentry',null,'DB_VRL');
			$condition['is_usable'] = 'Y';
			$BioSequence = M('biosequence',null,'DB_VRL');
			$query = D('Query');
			foreach($query_bioentry_ids as $k=>$v) {
				$condition['bioentry_id'] = $v;
				// bioentry
				$query_info_bioentry = $BioEntry->where($condition)->field('accession,isolation_year,isolation_country,host,vrl_type,vrl_subtype,vrl_subsubtype,vrl_subsubsubtype')->select();
				$show_bioentry_info[$k] = $query_info_bioentry[0];
				//echo 'show info from bioentry:<br />';
				//dump($show_bioentry_info,1,'<pre>',0);
				//-----//
				// biosequence
				$query_info_biosequence = $BioSequence->where($condition)->field('length')->select();
				$show_bioentry_info[$k] = $show_bioentry_info[$k] + $query_info_biosequence[0];
 				//echo 'show info from biosequence:<br />';
				//dump($show_bioentry_info,1,'<pre>',0);
				//-----//
				// bioentry_gene => gene
				$query_info_gene = $query->getGeneName($v);//$v 3
				unset($query_info_gene_str);
				if(count($query_info_gene)>0) {
					foreach($query_info_gene as $kk=>$vv) {
						if($query_info_gene[$kk]['name'] == 'Others') { unset($query_info_gene[$kk]); }
						else { $query_info_gene_str = $query_info_gene_str.'-'.$query_info_gene[$kk]['name']; }
					}
				$query_info_gene_str = trim($query_info_gene_str,'-');
				//echo $query_info_gene_str; echo '<br />';
				}
				//echo 'query info gene:<br />';
				//dump($query_info_gene,1,'<pre>',0);
				$show_bioentry_info[$k]['gene'] = $query_info_gene_str;
 				//echo 'show info from gene:<br />';
				//dump($show_bioentry_info,1,'<pre>',0);
				//-----//
				// bioentry_qualifier_value->source<-term
				$query_info_source = $query->getVirusName($v);
				if(count($query_info_source)>0) {
					$show_bioentry_info[$k]['name'] = $query_info_source[0]['value'];
				}
				//echo 'query info source:<br />';
				//dump($query_info_source,1,'<pre>',0);
 				//echo 'show info from source:<br />';
				//dump($show_bioentry_info,1,'<pre>',0);
				//-----//
				// bioentry_qualifier_value->sequence_version<-term
				$query_info_version = $query->getSequenceVersion($v);
				if(count($query_info_version)>0) {
					$show_bioentry_info[$k]['dotversion'] = '.'.$query_info_version[0]['value'];
				}
				//echo 'query info version:<br />';
				//dump($query_info_version,1,'<pre>',0);
 				//echo 'show info from version:<br />';
				//dump($show_bioentry_info,1,'<pre>',0);
			}
			//echo 'show bioentry info:<br />';
			//dump($show_bioentry_info,1,'<pre>',0);
			//
			unset($condition);
		} //查询结果不为空的情况结束

		$show_bioentry_count = count($show_bioentry_info);
		$this->assign("show_bioentry_count",$show_bioentry_count);
		$this->assign("show_bioentry_info",$show_bioentry_info);

		// 分页显示
		// ajax分页：http://www.thinkphp.cn/extend/246.html
/*
		import("@.ORG.Util.Page");//导入分页类
		$Page = new Page($show_bioentry_count,4);//实例化分页类 传入总记录数和每页显示的记录数
		$list = array_slice($show_bioentry_info,$Page->firstRow,$Page->listRows);//在数组中根据条件取出一段值
		$show = $Page->show();//分页显示输出
		$this->assign('page',$show);//赋值分页输出

		$this->assign("show_bioentry_info",$list);//赋值数据集
*/
		//die;
		//$this->display();//输出模板
	}

	public function downloadQuery(){
		$str = '';
		$query_field = '';
		$check_list = $_POST['check_list'];
		$format = $_POST['format'];
		$orderby = $_POST['order'];
		$order_line = $_POST['order_line'];
		$field_all = $_POST['defline'];
		$field_separate_array = explode('}',$field_all);
		$i = 0;
		for($m=0;$m<count($field_separate_array)-1;$m++){
			$field_separate = explode('{',$field_separate_array[$m]);
			$field[$i] = isset($field_separate[1])?$field_separate[1]:0;
			$separate[$i] = isset($field_separate[0])?$field_separate[0]:0;
			$i++;
		}
		$separate[$i] = $field_separate_array[count($field_separate_array)-1];
		foreach($field as $val){
			switch ($val){
				case 'gi':
					$query_field .= "bioentry.bioentry_id,";
					break;
				case 'accession':
					$query_field .= "bioentry.accession,";
					break;
				case 'host':
					$query_field .= "bioentry.host,";
					break;
				case 'segment_name':
					$query_field .= "bioentry.host,";
					break;
				case 'serotyp':
					$query_field .= "bioentry.host,";
					break;	
				case 'segment_number':
					$query_field .= "bioentry.host,";
					break;	
				case 'country':
					$query_field .= "bioentry.host,";
					break;	
				case 'year':
					$query_field .= "bioentry.year,";
					break;	
				case 'strain':
					$query_field .= "bioentry.host,";
					break;	
				case 'virus_name':
					$query_field .= "bioentry.host,";
					break;	
				case 'definition':
					$query_field .= "bioentry.host,";
					break;	
				case 'age':
					$query_field .= "bioentry.host,";
					break;	
				case 'gender':
					$query_field .= "bioentry.host,";
					break;	
				case 'mutations':
					$query_field .= "bioentry.host,";
					break;	
				case 'CDS_location':
					$query_field .= "bioentry.host,";
					break;	
				default:
					break;
			}
		}
		$query_field .= "biosequence.seq";
		//$this->ajaxReturn($query_field,"success",'1');
		$filename = date("y-m-d-H-i-s").rand();
		$filepath = "./Public/Download/";
		$BioEntry = M('bioentry',null,'DB_VRL');
		$sql = "SELECT ".$query_field." FROM bioentry LEFT JOIN biosequence ON bioentry.bioentry_id = biosequence.bioentry_id LEFT JOIN bioentry_gene ON bioentry.bioentry_id = bioentry_gene.bioentry_id LEFT JOIN gene ON gene.gene_id = bioentry_gene.gene_id LEFT JOIN  bioentry_qualifier_value ON bioentry.bioentry_id =  bioentry_qualifier_value.bioentry_id WHERE bioentry.bioentry_id IN (" .$check_list. ") AND bioentry.is_usable = 'Y' AND  bioentry_qualifier_value.term_id IN (SELECT term_id FROM term WHERE term.name='source')";
		//好用的$sql = "SELECT bioentry.bioentry_id,bioentry.accession,bioentry_qualifier_value.value AS name,bioentry.isolation_year,bioentry.isolation_country,bioentry.host,bioentry.vrl_type,bioentry.vrl_subtype,bioentry.vrl_subsubtype,bioentry.vrl_subsubsubtype,biosequence.length,gene.name AS gene FROM bioentry LEFT JOIN biosequence ON bioentry.bioentry_id = biosequence.bioentry_id LEFT JOIN bioentry_gene ON bioentry.bioentry_id = bioentry_gene.bioentry_id LEFT JOIN gene ON gene.gene_id = bioentry_gene.gene_id LEFT JOIN  bioentry_qualifier_value ON bioentry.bioentry_id =  bioentry_qualifier_value.bioentry_id WHERE bioentry.bioentry_id IN (" .$check_list. ") AND bioentry.is_usable = 'Y' AND  bioentry_qualifier_value.term_id IN (SELECT term_id FROM term WHERE term.name='source')";
		//$sql = "SELECT bioentry.bioentry_id,bioentry.accession,bioentry_qualifier_value.value AS name,bioentry.isolation_year,bioentry.isolation_country,bioentry.host,bioentry.vrl_type,bioentry.vrl_subtype,bioentry.vrl_subsubtype,bioentry.vrl_subsubsubtype,biosequence.length,gene.name AS gene FROM bioentry LEFT JOIN biosequence ON bioentry.bioentry_id = biosequence.bioentry_id LEFT JOIN bioentry_gene ON bioentry.bioentry_id = bioentry_gene.bioentry_id LEFT JOIN gene ON gene.gene_id = bioentry_gene.gene_id LEFT JOIN  bioentry_qualifier_value ON bioentry.bioentry_id =  bioentry_qualifier_value.bioentry_id WHERE bioentry.bioentry_id IN (" .$check_list. ") AND bioentry.is_usable = 'Y' AND  bioentry_qualifier_value.term_id IN (SELECT term_id FROM term WHERE term.name='source');";
		switch($orderby){
			case "length":
				$sql .= " ORDER BY biosequence.".$orderby." ".$order_line;
				break;
			case "gene":
				$sql .= " ORDER BY ".$orderby." ".$order_line;
				break;
			case "name":
				$sql .= " ORDER BY ".$orderby." ".$order_line;
				break;
			default:
				$sql .= " ORDER BY bioentry.".$orderby." ".$order_line;
				break;
		}
		$show_bioentry_info = $BioEntry->query($sql);
		switch ($format){
			case 'fP':
				$filename = $filename.".fa";
				$fullpath = $filepath.$filename;
				$fp=fopen($fullpath,"w+");//fopen()的其它开关请参看相关函
				foreach($show_bioentry_info as $k=>$v){
					//$str = $separate[0];
					$i = 0;
					foreach($v as $val){     //查询字段的数据为空时如何处理
						$str .= $separate[$i].$val;
						$i++;
					}
					fputs($fp,$str);
					//fputs($fp,'\n');
				}
				fclose($fp);
				break;
			case 'fR':
				$filename = $filename.".fa";
				$fullpath = $filepath.$filename;
				$fp=fopen($fullpath,"w+");//fopen()的其它开关请参看相关函
					fputs($fp,$sql);
				fclose($fp);
				break;
			case 'fN':
				
				break;
			case 'aP':
				Vendor('PhpExcel.PHPExcel');
				$j = 1;
				$objPHPExcel = new PHPExcel();
				$objPHPExcel-> getProperties()->setTitle("Office 2007 XLSX Test Document")
							->setSubject("Office 2007 XLSX Test Document")
							->setDescription("document for Office 2007 XLSX, generated using PHP classes.")
							->setKeywords("office 2007 openxml php");
		  
				$objPHPExcel->setActiveSheetIndex(0);
				$objPHPExcel->getActiveSheet()->setTitle('VRL');
				$show_bioentry_info = delOthers($show_bioentry_info,"Others");
				foreach($show_bioentry_info as $val){
					$k = 'A';
					foreach($val as $key=>$data){
						$objPHPExcel->getActiveSheet()->setCellValueExplicit("$k$j", "$data", PHPExcel_Cell_DataType::TYPE_STRING);
						$k++;
					}
					$j++;         
				}
				$selFileFormat = "Excel2003";
				header('Cache-Control: max-age=0');
				switch($selFileFormat){
					case "Excel2003":
						header('Content-Type: application/vnd.ms-excel');
						header('Content-Disposition: attachment;filename="basic.xls"');
						$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
						break;
					case "Excel2007":
						header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
						header('Content-Disposition: attachment;filename="basic.xlsx"');
						$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
						break;
					default:
						$this->error("格式不正确");
				}
				
				switch($selFileFormat){
					case "Excel2003":
						$filename = $filename.".xls";
						$fullpath = $filepath.$filename;
						$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
						$objWriter->save($fullpath);
						break;
					case "Excel2007":
						$filename = $filename.".xlsx";
						$fullpath = $filepath.$filename;
						$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
						$objWriter->save($fullpath);
						break;
					default:
						$this->error("格式不正确");
				}
				break;
			case 'aN':
				
				break;
			case 'xml':
				
				break;
			case 'csv':
				
				break;
			case 'tab':
				
				break;
			default:
				break;
		}
		download_file($fullpath);
		//$this->ajaxReturn($fullpath,"success",'1');
	}

}