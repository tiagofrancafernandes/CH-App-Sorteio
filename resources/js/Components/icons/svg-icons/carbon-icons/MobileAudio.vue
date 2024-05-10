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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>mobile--audio</title><rect class="cls-1" x="28" y="12" width="2" height="3" style="fill:currentColor"></rect><rect class="cls-1" x="24" y="7" width="2" height="13" style="fill:currentColor"></rect><rect class="cls-1" x="20" y="11" width="2" height="5" style="fill:currentColor"></rect><rect class="cls-1" x="16" y="9" width="2" height="9" style="fill:currentColor"></rect><rect class="cls-1" x="12" y="12" width="2" height="3" style="fill:currentColor"></rect><circle cx="13.5" cy="24.5" r="1.5"></circle><path d="M20,30H7a2.0023,2.0023,0,0,1-2-2V4A2.0023,2.0023,0,0,1,7,2H20V4H7V28H20V24h2v4A2.0023,2.0023,0,0,1,20,30Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-2" width="32" height="32" style="fill:none"></rect></svg>

</template>
