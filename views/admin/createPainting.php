
<div class="form-admin">
    <h4>Създай картина</h4>
    <div class="form-body">
        <form role="form" method="post" action="/admin/createExhibition">
            <div class="form-group">
                <label for="image" class="label">Снимка</label>
                <input type="file" class="form-control" id="image" name="image" placeholder="">
            </div>
            <div class="form-group">
                <label for="name" class="label">Име</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="">
            </div>
            <div class="form-group">
                <label for="exhibition" class="label">Изложба</label>
                <input type="text" class="form-control" id="exhibition" name="exhibition" placeholder="">
            </div>
            <div class="form-group">
                <label for="comment" class="label">Коментар</label>
                <textarea class="form-control" id="comment" name="comment" cols="30" rows="5"></textarea>
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
            url: '/admin/findLastCreatedPainting',
            method: 'GET'
        }).done(function(data) {
            $('#last-created-view').html(data)
        })
    })
</script>
</body>
</html>