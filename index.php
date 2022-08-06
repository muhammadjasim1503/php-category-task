<?php 

include "category_class.php";
include "product_class.php";

$productObj = new Product();
$categoryObj = new Category();

$categories = $categoryObj->displayCategories();
$product = $productObj->displayProducts();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>PHP Task</title>
	<!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    
</head>
<body>
	<div class="row">
		<div class="col-md-3">
			<div class = "check-box">
				<h2>Categories</h2>
				<?php 
				foreach($categories as $c){
					?>
					<label for="<?php echo $c['title'] ?>"><?php echo $c['title'] ?></label>
					<input type="checkbox" name = "<?php echo $c['title'] ?>" value = "<?php echo $c['id'] ?>" class = "common-selector chkbox"> <br />
				<?php
				}
				?>
			</div>
		</div>

		<div class="col-md-9">
			<h2>Products</h2>
			<div class="filter-data">
				<?php
					foreach($product as $p){
						?>
						<p><?php echo $p['title'] ?></p>
						<?php
					}
				?>
			</div>
		</div>
		
	</div>
</body>

<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->

<script>
$(document).ready(function() {
	function getFilter(classname){
		var filter = [];
		$('.' + classname + ':checked').each(function() {
			filter.push($(this).val());
		});
		return filter;
	}

	$('.common-selector').click(function(){
		filter();
	});

	function filter(){
		// $('.filter').click(function() {
			var category = getFilter('chkbox');
			console.log(category);
			$.ajax({
				url: "values.php",
				method: "POST",
				data: {
					category:category,
				},
				success: function(data){
					document.getElementsByClassName('filter-data')[0].innerHTML = data;
				}
			});
		}
	// }
});
</script>
</html>