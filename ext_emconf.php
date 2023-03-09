<?php

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

$EM_CONF['updatetrutstedhostsfromsite'] = [
    'title' => '(Code711) Update Trusted Hosts Pattern',
    'description' => "This extension will update the \$GLOBALS['TYPO3_CONF_VARS']['SYS']['trustedHostsPattern'] based on the available Sites. Requires EXT:siteconfigurationevents",
    'category' => 'plugin',
    'version' => '1.0.0',
    'state' => 'stable',
    'clearcacheonload' => 1,
    'author' => 'Frank Berger',
    'author_email' => 'fberger@code711.de',
    'author_company' => 'Code711, a label of Sudhaus7, B-Factor GmbH and 12bis3 GbR',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99',
            'siteconfigurationevents' => '1.0.0-1.99.99',
        ],
        'conflicts' => [
        ],
        'suggests' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Code711\\UpdateTrustedHostFromSites\\' => 'Classes',
        ],
    ],
];
