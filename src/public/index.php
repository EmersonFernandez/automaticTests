<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}
?>
<link rel="stylesheet" href="../assets/style.css?v=1.0">
<body>
    <h1 style="margin-right: 30px;">Bienvenido, <?php echo $_SESSION['usuario_nombre']; ?></h1>
    <a href="logout.php" class="atras" id="cerrarsesion">Cerrar sesión</a>
</body>