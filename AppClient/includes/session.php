<?php
	require_once './includes/database.php';
	require_once './includes/function.php';
	
	//--Cek System--
	/*if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else   {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
	*/
	
	$ip = '127.0.0.1';
	$q_system=mysql_query("SELECT * FROM system WHERE sip='$ip'");			  		
	if (mysql_num_rows($q_system) == 1) {
		$q_system=mysql_fetch_array($q_system);
		if ($q_system['sok']==1){
			session_start();
			$sid			  = $q_system['s_id'];
			$_SESSION['sapp'] = $q_system['sapp'];
			$sno			  = $q_system['sno'];
			//--
			if (strlen($sid)==1){$sid='0'.$sid;} else{$sid=$sid;}
			if (strlen($sno)==1){$sno='0'.$sno;} else{$sno=$sno;}
		}else{
			$_SESSION['sapp'] ='off';		
		}
		//--
	} else {
		S_SYS($ip,'Kassa');
		unset($_SESSION['sapp']);
	};
	//--Cek Session--
	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==1){
		$page_default='./page/main/main.php';
		if (isset($_GET['n']) || empty($_GET['n'])){
			$bottom_left 	='./page/main/bottom_left.php';
			$header 		='./page/main/header.php';
		} else if (isset($_GET['n']) && $_GET['n']=='struk'){
			$header 		='';					
		}
		else {
			$bottom_left	='';
			$header 		='./page/main/header.php';
		};
	} else {	
		$header 		='./page/main/header.php';
		$page_default	='./page/user/user.php';
		$bottom_left	='';
	}

	$m_bottom		='./page/main/bottom_right.php';
	
	require_once './jscripts/jscripts.js';
	require_once './includes/loader.php';
	require_once './page/datetime/date.php';
    require_once './page/datetime/clock.php';
?>