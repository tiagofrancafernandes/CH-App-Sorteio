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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>spray-paint</title><path d="M22.5,23A4.5,4.5,0,1,1,27,18.5,4.505,4.505,0,0,1,22.5,23Zm0-7A2.5,2.5,0,1,0,25,18.5,2.5026,2.5026,0,0,0,22.5,16Z"></path><path d="M28,8H26V3H19V8H17a2.002,2.002,0,0,0-2,2V28a2.0023,2.0023,0,0,0,2,2H28a2.0027,2.0027,0,0,0,2-2V10A2.0023,2.0023,0,0,0,28,8ZM21,5h3V8H21ZM17,28V10H28l.002,18Z"></path><rect x="2" y="14" width="3" height="3"></rect><rect x="7" y="9" width="3" height="3"></rect><rect x="2" y="9" width="3" height="3"></rect><rect x="12" y="4" width="3" height="3"></rect><rect x="7" y="4" width="3" height="3"></rect><rect x="2" y="4" width="3" height="3"></rect><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill:none"></rect></svg>

</template>
