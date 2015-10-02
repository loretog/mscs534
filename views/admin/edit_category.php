<h1>Edit Category</h1>

<form method="post">	
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="ProductCategory" value="<?php echo $category->ProductCategory ?>" class="form-control" id="exampleInputEmail1" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>    
    <textarea class="form-control" name="Description"><?php echo $category->Description ?></textarea>
  </div>
  <a href="<?php echo ROOT_URL ?>/admin/categories">&laquo; Back</a>
  <button type="submit" class="btn btn-default pull-right">Update</button>
</form>