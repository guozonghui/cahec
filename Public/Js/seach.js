var dispaly_id = 0;
var query_term ={
	family:0,
	subfamily:0,
	genus:0,
	species:0,
	virus_name:0,
	host:0,
	typeA:0,
	typeB:0,
	subType:0,
	subsubType:0,
	subsubsubType:0,
	gene:0,
	country:0,
	from:0,
	to:0,
	flen:0,
	tlen:0
	};
var country_term = '';
$(document).ready( function() {
	callbackGene($("#family").val());
	$(".continent_choose").click(function(){
		 $("#country_any").attr("checked",false);
		$("#country_append").empty();
		switch ($(this).attr('id')){
			case 'Africa':
				$("#country_append").append("<input type='checkbox' id='country' name='country' value='Algeria' />Algeria<input type='checkbox' id='country' name='country' value='Angola' />Angola<input type='checkbox' id='country' name='country' value='Benin' />Benin<input type='checkbox' id='country' name='country' value='Botswana' />Botswana<input type='checkbox' id='country' name='country' value='Burkina Faso' />Burkina Faso<input type='checkbox' id='country' name='country' value='Burundi' />Burundi<input type='checkbox' id='country' name='country' value='Cameroon' />Cameroon<input type='checkbox' id='country' name='country' value='Cape Verde' />Cape Verde<input type='checkbox' id='country' name='country' value='Central African Republic' />Central African Republic<input type='checkbox' id='country' name='country' value='Chad' />Chad<input type='checkbox' id='country' name='country' value='Comoros' />Comoros<input type='checkbox' id='country' name='country' value='Republic of the Congo' />Republic of the Congo<input type='checkbox' id='country' name='country' value='Democratic Republic of the Congo' />Democratic Republic of the Congo<input type='checkbox' id='country' name='country' value='Algeria' />Algeria<input type='checkbox' id='country' name='country' value='Angola' />Angola<input type='checkbox' id='country' name='country' value='Benin' />Benin<input type='checkbox' id='country' name='country' value='Botswana' />Botswana<input type='checkbox' id='country' name='country' value='Burkina Faso' />Burkina Faso<input type='checkbox' id='country' name='country' value='Burundi' />Burundi<input type='checkbox' id='country' name='country' value='Cameroon' />Cameroon<input type='checkbox' id='country' name='country' value='Cape Verde' />Cape Verde<input type='checkbox' id='country' name='country' value='Central African Republic' />Central African Republic<input type='checkbox' id='country' name='country' value='Ivory Coast' />Ivory Coast<input type='checkbox' id='country' name='country' value='Djibouti' />Djibouti<input type='checkbox' id='country' name='country' value='Egypt' />Egypt<input type='checkbox' id='country' name='country' value='Equatorial Guinea' />Equatorial Guinea<input type='checkbox' id='country' name='country' value='Eritrea' />Eritrea<input type='checkbox' id='country' name='country' value='Ethiopia' />Ethiopia<input type='checkbox' id='country' name='country' value='Gabon' />Gabon<input type='checkbox' id='country' name='country' value='The Gambia' />The Gambia<input type='checkbox' id='country' name='country' value='Ghana' />Ghana<input type='checkbox' id='country' name='country' value='Guinea' />Guinea<input type='checkbox' id='country' name='country' value='Kenya' />Kenya<input type='checkbox' id='country' name='country' value='Lesotho' />Lesotho<input type='checkbox' id='country' name='country' value='Liberia' />Liberia<input type='checkbox' id='country' name='country' value='Libya' />Libya<input type='checkbox' id='country' name='country' value='Madagascar' />Madagascar<input type='checkbox' id='country' name='country' value='Malawi' />Malawi<input type='checkbox' id='country' name='country' value='Mali' />Mali<input type='checkbox' id='country' name='country' value='Mauritania' />Mauritania<input type='checkbox' id='country' name='country' value='Mauritius' />Mauritius<input type='checkbox' id='country' name='country' value='Morocco' />Morocco<input type='checkbox' id='country' name='country' value='Mozambique' />Mozambique<input type='checkbox' id='country' name='country' value='Namibia' />Namibia<input type='checkbox' id='country' name='country' value='Niger' />Niger<input type='checkbox' id='country' name='country' value='Nigeria' />Nigeria<input type='checkbox' id='country' name='country' value='Rwanda' />Rwanda<input type='checkbox' id='country' name='country' value='S?o Tom' />S?o Tom<input type='checkbox' id='country' name='country' value='Senegal' />Senegal<input type='checkbox' id='country' name='country' value='Seychelles' />Seychelles<input type='checkbox' id='country' name='country' value='Sierra Leone' />Sierra Leone<input type='checkbox' id='country' name='country' value='Somalia' />Somalia<input type='checkbox' id='country' name='country' value='South Africa' />South Africa<input type='checkbox' id='country' name='country' value='South Sudan' />South Sudan<input type='checkbox' id='country' name='country' value='Sudan' />Sudan<input type='checkbox' id='country' name='country' value='Swaziland' />Swaziland<input type='checkbox' id='country' name='country' value='Tanzania  es Salaam, Dodoma' />Tanzania  es Salaam, Dodoma<input type='checkbox' id='country' name='country' value='Togo' />Togo<input type='checkbox' id='country' name='country' value='Tunisia' />Tunisia<input type='checkbox' id='country' name='country' value='Uganda' />Uganda<input type='checkbox' id='country' name='country' value='Western Sahara' />Western Sahara<input type='checkbox' id='country' name='country' value='Zambia' />Zambia<input type='checkbox' id='country' name='country' value='Zaire' />Zaire<input type='checkbox' id='country' name='country' value='Zimbabwe' />Zimbabwe");
				break;
			case 'Asia':
				$("#country_append").append("<input type='checkbox' id='country' name='country' value='Afghanistan'>Afghanistan<input type='checkbox' id='country' name='country' value='Armenia'>Armenia<input type='checkbox' id='country' name='country' value='Azerbaijan'>Azerbaijan<input type='checkbox' id='country' name='country' value='Bahrain'>Bahrain<input type='checkbox' id='country' name='country' value='Bangladesh'>Bangladesh<input type='checkbox' id='country' name='country' value='Bhutan'>Bhutan<input type='checkbox' id='country' name='country' value='Brunei'>Brunei<input type='checkbox' id='country' name='country' value='Cambodia'>Cambodia<input type='checkbox' id='country' name='country' value='China'>China<input type='checkbox' id='country' name='country' value='Taiwan'>China (Taiwan)<input type='checkbox' id='country' name='country' value='Hong Kong'>China (Hong Kong)<input type='checkbox' id='country' name='country' value='Macao'>China (Macao)<input type='checkbox' id='country' name='country' value='East Timor'>East Timor<input type='checkbox' id='country' name='country' value='India'>India<input type='checkbox' id='country' name='country' value='Indonesia'>Indonesia<input type='checkbox' id='country' name='country' value='Iran'>Iran<input type='checkbox' id='country' name='country' value='Iraq'>Iraq<input type='checkbox' id='country' name='country' value='Israel '>Israel<input type='checkbox' id='country' name='country' value='Palestine'>Palestine<input type='checkbox' id='country' name='country' value='Japan'>Japan<input type='checkbox' id='country' name='country' value='Jordan'>Jordan<input type='checkbox' id='country' name='country' value='Kazakhstan'>Kazakhstan<input type='checkbox' id='country' name='country' value='Kuwait'>Kuwait<input type='checkbox' id='country' name='country' value='Kyrgyzstan'>Kyrgyzstan<input type='checkbox' id='country' name='country' value='Laos'>Laos<input type='checkbox' id='country' name='country' value='Lebanon '>Lebanon<input type='checkbox' id='country' name='country' value='Malaysia'>Malaysia<input type='checkbox' id='country' name='country' value='Maldives'>Maldives<input type='checkbox' id='country' name='country' value='Mongolia'>Mongolia<input type='checkbox' id='country' name='country' value='Myanmar'>Myanmar<input type='checkbox' id='country' name='country' value='Nepal'>Nepal<input type='checkbox' id='country' name='country' value='North Korea'>North Korea<input type='checkbox' id='country' name='country' value='Oman'>Oman<input type='checkbox' id='country' name='country' value='Pakistan'>Pakistan<input type='checkbox' id='country' name='country' value='Philippines'>Philippines<input type='checkbox' id='country' name='country' value='Qatar'>Qatar<input type='checkbox' id='country' name='country' value='Russia'>Russia<input type='checkbox' id='country' name='country' value='Saudi Arabia'>Saudi Arabia<input type='checkbox' id='country' name='country' value='Singapore'>Singapore<input type='checkbox' id='country' name='country' value='South Korea'>South Korea<input type='checkbox' id='country' name='country' value='Sri Lanka '>Sri Lanka<input type='checkbox' id='country' name='country' value='Syria'>Syria<input type='checkbox' id='country' name='country' value='Tajikistan'>Tajikistan<input type='checkbox' id='country' name='country' value='Thailand'>Thailand<input type='checkbox' id='country' name='country' value='Tibet'>Tibet<input type='checkbox' id='country' name='country' value='Turkey'>Turkey<input type='checkbox' id='country' name='country' value='Turkmenistan'>Turkmenistan<input type='checkbox' id='country' name='country' value='United Arab Emirates '>United Arab Emirates<input type='checkbox' id='country' name='country' value='Uzbekistan'>Uzbekistan<input type='checkbox' id='country' name='country' value='Vietnam'>Vietnam<input type='checkbox' id='country' name='country' value='Yemen'>Yemen");
				
				break;
			case 'North America':
				$("#country_append").append("<input type='checkbox' id='country' name='country' value='United States'>United States<input type='checkbox' id='country' name='country' value='Mexico'>Mexico<input type='checkbox' id='country' name='country' value='Canada'>Canada<input type='checkbox' id='country' name='country' value='Greenland'>Greenland");
				break;
			case 'South America':
				$("#country_append").append("<input type='checkbox' id='country' name='country' value='Argentina'>Argentina<input type='checkbox' id='country' name='country' value='Bolivia'>Bolivia<input type='checkbox' id='country' name='country' value='Brazil'>Brazil<input type='checkbox' id='country' name='country' value='Chile'>Chile<input type='checkbox' id='country' name='country' value='Colombia'>Colombia<input type='checkbox' id='country' name='country' value='Ecuador'>Ecuador<input type='checkbox' id='country' name='country' value='French Guiana'>French Guiana<input type='checkbox' id='country' name='country' value='Guyana'>Guyana<input type='checkbox' id='country' name='country' value='Paraguay'>Paraguay<input type='checkbox' id='country' name='country' value='Peru'>Peru<input type='checkbox' id='country' name='country' value='Suriname'>Suriname<input type='checkbox' id='country' name='country' value='Uruguay'>Uruguay<input type='checkbox' id='country' name='country' value='Venezuela'>Venezuela");
				break;
			case 'Oceania':
				$("#country_append").append("<input type='checkbox' id='country' name='country' value='Australia'>Australia<input type='checkbox' id='country' name='country' value='New Zealand'>New Zealand<input type='checkbox' id='country' name='country' value='Fiji'>Fiji<input type='checkbox' id='country' name='country' value='Papua New Guinea'>Papua New Guinea<input type='checkbox' id='country' name='country' value='Solomon Islands'>Solomon Islands<input type='checkbox' id='country' name='country' value='Vanuatu'>Vanuatu<input type='checkbox' id='country' name='country' value='Kiribati'>Kiribati<input type='checkbox' id='country' name='country' value='Marshall Islands'>Marshall Islands<input type='checkbox' id='country' name='country' value='Micronesia'>Micronesia<input type='checkbox' id='country' name='country' value='Nauru'>Nauru<input type='checkbox' id='country' name='country' value='Palau'>Palau<input type='checkbox' id='country' name='country' value='Samoa'>Samoa<input type='checkbox' id='country' name='country' value='Tonga'>Tonga<input type='checkbox' id='country' name='country' value='Tuvalu'>Tuvalu");
				break;
			case 'Central America and the Antilles':
				$("#country_append").append("<input type='checkbox' id='country' name='country' value='Antigua and Barbuda'>Antigua and Barbuda<input type='checkbox' id='country' name='country' value='Bahamas'>Bahamas<input type='checkbox' id='country' name='country' value='Barbados'>Barbados<input type='checkbox' id='country' name='country' value='Belize'>Belize<input type='checkbox' id='country' name='country' value='Cayman Islands'>Cayman Islands<input type='checkbox' id='country' name='country' value='Costa Rica'>Costa Rica<input type='checkbox' id='country' name='country' value='Cuba'>Cuba<input type='checkbox' id='country' name='country' value='Dominica'>Dominica<input type='checkbox' id='country' name='country' value='Dominican Republic'>Dominican Republic<input type='checkbox' id='country' name='country' value='El Salvador'>El Salvador<input type='checkbox' id='country' name='country' value='Grenada'>Grenada<input type='checkbox' id='country' name='country' value='Guatemala'>Guatemala<input type='checkbox' id='country' name='country' value='Haiti'>Haiti<input type='checkbox' id='country' name='country' value='Honduras'>Honduras<input type='checkbox' id='country' name='country' value='Jamaica'>Jamaica<input type='checkbox' id='country' name='country' value='Nicaragua'>Nicaragua<input type='checkbox' id='country' name='country' value='Panama'>Panama<input type='checkbox' id='country' name='country' value='Puerto Rico'>Puerto Rico<input type='checkbox' id='country' name='country' value='Saint Kitts and Nevis'>Saint Kitts and Nevis<input type='checkbox' id='country' name='country' value='Saint Lucia'>Saint Lucia<input type='checkbox' id='country' name='country' value='Saint Vincent and the Grenadines'>Saint Vincent and the Grenadines<input type='checkbox' id='country' name='country' value='Trinidad and Tobago'>Trinidad and Tobago<input type='checkbox' id='country' name='country' value='Turks and Caicos'>Turks and Caicos");
				break;
			case 'Europe':
				$("#country_append").append("<input type='checkbox' id='country' name='country' value='Albania'>Albania<input type='checkbox' id='country' name='country' value='Andorra'>Andorra<input type='checkbox' id='country' name='country' value='Austria'>Austria<input type='checkbox' id='country' name='country' value='Belarus'>Belarus<input type='checkbox' id='country' name='country' value='Belgium'>Belgium<input type='checkbox' id='country' name='country' value='Bosnia and Herzegovina'>Bosnia and Herzegovina<input type='checkbox' id='country' name='country' value='Bulgaria'>Bulgaria<input type='checkbox' id='country' name='country' value='Croatia'>Croatia<input type='checkbox' id='country' name='country' value='Cyprus'>Cyprus<input type='checkbox' id='country' name='country' value='Czech Republic'>Czech Republic<input type='checkbox' id='country' name='country' value='Denmark'>Denmark<input type='checkbox' id='country' name='country' value='Estonia'>Estonia<input type='checkbox' id='country' name='country' value='Finland'>Finland<input type='checkbox' id='country' name='country' value='France'>France<input type='checkbox' id='country' name='country' value='Georgia'>Georgia<input type='checkbox' id='country' name='country' value='Germany'>Germany<input type='checkbox' id='country' name='country' value='Greece'>Greece<input type='checkbox' id='country' name='country' value='Hungary'>Hungary<input type='checkbox' id='country' name='country' value='Iceland'>Iceland<input type='checkbox' id='country' name='country' value='Republic of Ireland'>Republic of Ireland<input type='checkbox' id='country' name='country' value='Italy'>Italy<input type='checkbox' id='country' name='country' value='Latvia'>Latvia<input type='checkbox' id='country' name='country' value='Liechtenstein'>Liechtenstein<input type='checkbox' id='country' name='country' value='Lithuania)'>Lithuania)<input type='checkbox' id='country' name='country' value='Luxembourg'>Luxembourg<input type='checkbox' id='country' name='country' value='Republic of Macedonia'>Republic of Macedonia<input type='checkbox' id='country' name='country' value='Malta'>Malta<input type='checkbox' id='country' name='country' value='Moldova'>Moldova<input type='checkbox' id='country' name='country' value='Monaco'>Monaco<input type='checkbox' id='country' name='country' value='Montenegro'>Montenegro<input type='checkbox' id='country' name='country' value='Netherlands'>Netherlands<input type='checkbox' id='country' name='country' value='Norway'>Norway<input type='checkbox' id='country' name='country' value='Poland'>Poland<input type='checkbox' id='country' name='country' value='Portugal'>Portugal<input type='checkbox' id='country' name='country' value='Romania'>Romania<input type='checkbox' id='country' name='country' value='Russia'>Russia<input type='checkbox' id='country' name='country' value='San Marino'>San Marino<input type='checkbox' id='country' name='country' value='Serbia'>Serbia<input type='checkbox' id='country' name='country' value='Slovakia'>Slovakia<input type='checkbox' id='country' name='country' value='Slovenia'>Slovenia<input type='checkbox' id='country' name='country' value='Spain'>Spain<input type='checkbox' id='country' name='country' value='Sweden'>Sweden<input type='checkbox' id='country' name='country' value='Switzerland'>Switzerland<input type='checkbox' id='country' name='country' value='Turkey'>Turkey<input type='checkbox' id='country' name='country' value='Ukraine'>Ukraine<input type='checkbox' id='country' name='country' value='United Kingdom'>United Kingdom<input type='checkbox' id='country' name='country' value='Vatican City'>Vatican City");
				break;
			default:
				break;
		}
	});
	$("#continent").click(function(){
		$("#display_country").show();
		$("#display_div").hide();
	});
	$("#country_button").click(function(){
		$("#display_country").hide();
		if(query_term['country'] == 0)
			query_term['country'] = '';
		$("input[name='country']:checked").each(function(){
			if($(this).val() == 0){
				query_term['country'] = 0;
				return false;
			}
			else{
				query_term['country'] += $(this).val()+",";
			}
		});
	});
	$("#family").change(function(){
		//alert($(this).val());
		callbackGene($(this).val());
	});
	$("#gene").change(function(){
		//var count = $("#gene option").length;
		var left = 0;
		var right = 0;
		var option = $(this).children("option");
		$(this).children("option").each(function(){
			//alert($(this).attr('selected'));
			if($(this).attr('selected') == true){
				left = $(this).attr('left');
				right = $(this).attr('right');
				//alert($(this).attr('left'));
				if(right-1 != left){		
					$("#gene").children("option").each(function(){
						if($(this).attr('left') - left > 0){
							if($(this).attr('right') - right < 0){
							if($(this).attr('selected') == false)
								$(this).attr("selected",true);
							}
						}
					});
				}
			}
		});
	});
	$("#from").jdPicker(); 
	$("#to").jdPicker();
	$("#to").change(function(){
		if($("#from").val() > $(this).val() && $(this).val() != ""){
			alert("to > from! please reset");
			//此处需要给to设置某个时间值，建议将from转化成13.。。时间，再加1 再转化过来？ 时间原因未添加
		}
	});
	$("#tlen").change(function(){
		if($("#flen").val() > $(this).val() && $(this).val() != ""){
			alert("Min > Max! please reset");
			$(this).val($("#flen").val());
		}
	});
	$("#show_result_button").click(
			function(){
				//alert($("#host").val());
				if($("#from").val() > $("#to").val() && $("#to").val() != ""){
					alert("to > from! please reset");
				}
				else if($("#flen").val() > $("#tlen").val() && $("#tlen").val() != ""){
					alert("flen > tlen! please reset");
				}
				else{
					//$('#form').submit();
					//var post_data = '';
					/*var post_data = {};
					post_data.family = convertValue($("#family").val());
					post_data.gene = convertValue($("#gene").val());
					post_data.host = convertValue($("#host").val());
					post_data.country = convertValue($("#country").val());
					post_data.type = convertValue($("#type").val());
					post_data.subtype = convertValue($("#subtype").val());
					post_data.subsubtype = convertValue($("#subsubtype").val());
					post_data.subsubsubtype = convertValue($("#subsubsubtype").val());
					post_data.from = $("#from").val();
					post_data.to = $("#to").val();*/
					//post_data =  convertValue($("#family").val()) + '||'+ convertValue($("#gene").val()) +'||'+ convertValue($("#host").val())+'||'+convertValue($("#country").val())+'||'+convertValue($("#type").val())+'||'+convertValue($("#subtype").val())+'||'+convertValue($("#subsubtype").val())+'||'+convertValue($("#subsubsubtype").val())+'||'+convertNull($("#from").val())+'||'+convertNull($("#to").val())+"||"+convertNull($("#flen").val())+"||"+convertNull($("#tlen").val());
					query_term['family'] = $("#family").val();
					query_term['from'] = convertNull($("#from").val());
					query_term['to'] = convertNull($("#to").val());
					query_term['flen'] = convertNull($("#flen").val());
					query_term['tlen'] = convertNull($("#tlen").val());
					if(query_term['country'] != 0){
						query_term['country'] = query_term['country'].substring(0,query_term['country'].length-1);
					}
					//alert(query_term['gene']);
					post_data = query_term['family'] +"||"+query_term['subfamily'] +"||"+query_term['genus'] +"||"+query_term['species'] +"||"+query_term['virus_name'] +"||"+query_term['host'] +"||"+query_term['typeA'] +"||"+query_term['typeB'] +"||"+query_term['subType'] +"||"+query_term['subsubType'] +"||"+query_term['subsubsubType']+"||"+query_term['gene']+"||"+query_term['country']+"||"+query_term['from']+"||"+query_term['to']+"||"+query_term['flen']+"||"+query_term['tlen'];
					$("#post_data").val(post_data);
					//alert(post_data);
					$('#form').submit();
				}
				
	});
	

	$("#choose_all").click(function(){
		if($(this).checked == true){
			 $("#choose").attr("checked","true");
		}
		else{
			 $("input:checkbox").attr("checked","false");
		}
		
	});
	$("#subfamily").click(function(){
		callbackData($("#family").val(),'subfamily');
	});	
	$("#genus").click(function(){
		callbackData($("#family").val(),'genus');
	});	
	$("#species").click(function(){
		callbackData($("#family").val(),'species');
	});	
	$("#virus_name").click(function(){
		callbackData($("#family").val(),'virus_name');
	});	
	
	$("#host").click(function(){
		callbackData($("#family").val(),'host');
	});	
	$("#typeA").click(function(){
		callbackData($("#family").val(),'typeA');
	});	
	$("#typeB").click(function(){
		callbackData($("#family").val(),'typeB');
	});	
	$("#subType").click(function(){
		callbackData($("#family").val(),'subType');
	});	
	$("#subsubType").click(function(){
		callbackData($("#family").val(),'subsubType');
	});	
	$("#subsubsubType").click(function(){
		callbackData($("#family").val(),'subsubsubType');
	});	
	$("#display_button").click(function(){
		query_term[display_id] = '';
		if(display_id != 0){
			$("input[name="+display_id+"]:checked").each(function(){
				if($(this).val() == 0){
					query_term[display_id] = 0;
					return false;
				}
				else{
					query_term[display_id] += $(this).val()+",";
				}
			});
		}
		if(query_term[display_id] != 0){
			query_term[display_id] = query_term[display_id].substring(0,query_term[display_id].length-1);
		}
		//alert(query_term[display_id]);
		$("#display_div").hide();
	});
});
function convertValue(value){
	if($.inArray("0",value) == -1){
		//alert(value);
		return value;
	}
	else{
		return '0';
	}
}
function convertNull(value){
	if(value != ''){
		return value;
	}
	else{
		return 0;
	}
}

function callbackData(family_id,id){
	var url = URL+"/displaySearch/family_id/" + family_id+"/id/"+id;
	$.ajax({
		url: url,
		type: 'GET',
		async: true,
		//dataType: 'json',
		success: function(data){
			$(".query_change").empty();
			$(".query_change").append("<option value='0' selected>any</option>");
			var data = JSON.parse(data);
			data = data.data;
			displayquery(id,data);
			//displaygene(data.gene);
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			//alert(XMLHttpRequest.status);
			// alert(XMLHttpRequest.readyState);
			//alert(textStatus);

		},
		complete: function (){
			
		}
	});
}
function callbackGene(family_id){
	var url = URL+"/geneSelect/family_id/" + family_id;
	$.ajax({
		url: url,
		type: 'GET',
		async: true,
		//dataType: 'json',
		success: function(data){
			$("#gene").empty();
			$("#gene").append("<option value='0' selected>any</option>");
			var data = JSON.parse(data);
			displaygene(data.data);
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
			//alert(XMLHttpRequest.status);
			// alert(XMLHttpRequest.readyState);
			//alert(textStatus);

		},
		complete: function (){
			
		}
	});
}

function displayquery(id,data){
	display_id = id;
	$("#display_div").show();
	$("#display_country").hide();
	$("#display").empty();
	$("#display").append("<input type='checkbox' name="+id+" id="+id+" value='0' checked='checked' >any");
	if(data != ''){
		for(var i=0; i<data.length;i++){
			$("#display").append("<input type='checkbox' name="+id+" id="+id+" value='"+data[i][id]+"'>"+data[i][id]);
		}
	}
}


function displaygene(gene){
	if(gene != ''){
		for(var i=0; i<gene.length;i++){
			switch (gene[i]['level']){
				case '0':
					//$("#gene").append("<option value="+gene[i]['gene_id']+"selected>"+gene[i]['name']+"</option>");
					$("#gene").append("<option value='"+gene[i]['name']+"@@"+gene[i]['parent_id']+"@@"+gene[i]['level']+"@@id:"+gene[i]['gene_id']+"' left="+gene[i]['left_value'] +" right="+gene[i]['right_value']+">"+gene[i]['name']+"</option>");
					break;
				case '1':
					$("#gene").append("<option value='"+gene[i]['name']+"@@"+gene[i]['parent_id']+"@@"+gene[i]['level']+"@@id:"+gene[i]['gene_id']+"'  left="+gene[i]['left_value'] +" right="+gene[i]['right_value']+" id=gene_"+gene[i]['gene_id']+">&nbsp;&nbsp;"+gene[i]['name']+"</option>");
					break;
				case '2':
					$("#gene_"+gene[i]['parent_id']).after("<option value='"+gene[i]['name']+"@@"+gene[i]['parent_id']+"@@"+gene[i]['level']+"@@id:"+gene[i]['gene_id']+"'  left="+gene[i]['left_value'] +" right="+gene[i]['right_value']+" id=gene_"+gene[i]['gene_id']+">&nbsp;&nbsp;&nbsp;&nbsp;"+gene[i]['name']+"</option>");
					break;
				case '3':
					$("#gene_"+gene[i]['parent_id']).after("<option value='"+gene[i]['name']+"@@"+gene[i]['parent_id']+"@@"+gene[i]['level']+"@@id:"+gene[i]['gene_id']+"' left="+gene[i]['left_value'] +" right="+gene[i]['right_value']+" id=gene_"+gene[i]['gene_id']+">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+gene[i]['name']+"</option>");
					break;
				default:
					break;
					
			}
		}
	}
			
}