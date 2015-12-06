<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$config = array(
	'login'=>array(
		array(
			'field' => 'username',
			'label' => 'Username',
			'rules' => 'required|trim'

			),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|trim'
		)
	),
	'passchange'=>array(
		array(
			'field' => 'password',
			'label' => 'Username',
			'rules' => 'required|trim'

			),
		array(
			'field' => 'newpassword',
			'label' => 'Password',
			'rules' => 'required|trim'
		),
		array(
			'field' => 'passwordconf',
			'label' => 'Password',
			'rules' => 'required|trim'
		)
	),
		'add'=>array(
		array(
			'field' => 'username',
			'label' => 'Username',
			'rules' => 'required|trim'

			),
		array(
			'field' => 'password',
			'label' => 'Password',
			'rules' => 'required|trim'
		),
		array(
			'field' => 'passwordconf',
			'label' => 'Password',
			'rules' => 'required|trim'
			)
		),
		'schooladd'=>array(
		array(
			'field' => 'school',
			'label' => 'school',
			'rules' => 'required|trim'
			)
	),
		'joineradd'=>array(
		array(
			'field' => 'name',
			'label' => 'name',
			'rules' => 'required|trim'
			)
	)
);