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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><title>drop-photo</title><path class="cls-1" d="M19,26a4,4,0,1,1,4-4A4.0045,4.0045,0,0,1,19,26Zm0-6a2,2,0,1,0,2,2A2.0021,2.0021,0,0,0,19,20Z" style="fill:currentColor"></path><path class="cls-1" d="M27,29H11a2,2,0,0,1-2-2V18a2,2,0,0,1,2-2h3.2793l.5441-1.6324A2,2,0,0,1,16.7208,13h4.5584a2,2,0,0,1,1.8974,1.3676L23.7207,16H27a2,2,0,0,1,2,2v9A2,2,0,0,1,27,29ZM11,27H27V18H22.2792l-1-3H16.7207l-1,3H11Z" style="fill:currentColor"></path><rect class="cls-1" x="27" y="11" width="2" height="2" style="fill:currentColor"></rect><rect class="cls-1" x="27" y="7" width="2" height="2" style="fill:currentColor"></rect><rect class="cls-1" x="27" y="3" width="2" height="2" style="fill:currentColor"></rect><rect class="cls-1" x="23" y="3" width="2" height="2" style="fill:currentColor"></rect><rect class="cls-1" x="19" y="3" width="2" height="2" style="fill:currentColor"></rect><rect class="cls-1" x="15" y="3" width="2" height="2" style="fill:currentColor"></rect><rect class="cls-1" x="11" y="3" width="2" height="2" style="fill:currentColor"></rect><rect class="cls-1" x="7" y="3" width="2" height="2" style="fill:currentColor"></rect><rect class="cls-1" x="3" y="3" width="2" height="2" style="fill:currentColor"></rect><rect class="cls-1" x="3" y="7" width="2" height="2" style="fill:currentColor"></rect><rect class="cls-1" x="3" y="11" width="2" height="2" style="fill:currentColor"></rect><rect class="cls-1" x="3" y="15" width="2" height="2" style="fill:currentColor"></rect><rect class="cls-1" x="3" y="19" width="2" height="2" style="fill:currentColor"></rect><rect class="cls-1" x="3" y="23" width="2" height="2" style="fill:currentColor"></rect><rect class="cls-1" x="3" y="27" width="2" height="2" style="fill:currentColor"></rect><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-2" width="32" height="32" style="fill:none"></rect></svg>

</template>
