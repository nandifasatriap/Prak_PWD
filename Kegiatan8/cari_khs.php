<?php 
include 'koneksi.php';//digunakan untuk menghubungkan halaman php dengan database
?>
<h3>Form Pencarian DATA KHS Dengan PHP </h3>
<form action="" method="get">
<label>Cari :</label>
<input type="text" name="cari">
<input type="submit" value="Cari">
</form>
<?php 
if(isset($_GET['cari'])){
$cari = $_GET['cari'];
echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>
<table border="1">
<tr>
<th>No</th>
<th>NIM</th>
<th>Nama</th>
<th>Kode MK</th>
<th>NamaMK</th>
<th>Nilai</th>
</tr>
<?php 
if(isset($_GET['cari'])){
$cari = $_GET['cari'];
$sql="SELECT khs.nim, mahasiswa.nama, khs.kodeMK, khs.namaMK, khs.Nilai FROM khs INNER JOIN mahasiswa ON khs.nim = mahasiswa.nim WHERE khs.nim like '%".$cari."%'";
$tampil = mysqli_query($con,$sql);
}else{
$sql="SELECT khs.nim, mahasiswa.nama, khs.kodeMK, khs.namaMK, khs.Nilai FROM khs INNER JOIN mahasiswa ON khs.nim = mahasiswa.nim";
$tampil = mysqli_query($con,$sql);
}
$no = 1;
while($r = mysqli_fetch_array($tampil)){
//untuk menampilkan no, nim, nama, kodeMK, namaMK, dan Nilai
?>
<tr>
<td><?php echo $no++; ?></td>
<td><?php echo $r['nim']; ?></td>
<td><?php echo $r['nama']; ?></td>
<td><?php echo $r['kodeMK']; ?></td>
<td><?php echo $r['namaMK']; ?></td>
<td><?php echo $r['Nilai']; ?></td>
</tr>
<?php } ?>
</table>