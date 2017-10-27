<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use AppBundle\Managers\PostManager;
use Pagerfanta\Pagerfanta;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * DefaultController
 */
class DefaultController extends Controller
{
    /**
     * indexAction
     *
     * @param Request     $request
     * @param PostManager $postManager
     * @param int         $page
     *
     * @return Response
     */
    public function indexAction(Request $request, PostManager $postManager, int $page = 1)
    {

        /* @var Pagerfanta $posts*/
        $posts = $postManager->setSearchString($request->get('s'))->getPosts($page);

        return $this->render('AppBundle:Default:index.html.twig', [
            'posts' => $posts
        ]);
    }

    /**
     * @param Post $post
     *
     * @return Response
     */
    public function viewAction(Post $post)
    {
        return $this->render('AppBundle:default:view.html.twig', ['post' => $post]);
    }
}
