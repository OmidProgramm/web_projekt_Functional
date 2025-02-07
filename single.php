
<?php 

    require('./funktions.php');

    if(!isset($_GET['post'])){
            redirect("website.php");
        } 
    
    $id = $_GET['post'];

    $setting = get_data('setting');
    $posts = get_data('posts');
    $top_posts = get_posts_order_by_views($posts);
    $last_posts = get_posts_order_by_data($posts);
    $post = get_post_by_id($posts,$id);
   
    
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="<?= $setting['description'] ?>">
        <meta name="keyword" content="<?= $setting['Keywords'] ?>">
        <meta name="Author" content="<?= $setting['author'] ?>">
        <title><?= $setting['title'] ?></title>
        <link rel="stylesheet" href="<?= asset('css/website.css') ?>">
    </head>
    <body>
        <main> 
           <?php require('./parts/header.php') ?>
           <?php require('./parts/navbar.php') ?>
           
            <section id="content">
                <?php require('./parts/sidebar.php') ?>
                <div id="articles">
                    <?php if($post != null): ?>
                        <article>
                            <div class="caption">
                                <h3><?= $post['title'] ?></h3>
                                <ul>                             
                                    <li>date:<span><?= date('Y M d',strtotime($post['date']))  ?></span></li>
                                    <li>views:<span><?= $post['view'] ?></span></li>
                                </ul>                          
                                <p><?= $post['content'] ?></p>                         
                            </div>
                            <div class="image">
                                <img src="<?= asset($post['image']) ?>" alt="<?= $post['title'] ?>">
                            </div>
                            <div class="clearfix"></div>
                        </article>
                    <?php else: ?>
                        <article>
                            <strong>404</strong> does not exist any data!
                        </article>  
                    <?php endif ?>
                </div>
                <div class="clearfix"></div>
            </section>
            
           <?php require('./parts/footer.php') ?>
        </main>
    </body>
</html>

