<?php

namespace Ovski\ForumBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Ovski\ForumBundle\Entity\Post;
use Ovski\ForumBundle\Form\TopicType;
use Ovski\ForumBundle\Form\PostType;

class ForumController extends Controller
{
    /**
     * List all categories
     *
     * @Route("/categories/all", name="forum")
     * @Template()
     */
    public function forumAction()
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
     * @Route("/category/{categorySlug}", name="category")
     * @Template()
     */
    public function categoryAction($categorySlug)
    {
        $locale = $this->getRequest()->getLocale();
        $entityManager = $this->getDoctrine()->getManager();

        $category = $entityManager
            ->getRepository("OvskiForumBundle:Category")
            ->findOneBy(array('slug' => $categorySlug, 'language' => $locale))
        ;

        if (!$category) {
            return $this->redirect($this->generateUrl(
                'forum'
            ));
        }

        return array('category' => $category);
    }

    /**
     * List all posts of a topic
     *
     * @Route("/category/{categorySlug}/topic/{topicSlug}", name="topic")
     * @Template()
     */
    public function topicAction($categorySlug, $topicSlug)
    {
        $locale = $this->getRequest()->getLocale();
        $entityManager = $this->getDoctrine()->getManager();

        $category = $entityManager
            ->getRepository("OvskiForumBundle:Category")
            ->findOneBy(array('slug' => $categorySlug, 'language' => $locale))
        ;

        if (!$category) {
            return $this->redirect($this->generateUrl(
                'forum'
            ));
        }

        $topic = $entityManager
            ->getRepository("OvskiForumBundle:Topic")
            ->findOneBy(array('category' => $category, 'slug' => $topicSlug))
        ;

        if (!$topic) {
            return $this->redirect($this->generateUrl(
                'category', array("categorySlug" => $category->getSlug())
            ));
        }

        return array('topic' => $topic);
    }

    /**
     * Displays a form to create a new Topic.
     *
     * @Route("/category/{categorySlug}/new-topic", name="topic_new")
     * @Method("GET")
     * @Template()
     */
    public function newTopicAction()
    {
        $form = $this->createForm(new TopicType());

        return array(
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Topic entity.
     *
     * @Route("/category/{categorySlug}/new-topic", name="topic_create")
     * @Method("POST")
     * @Template("OvskiForumBundle:Topic:newTopic.html.twig")
     */
    public function createTopicAction(Request $request, $categorySlug)
    {
        if (false === $this->get('security.context')->isGranted('ROLE_USER')) {
            throw new AccessDeniedException();
        }

        $form = $this->createForm(new TopicType());
        $form->handleRequest($request);

        if ($form->isValid()) {
            $topic = $form->getData();
            $locale = $this->getRequest()->getLocale();
            $entityManager = $this->getDoctrine()->getManager();

            $category = $entityManager
                ->getRepository("OvskiForumBundle:Category")
                ->findOneBy(array('slug' => $categorySlug, 'language' => $locale))
            ;

            $user = $this
                ->container
                ->get('security.context')
                ->getToken()
                ->getUser()
            ; 

            $topic
                ->setCategory($category)
                ->setAuthor($user)
                ->getPost()
                ->setAuthor($user)
                ->setTopic($topic)
            ;

            $entityManager->persist($topic);
            $entityManager->flush();

            return $this->redirect($this->generateUrl(
                'topic',
                array(
                    "categorySlug" => $categorySlug,
                    "topicSlug" => $topic->getSlug()
                )
            ));
        }

        return array(
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Post.
     *
     * @Route("/category/{categorySlug}/topic/{topicSlug}/new-post", name="post_new")
     * @Method("GET")
     * @Template()
     */
    public function newPostAction()
    {
        $form = $this
            ->createForm(new PostType())
            ->add('submit', 'submit')
        ;

        return array(
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new Post entity.
     *
     * @Route("/category/{categorySlug}/topic/{topicSlug}/new-post", name="post_create")
     * @Method("POST")
     * @Template("OvskiForumBundle:Topic:newPost.html.twig")
     */
    public function createPostAction(Request $request, $categorySlug, $topicSlug)
    {
        if (false === $this->get('security.context')->isGranted('ROLE_USER')) {
            throw new AccessDeniedException();
        }

        $post = new Post();
        $form = $this
            ->createForm(new PostType(), $post)
            ->add('submit', 'submit')
        ;
        $form->handleRequest($request);

        if ($form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            $topic = $entityManager
                ->getRepository("OvskiForumBundle:Topic")
                ->findOneBy(array('slug' => $topicSlug))
            ;

            $user = $this
                ->container
                ->get('security.context')
                ->getToken()
                ->getUser()
            ; 

            $post
                ->setAuthor($user)
                ->setTopic($topic)
            ;

            $entityManager->persist($post);
            $entityManager->flush();

            return $this->redirect($this->generateUrl(
                'topic',
                array(
                    "categorySlug" => $categorySlug,
                    "topicSlug" => $topic->getSlug()
                )
            ));
        }

        return array(
            'form'   => $form->createView(),
        );
    }
}