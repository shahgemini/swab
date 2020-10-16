<?php

    class Bot_executor_model extends CI_Model{
       
    public function fetchurl()
    {
        $q = "SELECT * FROM urlslist WHERE urlslist.Status = 1 OR urlslist.Status = 0";


        $res = $this->db->query($q);
        // print_r($res->result());
        // exit();
        echo json_encode($res->result());
    }


    public function api()
    {
        $q = "SELECT * FROM urlslist WHERE urlslist.Status = 1 OR urlslist.Status = 0";


        $res = $this->db->query($q);
        // print_r($res->result());
        // exit();
        echo json_encode($res->result());
    }



    public function execute_url($urlID)
    {
        $q = "SELECT * FROM urlslist WHERE UrlListID = $urlID";
        $r = $this->db->query($q);
        foreach ($r->result() as $key) {
            $type = $key->Type;
        }
        // echo json_encode($r->result());
        // exit();
        if ($type == "Facebook" || $type == "Twitter"|| $type == "Youtube") {
            //echo json_encode($r->result());
            //exit();
            $q = "SELECT urlslist.UrlListID,urlslist.Type,urlslist.InternalLinksToVisit, urlslist.Url,trafficsource.Source FROM urlslist INNER join trafficsource on urlslist.UrlListID = trafficsource.UrlListID WHERE urlslist.Status = 1 and urlslist.UrlListID = $urlID";
                $res = $this->db->query($q);
                echo json_encode($res->result());
        }
        else if ($type == "Direct") {
            $q = "SELECT * FROM urlslist WHERE UrlListID = $urlID";
                        $res = $this->db->query($q);
            echo json_encode($res->result());
        }
        else{
         $q = "SELECT urlslist.UrlListID,urlslist.Type,urlslist.InternalLinksToVisit, urlslist.Url,trafficsource.Source, keywords.Keyword FROM urlslist INNER JOIN keywords on urlslist.UrlListID = keywords.UrlListID INNER join trafficsource on urlslist.UrlListID = trafficsource.UrlListID WHERE urlslist.Status = 1 and urlslist.UrlListID = $urlID";
                     $res = $this->db->query($q);
            echo json_encode($res->result());
        }

    }

    public function insert_internallink($id , $url , $stay)
    {
         
            $this->db->insert('internalurls',['UrlListID'=>$id, 'Url'=>$url,'Stay'=>$stay]); 
             
    }

public function start_date($urlID)
{

    $q = "UPDATE bots SET StartTime = NOW() WHERE UrlListID = $urlID";
    $q1 = "UPDATE urlslist SET Status = 2 WHERE UrlListID = $urlID";
    $this->db->query($q);
    $this->db->query($q1);
    
}
public function end_date($urlID,$ip)
{
    $q = "UPDATE bots SET EndTime = NOW() ,IP = '$ip' WHERE UrlListID = $urlID";
    $q1 = "UPDATE urlslist SET Status = 0 WHERE UrlListID = $urlID";
    $this->db->query($q);
    $this->db->query($q1);
}

// public function update_status($urlID, $status)
// {
//     $q = "UPDATE urlslist SET Status = $status WHERE UrlListID = $urlID";
//     $this->db->query($q);
// }



















    public function fetch_google_urls($Source , $keyword,$target_url, $MaxLinks,$xpath, $searchBox)
    {
       // require_once "selenium_driver/phpwebdriver/WebDriver.php";
      
                // echo $Source . ' '. $target_url .' '.$MaxLinks; 
                // return;

                $webdriver = new WebDriver("localhost", "4444");
                $webdriver->connect("firefox");                            
                $webdriver->get($Source);
                $element = $webdriver->findElementBy(LocatorStrategy::name, $searchBox);
                if ($element) {
                    $element->sendKeys(array($keyword) );
                    $element->submit();
                    sleep(10);
                   
                    $urls = $webdriver->findElementsBy(LocatorStrategy::xpath, $xpath);
                }
                sleep(4);


              foreach ($urls as $key) {
                if($key->getAttribute('href') != "")
                 {

                    $fetched_urls[] = $key;
                //   $this->db->insert('linkedurls',['Url' => $key->getAttribute('href'),'UrlListID' => $urlID ]);
                
                 } 
              }
               // $this->db->where('UrlListID', $urlID);            
               // $this->db->update('urlslist',['Status' => 0]);

                foreach ($fetched_urls as $fetch_uri) {
                    $map_url =  parse_url($fetch_uri->getAttribute("href"));
                    $ser_url = parse_url($target_url);
                    if (strcasecmp($map_url["host"], $ser_url["host"])==0) {
                       // echo "<pre>";
                        echo $fetch_uri->getAttribute("href");
                        $webdriver->get($fetch_uri->getAttribute("href"));
                        sleep(6);
                     
                        break;
                     //   echo  $url->Url;
                    }
                    
                }

                $visitedLinks = array();
                $i= 1;
            while($i <= $MaxLinks)
                {
                    sleep(3);
                        //$c_url = $webdriver->getCurrentUrl();
                    $internal_urls = array();
                        $internal_urls = $webdriver->findElementsBy(LocatorStrategy::tagName, "a");
                    $site = parse_url($target_url);
                    //print_r($site);
                   // return $internal_urls;
                    sleep(2);
                    // echo "<pre>";
                    // print_r($internal_urls);
                    // break;
                    $int_link = array();
                    $data = array();
                    foreach ($internal_urls as $key) 
                    {
                        //sleep(5);
                       
                            //THIS CHECK EXCLUDE EXTERNAL LINK
                            if (filter_var($key->getAttribute('href'), FILTER_VALIDATE_URL))
                            $int_link = parse_url($key->getAttribute('href'));
                            if(array_key_exists('host',$int_link))
                            if(strcasecmp($site['host'],$int_link['host'])==0)
                            {
                            
                                        $data[] = $key;
                                        //$links[] = $key->getAttribute("href");
                                   
                            }


                            
                    }

                    //return $links;
                    $FreshLink = array();
                    foreach ($data as $key) {
                        if (!in_array($key->getAttribute("href"), $visitedLinks)) {
                            $FreshLink[] = $key;
                           
                            //echo "Got Link";
                        }
                    }

                    if (empty($FreshLink)) {
                            return $log;
                        }
                        

                        $ind = array_rand($FreshLink);
                        //echo $data[$ind]->getAttribute('href');
                      
                       

                        sleep(4);
                        $FreshLink[$ind]->click();
                        
                        $time = rand(30,45);
                        sleep(10);
                        $log[] =  $webdriver->getCurrentUrl();
                        sleep(4);
                        // $log["Stay"] = $time;
                        $visitedLinks[] = $webdriver->getCurrentUrl();
                        $i++;

                }
      
        
    
            //    $log[] = "END";
            return $log;
         
        }



    public function fetch_baidu_urls($Source , $keyword,$target_url, $MaxLinks,$xpath, $searchBox)
    {
       // require_once "selenium_driver/phpwebdriver/WebDriver.php";
      
                 // echo $Source . ' '. $target_url .' '.$MaxLinks; 
                 // return;

                $webdriver = new WebDriver("localhost", "4444");
                $webdriver->connect("firefox");                            
                $webdriver->get($Source);
                $element = $webdriver->findElementBy(LocatorStrategy::name, $searchBox);
                if ($element) {
                    $element->sendKeys(array($keyword) );
                    $element->submit();
                    sleep(10);
                   
                    $urls = $webdriver->findElementsBy(LocatorStrategy::xpath, $xpath);
                }
                sleep(10);


              foreach ($urls as $key) {
                if($key->getAttribute('href') != "")
                 {
                    echo "<pre>";
                    //$u = (get_headers($key->getAttribute("href")));
                    // $headers = @get_headers($key->getAttribute("href"), 1 );
                    // $u = $headers['Location'];
                    //print_r($u);
                    $fetched_urls[] = $key;
                //   $this->db->insert('linkedurls',['Url' => $key->getAttribute('href'),'UrlListID' => $urlID ]);
                
                 } 
              }
              echo "target<br>";
              print_r(parse_url($target_url));
              //return;
               // $this->db->where('UrlListID', $urlID);            
               // $this->db->update('urlslist',['Status' => 0]);

                foreach ($fetched_urls as $fetch_uri) {
                    // echo "FORRRRRRRR<br>";
                    //     echo $fetch_uri->getText();                    
                    // echo "<br>FORRRRRRRR<br>";
                    $headers = @get_headers($fetch_uri->getAttribute("href"), 1 );
                    $u = $headers['Location'];

                    if (filter_var($u, FILTER_VALIDATE_URL)){

                    $map_url =  parse_url($u);
                    // echo "<pre>";
                    // print_r($map_url);
                    $ser_url = parse_url($target_url);
                    if (strcasecmp($map_url["host"], $ser_url["host"])==0) {
                       echo "<pre>";
                       echo "FINDDDD";
                        //echo $fetch_uri->getAttribute("href");
                        //$fetch_uri->click();
                        $webdriver->get($fetch_uri->getAttribute("href"));
                        sleep(6);
                     
                        break;
                     //   echo  $url->Url;
                    }
                }
                    
                }
               // return;
                $visitedLinks = array();
                $i= 1;
                $log = array();
            while($i <= $MaxLinks)
                {
                    sleep(3);
                        //$c_url = $webdriver->getCurrentUrl();
                    $internal_urls = array();
                        $internal_urls = $webdriver->findElementsBy(LocatorStrategy::tagName, "a");
                    $site = parse_url($target_url);
                    //print_r($site);
                   // return $internal_urls;
                    sleep(2);
                    // echo "<pre>";
                    // print_r($internal_urls);
                    // break;
                    $int_link = array();
                    $data = array();
                    foreach ($internal_urls as $key) 
                    {
                        //sleep(5);
                       
                            //THIS CHECK EXCLUDE EXTERNAL LINK
                            if (filter_var($key->getAttribute('href'), FILTER_VALIDATE_URL))
                            $int_link = parse_url($key->getAttribute('href'));
                            if(array_key_exists('host',$int_link))
                            if(strcasecmp($site['host'],$int_link['host'])==0)
                            {
                            
                                        $data[] = $key;
                                        //$links[] = $key->getAttribute("href");
                                   
                            }


                            
                    }

                    //return $links;
                    $FreshLink = array();
                    foreach ($data as $key) {
                        if (!in_array($key->getAttribute("href"), $visitedLinks)) {
                            $FreshLink[] = $key;
                           
                            //echo "Got Link";
                        }
                    }

                    if (empty($FreshLink)) {
                            return $log;
                        }
                        

                        $ind = array_rand($FreshLink);
                        //echo $data[$ind]->getAttribute('href');
                      
                       

                        sleep(4);
                        $FreshLink[$ind]->click();
                        
                        $time = rand(30,45);
                        sleep(10);
                        $log[] =  $webdriver->getCurrentUrl();
                        sleep(4);
                        // $log["Stay"] = $time;
                        $visitedLinks[] = $webdriver->getCurrentUrl();
                        $i++;

                }
      
        
    
            //    $log[] = "END";
            return $log;
         
        }





    public function fetch_youtube_urls($Source ,$target_url, $MaxLinks,$xpath)
    {
       // require_once "selenium_driver/phpwebdriver/WebDriver.php";
      
                // echo $Source . ' '. $target_url .' '.$MaxLinks; 
                // return;

                $webdriver = new WebDriver("localhost", "4444");
                $webdriver->connect("firefox");                            
                $webdriver->get($Source);
                sleep(5);
                // 'window.scrollTo(0, 600);'
                $script = "window.scrollTo(0, 600);";
                //$webdriver->moveTo("header",0,200);
                $webdriver->execute($script,array());
                sleep(5);
                $fetched_urls = $webdriver->findElementsBy(LocatorStrategy::xpath, $xpath);
                // if ($element) {
                //     $element->sendKeys(array($keyword) );
                //     $element->submit();
                //     sleep(10);
                   
                //     $urls = $webdriver->findElementsBy(LocatorStrategy::xpath, $xpath);
                // }
                //return;
                sleep(5);
                echo "YOTUBE";
               
                    foreach ($fetched_urls as $ur) {
                        echo "<pre>";
                        echo $ur->getText() ;
                    }

                echo "YOTUBE";
                //return;

              // foreach ($urls as $key) {
              //   $map_url =  parse_url($fetch_uri->getAttribute("href"));
              //   $ser_url = parse_url($target_url);
              //   if($key->getAttribute('href') != "" && )
              //    {

              //       $fetched_urls[] = $key;
              //   //   $this->db->insert('linkedurls',['Url' => $key->getAttribute('href'),'UrlListID' => $urlID ]);
                
              //    } 
              // }
               // $this->db->where('UrlListID', $urlID);            
               // $this->db->update('urlslist',['Status' => 0]);
                
                foreach ($fetched_urls as $fetch_uri) {
                    if (filter_var($fetch_uri->getText(), FILTER_VALIDATE_URL))
                    $map_url =  parse_url($fetch_uri->getText());
                    print_r($map_url);
                    $ser_url = parse_url($target_url);
                    if (strcasecmp($map_url["host"], $ser_url["host"])==0) {
                       // echo "<pre>";
                        // echo $fetch_uri->getAttribute("href");
                        // $webdriver->get($fetch_uri->getAttribute("href"));
                        $fetch_uri->click();
                        sleep(6);
                     
                        break;
                     //   echo  $url->Url;
                    }
                    
                }

                $visitedLinks = array();
                $i= 1;
            while($i <= $MaxLinks)
                {
                    sleep(3);
                        //$c_url = $webdriver->getCurrentUrl();
                    $internal_urls = array();
                        $internal_urls = $webdriver->findElementsBy(LocatorStrategy::tagName, "a");
                    $site = parse_url($target_url);
                    //print_r($site);
                   // return $internal_urls;
                    sleep(2);
                    // echo "<pre>";
                    // print_r($internal_urls);
                    // break;
                    $int_link = array();
                    $data = array();
                    foreach ($internal_urls as $key) 
                    {
                        //sleep(5);
                       
                            //THIS CHECK EXCLUDE EXTERNAL LINK
                            if (filter_var($key->getAttribute('href'), FILTER_VALIDATE_URL))
                            $int_link = parse_url($key->getAttribute('href'));
                            if(array_key_exists('host',$int_link))
                            if(strcasecmp($site['host'],$int_link['host'])==0)
                            {
                            
                                        $data[] = $key;
                                        //$links[] = $key->getAttribute("href");
                                   
                            }


                            
                    }

                    //return $links;
                    $FreshLink = array();
                    foreach ($data as $key) {
                        if (!in_array($key->getAttribute("href"), $visitedLinks)) {
                            $FreshLink[] = $key;
                           
                            //echo "Got Link";
                        }
                    }

                    if (empty($FreshLink)) {
                            return $log;
                        }
                        

                        $ind = array_rand($FreshLink);
                        //echo $data[$ind]->getAttribute('href');
                      
                       

                        sleep(4);
                        $FreshLink[$ind]->click();
                        
                        $time = rand(30,45);
                        sleep(10);
                        $log[] =  $webdriver->getCurrentUrl();
                        sleep(4);
                        // $log["Stay"] = $time;
                        $visitedLinks[] = $webdriver->getCurrentUrl();
                        $i++;

                }
      
        
    
            //    $log[] = "END";
            return $log;
         
        }




    public function fetch_facebook_urls($Source ,$target_url, $MaxLinks,$xpath)
    {
       // require_once "selenium_driver/phpwebdriver/WebDriver.php";
      
                // echo $Source . ' '. $target_url .' '.$MaxLinks; 
                // return;

                $webdriver = new WebDriver("localhost", "4444");
                $webdriver->connect("firefox");                            
                $webdriver->get($Source);
                sleep(5);
                // 'window.scrollTo(0, 600);'
                $script = "window.scrollTo(0, 600);";
                //$webdriver->moveTo("header",0,200);
                $webdriver->execute($script,array());
                sleep(5);
                $fetched_urls = $webdriver->findElementsBy(LocatorStrategy::tagName, "a");
                // if ($element) {
                //     $element->sendKeys(array($keyword) );
                //     $element->submit();
                //     sleep(10);
                   
                //     $urls = $webdriver->findElementsBy(LocatorStrategy::xpath, $xpath);
                // }
                //return;
                $i = 0;
                sleep(10);
                echo "YOTUBE";
               
                    foreach ($fetched_urls as $ur) {
                        echo "<pre>";
                        echo  ++$i.' '.$ur->getText() ;
                    }

                echo "YOTUBE";
                //return;

              // foreach ($urls as $key) {
              //   $map_url =  parse_url($fetch_uri->getAttribute("href"));
              //   $ser_url = parse_url($target_url);
              //   if($key->getAttribute('href') != "" && )
              //    {

              //       $fetched_urls[] = $key;
              //   //   $this->db->insert('linkedurls',['Url' => $key->getAttribute('href'),'UrlListID' => $urlID ]);
                
              //    } 
              // }
               // $this->db->where('UrlListID', $urlID);            
               // $this->db->update('urlslist',['Status' => 0]);
                 
                foreach ($fetched_urls as $fetch_uri) {
                    if (filter_var($fetch_uri->getText(), FILTER_VALIDATE_URL))
                    {
                    $map_url =  parse_url($fetch_uri->getText());
                    //print_r($map_url);
                   
                    $ser_url = parse_url($target_url);
                    if (strcasecmp($map_url["host"], $ser_url["host"])==0) {
                        echo "<pre>";
                        echo "INTERNAL LOOP";
                        echo $fetch_uri->getText();
                        $webdriver->get($fetch_uri->getAttribute("href"));
                        //$fetch_uri->click();
                        sleep(6);
                        
                        break;
                     //   echo  $url->Url;
                    }
                   }
                }

                //return;
                $visitedLinks = array();
                $i= 1;
                $c_url = $webdriver->getCurrentUrl();
                $site = parse_url($c_url);
            while($i <= $MaxLinks)
                {
                    sleep(3);
                        //$c_url = $webdriver->getCurrentUrl();
                    $internal_urls = array();
                        $internal_urls = $webdriver->findElementsBy(LocatorStrategy::tagName, "a");
                    //$site = parse_url($target_url);
                    //print_r($site);
                   // return $internal_urls;
                    sleep(2);
                    // echo "<pre>";
                    // print_r($internal_urls);
                    // break;
                    $int_link = array();
                    $data = array();
                    foreach ($internal_urls as $key) 
                    {
                        //sleep(5);
                       
                            //THIS CHECK EXCLUDE EXTERNAL LINK
                            if (filter_var($key->getAttribute('href'), FILTER_VALIDATE_URL))
                            $int_link = parse_url($key->getAttribute('href'));
                            if(array_key_exists('host',$int_link))
                            if(strcasecmp($site['host'],$int_link['host'])==0)
                            {
                            
                                        $data[] = $key;
                                        //$links[] = $key->getAttribute("href");
                                   
                            }


                            
                    }

                    //return $links;
                    $FreshLink = array();
                    foreach ($data as $key) {
                        if (!in_array($key->getAttribute("href"), $visitedLinks)) {
                            $FreshLink[] = $key;
                           
                            //echo "Got Link";
                        }
                    }

                    if (empty($FreshLink)) {
                            return $log;
                        }
                        

                        $ind = array_rand($FreshLink);
                        //echo $data[$ind]->getAttribute('href');
                      
                       

                        sleep(4);
                        $FreshLink[$ind]->click();
                        
                        $time = rand(30,45);
                        sleep(10);
                        $log[] =  $webdriver->getCurrentUrl();
                        sleep(4);
                        // $log["Stay"] = $time;
                        $visitedLinks[] = $webdriver->getCurrentUrl();
                        $i++;

                }
      
        
    
            //    $log[] = "END";
            return $log;
         
        }





    public function fetch_twitter_urls($Source ,$target_url, $MaxLinks,$xpath)
    {
       // require_once "selenium_driver/phpwebdriver/WebDriver.php";
      
                // echo $Source . ' '. $target_url .' '.$MaxLinks; 
                // return;

                $webdriver = new WebDriver("localhost", "4444");
                $webdriver->connect("firefox");                            
                $webdriver->get($Source);
                sleep(5);
                // 'window.scrollTo(0, 600);'
                $script = "window.scrollTo(0, 600);";
                //$webdriver->moveTo("header",0,200);
                $webdriver->execute($script,array());
                sleep(5);
                $fetched_urls = $webdriver->findElementsBy(LocatorStrategy::tagName, "a");
                // if ($element) {
                //     $element->sendKeys(array($keyword) );
                //     $element->submit();
                //     sleep(10);
                   
                //     $urls = $webdriver->findElementsBy(LocatorStrategy::xpath, $xpath);
                // }
                //return;
                $i = 0;
                sleep(10);
                echo "YOTUBE";
               
                    foreach ($fetched_urls as $ur) {
                        echo "<pre>";
                        echo  ++$i.' '.$ur->getText() ;
                    }

                echo "YOTUBE";
                //return;

              // foreach ($urls as $key) {
              //   $map_url =  parse_url($fetch_uri->getAttribute("href"));
              //   $ser_url = parse_url($target_url);
              //   if($key->getAttribute('href') != "" && )
              //    {

              //       $fetched_urls[] = $key;
              //   //   $this->db->insert('linkedurls',['Url' => $key->getAttribute('href'),'UrlListID' => $urlID ]);
                
              //    } 
              // }
               // $this->db->where('UrlListID', $urlID);            
               // $this->db->update('urlslist',['Status' => 0]);
                 
                foreach ($fetched_urls as $fetch_uri) {
                    if (filter_var($fetch_uri->getAttribute("data-expanded-url"), FILTER_VALIDATE_URL))
                    {
                    $map_url =  parse_url($fetch_uri->getText());
                    //print_r($map_url);
                   
                    $ser_url = parse_url($target_url);
                    if (strcasecmp($map_url["host"], $ser_url["host"])==0) {
                        echo "<pre>";
                        echo "INTERNAL LOOP";
                        echo $fetch_uri->getAttribute("data-expanded-url");
                        $webdriver->get($fetch_uri->getAttribute("data-expanded-url"));
                        //$fetch_uri->click();
                        sleep(6);
                        
                        break;
                     //   echo  $url->Url;
                    }
                   }
                }

                //return;
                $visitedLinks = array();
                $i= 1;
                $c_url = $webdriver->getCurrentUrl();
                $site = parse_url($c_url);
            while($i <= $MaxLinks)
                {
                    sleep(3);
                        //$c_url = $webdriver->getCurrentUrl();
                    $internal_urls = array();
                        $internal_urls = $webdriver->findElementsBy(LocatorStrategy::tagName, "a");
                    //$site = parse_url($target_url);
                    //print_r($site);
                   // return $internal_urls;
                    sleep(2);
                    // echo "<pre>";
                    // print_r($internal_urls);
                    // break;
                    $int_link = array();
                    $data = array();
                    foreach ($internal_urls as $key) 
                    {
                        //sleep(5);
                       
                            //THIS CHECK EXCLUDE EXTERNAL LINK
                            if (filter_var($key->getAttribute('href'), FILTER_VALIDATE_URL))
                            $int_link = parse_url($key->getAttribute('href'));
                            if(array_key_exists('host',$int_link))
                            if(strcasecmp($site['host'],$int_link['host'])==0)
                            {
                            
                                        $data[] = $key;
                                        //$links[] = $key->getAttribute("href");
                                   
                            }


                            
                    }

                    //return $links;
                    $FreshLink = array();
                    foreach ($data as $key) {
                        if (!in_array($key->getAttribute("href"), $visitedLinks)) {
                            $FreshLink[] = $key;
                           
                            //echo "Got Link";
                        }
                    }

                    if (empty($FreshLink)) {
                            return $log;
                        }
                        

                        $ind = array_rand($FreshLink);
                        //echo $data[$ind]->getAttribute('href');
                      
                       

                        sleep(4);
                        $FreshLink[$ind]->click();
                        
                        $time = rand(30,45);
                        sleep(10);
                        $log[] =  $webdriver->getCurrentUrl();
                        sleep(4);
                        // $log["Stay"] = $time;
                        $visitedLinks[] = $webdriver->getCurrentUrl();
                        $i++;

                }
      
        
    
            //    $log[] = "END";
            return $log;
         
        }














    public function fetch_yahoo_urls($urls , $urlID )
    {
        //require_once "selenium_driver/phpwebdriver/WebDriver.php";
        foreach ($urls as $url) {
              
                
                $webdriver = new WebDriver("localhost", "4444");
                $webdriver->connect("firefox");                            
                $webdriver->get($url->Source);
                $element = $webdriver->findElementBy(LocatorStrategy::name, "p");
                if ($element) {
                    $element->sendKeys(array($url->Keyword) );
                    $element->submit();
                    sleep(5);
                   
                    $urls = $webdriver->findElementsBy(LocatorStrategy::xpath, "//div/div[@id='web']/ol/li//a");
                }
              foreach ($urls as $key) {
                if($key->getAttribute('href') != "")
                // {
                //   $this->db->insert('linkedurls',['Url' => $key->getAttribute('href'),'UrlListID' => $urlID ]);
                  echo "<pre>";  
                  echo($key->getAttribute('href'));
                 } 
              }
               // $this->db->where('UrlListID', $urlID);            
               // $this->db->update('urlslist',['Status' => 0]);
    
         
            }
// bing xpath   div[@id='b_content']//ol/li//a



    public function fetch_bing_urls($urls , $urlID )
    {
        $i =0;
        //require_once "selenium_driver/phpwebdriver/WebDriver.php";
        foreach ($urls as $url) {
              
                
                $webdriver = new WebDriver("localhost", "4444");
                $webdriver->connect("firefox");                            
                $webdriver->get($url->Source);
                $element = $webdriver->findElementBy(LocatorStrategy::name, "q");
                if ($element) {
                    $element->sendKeys(array($url->Keyword) );
                    $element->submit();
                    sleep(5);
                   
                    $urls = $webdriver->findElementsBy(LocatorStrategy::xpath, "//div//ol/li//a");
                }
              foreach ($urls as $key) {
                if($key->getAttribute('href') != "")
                // {
                //   $this->db->insert('linkedurls',['Url' => $key->getAttribute('href'),'UrlListID' => $urlID ]);
                  echo "<pre>";  
                  echo( ++$i.': '.$key->getAttribute('href'));
                 } 
              }
               // $this->db->where('UrlListID', $urlID);            
               // $this->db->update('urlslist',['Status' => 0]);
    
         
            }


//  biadu xpath //div[@id='content_left']//h3/a

   













    }?>