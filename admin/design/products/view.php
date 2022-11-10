<a class="btn btn-primary" href="?action=add">Add Product</a>
<br>
<br>
<table class="table table-hover table-bordered table-striped">
  <thead >
    <tr>
      <th>id</th>
      <th>name</th>
      <th>price</th>
      <th>sale</th>
      <th>image</th>
      <th>category</th>
      <th>controlls</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include "functions/connect.php";
    $selectProduct = "SELECT * FROM products";
    $queryProduct = $conn->query($selectProduct);
    foreach ($queryProduct as $product) {
    ?>
      <tr>
        <td><?= $product['id'] ?></td>
        <td><?= $product['name'] ?></td>
        <td><?= $product['price'] ?></td>
        <td><?= $product['sale'] ?></td>
        <td><img style='width:100px' src="images/<?= $product['img'] ?>"></td>
        <td><?php
          $cat_id = $product['cat_id'] ;
          $selectCat = "SELECT name FROM categories WHERE id = $cat_id ";
          $queryCat = $conn -> query($selectCat);
          $category = $queryCat -> fetch_assoc();
          echo $category['name'];
        ?></td>
        <td>
          <div class="btn btn-group btn-group-sm">
            <a class="btn btn-primary" href="">Edit</a>
            <a class="btn btn-danger" href="">Delete</a>
          </div>
        </td>
      </tr>
    <?php } ?>
  </tbody>

</table>