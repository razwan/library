<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<div class="banner">
    <div class="banner-title">
        <h1>Library</h1>
    </div>
    <form class="banner-search" action="">
        <input type="text" name="s"/>
        <button class="btn">Search</button>
    </form>
</div>
<div class="sidebar"></div>
<div class="container">
    <?php foreach (array('A', 'B', 'C', 'D') as $letter): ?>
        <div class="heading">
            <h1><?php echo $letter; ?></h1>
        </div>
        <?php for ($i = 1; $i < 4; $i++): ?>
            <div class="shelf">
                <div class="books">
                    <?php for ($j = 1; $j < 13; $j++): ?>
                        <article class="book">
                            <div class="book-cover"></div>
                            <div class="book-info">
                                <h1 class="book-title">
                                    Maybe a longer Book Title
                                    <span class="book-author">by Author</span>
                                </h1>
                            </div>
                        </article>
                    <?php endfor ?>
                </div>
            </div>
        <?php endfor ?>
    <?php endforeach ?>
</div>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/vendor/TweenMax.min.js"></script>
<script src="assets/js/vendor/jquery.gsap.min.js"></script>
</body>
</html>