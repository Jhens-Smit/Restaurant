<?php
include '../global/config.php';
include '../global/conexion.php';
include 'proforma.php';
require_once '../templates/header.php'
?>

    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restoran</h1>
                    <!-- <img src="../img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="../vista/index.php" class="nav-item nav-link">Home</a>
                        <a href="../vista/about.php" class="nav-item nav-link">About</a>
                        <a href="../vista/service.php" class="nav-item nav-link">Service</a>
                        <a href="../vista/menu.php" class="nav-item nav-link active">Menu</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="../vista/booking.php" class="dropdown-item">Booking</a>
                                <a href="../vista/team.php" class="dropdown-item">Our Team</a>
                                <a href="../vista/testimonial.php" class="dropdown-item">Testimonial</a>
                            </div>
                        </div>
                        <a href="../vista/contact.php" class="nav-item nav-link">Contact</a>
                    </div>
                    <a href="../vista/mostrarProforma.php" class="btn btn-primary py-2 px-4">Proforma</a>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Food Menu</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Menu</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->


        <?php 
    $sentencia=$pdo->prepare("SELECT id_platillos, precio_p, imagen, nombre_p, descripcion_p, platillos.estado, nombre_c FROM platillos INNER JOIN categoria_p 
    on platillos.id_categoria=categoria_p.id_categoria WHERE platillos.id_categoria=1 and platillos.estado=1");
    $sentencia->execute();
    $lista_platillos1=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    //print_r($lista_platillos1)
?>
<?php 
    $sentencia=$pdo->prepare("SELECT id_platillos, precio_p, imagen, nombre_p, descripcion_p, platillos.estado, nombre_c FROM platillos INNER JOIN categoria_p 
    on platillos.id_categoria=categoria_p.id_categoria WHERE platillos.id_categoria=2 and platillos.estado=1");
    $sentencia->execute();
    $lista_platillos2=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    //print_r($lista_platillos2)
?>
<?php 
    $sentencia=$pdo->prepare("SELECT id_platillos, precio_p, imagen, nombre_p, descripcion_p, platillos.estado, nombre_c FROM platillos INNER JOIN categoria_p 
    on platillos.id_categoria=categoria_p.id_categoria WHERE platillos.id_categoria=3 and platillos.estado=1");
    $sentencia->execute();
    $lista_platillos3=$sentencia->fetchAll(PDO::FETCH_ASSOC);
    //print_r($lista_platillos3)
?>

        <!-- Menu Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Menú</h5>
                    <h1 class="mb-5">Artículos más populares</h1>

                </div>
                <?php if($mensaje!=""){?>
                <div class="alert alert-success">
                    <?php echo $mensaje; ?>
                    <a href="mostrarProforma.php">Ver Proforma</a>
                </div>
                <?php }?>
                <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                    <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                                <i class="fa fa-coffee fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">Popular</small>
                                    <h6 class="mt-n1 mb-0">Plato Principal</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                                <i class="fa fa-hamburger fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">Especial</small>
                                    <h6 class="mt-n1 mb-0">Piqueos</h6>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                                <i class="fa fa-utensils fa-2x text-primary"></i>
                                <div class="ps-3">
                                    <small class="text-body">Deliciosa</small>
                                    <h6 class="mt-n1 mb-0">Bebidas</h6>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                            <?php foreach($lista_platillos1 as $plato){?>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="../admin/Assets/img/<?php echo $plato['imagen']?>" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span><?php echo $plato['nombre_p']?></span>
                                                <span class="text-primary">S/.<?php echo $plato['precio_p']?></span>
                                            </h5>
                                            <small class="fst-italic"><?php echo $plato['descripcion_p']?></small>
                                        </div>
                                    </div>
                                    <form action="" method="post">

                                        <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($plato['id_platillos'],COD,KEY) ?>">
                                        <input type="hidden" name="nombre_p" id="nombre_p" value="<?php echo openssl_encrypt($plato['nombre_p'],COD,KEY) ?>">
                                        <input type="hidden" name="precio_p" id="precio_p" value="<?php echo openssl_encrypt($plato['precio_p'],COD,KEY) ?>">
                                        <input type="number" name="cantidad" id="cantidad" value="1" min="1">
                                    <button class="btn btn-primary"
                                        name="btnAccion"
                                        value="Agregar"
                                        type="submit">Agregar a la Proforma</button>
                                    </form>
                                    
                                </div>
                                <?php }?>
                            </div>
                        </div>
                        <div id="tab-2" class="tab-pane fade show p-0">
                            <div class="row g-4">
                            <?php foreach($lista_platillos2 as $plato){?>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="../admin/Assets/img/<?php echo $plato['imagen']?>" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span><?php echo $plato['nombre_p']?></span>
                                                <span class="text-primary">S/.<?php echo $plato['precio_p']?></span>
                                            </h5>
                                            <small class="fst-italic"><?php echo $plato['descripcion_p']?></small>
                                        </div>
                                    </div>
                                    <form action="" method="post">

                                        <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($plato['id_platillos'],COD,KEY) ?>">
                                        <input type="hidden" name="nombre_p" id="nombre_p" value="<?php echo openssl_encrypt($plato['nombre_p'],COD,KEY) ?>">
                                        <input type="hidden" name="precio_p" id="precio_p" value="<?php echo openssl_encrypt($plato['precio_p'],COD,KEY) ?>">
                                        <input type="number" name="cantidad" id="cantidad" value="1" min="1">
                                    <button class="btn btn-primary"
                                        name="btnAccion"
                                        value="Agregar"
                                        type="submit">Agregar a la Proforma</button>
                                    </form>
                                    
                                </div>
                                <?php }?>
                            </div>
                        </div>
                        <div id="tab-3" class="tab-pane fade show p-0">
                            <div class="row g-4">
                            <?php foreach($lista_platillos3 as $plato){?>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <img class="flex-shrink-0 img-fluid rounded" src="../admin/Assets/img/<?php echo $plato['imagen']?>" alt="" style="width: 80px;">
                                        <div class="w-100 d-flex flex-column text-start ps-4">
                                            <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                <span><?php echo $plato['nombre_p']?></span>
                                                <span class="text-primary">S/.<?php echo $plato['precio_p']?></span>
                                            </h5>
                                            <small class="fst-italic"><?php echo $plato['descripcion_p']?></small>
                                        </div>
                                    </div>
                                    <form action="" method="post">

                                        <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($plato['id_platillos'],COD,KEY) ?>">
                                        <input type="hidden" name="nombre_p" id="nombre_p" value="<?php echo openssl_encrypt($plato['nombre_p'],COD,KEY) ?>">
                                        <input type="hidden" name="precio_p" id="precio_p" value="<?php echo openssl_encrypt($plato['precio_p'],COD,KEY) ?>">
                                        <input type="number" name="cantidad" id="cantidad" value="1" min="1">
                                    <button class="btn btn-primary"
                                        name="btnAccion"
                                        value="Agregar"
                                        type="submit">Agregar a la Proforma</button>
                                    </form>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->

        <!-- Footer Start -->
        <?php
include '../templates/pie.php';
?>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/wow/wow.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/counterup/counterup.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../lib/tempusdominus/js/moment.min.js"></script>
    <script src="../lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
</body>

</html>