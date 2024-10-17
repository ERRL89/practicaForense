<!DOCTYPE html>
<html lang="es" prefix="og: https://ogp.me/ns#">

<head>
    <?php require "head.php"; ?>
    <title>Contáctanos</title>
    <link rel="canonical" href="https://vidrioyaluminiolosdoscarnales.com/contact.php" />
    <meta property="og:title" content="Contacto Vidrio y Aluminio Aldama Chihuahua México " />
    <meta property="og:url" content="https://vidrioyaluminiolosdoscarnales.com/" />
    <meta property="og:image" content="https://vidrioyaluminiolosdoscarnales.com/images/og/og-image.png" />
</head>

<body>

    <?php require "header.php"; ?>

    <div class="fondoprincipal">
        <div class="fondo_texto">
            <h1 class="principal_title">CONTACTO</h1>
            <img id="img_fondo" src="./images/fondos/contacto/1.jpeg"
                alt="Soluciones en Vidrio y Aluminio Chihuahua">
        </div>
        <div class="conteiner_imgprincipal">
            <img id="img_fondo2" src="./images/fondos/contacto/1.jpeg" alt="Soluciones en Vidrio y Aluminio en Chihuahua">
            <ion-icon id="left_btn" class="icon_left" name="chevron-back-outline"></ion-icon>
            <ion-icon id="right_btn" class="icon_right" name="chevron-forward-outline"></ion-icon>
        </div>
    </div>

    <div id="formularioContacto" class="mt-5 mb-5 p-3">
      <h2 class="text-center">Formulario de Contacto</h2>
      <h6 class="text-center">* Nos pondremos en contacto con usted a la brevedad *</h6>
      <form id="form">
        <div class="container-sm container_form_custom mt-4">
            <div class="mb-3 ">
              <!-- Nombre -->
              <div class="row mb-3">
                  <div class="col-md-6"><!-- Nombre -->
                    <label for="nombre" class="form-label label-custom">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+" required>
                    <div class="invalid-feedback">Introduce tu Nombre</div>
                  </div>
                  <div class="col-md-6"><!-- Servicio -->
                    <label for="producto" class="form-label label-custom">Producto:</label>
                    <select id="optionProject" class="form-select" aria-label="Default select example" required>
                      <option selected disabled>Servicio de Interés</option>
                      <option value="puertas">Puertas</option>
                      <option value="ventanas">Ventanas</option>
                      <option value="canceles">Canceles</option>
                      <option value="barandales">Barandales</option>
                      <option value="proyecto">Proyecto Residencial</option>
                    </select>
                    <div class="invalid-feedback">Selecciona el producto de interes.</div>
                  </div>
                </div>
              </div>
              <!-- Colonia -->
              <div class="mb-3">
                <div class="row mb-3">
                  <div class="col-md-3 mb-2">
                    <label for="colonia" class="form-label label-custom">Colonia:</label>
                    <input type="text" class="form-control form-input" placeholder="Colonia" id="colonia" name="colonia" required>
                    <div class="invalid-feedback">Introduce tu colonia</div>
                  </div>

                  <div class="col-md-3 mb-2"><!-- Telefono -->
                      <label for="phone" class="form-label label-custom">Teléfono:</label>
                      <input type="number" class="form-control sinBotonera" id="telefono" name="telefono" placeholder="5512345678" required>
                      <div class="invalid-feedback">Introduce tu teléfono</div>
                  </div>

                  <div class="col-md-6"><!-- Email -->
                      <label for="email" class="form-label label-custom">Email:</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="ejemplo@gmail.com" required>
                      <div class="invalid-feedback">Introduce tu email</div>
                    </div>

                </div>
              </div>
              <!-- Boton de Contratar launchUploadFiles() -->
              <center><button onclick="sendForm()" type='button' id='btnContinuar' class='btnEmail mt-3'><strong>ENVIAR</strong></button></center> 
              <div id="resultado" class="mt-4 container"></div>
            </div>
        </div>
      </form>
    </div>

    <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-body">
                  <center> <div class="loader"></div></center>
                  <center><h2>Enviando...</h2></center>
              </div>
          </div>
      </div>
    </div>

    <?php require "contactMenu.php"; ?>
    <?php require "footer.php"; ?>
    <?php 
        $fotos=1;
        $cadena="./images/fondos/contacto/";
        include "./functions/generalFunctions.php"; 
    ?>

</body>

<!-- Funcion para enviar formulario -->
<script>
			function sendForm(){
        let form = document.getElementById('form');
        if(form.checkValidity()) {
          let nombre = $("#nombre").val()
          let colonia = $("#colonia").val()
          let telefono = $("#telefono").val()
          let email = $("#email").val()
          let optionProject = $("#optionProject").val()

          var modal = new bootstrap.Modal(document.getElementById('exampleModal'));
          modal.show();
         
            $.ajax({
              url: './sendForm.php',
              type: 'POST',
              data: 
              {
                nombre:nombre,
                colonia:colonia,
                telefono:telefono,
                email:email,
                optionProject:optionProject
              },
              success: function(result)
              {
                $('#resultado').html(result);
                modal.hide();
                $('#btnContinuar').prop('disabled', true);
              }
            });
          }else {
            form.classList.add('was-validated')
          } 
      }		
</script>

</html>