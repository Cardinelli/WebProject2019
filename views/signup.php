<br>

<div>
    <h1>Register</h1>

    <?php if($success) : ?>
    <div class="alert alert-success">
        <p> <?php echo $success ?> </p>
    </div>
    <?php elseif ($error2) : ?>
    <div class="alert alert-danger">
        <p> <?php echo $error2 ?>  </p>
    </div>
    <?php endif; ?>

    <form method="post" action="/signup">
        <div class="form-group">
            <label for="exampleInputUsername">Username</label>
            <input type="text" class="form-control" id="exampleInputUsername" name="username"
                   placeholder="Enter Username">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                   placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>