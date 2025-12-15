<?php
class app
{
    protected $controller = 'Home';
    protected $action = 'Get_data';
    protected $param = [];//mảng
    //hàm khi gọi class thì nó sẽ tự động chạy 
    function __construct()
    {
        //sử lý khi code xong hàm processURL();
        $arr = $this->processURL();
        //print_r($arr);    //IN RA ĐỂ TEST NẾU CẦN
        //Xử lý controller
        if ($arr != null) {
            if (file_exists('./MVC/Controllers/' . $arr[0] . '.php')) {   //nối sau nối chuỗi
                $this->controller = $arr[0];  //gán biến controller bằng phần tử đầu tiên của mảng
                unset($arr[0]);
            }
        }
        include_once './MVC/Controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;    //sử lý xong controller
        //Xử lý action
        if (isset($arr[1])) { //$arr[1] là phần đầu có tồn tại hay không
            if (method_exists($this->controller, $arr[1])) {
                $this->action = $arr[1];
                unset($arr[1]);
            }
        }
        //Xử lý param
        $this->param = $arr ? array_values($arr) : [];
        //Tạo biến có 3 tham số
        call_user_func_array([$this->controller, $this->action], $this->param);
    }

    function processURL()
    {
        if (isset($_GET['url'])) {    //lấy theo kiểu get ở URL
            //filter_var : để loại bỏ các ký tự gạch chéo thường để loại bỏ khoảng cách thừa của nút '/'
            return explode('/', filter_var(trim($_GET['url']), FILTER_DEFAULT)); //
        }
    }
}
?>