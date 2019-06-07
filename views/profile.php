<br>
<div class="p-3 mb-2 bg-warning text-dark" >

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
    </nav>

    <div class="card " style="width: 18rem;">
        <img src="https://asia.ifoam.bio/wp-content/uploads/2018/12/avatar__181424.png" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?php echo currentUser()['username']; ?></h5>
            <p class="card-text"><?php echo currentUser()['email']; ?> </p>
        </div>
        <ul class="list-group list-group-flush">
            <?php if(currentUser()['role'] == 1) : ?>

                <a href="/inbox" class="btn btn-info ">Inbox</a> <br>

            <?php endif; ?>

            <?php if(currentUser()['role'] == 1) : ?>

                <a href="/users" class="btn btn-info ">Registered Users</a> <br>

            <?php endif; ?>
            <a href="/changemail" class="btn btn-info ">Change Email</a> <br>
        </ul>
    </div>






</div>


