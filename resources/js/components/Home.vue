<template>
    <div>

        <div class="container">
            <div class="row">
                <div class="col-4-f">
                    <div class="sidebar">
                        <div class="sidebar-header">
                            logo
                        </div>
                        <div v-for="banner in banners" :key="banner.id" class="sidebar-banner-slide" v-bind:style="{ 'background-image': 'url(' + banner.adfile + ')' }">
                        </div>
                    </div>
                </div>
                <div class="col-8-f">
                    <div class="buttons-bar">
                        buttons
                    </div>
                    
                    <div class="map">
                        <img v-for="scheme in schemes" :key="scheme.id" :src="scheme.image" />
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
                schemes: [],
                banners: []
            }
        },
        created() {
            fetch('/api/schemes/')
                .then(response => response.json())
                .then(json => {
                    this.schemes = json;
                });
            fetch('/api/banners/')
                .then(response => response.json())
                .then(json => {
                    this.banners = json;
                });
        },
        components: {
        }
    }
</script>