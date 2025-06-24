<?php
namespace Miniorange\Phpoauth\Handlers;

use Miniorange\Phpoauth\GrantTypeFactory;

/* =========================================================== */
/*                 Authorization Handler Class                 */
/* ----------------------------------------------------------- */
/* This class is responsible for managing the OAuth            */
/* authorization process. It retrieves the configured grant    */
/* type from the OAuth config and creates the corresponding     */
/* authorization request flow (e.g., Authorization Code, Implicit,*/
/* PKCE). It starts the authorization process                   */
/* by redirecting the user to the appropriate authorization     */
/* endpoint based on the chosen grant type.                    */
/* =========================================================== */
class AuthorizationHandler {

    private $config; 
    private $loginListener;

    public function __construct($config, $loginListener) {
        $this->config = $config;
        $this->loginListener = $loginListener;
    }

    /* 
     * Starts the authorization process.
     * It retrieves the configured grant type and starts the
     * authorization request based on that.
     */
    public function startAuthorization($email = null, $password = null) {

        // Check if session and access token exist
        if(isSessionActive($this->config))
        {
            $accessToken = $_SESSION['access_token'] ?? null;
            $refreshToken = $_SESSION['refresh_token'] ?? null;
            TokenHandler::HandleAccessAndRefreshToken($accessToken, $refreshToken, $this->config, $this->loginListener);
            exit();
        }
        
        // Get the correct grant flow based on the grant type
        $grantFlow = GrantTypeFactory::getGrantType($this->config);
        
        // Start the authorization request (e.g., redirect user)
        $grantFlow->createAuthorizationRequest();
    }
}
