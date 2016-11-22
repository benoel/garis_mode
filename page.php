<?php 
include 'conn.php';
// setting per page mau tampil berapa (efek ke view)
$perpage = 9;
//end setting

if (($_GET['page']) || ($_GET['page'] && $_GET['category'])) {

	$category = $_GET['category'];

	$p = $_GET['page'];
	if ($p > 1) {
		# code...
		(int)$page = ($p * $perpage) - $perpage;
	}else{
		(int)$page = 0;
	}
	if ($category != '') {
		# code...
		$query = mysql_query("SELECT * FROM products where category = '$category' ORDER BY product_id DESC Limit $page , $perpage");
	}else{
		$query = mysql_query("SELECT * FROM products ORDER BY product_id DESC Limit $page , $perpage");
	}
	
	
	
	if (mysql_num_rows($query) > 0) {

		while ($data = mysql_fetch_assoc($query)) { ?>

		<div class="col posts s12 m4 product white center-align">
			<div class="card-panel hoverable">

				<img class="responsive-img" src="asset/img/upload/<?php echo $data['picture'] ?>" alt="">
				<div class="product-title">
					<?php echo (strlen($data['name']) <= 15)? $data['name'] : substr($data['name'], 0, 15).'...';  ?>
				</div>
				<div class="price">Rp <?php echo $data['price'] ?></div>
				<div class="divider"></div>
				<?php if ($data['stock'] != 0){ ?>
				<a href="action/?act=detail_product&id=<?php echo $data['product_id'] ?>"><button class="btn waves-effect waves-light grey darken-4">Add to Cart</button></a>
				<?php }else{ ?>
				<button class="btn waves-effect waves-light grey darken-4">STOCK HABIS</button>
				<?php  } ?>
			</div>
		</div>

		<?php } 
	}else{
		echo "Sorry, No product on that category!";
	}
}?>