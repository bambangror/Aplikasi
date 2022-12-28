<script language="javascript">
var get_res = confirm("Kosongkan Database,selain table [system] dan [users]?");
if (get_res == true) {
self.location.href ="?n=pengosongandbok";
} 
else{
 setTimeout('self.location.href ="index.php"',1);
}
</script>