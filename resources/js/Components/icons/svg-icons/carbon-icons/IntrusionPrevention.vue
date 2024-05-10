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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><circle cx="22" cy="23.8872" r="2"></circle><path d="M29.7769,23.4785A8.64,8.64,0,0,0,22,18a8.64,8.64,0,0,0-7.7769,5.4785L14,24l.2231.5215A8.64,8.64,0,0,0,22,30a8.64,8.64,0,0,0,7.7769-5.4785L30,24ZM22,28a4,4,0,1,1,4-4A4.0045,4.0045,0,0,1,22,28Z" transform="translate(0 0)"></path><path d="M25,10H4A2.0021,2.0021,0,0,1,2,8V4A2.0021,2.0021,0,0,1,4,2H25a2.0021,2.0021,0,0,1,2,2V8A2.0021,2.0021,0,0,1,25,10ZM4,4V8H25V4Z" transform="translate(0 0)"></path><path d="M12,28H4V24h8V22H4a2.0023,2.0023,0,0,0-2,2v4a2.0023,2.0023,0,0,0,2,2h8Z" transform="translate(0 0)"></path><path d="M28,12H7a2.0023,2.0023,0,0,0-2,2v4a2.0023,2.0023,0,0,0,2,2h5V18H7V14H28l.0007,2H30V14A2.0023,2.0023,0,0,0,28,12Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
