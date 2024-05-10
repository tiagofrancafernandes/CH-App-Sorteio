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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m28,12h-8v2h8v14h-8v2h8c1.1025,0,2-.897,2-2v-14c0-1.1025-.8975-2-2-2Z"></path><path d="m19,16l-1.4141,1.4141,2.5859,2.5859h-4.1719c-2.2056,0-4-1.7944-4-4v-2h-2v2c0,3.3086,2.6917,6,6,6h4.1719l-2.5859,2.5859,1.4141,1.4141,5-5-5-5Z"></path><path d="m12,28h-6V8h16v-4c0-1.103-.8975-2-2-2H6c-1.103,0-2,.897-2,2v24c0,1.1025.897,2,2,2h6v-2ZM6,4h14v2H6v-2Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
