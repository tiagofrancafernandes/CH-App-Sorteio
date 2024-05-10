<script setup>
import { computed } from 'vue';

const props = defineProps({
    size: {
        type: String,
        required: false,
    }
})

const allowedSizes = {
    default: '7',
    sm: '5',
    md: '7',
    lg: '16',
    xl: '32',
    xxl: '64',
}

const computedSize = computed(() => {
    if (!props?.size) {
        return allowedSizes.default;
    }

    if (!isNaN(parseInt(props?.size ?? null))) {
        let numVal = parseInt(props?.size ?? null);

        if (numVal < 0 || numVal > 100) {
            return allowedSizes.default;
        }

        return numVal;
    }

    if (props?.size in allowedSizes) {
        return allowedSizes[`${props?.size}`] ?? allowedSizes.default;
    }

    return allowedSizes.default;
})
</script>

<template>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m26,19c-2.2056,0-4,1.7944-4,4,0,.6836.1882,1.3174.4917,1.8809-1.8762,1.3726-4.146,2.1191-6.4917,2.1191-6.0654,0-11-4.9346-11-11h-2c0,7.168,5.8318,13,13,13,2.8455,0,5.5923-.936,7.8433-2.6416.6235.4019,1.3613.6416,2.1567.6416,2.2056,0,4-1.7944,4-4s-1.7944-4-4-4Zm0,6c-1.1028,0-2-.8975-2-2s.8972-2,2-2,2,.8975,2,2-.8972,2-2,2Z"></path><path d="m16,3c-2.8455,0-5.5923.936-7.8433,2.6416-.6235-.4019-1.3613-.6416-2.1567-.6416-2.2056,0-4,1.7944-4,4s1.7944,4,4,4,4-1.7944,4-4c0-.6836-.1882-1.3174-.4917-1.8809,1.8762-1.3726,4.146-2.1191,6.4917-2.1191,6.0654,0,11,4.9346,11,11h2c0-7.168-5.8318-13-13-13ZM6,11c-1.1028,0-2-.8975-2-2s.8972-2,2-2,2,.8975,2,2-.8972,2-2,2Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
