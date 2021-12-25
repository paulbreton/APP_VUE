<template>
    <el-input :placeholder="placeholder"  @input="handleInput" :value="value" :show-password="password" :class="{success : isValid && value !=='', wrong: isValid === false && value !==''}"></el-input>
</template>

<script>
import { defineComponent, ref, emit } from '@vue/composition-api'

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
            default: '',
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

        return {
            handleInput,
        }
    },
})
</script>
<style lang="css">
.success .el-input__inner {
   border-color: yellow; 
}
.wrong .el-input__inner {
    border-color: red;
}

</style>
