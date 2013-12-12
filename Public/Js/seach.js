$(document).ready( function() {
	callbackData($("#family").val());
	$("#continent").change(function(){
		$("#country").empty();
		$("#country").append("<option value='0' selected>any</option>");
		if($(this).val() == '7')
				$("#country").append("<option value='Albania'>Albania</option><option value='Andorra'>Andorra</option><option value='Austria'>Austria</option><option value='Belarus'>Belarus</option><option value='Belgium'>Belgium</option><option value='Bosnia and Herzegovina'>Bosnia and Herzegovina</option><option value='Bulgaria'>Bulgaria</option><option value='Croatia'>Croatia</option><option value='Cyprus'>Cyprus</option><option value='Czech Republic'>Czech Republic</option><option value='Denmark'>Denmark</option><option value='Estonia'>Estonia</option><option value='Finland'>Finland</option><option value='France'>France</option><option value='Georgia'>Georgia</option><option value='Germany'>Germany</option><option value='Greece'>Greece</option><option value='Hungary'>Hungary</option><option value='Iceland'>Iceland</option><option value='Republic of Ireland'>Republic of Ireland</option><option value='Italy'>Italy</option><option value='Latvia'>Latvia</option><option value='Liechtenstein'>Liechtenstein</option><option value='Lithuania)'>Lithuania)</option><option value='Luxembourg'>Luxembourg</option><option value='Republic of Macedonia'>Republic of Macedonia</option><option value='Malta'>Malta</option><option value='Moldova'>Moldova</option><option value='Monaco'>Monaco</option><option value='Montenegro'>Montenegro</option><option value='Netherlands'>Netherlands</option><option value='Norway'>Norway</option><option value='Poland'>Poland</option><option value='Portugal'>Portugal</option><option value='Romania'>Romania</option><option value='Russia'>Russia</option><option value='San Marino'>San Marino</option><option value='Serbia'>Serbia</option><option value='Slovakia'>Slovakia</option><option value='Slovenia'>Slovenia</option><option value='Spain'>Spain</option><option value='Sweden'>Sweden</option><option value='Switzerland'>Switzerland</option><option value='Turkey'>Turkey</option><option value='Ukraine'>Ukraine</option><option value='United Kingdom'>United Kingdom</option><option value='Vatican City'>Vatican City</option>");
		else if($(this).val() == '1')
				$("#country").append("<option value='Algeria'>Algeria</option><option value='Angola'>Angola</option><option value='Benin '>Benin</option><option value='Botswana'>Botswana</option><option value='Burkina Faso'>Burkina Faso</option><option value='Burundi'>Burundi</option><option value='Cameroon'>Cameroon</option><option value='Cape Verde'>Cape Verde</option><option value='Central African Republic '>Central African Republic</option><option value='Chad'>Chad</option><option value='Comoros'>Comoros</option><option value='Republic of the Congo'>Republic of the Congo</option><option value='Democratic Republic of the Congo'>Democratic Republic of the Congo</option><option value='Algeria'>Algeria</option><option value='Angola'>Angola</option><option value='Benin '>Benin</option><option value='Botswana'>Botswana</option><option value='Burkina Faso'>Burkina Faso</option><option value='Burundi'>Burundi</option><option value='Cameroon'>Cameroon</option><option value='Cape Verde'>Cape Verde</option><option value='Central African Republic '>Central African Republic</option><option value='Chad'>Chad</option><option value='Comoros'>Comoros</option><option value='Republic of the Congo'>Republic of the Congo</option><option value='Democratic Republic of the Congo'>Democratic Republic of the Congo</option><option value='(Ivory Coast)'>(Ivory Coast)</option><option value='Djibouti'>Djibouti</option><option value='Egypt'>Egypt</option><option value='Equatorial Guinea'>Equatorial Guinea</option><option value='Eritrea'>Eritrea</option><option value='Ethiopia'>Ethiopia</option><option value='Gabon'>Gabon</option><option value='The Gambia'>The Gambia</option><option value='Ghana'>Ghana</option><option value='Guinea'>Guinea</option><option value='Guinea'>Guinea</option><option value='Kenya'>Kenya</option><option value='Lesotho'>Lesotho</option><option value='Liberia'>Liberia</option><option value='Libya'>Libya</option><option value='Madagascar'>Madagascar</option><option value='Malawi'>Malawi</option><option value='Mali'>Mali</option><option value='Mauritania'>Mauritania</option><option value='Mauritius'>Mauritius</option><option value='Morocco '>Morocco</option><option value='Mozambique'>Mozambique</option><option value='Namibia'>Namibia</option><option value='Niger'>Niger</option><option value='Nigeria'>Nigeria</option><option value='Rwanda'>Rwanda</option><option value='S?o Tom'>S?o Tom</option><option value='Senegal'>Senegal</option><option value='Seychelles'>Seychelles</option><option value='Sierra Leone'>Sierra Leone</option><option value='Somalia'>Somalia</option><option value='South Africa'>South Africa</option><option value='South Sudan'>South Sudan</option><option value='Sudan'>Sudan</option><option value='Swaziland'>Swaziland</option><option value='Tanzania  es Salaam, Dodoma'>Tanzania  es Salaam, Dodoma</option><option value='Togo'>Togo</option><option value='Tunisia'>Tunisia</option><option value='Uganda'>Uganda</option><option value='Western Sahara'>Western Sahara</option><option value='Zambia'>Zambia</option><option value='Zaire'>Zaire</option><option value='Zimbabwe'>Zimbabwe</option>");
		else if($(this).val() == '2')
				$("#country").append("<option value='Afghanistan'>Afghanistan</option><option value='Armenia'>Armenia</option><option value='Azerbaijan'>Azerbaijan</option><option value='Bahrain'>Bahrain</option><option value='Bangladesh'>Bangladesh</option><option value='Bhutan'>Bhutan</option><option value='Brunei'>Brunei</option><option value='Cambodia'>Cambodia</option><option value='China'>China</option><option value='Taiwan'>China (Taiwan)</option><option value='Hong Kong'>China (Hong Kong)</option><option value='Macao'>China (Macao)</option><option value='East Timor'>East Timor</option><option value='India'>India</option><option value='Indonesia'>Indonesia</option><option value='Iran'>Iran</option><option value='Iraq'>Iraq</option><option value='Israel '>Israel</option><option value='Palestine'>Palestine</option><option value='Japan'>Japan</option><option value='Jordan'>Jordan</option><option value='Kazakhstan'>Kazakhstan</option><option value='Kuwait'>Kuwait</option><option value='Kyrgyzstan'>Kyrgyzstan</option><option value='Laos'>Laos</option><option value='Lebanon '>Lebanon</option><option value='Malaysia'>Malaysia</option><option value='Maldives'>Maldives</option><option value='Mongolia'>Mongolia</option><option value='Myanmar'>Myanmar</option><option value='Nepal'>Nepal</option><option value='North Korea'>North Korea</option><option value='Oman'>Oman</option><option value='Pakistan'>Pakistan</option><option value='Philippines'>Philippines</option><option value='Qatar'>Qatar</option><option value='Russia'>Russia</option><option value='Saudi Arabia'>Saudi Arabia</option><option value='Singapore'>Singapore</option><option value='South Korea'>South Korea</option><option value='Sri Lanka '>Sri Lanka</option><option value='Syria'>Syria</option><option value='Tajikistan'>Tajikistan</option><option value='Thailand'>Thailand</option><option value='Tibet'>Tibet</option><option value='Turkey'>Turkey</option><option value='Turkmenistan'>Turkmenistan</option><option value='United Arab Emirates '>United Arab Emirates</option><option value='Uzbekistan'>Uzbekistan</option><option value='Vietnam'>Vietnam</option><option value='Yemen'>Yemen</option>");
		else if($(this).val() == '3')
				$("#country").append("<option value='United States'>United States</option><option value='Mexico'>Mexico</option><option value='Canada'>Canada</option><option value='Greenland'>Greenland</option>");
		else if($(this).val() == '4')
				$("#country").append("<option value='Argentina'>Argentina</option><option value='Bolivia'>Bolivia</option><option value='Brazil'>Brazil</option><option value='Chile'>Chile</option><option value='Colombia'>Colombia</option><option value='Ecuador'>Ecuador</option><option value='French Guiana'>French Guiana</option><option value='Guyana'>Guyana</option><option value='Paraguay'>Paraguay</option><option value='Peru'>Peru</option><option value='Suriname'>Suriname</option><option value='Uruguay'>Uruguay</option><option value='Venezuela'>Venezuela</option>");
		else if($(this).val() == '5')
				$("#country").append("<option value='Australia'>Australia</option><option value='New Zealand'>New Zealand</option><option value='Fiji'>Fiji</option><option value='Papua New Guinea'>Papua New Guinea</option><option value='Solomon Islands'>Solomon Islands</option><option value='Vanuatu'>Vanuatu</option><option value='Kiribati'>Kiribati</option><option value='Marshall Islands'>Marshall Islands</option><option value='Micronesia'>Micronesia</option><option value='Nauru'>Nauru</option><option value='Palau'>Palau</option><option value='Samoa'>Samoa</option><option value='Tonga'>Tonga</option><option value='Tuvalu'>Tuvalu</option>");
		else if($(this).val() == '6')
				$("#country").append("<option value='Antigua and Barbuda'>Antigua and Barbuda</option><option value='Bahamas'>Bahamas</option><option value='Barbados'>Barbados</option><option value='Belize'>Belize</option><option value='Cayman Islands'>Cayman Islands</option><option value='Costa Rica'>Costa Rica</option><option value='Cuba'>Cuba</option><option value='Dominica'>Dominica</option><option value='Dominican Republic'>Dominican Republic</option><option value='El Salvador'>El Salvador</option><option value='Grenada'>Grenada</option><option value='Guatemala'>Guatemala</option><option value='Haiti'>Haiti</option><option value='Honduras'>Honduras</option><option value='Jamaica'>Jamaica</option><option value='Nicaragua'>Nicaragua</option><option value='Panama'>Panama</option><option value='Puerto Rico'>Puerto Rico</option><option value='Saint Kitts and Nevis'>Saint Kitts and Nevis</option><option value='Saint Lucia'>Saint Lucia</option><option value='Saint Vincent and the Grenadines'>Saint Vincent and the Grenadines</option><option value='Trinidad and Tobago'>Trinidad and Tobago</option><option value='Turks and Caicos'>Turks and Caicos</option>");
	});
	$("#family").change(function(){
		//alert($(this).val());
		callbackData($(this).val());
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
					var post_data = '';
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
					post_data =  convertValue($("#family").val()) + '||'+ convertValue($("#gene").val()) +'||'+ convertValue($("#host").val())+'||'+convertValue($("#country").val())+'||'+convertValue($("#type").val())+'||'+convertValue($("#subtype").val())+'||'+convertValue($("#subsubtype").val())+'||'+convertValue($("#subsubsubtype").val())+'||'+convertNull($("#from").val())+'||'+convertNull($("#to").val())+"||"+convertNull($("#flen").val())+"||"+convertNull($("#tlen").val());
						
					$("#post_data").val(post_data);
					//alert($("#post_data").val());
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

function callbackData(family_id){
	var url = URL+"/geneSelect/family_id/" + family_id;
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
			displayquery('subfamily',data.subfamily);
			displayquery('genus',data.genus);
			displayquery('species',data.species);
			displayquery('virus_name',data.virus_name);
			displayquery('host',data.host);
			displayquery('typeA',data.typeA);
			displayquery('typeB',data.typeB);
			displayquery('subtype',data.subtype);
			displayquery('subsubtype',data.subsubtype);
			displayquery('subsubsubtype',data.subsubsubtype);
			displaygene(data.gene);
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
	if(data != ''){
		for(var i=0; i<data.length;i++){
			$("#"+id).append("<option value="+data[i][id]+" title="+data[i][id]+">"+data[i][id]+"</option>");
		}
	}
}


function displaygene(gene){
	if(gene != ''){
		for(var i=0; i<gene.length;i++){
			switch (gene[i]['level']){
				case '0':
					//$("#gene").append("<option value="+gene[i]['gene_id']+"selected>"+gene[i]['name']+"</option>");
					$("#gene").append("<option value="+gene[i]['gene_id']+" left="+gene[i]['left_value'] +" right="+gene[i]['right_value']+">"+gene[i]['name']+"</option>");
					break;
				case '1':
					$("#gene").append("<option value="+gene[i]['gene_id']+"  left="+gene[i]['left_value'] +" right="+gene[i]['right_value']+" id=gene_"+gene[i]['gene_id']+">&nbsp;&nbsp;"+gene[i]['name']+"</option>");
					break;
				case '2':
					$("#gene_"+gene[i]['parent_id']).after("<option value="+gene[i]['gene_id']+"  left="+gene[i]['left_value'] +" right="+gene[i]['right_value']+" id=gene_"+gene[i]['gene_id']+">&nbsp;&nbsp;&nbsp;&nbsp;"+gene[i]['name']+"</option>");
					break;
				case '3':
					$("#gene_"+gene[i]['parent_id']).after("<option value="+gene[i]['gene_id']+" left="+gene[i]['left_value'] +" right="+gene[i]['right_value']+" id=gene_"+gene[i]['gene_id']+">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"+gene[i]['name']+"</option>");
					break;
				default:
					break;
					
			}
		}
	}
			
}