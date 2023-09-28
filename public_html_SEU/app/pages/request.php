<?php

/*
ApplicationID: e7e9f3c7-1718-467f-96f0-aca620911244
ObjectID: 0c880389-a22a-4511-9116-e1ce438a6bca
DirectoryID: 5648a481-1f15-4d30-a20d-0872b00e9a6e   

Client Secret (VALUE) bSG8Q~ss1hkn66Pg3HE8YRz6AhBiA01Vxiys8chs
*/

require '../vendor/autoload.php';
require '../vendor/autoload.php';


include '../app/pages/includes/header_general.php';

use Office365\Runtime\Auth\ClientCredential;
use Office365\SharePoint\ClientContext;
use Office365\Runtime\Auth\UserCredentials;

$credentials = new ClientCredential("{0c880389-a22a-4511-9116-e1ce438a6bca}", "{bSG8Q~ss1hkn66Pg3HE8YRz6AhBiA01Vxiys8chs}");

$ctx = (new ClientContext("{https://seurecruitment.sharepoint.com/sites/WebDevelopmentandIT}"))->withCredentials($credentials);
$sourceFileUrl = 'https://seurecruitment.sharepoint.com/sites/WebDevelopmentandIT/Lists/Candidates/AllItems.aspx';

$client = (new ClientContext("https://{seu-usa.com}.sharepoint.com"))->withCredentials($credentials);

/*

$credentials = new UserCredentials("{samf@seu-usa.com}", "{@Chris0131?}");
$ctx = (new ClientContext("{https://seurecruitment.sharepoint.com/sites/WebDevelopmentandIT}"))->withCredentials($credentials);

   $credentials = new UserCredentials("{samf@seu-usa.com}", "{@Chris0131?}");
   $ctx = (new ClientContext("{https://seurecruitment.sharepoint.com/sites/WebDevelopmentandIT}"))->withNtlm($credentials);


   
   $credentials = new ClientCredential("{0c880389-a22a-4511-9116-e1ce438a6bca}", "{bSG8Q~ss1hkn66Pg3HE8YRz6AhBiA01Vxiys8chs}");
   */

   $web = $client->getWeb();
   $list = $web->getLists()->getByTitle("{list-title}"); //init List resource
   $items = $list->getItems();  //prepare a query to retrieve from the
   $client->load($items);  //save a query to retrieve list items from the server
   $client->executeQuery(); //submit query to SharePoint server
   /** @var ListItem $item */
   foreach($items as $item) {
      echo '<pre>';
      print "Task: {$item->getProperty('Title')}\r\n";
      echo '</pre>';

   }
/*
require_once('SharePointAPI.php');
//require_once('SoapClientAuth.php');

$sp = new SharePointAPI('<samf@seu-usa.com>', '<@Chris031?>', '<https://seurecruitment.sharepoint.com/sites/WebDevelopmentandIT>');

$listContents = $sp->read('<Sharepoint>'); 

foreach($listContents as $item)
{
    var_dump($item);
}
*/

?>



<?php
  include '../app/pages/includes/footer.php';
?>