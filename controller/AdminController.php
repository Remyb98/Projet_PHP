<?php

require_once 'model/Manager.php';
require_once 'model/AdminManager.php';

function loginAdmin() {
	if ( isset($_SESSION['admin'] ) ) {
		$manager = new AdminManager();
		$dataLate = $manager->getLate();
		require_once 'view/adminPanelView.php';
	} else {
		require_once 'view/logAdminView.php';
	}
}

function login($login, $pwd) {
	$manager = new AdminManager();
	if ( isset( $login ) && isset( $pwd ) ) {
		$connect = $manager->connect( $login, $pwd );
		if ( $connect ) {
			header('Location: index.php?action=loginAdmin');
		} else {
			require_once 'view/logAdminView.php';
		}
	} else {
		require_once 'view/indexView.php';
	}
}

function addEditeur( $data ) {
	$manager = new AdminManager();
	if ( isset( $data['name'] ) && isset( $data['phone'] ) 
	&& isset( $data['rue'] ) && isset( $data['cp'] ) 
	&& isset( $data['city'] ) ) {
		$manager->addEditeur( $data['name'], $data['phone'], $data['rue'], $data['cp'], $data['city'] );
	}
	header('Location: index.php?action=loginAdmin');
}

function addMotMat( $data ) {
	$manager = new AdminManager();
	if ( isset( $data['abr'] ) && isset( $data['mat'] ) ) {
		$manager->addMotMat( $data['abr'], $data['mat'] );
	}
	header('Location: index.php?action=loginAdmin');
}