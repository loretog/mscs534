<h1>Categories</h1>

<p><a class="btn btn-success btn-xs" href="<?php echo ROOT_URL ?>/admin/add_category">New Category</a></p>

<form method="post">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Description</th>
				<th style="width: 60px; text-align: center;"><button type="submit" class="btn btn-danger btn-xs">Delete</button></th>
			</tr>
		</thead>
		<tbody>	
			<?php if( $categories->num_rows ) : ?>
			<?php while( $category = $categories->fetch_object() ) : ?>
			<tr>
				<td><?php echo $category->CategoryID ?></td>
				<td><a href="<?php echo ROOT_URL ?>/admin/edit_category/<?php echo $category->CategoryID ?>"><?php echo $category->ProductCategory ?> <span class="glyphicon glyphicon-edit"></span></a></td>
				<td><?php echo $category->Description ?></td>
				<td style="text-align: center;"><input type="checkbox" name="categories[]" value="<?php echo $category->CategoryID ?>"></td>
			</tr>
			<?php endwhile; ?>
			<?php else : ?>
			<tr>
				<td colspan="4">No record available</td>
			</tr>
			<?php endif; ?>
		</tbody>
	</table>
</form>