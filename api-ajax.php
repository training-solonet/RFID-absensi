<?php
include 'koneksi.php';
$employee = mysqli_query($conn,"select * from tb_profil");
while($row = mysqli_fetch_array($employee))
	{
		$row = [
			'uid'	=> $row['uid'],
			'nama'	=> $row['nama'],
			'sekolah'	=> $row['sekolah'],
			'aksi'	=> '<a href="update.php?id='.$row["id"].'"><button type="button" class="btn btn-primary">update</button></a> <a href="delete.php?id='.$row["id"].'"><button type="button" class="btn btn-primary">delete</button></a>',

		];

		$data[] = $row;
	}

	echo json_encode(array('data' => $data));

?>