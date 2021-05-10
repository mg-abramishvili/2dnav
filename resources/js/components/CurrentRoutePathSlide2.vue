<template>
    <svg class="map-path svg2" viewBox="0 0 800 450">
        <path v-if="current_store_route.x_101" class="key-anim01" fill="none" stroke-width="3px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_store_route.x_101 + ' ' + current_store_route.y_101 + ', '"></path>
        <circle v-if="current_store_route.x_101" id="01" :cx="current_store_route.x_101" :cy="current_store_route.y_101" r="7" fill="#f33"></circle>
        <text v-if="current_store_route.x_101" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_store_route.x_101' :y='current_store_route.y_101' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_store_route.t_2_begin }}</tspan></text>

        <path v-if="current_store_route.x_102" class="key-anim02" fill="none" stroke-width="3px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_store_route.x_102 + ' ' + current_store_route.y_102 + ', ' + current_store_route.x_101 + ' ' + current_store_route.y_101"></path>
        <circle v-if="current_store_route.x_102" id="02" :cx="current_store_route.x_102" :cy="current_store_route.y_102" r="7" fill="#f33"></circle>
        <text v-if="current_store_route.x_102 && !current_store_route.x_103" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_store_route.x_102' :y='current_store_route.y_102' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_store_route.t_2_end }}</tspan></text>

        <path v-if="current_store_route.x_103" class="key-anim03" fill="none" stroke-width="3px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_store_route.x_103 + ' ' + current_store_route.y_103 + ', ' + current_store_route.x_102 + ' ' + current_store_route.y_102"></path>
        <circle v-if="current_store_route.x_103" id="03" :cx="current_store_route.x_103" :cy="current_store_route.y_103" r="7" fill="#f33"></circle>
        <text v-if="current_store_route.x_103 && !current_store_route.x_104" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_store_route.x_103' :y='current_store_route.y_103' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_store_route.t_2_end }}</tspan></text>

        <path v-if="current_store_route.x_104" class="key-anim04" fill="none" stroke-width="3px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_store_route.x_104 + ' ' + current_store_route.y_104 + ', ' + current_store_route.x_103 + ' ' + current_store_route.y_103"></path>
        <circle v-if="current_store_route.x_104" id="04" :cx="current_store_route.x_104" :cy="current_store_route.y_104" r="7" fill="#f33"></circle>
        <text v-if="current_store_route.x_104 && !current_store_route.x_105" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_store_route.x_104' :y='current_store_route.y_104' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_store_route.t_2_end }}</tspan></text>

        <path v-if="current_store_route.x_105" class="key-anim05" fill="none" stroke-width="3px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_store_route.x_105 + ' ' + current_store_route.y_105 + ', ' + current_store_route.x_104 + ' ' + current_store_route.y_104"></path>
        <circle v-if="current_store_route.x_105" id="05" :cx="current_store_route.x_105" :cy="current_store_route.y_105" r="7" fill="#f33"></circle>
        <text v-if="current_store_route.x_105 && !current_store_route.x_106" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_store_route.x_105' :y='current_store_route.y_105' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_store_route.t_2_end }}</tspan></text>

        <path v-if="current_store_route.x_106" class="key-anim06" fill="none" stroke-width="3px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_store_route.x_106 + ' ' + current_store_route.y_106 + ', ' + current_store_route.x_105 + ' ' + current_store_route.y_105"></path>
        <circle v-if="current_store_route.x_106" id="06" :cx="current_store_route.x_106" :cy="current_store_route.y_106" r="7" fill="#f33"></circle>
        <text v-if="current_store_route.x_106 && !current_store_route.x_107" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_store_route.x_106' :y='current_store_route.y_106' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_store_route.t_2_end }}</tspan></text>

        <path v-if="current_store_route.x_107" class="key-anim07" fill="none" stroke-width="3px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_store_route.x_107 + ' ' + current_store_route.y_107 + ', ' + current_store_route.x_106 + ' ' + current_store_route.y_106"></path>
        <circle v-if="current_store_route.x_107" id="07" :cx="current_store_route.x_107" :cy="current_store_route.y_107" r="7" fill="#f33"></circle>
        <text v-if="current_store_route.x_107 && !current_store_route.x_108" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_store_route.x_107' :y='current_store_route.y_107' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_store_route.t_2_end }}</tspan></text>

        <path v-if="current_store_route.x_108" class="key-anim08" fill="none" stroke-width="3px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_store_route.x_108 + ' ' + current_store_route.y_108 + ', ' + current_store_route.x_107 + ' ' + current_store_route.y_107"></path>
        <circle v-if="current_store_route.x_108" id="08" :cx="current_store_route.x_108" :cy="current_store_route.y_108" r="7" fill="#f33"></circle>
        <text v-if="current_store_route.x_108 && !current_store_route.x_109" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_store_route.x_108' :y='current_store_route.y_108' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_store_route.t_2_end }}</tspan></text>

        <path v-if="current_store_route.x_109" class="key-anim09" fill="none" stroke-width="3px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_store_route.x_109 + ' ' + current_store_route.y_109 + ', ' + current_store_route.x_108 + ' ' + current_store_route.y_108"></path>
        <circle v-if="current_store_route.x_109" id="09" :cx="current_store_route.x_109" :cy="current_store_route.y_109" r="7" fill="#f33"></circle>
        <text v-if="current_store_route.x_109 && !current_store_route.x_110" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_store_route.x_109' :y='current_store_route.y_109' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_store_route.t_2_end }}</tspan></text>

        <path v-if="current_store_route.x_110" class="key-anim10" fill="none" stroke-width="3px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_store_route.x_110 + ' ' + current_store_route.y_110 + ', ' + current_store_route.x_109 + ' ' + current_store_route.y_109"></path>
        <circle v-if="current_store_route.x_110" id="10" :cx="current_store_route.x_110" :cy="current_store_route.y_110" r="7" fill="#f33"></circle>
        <text v-if="current_store_route.x_110 && !current_store_route.x_111" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_store_route.x_110' :y='current_store_route.y_110' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_store_route.t_2_end }}</tspan></text>

        <path v-if="current_store_route.x_111" class="key-anim11" fill="none" stroke-width="3px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_store_route.x_111 + ' ' + current_store_route.y_111 + ', ' + current_store_route.x_110 + ' ' + current_store_route.y_110"></path>
        <circle v-if="current_store_route.x_111" id="11" :cx="current_store_route.x_111" :cy="current_store_route.y_111" r="7" fill="#f33"></circle>
        <text v-if="current_store_route.x_111 && !current_store_route.x_112" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_store_route.x_111' :y='current_store_route.y_111' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_store_route.t_2_end }}</tspan></text>

        <path v-if="current_store_route.x_112" class="key-anim12" fill="none" stroke-width="3px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_store_route.x_112 + ' ' + current_store_route.y_112 + ', ' + current_store_route.x_111 + ' ' + current_store_route.y_111"></path>
        <circle v-if="current_store_route.x_112" id="12" :cx="current_store_route.x_112" :cy="current_store_route.y_112" r="7" fill="#f33"></circle>
        <text v-if="current_store_route.x_112" style="stroke: #ffffff; stroke-width: 0.5px;" :x='current_store_route.x_112' :y='current_store_route.y_112' font-family='Verdana' font-size='12' fill='red'><tspan dx='-20' dy='30' font-weight='bold'>{{ current_store_route.t_2_end }}</tspan></text>
    </svg>
</template>

<script>

export default {
    props: ['current_store_route'],
    data() {
        return {
        }
    }
}
</script>
