<?php

namespace App\Command;

use App\Reader\WorksheetReader;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\VarDumper\VarDumper;
use Phpml\Math\Statistic\Correlation;

#[AsCommand(
    name: 'remindo-test:calculate',
    description: 'Calculates the caesura grade for given RemindoTest excel file.',
    aliases: ['rt:calc'],
    hidden: false
)]
class CalculateRemindoTestGrade extends Command
{

    public function __construct(public KernelInterface $kernel, public Xlsx $reader, public WorksheetReader $worksheetReader, string $name = null)
    {
        parent::__construct($name);
    }

    protected function configure(): void
    {
        $this->addArgument('file', InputArgument::REQUIRED, 'Excel file');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $filePath = sprintf("%s/%s", $this->kernel->getProjectDir(), $input->getArgument('file'));
        try {
            $sheet = $this->reader->load($filePath);
        } catch (Exception $exception) {
            $output->writeln(sprintf("Unable to read file %s: %s", $filePath, $exception->getMessage()));
            return Command::INVALID;
        }
        $exam = $this->worksheetReader->read($sheet->getActiveSheet());

        // @todo implement all calculations and output to stdout

        return Command::SUCCESS;

    }

}
