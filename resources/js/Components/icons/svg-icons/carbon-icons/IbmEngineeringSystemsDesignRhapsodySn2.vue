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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect class="cls-2" x="19" y="24" width="2" height="2" style="stroke-width: 0px"></rect><path class="cls-2" d="m17,21h12c1.1046,0,2,.8954,2,2v4c0,1.1046-.8954,2-2,2h-12c-1.1046,0-2-.8954-2-2v-4c0-1.1046.8954-2,2-2Zm12,6v-4h-12v4h12Z" style="stroke-width: 0px"></path><path class="cls-2" d="m12,27h-2c-3.8599,0-7-3.1401-7-7v-2h2v2c0,2.7568,2.2432,5,5,5h2v2Z" style="stroke-width: 0px"></path><path class="cls-2" d="m27,18v-7c0-3.8599-3.1401-7-7-7h-7v2h7c2.7568,0,5,2.2432,5,5v7h2Z" style="stroke-width: 0px"></path><path class="cls-2" d="m10,8V4c0-1.1046-.8954-2-2-2H2v13h2v-5h1.48l2.34,5h2.18l-2.33-5h.33c1.1046,0,2-.8954,2-2ZM4,4h4v4h-4V4Z" style="stroke-width: 0px"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none;stroke-width: 0px"></rect></svg>

</template>
