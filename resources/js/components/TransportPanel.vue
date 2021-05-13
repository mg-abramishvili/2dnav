<template>
    <div class="transport_panel">
        <button v-show="this.$parent.transport_panel" @click="home_panel_button()" class="back_button">Назад</button>
        <p v-show="this.$parent.transport_panel" class="cat_header">Как уехать</p>
        <div style="margin-top: 3vh; font-size: 3vh;">
            <p><strong>Автобус</strong></p>
            <ul>
                <li>4</li>
                <li>5</li>
                <li>5A</li>
            </ul>
            <hr>
            <p><strong>Троллейбус</strong></p>
            <ul>
                <li>1</li>
                <li>3</li>
                <li>7А</li>
                <li>7Б</li>
            </ul>
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