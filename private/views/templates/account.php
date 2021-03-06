<?php

// var_dump($article_list);

?>


<main>
    <div class="view-user">
        <div class="avatar">
            <img src="img/avatar/<?= $user_info->user_avatar ?>" alt=" ">
        </div>
        <div class="user-info">
            <h2><?= $user_info->user_name ?></h2>
            <a href='<?=$router->getCoreUrl();?>settings'><img class='settings' src='img/settingsIcon.png'></a>
        </div>

        <div class="list-menu" style="padding-bottom: 5px;">
            <p>Saved articles</p>
        </div>

        <div class="article-list">
            <?php
            if(!empty($article_list)) {
                foreach ($article_list as $article_info) {
                    $subtitle = explode(" ", $article_info->a_par);
                    count($subtitle) >= 6 ? $sub_limit = 6 : $sub_limit = count($subtitle);
                    $article_par = "";
                    for ($i = 0; $i < $sub_limit; $i++) {
                        $article_par .= $subtitle[$i] . " ";
                    }
                    echo "
                        <article>
                            <a href='article-".$article_info->a_id."'>
                                <div>
                                <h1>".$article_info->a_title."</h1>
                                <h2>".$article_par."</h2>
                                </div>
                                <div class=\"img-background\">
                                    <img src=\"img/". explode("[&&]", $article_info->a_img_links)[0] ."\" alt=\"\">
                                </div>
                            </a>
                        </article>";
                }
            } else {
                echo "no articles saved <br>";
                // if ($debug) {
                //     echo "<pre> <br>";
                //     var_dump($article_list);
                //     echo "</pre>";
                // }
            }
            ?>
        </div>
    </div>
</main>