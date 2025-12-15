<?php 
    class connectDB{
        public $con;
        function __construct()
        {
            $this->con=mysqli_connect('localhost','root','','74dctt28_qlthuvien');
            mysqli_query($this->con,"SET NAMES 'utf8'");
        }
    }
?>