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

namespace Code711\UpdateTrustedHostFromSites\Service;

use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use TYPO3\CMS\Core\Configuration\ConfigurationManager;
use TYPO3\CMS\Core\Site\SiteFinder;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class UpdateConfigService implements LoggerAwareInterface
{
    use LoggerAwareTrait;
    public function update()
    {
        $sitefinder = GeneralUtility::makeInstance(SiteFinder::class);
        $sites = $sitefinder->getAllSites(false);

        $hostList = [];

        foreach ($sites as $site) {
            $hostList = $this->handleHost($hostList, $site->getBase()->getHost(), (int)$site->getBase()->getPort());

            foreach ($site->getLanguages() as $siteLanguage) {
                $hostList = $this->handleHost($hostList, $siteLanguage->getBase()->getHost(), (int)$siteLanguage->getBase()->getPort());
            }
        }
        $hostList = \array_unique($hostList);
        \natsort($hostList);
        if (!empty($hostList)) {
            $configValue = implode('|', $hostList);
            $this->logger->notice('constructed ' . $configValue);
            if (GeneralUtility::makeInstance(ConfigurationManager::class)
                          ->setLocalConfigurationValueByPath('SYS/trustedHostsPattern', $configValue)) {
                $this->logger->notice('Config written');
            } else {
                $this->logger->error('can not set value');
            }
        }
    }
    private function handleHost(array $hostList, string $host, int $port): array
    {
        if (!empty($host)) {
            //$host = \str_replace( ".", '\.', $host);
            if ($port > 0 && $port !== 80 && $port !== 443) {
                $host .= ':' . $port;
            }
            $hostList[] = $host;
        }
        return $hostList;
    }
}
