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

namespace Code711\UpdateTrustedHostFromSites\Listeners;

use Code711\SiteConfigurationEvents\Events\AfterSiteConfigurationRenameEvent;
use Code711\UpdateTrustedHostFromSites\Service\UpdateConfigService;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class AfterSiteRenameListener
{
    public function __invoke(AfterSiteConfigurationRenameEvent $event): void
    {
        GeneralUtility::makeInstance(UpdateConfigService::class)->update();
    }
}
