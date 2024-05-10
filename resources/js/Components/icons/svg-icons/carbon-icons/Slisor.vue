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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M28,20H26v2h2v6H4V22H6V20H4a2.0024,2.0024,0,0,0-2,2v6a2.0024,2.0024,0,0,0,2,2H28a2.0024,2.0024,0,0,0,2-2V22A2.0024,2.0024,0,0,0,28,20Z" transform="translate(0 0)"></path><circle cx="7" cy="25" r="1"></circle><path d="M16,22a1.0005,1.0005,0,0,1-.4473-.1055l-10-5,.8946-1.789L16,19.8821l9.5527-4.7766.8946,1.789-10,5A1.0005,1.0005,0,0,1,16,22Z" transform="translate(0 0)"></path><path d="M16,16a1.0005,1.0005,0,0,1-.4473-.1055l-10-5a1,1,0,0,1,0-1.789l10-5a1.0008,1.0008,0,0,1,.8946,0l10,5a1,1,0,0,1,0,1.789l-10,5A1.0005,1.0005,0,0,1,16,16ZM8.2358,10,16,13.8821,23.7642,10,16,6.1179Z" transform="translate(0 0)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
