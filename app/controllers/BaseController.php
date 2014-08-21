<?php
class BaseController extends Controller {

	public $layout = 'layout';
	
	protected $messageBag = null;

	public function __construct() {
		// CSRF Protection
		$this->beforeFilter('csrf', array('on' => 'post'));

		$this->messageBag = new Illuminate\Support\MessageBag;

        if (Auth::check()) {
          $this->user = Auth::user();
        }
	}

	protected function setupLayout() {
		if ( ! is_null($this->layout)) {
			$this->layout = View::make($this->layout);
		}
	}

}