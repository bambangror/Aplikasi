<style type="text/css">
#time {
	position:absolute;
	margin:0px;
	padding:0px;
}
</style>
<?php
ob_start();
?>
<div id="jam">
<script language="javascript">
	jam();
	function jam(){
		var time = new Date();
		document.getElementById('jam').innerHTML = time.getHours()+ ":" + time.getMinutes() + ":" + time.getSeconds();
		setTimeout("jam()", 1000);
	}
</script>
</div>
<?php
$jam = ob_get_contents();
ob_end_clean();
?>

