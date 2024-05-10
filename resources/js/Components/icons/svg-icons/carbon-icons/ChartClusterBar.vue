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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>chart--cluster-bar</title><path d="M30,30H4a2,2,0,0,1-2-2V2H4V28H30Z"></path><rect x="10" y="16" width="2" height="10"></rect><rect x="7" y="22" width="2" height="4"></rect><rect x="26" y="8" width="2" height="18"></rect><rect x="23" y="14" width="2" height="12"></rect><rect x="15" y="12" width="2" height="14" transform="translate(32 38) rotate(-180)"></rect><rect x="18" y="18" width="2" height="8" transform="translate(38 44) rotate(-180)"></rect><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
