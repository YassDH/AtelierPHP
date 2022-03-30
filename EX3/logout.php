<script>
    alert("Déconnexion avec succès !");
</script>
<?php
session_start();
session_destroy();
header("refresh:0;url=index.php");
?>
