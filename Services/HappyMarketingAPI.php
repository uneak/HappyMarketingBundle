<?php

	namespace Uneak\HappyMarketingBundle\Services;

    use Uneak\HappyMarketingBundle\OAuth\Curl\CurlRequest;
    use Uneak\HappyMarketingBundle\OAuth\Curl\CurlResponse;
    use Uneak\HappyMarketingBundle\OAuth\ServiceAPI;


    class HappyMarketingAPI extends ServiceAPI {

        public function __construct($apiUrl) {
            parent::__construct($apiUrl);
        }



        public function getClients(array $filters = array()) {
            return $this->call('clients', array(
                'parameters' => $filters,
                'http_method' => CurlRequest::HTTP_METHOD_GET
            ));
        }

        public function getGroupsByClient($client) {
            return $this->call('clients/'.$client.'/groups', array(
                'parameters' => array(),
                'http_method' => CurlRequest::HTTP_METHOD_GET
            ));
        }


        public function addField($group, $label, $type, array $extra = array()) {
            return $this->call('fields', array(
                'parameters' => array_merge(array(
                    'group' => $group,
                    'label' => $label,
                    'type' => $type,
                ), $extra),
                'http_method' => CurlRequest::HTTP_METHOD_POST
            ));
        }


        public function addClient($label, array $extra = array()) {
            return $this->call('clients', array(
                'parameters' => array_merge(array(
                    'label' => $label,
                ), $extra),
                'http_method' => CurlRequest::HTTP_METHOD_POST
            ));
        }


        public function addProspect($group, array $extra = array()) {
            return $this->call('prospects', array(
                'parameters' => array_merge(array(
                    'group' => $group,
                ), $extra),
                'http_method' => CurlRequest::HTTP_METHOD_POST
            ));
        }

        protected function _checkResponse(CurlResponse $response) {
//            $result = $response->getBody();
//            if ($response->getCode() == 400) {
//                throw new APIException($result['error']['message'], $result['error']['code']);
//            }
//            return $result;
            return $response;
        }
    }
