<!-- <h2><?php echo $title; ?></h2> -->
<a class="pull-right" style="float:right;" href="<?php echo base_url('news');?>/create">Create News</a>
<?php foreach ($news as $news_item): ?>
        <h3><?php echo $news_item['title']; ?></h3>
        <div class="main">
                <?php echo $news_item['text']; ?>
        </div>
        <p><a href="<?php echo base_url('news/'.$news_item['slug']); ?>">View article</a></p>
        <hr>
<?php endforeach; ?>