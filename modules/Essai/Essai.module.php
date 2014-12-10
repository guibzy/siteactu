<?php
	class Essai extends Module{

	public function action_index(){
		
		$this->tpl->assign('tab',$_GET);
		}
	}
	
?>