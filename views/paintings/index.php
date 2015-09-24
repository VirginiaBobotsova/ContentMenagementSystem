<h1>List of Paintings</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th colspan="2">Action</th>
    </tr>
    <?php foreach ($this->paintings as $painting) : ?>
        <tr>
            <td><?= htmlspecialchars($painting['id']) ?></td>
            <td><?= htmlspecialchars($painting['name']) ?></td>
            <td><a href="/paintings/edit/<?=$painting['id'] ?>">[Edit]</td>
            <td><a href="/paintings/delete/<?=$painting['id'] ?>">[Delete]</td>
        </tr>
    <?php endforeach ?>
</table>

<a href="/paintings/create">[Create New]</a>
