<!DOCTYPE html>
<html lang="en">
<?php include('modules/a-header.php'); ?>
<div class="text-center">
    <h1>Products Table</h1>
</div>
<hr>
<!-- Modal -->
<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="insertModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="insertModalLabel">Insert new data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="process/insert.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Description</label>
                        <input name="prod_desc" type="text" class="form-control" placeholder="Enter Product Description...">
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input name="price" type="number" step="0.01" class="form-control" placeholder="Enter Price...">
                    </div>
                    <div class="form-group mb-0">
                    <label>Product Image</label>
                    </div>
                        <input name="image" type="file" accept="image/jpeg">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="insertprod" class="btn btn-primary">Insert Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

<button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#insertModal">
    Add Product
</button>
<div style="overflow-x: auto;">
    <form action="">
        <table class="table table-striped">
            <thead>
                <th>Product Number</th>
                <th>Description</th>
                <th>Price</th>
                <th></th>
            </thead>
            <?php
            require_once('../database/database.php');
            $sql = "SELECT * FROM products_table";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result)) {
                while ($products = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <td><input type="text" name="prodno" value="<?php echo $products['prodno']; ?>" placeholder="NULL" disabled></td>
                        <td><input type="text" name="prod_desc" value="<?php echo $products['prod_desc']; ?>" placeholder="NULL" disabled></td>
                        <td><input type="text" name="msrp" value="<?php echo $products['msrp']; ?>" placeholder="NULL" disabled></td>
                        <td>
                            <div class="btn-group">
                                <a href="process/edit.php?prod=<?php echo $products['prodno']; ?>" name="prodno_submit" class="btn btn-success edit-button mr-2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a href="process/deleteuser.php?prod=<?php echo $products['prodno']; ?>" class="btn btn-danger del-button"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </div>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </table>
    </form>
</div>
<?php include('process/delete.php'); ?>
<script src="../scripts/globaljs.js"></script>
</body>

</html>