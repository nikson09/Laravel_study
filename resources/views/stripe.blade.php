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

                                                <p>Для оформления заказа заполните форму. Наш менеджер свяжется с вами.</p>
  <div class="row justify-content-center">
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">

                                                  <li class="nav-item">
                                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Stipe Pay</a>

                                                  </li>
                                                  <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">PayPal Pay</a>
                                                  </li>


                                                </ul>
</div>
                                                <div class="tab-content" id="myTabContent">
                                                  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                  <div class="row justify-content-center">
                                                  <div class="login-form"><br/>
                                                                                                                                                                                                   <form action="/stripe_pay" method="post" id="payment-form">
                                                                                                                                                                                                   @csrf

                                                                                                                                                                                                  <div class="col-12">
                                                                                                                                                                                                      <label for="c1_contact_first_name">Фио<span class="req-star">*</span></label>

                                                                                                                                                                                                      <input class="form-control" type="text" name="name" placeholder="Фио" value=""/>
                                                                                                                                                                                                  </div>
                                                                                                                                                                                                  <div class="col-12">
                                                                                                                                                                                                      <label  for="c1_contact_first_name">Номер телефона<span class="req-star">*</span></label>

                                                                                                                                                                                                      <input id="phone" class="form-control" type="tel" name="phone" placeholder="Номер телефона" value=""/>
                                                                                                                                                                                                  </div>

                                                                                                                                                                                              <div class="col-12">
                                                                                                                                                                                                  <label  for="c1_contact_first_name">Область<span class="req-star">*</span></label>
                                                                                                                                                                                                  <input class="form-control" type="text" name="state" placeholder="Область" value=""/>
                                                                                                                                                                                              </div>
                                                                                                                                                                                          <div class="col-12">
                                                                                                                                                                                              <label  for="c1_contact_first_name">Город<span class="req-star">*</span></label>
                                                                                                                                                                                              <input class="form-control" type="text" name="city" placeholder="Город" value=""/>
                                                                                                                                                                                          </div>
                                                                                                                                                                                          <div class="col-12">
                                                                                                                                                                                              <label for="c1_contact_first_name">Комментарий к заказу</label>
                                                                                                                                                                                              <textarea class="text-form form-control" type="text" name="comment" placeholder="Сообщение" value=""/></textarea>
                                                                                                                                                                                          </div>
                                                                                                                                                                                          <div class="col-12">

                                                                                                                                                                                              <label for="c1_contact_first_name">Оплата картой</label>


                                                                                                                                                                                                  <!-- Stripe Elements Placeholder -->
                                                                                                                                                                                                  <div id="card-element"></div>
                                                                                                                                                                                          </div>
                                                                                                                                                                                          <br/>
                                                                                                                                                                                          <br/>



                                                                                                                                                   <div id="card-errors" role="alert"></div>

                                                                                                                                                                                          <input id='card-button' class="nab"  type="submit"  class="btn btn-default" value="Оформить" />
                                                                                                                                                                                                  </form>


                                                         </div>                                                                                                                                     </div></div>
                                                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab"><div class="content">
                                                  <table border="0" cellpadding="10" cellspacing="0" align="center"><tr><td align="center"></td></tr><tr><td align="center"><a href="{{ route('payment') }}" title="" onclick="javascript:window.open('https://www.paypal.com/in/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-200px.png" border="0" alt="PayPal Logo"></a></td></tr></table>

                                                                                                                                                        <a id="PayPal" href="{{ route('payment') }}" class="btn btn-success">Pay {{intval($total/26.74)}}$ from Paypal</a></div>
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
<script src="https://js.stripe.com/v3/"></script>
<script src="{{asset('js/client.js')}}"></script>

@endsection
@section('styles')

@endsection
