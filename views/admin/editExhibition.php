<div class="form-admin">
    <h4>Създай изложба</h4>
    <div class="form-body">
        <form role="form" method="post" action="/admin/editExhibition">
            <div class="form-group">
                <label for="image" class="label">Снимка</label>
                <input type="file" class="form-control" id="image" name="image" placeholder="">
            </div>
            <div class="form-group">
                <label for="name" class="label">Име</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $this->exhibitions['name']?>">
            </div>
            <div class="form-group">
                <label for="date" class="label">Дата</label>
                <input type="date" class="form-control" id="date" name="date" placeholder="">
            </div>
            <div class="form-group">
                <label for="gallery" class="label">Галерия</label>
                <input type="text" class="form-control" id="gallery" name="gallery" placeholder="">
            </div>
            <div class="form-group">
                <label for="comment" class="label">Коментар</label>
                <textarea class="form-control" id="comment" name="comment" cols="30" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="text" class="label">Текст</label>
                <textarea class="form-control" id="text" name="text" cols="30" rows="15"></textarea>
            </div>
            <button type="submit" class="form-submit">Създай</button>
            <button id="last-created" class="form-submit">Преглед</button>

        </form>
        <div class="form-comment">

            <div id="last-created-view"></div>
        </div>
    </div>
</div>


<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script>

    $('#last-created').on('click', function(ev) {
        $.ajax({
            url: '/admin/findLastCreatedExhibition',
            method: 'GET'
        }).done(function(data) {
            $('#last-created-view').html(data)
        })
    })
</script>
</body>
</html>