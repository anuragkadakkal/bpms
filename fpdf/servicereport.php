<?php
/*call the FPDF library*/
require('rotation.php');
class PDF extends PDF_Rotate
{
	function Header()
	{
		/* Put the watermark */
		$this->SetFont('Arial','B',30);
		$this->SetTextColor(224,224,224);
		$this->RotatedText(35,220,'Beauty Parlour Management System',45);

	}

	function RotatedText($x, $y, $txt, $angle)
	{
		/* Text rotated around its origin */
		$this->Rotate($angle,$x,$y);
		$this->Text($x,$y,$txt);
		$this->Rotate(0);
	}
}
	
include '../connection.php';

$sql="select catname,scatname,amt,scatstatus,tb_servicesubcat.delstatus from tb_servicesubcat inner join tb_servicecat on tb_servicesubcat.catid=tb_servicecat.catid";//echo $sql;exit;

$flag="";

  $result = mysqli_query($conn,$sql);
  
   		
		
$pdf=new PDF();
$pdf->AddPage();


$pdf->SetXY(35,-288);
$pdf->SetFont('Arial','B',23);
$pdf->Write (5, "Beauty Parlour Management System");

$pdf->SetXY(75,-275);
$pdf->SetFont('Arial','B',20);
$pdf->Write (5, "Service Details");

$pdf->SetXY(25,-270);
$pdf->SetFont('Arial','B',25);
$pdf->SetTextColor(0,0,0);
$pdf->Write (5, "______________________________________");

$pdf->SetXY(25,-250);
$pdf->SetFont('Arial','B',10);
$pdf->Write (5, "#");

$pdf->SetXY(35,-250);
$pdf->SetFont('Arial','B',10);
$pdf->Write (5, "Category");

$pdf->SetXY(80,-250);
$pdf->SetFont('Arial','B',10);
$pdf->Write (5, "Subcategory");

$pdf->SetXY(135,-250);
$pdf->SetFont('Arial','B',10);
$pdf->Write (5, "Price");

$pdf->SetXY(175,-250);
$pdf->SetFont('Arial','B',10);
$pdf->Write (5, "Status");

$count=1;$y=-240;$x=25;
while ($row=mysqli_fetch_array($result))
{
	$pdf->SetXY($x,$y);
	$pdf->SetFont('Arial','',10);
	$pdf->Write (5, $count);
	$x=$x+10;
	$pdf->SetXY($x,$y);
	$pdf->SetFont('Arial','',10);
	$pdf->Write (5, $row['catname']);
	$x=$x+45;
	$pdf->SetXY($x,$y);
	$pdf->SetFont('Arial','',10);
	$pdf->Write (5, $row['scatname']);
	$x=$x+55;
	$pdf->SetXY($x,$y);
	$pdf->SetFont('Arial','',10);
	$pdf->Write (5, $row['amt']." INR");
	$x=$x+40;

	$status=$row['scatstatus'];
	$d=$row['delstatus'];
	if($status==0)
	{
		if($d==1)
		{
			$flag="Deleted";
			$pdf->SetTextColor(255,0,0);
			$pdf->SetFont('Arial','B',10);
		}
		else
		{
			$flag="Inactive";
			$pdf->SetTextColor(0,0,255);
			$pdf->SetFont('Arial','B',10);
		}
	}
	else
	{
		if($d==1)
		{
			$flag="Deleted";
			$pdf->SetTextColor(255,0,0);
			$pdf->SetFont('Arial','B',10);
		}
		else
		{
			$flag="Active";
			$pdf->SetTextColor(0,255,0);
			$pdf->SetFont('Arial','B',10);
		}
	}
	$pdf->SetXY($x,$y);
	$pdf->Write (5, $flag);
	$x=25;
	$y=$y+10;
	$count++;
	$pdf->SetTextColor(0,0,0);
}

$pdf->SetXY(25,-32);
$pdf->SetFont('Arial','B',25);
$pdf->SetTextColor(0,0,0);
$pdf->Write (5, "______________________________________");




$pdf->Output('I','serviceDetails.pdf');

?>
        
