<script setup lang="ts">
import { computed } from "vue";

interface Props {
    tag?: string;
    colSpan?: number|string;
    titleClass?: string;
    titleIsHtml?: boolean;
}

const props = withDefaults(defineProps<Props>(), {
    tag: "div",
    titleIsHtml: false
});

const tagType = computed(() => [
    'a',
    'div',
    'section',
].includes(props?.tag) ? props?.tag : 'div');

const colspan = computed(() => {
    let propsColspan = props?.colSpan;

    if (!['string', 'number', 'object'].includes(typeof propsColspan)) {
        return '';
    }

    if (typeof propsColspan === 'object') {
        return propsColspan;
    }

    if (!isNaN(propsColspan)) {
        return props?.colSpan >= 1 && props?.colSpan <= 12 ? `col-span-${props?.colSpan}` : '';
    }

    if (typeof propsColspan === 'string') {
        return propsColspan.trim();
    }

    return '';
});

</script>

<template>
    <component
        :is='tagType'
        class="scale-100 p-2 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-md shadow-gray-500/20 transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500"

        :class="colspan"
    >
        <div class="grid grid-cols-5">
            <div class="col-span-5 components-laravel-card-header">
                <template  v-if="$slots.header || $slots.title">
                    <div class="grid grid-cols-6">
                        <template  v-if="$slots.headerIcon">
                            <div
                                class="col-span-1"
                            >
                                <div
                                    class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full"
                                >
                                    <slot name="headerIcon"></slot>
                                </div>
                            </div>
                        </template>

                        <template  v-if="$slots.title">
                            <div
                                :class="$slots.headerIcon ? 'col-span-5' : 'col-span-6'"
                            >

                                <h2
                                    v-if="!titleIsHtml"
                                    class="text-lg font-semibold text-gray-900 dark:text-white"
                                    :class="titleClass"
                                >
                                    <slot name="title"></slot>
                                </h2>
                                <slot
                                    v-else
                                    name="title"
                                ></slot>
                            </div>
                        </template>
                    </div>
                    <slot name="header"></slot>
                </template>
            </div>

            <div class="col-span-5 components-laravel-card-body">
                <div
                    class="text-gray-500 dark:text-gray-400 text-sm"
                >
                    <slot v-if="$slots.default"/>
                    <template v-else>
                        <slot name="body"></slot>
                    </template>
                </div>
            </div>
        </div>

        <template  v-if="$slots.footer">
            <div class="col-span-5 components-laravel-card-footer">
                <slot name="footer"></slot>
            </div>
        </template>
    </component>
</template>
