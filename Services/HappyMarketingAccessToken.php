<?php

	namespace Uneak\HappyMarketingBundle\Services;

	use Symfony\Component\OptionsResolver\OptionsResolver;
	use Uneak\HappyMarketingBundle\OAuth\Configuration;
	use Uneak\HappyMarketingBundle\OAuth\Curl\CurlRequest;
	use Uneak\HappyMarketingBundle\OAuth\Token\AccessToken;

	class HappyMarketingAccessToken extends AccessToken {

		public function configureOptions(OptionsResolver $resolver) {
			parent::configureOptions($resolver);
			$resolver->setDefaults(array(
				'service'  => 'sonoov'
			));
		}


	}