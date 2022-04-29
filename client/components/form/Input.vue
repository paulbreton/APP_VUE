<template>
    <el-input 
        :placeholder="placeholder"
        @input="handleInput"
        @blur="handleBlur"
        @focus="handleFocus"
        :value="value"
        :show-password="password"
        :class="{success : isValid && value !=='', wrong: isValid === false && value !==''}"
    >
        <i slot="suffix" class="el-input__icon" :class="{ 'el-icon-check': isValid, 'el-icon-close': !isValid }" v-if="value"></i>
    </el-input>
</template>

<script>
import { defineComponent, ref, emit, computed } from '@vue/composition-api'

export default defineComponent({
    props: {
        password: {
            type: Boolean,
            require: false,
            default: false,
        },
        value: {
            type: String,
            require: true
        },
        isValid: {
            type: Boolean,
            require: false
        },
        placeholder: {
            type: String,
            default: '',
            require: false,
        }
    },
    setup(props, { emit }) {
        const handleInput = (value) => {
            emit('handle-input', value)
        }

        const handleBlur = () => emit('handle-blur')

        const handleFocus = () => emit('handle-focus')

        return {
            handleInput,
            handleBlur,
            handleFocus
        }
    },
})
</script>
<style lang="css">
.el-input__icon.el-icon-close {
    font-weight: bold;
    color: var(--negative);
}
.el-input__icon.el-icon-check {
    font-weight: bold;
    color: var(--positive);
}
.el-input__inner:focus {
    border: none;
}
</style>
