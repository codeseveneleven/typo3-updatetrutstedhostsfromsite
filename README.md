# TYPO3 Site config - automatic updates to $GLOBALS['TYPO3_CONF_VARS']['SYS']['trustedHostsPattern']

[![Latest Stable Version](https://poser.pugx.org/code711/updatetrutstedhostsfromsite/v/stable.svg)](https://extensions.typo3.org/extension/updatetrustedhostfromsites)
[![TYPO3 12](https://img.shields.io/badge/TYPO3-12-orange.svg)](https://get.typo3.org/version/12)
[![TYPO3 11](https://img.shields.io/badge/TYPO3-11-orange.svg)](https://get.typo3.org/version/11)
[![Total Downloads](https://poser.pugx.org/code711/updatetrutstedhostsfromsite/d/total.svg)](https://packagist.org/packages/code711/updatetrutstedhostsfromsite)
[![Monthly Downloads](https://poser.pugx.org/code711/updatetrutstedhostsfromsite/d/monthly)](https://packagist.org/packages/code711/updatetrutstedhostsfromsite)
![PHPSTAN:Level 9](https://img.shields.io/badge/PHPStan-level%208-brightgreen.svg?style=flat])
![build:passing](https://img.shields.io/badge/build-passing-brightgreen.svg?style=flat])

This TYPO3 extension will automatically update the  $GLOBALS['TYPO3_CONF_VARS']['SYS']['trustedHostsPattern'] variable when changes to the Site Configurations are made, reflecting the used domains in the system.

This is achieved with the Extension [EXT:siteconfigurationevents](https://extensions.typo3.org/extension/siteconfigurationevents) which provides PSR-14 events when changing the Site config in the backend.

Additionally a command for CLI is available to update the trusted host pattern from the shell or during CI/CD or as a scheduler task via cron.

<pre>
./vendor/bin/typo3 code711:updatetrustedhostfromsites -h        ✔  10118  16:52:23
Description:
  update SYS/trustedHostsPattern based on the site configuration

Usage:
  code711:updatetrustedhostfromsites

Options:
  -h, --help            Display help for the given command. When no command is given display help for the list command
  -q, --quiet           Do not output any message
  -V, --version         Display this application version
      --ansi|--no-ansi  Force (or disable --no-ansi) ANSI output
  -n, --no-interaction  Do not ask any interactive question
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
</pre>

Calling the command with -v or --verbose will print the new value to the console additionaly to setting it in the config.

## Installation

<pre>composer req code711/updatetrustedhostfromsites</pre>

## Configuration

to date no configuration options are available

## Remarks

This extension WILL yield to the TYPO3_CONTEXT (or other similar) Environment Variable if Variations in the Site Configs are set.

A . will not be escaped (as it should be). This is a limitation as the escape character \ would be escaped again by the exporter somehow.
