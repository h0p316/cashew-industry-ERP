<?php
session_start();
unset($_SESSION["user_name"]);
echo "<script>
alert('Logged Out');
window.location.href='login.php';
</script>";

?>