<template>
    <div>

        <div class="container">
            <div class="row">
                <div class="col-4-f">
                    <div class="sidebar">
                        <div class="sidebar-header">
                            <img :src="setup.logo">
                        </div>
                        <div v-for="banner in banners" :key="banner.id" class="sidebar-banner-slide" v-bind:style="{ 'background-image': 'url(' + banner.adfile + ')' }">
                        </div>
                    </div>
                </div>
                <div class="col-8-f">
                    <div class="buttons-bar">
                        <div class="row">
                            <div class="col-3">
                                <button @click="home_panel_button()">Дом</button>
                            </div>
                            <div class="col-3">
                                <button @click="search_panel_button()">Поиск</button>
                            </div>
                            <div class="col-3">
                                <button @click="category_panel_button()">Категории</button>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <div v-if="search_panel" class="search_panel">

                            <input
                            :value="input"
                            class="input"
                            @input="onInputChange"
                            placeholder="Поиск..."
                            >
                            <ul id="myUL" style="margin-top: 0.5vh;">
                                <li v-for="routeListItem in filtered_routes" :key="routeListItem.id" @click="SelectRoute(routeListItem)">
                                    <a>{{ routeListItem.title }}</a>
                                </li>
                            </ul>
                            <SimpleKeyboard @onChange="onChange" @onKeyPress="onKeyPress" :input="input"/>
                        </div>

                        <div v-if="category_panel" class="category_panel">
                            <div class="row">
                                <div v-for="tag in tags" :key="tag.id" class="col-3">
                                    <div class="category_item">
                                        {{ tag.title }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12" style="padding: 4vh"> 
                            <div v-if="route_about" class="route_about">
                                <h5 v-if="selectedItem" style="display:block;">
                                    <span v-for="rt in route.stores" :key="'rt' + rt.id">
                                        <img :src="rt.logo" class="display: inline-block; vertical-align:middle;">
                                        <i style="display:inline-block; vertical-align:middle;">
                                            <div v-for="scheme in schemes" :key="scheme.id">
                                                <div v-if="scheme.id == selectedItemSchemeID && current_slide === 1" class="scheme_title scheme_title_first">{{ scheme.title}}</div>
                                                <div v-if="scheme.id == selectedItemScheme2ID  && current_slide === 2" class="scheme_title scheme_title_second">{{ scheme.title}}</div>
                                            </div>
                                            {{ rt.title }}
                                        </i>
                                    </span>
                                </h5>
                            </div>

                            <button v-if="current_slide === 2" @click="PrevScheme(selectedItemSchemeID)" class="prevnextbutton prev_button">
                                Начало маршрута
                            </button>
                            <button v-if="route.schemes2 && route.schemes2.length > 0 && current_slide === 1" @click="NextScheme(selectedItemScheme2ID)" class="prevnextbutton next_button">
                                Продолжить маршрут
                            </button>

                            <div class="floor_buttons">
                                <button v-for="scheme in schemes" :key="scheme.id" @click="SelectFloor(scheme)">
                                    {{ scheme.title }}
                                </button>
                            </div>

                            <div id="map" style="position: relative; width: 800px; height: 450px;">
                                <div v-for="scheme in schemes" :key="scheme.id" :id="'scheme_image_' + scheme.id" class="scheme_images">
                                    <img v-if="scheme.id.toString() === current_floor" :src="scheme.image" style="width:800px; height:450px;">
                                </div>

                                <svg v-if="current_slide === 1" class="map-path svg1" viewBox="0 0 800 450">
                                    <path v-if="route.x_01" class="key-anim01" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_01 + ' ' + route.y_01 + ', '"></path>
                                    <circle v-if="route.x_01" id="01" :cx="route.x_01" :cy="route.y_01" r="7" fill="#f33"></circle>
                                    <text v-if="route.x_01" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_01' :y='route.y_01' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_1_begin }}</tspan></text>

                                    <path v-if="route.x_02" class="key-anim02" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_02 + ' ' + route.y_02 + ', ' + route.x_01 + ' ' + route.y_01"></path>
                                    <circle v-if="route.x_02" id="02" :cx="route.x_02" :cy="route.y_02" r="7" fill="#f33"></circle>
                                    <text v-if="route.x_02 && !route.x_03" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_02' :y='route.y_02' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_1_end }}</tspan></text>

                                    <path v-if="route.x_03" class="key-anim03" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_03 + ' ' + route.y_03 + ', ' + route.x_02 + ' ' + route.y_02"></path>
                                    <circle v-if="route.x_03" id="03" :cx="route.x_03" :cy="route.y_03" r="7" fill="#f33"></circle>
                                    <text v-if="route.x_03 && !route.x_04" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_03' :y='route.y_03' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_1_end }}</tspan></text>

                                    <path v-if="route.x_04" class="key-anim04" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_04 + ' ' + route.y_04 + ', ' + route.x_03 + ' ' + route.y_03"></path>
                                    <circle v-if="route.x_04" id="04" :cx="route.x_04" :cy="route.y_04" r="7" fill="#f33"></circle>
                                    <text v-if="route.x_04 && !route.x_05" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_04' :y='route.y_04' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_1_end }}</tspan></text>

                                    <path v-if="route.x_05" class="key-anim05" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_05 + ' ' + route.y_05 + ', ' + route.x_04 + ' ' + route.y_04"></path>
                                    <circle v-if="route.x_05" id="05" :cx="route.x_05" :cy="route.y_05" r="7" fill="#f33"></circle>
                                    <text v-if="route.x_05 && !route.x_06" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_05' :y='route.y_05' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_1_end }}</tspan></text>

                                    <path v-if="route.x_06" class="key-anim06" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_06 + ' ' + route.y_06 + ', ' + route.x_05 + ' ' + route.y_05"></path>
                                    <circle v-if="route.x_06" id="06" :cx="route.x_06" :cy="route.y_06" r="7" fill="#f33"></circle>
                                    <text v-if="route.x_06 && !route.x_07" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_06' :y='route.y_06' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_1_end }}</tspan></text>

                                    <path v-if="route.x_07" class="key-anim07" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_07 + ' ' + route.y_07 + ', ' + route.x_06 + ' ' + route.y_06"></path>
                                    <circle v-if="route.x_07" id="07" :cx="route.x_07" :cy="route.y_07" r="7" fill="#f33"></circle>
                                    <text v-if="route.x_07 && !route.x_08" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_07' :y='route.y_07' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_1_end }}</tspan></text>

                                    <path v-if="route.x_08" class="key-anim08" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_08 + ' ' + route.y_08 + ', ' + route.x_07 + ' ' + route.y_07"></path>
                                    <circle v-if="route.x_08" id="08" :cx="route.x_08" :cy="route.y_08" r="7" fill="#f33"></circle>
                                    <text v-if="route.x_08 && !route.x_09" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_08' :y='route.y_08' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_1_end }}</tspan></text>

                                    <path v-if="route.x_09" class="key-anim09" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_09 + ' ' + route.y_09 + ', ' + route.x_08 + ' ' + route.y_08"></path>
                                    <circle v-if="route.x_09" id="09" :cx="route.x_09" :cy="route.y_09" r="7" fill="#f33"></circle>
                                    <text v-if="route.x_09 && !route.x_10" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_09' :y='route.y_09' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_1_end }}</tspan></text>

                                    <path v-if="route.x_10" class="key-anim10" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_10 + ' ' + route.y_10 + ', ' + route.x_09 + ' ' + route.y_09"></path>
                                    <circle v-if="route.x_10" id="10" :cx="route.x_10" :cy="route.y_10" r="7" fill="#f33"></circle>
                                    <text v-if="route.x_10 && !route.x_11" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_10' :y='route.y_10' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_1_end }}</tspan></text>

                                    <path v-if="route.x_11" class="key-anim11" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_11 + ' ' + route.y_11 + ', ' + route.x_10 + ' ' + route.y_10"></path>
                                    <circle v-if="route.x_11" id="11" :cx="route.x_11" :cy="route.y_11" r="7" fill="#f33"></circle>
                                    <text v-if="route.x_11 && !route.x_12" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_11' :y='route.y_11' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_1_end }}</tspan></text>

                                    <path v-if="route.x_12" class="key-anim12" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_12 + ' ' + route.y_12 + ', ' + route.x_11 + ' ' + route.y_11"></path>
                                    <circle v-if="route.x_12" id="12" :cx="route.x_12" :cy="route.y_12" r="7" fill="#f33"></circle>
                                    <text v-if="route.x_12" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_12' :y='route.y_12' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_1_end }}</tspan></text>
                                </svg>

                                <svg v-if="current_slide === 2" class="map-path svg2" viewBox="0 0 800 450">
                                    <path v-if="route.x_101" class="key-anim01" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_101 + ' ' + route.y_101 + ', '"></path>
                                    <circle v-if="route.x_101" id="01" :cx="route.x_101" :cy="route.y_101" r="7" fill="#f33"></circle>
                                    <text v-if="route.x_101" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_101' :y='route.y_101' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_2_begin }}</tspan></text>

                                    <path v-if="route.x_102" class="key-anim02" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_102 + ' ' + route.y_102 + ', ' + route.x_101 + ' ' + route.y_101"></path>
                                    <circle v-if="route.x_102" id="02" :cx="route.x_102" :cy="route.y_102" r="7" fill="#f33"></circle>
                                    <text v-if="route.x_102 && !route.x_103" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_102' :y='route.y_102' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_2_end }}</tspan></text>

                                    <path v-if="route.x_103" class="key-anim03" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_103 + ' ' + route.y_103 + ', ' + route.x_102 + ' ' + route.y_102"></path>
                                    <circle v-if="route.x_103" id="03" :cx="route.x_103" :cy="route.y_103" r="7" fill="#f33"></circle>
                                    <text v-if="route.x_103 && !route.x_104" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_103' :y='route.y_103' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_2_end }}</tspan></text>

                                    <path v-if="route.x_104" class="key-anim04" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_104 + ' ' + route.y_104 + ', ' + route.x_103 + ' ' + route.y_103"></path>
                                    <circle v-if="route.x_104" id="04" :cx="route.x_104" :cy="route.y_104" r="7" fill="#f33"></circle>
                                    <text v-if="route.x_104 && !route.x_105" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_104' :y='route.y_104' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_2_end }}</tspan></text>

                                    <path v-if="route.x_105" class="key-anim05" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_105 + ' ' + route.y_105 + ', ' + route.x_104 + ' ' + route.y_104"></path>
                                    <circle v-if="route.x_105" id="05" :cx="route.x_105" :cy="route.y_105" r="7" fill="#f33"></circle>
                                    <text v-if="route.x_105 && !route.x_106" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_105' :y='route.y_105' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_2_end }}</tspan></text>

                                    <path v-if="route.x_106" class="key-anim06" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_106 + ' ' + route.y_106 + ', ' + route.x_105 + ' ' + route.y_105"></path>
                                    <circle v-if="route.x_106" id="06" :cx="route.x_106" :cy="route.y_106" r="7" fill="#f33"></circle>
                                    <text v-if="route.x_106 && !route.x_107" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_106' :y='route.y_106' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_2_end }}</tspan></text>

                                    <path v-if="route.x_107" class="key-anim07" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_107 + ' ' + route.y_107 + ', ' + route.x_106 + ' ' + route.y_106"></path>
                                    <circle v-if="route.x_107" id="07" :cx="route.x_107" :cy="route.y_107" r="7" fill="#f33"></circle>
                                    <text v-if="route.x_107 && !route.x_108" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_107' :y='route.y_107' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_2_end }}</tspan></text>

                                    <path v-if="route.x_108" class="key-anim08" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_108 + ' ' + route.y_108 + ', ' + route.x_107 + ' ' + route.y_107"></path>
                                    <circle v-if="route.x_108" id="08" :cx="route.x_108" :cy="route.y_108" r="7" fill="#f33"></circle>
                                    <text v-if="route.x_108 && !route.x_109" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_108' :y='route.y_108' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_2_end }}</tspan></text>

                                    <path v-if="route.x_109" class="key-anim09" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_109 + ' ' + route.y_109 + ', ' + route.x_108 + ' ' + route.y_108"></path>
                                    <circle v-if="route.x_109" id="09" :cx="route.x_109" :cy="route.y_109" r="7" fill="#f33"></circle>
                                    <text v-if="route.x_109 && !route.x_110" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_109' :y='route.y_109' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_2_end }}</tspan></text>

                                    <path v-if="route.x_110" class="key-anim10" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_110 + ' ' + route.y_110 + ', ' + route.x_109 + ' ' + route.y_109"></path>
                                    <circle v-if="route.x_110" id="10" :cx="route.x_110" :cy="route.y_110" r="7" fill="#f33"></circle>
                                    <text v-if="route.x_110 && !route.x_111" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_110' :y='route.y_110' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_2_end }}</tspan></text>

                                    <path v-if="route.x_111" class="key-anim11" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_111 + ' ' + route.y_111 + ', ' + route.x_110 + ' ' + route.y_110"></path>
                                    <circle v-if="route.x_111" id="11" :cx="route.x_111" :cy="route.y_111" r="7" fill="#f33"></circle>
                                    <text v-if="route.x_111 && !route.x_112" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_111' :y='route.y_111' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_2_end }}</tspan></text>

                                    <path v-if="route.x_112" class="key-anim12" fill="none" stroke-width="5px" stroke="rgba(255,51,51,0.8)" :d="'M' + route.x_112 + ' ' + route.y_112 + ', ' + route.x_111 + ' ' + route.y_111"></path>
                                    <circle v-if="route.x_112" id="12" :cx="route.x_112" :cy="route.y_112" r="7" fill="#f33"></circle>
                                    <text v-if="route.x_112" style="stroke: #ffffff; stroke-width: 0.5px;" :x='route.x_112' :y='route.y_112' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ route.t_2_end }}</tspan></text>
                                </svg>

                                <!-- STORES -->
                                <div v-for="store in stores" :key="'store' + store.id" class="map-marker" v-bind:style="{ left: store.x_01 + 'px', top: store.y_01 + 'px' }">
                                    <div v-for="s_scheme in store.schemes" :key="s_scheme.id">
                                        <div v-if="s_scheme.pivot.scheme_id === current_floor">
                                            <span v-for="store_route in store.routes" :key="store_route.id" @click="SelectRoute(store_route)">
                                                <!--{{ store.title }}-->
                                                &nbsp;
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import SimpleKeyboard from "./SimpleKeyboard";

    export default {
        data() {
            return {
                setup: {},
                banners: [],
                schemes: [],
                map: {},
                routes: {},
                route: {},
                stores: {},
                tags: {},
                selectedItemID: '',
                selectedItemSchemeID: '',
                selectedItemScheme2ID: '',
                selectedItemScheme_title: '',
                selectedItem: '',
                input: '',
                current_slide: 1,
                category_panel: false,
                search_panel: false,
                route_about: false,
                current_floor: '1'
            }
        },
        created() {
            fetch('/api/setup/')
                .then(response => response.json())
                .then(json => {
                    this.setup = json;
                });
            fetch('/api/schemes/')
                .then(response => response.json())
                .then(json => {
                    this.schemes = json;
                });
            fetch('/api/stores/')
                .then(response => response.json())
                .then(json => {
                    this.stores = json;
                });
            fetch('/api/tags/')
                .then(response => response.json())
                .then(json => {
                    this.tags = json;
                });
            fetch('/api/routes')
                .then(response => response.json())
                .then(json => {
                    this.routes = json.data;
                    this.loading = false;
                });
            fetch('/api/banners/')
                .then(response => response.json())
                .then(json => {
                    this.banners = json;
                });
        },
        computed: {
            filtered_routes: function () {
                if (this.input.trim() === '') {
                    return this.routes;
                } else {
                    return this.routes.filter(item => {
                    return item.title.toLowerCase().indexOf(this.input.toLowerCase()) >= 0;
                    });
                }
            }
        },
        methods: {
            SelectRoute(routeListItem) {
                this.search_panel = false;
                this.route_about = true;
                this.selectedItemID = routeListItem.id;
                this.selectedItem = routeListItem.title;
                this.selectedItemSchemeID = routeListItem.scheme_id;
                this.current_floor = routeListItem.scheme_id.toString();
                this.selectedItemScheme2ID = routeListItem.scheme2_id;
                fetch(`/api/route/${this.selectedItemID}`)
                .then(response => response.json())
                .then(json => {
                    this.route = json;
                    this.current_slide = routeListItem.scheme_id.toString();
                    this.current_slide = 1;
                });
            },
            PrevScheme(selectedItemSchemeID) {
                this.current_floor = selectedItemSchemeID.toString();
                this.current_slide = 1;
            },
            NextScheme(selectedItemScheme2ID) {
                this.current_floor = selectedItemScheme2ID.toString();
                this.current_slide = 2;
            },
            onChange(input) {
                this.input = input;
            },
            onKeyPress(button) {
                //console.log("button", button);
            },
            onInputChange(input) {
                this.input = input.target.value;
            },
            home_panel_button() {
                this.category_panel = false;
                this.search_panel = false;
            },
            search_panel_button() {
                this.category_panel = false;
                this.search_panel = true;
            },
            category_panel_button() {
                this.search_panel = false;
                this.category_panel = true;
            },
            SelectFloor(scheme) {
                this.current_floor = scheme.id.toString();
                this.current_slide = 0;
            },
        },
        components: {
            SimpleKeyboard
        }
    }
</script>

<style scoped>
    .scheme_images {
        position: absolute;
        top: 0;
        left: 0;
    }

    .route_about span {
        display:block;
        width: 100%;
    }

    .prevnextbutton {
        position: absolute;
        bottom: 1vh;
        z-index: 10;
    }

    .route_about {
        color: #333;
        position: absolute;
        bottom: -32vh;
        border: 0.1vh solid #888;
        padding: 2vh;
        left: 4vh;
        right: 4vh;
        height: 12vh;
    }

    .route_about img {
        width: auto;
        height: auto;
        max-width: 30vw;
        max-height: 8vh;
        margin-right: 5vh;
    }

    .route_about i {
        font-style: normal;
        font-size: 3vh;
    }

    .input {
        width: 100%;
        padding: 2vh 2vh;
        font-size: 2.5vh;
        border: 0.2vh solid #A1A1A1;
    }

    #map {
        transform: scale(1.5);
        transform-origin: 0 0;
        margin-top: 0;
        margin-bottom: 0;
    }

    #myUL {
        height: 45vh;
    }

    .map-marker {
        position: absolute;
        z-index:10;
        width: auto;
        height: auto;
        margin-left: -12px;
        margin-top: -12px;
        min-width: 25px;
        min-height: 25px;
        z-index: 5;
    }

    .map-marker span {
        display: block;
        background-color: yellow;
    }

    .search_panel {
        position: absolute;
        z-index: 10;
        width: 100vw;
        height: 85vh;
        top: 15vh;
        margin-top: 0;
        background: #fff;
        padding: 1.5vh;
        margin-left: -29vw;
    }

    .prevnextbutton {
        background-color: #976545;
        color: #fff;
        font-size: 1.25vh;
        padding: 0.5vh 2vh;
        display: block;
        margin: 0 auto;
        width: 30vw;
        border-radius: 1vh;
        left: 0;
        right: 0;
        border: 0;
    }

    .prevnextbutton:focus {
        outline: none;
    }

    #myUL li a {
        font-size: 1.5vh;
    }

    .search_button {
        position: absolute;
        top: 0;
        right: 0;
        background-color: rgba(255,255,255,0.5);
        border: 0;
        color: #222;
        padding: 1vh 2vh;
        font-size: 1.5vh;
        z-index: 10;
    }

    .category_panel {
        position: absolute;
        z-index: 10;
        width: 100vw;
        height: 85vh;
        top: 15vh;
        margin-top: 0;
        background: #fff;
        padding: 1.5vh;
        margin-left: -29vw;
    }

    .category_item {
        height: 15vh;
        padding: 2vh;
        margin: 2vh;
        border: 0.1vh solid #888;
    }

    .floor_buttons {
        position: absolute;
        right: 4vh;
        top: 35vh;
        z-index: 5;
    }
</style>