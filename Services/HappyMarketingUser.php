<?php

	namespace Uneak\HappyMarketingBundle\Services;

	use Symfony\Component\OptionsResolver\OptionsResolver;
	use Uneak\OAuthClientBundle\OAuth\Curl\CurlRequest;
	use Uneak\HappyMarketingBundle\OAuth\OAuth;
	use Uneak\HappyMarketingBundle\OAuth\ServiceUser;
	use Uneak\HappyMarketingBundle\OAuth\Token\AccessTokenInterface;
	use Uneak\HappyMarketingBundle\OAuth\Token\TokenInterface;

	class HappyMarketingUser extends ServiceUser {


		public function configureOptions(OptionsResolver $resolver) {
			parent::configureOptions($resolver);
			$resolver->setDefaults(array(
				'service'         => 'happymarketing',
			));
		}



		public function setTokenData(TokenInterface $token) {
			$options = array(
				'url' => 'https://www.happymarketingapis.com/oauth2/v1/userinfo',
				'http_method' => CurlRequest::HTTP_METHOD_GET,
			);

			$response = $this->service->fetch($token, $options);

			$this->setData($response->getResult());
		}

		public function setData(array $data) {
			$this->options = $this->adapter($data, array(
				'id'         => 'id',
				'first_name' => 'given_name',
				'last_name'  => 'family_name',
				'link'       => 'link',
				'username'   => 'name',
				'email'      => 'email',
				'picture'    => 'picture',
				'gender'     => 'gender',
				'locale'     => 'locale'
			));
		}

	}
