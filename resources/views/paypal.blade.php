@extends('layouts.app')

    @section('content')
            <section>
                <div id="container" class="container">
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
                                <div class="Register_shop   col-9 padding-right">
                                    <div class="features_items">
                                        <h2 class="Trash_title title text-center">Корзина</h2>
                                            <p>Выбрано товаров: {{$count}}, на сумму: {{$total}} грн.</p><br/>
                                        <div class="row justify-content-center">
                                            <div class="col-12">
                                                <div class="row justify-content-center">
                                                <p>Для оформления заказа заполните форму. Наш менеджер свяжется с вами.</p>

                                                <div class="login-form">
            <div class="content">


                <table border="0" cellpadding="10" cellspacing="0" align="center"><tr><td align="center"></td></tr><tr><td align="center"><a href="https://www.paypal.com/in/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/in/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-200px.png" border="0" alt="PayPal Logo"></a></td></tr></table>

                <a href="{{ route('payment') }}" class="btn btn-success">Pay {{intval($total/26.74)}}$ from Paypal</a>

            </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>

@endsection
@section('scripts')
@endsection
@section('styles')

@endsection
