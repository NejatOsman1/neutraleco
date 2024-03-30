<?php
namespace App\CmsBundle\Classes;

class Matomo{

	private $url = '';
	private $hash = '';
	private $siteId = '';
	private $format = 'JSON';
	private $lang = 'nl';

	private $start = null;
	private $end = null;

	public function __construct($url, $hash, $siteId, $lang = 'nl'){
		$this->url = 'https://' . $url;
		$this->hash = $hash;
		$this->lang = $lang;
		$this->siteId = $siteId;

		$this->start = date('Y-m-d', strtotime('-1 DAY'));
		$this->end = date('Y-m-d');
	}

	public function setRange($start, $end){
		$this->start = $start;
		$this->end = $end;
	}

	public function getPopularMoments(){
		$week_data = [];
		$week_data_raw = $this->getData([
			'method'       => 'VisitTime.getByDayOfWeek',
		]);

		foreach($week_data_raw as $r){
			$week_data[] = $r['nb_visits'];
		}

		$day_data = [];
		$day_data_raw = $this->getData([
			'method'       => 'VisitTime.getVisitInformationPerServerTime',
		]);

		foreach($day_data_raw as $r){
			$day_data[] = $r['nb_visits'];
		}

		$data = [
			'week' => $week_data,
			'day' => $day_data,
		];
		return $data;
	}

	public function getVisitors(){
		return $this->getData([
			'method'       => 'VisitsSummary.get',
		]);
	}

	public function getCountries(){
		return $this->getData([
			'method'       => 'UserCountry.getCountry',
		]);
	}

	public function getResolutions(){
		return $this->getData([
			'method'       => 'Resolution.getResolution',
		]);
	}

	public function getReferrers(){
		return $this->getData([
			'method'       => 'Referrers.getAll',
		]);
	}

	public function getLive(){
		return $this->getData([
			'method'      => 'Live.getCounters',
			'lastMinutes' => 10,
		])[0];
	}

	public function getISPs(){
		return $this->getData([
			'method'      => 'Provider.getProvider',
		]);
	}

	private function getData($options){
		$options['module'] = 'API';
		$options['period'] = 'range';
		$options['date'] = $this->start . ',' . $this->end;
		$url = $this->url . '/index.php?language=' . $this->lang . '&' . http_build_query($options) . '&format=' . $this->format . '&token_auth=' . $this->hash . '&idSite=' . $this->siteId;

		$ctx = stream_context_create(array('http'=>
		    array(
		        'timeout' => 5,  //1200 Seconds is 20 Minutes
		    )
		));

		try {
			$ch = curl_init($url);

			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

			$data = json_decode(curl_exec($ch), JSON_OBJECT_AS_ARRAY);
			curl_close($ch);
		} catch (\Exception $e) {
			$data = [];
		}

		return $data;
	}

}