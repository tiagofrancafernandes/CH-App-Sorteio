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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m23.2156,4h2.7844v-2h-7v6h2v-2.9038c4.2354,1.9346,7,6.1523,7,10.9038,0,6.6167-5.3833,12-12,12v2c7.7197,0,14-6.2803,14-14,0-5.0088-2.6318-9.5122-6.7844-12Z"></path><path d="m16,20c-.8284,0-1.5.6716-1.5,1.5s.6716,1.5,1.5,1.5,1.5-.6716,1.5-1.5-.6716-1.5-1.5-1.5h0Z"></path><rect x="15" y="9" width="2" height="9"></rect><path d="m16,4v-2C8.2803,2,2,8.2803,2,16c0,4.9766,2.6074,9.4937,6.7842,12h-2.7842v2h7v-6h-2v2.9033c-4.2634-1.9556-7-6.186-7-10.9033,0-6.6167,5.3833-12,12-12Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
