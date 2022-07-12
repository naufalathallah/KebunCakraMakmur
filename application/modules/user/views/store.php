<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image.png" href="../assets/img/favico.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://kit.fontawesome.com/330deea0aa.js" crossorigin="anonymous"></script>

    <title>Store</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand font-weight-bold" href="<?= site_url('user')?>">Kebun Cakra Makmur</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="<?= site_url('user')?>">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="<?= site_url('user/about')?>">About</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link js-scroll-trigger" href="<?= site_url('user/tampil')?>">Store <span class="sr-only">(current)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="<?= site_url('user/contact')?>">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="<?= site_url('user/chart')?>"><i class="fas fa-shopping-cart"></i></a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <br><br><br>

    <div class="row">
        <div class="col-lg-12 d-flex justify-content-center display-4 font-weight-bold judul">
          PRODUK KAMI
        </div>
    </div>
    <br>
    
    <div class="container d-flex justify-content-center text-center">
        <div class="row">
                <?php foreach ($sayur_1 as $key) { ?>
                    <div class="card ml-5 mb-5" style="width: 20rem; cursor: pointer;" onclick="location.href='<?= site_url('user/detail/'.$key->id.'') ?>'">
                        <img class="card-img-top" src="../assets/img/<?= $key->gambar ?>" height="200" alt="Sayur">
                        <div class="card-body">
                            <h5 class="card-title"><?= $key->nama ?></h5>
                            <p class="card-text">Harga/Kg : Rp<?= $key->harga ?></p>
                        </div>
                    </div>
                <?php } ?>
        </div>
    </div>
    <br>


    
    <footer class="page-footer font-small teal pt-4">
        <!-- Footer Text -->
        <div class="container">

            <!-- Social buttons -->
            <ul class="list-unstyled list-inline text-center">
              <li class="list-inline-item">
                <a class="btn-floating btn-ig mx-1" href="https://www.instagram.com/kebun_cakramakmur/">
                    <i class="fa-2x fab fa-instagram text-light"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn-floating btn-wa mx-1" href="#">
                    <i class="fa-2x fab fa-whatsapp text-light"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="btn-floating btn-wa mx-1" href="<?= site_url('login')?>">
                  <i class="fa-2x far fa-user text-light"></i>
                </a>
              </li>
            </ul>
            <!-- Social buttons -->
        
          </div>
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3 text-light">© 2020 Copyright:
          <a href="https://www.kebuncakramakmur.com/"> kebuncakramakmur.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>