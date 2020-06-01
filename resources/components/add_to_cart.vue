<script>

    import {TheMask} from 'vue-the-mask';
    import axios from 'axios';
    export default
        {
            name: "Add_cart",
            components: {TheMask}
        }

    const Add_cart = new Vue({
        el: '#app',
        data:
        {

        },
        props:
        {

        },
        watch:
        {

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

               axios.post("/add_product/" + buttonID + "/"+ quantity);

               let price = document.getElementById("price_" + buttonID).innerText;
               let $new_cart_count = parseInt($cart_count) + parseInt(quantity);
               let $new_total_price = parseInt($total_price) + (parseInt(price) * parseInt(quantity));

               this.$refs.cart_count.innerText = $new_cart_count;
               this.$refs.total_price.innerText = $new_total_price;
           },
           Plus_cart(buttonID)
           {
               let $cart_count = this.$refs.cart_count.innerText;
               let $total_prices = this.$refs.total_price.innerText;
               let price = document.getElementById("price_" + buttonID).innerText;
               let quantity = 1;
               let prices = document.getElementById("prices_" + buttonID).innerText;
               let $count = document.getElementById("cart_" + buttonID).innerText;


               axios.post("/plus_product/" + buttonID );

               let $new_count = parseInt($count) + quantity;
               let $new_prices = parseInt(prices) + (parseInt(price) * quantity);
               let $new_cart_count = parseInt($cart_count) + quantity;
               let $new_total_prices = parseInt($total_prices) + (parseInt(price) * quantity);

               document.getElementById("prices_" + buttonID).innerText = $new_prices;
               document.getElementById("cart_" + buttonID).innerText = $new_count;
               this.$refs.cart_count.innerText = $new_cart_count;
               this.$refs.total_price.innerText = $new_total_prices;
               this.$refs.total_prices.innerText = $new_total_prices;

           },
           Minus_cart(buttonID)
           {
               let $cart_count = this.$refs.cart_count.innerText;
               let $total_prices = this.$refs.total_price.innerText;
               let price = document.getElementById("price_" + buttonID).innerText;
               let quantity = 1;
               let prices = document.getElementById("prices_" + buttonID).innerText;
               let $count = document.getElementById("cart_" + buttonID).innerText;

               if (parseInt($count) === 1)
               {

               }
               else
               {
                   axios.post("/minus_product/" + buttonID);

                   let $new_count = parseInt($count) - quantity;
                   let $new_prices = parseInt(prices) - (parseInt(price) * quantity);
                   let $new_cart_count = parseInt($cart_count) - quantity;
                   let $new_total_prices = parseInt($total_prices) - (parseInt(price) * quantity);

                   document.getElementById("prices_" + buttonID).innerText = $new_prices;
                   document.getElementById("cart_" + buttonID).innerText = $new_count;
                   this.$refs.cart_count.innerText = $new_cart_count;
                   this.$refs.total_price.innerText = $new_total_prices;
                   this.$refs.total_prices.innerText = $new_total_prices;
               }
           },
            Add_to_cart(event)
           {
               let $cart_count = this.$refs.cart_count.innerText;
               let $total_price = this.$refs.total_price.innerText;

               const $button = event.target;
               const buttonID = $button.dataset.id;
               const quantity = this.$refs.quantity.value;
               let price = document.getElementById("price_" + buttonID).innerText;
               let $new_cart_count = parseInt($cart_count) + parseInt(quantity);
               let $new_total_price = parseInt($total_price) + (parseInt(price) * parseInt(quantity));

               axios.post("/add_product/" + buttonID + "/"+ quantity);

               this.$refs.cart_count.innerText = $new_cart_count;
               this.$refs.total_price.innerText = $new_total_price;
            },
            Plus(event)
            {
                let quantity = this.$refs.quantity.value;
                this.$refs.quantity.value = parseInt(quantity) + 1;
            },
            Minus(event)
            {
                let quantity = this.$refs.quantity.value;
                if (parseInt(quantity) === 1)
                {

                }
                else
                {
                    this.$refs.quantity.value = parseInt(quantity) - 1;
                }
            },
            Remove(buttonID)
            {
                let $cart_count = this.$refs.cart_count.innerText;
                let $total_prices = this.$refs.total_price.innerText;
                let prices = document.getElementById("prices_" + buttonID).innerText;
                let $count = document.getElementById("cart_" + buttonID).innerText;
                let item = document.getElementById("item_" + buttonID);
                let table_cart = document.getElementById("table_cart");
                let checkout_button = document.getElementById("checkout_button");
                let message = document.getElementById("message");

                axios.post("/delete_product/" + buttonID);

                item.remove();
                let $new_cart_count = parseInt($cart_count) - parseInt($count);
                let $new_total_price = parseInt($total_prices) - parseInt(prices);

                this.$refs.cart_count.innerText = $new_cart_count;
                this.$refs.total_price.innerText = $new_total_price;
                this.$refs.total_prices.innerText = $new_total_price;

                if(parseInt($new_total_price) === 0)
                {
                    checkout_button.remove();
                    table_cart.remove();
                    message.innerHTML = "Ваша корзина пуста";
                }

            }
        }
    })
</script>
