<?php
    use Google\Cloud\Translate\TranslateClient;
    $projectId = 'translate-chatbo-1525555964305';


    $function = $_POST['function'];
    
    $log = array();
    
    switch($function) {
    
    	 case('getState'):
        	 if(file_exists('chat.txt')){
               $lines = file('chat.txt');
        	 }
             $log['state'] = count($lines); 
        	 break;	
    	
    	 case('update'):
        	$state = $_POST['state'];
        	if(file_exists('chat.txt')){
        	   $lines = file('chat.txt');
        	 }
        	 $count =  count($lines);
        	 if($state == $count){
        		 $log['state'] = $state;
        		 $log['text'] = false;
        		 
        		 }
        		 else{
        			 $text= array();
        			 $log['state'] = $state + count($lines) - $state;
        			 foreach ($lines as $line_num => $line)
                       {
        				   if($line_num >= $state){
                         $text[] =  $line = str_replace("\n", "", $line);
        				   }
         
                        }
        			 $log['text'] = $text; 
        		 }
        	  
             break;
    	 
    	 case('send'):
		  $nickname = htmlentities(strip_tags($_POST['nickname']));
			 $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
			  $message = htmlentities(strip_tags($_POST['message']));
		 if(($message) != "\n"){
        	
			 if(preg_match($reg_exUrl, $message, $url)) {
       			$message = preg_replace($reg_exUrl, '<a href="'.$url[0].'" target="_blank">'.$url[0].'</a>', $message);
				} 
             //use Google\Cloud\Translate\TranslateClient;
            // $projectId = 'translate-chatbo-1525555964305';
         fwrite(fopen('chat.txt', 'a'), "<span>". $nickname . "</span>" . "wow\n");
         $translate = new TranslateClient([
            'projectId' => $projectId
         ]);
            # Read from file, text to be translated
         $to_translate = fopen("chat.txt", "r");
         $text = fgets($to_translate);
         fclose($to_translate);
             //fwrite(fopen('toTranslate.txt', "w"), $message);

             

             
             
		 }
        	 break;
    	
    }
    
    echo json_encode($log);

?>