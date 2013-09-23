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
     * Redirect to forumAction
     *
     * @Route("/")
     */
    public function baseAction()
    {
        return $this->redirect($this->generateUrl('forum'));
    }

    /**
     * List all categories
     *
     * @Route("/categories/all", name="forum")
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
     * @Route("/category/{categorySlug}", name="category")
     * @Template()
     */
    public function categoryAction(Request $request, $categorySlug)
    {
        $locale = $request->getLocale();
        $category = $this->get('ovski.manager.forum')->getCategory($locale, $categorySlug);
        if (!isset($category)) {
            return $this->redirect($this->generateUrl('forum'));
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
                //var_dump($topic); die;
                return $this->redirect($this->generateUrl(
                    'topic',
                    array(
                        "categorySlug" => $categorySlug,
                        "topicSlug" => $topic->getSlug()
                    )
                ));
            }
        }
 
        $form = $this->createForm(new TopicType());
        $topics = $this->get('ovski.manager.forum')->getTopics($category);

        return array(
            'form'   => $form->createView(),
            'category_name' => $category->getName(),
            'category_slug' => $categorySlug,
            'topics' => $topics
        );
    }

    /**
     * List all posts of a topic
     *
     * @Route("/category/{categorySlug}/topic/{topicSlug}", name="topic")
     * @Template()
     */
    public function topicAction(Request $request, $categorySlug, $topicSlug)
    {
        $locale = $request->getLocale();

        $categoryId = $this->get('ovski.manager.forum')->getCategoryId($locale, $categorySlug);
        if (!$categoryId) {
            return $this->redirect($this->generateUrl('forum'));
        }

        $topic = $this->get('ovski.manager.forum')->getTopic($categoryId, $topicSlug);

        if (!$topic) {
            return $this->redirect($this->generateUrl(
                'category', array("categorySlug" => $categorySlug)
            ));
        }

        return array('topic' => $topic);
    }

    /**
     * Displays a form to create a new Post.
     *
     * @Route("/category/{categorySlug}/topic/{topicSlug}/new-post", name="post_new")
     * @Method("GET")
     * @Template()
     */
    public function newPostAction(Request $request, $categorySlug, $topicSlug)
    {
        $locale = $request->getLocale();
        $forumManager = $this->get('ovski.manager.forum');
        $maxParams = $this->container->getParameter('ovski_forum.max_per_pages');
        $maxPosts = $maxParams['create_post'];

        // list 'x' last posts
        $categoryId = $forumManager->getCategoryId($locale, $categorySlug);
        $topic = $forumManager->getTopic($categoryId, $topicSlug);
        $posts = $forumManager->getLastPosts($topic->getId(), $maxPosts);

        // create the form to create a post
        $form = $this
            ->createForm(new PostType())
            ->add('submit', 'submit')
        ;

        return array(
            'form'       => $form->createView(),
            'referer'    => $request->headers->get('referer'),
            'topic_title' => $topic->getTitle(),
            'posts'      => $posts
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
            $this->get('ovski.manager.forum')->handlePostData($post, $topicSlug);

            return $this->redirect($this->generateUrl(
                'topic',
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