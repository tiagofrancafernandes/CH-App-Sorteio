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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path class="cls-1" d="M20,19H18V17H14v2H12V17a2.0021,2.0021,0,0,1,2-2h4a2.0021,2.0021,0,0,1,2,2Z" transform="translate(0 0)" style="fill:currentColor"></path><path class="cls-1" d="M16,14a3,3,0,1,1,3-3A3.0033,3.0033,0,0,1,16,14Zm0-4a1,1,0,1,0,1,1A1.0011,1.0011,0,0,0,16,10Z" transform="translate(0 0)" style="fill:currentColor"></path><path class="cls-1" d="M16,30,7.5645,20.0513c-.0479-.0571-.3482-.4515-.3482-.4515A10.8888,10.8888,0,0,1,5,13a11,11,0,0,1,22,0,10.8844,10.8844,0,0,1-2.2148,6.5973l-.0015.0025s-.3.3944-.3447.4474ZM8.8125,18.395c.001.0007.2334.3082.2866.3744L16,26.9079l6.91-8.15c.0439-.0552.2783-.3649.2788-.3657A8.901,8.901,0,0,0,25,13,9,9,0,0,0,7,13a8.9054,8.9054,0,0,0,1.8125,5.395Z" transform="translate(0 0)" style="fill:currentColor"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-2" width="32" height="32" style="fill: none"></rect></svg>

</template>
