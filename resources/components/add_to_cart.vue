<script>

    import axios from 'axios';
    export default
        {

        }

    var string = new Vue({
        el: '#app',
        data:
        {

        },
        props:{


        },
        methods:
        {
           Add(event)
           {
               let $cart_count = this.$refs.cart_count.innerText;
               let $total_price = this.$refs.total_price.innerText;

               const $button = event.target;
               const buttonID = $button.dataset.id;
               const quantity = $button.dataset.quantity;
               let price = document.getElementById("price_" + buttonID).innerText;
               let $new_cart_count = parseInt($cart_count) + parseInt(quantity);
               let $new_total_price = parseInt($total_price) + (parseInt(price) * parseInt(quantity));

               axios.post("/add_product/" + buttonID + "/"+ quantity);


               this.$refs.cart_count.innerText = $new_cart_count;
               this.$refs.total_price.innerText = $new_total_price;


           },
           Plus(buttonID)
           {
               let $cart_count = this.$refs.cart_count.innerText;
               let $total_prices = this.$refs.total_price.innerText;
               let price = document.getElementById("price_" + buttonID).innerText;
               let quantity = 1;
               let prices = document.getElementById("prices_" + buttonID).innerText;

               let $count = document.getElementById("cart_" + buttonID).innerText;

               let $new_count = parseInt($count) + quantity;

               let $new_prices = parseInt(prices) + (parseInt(price) * quantity);

               let $new_cart_count = parseInt($cart_count) + quantity;
               let $new_total_prices = parseInt($total_prices) + (parseInt(price) * quantity);

               axios.post("/plus_product/" + buttonID );

               document.getElementById("prices_" + buttonID).innerText = $new_prices;
               document.getElementById("cart_" + buttonID).innerText = $new_count;
               this.$refs.cart_count.innerText = $new_cart_count;
               this.$refs.total_price.innerText = $new_total_prices;
               this.$refs.total_prices.innerText = $new_total_prices;

           },
           Minus(buttonID)
           {
               let $cart_count = this.$refs.cart_count.innerText;
               let $total_prices = this.$refs.total_price.innerText;
               let price = document.getElementById("price_" + buttonID).innerText;
               let quantity = 1;
               let prices = document.getElementById("prices_" + buttonID).innerText;

               let $count = document.getElementById("cart_" + buttonID).innerText;

               let $new_count = parseInt($count) + quantity;

               let $new_prices = parseInt(prices) + (parseInt(price) * quantity);

               let $new_cart_count = parseInt($cart_count) + quantity;
               let $new_total_prices = parseInt($total_prices) + (parseInt(price) * quantity);

               axios.post("/minus_product/" + buttonID );

               document.getElementById("prices_" + buttonID).innerText = $new_prices;
               document.getElementById("cart_" + buttonID).innerText = $new_count;
               this.$refs.cart_count.innerText = $new_cart_count;
               this.$refs.total_price.innerText = $new_total_prices;
               this.$refs.total_prices.innerText = $new_total_prices;
           }

        }
    })
</script>
