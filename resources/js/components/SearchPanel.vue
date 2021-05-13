<template>
    <div class="search_panel" id="search_panel">
        <input
        :value="this.$parent.search_panel_input"
        class="input"
        placeholder="Поиск..."
        @focus="keyboard()"
        >
        <div id="myUL_wrapper">
        <div id="myUL" class="row" style="margin-top: 0.5vh;">
            <template v-for="store in filtered_stores">
                <div v-if="store.routes.length" class="col-2">
                    <div v-for="store_route in store.routes" :key="store_route.id" @click="SelectStoreRoute(store_route)" class="rl_st_item">
                        
                        <div class="rl_st_item_image" v-bind:style="{ 'background-image': 'url(' + store.logo + ')' }"></div>
                        
                        <div v-if="store.logo">
                            {{ store.title }}
                        </div>
                        <div v-else style="font-size: 3vh; position: absolute; top: 50%; transform: translateY(-50%); left: 0.5vh; right: 0.5vh;">
                            {{ store.title }}
                        </div>
                        
                    </div>
                </div>
            </template>
        </div>
        </div>
        <SimpleKeyboard v-show="this.$parent.search_panel_keyboard" @onChange="onChange" @onKeyPress="onKeyPress" :input="this.$parent.search_panel_input"/>
    </div>
</template>

<script>
    import SimpleKeyboard from './SimpleKeyboard';

    export default {
        data() {
            return {
                stores: {},
                input: '',
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
                if (this.$parent.search_panel_input.trim() === '') {
                    return this.stores;
                } else {
                    return this.stores.filter(item => {
                        return item.title.toLowerCase().indexOf(this.$parent.search_panel_input.toLowerCase()) >= 0 ||
                               item.keywords.toLowerCase().indexOf(this.$parent.search_panel_input.toLowerCase()) >= 0;
                    });
                }
            }
        },
        methods: {
            onChange(input) {
                this.$parent.search_panel_input = input;
            },
            onKeyPress(button) {
                //console.log("button", button);
            },
            SelectStoreRoute(store_route) {
                this.$parent.search_panel_input = '',
                this.$parent.search_panel_keyboard = false,
                this.$emit('search_panel_store_route', {
                    search_panel_store_route: store_route,
                })
            },
            keyboard() {
                this.$parent.search_panel_keyboard = true
            }
        },
        components: {
            SimpleKeyboard
        }
    }
</script>