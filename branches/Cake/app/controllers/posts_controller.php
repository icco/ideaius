<?php

class PostsController extends AppController {

	var $name = 'Posts';

	function index() {
		$this->pageTitle = "Posts";
		$this->set('posts', $this->Post->find('all'));
	}

	function view($id = null) {
		$this->pageTitle = "Post " . $id;
		$this->Post->id = $id;
		$this->set('post', $this->Post->read());
	}

	function add() {
		$this->pageTitle = "Add a Post";
		if (!empty($this->data)) {
			if ($this->Post->save($this->data)) {
				$this->flash('Your post has been saved.','/posts');
			}
		}
	}

	function delete($id) {
		$this->pageTitle = "Delete a Post";
		$this->Post->del($id);
		$this->flash('The post with id: '.$id.' has been deleted.', '/posts');
	}

	function edit($id = null) {
		$this->pageTitle = "Edit a Post";
		$this->Post->id = $id;
		if (empty($this->data)) {
			$this->data = $this->Post->read();
		} else {
			if ($this->Post->save($this->data)) {
				$this->flash('Your post has been updated.','/posts');
			}
		}
	}


}
?>
