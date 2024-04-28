<?php

class CheckController extends Controller
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
        $locationsInfo = $this->databaseManager->get('UserLocations')->fetchLocationInfoById();
        $groups = createGroup($employeeNames);
        
        return $this->render([
            'groups' => $groups,
        ], 'index');
    }
}