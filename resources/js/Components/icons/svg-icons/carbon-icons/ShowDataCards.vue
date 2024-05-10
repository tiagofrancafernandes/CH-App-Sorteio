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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path d="M28,10H4A2.0022,2.0022,0,0,1,2,8V4A2.0021,2.0021,0,0,1,4,2H28a2.0021,2.0021,0,0,1,2,2V8A2.0022,2.0022,0,0,1,28,10ZM4,4V8H28V4Z" transform="translate(0 -0.0001)"></path><path d="M28,30H4a2.0022,2.0022,0,0,1-2-2V24a2.0021,2.0021,0,0,1,2-2H28a2.0021,2.0021,0,0,1,2,2v4A2.0022,2.0022,0,0,1,28,30ZM4,24v4H28V24Z" transform="translate(0 -0.0001)"></path><path d="M28,20H4a2.0022,2.0022,0,0,1-2-2V14a2.0021,2.0021,0,0,1,2-2H28a2.0021,2.0021,0,0,1,2,2v4A2.0022,2.0022,0,0,1,28,20ZM4,14v4H28V14Z" transform="translate(0 -0.0001)"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
