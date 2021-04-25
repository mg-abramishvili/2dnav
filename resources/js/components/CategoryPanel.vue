<template>
    <div class="category_panel">
        <div class="row">
            <div v-for="tag in tags" :key="tag.id" class="col-3">
                <div class="category_item">
                    {{ tag.title }}
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
                input: ''
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
                this.input = '',
                this.$emit('category_panel_store_route', {
                    category_panel_store_route: store_route,
                })
            }
        },
        components: {
        }
    }
</script>