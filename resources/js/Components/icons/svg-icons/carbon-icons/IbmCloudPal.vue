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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path class="cls-2" d="m30.5093,17.6895l-6-3.5498c-.1572-.0933-.333-.1396-.5093-.1396s-.3521.0464-.5093.1396l-6,3.5498c-.3042.1797-.4907.5068-.4907.8604v6.9004c0,.3535.1865.6807.4907.8604l6,3.5498c.1572.0933.333.1396.5093.1396s.3521-.0464.5093-.1396l6-3.5498c.3042-.1797.4907-.5068.4907-.8604v-6.9004c0-.3535-.1865-.6807-.4907-.8604Zm-1.5093,7.1904l-5,2.958-5-2.958v-5.7598l5-2.958,5,2.958v5.7598Z" style="stroke-width: 0px"></path><path class="cls-2" d="m14,26h-5c-4.4111,0-8-3.5889-8-8,0-3.7183,2.5986-6.9365,6.1577-7.7783.8438-4.7368,4.9497-8.2217,9.8423-8.2217,5.5137,0,10,4.4858,10,10h-2c0-4.4111-3.5889-8-8-8-4.1177,0-7.5386,3.084-7.9575,7.1743l-.0801.7822-.7793.1064c-2.9551.4033-5.1831,2.9556-5.1831,5.937,0,3.3086,2.6914,6,6,6h5v2Z" style="stroke-width: 0px"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none;stroke-width: 0px"></rect></svg>

</template>
