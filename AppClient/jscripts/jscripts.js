<script language="javascript">
	function TO_INDEX() {
		setTimeout('self.location.href = "index.php"',1000);
	}
	
	function TO_MAIN() {
		setTimeout('self.location.href = "index.php"',1);
	}
	
	function TO_OUT() {
		self.location.href ="?n=out";
	}
	
	function IN_INT() {
		document.getElementById("idmodal").onkeypress=function(e){
		var e=window.event || e
		var keyunicode=e.charCode || e.keyCode
		return (keyunicode>=48 && keyunicode<=57 || keyunicode==8 || keyunicode==46)? true : false
		}
	}
	
	function IN_BINT() {
		document.getElementById("idbarcode").onkeypress=function(e){
		var e=window.event || e
		var keyunicode=e.charCode || e.keyCode
		return ((keyunicode>=48 && keyunicode<=57) || keyunicode==8 || keyunicode==46 || keyunicode==32)? true : false
		}
	}
	
	function IN_TINT() {
		document.getElementById("idttnama").onkeypress=function(e){
		var e=window.event || e
		var keyunicode=e.charCode || e.keyCode
		return ((keyunicode>=48 && keyunicode<=57) || keyunicode==8 || keyunicode==46)? true : false
		}
	}
	
	function setUR_focus(){
		document.forms[0].username.focus();
		setTimeout("setUR_focus()", 10000);
	}
//--Js Main--	
	function setBR_focus(){
		document.forms[0].barcode.focus();
		setTimeout("setBR_focus()", 3000);
	}
	
	function actionM(){
		document.onkeydown = function(e){
		if (e.keyCode==27){//--ESC--
			var get_res = confirm("Tutup sistem aplikasi ini?");
			if (get_res == true) {
				self.location.href ="?n=out";
			} 
			else{
				 TO_MAIN();
			}
		} 
		else if (e.keyCode==13){//--ENTER--
			document.forms[0].mOK.click();
		}
		else if (e.keyCode==107){//--ADD--
			document.forms[0].mUP.click();
		}
		else if (e.keyCode==111){//--/--
			document.forms[0].mDS.click();
		}
		else if (e.keyCode==121){//--F10--
			self.location.href ="?n=hitung";
		}
		else if (e.keyCode==118){//--F7--
			self.location.href ="?n=rekap";
		}
		else if (e.keyCode==115){//--F4--
			self.location.href ="?n=stock";
		}
		else if (e.keyCode==113){//--F2---
			var get_res = confirm("Reset ulang input data?");
			if (get_res == true){
				self.location.href ="?n=clr";
			} 
			else{
				TO_MAIN();
			}
		}
		else {setBR_focus();} 
		}
	}
	
//--Js Stock--
	function setST_focus(){
		document.forms[0].tsnama.focus();
		setTimeout("setST_focus()", 1000);
	}
	
	function actionST(){
		document.onkeydown = function(e){
		if (e.keyCode==27){//--ESC--
			 TO_MAIN();
		}
		else if ((e.keyCode<=90 && e.keyCode>=65) || (e.keyCode<=57 && e.keyCode>=48) || (e.keyCode<=32)){
			setTimeout("document.forms[0].sfilter.click()",2500);
		}
		else {setST_focus();} 
		}
	}
	
//--Js Hitung--
	function setHT_focus(){
		document.forms[0].ttnama.focus();
		document.forms[0].idttnama.focus();
		setTimeout("setHT_focus()", 1000);
	}
	
	function actionHT(){
		document.onkeydown = function(e){
		if (e.keyCode==27){//--ESC--
			 TO_MAIN();
		}
		else if (e.keyCode==13){//--ENTER--
			document.forms[0].hok.click();
		}
		else {setHT_focus();} 
		}
	}
	
	function S_PRINT() {
		setTimeout("self.location.href ='?n=struk'",1000);
	}
//--Js Rekap--
	
	function actionREK(){
		document.onkeydown = function(e){
		if (e.keyCode==27){//--ESC--
			 TO_MAIN();
		}
		else if (e.keyCode==13){//--ENTER--
			document.forms[0].rsubmit.click();
		}
	}
	}
	
	function R_PRINT() {
		setTimeout("self.location.href ='?n=print'",1000);
	}
</script>
