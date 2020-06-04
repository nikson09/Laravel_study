<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Rozetka;

use Symfony\Component\DomCrawler\Crawler;


class ParserController extends Controller
{
    public function getContent()
    {
        $link = "https://common-api.rozetka.com.ua/v2/fat-menu/full?front-type=xl&lang=ru";
        $client = new Client();
        $response = $client->request('GET', $link ,[
                                                    'headers' => [
                                                                     'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36',
                                                                     'Accept'     => 'application/json',
                                                                     'Access-Control-Allow-Credentials' => 'true',
                                                                     'Access-Control-Allow-Origin' => 'https://rozetka.com.ua',
                                                                     'Connection' => 'keep-alive',
                                                                     'Content-Encoding' => 'gzip',
                                                                     'Content-Type' =>  'application/json; charset=UTF-8',
                                                                  ]
                                                    ]);
        $htmls = json_decode($response->getBody()->getContents(),true);

        $categories = [];
        foreach($htmls as  $html )
        {
            foreach($html as $key => $cat )
            {
                 Rozetka::insert([
                                  "id" => $cat['id'],
                                  "title" => $cat['title'],
                                  "parent_id" => $cat['parent_id'],
                                  "manual_url" => $cat['manual_url'],
                                  "category_id" => $cat['category_id'],
                                  "top_category_id" => $cat['top_category_id']
                               ]);

                if(isset($cat['children']))
                {
                    foreach($cat['children'] as $child)
                    {
                        foreach($child as $child_category)
                        {
                            Rozetka::insert([
                                                "id" => $child_category['id'],
                                                "title" => $child_category['title'],
                                                "parent_id" => $child_category['parent_id'],
                                                "manual_url" => $child_category['manual_url'],
                                                "category_id" => $child_category['category_id'],
                                                "top_category_id" => $child_category['top_category_id']
                                           ]);
                            if(isset($child_category['children']))
                            {
                                foreach($child_category['children'] as $sub_child)
                                {
                                    Rozetka::insert([  = [
                                                        "id" => $sub_child['id'],
                                                        "title" => $sub_child['title'],
                                                        "manual_url" => $sub_child['manual_url'],
                                                        "parent_id" => $sub_child['category_id'],
                                                        "top_category_id" => $sub_child['top_category_id']
                                                   ]);
                                }
                            }
                        }
                    }
                }
            }
        }
         return redirect(route('main'));
    }
}
