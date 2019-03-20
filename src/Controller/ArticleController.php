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
   * @route("/", name="article_list")
   * @Method({"GET"})
   */
  public function index()
  {
    $articles = $this->getDoctrine()->getRepository(Article::class)->findAll();

    return $this->render('articles/index.html.twig', array('articles' => $articles));
  }

  /**
   * @Route("/article/{id}", name="article_show")
   */
  public function show($id)
  {
    $article = $this->getDoctrine()->getRepository(Article::class)->find($id);

    return $this->render('articles/show.html.twig', array('article' => $article));
  }

  // /**
  //  * @Route("article/save")
  //  */
  // public function save()
  // {
  //   $entityManager = $this->getDoctrine()->getManager();

  //   $article = new Article();
  //   $article->setTitle('Article One');
  //   $article->setBody('Article One Body');

  //   $entityManager->persist($article);

  //   $entityManager->flush();

  //   return new Response($article->getId() . ' - ' . $article->getTitle() . ', ' . $article->getBody() . 'Makalesi veritabanına eklendi');
  // }
}
