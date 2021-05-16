<template>
    <div class="transport_panel">
        <button v-show="this.$parent.transport_panel" @click="home_panel_button()" class="back_button">Назад</button>
        <p v-show="this.$parent.transport_panel" class="cat_header">Как уехать</p>
        <div style="margin-top: 3vh; font-size: 3vh;" v-html="transport.text">
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                transport: ''
            }
        },
        created() {
            axios
                .get('/api/transport/1')
                .then(response => (
                    this.transport = response.data
                ));
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