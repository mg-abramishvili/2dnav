<template>
    <div class="category_panel">

        <div v-show="this.$parent.category_panel_index" class="category_panel_index">
            <div class="row">
                <template v-for="tag in tags">
                    <div v-if="tag.store.length" class="col-3">
                        <div class="category_item" @click="FilterCategory(tag)">
                            <div v-for="markimage in tag.markimages">
                                <div class="category_item_image" v-bind:style="{ 'background-image': 'url(' + markimage.image + ')' }"></div>
                            </div>
                            <p>{{ tag.title }}</p>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <div v-show="!this.$parent.category_panel_index" class="category_panel_inner">
            <button @click="goToCatIndex()">Назад</button>
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
                tags: {},
                stores: {},
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
                this.$parent.category_panel_index = true
                this.$emit('category_panel_store_route', {
                    category_panel_store_route: store_route,
                })
            },
            FilterCategory(tag) {
                this.stores = {},
                this.$parent.category_panel_index = false
                fetch(`/api/stores_category_filter/${tag.title}`)
                    .then(response => response.json())
                    .then(json => {
                        this.stores = json;
                    });
            },
            goToCatIndex() {
                this.$parent.category_panel_index = true
            }
        },
        components: {
        }
    }
</script>