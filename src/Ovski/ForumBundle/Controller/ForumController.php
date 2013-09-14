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
     * @Route("/categories/list", name="categories_list")
     * @Template()
     */
    public function listCategoriesAction()
    {
        $locale = $this->getRequest()->getLocale();

        $entityManager = $this->getDoctrine()->getManager();
        $categories = $entityManager
            ->getRepository("OvskiForumBundle:Category")
            ->findBy("language", $locale)
        ;

        return array('categories' => $categories);
    }

    /**
     * List all topics of a category
     *
     * @Route("/category/{name}", name="category")
     * @Template()
     */
    public function categoryAction($name)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $category = $entityManager
            ->getRepository("OvskiForumBundle:Category")
            ->findBy(array('name' => $name))
        ;

        return array('category' => $category);
    }
}