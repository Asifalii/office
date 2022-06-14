<?php
error_reporting(0);
require('functions.php');

$uri = getURI();

if (preg_match('#english-to-(.*)-meaning-(.*)#', $uri, $match)) {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location: ' . base_url() . '/english-to-' . $match[1] . '-meaning-' . $match[2]);
    exit;
}

if (preg_match('#english-to-(.*)-dictionary#', $uri, $match)) {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location: ' . base_url());
    exit;
}

if (preg_match('#english-to-(.*)-dictionary-#', $uri, $match)) {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location: ' . base_url());
    exit;
}

if (preg_match('#(.*)-meaning-or-translation-of-(.*)#', $uri, $match)) {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location: ' . base_url() . '/english-to-' . $match[1] . '-meaning-' . $match[2]);
    exit;
}

if (preg_match('#(.*)-to-english-meaning-of-(.*)#', $uri, $match)) {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location: ' . base_url() . '/' . $match[1] . '-to-english-meaning-' . $match[2]);
    exit;
}


if (preg_match('#(.*)-to-english-dictionary#', $uri, $match)) {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location: ' . base_url());
    exit;
}

if (preg_match('#read-text-english-to-(.*)#', $uri, $match)) {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location: ' . base_url() . '/read-text');
    exit;
}

if (preg_match('#index\.php/main/search/(.*)/bangla-dictionary\.html#', $uri, $match)) {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location: ' . base_url() . '/english-to-bengali-meaning-' . $match[1]);
    exit;
}

if (preg_match('#bengali-dictionary/(.*)/english-bengali-meaning-(.*)#', $uri, $match)) {
    header("HTTP/1.1 301 Moved Permanently");
    header('Location: ' . base_url() . '/english-to-bengali-meaning-' . $match[1]);
    exit;
}

header("HTTP/1.0 404 Not Found");
header('Location: ' . base_url() . '/?msg=not-found');
exit;


?>