<template>
  <div>
    <!-- Bind the input's value to the "content" prop -->
    <input 
      type="text" 
      :value="content" 
      @input="$emit('update:content', $event.target.value)" 
      placeholder="Image URL" 
    />
    <img :src="content" alt="Editable" />
  </div>
</template>

<script>
export default {
  name: "EditableImageComponent",
  props: {
    content: String, // The "content" prop is passed from the parent
  },
};
</script>