<?php
session_start();
include 'customerheader.php';
if(isset($_GET['t']))
{
	$lkey=$_GET['t'];
}

	$sql = "select * from tb_category where catkey='".$lkey."'"; //echo $sql;exit;
  $result = mysqli_query($conn,$sql);
  while ($row=mysqli_fetch_array($result))
  {
      $_SESSION['catid']=$row['catid'];
  }

require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tb_subcat WHERE scatkey='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["scatkey"]=>array('name'=>$productByCode[0]["scatname"],'desc'=>$productByCode[0]["scatdesc"], 'code'=>$productByCode[0]["scatkey"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["amt"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["scatkey"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["scatkey"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
	<section id="about">
		<div class="container "><br>

			<header class="section-header" style="text-align: center">
				<h3>Add Products To Cart - BPMS</h3><br>
			</header>
			
					

<div id="shopping-cart">

<p align="right"><a id="btnEmpty" href="productbuys.php?action=empty"><button class="btn btn-info">Empty Cart</button></a></p>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart table table-bordered" cellpadding="10" cellspacing="1" >
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<!-- <th style="text-align:left;">Description</th> -->
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php	$fooditems="";	
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><?php echo $item["name"];?></td>
				<!-- <td><?php //echo $item["fdesc"]; ?></td> -->
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>

		<?php		$fooditems=$fooditems.($item["name"]." - ".$item["quantity"]." , ");  ?>

				<td style="text-align:center;"><a href="productbuys.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><button class="btn btn-warning"><img src="icon-delete.png" alt="Remove Item" /></button></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td  align="right"><strong>Total:</strong></td>
<td align="right"><strong><?php echo $total_quantity; ?></strong></td>



<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); $totalprice=number_format($total_price, 2); ?></strong></td>
<td>

<form action="placeorderreg.php" method="POST">
	<input type="hidden" name="totprice" value="<?php echo $totalprice;?>">
	<input type="hidden" name="fooditems" value="<?php echo $fooditems;?>">
	<button type="submit" class="btn btn-primary">Buy</button></a></td>
</form>

	
</tr>
</tbody>
</table>	
<!-- 




 -->
	
  <?php
} else {
?>
<div class="no-records"><p align="center" style="color: red">Your Cart is Empty</p></div>
<?php 
}
?>
</div>
<div id="product-grid">
	<div class="txt-heading"><br><header class="section-header">
				<h5 align="center">Available Products Items</h5><br>
			</header></div>

		 <!-- --------------------------------------------------------------- -->	

	<table class="table table-bordered">
			<tr>
				<th style="text-align: left">Name</th>
				<th style="text-align: left">Unit Price</th>
				<th style="text-align: left">Quantity</th>
				<th style="text-align: left">Remove</th>
			</tr>
		<tbody>
				
			<?php
			$curdate = date("l jS \of F Y"); //echo $curdate;exit;
				$product_array = $db_handle->runQuery("SELECT * FROM tb_subcat where catid='".$_SESSION['catid']."'");
				if (!empty($product_array)) { 
					foreach($product_array as $key=>$value){ ?>
						<form method="post" action="productbuys.php?action=add&code=<?php echo $product_array[$key]["scatkey"]; ?>">
							<tr>
								<td style="text-align: left"><?php echo $product_array[$key]["scatname"]; ?></td>
								<td style="text-align: left"><?php echo "$".$product_array[$key]["amt"]; ?></td>
								<td style="text-align: left"><input type="text" class="form-control input-sm" name="quantity" value="1" size="1" /></td>
								<td style="text-align: left"><input type="image" src="cart-icon.png" class="btn btn-info" border="0" alt="Submit"/></td>
							</tr>
						</form>	
			<?php
					}
				}
			?>
		</tbody>
	</table>





			 <!-- --------------------------------------------------------------- -->
</div>


		</div>
	</section>

	

	<?php
include 'customerfooter.php';

?>