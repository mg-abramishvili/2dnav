<template>
    <div class="store_route_about">
        <img :src="store_route.logo">
        <h3>{{store_route.title}}, 
            <span>Уровень
                <template v-for="sch in store_route.schemes">
                    {{sch.title}}
                </template>
            </span>
        </h3>
        <ul>
            <li v-for="tag in store_route.tags" :key="tag.id">{{tag.title}}</li>
        </ul>
        <hr>
        Режим работы:
            10:00-20:00
        <hr>
        <div v-for="special in store_route.specials">
            <img :src="special.image" style="width:100%;">
        </div>
    </div>
</template>

<script>
export default {
    props: ['current_store_route'],
    data() {
        return {
            store_route: {}
        }
    },
    watch: {
        current_store_route() {
            if(typeof this.current_store_route == 'object') {
                fetch(`/api/store/${this.current_store_route.stores[0].id}`)
                .then(response => response.json())
                .then(json => {
                    this.store_route = json;
                });
            }
        },
    }
}
</script>
