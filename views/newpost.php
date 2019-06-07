<br>
<div class="p-3 mb-2 bg-warning text-dark">

    <form id="contact-form" method="post" action="/newpost" role="form">
        <br>
        <div class="form-group">
            <label for="URL">URL</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="name"
                   placeholder="URL" value="">
        </div>

        <div class="form-group">
            <label for="form_message">Message *</label>
            <textarea id="form_message" name="message" class="form-control" placeholder="Textarea" rows="4" required="required" data-error="Insert Text"></textarea>
            <div class="help-block with-errors"></div>
        </div>
        <button type="submit" class="btn btn-info">Submit</button>
    </form>
    <br>
    <?php if ($successpost) : ?>
    <div class="alert alert-success">
        <p> <?php echo $successpost ?> </p>
    </div>
    <?php endif; ?>
</div>