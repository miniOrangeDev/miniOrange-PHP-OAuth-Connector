<?php
namespace Miniorange\Phpoauth\Constants;

class GrantType {
    public const AUTHORIZATION_CODE = "authorization_code";
    public const IMPLICIT = 'implicit';
    public const AUTHORIZATION_CODE_PKCE = 'authorization_code_pkce';
    public const PASSWORD = 'password';
    public const REFRESH_TOKEN = 'refresh_token';

    public static function from(string $value): string {
        $constants = [
            self::AUTHORIZATION_CODE,
            self::IMPLICIT,
            self::AUTHORIZATION_CODE_PKCE,
            self::PASSWORD,
            self::REFRESH_TOKEN
        ];
        
        if (!in_array($value, $constants)) {
            throw new \ValueError("Invalid grant type provided: {$value}");
        }
        return $value;
    }
}
