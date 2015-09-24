<h1>List of Exhibitions</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th colspan="2">Action</th>
    </tr>
    <?php foreach ($this->exhibitions as $exhibition) : ?>
        <tr>
            <td><?= htmlspecialchars($exhibition['id']) ?></td>
            <td><?= htmlspecialchars($exhibition['name']) ?></td>
            <td><a href="/exhibitions/edit/<?=$exhibition['id'] ?>">[Edit]</td>
            <td><a href="/exhibitions/delete/<?=$exhibition['id'] ?>">[Delete]</td>
        </tr>
    <?php endforeach ?>
</table>

<a href="/exhibitions/create">[Create New]</a>
