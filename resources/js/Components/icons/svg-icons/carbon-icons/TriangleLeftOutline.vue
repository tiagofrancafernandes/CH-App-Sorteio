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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path class="cls-2" d="m27.5117,2.1245L3.5249,15.144c-.3438.1865-.5249.5212-.5249.856,0,.3345.1812.6689.5249.8555l23.9868,13.0195c.1582.0862.3257.1255.4883.125.5229-.0017,1-.4114,1-.9805V2.9802c0-.5691-.4771-.9788-1-.9802-.1626-.0005-.3301.0386-.4883.1245Zm-.5117,25.1985L6.1323,16,27,4.677v22.646Z" style="stroke-width: 0px"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" transform="translate(32) rotate(90)" style="fill: none;stroke-width: 0px"></rect></svg>

</template>
