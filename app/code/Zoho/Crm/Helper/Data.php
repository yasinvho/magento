<?php
/**
 * Integration of Magento with zoho crm
 * Copyright (C) 2019
 *
 * This file is part of Zoho/Crm.
 *
 * Zoho/Crm is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Zoho\Crm\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper {

	/**
	 * @return bool
	 */
	public function getAccesstoken() {
		try {

			$curl = curl_init();
			$refreshToken = $this->getRefreshToken();
			$clientId = $this->getClientId();
			$clientSecret = $this->getClientSecret();

			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://accounts.zoho.com/oauth/v2/token?refresh_token=" . $refreshToken . "&client_id=" . $clientId . "&client_secret=" . $clientSecret . "&grant_type=refresh_token",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
			));

			$response = curl_exec($curl);

			curl_close($curl);

			$responsearray = json_decode($response, true);
			return $responsearray['access_token'];
		} catch (Exception $e) {
			$writer = new \Zend\Log\Writer\Stream(BP . '/var/log/ticketerrortoken.log');
			$logger = new \Zend\Log\Logger();
			$logger->addWriter($writer);
			$logger->info($e->getMessage());
		}

	}

	public function createTicket($data) {
		try {

			$access_token = $this->getAccesstoken();

			$curl = curl_init();
			$crmData = json_encode($data);

			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://desk.zoho.com/api/v1/tickets",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => $crmData,
				CURLOPT_HTTPHEADER => array(
					"orgId: 738841518",
					"Content-Type: application/json",
					"Authorization: Bearer " . $access_token,
				),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			return $response;
		} catch (Exception $e) {
			$writer = new \Zend\Log\Writer\Stream(BP . '/var/log/ticketerror.log');
			$logger = new \Zend\Log\Logger();
			$logger->addWriter($writer);
			$logger->info($e->getMessage());
		}
	}

	public function createLeads($data) {
		try {

			$access_token = $this->getAccesstoken();

			$curl = curl_init();
			//$crmData = json_encode($data);

			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://www.zohoapis.com/crm/v2/Leads",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 0,
				CURLOPT_FOLLOWLOCATION => true,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => $data,
				CURLOPT_HTTPHEADER => array(
					"lar_id: 4818876000001788019",
					"Content-Type: application/json",
					"Authorization: Bearer " . $access_token,
				),
			));

			$response = curl_exec($curl);

			curl_close($curl);
			return $response;
		} catch (Exception $e) {
			$writer = new \Zend\Log\Writer\Stream(BP . '/var/log/ticketerror.log');
			$logger = new \Zend\Log\Logger();
			$logger->addWriter($writer);
			$logger->info($e->getMessage());
		}
	}

	public function getClientId() {
		return $this->scopeConfig->getValue(
			'crm/general/client_id',
			\Magento\Store\Model\ScopeInterface::SCOPE_STORE
		);
	}
	public function getClientSecret() {
		return $this->scopeConfig->getValue(
			'crm/general/client_secret',
			\Magento\Store\Model\ScopeInterface::SCOPE_STORE
		);
	}
	public function getApiDomain() {
		return $this->scopeConfig->getValue(
			'crm/general/api_domain',
			\Magento\Store\Model\ScopeInterface::SCOPE_STORE
		);
	}
	public function getRefreshToken() {
		return $this->scopeConfig->getValue(
			'crm/general/refresh_token',
			\Magento\Store\Model\ScopeInterface::SCOPE_STORE
		);
	}
}
