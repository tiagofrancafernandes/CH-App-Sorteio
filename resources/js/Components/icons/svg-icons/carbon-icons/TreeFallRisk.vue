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
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="currentColor" class="blade-carbon-icons" :class="`w-${computedSize} h-${computedSize}`"><defs></defs><path id="inner-path" class="cls-1" d="M23.75,10h-1.5V6h1.5ZM23,11a1,1,0,1,0,1,1A1,1,0,0,0,23,11Z" style="fill: none"></path><path d="M29.9115,13.9355,23.6284,2.3706a.7181.7181,0,0,0-1.2568,0L16.0885,13.9355A.72.72,0,0,0,16.72,15H29.28A.72.72,0,0,0,29.9115,13.9355ZM22.25,6h1.5v4h-1.5ZM23,13a1,1,0,1,1,1-1A1,1,0,0,1,23,13Z"></path><path d="M26,19V17H17V28a2.0027,2.0027,0,0,0,2,2h3V28H19V19Z"></path><path d="M12,30H9V28h3V15.5664L8.4854,13.4575l1.0292-1.7148,3.5147,2.1084A2.0115,2.0115,0,0,1,14,15.5664V28A2.0024,2.0024,0,0,1,12,30Z"></path><path d="M18.6638,5.0059l.96-1.7671A8.9324,8.9324,0,0,0,15,2,8.0275,8.0275,0,0,0,8.0786,6.001C8.0525,6,8.0264,6,8,6A6,6,0,0,0,8,18V16A4,4,0,0,1,8,8a2.7009,2.7009,0,0,1,.387.0391l.863.1142.3086-.6675A6.0192,6.0192,0,0,1,15,4,6.8916,6.8916,0,0,1,18.6638,5.0059Z"></path><rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1" width="32" height="32" style="fill: none"></rect></svg>

</template>
