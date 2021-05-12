<template>
    <div class="transport_panel">
        <button v-show="this.$parent.transport_panel" @click="home_panel_button()" class="back_button">Назад</button>
        <p v-show="this.$parent.transport_panel" class="cat_header">Как уехать</p>
        <div style="margin-top: 3vh;">
            <p>Здесь будет текст о том, как уехать из ТЦ.</p>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
            }
        },
        created() {
        },
        computed: {
        },
        methods: {
            home_panel_button() {
                this.$parent.transport_panel = false
                this.$parent.banner_index = true
            }
        },
        components: {
        }
    }
</script>