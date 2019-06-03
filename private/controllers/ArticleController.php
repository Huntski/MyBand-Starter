<?php

class ArticleController {
    function loadPage($article = 0) {

        require "../private/models/model.php";

        $model = new model;

        $user_info = $model->getUserInformation($_SESSION['userid']);

        if (isset($_POST['comment'])) {

            if (!empty($_POST['comment'])) {

                $model->postComment($user_info, $article, $_POST['comment']);

                $router = new router;

                $uri = $router->getUrl();

                header("location: $uri");
            }
        }

        $article_info = $model->getArticle($article);

        $article_comments = $model->getArticleComments($article_info->a_id);

        // echo "<pre><br><br><br>";
        // var_dump($article_comments);
        // echo "</pre>";

        if (isset($article_info) && isset($article_comments)) {

            require "../private/views/engine.php";

            $template_engine = new template_engine;

            $template_engine->render("article", $article_info, $article_comments, $user_info);
        } else {
            echo "article not found";
            die();
        }
    }
}