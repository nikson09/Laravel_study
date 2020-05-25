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
                                    <h6 class="panel-title"><a href="/categories/{{$cat->id}}">{{$cat->name}}</a></h6>
                                </div>
                            </div>

                            @endforeach

                        </div>
                    </div>
                </div>
                    <div class="col-9 padding-right">
                        <div  class="Items_Back">
                            <div  class="product-details"><!--product-details-->
                                <div class="container">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="view-product">

                                                @foreach($products as $product)

                                                    <div class="w_image_w img-thumbnail">

                                                        @if ($product -> discount)

                                                            <span class="discount_date_w">{{$product -> discount_date}}</span>

                                                        @endif
                                                        <div class="container"><div class="row justify-content-center">
                                                            <img alt="{{$product -> name_site}}"  class="img_w" src="{{asset('img/products')}}/{{$product-> id}}.jpg" width="auto" height="270" alt="" />

                                                            @if ($product -> discount)

                                                                <span class="product__discount">-{{$product -> discount_num}}%</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="row justify-content-center">
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="col-7">
                                    <div class="product-information">

                                     @if ($product -> is_new)

                                        <img  src="{{asset('img/new.jpg')}}" class="newarrival" alt="" />

                                     @endif

                                     <h2 >{{$product -> name_site}}</h2>
                                     <div  class="But_add" >
                                        <span>
                                        <div class="row justify-content-center">
                                            span class="price">{{$product -> price}}</span>
                                            <span  class="price">грн</span>
                                        </div>
                                        <div class="row justify-content-center">
                                            <span class="count">Кол-во: <button class="down btn btn-default checkout" >
                                                <i class="fa fa-minus"></i></button><input type="text" class="quantity" id="quantity" value="1" data-min-value="1" data-max-value="10000" min="1"  pattern="[0-9]*"/>
                                                <button class="up btn btn-default checkout" ><i class="fa fa-plus"></i></button>
                                                <a href="#" class="btn btn-default add-to-cart" data-quantity="1"  data-id="{{$product -> id}}" ><i class="fa fa-shopping-cart"></i>В корзину</a></span>

                                            </span>
                                        </div>
                                        </span>
                                     </div>
                                     </br>
                                     <h5 class="text-sm-center">Характеристики товара:</h5>
                                     <p class="text-left"><b class="item_info_p">Обьем:</b>{{$product -> size}}л</p>

                                     @if ($product -> category_id == 4)

                                        <p class="text-left"><b class="item_info_p">Цвет:</b>
                                            @if($product -> wine_color == 1)  <a  href='/sub_wine/1'>белое</a> @endif
                                            @if($product -> wine_color == 2)  <a  href='/sub_wine/2'>красное</a>  @endif
                                            @if($product -> wine_color == 3)  <a href='/sub_wine/3'>розовое</a> @endif
                                        </p>
                                </div>
                                    <p class="text-left"><b class="item_info_p">Тип:</b>
                                        @if($product -> wine_class == 1)  екстра сухое @endif
                                        @if($product -> wine_class == 2)  сухое @endif
                                        @if($product -> wine_class == 3)  полусухое @endif
                                        @if($product -> wine_class == 4)  полусладкое @endif
                                        @if($product -> wine_class == 5)  сладкое @endif
                                    </p>

                                    @endif

                                    <p class=" text-left"><b class="item_info_p">Крепость:</b>{{$product -> strength  }}%</p>




                            </div>
                        </div>
                    </div>
                    <div class="Description ">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="text-sm-center">Описание товара:</h5>
                                    <p  class="text-body text-sm-center">{{$product -> description}}</p>
                            </div>

                                        @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
