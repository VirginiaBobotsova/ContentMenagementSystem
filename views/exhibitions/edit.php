<h1>Edit Existing Exhibition</h1>

<?php if ($this->exhibition) { ?>
    <form method="post" action="/exhibitions/edit/<?= $this->exhibition['id'] ?>">
        Exhibition name:
        <input type="text" name="name"
               value="<?= htmlspecialchars($this->exhibition['name']) ?>" />
        <br/>
        <input type="submit" value="Edit" />
        <a href="/exhibitions">Cancel</a>
    </form>
<?php } ?>