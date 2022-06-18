<?php 
$date = date('Y-m-d');
?>

<div class="content-header">
    <h1>
        <span class="glyphicon glyphicon-tasks"></span>
        Rekapitulasi Pembayaran</h1>
</div>

<section class="content content-awal" style="min-height: 124px;">
	<h4>Filter</h4>

	<form method="POST">

		<div class="form-group col-sm-5">
			<div class="input-group date col-sm-12">
				<label for="tgl1" class="col-sm-4">Dari Tanggal</label>
				<input type="date" name="tgl1" value="<?php echo $date?>" class="date-picker" style="height: 30px;border-radius: 4px;">
			</div>
		</div>

		<div class="form-grou col-sm-5">
			<div class="input-group date col-sm-12">
				<label for="tgl2" class="col-sm-4">Sampai Tanggal</label>
				<input type="date" name="tgl2" value="<?php echo $date?>" class="date-picker" style="height: 30px;border-radius: 4px;">
			</div>
		</div>

		<input class="col-sm-2 btn2" type="submit" name="submit" value="Tampilkan">

	</form>
</section>

<?php
$pemisah_Desimah = ",";
$jumlah_desimal = "0";
$pemisah_ribuan  = ".";

if(isset($_POST['submit'])){
	$tgl1	=$_POST['tgl1'];
	$tgl2	=$_POST['tgl2'];

	$query	="SELECT * FROM kelas ORDER BY nama_kelas ASC";
	$sql	= mysqli_query($koneksi, $query);
?>

<section class="content content-awal">
	<h4>Rekapitulasi Pembayaran dari Tanggal  <b><?php 
	echo $tgl1?></b> s/d <b><?php echo $tgl2?></b> </h4>

	<table class="table table-striped">
		<thead>
			<tr bgcolor="#cccccc">
				<th style="text-align: center;">No</th>
				<th style="text-align: center;">Kelas</th>
				<th style="text-align: center;">Jumlah</th>
			</tr>
		</thead>

		<?php
		$no=0; 
		while($data = mysqli_fetch_object($sql)){
			$no++;
		?>

		<tbody>
			<tr style="text-align: center;">
				<td><?php echo $no?></td>
				<td><?php echo $data->nama_kelas?></td>
				<td><?php 
					$query1	="SELECT SUM(tarif) FROM jenis_bayar INNER JOIN tagihan_spp ON jenis_bayar.id_jebar=tagihan_spp.id_jebar 
							INNER JOIN siswa ON siswa.nisn=tagihan_spp.nisn INNER JOIN kelas ON kelas.id_kelas=siswa.id_kelas WHERE STATUS='1' 
							AND nama_kelas='$data->nama_kelas' AND tgl_bayar BETWEEN '$tgl1' AND '$tgl2'";
					$sql1	=mysqli_query($koneksi, $query1);
					$data1 	=mysqli_fetch_object($sql1);
					foreach($data1 as $dataa){
						if($dataa==NULL){
							echo "Rp. ";
                                echo number_format($dataa, $jumlah_desimal, $pemisah_Desimah, $pemisah_ribuan);
                                echo ",-";
						} else{
						echo "Rp. ";
                                echo number_format($dataa, $jumlah_desimal, $pemisah_Desimah, $pemisah_ribuan);
                                echo ",-";
					}
					}
					?>
					
				</td>
			</tr>
			<?php }?>
			<tr>
				<td style="text-align: left; max-width:80px;">
					<a href="cetak-rekap.php?tgl1=<?php echo $tgl1?>&tgl2=<?php echo $tgl2?>&ul=<?php echo $userlogin?>" target="blank">
			        <button class="btn1"><span class="fa fa-print"> </span> Cetak Rekapitulasi Pembayaran</button></a>
				</td>

				<td style="text-align: right;"><b>T O T A L :</b></td>
				<td style="text-align: center; font-weight: bold;">
				<?php 
				$query2	="SELECT SUM(tarif) FROM jenis_bayar INNER JOIN tagihan_spp ON jenis_bayar.id_jebar=tagihan_spp.id_jebar 
						INNER JOIN siswa ON siswa.nisn=tagihan_spp.nisn INNER JOIN kelas ON kelas.id_kelas=siswa.id_kelas WHERE STATUS='1' 
						AND tgl_bayar BETWEEN '2020-01-01' AND '2020-03-31'";
				$sql2	=mysqli_query($koneksi, $query2);
				$data2	=mysqli_fetch_object($sql2);
				foreach($data2 as $data2a){
								echo "Rp. ";
                                echo number_format($data2a, $jumlah_desimal, $pemisah_Desimah, $pemisah_ribuan);
                                echo ",-";
					}
				?>
					
				</td>
			</tr>
		</tbody>
	</table>
</section>

<?php } ?>