@extends('layouts.app')
@section('content')
    <section>
        <div class="baner">
            <div class="container">
                <div class="row justify-content-center">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div  class="carousel-item active">
                                <a href="/pod_categorys/36"><img  class="d-block w-100 lazy" src="{{asset('/img/')}}/baner3.png" alt="First slide"></a>
                        </div>
                        <div  class="carousel-item">
                            <a  href="/pod_categorys/35"><img  class="d-block w-100 lazy" src="{{asset('/img/')}}/baner5.png" alt="Second slide"></a>
                        </div>
                        <div  class="carousel-item">
                            <a  href="/pod_categorys/107"><img  class="d-block w-100 lazy" src="{{asset('/img/')}}/Tussock3.png" alt="Third slide"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                        <div class="Items_Back">
                            <div class="recommended_items">
                                <h3 class="title text-center">Рекомендуемые товары</h3>
                                <div class="cycle-slideshow" data-cycle-fx=carousel data-cycle-timeout=5000 data-cycle-carousel-visible=3 data-cycle-carousel-fluid=true data-cycle-slides="div.item" data-cycle-prev="#prev" data-cycle-next="#next">
                                    <div class="row justify-content-center ">

                                        @foreach ($sliderProductes as $sliderItem)

                                        <div class="item">
                                            <div class="col-12">
                                                <div class="product-image-wrapper">
                                                    <div class="single-products">
                                                        <div class="productinfo text-center">

                                                            @if ($sliderItem -> discount == 1)

                                                                <span class="discount_date">{{$sliderItem -> discount_date}}</span>

                                                            @endif

                                                            @if ($sliderItem -> discount == 0)

                                                                <span class="discount_none"></span>
                                                            @endif

                                                            <div class="row justify-content-center ">
                                                                <a href="/product/{{$sliderItem -> id}}"><img class="lazy" src="{{asset('img/products')}}/{{$sliderItem -> id}}.jpg" width="auto" height="215,783" alt="" /></a>
                                                            </div>
                                                            <div class="row justify-content-center " >


                                                        </div>
                                                                <p><a class="main-goods__title" style="white-space: normal;" href="/product/{{$sliderItem -> id}}">{{$sliderItem -> name_site}}</a></p>
                                                                <div class="But_add" >
                                                                    <div class="row justify-content-center">
                                                                        <div class="row justify-content-center " >

                                                                           @if ($sliderItem -> discount)

                                                                            <div class="g-price-old-uah_s">{{$sliderItem ->last_price}}<span class="g-price-old-uah-sign"> грн</span></div>

                                                                           @endif

                                                                            <h5 class="prics">{{$sliderItem -> price}} грн</h5>
                                                                        </div>
                                                                        <a href="/add_product/{{$sliderItem ->id}}/1" class="btn btn-default add-to-cart" data-id="{{$sliderItem ->id}}"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                                                    </div>
                                                                </div>

                                                                @if ($sliderItem -> is_new)

                                                                    <img  src="{{asset('img/new.png')}}" class="new_1" alt="" />

                                                                @endif

                                                                @if ($sliderItem -> discount)

                                                                    <span class="product__discount">-{{$sliderItem -> discount_num}}%</span>

                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach

                                    </div>
                                </div>
                            <div class="last_items">
                                <h3 class="title text-center">Новые товары</h4>
                        <div class="row justify-content-center ">

                    @foreach ($latestProducts as $product)

                        <div class="col-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">

                                        @if ($product ->discount == 1)

                                            <span class="discount_date">{{$product ->discount_date}}</span>

                                        @endif

                                        @if ($product -> discount == 0)

                                            <span class="discount_none"></span>

                                        @endif

                                        <div class="row justify-content-center ">
                                            <a href="/product/{{$product ->id}}">  <img class="lazy" src="{{asset('/img/products')}}/{{$product ->id}}.jpg" width="auto" height="215,783" alt="" /></a>
                                        </div>

                                        @if ($product ->is_new)

                                             <img  src="{{asset('img/new.png')}}" class="new" alt="" />

                                        @endif
                                        @if ($product ->discount)

                                            <span class="product__discount">-{{$product ->discount_num}}%</span>

                                        @endif
                                        <div class="row justify-content-center">
                                            </div>
                                            <div class="Text_block" >
                                                <p><a class="main-goods__title" href="/product/{{$product ->id}}">{{$product ->name_site}}</a></p>
                                            </div>
                                        <div class="But_add">
                                            <div class="row justify-content-center">
                                                <div class="row justify-content-center">

                                                    @if ($product ->discount)

                                                    <div class="g-price-old-uah">{{$product ->last_price}}<span class="g-price-old-uah-sign"> грн</span></div>

                                                    @endif

                                                <h5 class="pric">{{$product ->price}} грн</h5>
                                                </div>
                                                <a href="/add_product/{{$product ->id}}/1" class="btn btn-default add-to-cart" data-id="{{$product ->id}}"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                          @endforeach
                                  </div>
                               </div>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
