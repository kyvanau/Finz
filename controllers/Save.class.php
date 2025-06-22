<?php
require_once 'Controller.class.php';

class Save extends Controller{

    public function form() {
        $this->view('savings/form.php');
    }

    function menu(){
        $this->view('Dashboard.php');
    }

    // function save(){
    //     $this->view('Savings.php');
    // }

    function add(){
        $tabungan= $_POST['tabungan'];
        $bulan = $_POST['bulan'];
        $model = $this->model('SaveModel');
        $model->insert($tabungan, $bulan);
        header('location:index.php?c=Save&m=list');
        exit;
    }

    // function list(){
    //     $model = $this->model('SaveModel');
    //     $amount = $model->getAll(); // hasil: ['total' => 40000]
    //     $this->view('savings.php', ['amount' => $amount]);
    // }

    public function list() {
        $model = $this->model('SaveModel');
        $perBulan = $model->getTotalPerBulan();
        $totalSemua = $model->getAll();
        $this->view('savings/Savings.php', [
            'perBulan' => $perBulan,
            'total' => $totalSemua
        ]);
        
    }
    
}
