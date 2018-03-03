<?php

namespace JsonWhois\Adapter\Domain;

use JsonWhois\Adapter\Base;

class Whois extends Base {
	const END_POINT = '/whois/domain';

	/**
	 * Set the payload for the request
	 * 
	 * @param string $domain domain name to lookup
	 */
	public function setPayload($domain) {
		$this->payload = ['domain' => $domain];
	}

	/**
	 * Build the base API request URL for this end-point
	 * 
	 * @return String Complete API end-point URL
	 */
	protected function getRequestBase() {
		return self::HOST . self::END_POINT;
	}
}