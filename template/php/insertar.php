
<?php
include('conexion.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $usuario=$_POST['usuario'];
    $contraseña=$_POST['contraseña'];
    $documento=$_POST['documento'];
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $id_estado=$_POST['id_estado_usuario'];
    $id_roles=$_POST['id_roles'];
    $correo=$_POST['correo'];

    session_start();
    $_SESSION['correo'] = $correo;


 
    // Insert con valores por defecto (estado = 2 → Activo, rol = 2 → Usuario)
    $sql = "INSERT INTO usuarios (usuario, contraseña, documento, nombre, apellido, id_estado_usuario, id_roles, correo) 
            VALUES ('$usuario', '$contraseña', '$documento', '$nombre', '$apellido',$id_estado,$id_roles, '$correo')";

    mysqli_query($conexion, $sql) 
        or die("❌ Problemas en el insert: " . mysqli_error($conexion));

    mysqli_close($conexion);

    echo "✅ Usuario registrado con éxito.";
} else {
    echo "⚠️ Accede a este archivo solo desde el formulario de registro.";
}
?>