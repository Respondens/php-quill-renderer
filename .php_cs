<?php

$finder = PhpCsFixer\Finder::create()
    ->notPath('src/Symfony/Component/Translation/Tests/fixtures/resources.php')
    ->in(__DIR__.DIRECTORY_SEPARATOR."src")
;

return PhpCsFixer\Config::create()
    ->setRules([
        'line_ending' => true,
        'single_blank_line_at_eof' => true,
        'class_attributes_separation' => true,
        'single_line_after_imports' => true,
        'blank_line_before_statement' => ['statements' => ['return', 'case', 'default', 'foreach']],
    ])
    ->setLineEnding("\n")
    ->setFinder($finder)
;