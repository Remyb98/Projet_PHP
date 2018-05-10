<?php

require_once 'controller/BasicController.php';
require_once 'controller/UserController.php';
require_once 'controller/AdminController.php';

try {
	session_start();
	if ( isset( $_GET['action'] ) ) {
		if ( $_GET['action'] == 'index' ) {
			index();
		} elseif ( $_GET['action'] == 'connect' ) {
			connect( $_POST['login'], $_POST['pwd'], $_POST['type'] );
		}  elseif ( $_GET['action'] == 'profile' ) {
			profile();
		} elseif ( $_GET['action'] == 'logout' ) {
			disconnect();
		}elseif ( $_GET['action'] == 'updatelog' ) {
			update($_SESSION['id']);
		} elseif ( $_GET['action'] == 'loginAdmin' ) {
			loginAdmin();
		}  elseif ( $_GET['action'] == 'loginadm' ) {
			login( $_POST['login'], $_POST['pwd'] );
		} elseif ( $_GET['action'] == 'addEditeur' ) {
			addEditeur( $_POST );
		} elseif ( $_GET['action'] == 'addMotMat' ) {
			addMotMat( $_POST );
		} elseif ( $_GET['action'] == 'insertBook' ) {
			require_once 'view/insertBookView.php';
		} else {
			index();
		}
	} else {
		index();
	}
} catch ( Exception $e ) {
	echo "Il y a une erreur : " . $e->getMessage();
}