<!-- head -->
<?php include('layouts/head.php'); ?>					
	<!-- end head -->
	<!-- header -->
	<?php include('layouts/header.php'); ?>					
	<!-- end header -->
	
	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Search For:</h3>
							<input type="text" placeholder="Keywords">
							<button type="submit">Search <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search arewa -->
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Fresh and Organic</p>
						<h1>Shop</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">

			<div class="row">
                <div class="col-md-35">

                    <div class="product-filters">
                        <ul>
                            <li class="active" data-filter="*">All</li>
							<?php 
					$categorys = Category::find_all();
					$pieces = Piece::find_all();
					// echo "hhhhhhhherrrrrrrrre";var_dump($categorys);
					if($categorys){
						foreach ($categorys as $key => $category) {
						?>
							<li data-filter=".<?php echo $category->name;?>"><?php echo $category->name;?></li>
							<?php
						}	
					}
				?>
                        </ul>
                    </div>
                </div>
            </div>
<?php 
					$pieces = Piece::find_all();?>
<div class="row product-lists">

<?php









if($pieces){
	foreach($pieces as $vlue){	
						?>
<div class="col-lg-4 col-md-6 text-center <?php echo h($vlue->category_name($vlue->id_categorie)->name);?>">
	<div class="single-product-item">
		<div class="product-image">
			<a href="single-product.html"><img src="admin/uploads/<?php echo $vlue->photo; ?>" alt=""></a>
		</div>
		<h3><?php echo h($vlue->name);?></h3>
		<p class="product-price"><span>Prix unitaire</span> <?php echo h($vlue->sale_price);?>  DZD </p>
		<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
	</div>
</div>

<?php
}	
}
?>

</div>
			
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="pagination-wrap">
						<ul>
							<li><a href="#">Prev</a></li>
							<li><a href="#">1</a></li>
							<li><a class="active" href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end products -->
<!-- logo_carousel -->
<?php include('layouts/logo_carousel.php'); ?>	
	<!-- end logo_carousel -->

	<!-- footer -->
	<?php include('layouts/footer.php'); ?>					
	<!-- end footer -->