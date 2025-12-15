<?php 
class controller{
    //hàm gọi model
    public function model($model){
        include_once './MVC/Models/'.$model.'.php';
        return new $model;
    }
    //hàm gọi view
    public function view($view,$data=[]){
        include_once './MVC/Views/'.$view.'.php';
    }
}
?>