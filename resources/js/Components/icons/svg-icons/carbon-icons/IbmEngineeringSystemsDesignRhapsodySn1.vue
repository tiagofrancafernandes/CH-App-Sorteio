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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path class="cls-2" d="m13,27h-3c-3.8599,0-7-3.1401-7-7v-2h2v2c0,2.7568,2.2432,5,5,5h3v2Z" style="stroke-width: 0px"></path><path class="cls-2" d="m25,27h-4c-1.1025,0-2-.8975-2-2v-4c0-1.1025.8975-2,2-2h4c1.1025,0,2,.8975,2,2v4c0,1.1025-.8975,2-2,2Zm-4-6h-.002l.002,4h4v-4h-4Z" style="stroke-width: 0px"></path><rect class="cls-2" x="25" y="15" width="2" height="2" style="stroke-width: 0px"></rect><rect class="cls-2" x="29" y="19" width="2" height="2" style="stroke-width: 0px"></rect><rect class="cls-2" x="29" y="23" width="2" height="2" style="stroke-width: 0px"></rect><rect class="cls-2" x="15" y="21" width="2" height="2" style="stroke-width: 0px"></rect><rect class="cls-2" x="15" y="25" width="2" height="2" style="stroke-width: 0px"></rect><rect class="cls-2" x="15" y="29" width="2" height="2" style="stroke-width: 0px"></rect><rect class="cls-2" x="19" y="29" width="2" height="2" style="stroke-width: 0px"></rect><path class="cls-2" d="m27,13v-2c0-3.8599-3.1401-7-7-7h-7v2h7c2.7568,0,5,2.2432,5,5v2h2Z" style="stroke-width: 0px"></path><path class="cls-2" d="m10,8V4c0-1.1046-.8954-2-2-2H2v13h2v-5h1.48l2.34,5h2.18l-2.33-5h.33c1.1046,0,2-.8954,2-2ZM4,4h4v4h-4V4Z" style="stroke-width: 0px"></path><rect id="_Transparent_Rectangle_" data-name="&amp;lt;Transparent Rectangle&amp;gt;" class="cls-1" width="32" height="32" style="fill: none;stroke-width: 0px"></rect></svg>

</template>
