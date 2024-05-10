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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="12" y="11" width="2" height="6"></rect><rect x="7" y="13" width="2" height="4"></rect><rect x="2" y="7" width="2" height="10"></rect><path d="m30,28.5859l-7.5522-7.5522c1.5918-1.9082,2.5522-4.3604,2.5522-7.0337,0-6.0654-4.9346-11-11-11-2.4026,0-4.6853.7607-6.6013,2.2002l1.2012,1.5991c1.5669-1.1772,3.4343-1.7993,5.4001-1.7993,4.9626,0,9,4.0371,9,9s-4.0374,9-9,9c-2.8574,0-5.4819-1.312-7.2007-3.6001l-1.5991,1.2017c2.1001,2.7949,5.3076,4.3984,8.7998,4.3984,2.6733,0,5.1255-.9604,7.0337-2.5522l7.5522,7.5522,1.4141-1.4141Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
