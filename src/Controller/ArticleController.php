<?php 

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Article;

class ArticleController extends Controller
{
  /**
   * @route("/")
   * @Method({"GET"})
   */
  public function index()
  {
    // return new Response('<html><body>Hello</body></html>');

    $articles = ['Article 1', 'Article 2'];

    return $this->render('articles/index.html.twig', array('name' => 'Oguz', 'articles' => $articles));
  }

  /**
   * @Route("article/save")
   */
  public function save()
  {
    $entityManager = $this->getDoctrine()->getManager();

    $article = new Article();
    $article->setTitle('Article One');
    $article->setBody('Article One Body');

    $entityManager->persist($article);

    $entityManager->flush();

    return new Response($article->getId() . ' - ' . $article->getTitle() . ', ' . $article->getBody() . 'Makalesi veritabanına eklendi');
  }
}
