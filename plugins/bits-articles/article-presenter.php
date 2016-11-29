<?php
require_once  __DIR__ . '/article.php';

class ArticlePresenter {
  private function is_featured_article($article) {
    return $article->is_featured();
  }

  private function compare_articles($article1, $article2) {
    return strcmp($article2->get_publish_date(), $article1->get_publish_date());
  }

  function sort_articles($articles) {
    uasort($articles, array($this, 'compare_articles'));
    return array_values($articles);
  }

  function keep_only_featured_and_sort($articles) {
    return $this->sort_articles(array_filter($articles, array($this, 'is_featured_article')));
  }
}
?>
