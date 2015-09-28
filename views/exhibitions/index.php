<section>
    <header id="section-header"><h1>Изложби</h1></header>

    <?php foreach($this->exhibitions as $exhibition): ?>
    <div class="section-element">
        <img src="<?php getImage($exhibition[0]) ?>" alt="image" class="image">
        <div class="product">
            <p><h4><?php echo $exhibition[1] ?></h4></p>
            <span>?php echo $exhibition[2] ?></span>
            <span>?php echo $exhibition[3] ?></span>
            <p><span>?php echo $exhibition[4] ?></span></p>
        </div>
    </div>
    <?php endforeach ?>

    <div class="section-element">
        <img src="images/2.jpg" alt="image" class="image">
        <div class="product">
            <p><h4>Meeting Place</h4></p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut gravida nunc eu felis auctor, nec accumsan odio egestas. Nullam vitae dui nulla. Fusce fermentum convallis ligula, non porta nibh volutpat nec. Nulla cursus finibus augue eu rutrum.</p>
        </div>
    </div>
    <div class="section-element">
        <img src="images/3.jpg" alt="image" class="image">
        <div class="product">
            <p><h4>Skate Show</h4></p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut gravida nunc eu felis auctor, nec accumsan odio egestas. Nullam vitae dui nulla. Fusce fermentum convallis ligula, non porta nibh volutpat nec. Nulla cursus finibus augue eu rutrum.</p>
        </div>
    </div>
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
