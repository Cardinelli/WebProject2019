<br>
<div class="p-3 mb-2 bg-warning text-dark">
    <h1>Change Mail</h1>
    <form method="post" action="/changemail">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                   placeholder="Enter email">
            <br>

            <button type="submit" class="btn btn-info">Submit</button>
            <a href="/profile" class="btn btn-info">Go Back</a>
    </form>
    <br>
    <?php if ($emailsuccess) : ?>
    <div class="alert alert-success">
        <p> <?php echo $emailsuccess ?> </p>
    </div>
    <?php endif; ?>
</div>