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




         <div class="col-9 padding-right">
                 <div  class="Items_Back">
                         <div  class="product-details"><!--product-details-->
                                  <div class="container">
                                             <div class="row">
                                                   <div class="col-5">
                                                            <div class="view-product">
                                                                           <div class="w_image_w img-thumbnail">
                                                                                     <div class="container"><div class="row justify-content-center">

         @foreach($products as $product)
                                                                                                  <img alt="{{$product -> name_site}}"  class="img_w" src="{{asset('img/products')}}/{{$product-> id}}.jpg" width="auto" height="270" alt="" />


                                                         </div>
                        </div>
                                                    </div>
                                                                                                   <div class="row justify-content-center">
                                                                                                                       </div>





         </div>

                                     </div>
                                     <div class="col-7">
                                         <div class="product-information"><!--/product-information-->

                                             <h2 >{{$product -> name_site}}</h2>

                                             <div  class="But_add" >
                                             <span><div class="row justify-content-center">

                                                     <span class="price">{{$product -> price}}</span><span  class="price">грн</span>
                                                     </div><div class="row justify-content-center"><span class="count">Кол-во: <button class="down btn btn-default checkout" >
                                                     <i class="fa fa-minus"></i></button><input type="text" class="quantity" id="quantity" value="1" data-min-value="1" data-max-value="10000" min="1"  pattern="[0-9]*"/><button class="up btn btn-default checkout" >
                                                     <i class="fa fa-plus"></i>
                                                 </button><a href="#" class="btn btn-default add-to-cart" data-quantity="1"  data-id="{{$product -> id}}" ><i class="fa fa-shopping-cart"></i>В корзину</a></span>

                                                     </span>

                </div>





                                                 </span>
         </div>
         </br><h5 class="text-sm-center">Характеристики товара:</h5>


                                         </div><!--/product-information-->
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
