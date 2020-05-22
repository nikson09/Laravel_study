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
<div class="Items_Back">




</div>
</div>
</div>
            </div>
</section>
@endsection
