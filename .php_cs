<?php

$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->exclude('bootstrap/cache')
    ->exclude('resources/assets')
    ->exclude('resources/views')
    ->exclude('resources/lang')
    ->exclude('storage')
    ->exclude('vendor')
    ->exclude('public')
    ->exclude('node_modules')
    ->name('*.php')
    ->in(__DIR__)
    ->notName('*.blade.php')
    ->ignoreDotFiles(true);

$fixers = [
  '-psr0',
  'align_equals', // =の位置を揃える
  'align_double_arrow', // => の位置を揃える
  'short_array_syntax', // array() → []
  'no_empty_phpdoc', // 空のphpdoc禁止.補完ではない
  'no_multiline_whitespace_around_double_arrow', // 演算子 => は複数行の空白に囲まれない
  'no_multiline_whitespace_before_semicolons', // セミコロンを閉じる前の複数行の空白は禁止
  'no_unused_imports', // 未使用のuse文は削除
  'ordered_imports', // use文の整列
  'single_quote', // 単純な文字列の二重引用符を一重引用符に変換
  'standardize_not_equals ', // すべての<>を！=
];

//defaultのコードスタイルは、symfony2
return Symfony\CS\Config\Config::create()
    ->fixers($fixers)
    ->finder($finder)
    ->setUsingCache(true);