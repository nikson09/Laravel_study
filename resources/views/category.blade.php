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




<div class="col-9 padding-right" >
    <div class="features_items">
         <div class="Items_Back ">


                     <div class="row justify-content-center ">


                 @foreach ($products as $product)
                     <div class="col-4">
                         <div class="product-image-wrapper">
                             <div class="single-products">
                                 <div class="productinfo text-center">

                                     <div class="row justify-content-center ">
                                     <a href="/product/{{$product ->id}}">  <img  class="lazy" src="{{asset('/img/product/$product ->id')}}.jpg"  width="auto" height="215,783" alt="" /></a>
                                     </div>


                                     <div class="row justify-content-center " >



                                                     </div>
                                     <p>
                                         <a class="main-goods__title" href="/product/{{$product ->id}}">
                                             {{$product ->name}}
                                         </a>
                                     </p>




                                                                     </span>
         <div class="But_add" >
         <div class="row justify-content-center " >
         <div class="row justify-content-center " >

                                     <h5 class="pric">{{$product ->price}}грн</h5>

                                     </div>
                                     <a href="#" class="btn btn-default add-to-cart" data-id="{{$product ->id}}"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                     </div>
                                 </div>
                             </div>  </div>
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
