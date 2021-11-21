<!DOCTYPE html>
<html lang="en">
<?php include('modules/a-header.php'); ?>
<body>
    <div class="text-center">
        <h1>Order Table</h1>
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
                <form action="process/insert.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Order Number</label>
                            <input name="o_num" type="text" class="form-control" placeholder="Enter Order Number...">
                        </div>
                        <div class="form-group">
                            <label>User</label>
                            <input name="user" type="text" class="form-control" placeholder="Enter User...">
                        </div>
                        <div class="form-group">
                            <label>Date Ordered</label>
                            <input name="date" type="date" class="form-control" placeholder="Enter Date Ordered...">
                        </div>
                        <div class="form-group">
                            <label>Instructions</label>
                            <input name="instructions" type="text" class="form-control" placeholder="Enter Physical instructions...">
                        </div>
                        <div class="form-group">
                            <label>Paid Amount</label>
                            <input name="amount" type="number" step="0.01" class="form-control" placeholder="Enter Paid Amount...">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertorder" class="btn btn-primary">Insert Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#insertModal">
        Add Order
    </button>
    <div style="overflow-x: auto;">
        <form action="" method="POST">
            <table class="table table-striped">
                <thead>
                    <th>Order number</th>
                    <th>User</th>
                    <th>Date Ordered</th>
                    <th>Instructions</th>
                    <th>Paid Amount</th>
                    <th></th>
                </thead>
                <?php
                require_once('../database/database.php');
                $sql = "SELECT * FROM order_table o JOIN user_table u ON o.user = u.user";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result)) {
                    while ($order = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>
                            <td><input type="text" name="orderno" value="<?php echo $order['orderno']; ?>" placeholder="NULL" disabled></td>
                            <td><input type="text" name="user" value="<?php echo $order['user']; ?>" placeholder="NULL" disabled></td>
                            <td><input type="text" name="date" value="<?php echo $order['o_date']; ?>" placeholder="NULL" disabled>
                            <td><textarea class="form-control" disabled><?php echo $order['instructions']; ?></textarea></td>
                            <td><input type="text" name="paid" value="<?php echo $order['paid_amount']; ?>" placeholder="NULL" disabled>
                            <td>
                                <div class="btn-group">
                                    <a href="process/edit.php?orderno=<?php echo $order['orderno']; ?>" class="btn btn-success edit-button mr-2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a href="process/deleteuser.php?order=<?php echo $order['orderno']; ?>" class="btn btn-danger del-button"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
    <script src="../scripts/globaljs.js"></script>
</body>

</html>