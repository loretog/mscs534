<h1>Add Category</h1>

<form method="post">	
  <div class="form-group">
    <label for="exampleInputEmail1">SKU</label>
    <input type="text" name="SKU" class="form-control" id="exampleInputEmail1" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">ProductName</label>
    <input type="text" name="ProductName" class="form-control" id="exampleInputEmail1" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Category</label>
      <select class="form-control" name="CategoryID">
        <?php while( $category = $categories->fetch_object() ) : ?>
        <option value="<?php echo $category->CategoryID ?>"><?php echo $category->ProductCategory ?></option>        
        <?php endwhile; ?>
      </select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Price</label>
    <input type="text" name="Price" class="form-control" id="exampleInputEmail1" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Cost</label>
    <input type="text" name="Cost" class="form-control" id="exampleInputEmail1" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Color</label>
    <input type="text" name="Color" class="form-control" id="exampleInputEmail1" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Height</label>
    <input type="text" name="Height" class="form-control" id="exampleInputEmail1" placeholder="">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Width</label>
    <input type="text" name="Width" class="form-control" id="exampleInputEmail1" placeholder="">
  </div>
  <a href="<?php echo ROOT_URL ?>/admin/products">&laquo; Back</a>
  <button type="submit" class="btn btn-default pull-right">Save</button>
</form>