<?php

namespace Uneak\HappyMarketingBundle\Services;

    use Uneak\OAuthClientBundle\OAuth\Configuration\AuthenticationOAuth2ConfigurationInterface;
    use Uneak\OAuthClientBundle\OAuth\Configuration\CredentialsConfigurationInterface;
    use Uneak\OAuthClientBundle\OAuth\Curl\CurlResponse;
    use Uneak\OAuthClientBundle\OAuth\ServiceOAuth2;
    use Uneak\OAuthClientBundle\OAuth\Token\TokenResponse;

    class HappyMarketingService extends ServiceOAuth2 {

        public function __construct(CredentialsConfigurationInterface $credentials, HappyMarketingServerConfiguration $server, AuthenticationOAuth2ConfigurationInterface $authentication) {
            parent::__construct($credentials, $server, $authentication);
        }

        protected function buildAccessToken(CurlResponse $response) {
            $result = $response->getBody();

            $code = $response->getHttpCode();
            $message = "Error";
            $type = "OAuthError";
            $token = null;

            if (is_array($result)) {
                if (isset($result['error'])) {
                    $message = $result['error'];
                } else {
                    $token = new HappyMarketingAccessToken($result);
                    $type = "OAuthSuccess";
                    $message = "Success";
                }
            }

            return new TokenResponse($code, $token, $type, $message);
        }

    }
