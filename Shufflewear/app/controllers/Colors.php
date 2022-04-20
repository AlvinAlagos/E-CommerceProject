<?php
    class Colors extends Controller{

        public function __construct()
        {
            
        }

        public function index()
        {
            $colors = $this->api_call("https://x-colors.herokuapp.com/api/random?number=3");
            
            if (!isset($_SESSION['color1']) || !isset($_SESSION['color1']) || !isset($_SESSION['color1']) ) {
                $_SESSION['color1'] = $colors[0];
                $_SESSION['color2'] = $colors[1];
                $_SESSION['color3'] = $colors[2];
            }
            elseif (isset($_POST['rerandomize'])) {
                if (isset($_POST['randomizeColor1'])) {
                    $_SESSION['color1'] = $colors[0];
                }
                if (isset($_POST['randomizeColor2'])) {
                    $_SESSION['color2'] = $colors[1];
                }
                if (isset($_POST['randomizeColor3'])) {
                    $_SESSION['color3'] = $colors[2];
                }
            }

            $this->view('Colors/index');
        }

        public function api_call($url){ 
            $json_data = file_get_contents($url);
            $response_data = json_decode($json_data);
            return $response_data;
        }
    }

?>