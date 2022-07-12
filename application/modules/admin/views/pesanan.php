<!DOCTYPE html>
<html>
<head>
	<title>Pesanan</title>
</head>
<body>
	<table border="2">
		<tr>
			<th>ID</th>
			<th>Nama</th>
			<th>No.Hp</th>
			<th>Tanggal</th>
			<th>Pesanan</th>
			<th>Jumlah</th>
			<th>Harga Satuan</th>
			<th>Aksi</th>
		</tr>
		<?php foreach ($get as $key) {?>
		<tr>
				<td><?= $key->id_order?></td>
				<td><?= $key->pemesan?></td>
				<td><?= $key->no_hp?></td>
				<td><?= $key->tanggal?></td>
				<td><?= $key->nama;?> </td>
				<td><?= $key->jumlah."Kg"; ?></td>
				<td><?= $key->harga; ?></td>


				<td><button type="button" onclick="location.href='<?= site_url('admin/hapuspesanan/'.$key->id_order.'') ?>';"> Delete		
					</button>
				</td>
		</tr>
		<?php } ?>
				
	</table>

</body>
</html>