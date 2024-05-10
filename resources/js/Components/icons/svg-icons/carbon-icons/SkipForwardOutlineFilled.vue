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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><polygon points="10 19.301 15.941 16 10 12.699 10 19.301"></polygon><path d="M16,2A14,14,0,1,0,30,16,14,14,0,0,0,16,2Zm2.4858,14.874-9,5A1,1,0,0,1,8,21V11a1,1,0,0,1,1.4858-.874l9,5a1,1,0,0,1,0,1.748ZM24,22H22V10h2Z"></path><rect id="inner-path_2" data-name="inner-path 2" class="cls-1" x="22" y="10" width="2" height="12" style="fill: none"></rect><path id="inner_path_1" data-name="inner path 1" class="cls-1" d="M8.4927,21.8618A1,1,0,0,1,8,21V11a1,1,0,0,1,1.4858-.8743l9,5a1,1,0,0,1,0,1.7486l-9,5a1.0009,1.0009,0,0,1-.9931-.0125ZM10,12.7v6.601L15.9409,16Z" style="fill: none"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
