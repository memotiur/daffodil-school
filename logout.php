<?PHP

session_start();
session_destroy();
header("Location: index.php"); /* Redirect browser */
			exit();

?>