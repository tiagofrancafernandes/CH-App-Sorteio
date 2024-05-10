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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="18" y="19" width="12" height="2"></rect><rect x="18" y="23" width="12" height="2"></rect><rect x="18" y="27" width="8" height="2"></rect><path d="M24,4a3.9962,3.9962,0,0,0-3.8579,3H12V4H4v8h8V9h8.1421a3.94,3.94,0,0,0,.4248,1.019L10.019,20.5669A3.9521,3.9521,0,0,0,8,20a4,4,0,1,0,3.8579,5H16V23H11.8579a3.94,3.94,0,0,0-.4248-1.019L21.981,11.4331A3.9521,3.9521,0,0,0,24,12a4,4,0,0,0,0-8ZM10,10H6V6h4ZM8,26a2,2,0,1,1,2-2A2.0023,2.0023,0,0,1,8,26ZM24,10a2,2,0,1,1,2-2A2.0023,2.0023,0,0,1,24,10Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
