<br>
<div class="p-3 mb-2 bg-warning text-dark">
    <table class="table table-striped table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Firstname</th>
            <th scope="col">Lastname</th>
            <th scope="col">Email</th>
            <th scope="col">Message</th>
          <!--  <th scope="col">Action</th> -->
        </tr>
        </thead>
        <tbody>
        <?php foreach ($contacts as $contact) : ?>
        <tr>
            <th scope="row"><?php echo $contact['id'] ?></th>
            <td><?php echo $contact['firstname'] ?></td>
            <td><?php echo $contact['lastname'] ?></td>
            <td><?php echo $contact['email'] ?></td>
            <td><?php echo $contact['message'] ?></td>
         <!--   <td>
                <a class="btn btn-sm btn-outline-danger" href="/delete?id=<?php $contact['id']; ?> ?>">Delete</a>
            </td> -->
        </tr>
        </tbody>
        <?php endforeach; ?>
    </table>

</div>