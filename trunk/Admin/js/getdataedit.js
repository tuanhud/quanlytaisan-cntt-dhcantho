function getdata(){
			var data2 = new Array();
			var theme = '';
			var params='';
			http=GetXmlHttpObject();
			http.open("POST",'get_info_noidungcon.php', false);
			http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			http.onreadystatechange = function()
			{
				if(http.readyState == 4 && http.status == 200) 
				{
					var x=http.responseXML.getElementsByTagName('row');
					for(var i=0;i<x.length;i++)//lay duoc danh sach cac quyen ma can bo (macanbo) co
					{
						var row = {};
						var tennoidunglon=Math.floor(Math.random() * x.length);
						row["tenndlon"] = x[tennoidunglon];					
						data2[i] = row;
					}
				}
			}
			http.send(params);
			return data2;
}