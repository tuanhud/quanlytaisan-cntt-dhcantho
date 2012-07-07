// JavaScript Document
function checkbox_admin()
{
	var chks = dt.get('srcNode').all("tbody input.ADMIN");
			chks.each( function(item)
			{
								var rec = dt.getRecord( item.ancestor().ancestor() );
								http=GetXmlHttpObject();
								var params ="macanbo="+rec.get('id');
								http.open("POST",'get_list_quyen_canbo.php', false);
								http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								http.onreadystatechange = function() 
								{
									if(http.readyState == 4 && http.status == 200) 
									   {											
												var x=http.responseXML.getElementsByTagName('RESULT');
												for(var i=0;i<x.length;i++)
											    {
													if(x[i].getElementsByTagName('MAQUYEN')[0].firstChild.nodeValue=='ADMIN')
													{
														item.set('checked', true);
														
														var DUYETVPP = dt.get('srcNode').all("tbody input.DUYETVPP");
														DUYETVPP.each( function(item)
														{
															var rec2 = dt.getRecord( item.ancestor().ancestor() );
															if(rec2.get('id')==rec.get('id'))
															{
																item.set('hidden', false);
																
															}
														})
														
														var DUYETKHMS = dt.get('srcNode').all("tbody input.DUYETKHMS");
														DUYETKHMS.each( function(item)
														{
															var rec2 = dt.getRecord( item.ancestor().ancestor() );
															if(rec2.get('id')==rec.get('id'))
															{
																item.set('hidden', false);
																
															}
														})
														
														var QLKK = dt.get('srcNode').all("tbody input.QLKK");
														QLKK.each( function(item)
														{
															var rec2 = dt.getRecord( item.ancestor().ancestor() );
															if(rec2.get('id')==rec.get('id'))
															{
																item.set('hidden', false);
																
															}
														})
														
														var LOCKKK = dt.get('srcNode').all("tbody input.LOCKKK");
														LOCKKK.each( function(item)
														{
															var rec2 = dt.getRecord( item.ancestor().ancestor() );
															if(rec2.get('id')==rec.get('id'))
															{
																item.set('hidden', false);
																
															}
														})
														
														var QLVPP = dt.get('srcNode').all("tbody input.QLVPP");
														QLVPP.each( function(item)
														{
															var rec2 = dt.getRecord( item.ancestor().ancestor() );
															if(rec2.get('id')==rec.get('id'))
															{
																item.set('hidden', false);
															
															}
														})
														
														var QLKHMS = dt.get('srcNode').all("tbody input.QLKHMS");
														QLKHMS.each( function(item)
														{
															var rec2 = dt.getRecord( item.ancestor().ancestor() );
															if(rec2.get('id')==rec.get('id'))
															{
																item.set('hidden', false);
															
															}
														})
													}
												}		
									   }
								}
								http.send(params);
			})	
}
function checkbox_cbqlbm()
{
	var chks = dt.get('srcNode').all("tbody input.CBQLBM");
			chks.each( function(item)
			{
								var rec = dt.getRecord( item.ancestor().ancestor() );
								http=GetXmlHttpObject();
								var params ="macanbo="+rec.get('id');
								http.open("POST",'get_list_quyen_canbo.php', false);
								http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								http.onreadystatechange = function() 
								{
									if(http.readyState == 4 && http.status == 200) 
									   {											
												var x=http.responseXML.getElementsByTagName('RESULT');
												for(var i=0;i<x.length;i++)
											   {
													if(x[i].getElementsByTagName('MAQUYEN')[0].firstChild.nodeValue=='CBQLBM')
													{
														item.set('checked', true);
														
														var PDTVPP = dt.get('srcNode').all("tbody input.PDTVPP");
														PDTVPP.each( function(item)
														{
															var rec2 = dt.getRecord( item.ancestor().ancestor() );
															if(rec2.get('id')==rec.get('id'))
															{
																item.set('hidden', false);
																
															}
														})
														
														var DUYETKHMSBM = dt.get('srcNode').all("tbody input.DUYETKHMSBM");
														DUYETKHMSBM.each( function(item)
														{
															var rec2 = dt.getRecord( item.ancestor().ancestor() );
															if(rec2.get('id')==rec.get('id'))
															{
																item.set('hidden', false);
															
															}
														})
													}
											   }
											  
									   }
								}
								http.send(params);
			})	
}
function checkbox_gv()
{
	var chks = dt.get('srcNode').all("tbody input.GV");
			chks.each( function(item)
			{
								var rec = dt.getRecord( item.ancestor().ancestor() );
								http=GetXmlHttpObject();
								var params ="macanbo="+rec.get('id');
								http.open("POST",'get_list_quyen_canbo.php', false);
								http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								http.onreadystatechange = function() 
								{
									if(http.readyState == 4 && http.status == 200) 
									   {											
												var x=http.responseXML.getElementsByTagName('RESULT');
												for(var i=0;i<x.length;i++)
											   {
													if(x[i].getElementsByTagName('MAQUYEN')[0].firstChild.nodeValue=='GV')
													{
																	item.set('checked', true);
													}
											   }
												
									   }
								}
								http.send(params);
			})	
}
function checkbox_duyetvpp()
{
	var chks = dt.get('srcNode').all("tbody input.DUYETVPP");
			chks.each( function(item)
			{
				item.set('hidden', true);
								var rec = dt.getRecord( item.ancestor().ancestor() );
								http=GetXmlHttpObject();
								var params ="macanbo="+rec.get('id');
								http.open("POST",'get_list_quyen_canbo.php', false);
								http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								http.onreadystatechange = function() 
								{
									if(http.readyState == 4 && http.status == 200) 
									   {											
												var x=http.responseXML.getElementsByTagName('RESULT');
												for(var i=0;i<x.length;i++)
											   {
													if(x[i].getElementsByTagName('MAQUYEN')[0].firstChild.nodeValue=='DUYETVPP')
													{
														item.set('checked', true);
													}
											   }
												
									   }
								}
								http.send(params);
			})	
}
function checkbox_duyetkhms()
{
	var chks = dt.get('srcNode').all("tbody input.DUYETKHMS");
			chks.each( function(item)
			{
								item.set('hidden', true);
								var rec = dt.getRecord( item.ancestor().ancestor() );
								http=GetXmlHttpObject();
								var params ="macanbo="+rec.get('id');
								http.open("POST",'get_list_quyen_canbo.php', false);
								http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								http.onreadystatechange = function() 
								{
									if(http.readyState == 4 && http.status == 200) 
									   {											
												var x=http.responseXML.getElementsByTagName('RESULT');
												for(var i=0;i<x.length;i++)
											   {
													if(x[i].getElementsByTagName('MAQUYEN')[0].firstChild.nodeValue=='DUYETKHMS')
													{
																	item.set('checked', true);
													}
											   }
												
									   }
								}
								http.send(params);
			})	
}
function checkbox_qlkk()
{
	var chks = dt.get('srcNode').all("tbody input.QLKK");
			chks.each( function(item)
			{
				item.set('hidden', true);
								var rec = dt.getRecord( item.ancestor().ancestor() );
								http=GetXmlHttpObject();
								var params ="macanbo="+rec.get('id');
								http.open("POST",'get_list_quyen_canbo.php', false);
								http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								http.onreadystatechange = function() 
								{
									if(http.readyState == 4 && http.status == 200) 
									   {											
												var x=http.responseXML.getElementsByTagName('RESULT');
												for(var i=0;i<x.length;i++)
											   {
													if(x[i].getElementsByTagName('MAQUYEN')[0].firstChild.nodeValue=='QLKK')
													{
																	item.set('checked', true);		
													}
											   }
												
									   }
								}
								http.send(params);
			})	
}
function checkbox_lockkk()
{
	var chks = dt.get('srcNode').all("tbody input.LOCKKK");
			chks.each( function(item)
			{
				item.set('hidden', true);
								var rec = dt.getRecord( item.ancestor().ancestor() );
								http=GetXmlHttpObject();
								var params ="macanbo="+rec.get('id');
								http.open("POST",'get_list_quyen_canbo.php', false);
								http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								http.onreadystatechange = function() 
								{
									if(http.readyState == 4 && http.status == 200) 
									   {											
												var x=http.responseXML.getElementsByTagName('RESULT');
												for(var i=0;i<x.length;i++)
											   {
													if(x[i].getElementsByTagName('MAQUYEN')[0].firstChild.nodeValue=='LOCKKK')
													{
																	item.set('checked', true);
													}
											   }
												
									   }
								}
								http.send(params);
			})	
}
function checkbox_qlvpp()
{
	var chks = dt.get('srcNode').all("tbody input.QLVPP");
			chks.each( function(item)
			{
				item.set('hidden', true);
								var rec = dt.getRecord( item.ancestor().ancestor() );
								http=GetXmlHttpObject();
								var params ="macanbo="+rec.get('id');
								http.open("POST",'get_list_quyen_canbo.php', false);
								http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								http.onreadystatechange = function() 
								{
									if(http.readyState == 4 && http.status == 200) 
									   {											
												var x=http.responseXML.getElementsByTagName('RESULT');
												for(var i=0;i<x.length;i++)
											   {
													if(x[i].getElementsByTagName('MAQUYEN')[0].firstChild.nodeValue=='QLVPP')
													{
																	item.set('checked', true);
													}
											   }
												
									   }
								}
								http.send(params);
			})	
}
function checkbox_qlkhms()
{
	var chks = dt.get('srcNode').all("tbody input.QLKHMS");
			chks.each( function(item)
			{
				item.set('hidden', true);
								var rec = dt.getRecord( item.ancestor().ancestor() );
								http=GetXmlHttpObject();
								var params ="macanbo="+rec.get('id');
								http.open("POST",'get_list_quyen_canbo.php', false);
								http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								http.onreadystatechange = function() 
								{
									if(http.readyState == 4 && http.status == 200) 
									   {											
												var x=http.responseXML.getElementsByTagName('RESULT');
												for(var i=0;i<x.length;i++)
											   {
													if(x[i].getElementsByTagName('MAQUYEN')[0].firstChild.nodeValue=='QLKHMS')
													{
																	item.set('checked', true);
													}
											   }	
									   }
								}

								http.send(params);
			})	
}
function checkbox_pdtvpp()
{
	var chks = dt.get('srcNode').all("tbody input.PDTVPP");
			chks.each( function(item)
			{
								item.set('hidden', true);
								var rec = dt.getRecord( item.ancestor().ancestor() );
								http=GetXmlHttpObject();
								var params ="macanbo="+rec.get('id');
								http.open("POST",'get_list_quyen_canbo.php', false);
								http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								http.onreadystatechange = function() 
								{
									if(http.readyState == 4 && http.status == 200) 
									   {											
												var x=http.responseXML.getElementsByTagName('RESULT');
												for(var i=0;i<x.length;i++)
											   {
													if(x[i].getElementsByTagName('MAQUYEN')[0].firstChild.nodeValue=='PDTVPP')
													{
																	item.set('checked', true);
													}
											   }	
									   }
								}
								http.send(params);
			})	
}
function checkbox_duyetkhmsbm()
{
	var chks = dt.get('srcNode').all("tbody input.DUYETKHMSBM");
			chks.each( function(item)
			{
								item.set('hidden', true);
								var rec = dt.getRecord( item.ancestor().ancestor() );
								http=GetXmlHttpObject();
								var params ="macanbo="+rec.get('id');
								http.open("POST",'get_list_quyen_canbo.php', false);
								http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
								http.onreadystatechange = function() 
								{
									if(http.readyState == 4 && http.status == 200) 
									   {											
												var x=http.responseXML.getElementsByTagName('RESULT');
												for(var i=0;i<x.length;i++)
											   {
												if(x[i].getElementsByTagName('MAQUYEN')[0].firstChild.nodeValue=='DUYETKHMSBM')
													{
																	item.set('checked', true);
													}
											   }	
									   }
								}
								http.send(params);
			})	
}
