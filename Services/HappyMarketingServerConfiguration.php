<?php

    namespace Uneak\HappyMarketingBundle\Services;

	use Symfony\Component\OptionsResolver\OptionsResolver;
    use Uneak\OAuthClientBundle\OAuth\Configuration\ServerConfiguration;
    use Uneak\OAuthClientBundle\OAuth\Configuration\ServerOAuth2Configuration;

    class HappyMarketingServerConfiguration extends ServerOAuth2Configuration {

        public function configureOptions(OptionsResolver $resolver) {
            parent::configureOptions($resolver);
            $resolver->setDefaults(array(
                'authEndpoint'    => "http://dev.starter.com/app_dev.php/api/v1/oauth/v2/auth",
                'tokenEndpoint'    => "http://dev.starter.com/app_dev.php/api/v1/oauth/v2/token",
            ));

        }


	}
