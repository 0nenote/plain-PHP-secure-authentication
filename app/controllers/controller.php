<?php

/**
 * Class Controller
 */
class Controller
{
    /**
     * Creates the model, now o
     * @param $model
     * @return mixed
     * @deprecated
     */
    public function model ($model)
    {
        trigger_error('This function has been deprecated', E_USER_DEPRECATED);
        require_once 'models/' . $model . '.php';
        return new $model();
    }

    /**
     * Renders the view
     * @param $view
     * @param array $data
     */
    protected function view ($view, $data = [])
    {
         require_once '../app/views/' . $view . '.php';
    }

    /**
     * Checks if the Captcha is correctly submitted
     * todo: return boolean on success or failure and throw exception on missing captcha
     * @return int
     */
    protected function validateInput ()
    {
		$secretKey = "6LclkxIUAAAAADdEiNz2c3TyTA3OBxrWuknjxHKY";
		
		if (isset($_POST['g-recaptcha-response']) )
		{
			$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . $secretKey . "&response=" . $_POST['g-recaptcha-response'] . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
			$data = json_decode($response);
		
				if (isset($data->success) && $data->success==true) {
					return 1;
				} else {
					return 2; // captcha was not checked
				}
			
		} else {
			return 3; // captcha is missing from site
		}
	}
    
}