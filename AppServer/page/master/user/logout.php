<?php
unset($_SESSION['loggedin']);
unset($_SESSION['user']);
session_destroy();
?>
<script type="text/javascript">
	TO_INDEX();
</script>