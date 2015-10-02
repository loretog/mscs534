<h1>Products</h1>

<p><a class="btn btn-success btn-xs" href="<?php echo ROOT_URL ?>/admin/add_product">New Product</a></p>

<form method="post">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>SKU</th>
				<th>Category</th>
				<th>ProductName</th>
				<th>Price</th>
				<th>Cost</th>
				<th>Color</th>
				<th>Height</th>
				<th>Width</th>
				<th style="width: 60px; text-align: center;"><button type="submit" class="btn btn-danger btn-xs">Delete</button></th>
			</tr>
		</thead>
		<tbody>	
			<?php if( $products->num_rows ) : ?>
			<?php while( $product = $products->fetch_object() ) : ?>
			<tr>
				<td><?php echo $product->SKU ?></td>
				<td><?php echo $product->ProductCategory ?></td>
				<td><a href="<?php echo ROOT_URL ?>/admin/edit_product/<?php echo $product->SKU ?>"><?php echo $product->ProductName ?> <span class="glyphicon glyphicon-edit"></span></a></td>
				<td><?php echo $product->Price ?></td>
				<td><?php echo $product->Cost ?></td>
				<td><?php echo $product->Color ?></td>
				<td><?php echo $product->Height ?></td>
				<td><?php echo $product->Width ?></td>
				<td style="text-align: center;"><input type="checkbox" name="products[]" value="<?php echo $product->SKU ?>"></td>
			</tr>
			<?php endwhile; ?>
			<?php else : ?>
			<tr>
				<td colspan="9">No record available</td>
			</tr>
			<?php endif; ?>
		</tbody>
	</table>
</form>
