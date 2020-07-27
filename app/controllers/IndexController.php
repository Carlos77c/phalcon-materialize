<?php
declare(strict_types=1);

use Phalcon\Paginator\Adapter\Model;
use Phalcon\Paginator\Adapter\QueryBuilder;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
    	$currentPage = $this->request->getQuery('page', 'int', 1);
		$limit = 9;
		$offset = $limit*($currentPage-1);
	    $builder = $this->modelsManager->createBuilder()
		    ->columns("id, name")
		    ->from(Episode::class)
		    ->limit($limit)
		    ->offset($offset)
		    ->orderBy("id");

	    $pagedEpisodes = $builder->getQuery()->execute();
		$this->view->episodes = $pagedEpisodes;
    }

}

