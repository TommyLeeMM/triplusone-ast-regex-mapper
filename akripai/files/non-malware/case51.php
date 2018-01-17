<?php
	require('fpdf\fpdf.php');
	include("connect.php");
	
	$cmbMonthReport = isset($_REQUEST['cmbMonthReport']) ? $_REQUEST['cmbMonthReport'] : "";
	
	if($cmbMonthReport == "--Select Month--")
	{
		header("location:../view_queue.php?errReport=Select Month First");
	}
	else
	{
		$where = '';
		if($cmbMonthReport != '-All Month-')
		{
			$where = "WHERE DATE_FORMAT(transactionDate, '%M') = '" . $cmbMonthReport."'";
		}
		$rs = mysql_query("SELECT DATE_FORMAT(transactionDate, '%d %M %Y'), customerFullName, plateNumber, washingTypeName, employeeFullName FROM trwashing tw JOIN mscustomer mc ON tw.customerId = mc.customerId JOIN trdetail td ON td.trWashingId = tw.trWashingId JOIN mswashingtype mwt ON td.washingTypeId = mwt.washingTypeId JOIN msemployee me ON tw.employeeId = me.employeeId " . $where);
		
		$data = array();
		while ($row = mysql_fetch_assoc($rs)) {
			array_push($data, $row);
		}
		
		$judul = 'Monthly Report - ' . $cmbMonthReport;
		$header = array(
				array("label"=>"Date", "length"=>30, "align"=>"L"),
				array("label"=>"Customer Name", "length"=>40, "align"=>"L"),
				array("label"=>"Plate", "length"=>25, "align"=>"L"),
				array("label"=>"Washing Name", "length"=>60, "align"=>"L"),
				array("label"=>"Employee Name", "length"=>35, "align"=>"L")
			);
	
		$pdf = new FPDF();
		$pdf->AddPage();
		
		$pdf->SetFont('Arial','B','16');
		$pdf->Cell(0,20, $judul, '0', 1, 'C');
		
		$pdf->SetFont('Arial','','10');
		$pdf->SetFillColor(255,0,0);
		$pdf->SetTextColor(255);
		$pdf->SetDrawColor(128,0,0);
		foreach ($header as $kolom) {
			$pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
		}
		$pdf->Ln();
		
		$pdf->SetFillColor(224,235,255);
		$pdf->SetTextColor(0);
		$pdf->SetFont('');
		$fill=false;
		$i = 0;
		foreach ($data as $baris) {
			$i = 0;
			foreach ($baris as $cell) {
				$pdf->Cell($header[$i]['length'], 5, $cell, 1, '0', $kolom['align'], $fill);
				$i++;
			}
			$fill = !$fill;
			$pdf->Ln();
		}
		if($i == 0)
		{
			$pdf->Cell(40,10,'No data for ' . $cmbMonthReport);
		}
		
		$pdf->Output();
	}
?>