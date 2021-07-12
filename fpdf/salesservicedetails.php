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
$date = $_POST['rdate'];
$sql1="select * from tb_booking inner join tb_servicecat on tb_servicecat.catid=tb_booking.bk_catid inner join tb_servicesubcat on tb_servicesubcat.scatid=tb_booking.bk_subcatid where curdatebook='".$date."' and bk_status='1'";//echo $sql1;exit;
$result = mysqli_query($conn,$sql1);
$sum=0;
while ($row=mysqli_fetch_array($result))
{
	$amt = str_replace(',', '', $row['bk_amt']);
	$total=(float)$amt;
	$sum=$sum+$total;
}
if($sum==0)
{
	echo "<SCRIPT type='text/javascript'>alert('No Sales Data Found');window.close();</SCRIPT>"; 
}

$sql="select * from tb_booking inner join tb_servicecat on tb_servicecat.catid=tb_booking.bk_catid inner join tb_servicesubcat on tb_servicesubcat.scatid=tb_booking.bk_subcatid where curdatebook='".$date."' and bk_status='1'";//echo $sql;exit;

$flag="";

$result = mysqli_query($conn,$sql);
  		
$pdf=new PDF();
$pdf->AddPage();


$pdf->SetXY(35,-288);
$pdf->SetFont('Arial','B',23);
$pdf->Write (5, "Beauty Parlour Management System");

$pdf->SetXY(68,-275);
$pdf->SetFont('Arial','B',20);
$pdf->Write (5, "Service Sales Details");

$pdf->SetXY(25,-270);
$pdf->SetFont('Arial','B',25);
$pdf->SetTextColor(0,0,0);
$pdf->Write (5, "______________________________________");

$pdf->SetXY(25,-250);
$pdf->SetFont('Arial','B',10);
$pdf->Write (5, "Date");

$pdf->SetXY(95,-250);
$pdf->SetFont('Arial','B',10);
$pdf->Write (5, "Item");

$pdf->SetXY(160,-250);
$pdf->SetFont('Arial','B',10);
$pdf->Write (5, "Amount");

$total=0;

$count=1;$y=-240;$x=25;
while ($row=mysqli_fetch_array($result))
{
	$pdf->SetXY($x,$y);
	$pdf->SetFont('Arial','',10);
	$pdf->Write (5, $row['curdatebook']);
	$x=$x+50;
	$pdf->SetXY($x,$y);
	$pdf->SetFont('Arial','',10);
	$pdf->Write (5, $row['scatname']);
	$x=$x+85;
	$pdf->SetXY($x,$y);
	$pdf->SetFont('Arial','',10);
	$pdf->Write (5, $row['bk_amt']);
	$x=$x+55;
	
	$pdf->SetXY($x,$y);
	$pdf->Write (5, $flag);
	$x=25;
	$y=$y+10;
	$count++;
	$pdf->SetTextColor(0,0,0);
}
	
	$x=$x+50;
	$y=$y+40;
	$pdf->SetXY($x,$y);
	$pdf->SetFont('Arial','B',25);
	$pdf->SetTextColor(0,0,0);
	$pdf->Write (5, "____________________");

	$y=$y+12;
	$pdf->SetXY($x,$y);
	$pdf->SetFont('Arial','B',10);
	$pdf->Write (5, "Total");
	
	$x=$x+85;
	$pdf->SetXY($x,$y);
	$pdf->SetFont('Arial','B',10);
	$pdf->Write (5, $sum);
	

$pdf->SetXY(25,-32);
$pdf->SetFont('Arial','B',25);
$pdf->SetTextColor(0,0,0);
$pdf->Write (5, "______________________________________");




$pdf->Output('I','staffDetails.pdf');

?>
        
