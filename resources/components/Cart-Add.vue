<template>

</template>

<script>
    import axios from "axios";

    export default {
        name: "Cart-Add"
    }
    const CartAdd = new Vue({
        el: '#Items_Back',
        data:
            {},
        methods:
            {
                Add(event) {
                    let $cart_count = this.$refs.cart_count.innerText;
                    let $total_price = this.$refs.total_price.innerText;

                    const $button = event.target;
                    const buttonID = $button.dataset.id;
                    const quantity = $button.dataset.quantity;

                    axios.post("/add_product/" + buttonID + "/" + quantity);

                    let price = document.getElementById("price_" + buttonID).innerText;
                    let $new_cart_count = parseInt($cart_count) + parseInt(quantity);
                    let $new_total_price = parseInt($total_price) + (parseInt(price) * parseInt(quantity));

                    this.$refs.cart_count.innerText = $new_cart_count;
                    this.$refs.total_price.innerText = $new_total_price;
                }
            }
    })
</script>

<style scoped>

</style>
