<div class="exhibitions">
    <h4>Създай изложба</h4>


        <table class="allExhibitions">
            <tr>
                <th class="row1">ID</th>
                <th class="row2">Изложба</th>
                <th class="row3"></th>
            </tr>
            <?php foreach($this->exhibitions as $exhibition): ?>
                <tr>
                    <td>
                        <?php echo $exhibition["id"]?>
                    </td>
                    <td>
                        <?php echo $exhibition["name"]?>
                    </td>
                    <td class="edit">
                        <form method="post" action="/admin/editExhibition">
                            <input type="number" name="id"  class="get-id" value="<?php echo $id = $exhibition['id']?>"/>
                            <input type="submit" id="get-id"  value="Редактирай"/>
                        </form>
                    </td>
                </tr>
            <?php endforeach ?>
        </table>

            <div id="editExhibition"></div>
        </div>

</div>


<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script>

    $('#get-id').on('click', function(ev) {
        $.ajax({
            url: '/admin/editExhibition',
            method: 'POST'
        }).done(function(data) {
            $('#editExhibition').html(data)
        })
    })
</script>
