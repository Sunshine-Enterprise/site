<?php

/*
$base = "http://localhost/";

header("Content-Type application/xml; charset=utf-8");
echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL;


echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">'.PHP_EOL;
for ($i=0; $i < 5; $i++) { 
  echo '<url>'.PHP_EOL;
  echo '<loc>'.$base.'</loc>'.PHP_EOL;
  echo '<changefreq>daily</changefreq'.PHP_EOL;
  echo '</url>'.PHP_EOL;
}
echo '<urlset>'.PHP_EOL;

//header("Content-Type: application/xml; charset=utf-8");
*/
$data_xml = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance”>';

$urls = ['pipe-foreman', 'concrete finisher', 'data-entry'];

foreach ($urls as $url ) {
  $date = date('c');
  $pr = '0.80';
  if($url = 'localhost') $pr = '1.00';

  $data_xml = 
  "<url>
    <loc>$url</loc>
    <lastmod>$date</lastmod>
    <priority>$pr</priority>
  </url>";

}
 
$data_xml .= '</urlset>';
$file = fopen('sitemap.xml', 'w');

fwrite($file, $data_xml);

/*

$query = "SELECT * FROM jobs";
$pages = query($query);

    # code...
    echo "<pre>";
  // print_r($pages);
    echo "</pre>";
foreach ($pages as $key) {


    echo '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        echo '<sitemap>'. PHP_EOL;
        print '<loc>https://www.seu-usa.com/job/'.$key['slug'].'</loc>'. PHP_EOL;
        echo '<loc>daily</>'.PHP_EOL;
        echo '<lastmod>daily</lastmod>'.PHP_EOL;
        echo '</sitemap>'.PHP_EOL;

echo '</sitemapindex>'.PHP_EOL;
    
}

*/

?>

