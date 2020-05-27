@extends('layouts.app')
@section('content')
   <section>
       <div class="container">
           <div class="row">
               <div class="col-sm-3">
                   <div class="left-sidebar">
                       <h4 id="categor_name">Категории</h4>
                       <div class="panel-group category-products">
                           //вывод категории методом переборки масива
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
                           <div class="col-9 padding-right" >
                               <div class="features_items">

                               @foreach($category_name as $cat_img)

                                   <div class="baner_mug">
                                       <img class="lazy" src="{{asset('img/category')}}/{{$cat_img -> id}}.png" >

                                   </div>

                               @endforeach

                                   <div class="Items_Back ">

                                   @foreach($category_name as $cat_name)

                                      <h3  class="title text-center">{{$cat_name -> name}}</h3>

                                   @endforeach

                                      <div class="row justify-content-center ">

                                      @foreach ($products as $product)

                                         <div class="col-4">
                                             <div class="product-image-wrapper">
                                                 <div class="single-products">
                                                     <div class="productinfo text-center">

                                                     @if ($product -> discount == 1)
                                                         <span class="discount_date">{{$product -> discount_date}}</span>
                                                     @endif

                                                     @if ($product -> discount == 0)
                                                         <span class="discount_none"></span>
                                                     @endif

                                                         <div class="row justify-content-center ">
                                                             <a href="/product/{{$product -> id}}">  <img  class="lazy" src="{{asset('/img/products')}}/{{$product ->id}}.jpg"  width="auto" height="215,783" alt="" /></a>
                                                         </div>

                                                     @if ($product -> is_new)
                                                          <img  src="{{asset('img/new.png')}}" class="new" alt="" />
                                                     @endif

                                                     @if ($product -> discount)
                                                          <span class="product__discount">-{{$product -> discount_num}}%</span>
                                                     @endif

                                                         <div class="row justify-content-center">
                                                     </div>
                                                          <p><a class="main-goods__title" href="/product/{{$product ->id}}">{{$product ->name_site}}</a></p>

                                                            <div class="But_add" >
                                                                <div class="row justify-content-center">
                                                                    <div class="row justify-content-center">

                                                                    @if ($product -> discount)
                                                                        <div class="g-price-old-uah">{{$product -> last_price}}<span class="g-price-old-uah-sign"> грн</span></div>
                                                                    @endif

                                                                        <h5 id="price_{{$product ->id}}" class="pric">{{$product ->price}}грн</h5>
                                                                    </div>
                                                                    <a  v-on:click="Add" class="btn btn-default add-to-cart" data-quantity="1" data-id="{{$product ->id}}"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                                                </div>
                                                            </div>
                                                          </div>
                                                     </div>
                                                 </div>
                                             </div>

                                      @endforeach

                                   </div>
                                           {{$products->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
@endsection
