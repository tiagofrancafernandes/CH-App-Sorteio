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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path class="cls-2" d="m16,2c-.2078,0-.4158.0645-.5918.1938L2.4082,11.7383c-.2599.1907-.4066.4904-.4082.8009-.0005.1036.0151.2085.0481.3109l4.9697,15.4561c.1331.4136.5176.6938.9519.6938h16.0605c.4343,0,.8188-.2803.9519-.6938l4.9697-15.4561c.0329-.1021.0485-.2067.0481-.31-.0013-.3108-.1481-.6109-.4082-.8018L16.5918,2.1938c-.176-.1294-.384-.1938-.5918-.1938h0Z" style="stroke-width: 0px"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" transform="translate(0 32) rotate(-90)" style="fill: none;stroke-width: 0px"></rect></svg>

</template>
