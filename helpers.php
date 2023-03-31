<?php

function showTemplate($template, $data = [])
{
    $loader = new \Twig\Loader\FilesystemLoader('../views/');
    $twig = new \Twig\Environment(
        $loader,
        ['debug' => true]
    );
    if (isset($_SESSION)) {
        $twig->addGlobal('session', $_SESSION);
    }
    $twig->addExtension(new \Twig\Extension\DebugExtension());
    $twig->display($template, $data);
}

function error($errorNumber, $errorMessege)
{
    http_response_code($errorNumber);
    showTemplate('error.twig', [
        'error' => $errorMessege,
    ]);
    exit;
}

function getPath(): array
{
    $path = strtok($_GET['p'], '?');

    if ($path === '/') {
        return [];
    }

    return explode('/', trim($path, '/'));
}
