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

$sql="select * from tb_productbookings inner join tb_customer on tb_productbookings.pbuserid=tb_customer.loginid inner join tb_login on tb_login.id=tb_customer.loginid where pbkey='".$key."'";//echo $sql;exit;

$flag="";

  $result = mysqli_query($conn,$sql);
  while ($row=mysqli_fetch_array($result))
  {
   		   $billdate = date('y-m-d');
		   $billamt = $row['pbamount'];
		   $billname = $row['fname'];
		   $billaddress = $row['address'];
		   $billitems = $row['pbitems'];
		   //echo $billaddress;exit;
		   $phno = $row['phone'];
		   $status = $row['pbstatus'];
		   $fbkey= $row['pbkey'];
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
$pdf->Write (5, "Order Bill Details"); //write something to the pdf page


//Travel Date
$pdf->SetXY(20,-210);
$pdf->SetFont('Arial','B',12);
$pdf->Write (5, "Bill Date : ");

$pdf->SetXY(45,-210);
$pdf->SetFont('Arial','',12);
$pdf->Write (5, $billdate);

//Return Date
$pdf->SetXY(20,-200);
$pdf->SetFont('Arial','B',12);
$pdf->Write (5, "Customer Name : ");

$pdf->SetXY(60,-200);
$pdf->SetFont('Arial','',12);
$pdf->Write (5, $billname);

//Vehicle No
$pdf->SetXY(20,-190);
$pdf->SetFont('Arial','B',12);
$pdf->Write (5, "Customer Address : ");

$pdf->SetXY(65,-190);
$pdf->SetFont('Arial','',12);
$pdf->Write (5, trim($billaddress));

//From
$pdf->SetXY(20,-180);
$pdf->SetFont('Arial','B',12);
$pdf->Write (5, "Phone # : ");

$pdf->SetXY(45,-180);
$pdf->SetFont('Arial','',12);
$pdf->Write (5, $phno);

//Passenger Names
$pdf->SetXY(20,-170);
$pdf->SetFont('Arial','B',12);
$pdf->Write (5, "Product Item(s) : ");

$pdf->SetXY(55,-170);
$pdf->SetFont('Arial','',12);
$pdf->Write (5, $billitems);


//Pass Key
$pdf->SetXY(20,-130);
$pdf->SetFont('Arial','B',18);
$pdf->SetTextColor(0,102,51);
$pdf->Write (5, "Order Key : ");

$pdf->SetXY(60,-130);
$pdf->SetFont('Arial','B',18);
$pdf->Write (5, $fbkey);

$pdf->SetXY(20,-120);
$pdf->SetFont('Arial','B',20);
$pdf->SetTextColor(0,102,51);
$pdf->Write (5, "Total Amount : ");

$pdf->SetXY(73,-120);
$pdf->SetFont('Arial','B',20);
$pdf->Write (5, $billamt."INR");

$pdf->SetXY(43,-60);
$pdf->SetFont('Arial','B',20);
$pdf->SetTextColor(255,0,0);
$pdf->Write (5, "P A Y M E N T");

$pdf->SetXY(124.5,-60);
$pdf->SetFont('Arial','B',20);
$pdf->SetTextColor(255,0,0);
$pdf->Write (5, "P E N D I N G");

$pdf->SetXY(25,-32);
$pdf->SetFont('Arial','B',25);
$pdf->SetTextColor(0,0,0);
$pdf->Write (5, "______________________________________");

$pdf->SetXY(25,-240);
$pdf->SetFont('Arial','B',25);
$pdf->SetTextColor(0,0,0);
$pdf->Write (5, "______________________________________");

$pdf->SetXY(81,-43);
$pdf->SetFont('Arial','',8);
$pdf->SetTextColor(0,0,255);
$pdf->Write (5, "Bill Generated on".date("Y-m-d h:i:sa"));
/*Status
$pdf->SetXY(20,-110);
$pdf->SetFont('Arial','B',19	);
$pdf->Write (5, "Status : ");


$pdf->SetXY(44,-110);
$pdf->SetFont('Arial','B',19);
if($status==1)
{
	$flag="Approved";
}
$pdf->Write (5, $flag); */

$pdf->Image('foodna.png',92,223,33);



$pdf->Output('I',$fbkey.'productBill.pdf');// output file name

?>
        
