<section>
    <header id="section-header"><h1>Events</h1></header>

    <?php foreach($this->events as $event): ?>
        <div class="section-element">
            <img src="<?php echo $event["image"] ?>" alt="image" class="image">
            <div class="product">
                <p><h4><?php echo $event["name"] ?></h4></p>
                <p><span><?php echo $event["comment"] ?></span></p>
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
