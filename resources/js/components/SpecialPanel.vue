<template>
    <div class="special_panel">
        <div id="myUL" class="row" style="margin-top: 0.5vh;">
            <div v-for="special in specials" :key="special.id" class="col-4">
                <div v-for="store in special.stores" :key="store.id">
                    <div v-for="store_route in store.routes" :key="store_route.id" @click="SelectStoreRoute(store_route)" class="rl_st_item">
                        <div class="rl_st_item_image" v-bind:style="{ 'background-image': 'url(' + special.image + ')' }"></div>
                        {{ store.title }}
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
                specials: {},
            }
        },
        created() {
            fetch('/api/specials/')
                .then(response => response.json())
                .then(json => {
                    this.specials = json;
                });
        },
        computed: {
        },
        methods: {
            SelectStoreRoute(store_route) {
                this.input = '',
                this.$emit('special_panel_store_route', {
                    special_panel_store_route: store_route,
                })
            }
        },
        components: {
        }
    }
</script>