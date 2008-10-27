<?php
class NodesController extends TohdohAppController {
	var $name = 'Nodes';

	var $helpers = array (
		'Html',
		'Javascript',
		'Ajax'
	);
	var $components = array (
		'RequestHandler'
	);

	var $layout = 'tohdoh';

	function index() {
		$this->set('parentNodes', $this->Node->findWithChildCount(0));
	}

	function show($id = 0) {
		$id = (int) $id;
		$this->set('currentId', $id);
		$this->set('tree', $this->Node->findPath($id));
		//$this->set('node',$this->Node->findById($id));
		$this->set('nodes', $this->Node->findWithChildCount($id));
		$nodesDone = $this->Node->findAll(array (
			'Node.done' => 1,
			'Node.parent_id' => $id
		), null, array (
			'Node.created' => 'DESC'
		));

		$this->set('nodesDone', $nodesDone);
	}

	function add() {
		if (!empty ($this->data)) {
			$id = 0;
			if (!empty ($this->data['Node']['parent_id'])) {
				$id = (int) $this->data['Node']['parent_id'];
			}
			if ($id == 0) {
				$this->data['Node']['type'] = "L";
			} else {
				$this->data['Node']['type'] = "T";
				// force the parent to be a list
				$this->Node->id = $id;
				$this->Node->saveField('type', 'L');
			}

			if (empty ($this->data['Node']['name'])) {
				$this->set('add_msg', "Task name is empty");
			} else {
				uses('Sanitize');

				$this->data['Node']['name'] = Sanitize :: clean($this->data['Node']['name'], $this->Node->useDbConfig);

				$this->Node->id = null; // reset
				if ($this->Node->save($this->data)) {
					$this->set('nodes', $this->Node->findWithChildCount($id));

					$nodesDone = $this->Node->findAll(array (
						'Node.done' => 1,
						'Node.parent_id' => $id
					), null, array (
						'Node.created' => 'DESC'
					));

					$this->set('nodesDone', $nodesDone);
				} else {
					$this->set('add_msg', "Couldn't add the Node.");
				}
			}
		}
	}

	function done($id) {
		if ($this->Node->exists($id)) {
			$node = $this->Node->find(array (
				'Node.id' => $id
			), array (
				'Node.type',
				'Node.parent_id'
			));

			if (!empty ($node) && $node['Node']['type'] == 'T') {
				$pid = $node['Node']['parent_id'];
				$this->Node->saveField('done', 1);
				$this->Node->id = null;
				$nodesDone = $this->Node->findAll(array (
					'Node.done' => 1,
					'Node.parent_id' => $pid
				), null, array (
					'Node.created' => 'DESC'
				));

				$this->set('nodesDone', $nodesDone);
			}
		}
	}

	function undone($id) {
		if ($this->Node->exists($id)) {
			$node = $this->Node->find(array (
				'Node.id' => $id
			), array (
				'Node.type',
				'Node.parent_id'
			));

			if (!empty ($node) && $node['Node']['type'] == 'T') {
				$pid = $node['Node']['parent_id'];
				$this->Node->saveField('done', 0);
				$this->Node->id = null;
				$this->set('nodes', $this->Node->findWithChildCount($pid));
			}
		}
	}

	function del($id, $cascade = 0) {
		$this->autoRender = false;

		$id = (int) $id;
		$cascade = (bool) $cascade;
		if ($cascade) {

			$this->Node->bindModel(array (
				'hasMany' => array (
					'Child' => array (
						'className' => 'Node',
						'foreignKey' => 'parent_id',
						'dependent' => true
					)
				)
			));
		}
		$this->Node->id = $id;
		$parent_id = $this->Node->field('parent_id');
		$this->Node->del($id, $cascade);

		//$this->Node->deleteAll(array('parent_id' => $id),true);
		// if the parent has no children we force it to be a task
		if ($parent_id != 0 && !$this->Node->hasAny(array (
				'Node.parent_id' => $parent_id
			))) {
			$this->Node->id = $parent_id;
			$this->Node->saveField('type', 'T');
		}
	}

	function edit($id) {
		$this->autoRender = false;

		$this->Node->id = (int) $id;
		$name = $this->params['form']['value'];
		if (empty ($name)) {
			echo $this->Node->field('name');
			exit;
		}
		uses('Sanitize');
		$data['Node']['name'] = Sanitize :: clean(urldecode($name), $this->Node->useDbConfig);
		if ($this->Node->save($data)) {
			// we need to output this to the in-place editor
			echo $name;
			exit;
		}
	}

	function sort() {
		$this->autoRender = false;
		if (!empty ($this->params['form']['nodes'])) {
			foreach ($this->params['form']['nodes'] as $val => $id) {
				$this->Node->id = (int) $id;
				$this->Node->saveField('position', (int) $val);
			}
		}
	}

}
?>