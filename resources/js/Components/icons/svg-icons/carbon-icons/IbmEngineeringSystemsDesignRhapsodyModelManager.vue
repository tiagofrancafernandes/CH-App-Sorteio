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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path class="cls-2" d="m27,30h-8c-2.2061,0-4-1.7939-4-4,0-1.8887,1.3164-3.4766,3.0801-3.8936.4219-2.332,2.4678-4.1064,4.9199-4.1064s4.498,1.7744,4.9199,4.1064c1.7637.417,3.0801,2.0049,3.0801,3.8936,0,2.2061-1.7939,4-4,4Zm-8-2h8c1.1025,0,2-.8975,2-2s-.8975-2-2-2h-1v-1c0-1.6543-1.3457-3-3-3s-3,1.3457-3,3v1h-1c-1.1025,0-2,.8975-2,2s.8975,2,2,2Z" style="stroke-width: 0px"></path><path class="cls-2" d="m12,27h-2c-3.8599,0-7-3.1401-7-7v-2h2v2c0,2.7568,2.2432,5,5,5h2v2Z" style="stroke-width: 0px"></path><path class="cls-2" d="m27,15v-4c0-3.8599-3.1401-7-7-7h-7v2h7c2.7568,0,5,2.2432,5,5v4h2Z" style="stroke-width: 0px"></path><path class="cls-2" d="m10,8V4c0-1.1046-.8954-2-2-2H2v13h2v-5h1.48l2.34,5h2.18l-2.33-5h.33c1.1046,0,2-.8954,2-2ZM4,4h4v4h-4V4Z" style="stroke-width: 0px"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none;stroke-width: 0px"></rect></svg>

</template>
