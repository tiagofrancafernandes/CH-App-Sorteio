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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>chart--river</title><path d="M12.4326,20.0171l8.0376,4.68a1.958,1.958,0,0,0,1.0508.3012,2.2412,2.2412,0,0,0,.4888-.0556l7.2532-1.9769A1,1,0,0,0,30,22.0007V7.996A1,1,0,0,0,28.74,7.0305L21.5034,8.9829l-8.0371-4.68a1.9917,1.9917,0,0,0-1.8652-.1352L4,7.4727V2H2V28a2,2,0,0,0,2,2H30V28H4V23.6577ZM28,21.2344l-6.4966,1.75-8.0371-4.68a1.9931,1.9931,0,0,0-1.8652-.1353L4,21.4746V16.6572l8.4326-3.6416L20.47,17.6968a1.962,1.962,0,0,0,1.0508.3008,2.2112,2.2112,0,0,0,.4888-.0557L28,16.31ZM12.4326,6.0156l8.0376,4.68a2.0091,2.0091,0,0,0,1.54.2451L28,9.3081v4.9258l-6.4966,1.7505-8.0371-4.6812a1.9917,1.9917,0,0,0-1.8652-.1352L4,14.4736V9.6562Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
