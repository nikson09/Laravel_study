<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\Rozetka;
use App\Rozetka_products;

use Symfony\Component\DomCrawler\Crawler;

class ParserItemController extends Controller
{

    public function getContent()
    {
        ini_set('max_execution_time', 900);
        $category_main = Rozetka::whereNotNull('parent_id')->orderBy('id', 'asc')->get();

        foreach($category_main as $categ)
        {
            if($categ['category_id'] == 0 )
            {

            }
            else {
            $link_first = "https://xl-catalog-api.rozetka.com.ua/v2/goods/get?";
            $client_first = new Client();
            $response_first = $client_first->request('GET', $link_first ,[
                                                                            'query' => [
                                                                                            'front-type' => 'xl',
                                                                                            'category_id' =>  $categ['category_id'],
                                                                                            'page' => "1",
                                                                                            'sort' => 'rank',
                                                                                            'lang' => 'ru',
                                                                                         ],
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
            $htmls_first[] = json_decode($response_first->getBody()->getContents(),true);
            foreach($htmls_first as $key => $html_first)
            {
                foreach($html_first as $cat_first)
                {
                    $count = $cat_first['total_pages'];
                    $i = 2;
                    while ($i <= $count)
                    {
                        $link_second = "https://xl-catalog-api.rozetka.com.ua/v2/goods/get?";
                        $client_second = new Client();
                        $response_second = $client_second->request('GET', $link_second ,[
                                                                                          'query' => [
                                                                                                          'front-type' => 'xl',
                                                                                                          'category_id' =>  $categ['category_id'],
                                                                                                          'page' => $i++,
                                                                                                          'sort' => 'rank',
                                                                                                          'lang' => 'ru',
                                                                                                     ],
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

                        $htmls_second[] = json_decode($response_second->getBody()->getContents(),true);
                    }

                }
                foreach($htmls_second as $html_second)
                {
                    foreach($html_second as $cat_second)
                    {
                        foreach($cat_second['ids'] as $product_id)
                        {
                            $link_third = "https://xl-catalog-api.rozetka.com.ua/v2/goods/getDetails?";
                            $client_third = new Client();

                            $response_third = $client_third->request('GET', $link_third ,[
                                                                                                  'query' => [
                                                                                                                  'front-type' => 'xl',
                                                                                                                  'product_ids' =>  $product_id,
                                                                                                                  'lang' => 'ru',
                                                                                                             ],
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

                            $htmls_third[] = json_decode($response_third->getBody()->getContents(),true);

                        }
                        foreach($htmls_third as $html_third)
                        {
                            foreach($html_third as $products)
                            {
                                foreach($products as $product)
                                {
                                    Rozetka_products::insert ([
                                                      "id" => $product['id'],
                                                      "title" => $product['title'],
                                                      "price" => $product['price'],
                                                      "old_price" => $product['old_price'],
                                                      "href" => $product['href'],
                                                      "category_id" => $product['category_id'],
                                                      "parent_category_id" => $product['parent_category_id'],
                                                      "image_main" => $product['image_main']
                                                      ]);
                                }
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
