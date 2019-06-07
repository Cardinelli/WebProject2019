<br>

<div>
    <h1>Login</h1>
    <form method="post" action="/login">
        <?php if ($error) : ?>
        <div class="alert alert-danger">

            <p> <?php echo $error; ?></p>

        </div>
        <?php endif; ?>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                   placeholder="Enter email" value="<?php echo $data['email']; ?>">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
