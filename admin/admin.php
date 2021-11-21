<!DOCTYPE html>
<html lang="en">
<?php include('modules/a-header.php'); ?>
<div class="text-center">
    <h1>Users Table</h1>
</div>
<hr>
<!-- Modal -->
<div class="modal fade" id="insertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Insert new data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="process/insert.php" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>User</label>
                        <input name="user" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter User...">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="pass" type="password" class="form-control" placeholder="Enter Password...">
                    </div>
                    <div class="form-group">
                        <label>Email address</label>
                        <input name="email" type="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter Email...">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input name="address" type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Physical Address...">
                    </div>
                    <div class="form-group">
                        <label>Contact</label>
                        <input name="contact" type="tel" class="form-control" aria-describedby="emailHelp" placeholder="Enter Contact...">
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="usertype" id="inlineRadio1" value="A">
                        <label class="form-check-label" for="inlineRadio1">Admin</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="usertype" id="inlineRadio2" value="C" checked>
                        <label class="form-check-label" for="inlineRadio2">User</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="insertuser" class="btn btn-primary">Insert Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<button type="button" class="btn btn-primary m-2" data-toggle="modal" data-target="#insertModal">
    Add User
</button>
<div style="overflow-x: auto;">
    <table class="table table-striped">
        <thead>
            <th width="20%">User</th>
            <th width="20%">Email</th>
            <th width="40%">Address</th>
            <th width="15%">Contact</th>
            <th width="5%"></th>
        </thead>
        <?php
        require_once('../database/database.php');
        $sql = "SELECT * FROM user_table";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)) {
            while ($users = mysqli_fetch_assoc($result)) {
        ?>
                <tr>
                    <form class="form-submit">
                        <td><input type="text" name="user" class="user" value="<?php echo $users['user']; ?>" placeholder="NULL" disabled></td>
                        <td><input type="text" name="email" class="email" value="<?php echo $users['emailadd']; ?>" placeholder="NULL" disabled></td>
                        <td><input type="text" name="address" class="address" value="<?php echo $users['user_address']; ?>" placeholder="NULL" disabled></td>
                        <td><input type="text" name="contact" class="contact" value="<?php echo $users['contact']; ?>" placeholder="NULL" disabled></td>
                        <td>
                            <div class="btn-group">
                                <a href="process/edit.php?user_tag=<?php echo $users['user']; ?>" class="btn btn-success edit-button mr-2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a href="process/deleteuser.php?user=<?php echo $users['user']; ?>" class="btn btn-danger del-button"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </div>
                        </td>
                    </form>
                </tr>

        <?php
            }
        }
        ?>
    </table>
</div>
<script src="../scripts/globaljs.js"></script>

</body>

</html>