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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m28.5678,12.8926l-.0366-.0934-3.5388-9.2356c-.072-.181-.1995-.3346-.3642-.4386-.3375-.2095-.7699-.1863-1.083.0582-.1512.1228-.2608.2892-.3141.4765l-2.3894,7.3105h-9.6756l-2.3894-7.3105c-.0518-.1884-.1617-.3556-.3141-.4779-.3131-.2445-.7455-.2677-1.083-.0582-.1643.1045-.2917.2579-.3642.4386l-3.5456,9.2315-.0352.0934c-1.0465,2.7345-.1578,5.8315,2.1796,7.5948l.0122.0095.0325.023,5.3908,4.037,2.667,2.0185,1.6246,1.2265c.3905.2965.9308.2965,1.3213,0l1.6246-1.2265,2.667-2.0185,5.4233-4.0614.0135-.0108c2.3319-1.7635,3.219-4.8551,2.1769-7.5867Z"></path><g id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;"><rect class="cls-1" width="32" height="32" style="fill: none"></rect></g></svg>

</template>
