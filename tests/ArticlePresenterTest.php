<?php
require_once __DIR__ . '/../plugins/bits-articles/article.php';
require_once __DIR__ . '/../plugins/bits-articles/article-presenter.php';

class ArticlePresenterTest extends PHPUnit_Framework_TestCase {
  private $article_presenter;

  protected function setUp() {
    $this->article_presenter = new ArticlePresenter();
  }

  public function test_sort_article() {
    $olderArticle = new Article('Dummy title for article', '2016-10-12 11:00:33', 'Original Author #1', 'Lorem ipsum', false);
    $newerArticle = new Article('Dummy title for another article', '2016-11-12 11:00:33', 'Original Author #2', 'Lorem ipsum', false);
    $articles = array(
      $olderArticle,
      $newerArticle
    );

    $this->assertEquals($this->article_presenter->sort_articles($articles)[0], $newerArticle);
  }

  public function test_keep_only_featured_and_sort() {
    $firstArticle = new Article('Dummy title for article', '2016-10-09 11:00:33', 'Original Author #1', 'Lorem ipsum', false);
    $secondArticle = new Article('Dummy title for another article', '2016-10-23 11:31:55', 'Original Author #2', 'Lorem ipsum', true);
    $thirdArticle = new Article('Dummy title for another article', '2016-11-02 14:10:23', 'Original Author #3', 'Lorem ipsum', false);
    $fourthArticle = new Article('Dummy title for another article', '2016-11-22 17:50:13', 'Original Author #4', 'Lorem ipsum', true);

    $articles = array(
      $firstArticle,
      $secondArticle,
      $thirdArticle,
      $fourthArticle
    );

    $featured_articles = $this->article_presenter->keep_only_featured_and_sort($articles);

    $this->assertEquals(count($featured_articles), 2);
    $this->assertEquals($featured_articles[0], $fourthArticle);
    $this->assertEquals($featured_articles[1], $secondArticle);
  }
}
?>
