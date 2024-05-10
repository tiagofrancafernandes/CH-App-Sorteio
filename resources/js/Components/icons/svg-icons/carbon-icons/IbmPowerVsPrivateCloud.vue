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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="23" y="26" width="2" height="4"></rect><path d="m28,21.5859l-3.293-3.293c-.1953-.1953-.4512-.293-.707-.293s-.5117.0977-.707.293l-5,5c-.1875.1875-.293.4414-.293.707v6h2v-5.5859l4-4,4,4v5.5859h2v-10h-2v1.5859Z"></path><circle cx="9" cy="20" r="1"></circle><circle cx="23" cy="12" r="1"></circle><circle cx="9" cy="5" r="1"></circle><circle cx="16" cy="16" r="2"></circle><path d="m9,16c0-3.8598,3.1402-7,7-7,1.7023,0,3.2635.6121,4.4783,1.6261l1.2822-1.5386c-1.561-1.3023-3.5685-2.0875-5.7604-2.0875-4.9706,0-9,4.0294-9,9,0,.5231.0541,1.0327.1398,1.5313l1.9693-.3404c-.0669-.3879-.1091-.7842-.1091-1.1909Z"></path><path d="m4,16c0-3.3084,1.3457-6.3084,3.5186-8.4813l-1.4182-1.4182c-2.5335,2.5335-4.1005,6.0334-4.1005,9.8994,0,7.732,6.268,14,14,14v-2c-6.6168,0-12-5.3832-12-12Z"></path><path d="m16,4c6.6168,0,12,5.3832,12,12h2c0-7.732-6.268-14-14-14-1.6813,0-3.2861.3116-4.7795.855l.6837,1.8803c1.2804-.4672,2.6558-.7353,4.0959-.7353Z"></path><g id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;"><rect class="cls-1" width="32" height="32" style="fill: none"></rect></g></svg>

</template>
