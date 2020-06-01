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
                                                     <form action="/stripe_pay" method="post" id="payment-form">
                                                     @csrf
                                                    <div class="col-12">
                                                        <label for="c1_contact_first_name">Фио<span class="req-star">*</span></label>

                                                        <input class="form-control" type="text" name="userName" placeholder="Фио" value=""/>
                                                    </div>
                                                    <div class="col-12">
                                                        <label  for="c1_contact_first_name">Номер телефона<span class="req-star">*</span></label>

                                                        <input id="phone" v-mask="'(###)#######'" class="form-control" type="tel" name="phone" placeholder="Номер телефона" value=""/>
                                                    </div>

                                                <div class="col-12">
                                                    <label  for="c1_contact_first_name">Область<span class="req-star">*</span></label>
                                                    <input class="form-control" type="text" name="userOblast" placeholder="Область" value=""/>
                                                </div>
                                            <div class="col-12">
                                                <label  for="c1_contact_first_name">Город<span class="req-star">*</span></label>
                                                <input class="form-control" type="text" name="userCity" placeholder="Город" value=""/>
                                            </div>
                                            <div class="col-12">
                                                <label for="c1_contact_first_name">Комментарий к заказу</label>
                                                <textarea class="text-form form-control" type="text" name="userComment" placeholder="Сообщение" value=""/></textarea>
                                            </div>
                                            <div class="col-12">

                                                <label for="c1_contact_first_name">Оплата картой</label>


                                                    <!-- Stripe Elements Placeholder -->
                                                    <div id="card-element"></div>
                                            </div>
                                            <br/>
                                            <br/>



                                            <input id='card-button' class="nab"  type="submit" name="submit" class="btn btn-default" value="Оформить" />
                                                    </form>
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
<script>
// Create a Stripe client.
const stripe = Stripe('pk_test_Zngy131vA5v1DIpiV8XaRGXf00vm0VeNPb');



    const elements = stripe.elements();
    const cardElement = elements.create('card');

    cardElement.mount('#card-element');
    const cardHolderPhone = document.getElementById('phone');
    const cardButton = document.getElementById('card-button');

    cardButton.addEventListener('click', async (e) => {
        const { paymentMethod, error } = await stripe.createPaymentMethod(
            'card', cardElement, {
                billing_details: { phone: cardHolderPhone.value }
            }
        );

        if (error) {
            // Display "error.message" to the user...
        } else {
            // The card has been verified successfully...
        }
    });
</script>

@endsection
@section('styles')

@endsection
