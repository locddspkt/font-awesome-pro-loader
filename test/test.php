<?php
include_once __DIR__ . '/../src/FaLoader.php';

$iconName = __DIR__ . '/test-icons/icon-name-test.svg';
$content = FaLoader\Icons::Load($iconName);
if ($content === false) {
    echo 'Error with icon file name = ' . $iconName;
}
else {
    echo "Icon content in file name " . $iconName . "\n";
    echo $content;
    echo "\n";
    echo "\n";
}


$content = FaLoader\Icons::Load($iconName = 'icon-name.svg');
if ($content === false) {
    echo 'Error with icon name = ' . $iconName;
}
else {
    echo "Icon content of icon name " . $iconName . "\n";
    echo $content;
    echo "\n";
    echo "\n";
}

$content = FaLoader\Icons::Load($iconName = 'icon-name');
if ($content === false) {
    echo 'Error with icon name = ' . $iconName;
}
else {
    echo "Icon content of icon name " . $iconName . "\n";
    echo $content;
    echo "\n";
    echo "\n";
}

$content = FaLoader\Icons::Load($iconName = 'icon-name-without');
if ($content === false) {
    echo 'Error with icon name = ' . $iconName;
}
else {
    echo "Icon content of icon name " . $iconName . "\n";
    echo $content;
    echo "\n";
    echo "\n";
}



$content = FaLoader\Icons::Load($iconName = 'icon-name-try-remove.svg');
if ($content === false) {
    echo 'Error with icon name = ' . $iconName;
}
else {
    echo "Icon content of icon name " . $iconName . "\n";
    echo $content;
    echo "\n";
    echo "\n";
}

FaLoader\Icons::init(__DIR__ . '/test-icons/');
$content = FaLoader\Icons::Load($iconName = 'icon-name-test.svg');
if ($content === false) {
    echo 'Error with icon name = ' . $iconName;
}
else {
    echo "Icon content of icon name " . $iconName . "\n";
    echo $content;
    echo "\n";
    echo "\n";
}
