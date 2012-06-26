// JavaScript Document
function checkbox_themvpp()
{
	var chks = dt.get('srcNode').all("tbody input.myCheckboxFmtr2");
			chks.each( function(item)
			{
								var rec = dt.getRecord( item.ancestor().ancestor() );
								http=GetXmlHttpObject();
								var params ="macanbo="+rec.get('id');
								//mo ket noi bang phuong thuc post
								http.open("POST",'get_list_quyen_canbo.php', false);
								//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
								http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								//http.setRequestHeader("Content-length", params.length);
								//http.setRequestHeader("Connection", "close");
								//ham xu li du lieu tra ve cua ajax send thanh cong
								http.onreadystatechange = function() 
								{
									if(http.readyState == 4 && http.status == 200) 
									   {											
												var x=http.responseXML.getElementsByTagName('RESULT');
												for(var i=0;i<x.length;i++)//lay duoc danh sach cac quyen ma can bo (macanbo) co
											   {
													if(x[i].getElementsByTagName('MAQUYEN')[0].firstChild.nodeValue=='THEMVPP')
													{
																	item.set('checked', true);
																	//alert(macanbo);
								
													}
											   }
												
									   }
								}
								http.send(params);
			})	
}
function checkbox_suavpp()
{
	var chks = dt.get('srcNode').all("tbody input.myCheckboxFmtr3");
			chks.each( function(item)
			{
								var rec = dt.getRecord( item.ancestor().ancestor() );
								http=GetXmlHttpObject();
								var params ="macanbo="+rec.get('id');
								//mo ket noi bang phuong thuc post
								http.open("POST",'get_list_quyen_canbo.php', false);
								//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
								http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								//http.setRequestHeader("Content-length", params.length);
								//http.setRequestHeader("Connection", "close");
								//ham xu li du lieu tra ve cua ajax send thanh cong
								http.onreadystatechange = function() 
								{
									if(http.readyState == 4 && http.status == 200) 
									   {											
												var x=http.responseXML.getElementsByTagName('RESULT');
												for(var i=0;i<x.length;i++)//lay duoc danh sach cac quyen ma can bo (macanbo) co
											   {
													if(x[i].getElementsByTagName('MAQUYEN')[0].firstChild.nodeValue=='SUAVPP')
													{
																	item.set('checked', true);
																	//alert(macanbo);
								
													}
											   }
												
									   }
								}
								http.send(params);
			})	
}
function checkbox_themkk()
{
	var chks = dt.get('srcNode').all("tbody input.myCheckboxFmtr4");
			chks.each( function(item)
			{
								var rec = dt.getRecord( item.ancestor().ancestor() );
								http=GetXmlHttpObject();
								var params ="macanbo="+rec.get('id');
								//mo ket noi bang phuong thuc post
								http.open("POST",'get_list_quyen_canbo.php', false);
								//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
								http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								//http.setRequestHeader("Content-length", params.length);
								//http.setRequestHeader("Connection", "close");
								//ham xu li du lieu tra ve cua ajax send thanh cong
								http.onreadystatechange = function() 
								{
									if(http.readyState == 4 && http.status == 200) 
									   {											
												var x=http.responseXML.getElementsByTagName('RESULT');
												for(var i=0;i<x.length;i++)//lay duoc danh sach cac quyen ma can bo (macanbo) co
											   {
													if(x[i].getElementsByTagName('MAQUYEN')[0].firstChild.nodeValue=='THEMKK')
													{
																	item.set('checked', true);
																	//alert(macanbo);
								
													}
											   }
												
									   }
								}
								http.send(params);
			})	
}
function checkbox_suakk()
{
	var chks = dt.get('srcNode').all("tbody input.myCheckboxFmtr5");
			chks.each( function(item)
			{
								var rec = dt.getRecord( item.ancestor().ancestor() );
								http=GetXmlHttpObject();
								var params ="macanbo="+rec.get('id');
								//mo ket noi bang phuong thuc post
								http.open("POST",'get_list_quyen_canbo.php', false);
								//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
								http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								//http.setRequestHeader("Content-length", params.length);
								//http.setRequestHeader("Connection", "close");
								//ham xu li du lieu tra ve cua ajax send thanh cong
								http.onreadystatechange = function() 
								{
									if(http.readyState == 4 && http.status == 200) 
									   {											
												var x=http.responseXML.getElementsByTagName('RESULT');
												for(var i=0;i<x.length;i++)//lay duoc danh sach cac quyen ma can bo (macanbo) co
											   {
													if(x[i].getElementsByTagName('MAQUYEN')[0].firstChild.nodeValue=='SUAKK')
													{
																	item.set('checked', true);
																	//alert(macanbo);
								
													}
											   }
												
									   }
								}
								http.send(params);
			})	
}
function checkbox_themkhms()
{
	var chks = dt.get('srcNode').all("tbody input.myCheckboxFmtr6");
			chks.each( function(item)
			{
								var rec = dt.getRecord( item.ancestor().ancestor() );
								http=GetXmlHttpObject();
								var params ="macanbo="+rec.get('id');
								//mo ket noi bang phuong thuc post
								http.open("POST",'get_list_quyen_canbo.php', false);
								//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
								http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								//http.setRequestHeader("Content-length", params.length);
								//http.setRequestHeader("Connection", "close");
								//ham xu li du lieu tra ve cua ajax send thanh cong
								http.onreadystatechange = function() 
								{
									if(http.readyState == 4 && http.status == 200) 
									   {											
												var x=http.responseXML.getElementsByTagName('RESULT');
												for(var i=0;i<x.length;i++)//lay duoc danh sach cac quyen ma can bo (macanbo) co
											   {
													if(x[i].getElementsByTagName('MAQUYEN')[0].firstChild.nodeValue=='THEMKHMS')
													{
																	item.set('checked', true);
																	//alert(macanbo);
								
													}
											   }
												
									   }
								}
								http.send(params);
			})	
}
function checkbox_suakhms()
{
	var chks = dt.get('srcNode').all("tbody input.myCheckboxFmtr7");
			chks.each( function(item)
			{
								var rec = dt.getRecord( item.ancestor().ancestor() );
								http=GetXmlHttpObject();
								var params ="macanbo="+rec.get('id');
								//mo ket noi bang phuong thuc post
								http.open("POST",'get_list_quyen_canbo.php', false);
								//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
								http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								//http.setRequestHeader("Content-length", params.length);
								//http.setRequestHeader("Connection", "close");
								//ham xu li du lieu tra ve cua ajax send thanh cong
								http.onreadystatechange = function() 
								{
									if(http.readyState == 4 && http.status == 200) 
									   {											
												var x=http.responseXML.getElementsByTagName('RESULT');
												for(var i=0;i<x.length;i++)//lay duoc danh sach cac quyen ma can bo (macanbo) co
											   {
													if(x[i].getElementsByTagName('MAQUYEN')[0].firstChild.nodeValue=='SUAKHMS')
													{
																	item.set('checked', true);
																	//alert(macanbo);
								
													}
											   }
												
									   }
								}

								http.send(params);
			})	
}
function checkbox_duyetvpp()
{
	var chks = dt.get('srcNode').all("tbody input.myCheckboxFmtr8");
			chks.each( function(item)
			{
								var rec = dt.getRecord( item.ancestor().ancestor() );
								http=GetXmlHttpObject();
								var params ="macanbo="+rec.get('id');
								//mo ket noi bang phuong thuc post
								http.open("POST",'get_list_quyen_canbo.php', false);
								//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
								http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								//http.setRequestHeader("Content-length", params.length);
								//http.setRequestHeader("Connection", "close");
								//ham xu li du lieu tra ve cua ajax send thanh cong
								http.onreadystatechange = function() 
								{
									if(http.readyState == 4 && http.status == 200) 
									   {											
												var x=http.responseXML.getElementsByTagName('RESULT');
												for(var i=0;i<x.length;i++)//lay duoc danh sach cac quyen ma can bo (macanbo) co
											   {
													if(x[i].getElementsByTagName('MAQUYEN')[0].firstChild.nodeValue=='DUYETVPP')
													{
																	item.set('checked', true);
																	//alert(macanbo);
								
													}
											   }
												
									   }
								}
								http.send(params);
			})	
}
function checkbox_duyetkk()
{
	var chks = dt.get('srcNode').all("tbody input.myCheckboxFmtr9");
			chks.each( function(item)
			{
								var rec = dt.getRecord( item.ancestor().ancestor() );
								http=GetXmlHttpObject();
								var params ="macanbo="+rec.get('id');
								//mo ket noi bang phuong thuc post
								http.open("POST",'get_list_quyen_canbo.php', false);
								//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
								http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								//http.setRequestHeader("Content-length", params.length);
								//http.setRequestHeader("Connection", "close");
								//ham xu li du lieu tra ve cua ajax send thanh cong
								http.onreadystatechange = function() 
								{
									if(http.readyState == 4 && http.status == 200) 
									   {											
												var x=http.responseXML.getElementsByTagName('RESULT');
												for(var i=0;i<x.length;i++)//lay duoc danh sach cac quyen ma can bo (macanbo) co
											   {
													if(x[i].getElementsByTagName('MAQUYEN')[0].firstChild.nodeValue=='DUYETKK')
													{
																	item.set('checked', true);
																	//alert(macanbo);
								
													}
											   }
												
									   }
								}
								http.send(params);
			})	
}
function checkbox_duyetkhms()
{
	var chks = dt.get('srcNode').all("tbody input.myCheckboxFmtr10");
			chks.each( function(item)
			{
								var rec = dt.getRecord( item.ancestor().ancestor() );
								http=GetXmlHttpObject();
								var params ="macanbo="+rec.get('id');
								//mo ket noi bang phuong thuc post
								http.open("POST",'get_list_quyen_canbo.php', false);
								//gui thong tin header cua phuong thuc post , cac thong so nay la bat buoc
								http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								//http.setRequestHeader("Content-length", params.length);
								//http.setRequestHeader("Connection", "close");
								//ham xu li du lieu tra ve cua ajax send thanh cong
								http.onreadystatechange = function() 
								{
									if(http.readyState == 4 && http.status == 200) 
									   {											
												var x=http.responseXML.getElementsByTagName('RESULT');
												for(var i=0;i<x.length;i++)//lay duoc danh sach cac quyen ma can bo (macanbo) co
											   {
													if(x[i].getElementsByTagName('MAQUYEN')[0].firstChild.nodeValue=='DUYETKHMS')
													{
																	item.set('checked', true);
																	//alert(macanbo);
								
													}
											   }
												
									   }
								}
								http.send(params);
			})	
}