<?php
$nombre = $correo = $url = $genero = $mensaje = "";
$errorNombre = $errorCorreo = $errorUrl = $errorGenero = $errorMensaje = "";
    function validar($data){
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if($_SERVER['REQUEST_METHOD']== "POST"){

        if (empty($_POST['nombre'])){
            $errorNombre = "El nombre esta vacio";
        }else{
            $nombre = validar($_POST['nombre']);
        }
        if (empty($_POST['correo'])){
            $errorCorreo = "El correo esta vacio";

        }else{
            $correo = validar($_POST['correo']);
            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)){
                $errorCorreo = "Ingrese un correo valido";
            }
        }
        if (empty($_POST['url'])){
            $errorUrl = "La url esta vacia";
        }else{
            $url = validar($_POST['url']);
            $url = filter_var($url, FILTER_SANITIZE_URL);
            if (!filter_var($url, FILTER_VALIDATE_URL)) {
                $errorUrl = "$url es invalida";
            }
        }
        if (empty($_POST['genero'])){
            $errorGenero = "Debes seleccionar un genero";
        }else{
            $genero = validar($_POST['genero']);
        }
        if (empty($_POST['mensaje'])){
            $errorMensaje = "El mensaje esta vacio";
        }else{
            $mensaje = validar($_POST['mensaje']);
        }
        if (!empty($nombre) && !empty($correo) && !empty($url) && !empty($genero) && !empty($mensaje)){
                header("Location: index.php");
                exit;
        }

    }

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>.error{ color: red;}</style>

</head>
<body>
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-8">
        <div class="card mt-5">
          <div class="card-header">
            Formulario con validación PHP
          </div>
          <div class="card-body">

              <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                    <!-- nombre-->
                  <div class="mb-3">
                      <label class="form-label align-left">Nombre:</label>
                      <input type="text" class="form-control" name="nombre" value="<?php echo $nombre;?>">
                      <div class="form-text error"><?php echo $errorNombre ?></span></div>
                  </div>

                  <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label">Correo</label>
                        <input type="email" class="form-control" placeholder="name@example.com" name="correo" value="<?php echo $correo;?>">
                        <div class="form-text error"><?php echo $errorCorreo ?></div>
                    </div>

                  <!-- URL -->
                    <div class="mb-3">
                        <label class="form-label">Sitio web</label>
                        <input type="url" class="form-control" placeholder="https://www.sitioweb.com" name="url" value="<?php echo $url;?>">
                        <div class="form-text error"><?php echo $errorUrl ?></div>
                    </div>

                  <!-- genero -->
                  <div class="mb-3">
                      <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="genero" <?php if(isset($genero) && $genero == 'Hombre'){echo "checked";} ?> value="Hombre">
                      <label class="form-check-label" >Hombre</label>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="genero" <?php if(isset($genero) && $genero == 'Mujer'){echo "checked";} ?> value="Mujer">
                      <label class="form-check-label">Mujer</label>
                    </div>
                  </div>
                  <div class="mb-3">
                      <div class="form-text error"><?php echo $errorGenero ?></div>
                    </div>

                  <!-- Mensaje -->
                  <div class="mb-3">
                  <label class="form-label">Mensaje</label>
                  <textarea name="mensaje" class="form-control" rows="3" value="<?php echo $mensaje;?>"></textarea>
                      <div class="form-text error"><?php echo $errorMensaje ?></div>
                </div>

                <div class="mb-3">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                        <input type="reset" class="btn btn-info" value="Limpiar formulario" />
                    </div>
                </div>

              </form>


          </div>
        </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>