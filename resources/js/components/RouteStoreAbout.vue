<template>
    <div class="store_route_about">
        <div v-for="csr in current_store_route" :key="csr.id">
            <img :src="csr.logo">
            <h3>{{csr.title}}, 
                <span>Уровень
                </span>
            </h3>
            <ul>
                <li v-for="tag in csr.tags" :key="tag.id">{{tag.title}}</li>
            </ul>
            <hr>
            Режим работы:
                10:00-20:00
            <hr>
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
    /*watch: {
        current_store_route() {
            if(typeof this.current_store_route == 'object') {
                fetch(`/api/store/${this.current_store_route.stores[0].id}`)
                .then(response => response.json())
                .then(json => {
                    this.store_route = json;
                });
            }
        },
    }*/
}
</script>
