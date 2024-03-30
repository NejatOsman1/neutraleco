<?php

namespace App\CmsBundle\Util;

/**
 * Extension for Google Insights
 *
 * @author frcho
 */
class Pagespeed {

	const KEY = 'AIzaSyDj5SiXfz9b0EK-b-QeRWbFdlIhB6ss52Q';
	const GATEWAY = 'https://www.googleapis.com/pagespeedonline/v1/runPagespeed';
	const LOCALE = 'nl';

	/**
	 * @var string
	 */
	// private $gateway = 'https://www.googleapis.com/pagespeedonline/v2';

	/**
	 * Returns PageSpeed score, page statistics, and PageSpeed formatted results for specified URL
	 *
	 * @param string $url
	 * @param string $locale
	 * @param string $strategy
	 * @param optional array $extraParams
	 * @return array
	 * @throws Exception\InvalidArgumentException
	 * @throws Exception\RuntimeException
	 */
	public function getResults($url, $strategy = 'desktop', $screenshot = false)
	{
		if (0 === preg_match('#http(s)?://.*#i', $url)) {
			die('Invalid URL');
		}

		$url = self::GATEWAY . '?url=' . $url . '&key=' . self::KEY . '&strategy=' . $strategy . '&locale=' . self::LOCALE;
		$data = json_decode(file_get_contents($url));
		// $result = $data->formattedResults->ruleResults;

		return $data;

		// dump($url);die();
		/*$client = new \GuzzleHttp\Client($this->gateway);
		$request = $client->get('runPagespeed');
		$request->getQuery()
			->set('prettyprint', false) // reduce the response payload size
			->set('url', $url)
			->set('locale', $locale)
			->set('strategy', $strategy);
		if (isset($extraParams)) {
			$query = $request->getQuery();
			foreach($extraParams as $key=>$value)
			{
				$query[$key] = $value;
			}
		}
		try {
			$response = $request->send();
			$response = $response->getBody();
			$response = json_decode($response, true);
			return $response;
		} catch (\Guzzle\Http\Exception\ClientErrorResponseException $e) {
			$response = $e->getResponse();
			$response = $response->getBody();
			$response = json_decode($response);
			throw new RuntimeException($response->error->message, $response->error->code);
		}*/
	}

}
