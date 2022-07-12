<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image.png" href="../assets/img/favico.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://kit.fontawesome.com/330deea0aa.js" crossorigin="anonymous"></script>
    <title>Invoice</title>
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
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="<?= site_url('user/tampil')?>">Store</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="<?= site_url('user/contact')?>">Contact</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link js-scroll-trigger" href="<?= site_url('user/chart')?>"><i class="fas fa-shopping-cart"> <span class="sr-only">(current)</i></a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <br><br><br>

    <div class="row">
        <div class="col-lg-12 d-flex justify-content-center display-4 font-weight-bold judul">
          INVOICE
        </div>
    </div>
    <br>

	<div class="container">
	<div class="row align-items-center">
            <div class="col-lg-6 d-flex justify-content-center mb-5">
				<table>
					<tr>
						<td><strong>Nama :</strong> <?= $gd1->pemesan ?></td>
					</tr>
					<tr>
						<td><strong>No hp :</strong> <?= $gd1->no_hp?></td>
					</tr>
					<tr>
						<td><strong>Tanggal :</strong> <?= $gd1->tanggal?></td>
					</tr>
					<tr>
						<td>
						<strong>Pesanan :</strong><br>
								<?php foreach ($gd2 as $key) {
										$total = $key->jumlah*$key->harga;
										echo "*".$key->nama."  Rp.".$total."<br>";
										} 	
								?>
							
						</td>
						<td>
							<br><?php foreach ($jumlah as $key) {
										echo "(".$key->jumlah."Kg)";
										echo"<br>";
									} ?>
						</td>
					</tr>
					<tr>
						<td><strong>Total harga :</strong> Rp.<?= $gd1->totalharga?></td>
					</tr>
					<tr>
						<td>
                        <strong>(Harap Screenshoot halaman ini untuk konfirmasi ke penjual melalui kontak)</strong>
						</td>
					</tr>
				</table>
            </div>
            <div class="col-lg-6 d-flex justify-content-center mb-5">
			<textarea class="form-control" rows="20" readonly cols="100">
Mohon Dibayar Melalui (pilih salah satu):

Bank BCA ke norek x
OVO ke nomor x
GoPay ke nomor x
Dana ke nomor x

Atas Nama x

Cantumkan ID Pembayaran sebagai referensi pembayaran pada saat transfer. Pesanan Anda tidak akan dikirim sampai dana sudah kami terima. SEBELUM DITRANSFER MOHON HUBUNGI KAMI TERLEBIH DAHULU VIA WA mengecek stok ketersediaan barang.

Syarat dan Ketentuan:
1. Order online kami layani mulai pukul x sampai x
2. Mohon pembayaran order di transfer sebelum pukul x
3. Sebelum melakukan transfer, harap menanyakan stok terlebih dahulu ke admistrasi kami melalui WA x
4. Barang yg sudah di order dan di transfer uangnya, list belanja tidak dapat di ganti ke barang lainnya, kecuali melakukan order lainnya.
5. Total harga belum termasuk ongkos kirim.
6. Tidak ada minimal order
7. Setelah ditransfer harap mengirimkan konfirmasi bukti pembayaran melalui WA x

Area Layanan
Kebun Cakra Makmur hanya melayani area JABODETABEK

TOTAL HARGA BELUM TERMASUK ONGKIR

Terima kasih. Selamat berbelanja…
					</textarea>
            </div>
        </div>
	</div>
	
	<br><br><br>
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