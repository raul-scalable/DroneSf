<?php
/**
 * @author: Raul Rodriguez - raulrodriguez782@gmail.com
 * @created: 7/9/15 - 8:39 PM
 */

namespace AppBundle\Behat;

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Symfony2Extension\Context\KernelAwareContext;
//use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\DBAL\Driver\PDOMySql\Driver as PDOMySqlDriver;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * @author Gonzalo Vilaseca <gvilaseca@reiss.co.uk>
 */
class HookContext implements Context, KernelAwareContext
{
    /**
     * @var KernelInterface
     */
    protected $kernel;

    /**
     * {@inheritdoc}
     */
    public function setKernel(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * @BeforeScenario
     */
    public function purgeDatabase(BeforeScenarioScope $scope)
    {
        //$entityManager = $this->getService('doctrine.orm.entity_manager');
        //$entityManager->getConnection()->getConfiguration()->setSQLLogger(null);

        //$isMySqlDriver = $entityManager->getConnection()->getDriver() instanceof PDOMySqlDriver;
        //if ($isMySqlDriver) {
        //    $entityManager->getConnection()->executeUpdate("SET foreign_key_checks = 0;");
        //}

        //$purger = new ORMPurger($entityManager);
        //$purger->purge();

        //if ($isMySqlDriver) {
        //  $entityManager->getConnection()->executeUpdate("SET foreign_key_checks = 1;");
        //}

        //$entityManager->clear();

        /*
        $process = new Process(sprintf('%s/console sylius:rbac:initialize --env=test', $this->getContainer()->getParameter('kernel.root_dir')));
        $process->run();

        if (!$process->isSuccessful()) {
            throw new \RuntimeException('Could not initialize permissions.');
        }
        */
    }

    /**
     * Get service by id.
     *
     * @param string $id
     *
     * @return object
     */
    protected function getService($id)
    {
        return $this->getContainer()->get($id);
    }

    /**
     * Returns Container instance.
     *
     * @return ContainerInterface
     */
    protected function getContainer()
    {
        return $this->kernel->getContainer();
    }
}