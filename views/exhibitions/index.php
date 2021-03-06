<section>
    <header id="section-header"><h1>Изложби</h1></header>

    <?php foreach($this->exhibitions as $exhibition): ?>
        <div class="section-element">
            <img src="<?php echo $exhibition["image"] ?>" alt="image" class="image">
            <div class="product">
                <p><h4><?php echo $exhibition["name"] ?></h4></p>
                <span><?php echo $exhibition["date"] ?></span>
                <span><?php echo $exhibition["gallery"] ?></span>
                <p><span><?php echo $exhibition["comment"] ?></span></p>
            </div>
        </div>
    <?php endforeach ?>
</section>

<aside class="top">
    <header class="aside-top-header"><h1>News</h1></header>
    <div class="news">
        <span class="date">August 2, 2009</span><br>
        <span>Aliquam eget varius arcu</span><br>
        <span><a href="">see more...</a></span>
    </div>
    <div class="news">
        <span class="date">August 1, 2009</span><br>
        <span>Aliquam eget varius arcu</span><br>
        <span><a href="">see more...</a></span>
    </div>
    <div class="news">
        <span class="date">July 28, 2009</span><br>
        <span>Aliquam eget varius arcu</span><br>
        <span><a href="">see more...</a></span>
    </div>
</aside>
<aside class="bottom">
    <header class="aside-bottom-header"><h1>Messages</h1></header>
    <div class="messages">
        <span class="date">August 2, 2009</span><br>
        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In placerat justo nulla, eget vulputate nulla finibus eu. Suspendisse justo lacus, sodales nec nisl vel, euismod fringilla augue. Cras eu ex molestie, sagittis lectus non, ultricies tellus. Nunc ornare dignissim lectus, nec molestie est convallis sit amet. Nulla in lectus ullamcorper lacus sagittis luctus vitae eget quam.</span><br>
        <span>Author:<span class="author">SoftUni</span></span><br>
        <a href="#">see all testimonials</a>
    </div>
</aside>


<a href="/exhibitions/index/<?= $this->page - 1?>/<?= $this->pageSize ?>">Prev</a>
<a href="/exhibitions/index/<?= $this->page + 1?>/<?= $this->pageSize ?>">Next</a>
