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
		$this->RotatedText(35,220,'BPMS Service - Order Bill Details',45); //watermark in every page

	}

	function RotatedText($x, $y, $txt, $angle) //to rotate the text
	{
		/* Text rotated around its origin */
		$this->Rotate($angle,$x,$y);
		$this->Text($x,$y,$txt);
		$this->Rotate(0);
	}
}
	
include('../connection.php');
$key=$_GET['t'];

$sql="select * from tb_leave inner join tb_staffreg on tb_leave.lvuserid=tb_staffreg.loginid where lvkey='".$key."'";//echo $sql;exit;

$flag="";

  $result = mysqli_query($conn,$sql);
  while ($row=mysqli_fetch_array($result))
  {
   		 $period = $row['lvstartdate']." to ".$row['lvenddate'];
		   $fname = $row['fname']." ".$row['lname'];
		   $address = $row['address'];
		   $phno = $row['phno'];
		   $applydate = $row['applydate'];
		   $status = $row['status'];
		   $gender= $row['gender'];
  }

$pdf=new PDF(); //creating pdf object, using that object we cann call all the methods
$pdf->AddPage(); //adding new page in pdf


$pdf->SetXY(50,10);
$pdf->SetDrawColor(50,60,100); //to set font colour
$pdf->Image('abcd.png',83,3,53); //filename of picture on the top (image,xaxis,yaxis,zoomsise)

$pdf->SetXY(40,-250);//setting x y coordinates
$pdf->SetFont('Arial','B',23); //to set the font style
$pdf->Write (5, "Beauty Parlour Management System"); //write something to the pdf page

$pdf->SetXY(75,-239);//setting x y coordinates
$pdf->SetFont('Arial','B',20); //to set the font style
$pdf->Write (5, "Staff Leave Details"); //write something to the pdf page


//Travel Date
$pdf->SetXY(20,-210);
$pdf->SetFont('Arial','B',12);
$pdf->Write (5, "Name : ");

$pdf->SetXY(40,-210);
$pdf->SetFont('Arial','',12);
$pdf->Write (5, $fname." ( ".$gender." )");

//Return Date
$pdf->SetXY(20,-200);
$pdf->SetFont('Arial','B',12);
$pdf->Write (5, "Address : ");

$pdf->SetXY(45,-200);
$pdf->SetFont('Arial','',12);
$pdf->Write (5, $address);

//Vehicle No
$pdf->SetXY(20,-190);
$pdf->SetFont('Arial','B',12);
$pdf->Write (5, "Phone : ");

$pdf->SetXY(40,-190);
$pdf->SetFont('Arial','',12);
$pdf->Write (5, trim($phno));

//From
$pdf->SetXY(20,-180);
$pdf->SetFont('Arial','B',12);
$pdf->Write (5, "Apply Date : ");

$pdf->SetXY(50,-180);
$pdf->SetFont('Arial','',12);
$pdf->Write (5, $applydate);

//Passenger Names
$pdf->SetXY(20,-170);
$pdf->SetFont('Arial','B',12);
$pdf->Write (5, "Leave Period : ");

$pdf->SetXY(55,-170);
$pdf->SetFont('Arial','',12);
$pdf->Write (5, $period);


//Pass Key
$pdf->SetXY(20,-130);
$pdf->SetFont('Arial','B',18);
$pdf->SetTextColor(0,102,51);
$pdf->Write (5, "Leave Application ID : ");

$pdf->SetXY(95,-130);
$pdf->SetFont('Arial','B',18);
$pdf->Write (5, $_GET['t']);

$pdf->SetXY(60,-60);
$pdf->SetFont('Arial','B',20);
$pdf->SetTextColor(0,200,0);
$pdf->Write (5, "L E A V E");

$pdf->SetXY(124.5,-60);
$pdf->SetFont('Arial','B',20);
$pdf->SetTextColor(0,200,0);
$pdf->Write (5, "A P P R O V E D");

$pdf->SetXY(25,-32);
$pdf->SetFont('Arial','B',25);
$pdf->SetTextColor(0,0,0);
$pdf->Write (5, "______________________________________");

$pdf->SetXY(25,-240);
$pdf->SetFont('Arial','B',25);
$pdf->SetTextColor(0,0,0);
$pdf->Write (5, "______________________________________");

$pdf->SetXY(79,-43);
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0,0,255);
$pdf->Write (5, "Report Generated on".date("Y-m-d h:i:sa"));


$pdf->Image('success.png',92,223,33);



$pdf->Output('I',$_GET['t'].'LeaveAcknowledgement.pdf');// output file name

?>
        
