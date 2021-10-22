<?php
/*Si solo tienes codigo php en el documento no es necesario la etiqueta de cierre ?> */

/*Lo primero es recibir los datos desde el formulario html, declarando una variable y asignando mediante el nombre que tiene el input*/

$usuario = $_POST['txtusuario'];
$clave = $_POST['txtclave'];

/*conexion de la base de datos forma sencilla
mysqli_connect nos permite establecer la cadena de conexión: servidor, usuario, clave, base de datos. Todo esto utilizando procedimientos*/

$conexion = mysqli_connect("localhost", "root", "david", "bdprueba");

/*Realizamos una consulta donde validamos que el usuario y la contraseña sea igual al de la base de datos de lo contrario no mostrará nada*/

$consulta = "SELECT * FROM usuarios WHERE usuario = '$usuario' and clave = '$clave'";

/*Para ejecutar esa consulta que esta almacenada en una variable necesitamos usar mysqli_query: le pasamos la conexion que tenemos en la variable y luego pasamos la consulta*/

$resultado = mysqli_query($conexion, $consulta);

/*Validamos: si resultado tiene datos dará 1 de lo contrario dará 0. La función mysqli_num_rows cuenta las filas de la variable resultado*/

$filas = mysqli_num_rows($resultado);

/*Si el dato esta en la base de datos, filas mayor que 0, redireccionamos a la pagina de bienvenida, de lo contrario que retorne un error*/

if ($filas > 0) {
    header("Location:bienvenido.html");
}

else {
    echo "Error en la Autentificación";
}

/*Esta función es para que libere los datos almacenados en memoria, liberar espacio*/

mysqli_free_result($resultado);

//cerramos la conexion

mysqli_close($conexion);