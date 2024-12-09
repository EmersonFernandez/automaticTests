<?php
include_once '../connection/db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contraseña = $_POST['contraseña'];

    // Validación básica
    if (empty($nombre) || empty($email) || empty($contraseña)) {
        echo "Por favor, completa todos los campos.";
    } else {
        // Cifra la contraseña
        $contraseñaHash = password_hash($contraseña, PASSWORD_DEFAULT);

        // Inserta en la base de datos
        $sql = "INSERT INTO usuarios (nombre, email, contraseña) VALUES (?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        if ($stmt->execute([$nombre, $email, $contraseñaHash])) {
            ?>
                <div class="alert">
                    Usuario registrado con éxito
                </div>
            <?php
        } else {
            ?>
                <div class="alert">
                    Error al registrar el usuario.
                </div>
            <?php
        }
    }
}
?>

<link rel="stylesheet" href="../assets/style.css?v=1.0">

<body>
    <div class="box-form">
        <form method="POST" action="register.php">
            <p class="title">Registrar</p>
            Nombre: <input type="text" name="nombre" id="nombre" required><br>
            Correo electrónico: <input type="email" name="email" id="email" required><br>
            Contraseña: <input type="password" name="contraseña" id="contrasena" required><br>
            <div class="box-action">
                <button type="submit" id="registraruser">Registrar</button>
                <a href="login.php" class="atras" id="atrasLogin">Atras</a>
            </div>
        </form>
    </div>
</body>
