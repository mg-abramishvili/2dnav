<template>
    <div class="category_panel">

        <div v-show="this.$parent.category_panel_index" class="category_panel_index">
            <div class="category_panel_inner" style="height: 85vh;" id="category_panel_inner">
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
        </div>

        <button v-show="!this.$parent.category_panel_index" @click="goToCatIndex()" class="back_button">Назад</button>
        <p v-show="!this.$parent.category_panel_index" class="cat_header">{{ tag_title }}</p>

        <div v-show="!this.$parent.category_panel_index" class="category_panel_inner" style="height: 78vh;">
            <div class="row">
                <div v-for="store in stores" :key="store.id" class="col-3">
                    <div v-for="store_route in store.routes" :key="store_route.id" @click="SelectStoreRoute(store_route)" class="rl_st_item">
                        <div class="rl_st_item_image" v-bind:style="{ 'background-image': 'url(' + store.logo + ')' }"></div>
                        {{ store.title }}
                        <span v-for="st_sch in store.schemes" :key="st_sch.id" style="color: #999">(уровень {{st_sch.title}})</span>
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
                tag_title: {},
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
                this.tag_title = '',
                this.$parent.category_panel_index = false
                fetch(`/api/stores_category_filter/${tag.title}`)
                    .then(response => response.json())
                    .then(json => {
                        this.stores = json;
                        this.tag_title = tag.title;
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