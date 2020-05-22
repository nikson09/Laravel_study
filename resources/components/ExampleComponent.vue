<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example 222Component</div>
                    {{ this.test }}

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                test: '123',
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
