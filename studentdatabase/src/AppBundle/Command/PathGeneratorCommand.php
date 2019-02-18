<?php

namespace App\AppBundle\Command;

use App\AppBundle\Service\StudentRouteGenerator;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\AppBundle\Exception\PathWasNotSavedException;

class PathGeneratorCommand extends Command
{
    const COMMAND_NAME = 'student:generate:paths';
    const TIME_ELAPSED = 'Time elapsed: %s s';
    const MEMORY_USAGE = 'Memory usage: %s Mb';
    const COMMAND_SUCCESS = 'Path generation was completed with success';
    const COMMAND_FAILED = 'Path generation has failed';
    const COMMAND_STARTED = 'Path generation has been started';
    const DESCRIPTION = 'Generate student paths based on name';
    const BYTES_TO_MB = 0.000001;

    /**
     * @var StudentRouteGenerator
     */
    private $studentRouteGenerator;

    /**
     * PathGeneratorCommand constructor.
     * @param StudentRouteGenerator $studentRouteGenerator
     */
    public function __construct(StudentRouteGenerator $studentRouteGenerator)
    {
        $this->studentRouteGenerator = $studentRouteGenerator;
        parent::__construct();
    }

    public function configure()
    {
        $this->setName(self::COMMAND_NAME)->setDescription(self::DESCRIPTION);
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        try {
            $output->writeln(self::COMMAND_STARTED);
            $startTime = microtime(true);
            $this->studentRouteGenerator->generate();
            $endTime = microtime(true);
            $output->writeln(self::COMMAND_SUCCESS);
            $output->writeln(sprintf(self::TIME_ELAPSED, $endTime - $startTime));
            $output->writeln(sprintf(self::MEMORY_USAGE, memory_get_peak_usage() * self::BYTES_TO_MB));
        } catch (PathWasNotSavedException $exception) {
            $output->writeln(self::COMMAND_FAILED);
        } catch (\Exception $exception) {
            $output->writeln('FILED: ' . $exception->getMessage());
        }
    }
}
