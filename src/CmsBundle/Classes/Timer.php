<?php
namespace App\CmsBundle\Classes;

class Timer{

	private $dev = false;
	private $arr = [];
	private $first_time = null;
	private $reset_time = null;
	private $time = null;
	private $str_size = 50;

	public function __construct($dev = false){
		$this->arr = [];

		$dev = true; // TEMPORARY_LINE

		$this->dev = $dev;

		if($dev){
			$this->time = microtime(true);
			$this->first_time = microtime(true);
			$this->reset_time = microtime(true);

			$this->arr[] = [
				'time' => number_format(0, 3, '.', ''),
				'label' => str_pad('Init from storage', $this->str_size, '.') . ' | ' . $this->line(),
			];
		}
	}

	public function clear(){
		if($this->dev){
			$this->arr = [];
			$this->time = microtime(true);
			$this->first_time = microtime(true);
			$this->reset_time = microtime(true);

			$this->arr[] = [
				'time' => number_format(0, 3, '.', ''),
				'label' => str_pad('Init timer (after clearing)', $this->str_size, '.') . ' | ' . $this->line(),
			];
		}
	}


	public function reset(){
		if($this->dev){

			$mark_time = microtime(true);
			$diff = ($mark_time - $this->reset_time);

			$this->arr[] = ['time' => '-', 'label' => '-'];

			$this->arr[] = [
				'time' => number_format($diff, 3, '.', ''),
				'label' => str_pad('RESET ON USER DEMAND', $this->str_size, '.') . ' | ' . $this->line(),
			];
			$this->time = microtime(true);
			$this->reset_time = microtime(true);
		}
	}

	public function mark($label = 'New mark'){
		if($this->dev){
			$mark_time = microtime(true);

			$diff = ($mark_time - $this->time);

			$this->time = $mark_time;
			$this->arr[] = [
				'time' => number_format(round($diff, 3), 3, '.', ''),
				'time_raw' => $diff,
				'label' => str_pad($label, $this->str_size, '.') . ' | ' . $this->line(),
			];
		}
		return $this;
	}

	public function show($die = true){
		if($this->dev){

			$mark_time = microtime(true);
			$diff = ($mark_time - $this->first_time);
			$this->arr[] = ['time' => '-', 'label' => '-'];
			$this->arr[] = ['time' => number_format(round($diff, 3), 3, '.', ''), 'label' => 'TOTAL TIME SINCE TIMER (RE-)SET'];


			$flattened = [];
			foreach($this->arr as $entry){
				if($entry['label'] == '-'){
					$flattened[] = '<span style="color: #ccc;">================' . str_repeat('=', ($this->str_size + 50)) . '</span>';
				}else{
					if(!empty($entry['time_raw']) && $entry['time_raw'] > 2){
						$flattened[] = '<span style="color: red;">' . str_pad('+' . $entry['time'] . ' sec.', 16, ".", STR_PAD_LEFT) . ' | ' . $entry['label'] . '</span>';
					}elseif(!empty($entry['time_raw']) && $entry['time_raw'] > 1){
						$flattened[] = '<span style="color: orange;">' . str_pad('+' . $entry['time'] . ' sec.', 16, ".", STR_PAD_LEFT) . ' | ' . $entry['label'] . '</span>';
					}else{
						if(isset($entry['time_raw'])){
							$flattened[] = '<span style="color: green;">' . str_pad('+' . $entry['time'] . ' sec.', 16, ".", STR_PAD_LEFT) . ' | ' . $entry['label'] . '</span>';
						}else{
							$flattened[] = '<span style="font-weight:bold;color: blue;">' . str_pad('+' . $entry['time'] . ' sec.', 16, ".", STR_PAD_LEFT) . ' | ' . $entry['label'] . '</span>';
						}
					}
				}
			}

			if($die === false){
				return '<blockquote style="margin: 50px;font-family: courier new;font-size: 12px;">
<strong>TIMER RESULT</strong><br/><br/>
				' . implode('<br/>', $flattened) . '

				<br/><br/>
				<span style="margin-right: 20px;color: blue;font-weight:bold;">■ Section baseline</span>
				<span style="margin-right: 20px;color: green;">■ < 1 second</span>
				<span style="margin-right: 20px;color: orange;">■ < 2 seconds</span>
				<span style="margin-right: 20px;color: red;">■ > 2 seconds</span>
			</blockquote>';
			}

			ob_end_clean();
			// dump($flattened);die();
			die('<blockquote style="margin: 50px;font-family: courier new;font-size: 12px;">
<strong>TIMER RESULT</strong><br/><br/>
				' . implode('<br/>', $flattened) . '

				<br/><br/>
				<span style="margin-right: 20px;color: blue;font-weight:bold;">■ Section baseline</span>
				<span style="margin-right: 20px;color: green;">■ < 1 second</span>
				<span style="margin-right: 20px;color: orange;">■ < 2 seconds</span>
				<span style="margin-right: 20px;color: red;">■ > 2 seconds</span>
			</blockquote>');
		}
	}

	private function line(){
		$bt = debug_backtrace();
		$caller = $bt[1];

		$caller['file'] = preg_replace('/^.*?Bundle\//', '/', $caller['file']);

		return $caller['file'] . ' #' . $caller['line'];
	}

}
?>