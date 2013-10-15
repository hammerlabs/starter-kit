<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends HLabs_Controller {
	public function index() {

		$this->load->library("readimages");


		$data=array();

		$ua=getBrowser();
		$urlinfo=getUrl();
		$releaseDateInfo=getReleaseDateInfo($urlinfo);
		
		$data["ua"] = $ua;
		$data["title"] = $this->config->item( 'title' );
		$data["desc"] = $this->config->item( 'desc' );
		$data["url"] = $this->config->item( 'url' );
		$data["image"] = $this->config->item( 'image' );
		$data["facebook_url"] = $this->config->item( 'facebook_url' );
		$data["keywords"] = $this->config->item( 'keywords' );
		$data["og_title"] = $this->config->item( 'og_title' );		
		$data["ga_account"] = $this->config->item( 'ga_account' );	

		
		$this->_add_css("assets/css/normalize.min.css","head");
		$this->_add_css("assets/css/main.css","head");
		$this->_add_css("assets/css/loader.css","head");
        
        $this->_add_js("assets/js/libs/jquery-1.10.1.min.js","head");
        $this->_add_js("assets/js/libs/jquery.queryloader2.js","head");



		//Javascript added at the end of the document
        $this->_add_js("assets/js/libs/requestAnimationFrame.js","footer");
        $this->_add_js("http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js","footer");
        $this->_add_js("assets/js/libs/jquery.touchSwipe.js","footer");
        $this->_add_js("assets/js/libs/jquery.parallax.js","footer");
		$this->_add_js("js/libs/binaryajax.js","footer");
		$this->_add_js("js/libs/exif.js","footer");
		$this->_add_js("js/libs/jcanvas.min.js","footer");
		$this->_add_js("js/libs/load-image.min.js","footer");
		$this->_add_js("js/oauth.js","footer");
		$this->_add_js("js/upload.js","footer");



		$main = $this->load->view('main',$data,true);
		
		$foot = $this->load->view('main_foot',$data,true);

		$head = $this->load->view('main_head', $data, true);

		$this->output->append_output($head);
		$this->output->append_output($main);
		$this->output->append_output($foot);
	}

	public function info(){
		$this->load->view('info');
	}
}
