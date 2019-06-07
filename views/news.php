<br>

<div class="p-3 mb-2 bg-warning text-dark" >

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">News</li>
        </ol>
    </nav>
    <?php if(isLoggedIn()) : ?>
    <a href="/newpost" class="btn btn-info">New Post</a>
    <?php endif; ?>
    <br> <br>
    <?php foreach ($posts as $post) :  ?>
    <div class="card mb-3">
        <img src="<?php echo $post['url'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"> <?php $post['name'] ?> </h5>
            <p class="card-text"><?php echo $post['text'] ?></p>
        </div>
    </div>
    <?php endforeach; ?>



</div>
