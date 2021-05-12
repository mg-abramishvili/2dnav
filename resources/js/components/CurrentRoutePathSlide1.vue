<template>
    <svg class="map-path svg1" viewBox="0 0 800 450">
        <path v-if="current_store_route.x_01" class="key-anim01" fill="none" stroke-width="2px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_store_route.x_01 + ' ' + current_store_route.y_01 + ', '"></path>
        <circle v-if="current_store_route.x_01" id="01" :cx="current_store_route.x_01" :cy="current_store_route.y_01" r="7" fill="#f33"></circle>
        <text v-if="current_store_route.x_01" style="stroke: #ffffff; stroke-width: 0.1px;" :x='current_store_route.x_01' :y='current_store_route.y_01' font-family='Verdana' font-size='7' fill='red'><tspan dx='-20' dy='-6' font-weight='bold'>{{ current_store_route.t_1_begin }}</tspan></text>

        <path v-if="current_store_route.x_02" class="key-anim02" fill="none" stroke-width="2px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_store_route.x_02 + ' ' + current_store_route.y_02 + ', ' + current_store_route.x_01 + ' ' + current_store_route.y_01"></path>
        <circle v-if="current_store_route.x_02" id="02" :cx="current_store_route.x_02" :cy="current_store_route.y_02" r="7" fill="#f33"></circle>
        <text v-if="current_store_route.x_02 && !current_store_route.x_03" style="stroke: #ffffff; stroke-width: 0.1px;" :x='current_store_route.x_02' :y='current_store_route.y_02' font-family='Verdana' font-size='7' fill='red'><tspan dx='-20' dy='-6' font-weight='bold'>{{ current_store_route.t_1_end }}</tspan></text>

        <path v-if="current_store_route.x_03" class="key-anim03" fill="none" stroke-width="2px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_store_route.x_03 + ' ' + current_store_route.y_03 + ', ' + current_store_route.x_02 + ' ' + current_store_route.y_02"></path>
        <circle v-if="current_store_route.x_03" id="03" :cx="current_store_route.x_03" :cy="current_store_route.y_03" r="7" fill="#f33"></circle>
        <text v-if="current_store_route.x_03 && !current_store_route.x_04" style="stroke: #ffffff; stroke-width: 0.1px;" :x='current_store_route.x_03' :y='current_store_route.y_03' font-family='Verdana' font-size='7' fill='red'><tspan dx='-20' dy='-6' font-weight='bold'>{{ current_store_route.t_1_end }}</tspan></text>

        <path v-if="current_store_route.x_04" class="key-anim04" fill="none" stroke-width="2px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_store_route.x_04 + ' ' + current_store_route.y_04 + ', ' + current_store_route.x_03 + ' ' + current_store_route.y_03"></path>
        <circle v-if="current_store_route.x_04" id="04" :cx="current_store_route.x_04" :cy="current_store_route.y_04" r="7" fill="#f33"></circle>
        <text v-if="current_store_route.x_04 && !current_store_route.x_05" style="stroke: #ffffff; stroke-width: 0.1px;" :x='current_store_route.x_04' :y='current_store_route.y_04' font-family='Verdana' font-size='7' fill='red'><tspan dx='-20' dy='-6' font-weight='bold'>{{ current_store_route.t_1_end }}</tspan></text>

        <path v-if="current_store_route.x_05" class="key-anim05" fill="none" stroke-width="2px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_store_route.x_05 + ' ' + current_store_route.y_05 + ', ' + current_store_route.x_04 + ' ' + current_store_route.y_04"></path>
        <circle v-if="current_store_route.x_05" id="05" :cx="current_store_route.x_05" :cy="current_store_route.y_05" r="7" fill="#f33"></circle>
        <text v-if="current_store_route.x_05 && !current_store_route.x_06" style="stroke: #ffffff; stroke-width: 0.1px;" :x='current_store_route.x_05' :y='current_store_route.y_05' font-family='Verdana' font-size='7' fill='red'><tspan dx='-20' dy='-6' font-weight='bold'>{{ current_store_route.t_1_end }}</tspan></text>

        <path v-if="current_store_route.x_06" class="key-anim06" fill="none" stroke-width="2px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_store_route.x_06 + ' ' + current_store_route.y_06 + ', ' + current_store_route.x_05 + ' ' + current_store_route.y_05"></path>
        <circle v-if="current_store_route.x_06" id="06" :cx="current_store_route.x_06" :cy="current_store_route.y_06" r="7" fill="#f33"></circle>
        <text v-if="current_store_route.x_06 && !current_store_route.x_07" style="stroke: #ffffff; stroke-width: 0.1px;" :x='current_store_route.x_06' :y='current_store_route.y_06' font-family='Verdana' font-size='7' fill='red'><tspan dx='-20' dy='-6' font-weight='bold'>{{ current_store_route.t_1_end }}</tspan></text>

        <path v-if="current_store_route.x_07" class="key-anim07" fill="none" stroke-width="2px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_store_route.x_07 + ' ' + current_store_route.y_07 + ', ' + current_store_route.x_06 + ' ' + current_store_route.y_06"></path>
        <circle v-if="current_store_route.x_07" id="07" :cx="current_store_route.x_07" :cy="current_store_route.y_07" r="7" fill="#f33"></circle>
        <text v-if="current_store_route.x_07 && !current_store_route.x_08" style="stroke: #ffffff; stroke-width: 0.1px;" :x='current_store_route.x_07' :y='current_store_route.y_07' font-family='Verdana' font-size='7' fill='red'><tspan dx='-20' dy='-6' font-weight='bold'>{{ current_store_route.t_1_end }}</tspan></text>

        <path v-if="current_store_route.x_08" class="key-anim08" fill="none" stroke-width="2px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_store_route.x_08 + ' ' + current_store_route.y_08 + ', ' + current_store_route.x_07 + ' ' + current_store_route.y_07"></path>
        <circle v-if="current_store_route.x_08" id="08" :cx="current_store_route.x_08" :cy="current_store_route.y_08" r="7" fill="#f33"></circle>
        <text v-if="current_store_route.x_08 && !current_store_route.x_09" style="stroke: #ffffff; stroke-width: 0.1px;" :x='current_store_route.x_08' :y='current_store_route.y_08' font-family='Verdana' font-size='7' fill='red'><tspan dx='-20' dy='-6' font-weight='bold'>{{ current_store_route.t_1_end }}</tspan></text>

        <path v-if="current_store_route.x_09" class="key-anim09" fill="none" stroke-width="2px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_store_route.x_09 + ' ' + current_store_route.y_09 + ', ' + current_store_route.x_08 + ' ' + current_store_route.y_08"></path>
        <circle v-if="current_store_route.x_09" id="09" :cx="current_store_route.x_09" :cy="current_store_route.y_09" r="7" fill="#f33"></circle>
        <text v-if="current_store_route.x_09 && !current_store_route.x_10" style="stroke: #ffffff; stroke-width: 0.1px;" :x='current_store_route.x_09' :y='current_store_route.y_09' font-family='Verdana' font-size='7' fill='red'><tspan dx='-20' dy='-6' font-weight='bold'>{{ current_store_route.t_1_end }}</tspan></text>

        <path v-if="current_store_route.x_10" class="key-anim10" fill="none" stroke-width="2px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_store_route.x_10 + ' ' + current_store_route.y_10 + ', ' + current_store_route.x_09 + ' ' + current_store_route.y_09"></path>
        <circle v-if="current_store_route.x_10" id="10" :cx="current_store_route.x_10" :cy="current_store_route.y_10" r="7" fill="#f33"></circle>
        <text v-if="current_store_route.x_10 && !current_store_route.x_11" style="stroke: #ffffff; stroke-width: 0.1px;" :x='current_store_route.x_10' :y='current_store_route.y_10' font-family='Verdana' font-size='7' fill='red'><tspan dx='-20' dy='-6' font-weight='bold'>{{ current_store_route.t_1_end }}</tspan></text>

        <path v-if="current_store_route.x_11" class="key-anim11" fill="none" stroke-width="2px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_store_route.x_11 + ' ' + current_store_route.y_11 + ', ' + current_store_route.x_10 + ' ' + current_store_route.y_10"></path>
        <circle v-if="current_store_route.x_11" id="11" :cx="current_store_route.x_11" :cy="current_store_route.y_11" r="7" fill="#f33"></circle>
        <text v-if="current_store_route.x_11 && !current_store_route.x_12" style="stroke: #ffffff; stroke-width: 0.1px;" :x='current_store_route.x_11' :y='current_store_route.y_11' font-family='Verdana' font-size='7' fill='red'><tspan dx='-20' dy='-6' font-weight='bold'>{{ current_store_route.t_1_end }}</tspan></text>

        <path v-if="current_store_route.x_12" class="key-anim12" fill="none" stroke-width="2px" stroke="rgba(255,51,51,0.8)" :d="'M' + current_store_route.x_12 + ' ' + current_store_route.y_12 + ', ' + current_store_route.x_11 + ' ' + current_store_route.y_11"></path>
        <circle v-if="current_store_route.x_12" id="12" :cx="current_store_route.x_12" :cy="current_store_route.y_12" r="7" fill="#f33"></circle>
        <text v-if="current_store_route.x_12" style="stroke: #ffffff; stroke-width: 0.1px;" :x='current_store_route.x_12' :y='current_store_route.y_12' font-family='Verdana' font-size='7' fill='red'><tspan dx='-20' dy='-6' font-weight='bold'>{{ current_store_route.t_1_end }}</tspan></text>
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
