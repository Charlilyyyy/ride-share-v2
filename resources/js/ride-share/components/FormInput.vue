<template>
    <div class="info-div">
      <label>{{ label }}</label>
      <input :size="size" :placeholder="placeholder" :value="modelValue" :type="type" @input="$emit('update:modelValue', $event.target.value)"/>
      <!-- <input type="text"/> -->
    </div>
</template>
  
<script setup>
import { defineProps,defineEmits } from 'vue'

const props = defineProps ({
    size: Number,
    label: String,
    modelValue: String,
    type: { default: 'text', type: String },
    placeholder: String
})

const  emits  = defineEmits(['update:modelValue'])

</script>

  

  
  <style scoped>
  .info-div {
    margin-bottom: 15px;
  }
  
  label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
  }
  </style>
  