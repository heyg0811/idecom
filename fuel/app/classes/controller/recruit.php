<?php

class Controller_recruit extends Controller_Template {
	public function action_index(){
		$this->template->content = View::forge('recruit/index');
	}

}