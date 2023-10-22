<script setup lang="ts">
import {IEmit, IProps} from "../../types/components/fields/input";

const props = withDefaults(defineProps<IProps>(), {
    errors: [],
    value: '',
    type: 'text',
    placeholder: '',
    width: '25%'
})

const emit = defineEmits<IEmit>()

const updateValue = e => {
    emit('update:value', e.target.value)
}
</script>
<template>
    <div class="g-3" :style="{width: width}">
        <div class="mb-3">
            <label
                :for="name"
                class="form-label"
            >{{ label }}</label>
            <input
                class="form-control"
                :type="type"
                :name="name"
                :id="name"
                :placeholder="placeholder"
                :value="value"
                @input="updateValue"
            />
        </div>
        <div
            class="mb-3 error-message"
            v-for="error in errors"
            :key="error.$uid"
        ><p class="p-1 font-size-24">{{ error.$message }}</p>
        </div>
    </div>
</template>
