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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="m16,20c-.8284,0-1.5.6716-1.5,1.5s.6716,1.5,1.5,1.5,1.5-.6716,1.5-1.5-.6716-1.5-1.5-1.5h0Z"></path><rect x="15" y="9" width="2" height="9"></rect><path d="m16,30c-.5335,0-1.0672-.2031-1.4732-.6094L2.6094,17.4732c-.8126-.8123-.8126-2.1342,0-2.9465L14.5268,2.6094c.8121-.8126,2.1344-.8126,2.9465,0l11.9173,11.9173c.8126.8123.8126,2.1342,0,2.9465l-11.9173,11.9173c-.406.4063-.9398.6094-1.4732.6094Zm0-26.0008c-.0215,0-.0427.0083-.0591.0244L4.0236,15.9409c-.0325.0327-.0325.0855,0,.1182l11.9173,11.9173c.0327.0322.0855.0322.1182,0l11.9173-11.9173c.0325-.0327.0325-.0855,0-.1182l-11.9173-11.9173c-.0164-.0161-.0376-.0244-.0591-.0244Z"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
