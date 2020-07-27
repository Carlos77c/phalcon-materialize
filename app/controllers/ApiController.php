<?php

declare(strict_types=1);

use Phalcon\Http\Response;

class ApiController extends ControllerBase
{

    public function getEpisodesFromMasterAction()
    {

    	$request = new CurlRequest;
    	$episodes = $request("https://rickandmortyapi.com/api/episode");
    	$results = $episodes->results;
	    //var_dump($results);
	    //exit;
    	while (!empty($episodes->info) && !empty($episodes->info->next)){
		    $episodes = $request($episodes->info->next);
    		$results = array_merge($results, $episodes->results);
	    }
    	$storeIndb = new StoreInDb;
		$storeIndb($results);

	    //var_dump($episodes->results);
	    //echo json_decode($response);
    }

	public function getEpisodesAjaxAction() {
		$request = $this->request;
		if(!$request->isAjax()){
			$response = new Response();
			return $response->redirect("/");
		}
		$episodes = Episode::find();
		$output['draw'] = intval($request->get('draw'));
		$output['recordsTotal'] = Episode::count();
		$output['recordsFiltered'] = count($episodes);
		$output['data'] = $episodes;
		return json_encode($output);
	}
}

