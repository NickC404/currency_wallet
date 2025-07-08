<?php

$finder = new PhpCsFixer\Finder()
    ->in(__DIR__)
    ->exclude('var')
;

$config = new PhpCsFixer\Config()
    ->setRules([
        '@Symfony' => true,
    ])
    ->setFinder($finder)
;

$config->setUnsupportedPhpVersionAllowed(true);

return $config;
