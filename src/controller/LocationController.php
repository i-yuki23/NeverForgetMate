<?php

include __DIR__ . '/../lib/home.php';

class LocationController extends Controller
{
    public function index()
    {
        return $this->render([
        ]);
    }

    public function create()
    {
        if (!$this->request->isPost()) {
            throw new HttpNotFoundException();
        }
        $locationName = htmlspecialchars($_POST['locationName']);
        $homeInformation = getHomeInformation($locationName);
        return $this->render([
            'homeInformation' => $homeInformation
        ], $templete = "index");
    }
}
