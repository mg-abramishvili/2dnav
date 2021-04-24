<template>
    <div class="search_panel">
        <input
        :value="input"
        class="input"
        @input="onInputChange"
        placeholder="Поиск..."
        >
        <div id="myUL" class="row" style="margin-top: 0.5vh;">
            <div v-for="store in filtered_stores" :key="store.id" class="col-3">
                <div v-for="store_route in store.routes" :key="store_route.id" @click="SelectStoreRoute(store_route)" class="rl_st_item">
                    <div class="rl_st_item_image" v-bind:style="{ 'background-image': 'url(' + store_route.logo + ')' }"></div>
                    {{ store.title }}
                </div>
            </div>
        </div>
        <SimpleKeyboard @onChange="onChange" @onKeyPress="onKeyPress" :input="input"/>
    </div>
</template>

<script>
    import SimpleKeyboard from './SimpleKeyboard';

    export default {
        data() {
            return {
                stores: {},
                input: ''
            }
        },
        created() {
            fetch('/api/stores/')
                .then(response => response.json())
                .then(json => {
                    this.stores = json;
                });
        },
        computed: {
            filtered_stores: function () {
                if (this.input.trim() === '') {
                    return this.stores;
                } else {
                    return this.stores.filter(item => {
                    return item.title.toLowerCase().indexOf(this.input.toLowerCase()) >= 0;
                    });
                }
            }
        },
        methods: {
            onChange(input) {
                this.input = input;
            },
            onKeyPress(button) {
                //console.log("button", button);
            },
            onInputChange(input) {
                this.input = input.target.value;
            },
            SelectStoreRoute(store_route) {
                this.input = '',
                this.$emit('search_panel_store_route', {
                    search_panel_store_route: store_route,
                })
            }
        },
        components: {
            SimpleKeyboard
        }
    }
</script>