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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path class="cls-1" d="M16.79,19.386l7,9A1,1,0,0,1,23,30H9a1,1,0,0,1-.79-1.614l7-9a1,1,0,0,1,1.5791,0Z" style="fill:currentColor"></path><rect class="cls-1" x="15" y="2" width="2" height="28" transform="translate(0 32) rotate(-90)" style="fill:currentColor"></rect><path class="cls-1" d="M16,13a1.001,1.001,0,0,1-.79-.386l-7-9A1,1,0,0,1,9,2H23a1,1,0,0,1,.79,1.614l-7,9A1.001,1.001,0,0,1,16,13ZM11.0444,4,16,10.3711,20.9556,4Z" style="fill:currentColor"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-2" width="32" height="32" style="fill: none"></rect></svg>

</template>
