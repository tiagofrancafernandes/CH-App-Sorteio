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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M25.7983,10a10,10,0,0,0-19.62.124A7.4964,7.4964,0,0,0,7.5,25H8V23H7.5a5.4961,5.4961,0,0,1-.377-10.9795l.8365-.0571.09-.8335A7.9934,7.9934,0,0,1,23.7368,10Z" transform="translate(0 0)"></path><path d="M28,12H18a2.0023,2.0023,0,0,0-2,2v4H12a2.0023,2.0023,0,0,0-2,2V30H30V14A2.0023,2.0023,0,0,0,28,12ZM12,28V20h4v8Zm16,0H18V14H28Z" transform="translate(0 0)"></path><rect x="20" y="16" width="2" height="4"></rect><rect x="24" y="16" width="2" height="4"></rect><rect x="20" y="22" width="2" height="4"></rect><rect x="24" y="22" width="2" height="4"></rect><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
