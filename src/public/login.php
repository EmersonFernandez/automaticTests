<?php
session_start();
include_once '../connection/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    // Busca el usuario en la base de datos
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();

    if ($usuario && password_verify($contraseña, $usuario['contraseña'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nombre'] = $usuario['nombre'];
        header("Location: index.php");
        exit;
    } else {
       ?>
        <div class="alert">
            Credenciales incorrectas
        </div>
       <?php    
    }
}
?>
<link rel="stylesheet" href="../assets/style.css?v=1.0">
<body>
    <div class="box-form">
        <form method="POST" action="login.php">
            <p class="title">Inicio Sesión</p>
            Correo electrónico: <input type="email" id="email" name="email" ><br>
            Contraseña: <input type="password" name="contraseña" id="contrasena" required><br>
            <div class="box-action">
                <button type="submit" id="iniciarsesion">Iniciar sesión</button>
                <a href="register.php" class="atras" id="registrar">Registrar</a>
            </div>
        </form>
    </div>
</body>