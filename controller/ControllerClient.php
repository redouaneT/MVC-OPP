<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelClient');

class ControllerClient{

    public function index(){
        $client = new ModelClient;
        $select = $client->select();
        twig::render("client-index.php", ['clients' => $select, 
                                        'client_list' => "Liste de Client"]);
    }

    public function create(){
       twig::render('client-create.php');
    }

    public function store(){
     // print_r($_POST);
     $client = new ModelClient;
     $insert = $client->insert($_POST);
    requirePage::redirectPage('../client');
    }

    public function show($id){
        $client = new ModelClient;
        $selectClient = $client->selectId($id);
        twig::render('client-show.php', ['client' => $selectClient]);
    }

    public function edit($id){
        $client = new ModelClient;
        $selectClient = $client->selectId($id);
        twig::render('client-edit.php', ['client' => $selectClient]);
    }

    public function update(){
        $client = new ModelClient;
        $update = $client->update($_POST);
    }
    public function delete(){
        $client = new ModelClient;
        $delete = $client->delete($_POST);

    }
}
