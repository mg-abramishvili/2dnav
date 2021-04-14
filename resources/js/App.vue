<template>
    <div class="wrapper">
        <keep-alive>
            <router-view :key="$route.path" />
        </keep-alive>
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
        components: {
        }
    }
</script>