    <?php
    session_start();

    $mensaje="";

    if(isset($_POST['btnAccion'])){
        switch($_POST['btnAccion']){
            case 'Agregar':
                if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                    $ID=openssl_decrypt($_POST['id'],COD,KEY);
                    $mensaje.="OK ..ID Correcto".$ID;
                }else{
                    $mensaje.="Upss ..ID incorrecto"."<br/>".$ID;
                }
                if(is_string(openssl_decrypt($_POST['nombre_p'],COD,KEY))){
                    $NOMBRE=openssl_decrypt($_POST['nombre_p'],COD,KEY);
                    $mensaje.="OK ..Nombre Correcto"."<br/>".$NOMBRE;
                }else{
                    $mensaje.="Upss ..Algo paso con el nombre"."<br/>"; break;
                }
                if(is_numeric($_POST['cantidad'])){
                    $CANTIDAD=($_POST['cantidad']);
                    $mensaje.="OK ..Cantidad Correcto".$CANTIDAD."<br/>";
                }else{
                    $mensaje.="Upss ..Algo paso con la cantidad"."<br/>"; break;
                }
                if(is_numeric(openssl_decrypt($_POST['precio_p'],COD,KEY))){
                    $PRECIO=openssl_decrypt($_POST['precio_p'],COD,KEY);
                    $mensaje.="OK ..Precio Correcto"."<br/>".$PRECIO;
                }else{
                    $mensaje.="Upss ..Algo paso con el precio"."<br/>"; break;
                }

                if(!isset($_SESSION['PROFORMA'])){
                    $platillo=array(
                        'ID'=>$ID,
                        'NOMBRE'=>$NOMBRE,
                        'CANTIDAD'=>$CANTIDAD,
                        'PRECIO'=>$PRECIO
                    );
                    $_SESSION['PROFORMA'][0]=$platillo;
                    $mensaje="Platillo agregado exitosamente ";
                }else{

                    $NumeroPlatillos=count($_SESSION['PROFORMA']);
                    $platillo=array(
                        'ID'=>$ID,
                        'NOMBRE'=>$NOMBRE,
                        'CANTIDAD'=>$CANTIDAD,
                        'PRECIO'=>$PRECIO
                    );
                    $_SESSION['PROFORMA'][$NumeroPlatillos]=$platillo;
                    $mensaje="Platillo agregado exitosamente ";
                    
                }
                /*$mensaje=print_r($_SESSION,true);*/
                
                
                break;
                case "Eliminar": 
                    if(is_numeric(openssl_decrypt($_POST['id'],COD,KEY))){
                    $ID=openssl_decrypt($_POST['id'],COD,KEY);
                
                foreach($_SESSION['PROFORMA'] as $indice=>$producto){
                    if($producto['ID']==$ID){
                        unset($_SESSION['PROFORMA'][$indice]);
                                }
                            }
                    }else{
                            $mensaje.="Upss ..ID incorrecto".$ID."</br>";

                        }

                break;
        }
    }
    
    ?>  