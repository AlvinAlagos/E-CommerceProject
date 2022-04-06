<?php
    class Colors extends Controller{

        public function __construct()
        {
            
        }

        public function index($colors = null)
        {
            $randomColors = $this->api_call("https://x-colors.herokuapp.com/api/random?number=3");

            if ($colors == null) {
                $colors = $randomColors;
            }
            else {
                for ($i = 0; $i < 3; $i++) {
                    if ($colors[$i] == null) {
                        $colors[$i] = $randomColors[$i];
                    } 
                }
            }

            $this->view('Colors/index', $colors);
        }

        public function api_call($url){ 
            $json_data = file_get_contents($url);
            $response_data = json_decode($json_data);
            return $response_data;
        }
    }

?>