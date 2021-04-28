<template>
    <div class="category_panel">

        <div v-if="category_panel_index" class="category_panel_index">
            <div class="row">
                <div v-for="tag in tags" :key="tag.id" class="col-3">
                    <div class="category_item" @click="FilterCategory(tag)">
                        {{ tag.title }}
                    </div>
                </div>
            </div>
        </div>

        <div v-else class="category_panel_inner">
            <div class="row">
                <div v-for="store in stores" :key="store.id" class="col-3">
                    <div v-for="store_route in store.routes" :key="store_route.id" @click="SelectStoreRoute(store_route)" class="rl_st_item">
                        <div class="rl_st_item_image" v-bind:style="{ 'background-image': 'url(' + store_route.logo + ')' }"></div>
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
                tags: {},
                stores: {},
                category_panel_index: true,
            }
        },
        created() {
            fetch('/api/tags/')
                .then(response => response.json())
                .then(json => {
                    this.tags = json;
                });
        },
        computed: {
        },
        methods: {
            SelectStoreRoute(store_route) {
                this.category_panel_index = true;
                this.$emit('category_panel_store_route', {
                    category_panel_store_route: store_route,
                })
            },
            FilterCategory(tag) {
                this.category_panel_index = false;
                fetch(`/api/stores_category_filter/${tag.title}`)
                    .then(response => response.json())
                    .then(json => {
                        this.stores = json;
                    });
            },
        },
        components: {
        }
    }
</script>