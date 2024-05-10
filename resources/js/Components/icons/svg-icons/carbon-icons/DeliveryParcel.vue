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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M29.4819,8.624l-10-5.5a1,1,0,0,0-.9638,0l-10,5.5a1,1,0,0,0,0,1.752L18,15.5913V26.3086l-3.0362-1.6693L14,26.3912l4.5181,2.4848a.9984.9984,0,0,0,.9638,0l10-5.5A1,1,0,0,0,30,22.5V9.5A1,1,0,0,0,29.4819,8.624ZM19,5.1416,26.9248,9.5,19,13.8584,11.0752,9.5Zm9,16.7671-8,4.4V15.5913l8-4.4Z"></path><rect x="2" y="14" width="8" height="2" transform="translate(12 30) rotate(-180)"></rect><rect x="4" y="22" width="8" height="2" transform="translate(16 46) rotate(-180)"></rect><rect x="6" y="18" width="8" height="2" transform="translate(20 38) rotate(-180)"></rect><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
