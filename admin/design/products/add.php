<form method="post" action="functions/products/insert.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">name</label>
    <input type="text" name="name" value="" class="form-control" id="exampleInputEmail1">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">price</label>
    <input type="text" name="price" value="" class="form-control" id="exampleInputEmail1">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">sale</label>
    <input type="text" name="sale" value="" class="form-control" id="exampleInputEmail1">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">images</label>
    <input type="file" name="img" value="" class="form-control" id="exampleInputEmail1">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1"> description</label>
    <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <br>
  <div class="form-group">
    <label for="exampleFormControlSelect1">category</label>
    <select name="category" class="form-control" id="exampleFormControlSelect1">
      <?php
      include "functions/connect.php";
      $select = "SELECT * FROM categories";
      $query = $conn->query($select);
      foreach ($query as $cat) {
      ?>
        <option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
      <?php } ?>
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>