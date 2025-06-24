<?php
namespace Miniorange\Phpoauth\Constants;

class Messages {
    public const AUTHORIZATION_REQUEST_FAILED = "Authorization request failed";
    public const TOKEN_REQUEST_FAILED = "Token request failed";
    public const INVALID_TOKEN = "Invalid token";
    public const EMPTY_USERNAME_PASSWORD = "Email and Password are required for Password Grant";
    public const SOMETHING_WENT_WRONG = "Something went wrong. Contact the your administrator for more information!";
    public const EMPTY_PEM_CERTIFICATE_PATH = "Please enter a valid PEM certificate path it cannot be empty.";
    public const TOKEN_DECODING_FAILED = "Token decoding failed. ";
    public const CODE_VERIFIER_NOT_FOUND = "NO CODE VERIFIER FOUND for PKCE Grant";
    public const ID_TOKEN_NOT_FOUND = "ID token not found.";
    public const ACCESS_TOKEN_NOT_FOUND = "Access token or Refresh token not found.";
    public const USER_INFO_NOT_FOUND = "Failed to retrieve user info: ";
    public const INVALID_STATE = "Error: Invalid state parameter. Possible CSRF attack detected or session expired.";
    public const PEM_CERT_PATH_NOT_FOUND = 'PEM certificate path not found in the environment variables.';
    public const PEM_FILE_NOT_FOUND = 'PEM certificate file does not exist at the provided path.';
    public const UNABLE_TO_READ_PEM = 'Unable to read the PEM certificate file.';
    public const FAILED_TO_EXTRACT_PUBLIC_KEY = 'Failed to extract public key from PEM certificate.';
}