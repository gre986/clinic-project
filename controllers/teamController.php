<?php

class team extends Controller
{
	public function index()
	{
		$this->getView('headerView');
		$this->model = $this->setModel('teamsModel',$this->db);

		$images = $this->model->get_image();
		$this->getView('team/indexView',$images);
		$this->getView('footerView');
	}
}