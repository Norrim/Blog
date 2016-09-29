<?php

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Blogger\BlogBundle\Form\ArticleType;
use Symfony\Component\HttpFoundation\Request;
use Blogger\BlogBundle\Entity\Article;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $articles = $this->getDoctrine()->getEntityManager()->getRepository('BloggerBlogBundle:Article')->getListOrderByDate();

        return $this->render('BloggerBlogBundle:Default:index.html.twig', array(
            'articles' => $articles,
        ));
    }

    public function addAction(Request $request)
    {
        $article = new Article();
        $form = $this->get('form.factory')->create(new ArticleType(), $article);
        if ($form->handleRequest($request)->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirect($this->generateUrl("BloggerBlogBundle_homepage"));
        }


        return $this->render('BloggerBlogBundle:Default:add.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function editAction(Article $article, Request $request)
    {
        $form = $this->get('form.factory')->create(new ArticleType(), $article);

        if ($form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirect($this->generateUrl("BloggerBlogBundle_homepage"));
        }

        return $this->render("BloggerBlogBundle:Default:edit.html.twig", array(
            'id'    => $article->getId(),
            'form'  => $form->createView(),
        ));
    }

    public function articleAction($id){

        $em = $this->getDoctrine()->getManager();

        $article = $em->getRepository('BloggerBlogBundle:Article')->find($id);

        if (null === $article) {
            throw new NotFoundHttpException("L'article d'id ".$id." n'existe pas.");
        }

        return $this->render('BloggerBlogBundle:Default:article.html.twig', array(
            'article'       => $article,
        ));
    }


}
