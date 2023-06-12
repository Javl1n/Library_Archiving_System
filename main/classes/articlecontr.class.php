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

    public function editArticle($id, $title, $cid, $description, $authors, $tags)
    {
        $this->updateArticle($id, $title, $cid, $description);


        if (!empty($authors)) {
            $this->deleteAuthors($id);
            foreach ($authors as $author) {
                $this->setAuthors($id, $author);
            }
        }

        if (!empty($tags)) {
            $this->deleteTags($id);
            foreach ($tags as $tag) {
                $this->setTags($id, $tag);
            }
        }
    }

    public function editArticleStatus($id, $status_id)
    {
        $this->updateArticleStatus($id, $status_id);
    }

    public function deleteArticle($id)
    {
        $article = $this->getArticle($id);
        $tags = $this->getArticleWTags($id);
        $authors = $this->getArticleWAuthors($id);

        if ($article['article_status_id'] != 3) {
            $this->setArchive($article);
            foreach ($tags as $tag) {
                $this->setArchiveTags($tag['article_id'], $tag['tag_id']);
            }
            foreach ($authors as $author) {
                $this->setArchiveAuthors($author['article_id'], $author['student_id']);
            }
        }
        $this->deleteAuthors($id);
        $this->deleteTags($id);
        $this->permadeleteArticle($id);
    }

    public function retrieveArticle($id)
    {
        $article = $this->getArchive($id);
        $tags = $this->getArchiveWTags($id);
        $authors = $this->getArchiveWAuthors($id);
        $this->resetArticle($article);
        foreach ($tags as $tag) {
            $this->setTags($tag['archive_id'], $tag['tag_id']);
        }
        foreach ($authors as $author) {
            $this->setAuthors($author['archive_id'], $author['student_id']);
        }
        $this->deleteArchiveAuthors($id);
        $this->deleteArchiveTags($id);
        $this->permadeleteArchive($id);
    }

    public function editArchiveStatus($id, $status_id)
    {
        $this->updateArchiveStatus($id, $status_id);
    }
}
