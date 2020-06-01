@extends('layouts.app')
    @section('content')
        <section>
               <div class="container">
                   <div class="row">
                       <div class="col-sm-3">
                           <div class="left-sidebar">
                               <h4 id="categor_name">Категории</h4>
                               <div class="panel-group category-products">

                                   @foreach($category as $cat)

                                   <div class="panel panel-default">
                                       <div class="panel-heading">
                                       <h6 class="panel-title">
                                       <a href="/categories/{{$cat->id}}">
                                       {{$cat->name}}</a></h6>
                                       </div>
                                   </div>

                                   @endforeach

                               </div>
                            </div>
                       </div>
                       <div class=" Register_shop   col-9 padding-right">
                           <h2 class="Trash_title  title text-center">Корзина</h2>
                           <div class="row justify-content-center">




                              @if (session('products_cart'))

                              <p id ="message">Вы выбрали такие товары:</p>
                              <table id="table_cart" class="table-bordered table-striped table">
                                <tr>
                                    <th>Изображение товара</th>
                                    <th>Код товара</th>
                                    <th>Название</th>
                                    <th>Количество, шт</th>
                                    <th></th>
                                    <th>Стомость, грн</th>
                                    <th></th>
                                </tr>

                                @foreach ($products as $product)

                                <tr id="item_{{$product['id']}}">
                                   <td>
                                       <div class="row justify-content-center">
                                           <a href="/product/{{$product['id']}}">  <img  src="{{asset('img/products')}}/{{$product['id']}}.jpg" width="auto" height="149,917" alt="" /></a>
                                       </div>
                                   </td>
                                   <td>{{$product['code']}}</td>
                                   <td>
                                       <a href="/product/{{$product['id']}}">
                                       {{$product['name_site']}}
                                       </a>
                                       </br>

                                       @if ($product['discount'])

                                       <div class="old_price">

                                          {{$product['last_price']}}грн
                                       </div>
                                       @endif

                                       <div class="coast">
                                            <span id="price_{{$product['id']}}">
                                        {{$product['price']}} грн</span>

                                        </div>
                                       </td>
                                       <td colspan="2">
                                           <div class="row justify-content-center">
                                                <button  v-on:click="Minus_cart({{$product['id']}})"  class="btn btn-default Ajax-minus" data-quantity="1"  data-id="{{$product['id']}}" ><i class="fa fa-minus"></i></button >
                                                <span  id="cart_{{$product['id']}}" ref="cart_{{$product['id']}}" class="quantity" id="quantity">{{session('products_cart')[$product['id']]}}</span>
                                                <button  v-on:click="Plus_cart({{$product['id']}})" class="btn btn-default Ajax-plus" data-quantity="1"  data-id="{{$product['id']}}" ><i class="fa fa-plus"></i></button >
                                           </div>
                                       </td>
                                       <td class="text-center"><span class="price_items" id="prices_{{$product['id']}}" ref="prices_{{$product['id']}}" data-price="">{{session('products_cart')[$product['id']] * $product['price']}}</span><span> грн</span></td>
                                       <td>
                                            <a class="btn btn-default checkout" v-on:click="Remove({{$product['id']}})">
                                            <i class="fa fa-trash"></i>
                                            </a>
                                       </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5">Общая стоимость:</td>
                                    <td colspan="2">
                                        <div class="row justify-content-center">
                                            <h4 ><span id="price_items_all"  ref="total_prices">{{$total}}</span></h4><h6>грн</h6>
                                        </div>
                                    </td>
                                </tr>
                           </table>
                           <div id="checkout_button" class="checkout_button">
                                <a class="btn btn-default checkout" href="/checkout/stripe"><i class="fa fa-shopping-cart"></i> Оформить заказ</a>
                           </div>

                                @else

                           <div class="trash_shop">
                                <p>Корзина пуста</p>
                              <div class="back_to_shop justify-content-center">
                                  <a class="btn btn-default checkout justify-content-center" href="/"><i class="fa fa-shopping-cart"></i> Вернуться к покупкам</a>
                              </div>

                              @endif
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>


    </section>
    @endsection
