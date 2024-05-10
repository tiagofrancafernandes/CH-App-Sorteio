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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="15" y="15" width="26" height="2" transform="translate(44 -12) rotate(90)"></rect><rect x="23" y="3" width="2" height="2" transform="translate(28 -20) rotate(90)"></rect><rect x="19" y="3" width="2" height="2" transform="translate(24 -16) rotate(90)"></rect><rect x="15" y="3" width="2" height="2" transform="translate(20 -12) rotate(90)"></rect><rect x="11" y="3" width="2" height="2" transform="translate(16 -8) rotate(90)"></rect><rect x="7" y="3" width="2" height="2" transform="translate(12 -4) rotate(90)"></rect><rect x="3" y="3" width="2" height="2" transform="translate(8 0) rotate(90)"></rect><rect x="3" y="7" width="2" height="2" transform="translate(12 4) rotate(90)"></rect><rect x="3" y="11" width="2" height="2" transform="translate(16 8) rotate(90)"></rect><rect x="3" y="15" width="2" height="2" transform="translate(20 12) rotate(90)"></rect><rect x="3" y="23" width="2" height="2" transform="translate(28 20) rotate(90)"></rect><rect x="3" y="19" width="2" height="2" transform="translate(24 16) rotate(90)"></rect><rect x="23" y="27" width="2" height="2" transform="translate(52 4) rotate(90)"></rect><rect x="19" y="27" width="2" height="2" transform="translate(48 8) rotate(90)"></rect><rect x="15" y="27" width="2" height="2" transform="translate(44 12) rotate(90)"></rect><rect x="11" y="27" width="2" height="2" transform="translate(40 16) rotate(90)"></rect><rect x="7" y="27" width="2" height="2" transform="translate(36 20) rotate(90)"></rect><rect x="3" y="27" width="2" height="2" transform="translate(32 24) rotate(90)"></rect><rect x="8" y="10" width="10" height="2"></rect><rect x="8" y="15" width="6" height="2"></rect><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
