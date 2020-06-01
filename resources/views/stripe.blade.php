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
// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>

@endsection
@section('styles')

@endsection
