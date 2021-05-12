<template>
    <div class="container">
        <div class="row">

            <div class="col-4-f">
                <div class="sidebar">
                    <div class="sidebar-header">
                        <img :src="setup.logo" @click="home_panel_button()">
                    </div>
                    <div v-show="banner_index">
                        <div v-for="banner in banners" :key="banner.id" class="sidebar-banner-slide" v-bind:style="{ 'background-image': 'url(' + banner.adfile + ')' }"></div>
                    </div>
                </div>
            </div>

            <div class="col-8-f">
                <div class="buttons-bar">
                    <div class="row">
                        <div class="col-3">
                            <button @click="home_panel_button()">
                                <span>
                                    <img src="/img/urs/map.svg">
                                    <i>Карта</i>
                                </span>
                            </button>
                        </div>
                        <div class="col-3">
                            <button @click="search_panel_button()">
                                <span>
                                    <img src="/img/urs/search.svg">
                                    <i>Магазины</i>
                                </span>
                            </button>
                        </div>
                        <div class="col-3">
                            <button @click="category_panel_button()">
                                <span>
                                    <img src="/img/urs/cats.svg">
                                    <i>Категории</i>
                                </span>
                            </button>
                        </div>
                        <div class="col-3">
                            <button @click="special_panel_button()">
                                <span>
                                    <img src="/img/urs/sale.svg">
                                    <i>Скидки</i>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                
                <div>
                    <SearchPanel v-show="search_panel" @search_panel_store_route="onSearchPanelStoreRoute"/>

                    <CategoryPanel v-show="category_panel" @category_panel_store_route="onCategoryPanelStoreRoute"/>
                    <CategoryPanelShortcut v-if="category_panel_shortcut" @category_panel_store_route="onCategoryPanelStoreRoute"/>

                    <SpecialPanel v-show="special_panel" @special_panel_store_route="onSpecialPanelStoreRoute"/>

                    <RouteStoreAbout v-show="route_store_about_panel" v-bind:current_store_route="current_store_route.stores" />

                    <TransportPanel v-show="transport_panel"/>

                    <div class="col-12" style="padding: 2vh">

                        <div id="map" style="position: relative; width: 800px; height: 450px;">
                            <div v-for="scheme in schemes" :key="scheme.id" :id="'scheme_image_' + scheme.id" class="scheme_images">
                                <img v-show="scheme.id.toString() === current_floor" :src="scheme.image" style="width:800px; height:450px;">
                            </div>

                            <CurrentRoutePathSlide1 v-if="current_slide === 1" v-bind:current_store_route="current_store_route"/>
                            <CurrentRoutePathSlide2 v-if="current_slide === 2" v-bind:current_store_route="current_store_route"/>

                            <template v-for="store in stores">
                                <template v-for="s_scheme in store.schemes">
                                    <template v-if="s_scheme.pivot.scheme_id.toString() === current_floor">
                                            <template v-for="store_tag in store.tags">
                                                <template v-if="store_tag.title === 'банкоматы' && atms">
                                                    <span v-for="store_route in store.routes" @click="SelectStoreRoute_atms(store_route)" class="map-marker" v-bind:style="{ left: store.x_01 + 'px', top: store.y_01 + 'px', width: store.d_w + 'px', height: store.d_h + 'px' }">
                                                    <img :src="store.logo">
                                                    </span>
                                                </template>
                                                <template v-else-if="store_tag.title === 'забота об инвалидах' && invalids">
                                                    <span v-for="store_route in store.routes" @click="SelectStoreRoute_invalids(store_route)" class="map-marker" v-bind:style="{ left: store.x_01 + 'px', top: store.y_01 + 'px', width: store.d_w + 'px', height: store.d_h + 'px' }">
                                                    <img :src="store.logo">
                                                    </span>
                                                </template>
                                                <template v-else-if="store_tag.title === 'туалеты' && toilets">
                                                    <span v-for="store_route in store.routes" @click="SelectStoreRoute_toilets(store_route)" class="map-marker" v-bind:style="{ left: store.x_01 + 'px', top: store.y_01 + 'px', width: store.d_w + 'px', height: store.d_h + 'px' }">
                                                    <img :src="store.logo">
                                                    </span>
                                                </template>
                                                <template v-else>
                                                    <span v-for="store_route in store.routes" @click="SelectStoreRoute(store_route)" class="map-marker" v-bind:style="{ left: store.x_01 + 'px', top: store.y_01 + 'px', width: store.d_w + 'px', height: store.d_h + 'px' }">
                                                    <svg :viewBox="'0 0' + ' ' + store.d_w + ' ' + store.d_h">
                                                        <!--<text :x="store.d_w / 2" :y="store.d_h / 2" text-anchor="middle" alignment-baseline="middle" :font-size="store.d_w * 0.15" style="text-transform: uppercase; color: #fff;">{{store.title}}</text>-->
                                                    </svg>
                                                    </span>
                                                </template>
                                            </template>
                                        
                                    </template>
                                </template>
                            </template>
                        </div>

                        <button v-if="current_slide === 2" @click="PrevScheme(current_store_route)" class="prevnextbutton prev_button">
                            Начало маршрута
                        </button>
                        <button v-if="current_store_route.schemes2 && current_store_route.schemes2.length > 0 && current_slide === 1" @click="NextScheme(current_store_route)" class="prevnextbutton next_button">
                            Продолжить маршрут
                        </button>

                        <div class="floor_buttons">
                            <button v-for="scheme in schemes.slice().reverse()" :key="scheme.id" @click="SelectFloor(scheme)">
                                {{ scheme.title }}
                            </button>
                            <br>
                            <button>+</button>
                            <button>-</button>
                        </div>

                    </div>
                </div>

                <div class="buttons-bar buttons-bar-bottom">
                    <div class="row">
                        <div class="col-3">
                            <button @click="atms_button()">
                                <span>
                                    <img src="/img/urs/credit-card.svg">
                                    <i>Банкоматы</i>
                                </span>
                            </button>
                        </div>
                        <div class="col-3">
                            <button @click="entertainment_button()">
                                <span>
                                    <img src="/img/urs/credit-card.svg">
                                    <i>Развлечения</i>
                                </span>
                            </button>
                        </div>
                        <div class="col-3">
                            <button @click="toilets_button()">
                                <span>
                                    <img src="/img/urs/toilet1.svg">
                                    <i>Туалеты</i>
                                </span>
                            </button>
                        </div>
                        <div class="col-3">
                            <button @click="transport_button()">
                                <span>
                                    <img src="/img/urs/disabled-sign.svg">
                                    <i>Забота об <br>инвалидах</i>
                                </span>
                            </button>
                        </div>
                        <div class="col-3">
                            <button @click="transport_button()">
                                <span>
                                    <img src="/img/urs/transport.svg">
                                    <i>Как уехать</i>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import CurrentRoutePathSlide1 from './CurrentRoutePathSlide1';
    import CurrentRoutePathSlide2 from './CurrentRoutePathSlide2';
    import SearchPanel from './SearchPanel';
    import CategoryPanel from './CategoryPanel';
    import CategoryPanelShortcut from './CategoryPanelShortcut';
    import SpecialPanel from './SpecialPanel';
    import TransportPanel from './TransportPanel';
    import RouteStoreAbout from './RouteStoreAbout';

    export default {
        data() {
            return {
                setup: {},
                banners: [],
                schemes: [],
                stores: {},

                banner_index: true,
                search_panel: false,
                search_panel_input: '',
                search_panel_keyboard: false,
                category_panel: false,
                category_panel_index: true,
                category_panel_shortcut: false,
                category_panel_shortcut_tag: 'банкоматы',
                special_panel: false,
                route_store_about_panel: false,
                transport_panel: false,

                current_floor: '1',
                current_store_route: {},
                current_slide: 1,

                atms: false,
                invalids: false,
                toilets: false,
            }
        },
        created() {
            axios
                .get('/api/setup')
                .then(response => (
                    this.setup = response.data
                ));
            axios
                .get('/api/schemes')
                .then(response => (
                    this.schemes = response.data
                ));
            axios
                .get('/api/stores')
                .then(response => (
                    this.stores = response.data
                ));
            axios
                .get('/api/banners')
                .then(response => (
                    this.banners = response.data
                ));
        },
        computed: {
        },
        methods: {
            SelectStoreRoute(store_route) {
                this.search_panel = false
                this.atms = false
                this.invalids = false
                this.toilets = false
                this.banner_index = false
                this.route_store_about_panel = true
                this.current_store_route = store_route.id
                this.current_floor = store_route.scheme_id
                fetch(`/api/route/${this.current_store_route}`)
                .then(response => response.json())
                .then(json => {
                    this.current_store_route = json;
                    this.current_slide = 1;
                });
            },
            onSearchPanelStoreRoute(data) {
                this.search_panel = false
                this.atms = false
                this.invalids = false
                this.toilets = false
                this.banner_index = false
                this.route_store_about_panel = true
                this.current_store_route = data.search_panel_store_route.id;
                this.current_floor = data.search_panel_store_route.scheme_id
                fetch(`/api/route/${this.current_store_route}`)
                .then(response => response.json())
                .then(json => {
                    this.current_store_route = json;
                    this.current_slide = 1;
                });
            },
            onSpecialPanelStoreRoute(data) {
                this.special_panel = false
                this.atms = false
                this.invalids = false
                this.toilets = false
                this.banner_index = false
                this.route_store_about_panel = true
                this.current_store_route = data.special_panel_store_route.id;
                this.current_floor = data.special_panel_store_route.scheme_id
                fetch(`/api/route/${this.current_store_route}`)
                .then(response => response.json())
                .then(json => {
                    this.current_store_route = json;
                    this.current_slide = 1;
                });
            },
            onCategoryPanelStoreRoute(data) {
                this.category_panel = false
                this.category_panel_shortcut = false
                this.atms = false
                this.invalids = false
                this.toilets = false
                this.banner_index = false
                this.route_store_about_panel = true
                this.current_store_route = data.category_panel_store_route.id;
                this.current_floor = data.category_panel_store_route.scheme_id
                fetch(`/api/route/${this.current_store_route}`)
                .then(response => response.json())
                .then(json => {
                    this.current_store_route = json;
                    this.current_slide = 1;
                });
            },
            SelectFloor(scheme) {
                this.current_floor = scheme.id.toString();
                this.current_slide = 0;
            },
            PrevScheme(current_store_route) {
                this.current_floor = current_store_route.scheme_id
                this.current_slide = 1
            },
            NextScheme(current_store_route) {
                this.current_floor = current_store_route.scheme2_id
                this.current_slide = 2
            },
            home_panel_button() {
                this.category_panel = false;
                this.search_panel = false;
                this.special_panel = false;
                this.transport_panel = false;
                this.route_store_about_panel = false;
                this.banner_index = true;
                this.category_panel_index = true
                this.category_panel_shortcut = false
                this.current_slide = 0;
            },
            search_panel_button() {
                this.category_panel = false;
                this.special_panel = false;
                this.transport_panel = false;
                this.banner_index = false
                this.search_panel = true;
                this.search_panel_input = ''
                this.search_panel_keyboard = false
                this.category_panel_index = true
                this.category_panel_shortcut = false
                this.route_store_about_panel = false
                this.current_slide = 0;
            },
            category_panel_button() {
                this.search_panel = false;
                this.special_panel = false;
                this.transport_panel = false;
                this.banner_index = false
                this.category_panel = true;
                this.category_panel_shortcut = false
                this.route_store_about_panel = false
                this.category_panel_index = true
                this.current_slide = 0;
            },
            special_panel_button() {
                this.search_panel = false;
                this.category_panel = false;
                this.transport_panel = false;
                this.banner_index = false
                this.special_panel = true;
                this.category_panel_index = true
                this.category_panel_shortcut = false
                this.route_store_about_panel = false
                this.current_slide = 0;
            },
            atms_button() {
                this.current_slide = 0;
                this.transport_panel = false
                this.banner_index = false
                this.route_store_about_panel = false
                this.category_panel_shortcut = true
                this.category_panel_shortcut_tag = 'банкоматы'
            },
            entertainment_button() {
                this.current_slide = 0;
                this.transport_panel = false
                this.banner_index = false
                this.route_store_about_panel = false
                this.category_panel_shortcut = true
                this.category_panel_shortcut_tag = 'развлечения'
            },
            toilets_button() {
                this.current_slide = 0;
                this.transport_panel = false
                this.banner_index = false
                this.route_store_about_panel = false
                this.category_panel_shortcut = true
                this.category_panel_shortcut_tag = 'туалеты'
            },
            transport_button() {
                this.current_slide = 0;
                this.atms = false;
                this.invalids = false;
                this.toilets = false;
                this.banner_index = false
                this.route_store_about_panel = false
                this.transport_panel = true;
            }
        },
        components: {
            CurrentRoutePathSlide1,
            CurrentRoutePathSlide2,
            SearchPanel,
            CategoryPanel,
            CategoryPanelShortcut,
            SpecialPanel,
            TransportPanel,
            RouteStoreAbout
        }
    }
</script>