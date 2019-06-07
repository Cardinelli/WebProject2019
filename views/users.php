<br>
<div class="p-3 mb-2 bg-warning text-dark">
    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Role</th>
          <!--  <th scope="col">Action</th> -->
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user) : ?>
        <tr>
            <th scope="row"><?php echo $user['id'] ?></th>
            <td><?php echo $user['username'] ?></td>
            <td><?php echo $user['email'] ?></td>
            <td><?php if ($user['role'] == 1){
                echo 'Admin';
                }
                else { echo 'User'; }
                ?></td>
           <!-- <td>
                <a class="btn btn-sm btn-outline-danger" href="inbox.php?id=<?php echo $user['id'] ?>">Delete</a>
            </td> -->
        </tr>
        </tbody>
        <?php endforeach; ?>
    </table>

</div>
