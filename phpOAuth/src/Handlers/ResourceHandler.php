<?php
namespace Miniorange\Phpoauth\Handlers;
use Miniorange\Phpoauth\Utils\UrlEndpointUtils;
use function Miniorange\Phpoauth\Network\makeApiCall;
function getUserInfoUsingAccessToken(string $access_token, $config)
{

    $getUserInfoUrl = UrlEndpointUtils::getUserInfoUrl($config->getBaseUrl());

    $headers = [
        'Authorization: Bearer ' . $access_token,
        'Accept: application/json',
    ];

    $response = makeApiCall($getUserInfoUrl, $headers, [], 'GET');

    return (object) $response;
}