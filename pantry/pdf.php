<?php
	// memanggil library FPDF
	require('fpdf/fpdf.php');
	// intance object dan memberikan pengaturan halaman PDF
	$pdf = new FPDF('l','mm','A4');
	// membuat halaman baru
	$pdf->AddPage();
	// setting jenis font yang akan digunakan
	$pdf->SetFont('Arial','B',20);
	// mencetak string 
	$pdf->Cell(290,10,'KURA RESTO',0,1,'C');
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(290,10,'DAFTAR BAHAN BAKU YANG HARUS DIBELI',0,1,'C');
	 
	// Memberikan space kebawah agar tidak terlalu rapat
	$pdf->Cell(10,7,'',0,1,'C');
	 
	$pdf->SetFont('Arial','B',10,'C');
	$pdf->Cell(48,6,'',0,0,'C');
	$pdf->Cell(15,6,'ID',1,0,'C');
	$pdf->Cell(130,6,'NAMA BAHAN BAKU',1,0,'C');
	$pdf->Cell(50,6,'JUMLAH',1,1,'C');
	
	 
	$pdf->SetFont('Arial','',10,'C');
	 
	include 'functions.php';
	$db=dbConnect();
	$req = mysqli_query($db, "SELECT * FROM req_bbaku JOIN bahan_baku ON bahan_baku.id_bbaku = req_bbaku.id_bbaku ORDER BY bahan_baku.n_bbaku");
	while ($row = mysqli_fetch_array($req)){
		
		
		$pdf->Cell(48,6,'',0,0,'C');
		$pdf->Cell(15,6,$row['id_bbaku'],1,0,'C');
		$pdf->Cell(130,6,$row['n_bbaku'],1,0,'C');
		$pdf->Cell(50,6,$row['stok'],1,1,'C');
		
	}
		
	$pdf->Output();
	?>