<?php
/**
 * Created by PhpStorm.
 * User: Vitaly Belikov vitalij.bell@gmail.com
 * Date: 27.10.2017
 * Time: 3:05
 */

namespace AppBundle\Controller\Admin;

use AppBundle\Entity\Post;
use AppBundle\Form\PostType;
use AppBundle\Managers\PostManager;
use Pagerfanta\Pagerfanta;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * PostController
 */
class PostController extends Controller
{
    /**
     * @param Request     $request
     * @param PostManager $postManager
     * @param int         $page
     *
     * @return Response
     */
    public function indexAction(Request $request, PostManager $postManager, int $page = 1)
    {
        /* @var Pagerfanta $posts */
        $posts = $postManager->setSearchString($request->get('s'))->getPosts($page);

        return $this->render('AppBundle:Admin/Post:index.html.twig', [
            'posts' => $posts
        ]);
    }

    /**
     * @param Request     $request
     * @param PostManager $postManager
     *
     * @return Response
     */
    public function addAction(Request $request, PostManager $postManager)
    {
        $post = new Post();
        /* @var Form $form */
        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $postManager->save($post);

            $this->addFlash('notice', 'Post created');
            return $this->redirectToRoute('admin_add_post');
        }

        return $this->render('AppBundle:Admin/Post:add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param Request     $request
     * @param Post        $post
     * @param PostManager $postManager
     *
     * @return Response
     */
    public function updateAction(Request $request, Post $post, PostManager $postManager)
    {
        /* @var Form $form */
        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            $postManager->save($post);

            $this->addFlash('notice', 'Post updated');
            return $this->redirectToRoute('admin_update_post', ['id' => $post->getId()]);
        }

        return $this->render('AppBundle:Admin/Post:update.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param Request     $request
     * @param Post        $post
     * @param PostManager $postManager
     *
     * @return Response
     */
    public function deleteAction(Request $request, Post $post, PostManager $postManager)
    {

        //$postManager->delete($post);

        $this->addFlash('notice', 'Post deleted');

        return $this->redirectToRoute('admin_index');
    }
}