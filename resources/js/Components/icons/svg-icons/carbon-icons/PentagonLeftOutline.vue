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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path class="cls-2" d="m4.2407,16L12.9238,4.1726l14.0762,4.5261v14.6025l-14.0762,4.5261-8.6831-11.8274m-2.2407,0c0,.2078.0645.4158.1938.5918l9.5444,13c.1907.2599.4904.4066.8009.4082.1036.0005.2085-.0151.3109-.0481l15.4561-4.9697c.4136-.1331.6938-.5176.6938-.9519V7.9697c0-.4343-.2803-.8188-.6938-.9519L12.8501,2.0481c-.1021-.0329-.2067-.0485-.31-.0481-.3108.0013-.6109.1481-.8018.4082L2.1938,15.4082c-.1294.176-.1938.384-.1938.5918h0Z" style="stroke-width: 0px"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" transform="translate(32) rotate(90)" style="fill: none;stroke-width: 0px"></rect></svg>

</template>
