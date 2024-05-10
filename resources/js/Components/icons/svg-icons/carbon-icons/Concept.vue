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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>concept</title><path d="M20.8851,19.4711a5.9609,5.9609,0,0,0,0-6.9422L23,10.4141l1.293,1.2929a.9995.9995,0,0,0,1.414,0l4-4a.9994.9994,0,0,0,0-1.414l-4-4a.9994.9994,0,0,0-1.414,0l-4,4a.9994.9994,0,0,0,0,1.414L21.5859,9l-2.1148,2.1149a5.9609,5.9609,0,0,0-6.9422,0L10,8.5859V2H2v8H8.5859l2.529,2.5289a5.9609,5.9609,0,0,0,0,6.9422L9,21.5859,7.707,20.293a.9994.9994,0,0,0-1.414,0l-4,4a.9994.9994,0,0,0,0,1.414l4,4a.9995.9995,0,0,0,1.414,0l4-4a.9994.9994,0,0,0,0-1.414L10.4141,23l2.1148-2.1149a5.9609,5.9609,0,0,0,6.9422,0L22,23.4141V30h8V22H23.4141ZM25,4.4141,27.5859,7,25,9.5859,22.4141,7ZM7,27.5859,4.4141,25,7,22.4141,9.5859,25ZM8,8H4V4H8Zm4,8a4,4,0,1,1,4,4A4.0045,4.0045,0,0,1,12,16Zm12,8h4v4H24Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
