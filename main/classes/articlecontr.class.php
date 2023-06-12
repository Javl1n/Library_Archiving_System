<?php

class articlecontr extends article
{
    public function uploadArticle($title, $course, $authors, $tags, $abstraction)
    {
        $id = $this->setArticle($title, $course, $abstraction);


        if (!empty($authors)) {
            foreach ($authors as $author) {
                $this->setAuthors($id[0]["LAST_INSERT_ID(article_id)"], $author);
            }
        }
        if (!empty($tags)) {
            foreach ($tags as $tag) {
                $this->setTags($id[0]["LAST_INSERT_ID(article_id)"], $tag);
            }
        }
    }
}
