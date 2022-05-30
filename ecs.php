<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\Comment\HeaderCommentFixer;
use PhpCsFixer\Fixer\Phpdoc\NoSuperfluousPhpdocTagsFixer;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import(__DIR__.'/vendor/symplify/easy-coding-standard/config/set/psr12.php');

    $containerConfigurator->import(__DIR__.'/vendor/symplify/easy-coding-standard/config/set/symfony.php');

    $containerConfigurator->import(__DIR__.'/vendor/symplify/easy-coding-standard/config/set/symfony-risky.php');

    $containerConfigurator->import(__DIR__.'/vendor/symplify/easy-coding-standard/config/set/clean-code.php');

    $containerConfigurator->import(__DIR__.'/vendor/symplify/easy-coding-standard/config/set/common/docblock.php');

    $parameters = $containerConfigurator->parameters();

    $parameters
        ->set('skip', [
                'SlevomatCodingStandard\Sniffs\PHP\UselessParenthesesSniff.UselessParentheses' => null,
                'PhpCsFixer\Fixer\FunctionNotation\NativeFunctionInvocationFixer' => null,
                'PhpCsFixer\Fixer\FunctionNotation\SingleLineThrowFixer' => null,
                'PhpCsFixer\Fixer\ConstantNotation\NativeConstantInvocationFixer' => null,
                'PhpCsFixer\Fixer\LanguageConstruct\FunctionToConstantFixer' => null,
                'PhpCsFixer\Fixer\FunctionNotation\FopenFlagsFixer' => null,
                'PhpCsFixer\Fixer\Casing\NativeFunctionTypeDeclarationCasingFixer' => null,
                'PhpCsFixer\Fixer\ClassNotation\SingleTraitInsertPerStatementFixer' => null,
                'Symplify\CodingStandard\Fixer\Commenting\RemoveUselessDefaultCommentFixer' => null,
                'Symplify\CodingStandard\Fixer\Commenting\ParamReturnAndVarTagMalformsFixer' => null,
            ]
        );

    $services = $containerConfigurator->services();

    $services->set(NoSuperfluousPhpdocTagsFixer::class);

    $services->set(HeaderCommentFixer::class)
        ->call('configure', [
            [
                'header' => 'This file is a part of the simple emoji calculator for symfony learning app.

Copyright (c) 2022-2023, AHAD NOOR ALAM <https://www.linkedin.com/in/ahadnoor/>',
                'location' => 'after_open',
            ],
        ]);
};
