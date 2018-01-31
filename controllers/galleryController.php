<?php

class gallery extends Controller
{
	public function index()
	{
		$this->getView('headerView');
		$this->model = $this->setModel('galleryModel', $this->db);
		$images = $this->model->get_image();

		$this->getView('gallery/indexView', $images);
		$this->getView('footerView');
	}
}