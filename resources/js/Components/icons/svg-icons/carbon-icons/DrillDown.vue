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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon points="10 6 11.414 4.586 15 8.172 15 0 17 0 17 8.172 20.586 4.586 22 6 16 12 10 6"></polygon><path d="M22,16a5.9815,5.9815,0,0,0-1.7573-4.2427L16,16l-4.2427-4.2427A6,6,0,1,0,22,16Z"></path><path d="M30,16a13.9581,13.9581,0,0,0-4.105-9.895L24.4814,7.5188a12,12,0,1,1-16.9628,0L6.105,6.105A13.9974,13.9974,0,1,0,30,16Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
