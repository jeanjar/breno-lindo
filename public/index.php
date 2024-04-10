<?php
declare(strict_types=1);

//enable all errors
use AfyScrapper\Utils\Scrapper;

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

// add json headers
header('Content-Type: application/json');
header('Accept: application/json');

if ($_GET['url'] && strlen($_GET['url']) > 0) {
    $url = $_GET['url'];
    $scrapper = new Scrapper();
    try {
        $flipUrl = $scrapper->readFlipUrlFromPagestead($url);
        echo json_encode(['flip_url' => $flipUrl]);
    } catch (Exception $e) {
        // header error for internal server error
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode(['error' => $e->getMessage()]);
    }
    exit;
}

// header error for invalid request method
header('HTTP/1.1 405 Method Not Allowed');
echo json_encode(['error' => 'Invalid request method']);
exit;