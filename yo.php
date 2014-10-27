<?php

class Yo {

    protected $_apiKey;

    private $urls = array(
        'all' => 'http://api.justyo.co/yoall/',
        'user' => 'http://api.justyo.co/yo/',
        'subscribers' => 'http://api.justyo.co/subscribers_count/'
    );

    public function __construct($apiKey) {
        $this->_apiKey = $apiKey;
    }
    
    public function user($username, $link = null) {
        if ($username != '') {
            $this->processRequest($username, $link, null);
        }
    }

    public function userWithLocation($username, $location = null) {
        if ($username != '') {
            $this->processRequest($username, null, $location);
        }
    }

    public function all($link = null) {
        $this->processRequest($username = null, $link, null);
    }

    public function subscribers() {
        $url = $this->urls['subscribers'];

        $url .= '?api_token=' . $this->_apiKey;

        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 10,
        );

        $curl = curl_init();
        curl_setopt_array($curl, $options);
        $result = curl_exec($curl);
        curl_close($curl);
        
        // Result is in format {"result": 1 }
        $result = json_decode($result, true);
        
        if (isset($result['result'])) {
            return $result['result'];
        }

        return false;
    }

    private function processRequest($username = null, $link = null, $location = null) {
        $postFields = array(
            'api_token' => $this->_apiKey
        );

        $url = $this->urls['all'];

        if ($username != null) {
            $postFields['username'] = $username;
            $url = $this->urls['user'];
        }

        if ($link != null) {
        	$postFields['link'] = $link;
        }
        
        if ($location != null) {
            $postFields['location'] = $location;
        }

        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postFields
        );

        $result = '';

        $curl = curl_init();
        curl_setopt_array($curl, $options);
        $result = curl_exec($curl);
        curl_close($curl);

        return $result;
    }

}
