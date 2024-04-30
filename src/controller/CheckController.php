<?php

class CheckController extends Controller
{
    public function index()
    {
        $userId = 1;
        $userLocationInfo = $this->databaseManager->get('UserLocations')->fetchUserLocationInfoByUserId($userId);
        
        return $this->render([
            'userLocationInfo' => $userLocationInfo,
        ], 'index');
    }
}
