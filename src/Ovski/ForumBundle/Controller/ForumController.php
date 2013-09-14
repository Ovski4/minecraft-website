<?php

namespace Ovski\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class ForumController extends Controller
{
    /**
     * List all categories
     *
     * @Route("/", name="categories")
     * @Template()
     */
    public function categoriesAction()
    {
        $locale = $this->getRequest()->getLocale();

        $entityManager = $this->getDoctrine()->getManager();
        $categories = $entityManager
            ->getRepository("OvskiForumBundle:Category")
            ->findBy(array("language" => $locale))
        ;

        return array('categories' => $categories);
    }

    /**
     * List all topics of a category
     *
     * @Route("/{name}", name="topics")
     * @Template()
     */
    public function topicsAction($name)
    {
        $locale = $this->getRequest()->getLocale();
        $entityManager = $this->getDoctrine()->getManager();

        $category = $entityManager
            ->getRepository("OvskiForumBundle:Category")
            ->findOneBy(array('name' => $name, 'language' => $locale))
        ;

        return array('category' => $category);
    }

    /**
     * List all posts of a topic
     *
     * @Route("/{name}/{title}", name="posts")
     * @Template()
     */
    public function postsAction($name, $title)
    {
        $locale = $this->getRequest()->getLocale();
        $entityManager = $this->getDoctrine()->getManager();

        $category = $entityManager
            ->getRepository("OvskiForumBundle:Category")
            ->findOneBy(array('name' => $name, 'language' => $locale))
        ;

        if (!$category) {
            return $this->redirect($this->generateUrl(
                'categories'
            ));
        }

        $topic = $entityManager
            ->getRepository("OvskiForumBundle:Topic")
            ->findOneBy(array('category' => $category, 'title' => $title))
        ;

        if (!$topic) {
            return $this->redirect($this->generateUrl(
                'topics', array("name" => $category->getName())
            ));
        }

        return array('topic' => $topic);
    }
}