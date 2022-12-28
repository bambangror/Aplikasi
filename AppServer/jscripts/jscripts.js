<script language="javascript">
	function TO_INDEX() {
		setTimeout('self.location.href = "index.php"',1000);
	}	
	//--
	function TO_ROLE_A() {
		setTimeout('self.location.href ="?n=role"',1000);
	}
	
	function TO_KASSA_A() {
		setTimeout('self.location.href ="?n=kassa_a"',1000);
	}
	
	function TO_USER_A() {
		setTimeout('self.location.href ="?n=user_a"',1000);
	}
	
	function TO_BARANG_A() {
		setTimeout('self.location.href ="?n=barang"',1000);
	}
	
	function TO_PRODUSEN_A() {
		setTimeout('self.location.href ="?n=produsen"',1000);
	}
	
	function TO_SUPPLIER_A() {
		setTimeout('self.location.href ="?n=supplier"',1000);
	}
	
	function TO_CUSTOMER_A() {
		setTimeout('self.location.href ="?n=customer"',1000);
	}
	
	function TO_UMUM_A() {
		setTimeout('self.location.href ="?n=umum"',1000);
	}
	//--
	function TO_PEMBELIAN_A() {
		setTimeout('self.location.href ="?n=pembelian"',1000);
	}
	
	function TO_STOCK_A() {
		setTimeout('self.location.href ="?n=stock"',1000);
	}	
	//--
	
	function TO_MODAL_A() {
		setTimeout('self.location.href ="?n=modalawal"',1000);
	}
	
	function TO_BARANGRUSAK_A() {
		setTimeout('self.location.href ="?n=barangrusak"',1000);
	}
	
		
	function TO_BARCODE_A() {
		setTimeout('self.location.href ="?n=barcode"',1000);
	}
		
	function TO_OUT() {
		self.location.href ="?n=out";
	}
		
	function IN_BINT() {
		document.getElementById("idbarcode").onkeypress=function(e){
		var e=window.event || e
		var keyunicode=e.charCode || e.keyCode
		return ((keyunicode>=48 && keyunicode<=57) || keyunicode==8 || keyunicode==46 || keyunicode==32)? true : false
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
	if (e.keyCode==13){//--ENTER--
			document.forms[0].mOK.click();
		}
		else if (e.keyCode==107){//--ADD--
			document.forms[0].mUP.click();
		}
		else if (e.keyCode==111){//--/--
			document.forms[0].mDS.click();
		}
		else if (e.keyCode==115){//--F4--
			self.location.href ="?n=lookup";
		}
		else {setBR_focus();} 
		}
	}
	
//--Js LookUp--
	function setST_focus(){
		document.forms[0].tsnama.focus();
		setTimeout("setST_focus()", 1000);
	}
	
	function actionST(){
		document.onkeydown = function(e){
		if ((e.keyCode<=90 && e.keyCode>=65) || (e.keyCode<=57 && e.keyCode>=48) || (e.keyCode<=32)){
			setTimeout("document.forms[0].sfilter.click()",2500);
		}
		else {setST_focus();} 
		}
	}
</script>
