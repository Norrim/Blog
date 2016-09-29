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
        return $this->render('BloggerBlogBundle:Default:index.html.twig');
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
}
