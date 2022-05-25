<?php

include ('connection.php');


session_start();
if($_POST){

    $usuario= $_POST['usuario'];
    $password= $_POST['password'];

    $sqll= "SELECT id, password, nombre, tipo_usuario FROM usuarios WHERE usuario='$usuario'";
    $resultado= $con->query($sqll);
    $num= $resultado->num_rows;

    if($num>0){
        $row= $resultado->fetch_assoc();
        $password_bd= $row['password'];

        $pass_c= sha1 ($password);

        if($password_bd == $pass_c){
      // if (buscarbtn($usuario, $password)){
        
            $_SESSION['id'] = $row['id'];
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['tipo_usuario'] = $row['tipo_usuario'];
            header("location: ../vistas/indice.php");
        

        }else{

            header ('location:../index.php?errorpass=error');
            
        }

    }else{

        header ('location:../index.php?erroruser=error');
        
    }

}

function buscarbtn($id, $clave){

    $userName = $id;
    $password = $clave;
    
    //desactivamos los erroes por seguridad
    error_reporting(0);
    //activar los errores (en modo depuración)
    //error_reporting(E_ALL);

    $servidor_LDAP = "btn.gob.ve"; //BTN
    $servidor_dominio = "BTN.GOB.VE"; //BTN
    $usuario_LDAP = $userName;
    $contrasena_LDAP = $password;
    $conectado_LDAP = ldap_connect($servidor_LDAP); //BTN
    ldap_set_option($conectado_LDAP, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($conectado_LDAP, LDAP_OPT_REFERRALS, 0);

    if ($conectado_LDAP) {
        //Conectado correctamente al servidor LDAP
        $autenticado_LDAP = ldap_bind($conectado_LDAP, 
                                    $usuario_LDAP . "@" . $servidor_dominio, $contrasena_LDAP); //BTN
        
        if ($autenticado_LDAP) {
            //Autenticación en servidor LDAP desde Apache y PHP correcta.
            return TRUE;
        } 
        else {
            //El usuario y/o contraseña son incorrectos
            return FALSE;
        }
    }
    else {
        return FALSE;
    }

    // all done? clean up
    ldap_close($conectado_LDAP);
}	

?>