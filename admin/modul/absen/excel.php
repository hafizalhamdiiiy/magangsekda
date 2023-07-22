
<!doctype html>
<?php include 'fungsi/fungsi.php'; ?>
<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Rekap Absensi Pegawai.xls");
	?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title><?=$judul;?></title>
  </head>
  <body>
  	<center>
  	
  		<h1>Rekap Absen Bulan <?= $_GET['bulan'];?></h1>
  	
  	</center>
  	
   <div class="row mt-2 ml-2">

   	<div class="col-md-6">
   		<p>Bulan : <?= $_GET['bulan'];?></p>
   		<p>Tahun : <?= $_GET['tahun'];?></p>
   	</div>
   </div>

   <div class="row mt-3 ml-3 mr-3 ">
   	<div class="table-responsive">
   		<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NIP</th>
      <th scope="col">Nama</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Bulan</th>
      <th scope="col">Kehadiran</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  	<?php 

  	$no = 1;
  	foreach (print_rekap() as $key):

  	 ?>
   <tr>
                <td><?=$no++;?></td>
                <td><?=$key['nip'];?></td>
                <td><?=$key['nama'];?></td>
                <td><?=$key['tanggal'];?></td>
                <td><?=$key['bulan']?></td>
                <td>
                    <?php 
                                if ($key['kehadiran']=="Hadir") {
                                  echo '<b style="color: blue;">Hadir</b>';
                                }else{
          
                                ?>
                                <strong style="color: red;">Tidak Hadir</strong>

                              <?php } ?>
                </td>
                <td>
                      <?php 
                                // $jam_masuk = "0800";
                                $select_jam = mysqli_query($koneksi, "SELECT * FROM jam_masuk");
                                $jam_masuk = mysqli_fetch_array($select_jam);
                                if ($key['jam2'] > $jam_masuk['jam_masuk']) {
                                  echo '<b style="color: red;">telat</b>';
                                }else if($key['keterangan'] != "null"){
                                  echo '<b style="color: red;">-</b>';
                                }else{
                                  echo '<b style="color: green;">tepat waktu</b>';
                                }

                                 ?>
                </td>
            </tr>
    <?php endforeach; ?>
  </tbody>
</table>
   	</div>
   </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
     
  </body>
</html>