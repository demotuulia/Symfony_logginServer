<?php
/**
 * A class to excecute Symfony console commands
 *
 */
namespace AppBundle\Manager\Manager;

use AppBundle\Manager\Manager;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\HttpFoundation\Response;

final class ConsoleCommand extends Manager {


    /**
     * Excecute a Symfony console command
     * 
     * Excute a command which can be found by >php bin/console
     * 
     * @param string                                    $command            A command class, which you cand find by
     *                                                                      >php bin/console
     * @param Symfony\Bundle\SwiftmailerBundle\Command  $commandClass       A command class of $command, which
     *                                                                      must be in namespace
     *                                                                      Symfony\Bundle\SwiftmailerBundle\Command
     * @param array                                     $params             Params for the command
     * 
     * @return  Symfony\Component\HttpFoundation\Response
     */
    public function excecute($command, $commandClass, $params = []) {

        $kernel = $this->getContainer()->get('kernel');
        $application = new Application($kernel);

        $application->setAutoExit(false);

        $commandClass= 'Symfony\Bundle\SwiftmailerBundle\Command\\' . $commandClass;
        $commandObj = new $commandClass();
        $commandObj->setContainer($this->getContainer());
        $application->add($commandObj);

        $params['command'] = $command;
        $input = new ArrayInput($params);
        $output = new BufferedOutput();
        $application->run($input, $output);
        $content = $output->fetch();
        $response = new Response($content);
        
        return $response;
        
    }


}