<template>
    <div class="category_panel">
        <button v-show="this.$parent.category_panel_shortcut" @click="home_panel_button()" class="back_button">Назад</button>
        <p v-show="this.$parent.category_panel_shortcut" class="cat_header">{{ this.$parent.category_panel_shortcut_tag }}</p>
        <div class="category_panel_inner" style="height: 83vh;">
            <div class="row">
                <div v-for="store in stores" :key="store.id" class="col-3">
                    <div v-for="store_route in store.routes" :key="store_route.id" @click="SelectStoreRoute(store_route)" class="rl_st_item">
                        <div class="rl_st_item_image" v-bind:style="{ 'background-image': 'url(' + store.logo + ')' }"></div>
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
                stores: {},
                shortcut_title: '',
            }
        },
        created() {
            fetch(`/api/stores_category_filter/${this.$parent.category_panel_shortcut_tag}`)
                    .then(response => response.json())
                    .then(json => {
                        this.stores = json;
                    });
        },
        computed: {
        },
        methods: {
            SelectStoreRoute(store_route) {
                this.$parent.category_panel_index = true
                this.$emit('category_panel_store_route', {
                    category_panel_store_route: store_route,
                })
            },
            home_panel_button() {
                this.$parent.category_panel_shortcut = false
                this.$parent.banner_index = true
            }
        },
        components: {
        }
    }
</script>