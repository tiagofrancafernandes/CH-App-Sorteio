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
    <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><rect x="2" y="28" width="28" height="2"></rect><rect x="11.3137" y="11.5145" width="6" height="2" transform="translate(-4.6567 13.7867) rotate(-45)"></rect><path d="M12.0815,23.4329l4.1168,2.3176a2.009,2.009,0,0,0,2.3853-.3344l8.8326-8.8326a2.0088,2.0088,0,0,0,.334-2.3856l-2.2977-4.136,1.79-1.79L25.8283,6.8577,24.4141,8.2719l-4.95-4.95a2.0026,2.0026,0,0,0-2.8285,0L14.5146,1.2008,13.1,2.615l2.1213,2.1214L6.7364,13.2216,4.6151,11.1,3.2009,12.5145l2.1213,2.1213a2.0025,2.0025,0,0,0,0,2.8285l4.95,4.95L8.8577,23.8282l1.4143,1.4142Zm13.92-8.2636-8.8328,8.8328-4.5456-2.5255L23.4767,10.6235ZM9.5649,18.8785l1.4142-1.4142L9.5649,16.05,8.1506,17.4643,6.7364,16.05,18.05,4.7364l1.4143,1.4142L18.05,7.5648,19.4644,8.979l1.4142-1.4142L22.2928,8.979,10.9791,20.2927Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
