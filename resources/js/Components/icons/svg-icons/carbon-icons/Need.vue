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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M29.1211,16.8789A2.98,2.98,0,0,0,27.01,16H27a2.9774,2.9774,0,0,0-2.1211.8789L19.9778,21.78A2.9943,2.9943,0,0,0,17,19H10a5.0059,5.0059,0,0,0-5,5v.667L2,28.6631l1.6,1.2L7,25.333V24a3.0033,3.0033,0,0,1,3-3h7a1,1,0,0,1,0,2H13v2h4.9287a3.9717,3.9717,0,0,0,2.8286-1.1719L26.293,18.293A.9929.9929,0,0,1,27,18h.0034a1,1,0,0,1,.7036,1.707l-7.414,7.4141A2.9791,2.9791,0,0,1,18.1714,28H11v2h7.1714a4.9665,4.9665,0,0,0,3.5356-1.4648l7.4141-7.4141a2.9989,2.9989,0,0,0,0-4.2422Z"></path><polygon points="21.586 8.586 18 12 18 2 16 2 16 12 12.414 8.586 11 10 17 16 23 10 21.586 8.586"></polygon><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
