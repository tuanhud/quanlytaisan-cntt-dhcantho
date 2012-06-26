<?php
	//khoi dong sesion
    session_start();
	//dinh dang file thanh file xml
	//kiem tra đã đăng nhập	
	//if (session_is_registered('maquyen') && $_SESSION['maquyen']=="AD")
	{
			include_once('../database.php');
			$kiemtra=0;
			$sltschuathanhly='';
			$db=new database();	
			$sql = "Select soluongcuadonvi from taisanthuocdonvi where mataisan='".$_POST['txt_mataisansua']."'";
			$db->setQuery($sql);
			$result = $db->fetchAll();
			$row = mysql_fetch_array($result);
			$sql3 = "Select slthanhly from taisanduocthanhly where mathanhly='".$_POST['cbo_mathanhlysua']."'";
			$db->setQuery($sql3);
			$result3 = $db->fetchAll();
			$row3 = mysql_fetch_array($result3);
			$sltsthanhly=(int)$row3[0];
			$sltshienco=(int)$row[0];
			$sltssua=(int)$_POST['txt_soluongtaisansua'];
			if($sltssua > $sltshienco){
				if($sltssua <= $sltsthanhly){
					$sltstralai=$sltsthanhly - $sltssua;
								$sltschuathanhly=$sltshienco + $sltstralai ;
								$kiemtra=1;
						}else{
								$sltsthemvao=$sltssua - $sltschuathanhly;
								if($sltsthemvao > $sltshienco){
									echo 2;
									exit;
									}else{
											$sltschuathanhly=$sltshienco - $sltsthemvao;
											$kiemtra=1;
										}
							}
				}else{
						$sltschuathanhly=$sltsthanhly - $sltssua + $sltshienco;
						$kiemtra=1;
					}
			if($kiemtra==1){
				$db->setQuery("update taisanthuocdonvi set soluongcuadonvi='".$sltschuathanhly."' where mataisan= '".$_POST['txt_matasansua']."' ");
				$db->executeQuery();
				$db->setQuery("update taisanduocthanhly set slthanhly='".$_POST['txt_soluongtaisansua']."' where mathanhly= '".$_POST['cbo_mathanhlysua']."' ");
				$db->executeQuery();
				$db->setQuery("update thanhlytaisan set diengiaithanhly='".$_POST['txt_diengiaisua']."' where mathanhly= '".$_POST['cbo_mathanhlysua']."' ");
				if($db->executeQuery()!=1)
				{
							echo 0;//sua that bai
							exit;
				}
				else
				{
							echo 1;//sua thanh cong
							exit;
				}
			}
	}
?>