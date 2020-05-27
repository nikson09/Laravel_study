<script>
    import {TheMask} from 'vue-the-mask'
    export default {
        components: {TheMask}
    }

    const app = new Vue({
        el: '#phone_div',
        data: {
            test: '111',
            check: '222',
        }
    });
</script>
