<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

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
        mounted: function showInfo() {
            console.log(this.transport);
        },
        
        data() {
            return {
                transport: store.state,
            }
        },

        methods: {
            searchItem: function(value) {
                let newArr = this.transport.map(item => item.includes(value));
                console.log(newArr);
            }
        }

    }
</script>
