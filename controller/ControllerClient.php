<?php
RequirePage::requireModel('Crud');
RequirePage::requireModel('ModelClient');

class ControllerClient
{

    public function index()
    {
        $client = new ModelClient;
        $select = $client->select();
        //print_r($select);
        // $view = new View('client-index');
        // $view->output('clients', $select);
        twig::render("client-index.php", [
            'clients' => $select,
            'client_list' => "Liste de Client"
        ]);
    }

    public function create()
    {
        // $view = new View('client-create');
        twig::render('client-create.php');
    }

    public function store()
    {
        // print_r($_POST);
        $client = new ModelClient;
        $insert = $client->insert($_POST);
        requirePage::redirectPage('../client');
    }
    public function show($id)
    {
        // print_r($_POST);
        $client = new ModelClient;
        $selectClient = $client->selectId($id);
        // requirePage::redirectPage('../client');
        twig::render('client-show.php', ['client' => [$selectClient]]);
    }
}
