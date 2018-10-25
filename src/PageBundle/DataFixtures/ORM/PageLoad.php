<?php

namespace PageBundle\DataFixtures\ORM;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PageBundle\Entity\Page;
use TermBundle\DataFixtures\ORM\TermLoad;
use TermBundle\Entity\Term;

class PageLoad extends Fixture implements DependentFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $termRepo = $manager->getRepository(Term::class);
        for ($i = 1; $i <= 3; $i++) {
            $page = new Page();
            $page->setTitle('Page' . $i);
            $page->setBody('Body Page' . $i);
            $term = $termRepo->findOneByName('Term ' . $i);
            if ($term) {
                $page->setCategory($term);
            }
            $page->setCreated(new \DateTime());
            $manager->persist($page);
        }
        $manager->flush();
    }

    /**
     * This method must return an array of fixtures classes
     * on which the implementing class depends on
     *
     * @return array
     */
    public function getDependencies()
    {
        return [
            TermLoad::class
        ];
    }
}