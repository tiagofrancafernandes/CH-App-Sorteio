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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M16,2A14,14,0,1,0,30,16,14,14,0,0,0,16,2ZM10,22H8V10h2Zm14-1a1,1,0,0,1-1.4858.874l-9-5a1,1,0,0,1,0-1.748l9-5A1,1,0,0,1,24,11Z"></path><polygon points="22 19.301 22 12.699 16.059 16 22 19.301"></polygon><path id="inner-path_2" data-name="inner-path 2" class="cls-1" d="M23,22a1.0037,1.0037,0,0,1-.4858-.1257l-9-5a1,1,0,0,1,0-1.7486l9-5A1,1,0,0,1,24,11V21a1,1,0,0,1-1,1Zm-6.9409-6L22,19.3005V12.7Z" style="fill: none"></path><rect id="inner-path_1" data-name="inner-path 1" class="cls-1" x="8" y="10" width="2" height="12" transform="translate(18 32) rotate(-180)" style="fill: none"></rect><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
