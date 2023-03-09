<?php

declare(strict_types=1);

/*
 * This file is part of the TYPO3 project.
 *
 * @author Frank Berger <fberger@code711.de>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace Code711\UpdateTrustedHostFromSites\Command;

use Code711\UpdateTrustedHostFromSites\Service\UpdateConfigService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\OutputInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class UpdateConfigCommand extends Command
{
    protected function configure()
    {
        $this->setDescription('update SYS/trustedHostsPattern based on the site configuration');
        $this->setHelp($this->getDescription());
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $logger = new ConsoleLogger($output);
        $updateService = GeneralUtility::makeInstance(UpdateConfigService::class);
        $updateService->setLogger($logger);
        $updateService->update();
        return 0;
    }
}
