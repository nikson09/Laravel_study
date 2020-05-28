<script>
    import {TheMask} from 'vue-the-mask'
    export default {
        name: "disable",
        components: {TheMask}
    }

    const apps = new Vue({
        el: '#Items_Back',
        data: {
            test: '111',
            check: '222',
        }
    });
</script>
