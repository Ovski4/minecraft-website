<?php

namespace Ovski\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Ovski\ForumBundle\Entity\Post;
use Ovski\ForumBundle\Form\TopicType;
use Ovski\ForumBundle\Form\PostType;
use Pagerfanta\Exception\NotValidCurrentPageException;
use Pagerfanta\Adapter\ArrayAdapter;
use Pagerfanta\Pagerfanta;

/**
 * Forum controller
 * 
 * This class contains every actions executable by users with role ROLE_USER
 */
class ForumController extends Controller
{
    /**
     * Redirect to forumAction
     *
     * @Route("/", name="ovski_forum_forum")
     */
    public function baseAction()
    {
        return $this->redirect($this->generateUrl('ovski_forum_forum_categories'));
    }

    /**
     * List all categories
     *
     * @Route("/categories/all", name="ovski_forum_forum_categories")
     * @Template()
     */
    public function forumAction()
    {
        $locale = $this->getRequest()->getLocale();
        $categories = $this->get('ovski.manager.forum')->getCategories($locale);

        return array('categories' => $categories);
    }

    /**
     * List all topics of a category
     *
     * @Route("/category/{categorySlug}", name="ovski_forum_forum_category", defaults={"page" = 1})
     * @Route("/category/{categorySlug}/page/{page}", name="ovski_forum_forum_category_paginated")
     * @Template()
     */
    public function categoryAction(Request $request, $categorySlug, $page)
    {
        $locale = $request->getLocale();
        $category = $this->get('ovski.manager.forum')->getCategory($locale, $categorySlug);
        if (!isset($category)) {
            return $this->redirect($this->generateUrl('ovski_forum_forum_categories'));
        }

        /* Create a new topic */
        if ($request->isMethod('POST')) {
            if (false === $this->get('security.context')->isGranted('ROLE_USER')) {
                throw new AccessDeniedException();
            }

            $form = $this->createForm(new TopicType());
            $form->handleRequest($request);

            if ($form->isValid()) {
                $topic = $this->get('ovski.manager.forum')->handleTopicData($form->getData(), $category);

                return $this->redirect($this->generateUrl(
                    'ovski_forum_forum_topic',
                    array(
                        "categorySlug" => $categorySlug,
                        "topicSlug" => $topic->getSlug()
                    )
                ));
            }
        }

        $form = $this->createForm(new TopicType());

        // Topics pagination
        $topics = $this->get('ovski.manager.forum')->getTopics($category);
        $pager = new Pagerfanta(new ArrayAdapter($topics));
        $pager->setMaxPerPage(
            $this->container->getParameter('ovski_forum.max_per_pages')['topics']
        );

        try {
            $pager->setCurrentPage($page);
        } catch (NotValidCurrentPageException $e) {
            throw new NotFoundHttpException(
                sprintf("As awesome as this website can be, page \"%s\" was not found.",
                    $page
                )
            );
        }

        return array(
            'form'          => $form->createView(),
            'category_name' => $category->getName(),
            'category_slug' => $categorySlug,
            'pager'         => $pager
        );
    }

    /**
     * List all posts of a topic
     *
     * @Route("/category/{categorySlug}/topic/{topicSlug}", name="ovski_forum_forum_topic", defaults={"page" = 1})
     * @Route("/category/{categorySlug}/topic/{topicSlug}/page/{page}", name="ovski_forum_forum_topic_paginated")
     * @Template()
     */
    public function topicAction(Request $request, $categorySlug, $topicSlug, $page)
    {
        $forumManager = $this->get('ovski.manager.forum');
        $locale = $request->getLocale();
        $categoryId = $forumManager->getCategoryId($locale, $categorySlug);
        if (!$categoryId) {
            return $this->redirect($this->generateUrl('ovski_forum_forum'));
        }

        $topic = $forumManager->getTopic($categoryId, $topicSlug);

        if (!$topic) {
            return $this->redirect($this->generateUrl(
                'ovski_forum_forum_category', array("categorySlug" => $categorySlug)
            ));
        }

        $posts = $forumManager->getPostsByStatus($topic->getId(), "authorized");

        // Posts pagination
        $pager = new Pagerfanta(new ArrayAdapter($posts));
        $pager->setMaxPerPage(
            $this->container->getParameter('ovski_forum.max_per_pages')['posts']
        );

        try {
            $pager->setCurrentPage($page);
        } catch (NotValidCurrentPageException $e) {
            throw new NotFoundHttpException(
                sprintf("As awesome as this website can be, page \"%s\" was not found.",
                    $page
                )
            );
        }

        return array(
            'topic_title'   => $topic->getTitle(),
            'topic_closed'  => $topic->isClosed(),
            'topic_slug'    => $topicSlug,
            'category_slug' => $categorySlug,
            'pager'         => $pager
        );
    }

    /**
     * Displays a form to create a new Post.
     *
     * @Route("/category/{categorySlug}/topic/{topicSlug}/new-post", name="ovski_forum_forum_post_new")
     * @Method("GET")
     * @Template()
     */
    public function newPostAction(Request $request, $categorySlug, $topicSlug)
    {       
        $locale = $request->getLocale();
        $forumManager = $this->get('ovski.manager.forum');
        $maxPosts = $this->container->getParameter('ovski_forum.max_per_pages')['posts_on_post_creation'];

        // list 'x' last posts
        $categoryId = $forumManager->getCategoryId($locale, $categorySlug);
        $topic = $forumManager->getTopic($categoryId, $topicSlug);
        if ($topic->isClosed() && false === $this->get('security.context')->isGranted('ROLE_MODERATOR')) {
            throw new AccessDeniedException();
        }
        $posts = $forumManager->getLastPosts($topic->getId(), $maxPosts);

        // create the form to create a post
        $form = $this
            ->createForm(new PostType())
            ->add('submit', 'submit')
        ;

        return array(
            'form'        => $form->createView(),
            'referer'     => $request->headers->get('referer'),
            'topic_title' => $topic->getTitle(),
            'posts'       => $posts
        );
    }

    /**
     * Creates a new Post entity.
     *
     * @Route("/category/{categorySlug}/topic/{topicSlug}/new-post", name="ovski_forum_forum_post_create")
     * @Method("POST")
     * @Template("OvskiForumBundle:Topic:newPost.html.twig")
     */
    public function createPostAction(Request $request, $categorySlug, $topicSlug)
    {
        if (false === $this->get('security.context')->isGranted('ROLE_USER')) {
            throw new AccessDeniedException();
        }

        $forumManager = $this->get('ovski.manager.forum');
        $locale = $request->getLocale();
        $categoryId = $forumManager->getCategoryId($locale, $categorySlug);
        $topic = $forumManager->getTopic($categoryId, $topicSlug);

        if ($topic->isClosed() && false === $this->get('security.context')->isGranted('ROLE_MODERATOR')) {
            throw new AccessDeniedException();
        }

        $post = new Post();
        $form = $this
            ->createForm(new PostType(), $post)
            ->add('submit', 'submit')
        ;
        $form->handleRequest($request);

        if ($form->isValid()) {
            $forumManager->handlePostData($post, $topic);

            return $this->redirect($this->generateUrl(
                'ovski_forum_forum_topic',
                array(
                    "categorySlug" => $categorySlug,
                    "topicSlug" => $topicSlug
                )
            ));
        }

        return array(
            'form'   => $form->createView(),
        );
    }
}