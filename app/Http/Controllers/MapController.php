<?php
/**
 * Created by PhpStorm.
 * User: goran.erhartic
 * Date: 8/5/2017
 * Time: 10:36 AM
 */

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class MapController extends Controller
{
    protected $ajaxResponse = array();

    /**
     * @param Client $client
     */
    protected function calculateGoogleMapDistance(Client $client)
    {
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=45.25345870690877,19.845862984657288&destinations={$_GET['lat']},{$_GET['lng']}&key=AIzaSyBXSN5-KefqORJYNTpUxuIxERpAiiW4uek";
        $response = $client->request('GET', $url);
        $contents = json_decode($response->getBody()->getContents());

        //Get distance in km
        $ajaxResponse['distance'] = $contents->rows[0]->elements[0]->distance->text;
        //Get clicked location
        $ajaxResponse['new_location'] = $contents->destination_addresses[0];

        print json_encode($ajaxResponse);
    }

    public function index()
    {
        return view('map');
    }
}