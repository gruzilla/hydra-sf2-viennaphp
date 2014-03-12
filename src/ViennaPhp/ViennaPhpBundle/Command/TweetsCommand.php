<?php

namespace ViennaPhp\ViennaPhpBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

use Symfony\Component\Console\Input\InputInterface,
    Symfony\Component\Console\Output\OutputInterface;

class TweetsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('viennaphp:tweets')
            ->setDescription('checks out the last new tweets for #viennaphp');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $requestHelper = $this->getContainer()->get('viennaphp.requesthelper');


        // configuration
        $serviceName = 'Twitter';
        $request = '/search/tweets.json?q=%23viennaphp';
        $mappedClass = 'ViennaPhp\\ViennaPhpBundle\\Entity\\Status';


        // execution
        $result = $requestHelper->runSingleGetRequest(
            $serviceName,
            $request,
            $mappedClass
        );


        // persisting
        $em = $this->getContainer()->get('doctrine')->getEntityManager();

        $output->writeln('<info>Found '.count($result).' tweets:</info>');
        foreach ($result as $status) {
            $em->persist($status);
            $output->writeln($status->getText());
        }

        $em->flush();
    }
}