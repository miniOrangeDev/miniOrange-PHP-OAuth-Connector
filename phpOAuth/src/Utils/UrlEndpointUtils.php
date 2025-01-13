<?php
namespace Miniorange\Phpoauth\Utils;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

class UrlEndpointUtils
{
    public static function createTokenUrl(string $baseUrl): string
    {
        return $baseUrl . "/rest/oauth/token";
    }

    public static function createAuthorizationUrl(string $baseUrl): string
    {
        return $_ENV['BROKER_URI'] ?? $baseUrl . "/idp/openidsso" ;
    }

    public static function createRevocationUrl(string $baseUrl): string
    {
        return $baseUrl . "/rest/oauth/revoke";
    }

    public static function createIntrospectionUrl(string $baseUrl): string
    {
        return $baseUrl . "/rest/oauth/introspect";
    }

    public static function getUserInfoUrl(string $baseUrl): string
    {
        return $baseUrl . "/rest/oauth/getuserinfo";
    }

    public static function createLogoutUrl(string $baseUrl, string $logoutRedirectUri): string
    {
        return $baseUrl . "/idp/oidc/logout?post_logout_redirect_uri=" . urlencode($logoutRedirectUri);
    }
}