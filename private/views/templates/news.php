<?php

// var_dump($article_list);

?>

<main>
    <div class="list-menu">
        <p>Most recent articles</p>
        <input type="search" name="search" class="inp-search search-article" autocomplete="off" placeholder="Search title..">
    </div>
    <div class="article-list">
        <?php
        if(!empty($article_list)) {
            foreach ($article_list as $article_info) {
                $subtitle = explode(" ", $article_info->a_par);
                count($subtitle) >= 5 ? $sub_limit = 5 : $sub_limit = count($subtitle);
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
            echo "nothing found <br>";
            // if ($debug) {
            //     echo "<pre> <br>";
            //     var_dump($article_list);
            //     echo "</pre>";
            // }
        }
        ?>
    </div>

    <div class="pagination">
        <?php
        $pages = ceil($articleCount / LIST_LIMIT);
        if ($page != 1) {
            echo "<a class='arrow' href='./news-".($page-1)."'>&#60;</a>";
        }

        for ($i = 1; $i <= $pages; $i++) {
            if ($i == $page) {
                echo "<a class='onpage' href='./news-$i'>$i</a>";
            } else {
                echo "<a href='./news-$i'>$i</a>";
            }
        }

        if ($page < $pages) {
            echo "<a class='arrow' href='./news-".($page+1)."'>&#62;</a>";
        }

        ?>
    </div>

</main>

<script src="js/article-search.js"></script>