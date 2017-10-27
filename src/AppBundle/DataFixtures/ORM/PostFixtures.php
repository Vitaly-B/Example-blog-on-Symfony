<?php
/**
 * Created by PhpStorm.
 * User: Vitaly Belikov vitalij.bell@gmail.com
 * Date: 26.10.2017
 * Time: 16:30
 */

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Post;
use AppBundle\Managers\PostManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\PropertyAccess\PropertyAccess;

class PostFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     * @throws \Exception
     */
    public function load(ObjectManager $manager)
    {
        /* @var PostManager $pageManager */
        $postManager = $this->container->get('app.managers.post_manager');

        /* @var ValidatorInterface $validator */
        $validator = $this->container->get('validator');

        /* @var array $fixtures */
        $fixtures = json_decode(file_get_contents(__DIR__.'/Fixtures/posts.json'), true);

        /* @var PropertyAccessor $propertyAccessor */
        $propertyAccessor = PropertyAccess::createPropertyAccessor();

        foreach ($fixtures as $k => $fixture) {

            /* @var Post $post*/
            $post = $postManager->create();

            $post->setTitle($propertyAccessor->getValue($fixture, '[title]'));
            $post->setDescription($propertyAccessor->getValue($fixture, '[description]'));
            $post->setText($propertyAccessor->getValue($fixture, '[text]'));
            $post->setCreatedAt((new \DateTime())->sub(\DateInterval::createFromDateString( $k . ' days')));

            $errors = $validator->validate($post);

            if ($errors->count() == 0) {
                $postManager->save($post);
            } else {
                throw new \Exception((string)$errors);
            }
        }
    }
}